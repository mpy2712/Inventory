
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OpeningStock extends CI_Controller {

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
        
        $this->load->model('Opening_stock_model');
        $data = array(
            'itemID' => $this->input->post('item'),
            'qty' => $this->input->post('openingStockQty'),
            'openingDate' => strtotime($this->input->post('openingStockDate'))
        );
        $this->Opening_stock_model->insert($data);
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
