<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendor_model extends CI_Model {
    function __construct() { 
         parent::__construct(); 
    }
    
    function create($vendor_data){
        if ( !empty($vendor_data) ){
            return $this->db->insert("vendors",$vendor_data);
        }
        return false;
    }
    
    function lists(){
        return $this->db->get("vendors")->result();
    }
    
    function get_vendor($id){
        return $this->db->where('id',$id)->get("vendors")->row();
    }
    
    function update_vendors($data,$vendor_id){
        if ( !empty($data) && (int)$vendor_id > 0 ){
            return $this->db->where('id',$vendor_id)->update("vendors",$data);
        }
        return false;
    }
    function delete_vendor($vendor_id){
        if($vendor_id && (int)$vendor_id > 0){
            return $this->db->where('id',$vendor_id)->delete("vendors");
        }
        return false;
    }
}
