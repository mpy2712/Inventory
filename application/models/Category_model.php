<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model {
     function __construct() { 
         parent::__construct(); 
      } 
    function insert($data) { 
        return $this->db->insert("category", $data);
    } 
}