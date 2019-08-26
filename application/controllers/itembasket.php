
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ItemBasket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Opening_stock_model', 'openingstock');
        $this->load->model('ItemBasket_model', 'itembasket');
        //$this->load->model('Subcategory_model', 'subcategory');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }       
        $this->template->load('default_layout', 'inventory/itemBasketView', '');
    }

    public function itemBasketView() {
       
        $query = $this->db->get("itembasket");
        $data['records'] = $query->result();          
       $this->template->load('default_layout', 'inventory/itemBasketView', $data);
    }

    public function add_itemBasket_view() {
        
        $query = $this->db->get("itemBasket");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'inventory/itemBasket', $data);
    }

    public function itemBasketAdd() {
        
        $this->load->model('ItemBasket_model');
        $hash=$this->ItemBasket_model->getNewRandHash();
        $data = array(
            'itemName' => $this->input->post('itemName'),
            'itemCode' => $hash,
            'itemDesc' => $this->input->post('itemDesc'),
            'isBatchItem' => $this->input->post('batchItem'),
            'creationDate' => time()
        );        
        $this->ItemBasket_model->insert($data);
        /* Inserting random hash to table  */
        $hashData=array(
            'hash' => $hash,
        );
        $this->ItemBasket_model->insertHash($hashData);

        $query = $this->db->get("itembasket");
        $data['records'] = $query->result();

        $this->template->load('default_layout', 'inventory/itemBasketView', $data);
    }

    function stud($type,$id){
        echo "###############";
    }

}

?>
