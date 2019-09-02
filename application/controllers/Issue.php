<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'user');
        $this->load->model('Issue_model', 'issue');
        
        $this->load->model('ItemBasket_model', 'item_basket');
        $this->load->helper("custom_helper");
        $this->load->model("common_model");
        
    }
    function index(){
        $data['issue_lists'] = $this->issue->lists();
        
        
        $this->template->load('default_layout', 'issues/index',$data);
    }
    
    function create(){
        
        if ( $this->input->post() ){
            
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('issue_no', 'Issue No', 'trim|required');
            $this->form_validation->set_rules('issue_date', 'Issue Date', 'trim|required');
            
            $this->form_validation->set_rules('employee_id', 'Employee Name', 'trim|required');
            $this->form_validation->set_rules('item[]', 'Item Details', 'trim|required');
            
            
            
            if ($this->form_validation->run() == FALSE) {
                return $this->createIssueView();
            }
            
            $data['slip_no'] = $this->input->post('issue_no');
            $data['issue_date'] = strtotime(date("Y-m-d",strtotime($this->input->post('issue_date'))));
            $data['employee_id'] = $this->input->post('employee_id');
            $data['created_by'] = $this->session->userdata('user_row_id');
            $data['created_date'] = date("Y-m-d h:i:s a");
            
            $issue_id = $this->common_model->insert_record("issue_slips",$data);
            if ( $issue_id )
            {
                $item_details = $this->input->post('item');
                if ( !empty($item_details) ){
                    foreach ($item_details['batch_no'] as $key=>$val){
                        $insert_item_details['item_id'] = $item_details['item_id'][$key];
                        $insert_item_details['issue_qty'] = $item_details['issue_qty'][$key];
                        $insert_item_details['issue_date'] = strtotime(date("Y-m-d",strtotime($item_details['issue_date'][$key]))) ;
                        $insert_item_details['batch_no'] = $val;
                        $insert_item_details['issue_id'] = $issue_id;
                        $insert_item_details['created_date'] = date("Y-m-d h:i:s");
                        
                        $transaction_detail_id = $this->common_model->insert_record('issue_slip_item_details',$insert_item_details);
                        
                        if ( $transaction_detail_id ){
                            // Stock Evaluation
                        
                            $stock['item_id'] = $item_details['item_id'][$key];
                            $stock['transaction_id'] = $issue_id;
                            $stock['transaction_detail_id'] = $transaction_detail_id;
                            $stock['stock_out'] = $item_details['issue_qty'][$key];
                            $stock['transaction_type'] = 'issue';
                            $stock['created_date'] = strtotime(date("Y-m-d h:i:s"));
                            $this->common_model->insert_record('stock_evaluation',$stock);
                        }
                    }
                }
                $this->session->set_flashdata("success",'Issue Slip has been created successfully');
                return redirect("issue");
            }else{
                $this->session->set_flashdata("error",'Issue slip not created successfully,Due to some server error');
                return redirect("issue");
            }
            
            return;
        }
        $this->createIssueView();
        
    }
    
    function createIssueView(){
        $this->load->model("Vendor_model",'vendor');
        $this->load->model("Employee_model",'emp');
       
        
        
        $data['employee_lists'] =$this->emp->lists();
        $data['item_lists'] =$this->item_basket->getItemLists();
        
        $hash=$this->item_basket->getNewRandHash();
        $data['issue_no'] = "ISSUE-".$hash;
        $this->template->load('default_layout','issues/create',$data);
    }
    
    
    function edit($issue_id){
        if ( $issue_id ){
            $data['issue'] = $this->issue->get_issue_slip($issue_id);
            if ( !empty($data) && $data['issue']->has_return_slip != '' && (int)$data['issue']->has_return_slip != '' > 0){
                $this->session->set_flashdata("error",'An return slip has been generated against this issue slip,that\'s why you cannot edit or delete this issue slip');
                redirect("/issue");
            }
            
            $data['item_details'] = $this->issue->get_issue_item_details($issue_id);

            $this->load->model("employee_model",'emp');
            $data['employee_lists'] =$this->emp->lists();
            $data['item_lists'] =$this->item_basket->getItemLists();


            return $this->template->load('default_layout','issues/edit',$data);
        }
        $this->session->set_flashdata('error','Invalid request');
        return redirect("issue/");
    }
    
    function update($issue_id){
      if ($issue_id && $this->input->post() ){
          
            $this->load->library('form_validation');

            $this->form_validation->set_rules('issue_no', 'Issue No', 'trim|required');
            $this->form_validation->set_rules('issue_date', 'Issue Date', 'trim|required');
            
            $this->form_validation->set_rules('employee_id', 'Employee Name', 'trim|required');
            $this->form_validation->set_rules('item[]', 'Item Details', 'trim|required');
            
            
            
            if ($this->form_validation->run() == FALSE) {
                $data['issue'] = $this->issue->get_issue_slip($issue_id);
            
                $data['item_details'] = $this->issue->get_issue_item_details($issue_id);

                $this->load->model("employee_model",'emp');
                $data['employee_lists'] =$this->emp->lists();
                $data['item_lists'] =$this->item_basket->getItemLists();


                return $this->template->load('default_layout','issues/edit',$data);
            }
            
            $data['slip_no'] = $this->input->post('issue_no');
            $data['issue_date'] = strtotime(date("Y-m-d",strtotime($this->input->post('issue_date'))));
            $data['employee_id'] = $this->input->post('employee_id');
            $data['created_by'] = $this->session->userdata('user_row_id');
            $data['created_date'] = date("Y-m-d h:i:s a");
            
            $this->common_model->update_record("issue_slips",$data,['id'=>$issue_id]);
            if ( $issue_id )
            {
                $item_details = $this->input->post('item');
                if ( !empty($item_details) ){
                    $this->common_model->delete_record("issue_slip_item_details",['issue_id'=>$issue_id]);
                    $this->common_model->delete_record("stock_evaluation",['transaction_id'=>$issue_id,'transaction_type'=>'issue']);
                    
                    if ( !empty($item_details) ){
                        foreach ($item_details['batch_no'] as $key=>$val){
                            $insert_item_details['item_id'] = $item_details['item_id'][$key];
                            $insert_item_details['issue_qty'] = $item_details['issue_qty'][$key];
                            $insert_item_details['issue_date'] = strtotime(date("Y-m-d",strtotime($item_details['issue_date'][$key]))) ;
                            $insert_item_details['batch_no'] = $val;
                            $insert_item_details['issue_id'] = $issue_id;
                            $insert_item_details['created_date'] = date("Y-m-d h:i:s");

                            $transaction_detail_id = $this->common_model->insert_record('issue_slip_item_details',$insert_item_details);

                            if ( $transaction_detail_id ){
                                // Stock Evaluation

                                $stock['item_id'] = $item_details['item_id'][$key];
                                $stock['transaction_id'] = $issue_id;
                                $stock['transaction_detail_id'] = $transaction_detail_id;
                                $stock['stock_out'] = $item_details['issue_qty'][$key];
                                $stock['transaction_type'] = 'issue';
                                $stock['created_date'] = strtotime(date("Y-m-d h:i:s"));
                                $this->common_model->insert_record('stock_evaluation',$stock);
                            }
                        }
                    }
                }
                $this->session->set_flashdata("success",'Issue Slip has been updated successfully');
                return redirect("issue");
                
            }else{
                $this->session->set_flashdata("error",'Issue slip not updated successfully,Due to some server error');
                return redirect("issue");
            }
            
            

            
      }
      $this->session->set_flashdata('error','Invalid Request');
      return redirect("mrn");
    }
    
    function delete($vendor_id){
        if ( $vendor_id && (int)$vendor_id > 0 ){
            if ( $this->vendor->delete_vendor($vendor_id) ){
                $this->session->set_flashdata('success','Vendor has been deleted successfully');
                return redirect("vendors");
            }
            $this->session->set_flashdata('error','Vendor not deleted successfully');
            return redirect("vendors");
            
        }
        $this->session->set_flashdata('error','Invalid Request');
         return redirect("vendors");
    }
    
    
}