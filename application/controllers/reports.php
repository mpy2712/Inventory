<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ItemBasket_model', 'itembasket');
        $this->load->helper("custom_helper");
       
        
    }
    function stockLedgerindex(){
       
        $this->template->load('default_layout', 'stockLedgers/index','');
    }
    function stockSummaryindex(){
       
        $this->template->load('default_layout', 'stockSummarys/index','');
    }
    
    function stockLedgerSearch(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item', 'MRN No', 'trim|required');
        $this->form_validation->set_rules('frmDate', 'From Date', 'trim|required');
        $this->form_validation->set_rules('toDate', 'To Date', 'trim|required');            
        if ($this->form_validation->run() == FALSE) {
            return $this->stockLedgerindex();
        }

        if ($this->input->post('item') )
        {
            $this->db->select('*')->from('stock_evaluation')->join('itembasket', 'itembasket.id = stock_evaluation.item_id')
           ;
           $this->db->where('itembasket.id',$this->input->post('item'));
           $this->db->where('stock_evaluation.created_date >=', strtotime($this->input->post('frmDate')));
           $this->db->where('stock_evaluation.created_date <=', strtotime($this->input->post('toDate')));
           $this->db->order_by("itembasket.id", "asc");
           $query=$this->db->get();            
           $data['stockLedger'] = $query->result();   
           $this->template->load('default_layout','stockLedgers/index',$data);
        }
       
        
    }

    function stockSummarySearch(){
        $this->load->library('form_validation');
       // $this->form_validation->set_rules('item', 'MRN No', 'trim|required');
        $this->form_validation->set_rules('frmDate', 'From Date', 'trim|required');
        $this->form_validation->set_rules('toDate', 'To Date', 'trim|required');            
        if ($this->form_validation->run() == FALSE) {
            return $this->stockSummaryindex();
        }

       
            $this->db->select('*')->from('stock_evaluation')->join('itembasket', 'itembasket.id = stock_evaluation.item_id')
           ;          
           if (!empty($this->input->post('item')))
           {
           $this->db->where('itembasket.id',$this->input->post('item'));
           }
           $this->db->where('stock_evaluation.created_date >=', strtotime($this->input->post('frmDate')));
           $this->db->where('stock_evaluation.created_date <=', strtotime($this->input->post('toDate')));
           $this->db->order_by("itembasket.id", "asc");
           $query=$this->db->get();            
           $data['stockSummary'] = $query->result();          
           $this->template->load('default_layout','stockSummarys/index',$data);
        
       
        
    }
    
   
    
    
}