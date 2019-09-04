<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Users Controller
     *
     * @author Team TechArise
     *
     * @email info@techarise.com
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'user');
        $this->load->model('common_model','common');
    }

    // Dashboard
    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $data['title'] = 'Dashboard - Inventory';
            $data['metaDescription'] = 'Dashboard';
            $data['metaKeywords'] = 'Dashboard';
            $this->user->setUserID($this->session->userdata('user_id'));
            $data['userInfo'] = $this->user->getUserInfo();
            $this->load->view('users/dashboard', $data);
        }
    }

    // Login
    public function login() {
       
        
        $data['records'] = $this->user->getFinYears();
        //$this->load->view('users/login', $data);
        $this->load->view('users/login', $data);
       
    }

    // Login Action 
    function doLogin() {
       
        // Check form  validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('users/login');
        } else {
           
            $sessArray = array();
            //Field validation succeeded.  Validate against database
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $finYear = $this->input->post('financialYear');

            $this->user->setEmail($email);
            $this->user->setPassword(MD5($password));
            $this->user->setFinYearID($finYear);

            //query the database
            $result = $this->user->login();

            if ($result) {
                
                foreach ($result as $row) {
                    $roles=$this->user->getAssignRoles($row->finYearID);
                    $sessArray = array(
                        'user_id' => $row->user_id,
                        'name' => $row->name,
                        'email' => $row->email,
                        'is_authenticated' => TRUE,
                        'finYear'=>$row->finYear,
                        'user_row_id'=>$row->id,
                        'finYear'=>$row->finYearID,
                        'allowedModule'=>json_decode(json_encode($roles), true)
                    );
                    $this->session->set_userdata($sessArray);
                }
               
                redirect('dashboard/index');
            } else {
                redirect('users/login?msg=1');
            }
        }
    }

    // Logout
    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_authenticated');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('login');
    }
    
    
    function lists(){
        $data['userLists'] = $this->user->get_user_lists();
        $this->template->load('default_layout', 'users/index',$data);
    }
    
    function register(){
        if ( $this->input->post() ){
            
            $data['user_id'] = $this->input->post('email');   
            $data['password'] = md5($this->input->post('password'));   
            $data['userName'] = strtolower($this->input->post('name'));
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['finYearID'] = $this->input->post('fin_year');
            $data['roleID']=$this->input->post('role');
            
            
            $data['dob'] = date("Y-m-d", strtotime($this->input->post('dob')));
            $data['isAdmin'] = 0;
            $data['created_by'] = $this->session->userdata('user_row_id');
            $data['created_date'] = date("Y-m-d h:i:s a", strtotime($this->input->post("created_date")));
            $data['locked'] = 0;
            
            
            if ( $this->common->insert_record('users',$data)){
                $this->session->set_flashdata('success','User has been created');
                return redirect("/users/lists");
            }else{
                $this->session->set_flashdata('error','User not created,Try again');
                return redirect("/users/lists");
            }
            
        }
        $data['title']='Create User';
        $data['fin_year'] = $this->user->getFinYears();
        $data['role'] = $this->user->getRoles();
        $this->template->load('default_layout', 'users/register',$data);
    }
    
    function delete($user_id){
        if ( !$user_id || (int)$user_id <= 0 ){
            redirect("/users/lists");
        }
        
         if ( $this->common->update_record('users',['locked'=>1],['id'=>$user_id])){
            $this->session->set_flashdata('success','User has been deleted successfully');
            return redirect("/users/lists");
        }else{
            $this->session->set_flashdata('error','User not updated,Try again');
            return redirect("/users/lists");
        }
    }
    function edit($user_id){
        if ( $this->input->post() ){
            
            $data['user_id'] = $this->input->post('email');   
            $data['userName'] = strtolower($this->input->post('name'));
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['finYearID'] = $this->input->post('fin_year');
            $data['locked'] = 1;
            
            
            $data['dob'] = date("Y-m-d", strtotime($this->input->post('dob')));
            $data['created_by'] = $this->session->userdata('user_row_id');
            
            
            if ( $this->common->update_record('users',$data,['id'=>$user_id])){
                $this->session->set_flashdata('success','User has been updated successfully');
                return redirect("/users/lists");
            }else{
                $this->session->set_flashdata('error','User not updated,Try again');
                return redirect("/users/lists");
            }
            
        }
        
        if ( !$user_id || (int)$user_id <= 0 ){
            redirect("/users/lists");
        }
        
        $data['title']='Edit User';
        $data['fin_year'] = $this->user->getFinYears();
        $data['user_info'] = $this->common->get_single_record('users',['id'=>$user_id]);
       
        $this->template->load('default_layout', 'users/edit',$data);
        
    }

}

?>