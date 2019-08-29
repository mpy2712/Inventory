<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_model extends CI_Model {
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
       return $this->db->select("EMP.*,U.name as created_by_name")
                ->from('employees as EMP')
                ->join('users as U','U.id = EMP.created_by')
                ->get()->result();
        
    }
    
    function get_employee($id){
        return $this->db->where('id',$id)->get("employees")->row();
    }
    
    function update_employee($data,$emp_id){
        if ( !empty($data) && (int)$emp_id > 0 ){
            return $this->db->where('id',$emp_id)->update("employees",$data);
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
