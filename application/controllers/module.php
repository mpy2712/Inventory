
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Module_model', 'module');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        $this->template->set('title', 'Module');
        $query = $this->db->get("module");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/moduleView', $data);
    }

    public function module_view() {
        
        $query = $this->db->get("module");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/moduleView', $data);
    }

    public function add_module_view() {
        
        $this->template->load('default_layout', 'user_rights/mainModule', '');
    }

    public function moduleAdd() {
        $this->load->model('Module_model');
        $data = array(
            'moduleName' => $this->input->post('catName'),
            'moduleCode' => $this->input->post('catCode')
        );
        $this->Module_model->insert($data);
        $query = $this->db->get("module");
        $data['records'] = $query->result();

        $this->template->load('default_layout', 'user_rights/moduleView', $data);
    }

}

?>
