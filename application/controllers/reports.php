<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ItemBasket_model', 'itembasket');
        $this->load->helper("custom_helper");
       
        
    }
    function index(){
       
        $this->template->load('default_layout', 'stockLedgers/index','');
    }
    
    function stockLedgerSearch(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item', 'MRN No', 'trim|required');
        $this->form_validation->set_rules('frmDate', 'From Date', 'trim|required');
        $this->form_validation->set_rules('toDate', 'To Date', 'trim|required');            
        if ($this->form_validation->run() == FALSE) {
            return $this->index();
        }

        if ($this->input->post('item') ){
            $this->db->select('*')->from('stock_evaluation')->join('itembasket', 'itembasket.id = stock_evaluation.item_id')
           ;
           $this->db->where('itembasket.id',$this->input->post('item'));
           $this->db->where('stock_evaluation.created_date >=', strtotime($this->input->post('item')));
           $this->db->where('stock_evaluation.created_date <=', strtotime($this->input->post('toDate')));
           $this->db->order_by("itembasket.id", "asc");
           $query=$this->db->get();            
           $data['stockLedger'] = $query->result();   
           $this->template->load('default_layout','stockLedgers/index',$data);
        }
       
        
    }
    
   
    
    
}