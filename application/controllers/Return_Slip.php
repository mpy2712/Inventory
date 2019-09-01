<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Return_Slip extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'user');
        $this->load->model('return_model', 'return');
        
        $this->load->model('ItemBasket_model', 'item_basket');
        $this->load->helper("custom_helper");
        $this->load->model("common_model");
        
    }
    function index(){
        $data['resturn_lists'] = $this->return->lists();
        $this->template->load('default_layout', 'returns/index',$data);
    }
    
    function createReturnView(){
        $this->load->model("Employee_model",'emp');
        $data['employee_lists'] =$this->emp->lists();
        $data['issue_slip_lists'] = $this->common_model->get_all_records("issue_slips");
        //$data['item_lists'] =$this->item_basket->getItemLists();
        
        $hash=$this->item_basket->getNewRandHash();
        $data['return_no'] = "RET-".$hash;
        $this->template->load('default_layout','returns/create',$data);
    }
    
    function create(){
        
        if ( $this->input->post() ){
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('return_no', 'Return No', 'trim|required');
            $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required');
            
            $this->form_validation->set_rules('employee_id', 'Employee Name', 'trim|required');
            $this->form_validation->set_rules('item[]', 'Item Details', 'trim|required');
            $this->form_validation->set_rules('issue_no', 'Issue Number', 'trim|required');
            
            if ($this->form_validation->run() == FALSE) {
                return $this->createReturnView();
            }
            
            $data['return_no'] = $this->input->post('return_no');
            $data['return_date'] = strtotime(date("Y-m-d",strtotime($this->input->post('return_date'))));
            $data['employee_id'] = $this->input->post('employee_id');
            $data['issue_slip_id'] = $this->input->post('issue_no');
            $data['created_by'] = $this->session->userdata('user_row_id');
            $data['created_date'] = date("Y-m-d h:i:s a");
            
            $return_id = $this->common_model->insert_record("return_slip",$data);
            if ( $return_id )
            {
                $item_details = $this->input->post('item');
                if ( !empty($item_details) ){
                    foreach ($item_details as $key=>$val){
                        $insert_item_details['item_id'] = $val['item_id'];
                        $insert_item_details['issue_qty'] = $val['issue_qty'];
                        $insert_item_details['return_qty'] = $val['return_qty'];
                        
                        $insert_item_details['return_rate'] = $val['return_rate'] ;
                        
                        $insert_item_details['return_slip_id'] = $return_id;
                        $insert_item_details['created_date'] = date("Y-m-d h:i:s");
                        
                        $transaction_detail_id = $this->common_model->insert_record('return_item_details',$insert_item_details);
                        
                        if ( $transaction_detail_id ){
                            // Stock Evaluation
                        
                            $stock['item_id'] = $val['item_id'];
                            $stock['transaction_id'] = $return_id;
                            $stock['transaction_detail_id'] = $transaction_detail_id;
                            $stock['stock_in'] = $val['issue_qty'];
                            $stock['transaction_type'] = 'return';
                            $stock['created_date'] = strtotime(date("Y-m-d"));
                            $this->common_model->insert_record('stock_evaluation',$stock);
                        }
                    }
                }
                $this->session->set_flashdata("success",'Return slip has been created successfully');
                return redirect("return_slip");
            }else{
                $this->session->set_flashdata("error",'Return slip not created successfully,Due to some server error');
                return redirect("return_slip");
            }
            
            return;
        }
        $this->createReturnView();
        
    }
    
    function get_item_details(){
        if ( $this->input->post("issue_id") ){
            $issue_id = $this->input->post("issue_id");
            $issue_items = $this->return->get_lssue_item_details($issue_id);
            
            
            $sno = 1;
            if ( !empty($issue_items ) ){
                $row = '';
                
                foreach($issue_items as $item){
                    if ( $item->total_return_qty == $item->issue_qty )
                        continue;
                    
                    $item->balance_qty = $item->issue_qty - $item->total_return_qty;
                 $row .="<tr>"
                        . "<td>$sno</td>"
                        . "<td>$item->itemName</td>"
                        . "<td>$item->itemCode</td>"
                        . "<td>$item->batch_no</td>"
                        . "<td><input type='number' class='form-control' name='item[$sno][issue_qty]' value='$item->balance_qty' readonly/> </td>"
                        . "<td><input type='number' class='form-control' name='item[$sno][return_qty]'/> <input type='hidden' class='form-control' name='item[$sno][item_id]' value='$item->item_id'/> </td>"
                        . "<td><input type='number' class='form-control' name='item[$sno][return_rate]' /></td>"
                        . "<td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i></td>"
                        . "</tr>";
                 $sno++;
                }
                echo json_encode(['status'=>true,'html'=>$row]);
            }
        }
    }
    
