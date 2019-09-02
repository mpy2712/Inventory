
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Module_model', 'module');
        $this->load->model('Submodule_model', 'submodule');
        $this->load->model('UserForm_model', 'userform');
        $this->load->model('Role_assignment_model','role');
        $this->load->model("common_model");
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
        $data = $this->role->listModuleSubmoduleUserForms();      
        $this->template->load('default_layout', 'user_rights/roleCreation', $data);
    }

    public function add_role() {
        $query = $this->db->get("role");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/roleCreation', $data);
    }

    public function saveRoleData() {
        $modRes=$this->role->moduleIDS($this->input->post('role_form'));              
        $modAllowed=implode(',',$modRes);   
        $this->load->model('Role_assignment_model');
        $data = array(
            'roleName' => $this->input->post('roleName'),
            'roleStatus' => $this->input->post('status'),
            'moduleAllowed' => $modAllowed,
            'createdDate' => time()
        );

        $lastID= $this->Role_assignment_model->insert('role',$data);
        foreach($this->input->post('role_form') as $key => $val)
        {
            if($this->input->post('add')[$val]==1)
                $add=1;
            else
                $add=0;
            
            if($this->input->post('edit')[$val]==1)
                $edit=1;
            else
                $edit=0;
            
            if($this->input->post('delete')[$val]==1)
                $delete=1;
            else
                $delete=0;
            
            if($this->input->post('view')[$val]==1)
                $view=1;
            else
                $view=0;
            
            if($this->input->post('approval')[$val]==1)
                $approval=1;
            else
                $approval=0;

            $permission=$add.','.$edit.','.$delete.','.$view.','.$approval;    
            
            $dataDetails = array(
                'roleID' => $lastID,
                'moduleID' => $this->input->post('moduleid')[$val],
                'userFormID'=>$val,
                'rolePermission'=>$permission,
                'isAdd'=>$add,
                'isEdit'=>$edit,
                'isDelete'=>$delete,
                'isView'=>$view,
                'isApprove'=>$approval  
            );    
        
            $this->common_model->insert_record('roledetails',$dataDetails);
           

        }
        $query = $this->db->get("role");
        $data['records'] = $query->result();
        $this->template->load('default_layout', 'user_rights/formdataView', $data);
    }

    public function myformAjax($id) {
        $result = $this->db->where("catID", $id)->get("subcategory")->result();
        echo json_encode($result);
    }

}

?>
