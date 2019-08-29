<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'user');
        $this->load->model('Vendor_model', 'vendor');
        
    }
    function index(){
        $data['vendor_lists'] = $this->vendor->lists();
        $this->template->load('default_layout', 'vendors/index',$data);
    }
    
    function create(){
        
        if ( $this->input->post() ){
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'trim|required');
            $this->form_validation->set_rules('vendor_email', 'Vendor Email', 'trim|required|valid_email');
            
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('vendor_address', 'Address', 'trim|required');
            
            if ($this->form_validation->run() == FALSE) {
                return $this->template->load('default_layout','vendors/create',['old_data'=>  $this->input->post()]);
            }
            $data['name'] = $this->input->post('vendor_name');
            $data['email'] = $this->input->post('vendor_email');
            $data['phone_no'] = $this->input->post('phone_number');
            $data['address'] = $this->input->post('vendor_address');
            $data['created_date'] = date("Y-m-d h:i:s a");
            
            
            if ( $this->vendor->create($data) )
            {
                $this->session->set_flashdata("success",'Vendor has been created successfully');
                return redirect("vendors");
            }else{
                $this->session->set_flashdata("error",'Vendor not created successfully,Due to some server error');
                return redirect("vendors/create");
            }
            
            return;
        }
        $this->template->load('default_layout','vendors/create');
    }
    
    function edit($vendor_id){
        if ( $vendor_id ){
            $data['vendor'] = $this->vendor->get_vendor($vendor_id);
            return $this->template->load('default_layout','vendors/edit',$data);
        }
        $this->session->set_flashdata('error','Invalid request');
        return redirect("vendors/");
    }
    
    function update($vendor_id){
      if ($vendor_id && $this->input->post() ){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'trim|required');
        $this->form_validation->set_rules('vendor_email', 'Vendor Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('vendor_address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['vendor'] = $this->vendor->get_vendor($vendor_id);
            return $this->template->load('default_layout','vendors/edit',$data);
        }
        $data['name'] = $this->input->post('vendor_name');
        $data['email'] = $this->input->post('vendor_email');
        $data['phone_no'] = $this->input->post('phone_number');
        $data['address'] = $this->input->post('vendor_address');
        $data['created_date'] = date("Y-m-d h:i:s a");
        if ( $this->vendor->update_vendors($data,$vendor_id)){
            $this->session->set_flashdata("success","Vendor information has been submited successfully");
            return redirect("vendors");
        }
        $this->session->set_flashdata("error","Vendor information not submited successfully");
        return redirect("vendors/edit".$vendor_id);
      }
      $this->session->set_flashdata('error','Invalid Request');
      return redirect("vendors");
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