
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OpeningStock extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Opening_stock_model', 'openingstock');
        $this->load->model('ItemBasket_model', 'itembasket');
        $this->load->helper("custom_helper");
        $this->load->model("common_model");
       
        //$this->load->model('Subcategory_model', 'subcategory');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        $query = $this->db->get("itemBasket");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'inventory/openingStockView', $data);
    }

    public function openingStockView() {
       
        $this->db->select('*')->from('openingstock')->join('itembasket', 'itembasket.id = openingstock.itemID');
        $query=$this->db->get();
        //$query = $this->db->get("openingStock");
        $data['records'] = $query->result();           
       $this->template->load('default_layout', 'inventory/openingStockView', $data);
    }

    public function add_openingStock_view() {
        
        $query = $this->db->get("itemBasket");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'inventory/openingStock', $data);
    }

    public function openingStockAdd() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('item', 'Item', 'trim|required');
        $this->form_validation->set_rules('openingStockDate', 'Opening Date', 'trim|required');
        
        $this->form_validation->set_rules('openingStockQty', 'Qty', 'trim|required');
       
        
        
        
        if ($this->form_validation->run() == FALSE) {
            return $this->add_openingStock_view();
        }
        

        $finPreFix=getFinancialYearPreFix();
        $lastInsertSequence=getLastSeqNo('OP');
        $lastSequenceNo=$lastInsertSequence->sequenceNumber+1;      
        $formattedNumber=formatNbr($lastSequenceNo);
       
        $this->load->model('Opening_stock_model');
        $opNumber="OP"."/".$finPreFix->preFix."/".$formattedNumber;      
        $data = array(
            'itemID' => $this->input->post('item'),
            'qty' => $this->input->post('openingStockQty'),
            'openingNumber'=>$opNumber,
            'openingDate' => strtotime($this->input->post('openingStockDate'))
        );
        //$this->Opening_stock_model->insert($data);

        $transaction_detail_id = $this->Opening_stock_model->insert($data);;
                        
        if ( $transaction_detail_id ){
            // Stock Evaluation
        
            $stock['item_id'] = $this->input->post('item');
            $stock['transaction_id'] = $transaction_detail_id;
            $stock['transaction_detail_id'] = $transaction_detail_id;
            $stock['stock_in'] = $this->input->post('openingStockQty');
            $stock['transaction_type'] = 'op';
            $stock['created_date'] = strtotime(date("Y-m-d h:i:s"));
            $this->common_model->insert_record('stock_evaluation',$stock);
        }
        $lastSeq['sequenceNumber']=$formattedNumber;
        $conditions['finYearID']=$_SESSION['finYear'];
        $conditions['transactionType']='OP';
        $this->common_model->update_record('sequencenobytransactiontype',$lastSeq,$conditions);
       
       
        $this->db->select('*')->from('openingstock')->join('itembasket', 'itembasket.id = openingstock.itemID');
        $query=$this->db->get();
        //$query = $this->db->get("openingStock");
        $data['records'] = $query->result();   

        $this->template->load('default_layout', 'inventory/openingStockView', $data);
    }

    function stud($type,$id){
        echo "###############";
    }

}

?>
