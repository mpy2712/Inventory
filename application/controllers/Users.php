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
    }

    // Dashboard
    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $data['title'] = 'Dashboard - Tech Arise';
            $data['metaDescription'] = 'Dashboard';
            $data['metaKeywords'] = 'Dashboard';
            $this->user->setUserID($this->session->userdata('user_id'));
            $data['userInfo'] = $this->user->getUserInfo();
            $this->load->view('users/dashboard', $data);
        }
    }

    // Login
    public function login() {
       
        $this->db->select("*");     
        $this->db->from("financialYear");
        $this->db->where('status','Active');
        $query = $this->db->get();
        $data['records'] = $query->result();
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
                    $sessArray = array(
                        'user_id' => $row->user_id,
                        'name' => $row->name,
                        'email' => $row->email,
                        'is_authenticated' => TRUE,
                        'finYear'=>$row->finYearID
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

}

?>