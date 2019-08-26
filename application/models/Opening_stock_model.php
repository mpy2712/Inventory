<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Opening_stock_model extends CI_Model {
     function __construct() { 
         parent::__construct(); 
      } 
 public function insert($data) { 
         if ($this->db->insert("openingStock", $data)) { 
            return true; 
         } 
      } 
 public function result_getall() {
        $this->db->join('itembasket', 'openingStock.itemID = itembasket.id');       
        $query = $this->db->get();
        return $query->result();
    
    }    
}