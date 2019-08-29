
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Submodule extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Module_model', 'module');
        $this->load->model('Submodule_model', 'submodule');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        $query = $this->db->get("submodule");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/subModuleView', $data);
    }

    public function subModuleView() {
       
        $query = $this->db->get("submodule");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/subModuleView', $data);
    }

    public function add_submodule_view() {
        
        $query = $this->db->get("module");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/subModule', $data);
    }

    public function submoduleAdd() {
        
        $this->load->model('Submodule_model');
        $data = array(
            'subModuleName' => $this->input->post('subcatName'),
            'subModuleCode' => $this->input->post('subcatCode'),
            'moduleID' => $this->input->post('catName')
        );
        $this->Submodule_model->insert($data);
        $query = $this->db->get("submodule");
        $data['records'] = $query->result();

        $this->template->load('default_layout', 'user_rights/subModuleView', $data);
    }

    function stud($type,$id){
        echo "###############";
    }

}

?>
