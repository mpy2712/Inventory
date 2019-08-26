<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role_assignment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($table,$data) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
           
        }
    }

}
