
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model', 'category');
        $this->load->model('Subcategory_model', 'subcategory');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        $query = $this->db->get("subcategory");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/subCategoryView', $data);
    }

    public function subCategoryView() {
       
        $query = $this->db->get("subcategory");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/subCategoryView', $data);
    }

    public function add_subcategory_view() {
        
        $query = $this->db->get("category");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/subCategory', $data);
    }

    public function subcategoryAdd() {
        
        $this->load->model('Subcategory_model');
        $data = array(
            'subCatName' => $this->input->post('subcatName'),
            'subCatCode' => $this->input->post('subcatCode'),
            'catID' => $this->input->post('catName')
        );
        $this->Subcategory_model->insert($data);
        $query = $this->db->get("subcategory");
        $data['records'] = $query->result();

        $this->template->load('default_layout', 'user_rights/subcategoryView', $data);
    }

    function stud($type,$id){
        echo "###############";
    }

}

?>
