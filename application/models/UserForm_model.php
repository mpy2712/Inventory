<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserForm_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        if ($this->db->insert("userform", $data)) {
            return true;
        }
    }

    

}
