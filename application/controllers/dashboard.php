<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller { 
    
    public function __construct() {
        parent::__construct();        
        $this->load->model("common_model");
}



    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
      $data['mrn']= $this->common_model->getCountRecords("material_receive_note");
      $data['issue']= $this->common_model->getCountRecords("issue_slips");  
      $data['return']= $this->common_model->getCountRecords("return_slip"); 
      $data['items']= $this->common_model->getCountRecords("itembasket");
      $data['stockSummary']=$this->common_model->getMonthWiseStockSummary(); 
      $conditions=array('id'=>$_SESSION['finYear']);
      $data['finYear']=$this->common_model->get_all_records('financialyear',$conditions);     
     
        //$this->load->view('signUpView');
      $this->template->load('default_layout', 'signUpView', $data);
    }

}
