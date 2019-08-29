
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userform extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Module_model', 'module');
        $this->load->model('Submodule_model', 'submodule');
        $this->load->model('UserForm_model', 'userform');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        $query = $this->db->get("userform");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/userForms', $data);
    }

    public function formView() {
        $query = $this->db->get("userform");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/formdataview', $data);
    }

    public function add_form() {
        $query = $this->db->get("module");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/userForms', $data);
    }

    public function saveFormData() {
        $this->load->model('UserForm_model');
        $data = array(
            'formName' => $this->input->post('frmName'),
            'formUrl' => $this->input->post('frmUrl'),
            'moduleID' => $this->input->post('catName'),
            'submoduleID' => $this->input->post('subcatName'),
            'status' => $this->input->post('status')
        );

        $this->UserForm_model->insert($data);
        $query = $this->db->get("userform");
        $data['records'] = $query->result();

        $this->template->load('default_layout', 'user_rights/formdataView', $data);
    }

    public function myformAjax($id) {
        $result = $this->db->where("moduleID", $id)->get("submodule")->result();

        echo json_encode($result);
    }

}

?>
