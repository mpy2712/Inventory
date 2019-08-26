<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model {
     function __construct() { 
         parent::__construct(); 
      } 
 public function insert($data) { 
         if ($this->db->insert("category", $data)) { 
            return true; 
         } 
      } 
}