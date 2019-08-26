<?php

class Dashboard extends CI_Controller {

    public function index() {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login');
        }
        //$this->load->view('signUpView');
        $this->template->load('default_layout', 'signUpView', '');
    }

}
