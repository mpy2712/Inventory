<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Submodule_model extends CI_Model {
     function __construct() { 
         parent::__construct(); 
      } 
 public function insert($data) { 
         if ($this->db->insert("submodule", $data)) { 
            return true; 
         } 
      } 
}