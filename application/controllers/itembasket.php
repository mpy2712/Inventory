
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ItemBasket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

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
        retrun;
        $this->load->model('ItemBasket_model');
        $hash=$this->ItemBasket_model->getNewRandHash();
        $data = array(
            'itemName' => $this->input->post('itemName'),
            'itemCode' => $hash,
            'itemDesc' => $this->input->post('itemDesc'),
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

    function edit_item_basket($item_id = null){
        if ( $item_id ) { 
            $item_details = $this->itembasket->get_item($item_id);
            
            if ( $item_details ){
                $data['item_info'] = $item_details;
                return $this->template->load('default_layout', 'inventory/itemBasket_edit', $data);
            }
            $this->session->set_flashdata("error","Item not found");
            return redirect("itemBasket/itemBasketView");
        
        }
        $this->session->set_flashdata("error","Required Parameter not found");
        redirect("/itemBasket/itemBasketView");
    }
    function delete($item_id){
        if ( $item_id ){
            $item_details = $this->itembasket->get_item($item_id);
            if ( $item_details ){
                if ( $this->db->where("id",$item_details->id)->delete("itembasket") ){
                    $this->session->set_flashdata("success","Item has been deleted successfully");
                    return redirect("/itemBasket/itemBasketView");
                }
                $this->session->set_flashdata("error","Item not deleted successfully");
                return redirect("/itemBasket/itemBasketView");
                
            }
            $this->session->set_flashdata("error","Item not found");
            return redirect("/itemBasket/itemBasketView");
        }
        $this->session->set_flashdata("error","Required Parameter not found");
        return redirect("/itemBasket/itemBasketView");
    }

    function update_item($item_id){
        if ( $item_id ){
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('item_name', 'Item Name', 'trim|required');
            $this->form_validation->set_rules('item_desc', 'Item Desc', 'trim|required');
            $this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error','All fields are mendetory to fill');
                return redirect("itemBasket/edit_item_basket/".$item_id);
            }
            $data['itemName'] = $this->input->post("item_name");
            $data['itemDesc'] = $this->input->post("item_desc");
            $data['itemCode'] = $this->input->post("item_code");

    
            $updated = $this->itembasket->update_item($data, $item_id);
            if ( $updated ){
                $this->session->set_flashdata("success","Item details has been updated successfully");
                return redirect("itemBasket/itemBasketView");
            }
            return $this->session->set_flashdata("error","Item details not updated successfully.Please try again");
        }
        return $this->session->set_flashdata("error","Item details not updated successfully.Please try again");
            
    }
        
    

     

    function get_item_lists(){

    }

}

?>
