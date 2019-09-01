<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mrn extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'user');
        $this->load->model('Mrn_model', 'mrn');
        $this->load->model('ItemBasket_model', 'item_basket');
        $this->load->helper("custom_helper");
        $this->load->model("common_model");
        
    }
    function index(){
        $data['mrn_lists'] = $this->mrn->lists();
        
        $this->template->load('default_layout', 'mrn/index',$data);
    }
    
    function create(){
        
        if ( $this->input->post() ){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('mrn_no', 'MRN No', 'trim|required');
            $this->form_validation->set_rules('mrn_date', 'MRN Date', 'trim|required');
            
            $this->form_validation->set_rules('vendor_id', 'Vendor Name', 'trim|required');
            $this->form_validation->set_rules('item[]', 'Item Details', 'trim|required');
            
            
            
            if ($this->form_validation->run() == FALSE) {
                return $this->createMrnView();
            }
            
            $data['mrn_no'] = $this->input->post('mrn_no');
            $data['mrn_date'] = strtotime(date("Y-m-d",strtotime($this->input->post('mrn_date'))));
            $data['vendor_id'] = $this->input->post('vendor_id');
            $data['created_by'] = $this->session->userdata('user_row_id');
            $data['created_date'] = date("Y-m-d h:i:s a");
            
            $mrn_id = $this->mrn->create($data);
            if ( $mrn_id )
            {
                $item_details = $this->input->post('item');
                if ( !empty($item_details) ){
                    foreach ($item_details['batch_no'] as $key=>$val){
                        
                        $item_id  = $item_details['item_id'][$key];
                        $req_qty  = $item_details['req_qty'][$key];
                        $rec_qty  = $item_details['rec_qty'][$key];
                        $item_id  = $item_details['item_id'][$key];
                        $batch_no = $val;
                        
                        $insert_item_details['item_id'] = $item_id;
                        $insert_item_details['required_qty'] = $req_qty;
                        $insert_item_details['received_qty'] = $rec_qty;
                        $insert_item_details['batch_no'] = $batch_no;
                        $insert_item_details['mrn_id'] = $mrn_id;
                        $insert_item_details['created_date'] = date("Y-m-d h:i:s");
                        
                        $transaction_detail_id = $this->common_model->insert_record('mrn_items_details',$insert_item_details);
                        
                        if ( $transaction_detail_id ){
                            // Stock Evaluation
                        
                            $stock['item_id'] = $item_id;
                            $stock['transaction_id'] = $mrn_id;
                            $stock['transaction_detail_id'] = $transaction_detail_id;
                            $stock['stock_in'] = $rec_qty;
                            $stock['transaction_type'] = 'mrn';
                            $stock['created_date'] = strtotime(date("Y-m-d h:i:s"));
                            $this->common_model->insert_record('stock_evaluation',$stock);
                        }
                    }
                }
                $this->session->set_flashdata("success",'MRN has been created successfully');
                return redirect("mrn");
            }else{
                $this->session->set_flashdata("error",'MRN not created successfully,Due to some server error');
                return redirect("mrn/create");
            }
            
            return;
        }
        $this->createMrnView();
        
    }
    
    function createMrnView(){
        $this->load->model("Vendor_model",'vendor');
        $this->load->model('ItemBasket_model');
        $this->load->model('ItemBasket_model','item');
        
        
        $data['vendor_lists'] =$this->vendor->lists();
        $data['item_lists'] =$this->item->getItemLists();
        
        $hash=$this->ItemBasket_model->getNewRandHash();
        $data['mrn_no'] = "MRN".$hash;
        $this->template->load('default_layout','mrn/create',$data);
    }
    
    
    function edit($mrn_id){
        if ( $mrn_id ){
            $data['mrn'] = $this->mrn->get_mrn($mrn_id);
            $data['item_details'] = $this->mrn->get_mrn_item_details($mrn_id);

            $this->load->model("Vendor_model",'vendor');
            $this->load->model('ItemBasket_model');
            $this->load->model('ItemBasket_model','item');


            $data['vendor_lists'] =$this->vendor->lists();
            $data['item_lists'] =$this->item->getItemLists();


            return $this->template->load('default_layout','mrn/edit',$data);
        }
        $this->session->set_flashdata('error','Invalid request');
        return redirect("mrn/");
    }
    
    function update($mrn_id){
      if ($mrn_id && $this->input->post() ){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('mrn_no', 'MRN No', 'trim|required');
            $this->form_validation->set_rules('mrn_date', 'MRN Date', 'trim|required');
            
            $this->form_validation->set_rules('vendor_id', 'Vendor Name', 'trim|required');
            $this->form_validation->set_rules('item[]', 'Item Details', 'trim|required');
            
            
            
            if ($this->form_validation->run() == FALSE) {
                $data['mrn'] = $this->mrn->get_mrn($mrn_id);
                $data['item_details'] = $this->mrn->get_mrn_item_details($mrn_id);

                $this->load->model("Vendor_model",'vendor');
                $this->load->model('ItemBasket_model');
                $this->load->model('ItemBasket_model','item');


                $data['vendor_lists'] =$this->vendor->lists();
                $data['item_lists'] =$this->item->getItemLists();


                return $this->template->load('default_layout','mrn/edit',$data);
            }
            
            $data['mrn_no'] = $this->input->post('mrn_no');
            $data['mrn_date'] = strtotime(date("Y-m-d h:i:s",strtotime($this->input->post('mrn_date'))));
            $data['vendor_id'] = $this->input->post('vendor_id');
            $data['created_by'] = $this->session->userdata('user_row_id');
            
            if ( $this->mrn->update_mrn($data,$mrn_id) )
            {
                $item_details = $this->input->post('item');
                if ( !empty($item_details) ){
                   
                    $this->common_model->delete_record("mrn_items_details",['mrn_id'=>$mrn_id]);
                    $this->common_model->delete_record("stock_evaluation",['transaction_id'=>$mrn_id,'transaction_type'=>'mrn']);
                    
                   
                    
                    foreach ($item_details['batch_no'] as $key=>$val){
                        $item_id  = $item_details['item_id'][$key];
                        $req_qty  = $item_details['req_qty'][$key];
                        $rec_qty  = $item_details['rec_qty'][$key];
                        $item_id  = $item_details['item_id'][$key];
                        $batch_no = $val;
                        
                        
                        $insert_item_details['item_id'] = $item_id  ;
                        $insert_item_details['required_qty'] = $req_qty;
                        $insert_item_details['received_qty'] = $rec_qty;
                        $insert_item_details['mrn_id'] = $mrn_id;
                        $insert_item_details['batch_no'] = $batch_no;
                        
                        $insert_item_details['created_date'] = date("Y-m-d h:i:s");
                        $transaction_detail_id = $this->common_model->insert_record("mrn_items_details",$insert_item_details);
                        
                        if ( $transaction_detail_id ){
                            // Stock Evaluation
                        
                            $stock['item_id'] = $item_id;
                            $stock['transaction_id'] = $mrn_id;
                            $stock['transaction_detail_id'] = $transaction_detail_id;
                            $stock['stock_in'] = $rec_qty;
                            $stock['transaction_type'] = 'mrn';
                            $stock['created_date'] = strtotime(date("Y-m-d h:i:s"));
                            $this->common_model->insert_record('stock_evaluation',$stock);
                        }
                        
                    }
                    
                }
                $this->session->set_flashdata("success",'MRN has been updated successfully');
                return redirect("mrn");
            }else{
                $this->session->set_flashdata("error",'MRN not updated successfully,Due to some server error');
                return redirect("mrn/create");
            }
            
            return;

            
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