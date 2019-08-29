
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Module_model', 'module');
        $this->load->model('Submodule_model', 'submodule');
        $this->load->model('UserForm_model', 'userform');
        $this->load->model('Role_assignment_model','role');
    }

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        $query = $this->db->get("role");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/roleCreation', $data);
    }

    public function roleView() {
        $query = $this->db->get("module");
        $data['category'] = $query->result();
        $this->template->load('default_layout', 'user_rights/roleCreation', $data);
    }

    public function add_role() {
        $query = $this->db->get("role");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/roleCreation', $data);
    }

    public function saveRoleData() {
        $this->load->model('Role_assignment_model');
        $data = array(
            'formName' => $this->input->post('frmName'),
            'formUrl' => $this->input->post('frmUrl'),
            'catID' => $this->input->post('catName'),
            'subcatID' => $this->input->post('subcatName'),
            'status' => $this->input->post('status')
        );

        $lastID= $this->Role_assignment_model->insert('role',$data);
        $query = $this->db->get("userform");
        $data['records'] = $query->result();

        $this->template->load('default_layout', 'user_rights/formdataView', $data);
    }

    public function myformAjax($id) {
        $result = $this->db->where("catID", $id)->get("subcategory")->result();

        echo json_encode($result);
    }

}

?>
