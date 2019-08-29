<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ItemBasket_model', 'itembasket');
       
        
    }
    function index(){
        $query = $this->db->get("itembasket");
        $data['records'] = $query->result(); 
        $this->template->load('default_layout', 'stockLedgers/index',$data);
    }
    
    function stockLedgerSearch(){
        if ($this->input->post('item') ){
            $this->db->select('*')->from('stock_evaluation')->join('itembasket', 'itembasket.id = stock_evaluation.item_id')
           ;
           $this->db->where('itembasket.id',$this->input->post('item'));
           $this->db->order_by("itembasket.id", "asc");
           $query=$this->db->get();
            //$query = $this->db->get("openingStock");
            $data['stockLedger'] = $query->result();   
            $this->template->load('default_layout','stockLedgers/index',$data);
        }
       
        
    }
    
   
    
    
}