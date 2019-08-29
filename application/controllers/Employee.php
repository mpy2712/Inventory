<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    public function __construct() {
        parent::__construct();
           $this->load->model('Employee_model', 'emp');
            $this->load->model('common_model', 'common');

    }
    function index(){
        $data['employee_lists'] = $this->emp->lists();
        
        $this->template->load('default_layout', 'employees/index',$data);
    }
    
    function create(){
        
        if ( $this->input->post() ){
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('emp_name', 'Employee Name', 'trim|required');
            $this->form_validation->set_rules('emp_email', 'Employee Email', 'trim|required|valid_email');
            
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('emp_address', 'Address', 'trim|required');
            
            if ($this->form_validation->run() == FALSE) {
                return $this->template->load('default_layout','employees/create',['old_data'=>  $this->input->post()]);
            }
            $data['name'] = $this->input->post('emp_name');
            $data['email'] = $this->input->post('emp_email');
            $data['phone_no'] = $this->input->post('phone_number');
            $data['address'] = $this->input->post('emp_address');
            $data['created_date'] = date("Y-m-d h:i:s a");
            $data['created_by'] = $this->session->userdata('user_row_id');
            
            
            
            if ( $this->common->insert_record('employees',$data) )
            {
                $this->session->set_flashdata("success",'Employee has been created successfully');
                return redirect("employee");
            }else{
                $this->session->set_flashdata("error",'Employee not created successfully,Due to some server error');
                return redirect("employees/create");
            }
            
            return;
        }
        $this->template->load('default_layout','employees/create');
    }
    
    function edit($emp_id){
        if ( $emp_id ){
            $data['employee'] = $this->emp->get_employee($emp_id);
            return $this->template->load('default_layout','employees/edit',$data);
        }
        $this->session->set_flashdata('error','Invalid request');
        return redirect("vendors/");
    }
    
    function update($employee_id){
      if ($employee_id && $this->input->post() ){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('emp_name', 'Employee Name', 'trim|required');
        $this->form_validation->set_rules('emp_email', 'Employee Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('emp_address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['employee'] = $this->emp->get_employee($employee_id);
            return $this->template->load('default_layout','employees/edit',$data);
        }
        $data['name'] = $this->input->post('emp_name');
        $data['email'] = $this->input->post('emp_email');
        $data['phone_no'] = $this->input->post('phone_number');
        $data['address'] = $this->input->post('emp_address');
        $data['created_by'] = $this->session->userdata('user_row_id');

        if ( $this->emp->update_employee($data,$employee_id)){
            $this->session->set_flashdata("success","Employee information has been submited successfully");
            return redirect("employee");
        }
        $this->session->set_flashdata("error","Employee information not submited successfully");
        return redirect("employee/edit".$vendor_id);
      }
      $this->session->set_flashdata('error','Invalid Request');
      return redirect("employee");
    }
    
    function delete($employee_id){
        if ( $employee_id && (int)$employee_id > 0 ){
            if ( $this->common->delete_record('employees',['id'=>$employee_id]) ){
                $this->session->set_flashdata('success','Employee has been deleted successfully');
                return redirect("employee");
            }
            $this->session->set_flashdata('error','Employee not deleted successfully');
            return redirect("employee");
            
        }
        $this->session->set_flashdata('error','Invalid Request');
         return redirect("employee");
    }
    
    
}