
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model', 'category');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        $this->template->set('title', 'Category');
        $query = $this->db->get("category");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/categoryView', $data);
    }

    public function category_view() {
        
        $query = $this->db->get("category");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/categoryView', $data);
    }

    public function add_category_view() {
        
        $this->template->load('default_layout', 'user_rights/mainCategory', '');
    }

    public function categoryAdd() {
        $this->load->model('Category_model');
        $data = array(
            'catName' => $this->input->post('catName'),
            'catCode' => $this->input->post('catCode')
        );
        $this->Category_model->insert($data);
        $query = $this->db->get("category");
        $data['records'] = $query->result();

        $this->template->load('default_layout', 'user_rights/categoryView', $data);
    }

}

?>