//    

//    
//    
    function edit($return_id){
        if ( $return_id ){
            $data['return'] = $this->return->get_return_slip($return_id);
            
            $data['item_details'] = $this->return->get_return_item_details($return_id);
            
            $this->load->model("employee_model",'emp');
            $data['employee_lists'] =$this->emp->lists();
            $data['issue_slip_lists'] = $this->common_model->get_all_records("issue_slips");
        
            return $this->template->load('default_layout','returns/edit',$data);
        }
        $this->session->set_flashdata('error','Invalid request');
        return redirect("issue/");
    }
    
    function update($return_id){
      if ($return_id && $this->input->post() ){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('return_no', 'Return No', 'trim|required');
            $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required');
            
            $this->form_validation->set_rules('employee_id', 'Employee Name', 'trim|required');
            $this->form_validation->set_rules('item[]', 'Item Details', 'trim|required');
            $this->form_validation->set_rules('issue_no', 'Issue Number', 'trim|required');
            
            if ($this->form_validation->run() == FALSE) {
                $data['return'] = $this->return->get_return_slip($return_id);
                $data['item_details'] = $this->return->get_return_item_details($return_id);

                $this->load->model("employee_model",'emp');
                $data['employee_lists'] =$this->emp->lists();
                $data['issue_slip_lists'] = $this->common_model->get_all_records("issue_slips");

                return $this->template->load('default_layout','returns/edit',$data);
            }
            
            $data['return_no'] = $this->input->post('return_no');
            $data['return_date'] = strtotime(date("Y-m-d",strtotime($this->input->post('return_date'))));
            $data['employee_id'] = $this->input->post('employee_id');
            $data['issue_slip_id'] = $this->input->post('issue_no');
            $data['created_by'] = $this->session->userdata('user_row_id');
            $data['created_date'] = date("Y-m-d h:i:s a");
            
            $this->common_model->update_record("return_slip",$data,['id'=>$return_id]);
            if ( $return_id )
            {
                $this->common_model->delete_record("return_item_details",['return_slip_id'=>$return_id]);
                $this->common_model->delete_record("stock_evaluation",['transaction_id'=>$return_id,'transaction_type'=>'return']);
                
            
                $item_details = $this->input->post('item');
                if ( !empty($item_details) ){
                    foreach ($item_details as $key=>$val){
                        $insert_item_details['item_id'] = $val['item_id'];
                        $insert_item_details['issue_qty'] = $val['issue_qty'];
                        $insert_item_details['return_qty'] = $val['return_qty'];
                        
                        $insert_item_details['return_date'] = strtotime(date("Y-m-d",strtotime($val['return_date']))) ;
                        
                        $insert_item_details['return_slip_id'] = $return_id;
                        $insert_item_details['created_date'] = date("Y-m-d h:i:s");
                        
                        $transaction_detail_id = $this->common_model->insert_record('return_item_details',$insert_item_details);
                        
                        if ( $transaction_detail_id ){
                            // Stock Evaluation
                        
                            $stock['item_id'] = $val['item_id'];
                            $stock['transaction_id'] = $return_id;
                            $stock['transaction_detail_id'] = $transaction_detail_id;
                            $stock['stock_in'] = $val['issue_qty'];
                            $stock['transaction_type'] = 'return';
                            $stock['created_date'] = strtotime(date("Y-m-d"));
                            $this->common_model->insert_record('stock_evaluation',$stock);
                        }
                    }
                }
                $this->session->set_flashdata("success",'Return slip has been updated successfully');
                return redirect("return_slip");
            }else{
                $this->session->set_flashdata("error",'Return slip not updated successfully,Due to some server error');
                return redirect("return_slip");
            }
            
            
                    
            

            
      }
      $this->session->set_flashdata('error','Invalid Request');
      return redirect("mrn");
    }
    
    function delete($return_id){
        if ( $return_id && (int)$return_id > 0 ){
            $this->common_model->delete_record("return_slip",['id'=>$return_id]);
            $this->common_model->delete_record("return_item_details",['return_slip_id'=>$return_id]);
            $this->common_model->delete_record("stock_evaluation",['transaction_id'=>$return_id,'transaction_type'=>'return']);
                
            $this->session->set_flashdata('success','Return Slip has been deleted successfully');
            return redirect("return_slip");
            
            
        }
        $this->session->set_flashdata('error','Invalid Request');
         return redirect("return_slip");
    }
    
    
}