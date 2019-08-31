<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class issue_model extends CI_Model {
    function __construct() { 
         parent::__construct(); 
    }
    
    
    
    function lists(){
        return $this->db->select('IS.*,EMP.name as employee_name,U.name as created_by_user_name,( SELECT issue_slip_id from return_slip where issue_slip_id = IS.id ) as has_return_slip')
                ->from("issue_slips as IS")
                ->join("employees as EMP","EMP.id = IS.employee_id")
                ->join("users as U","U.id = IS.created_by")
                ->get()->result();
    }
    
    function get_issue_slip($id){
        return $this->db->select('IS.*,EM.name as employee_name,U.name as created_by_name,( SELECT issue_slip_id from return_slip where issue_slip_id = IS.id ) as has_return_slip')
                ->from("issue_slips as IS")
                ->join("employees as EM","EM.id = IS.employee_id")
                ->join("users as U","U.id = IS.created_by ")
                ->where("IS.id",$id)
                ->get()->row();
        //return $this->db->where('id',$id)->get("material_receive_note")->row();
    }
    
    function get_issue_item_details($issue_id){
        return $this->db->select('IT.itemCode,IT.itemName,IS.*')
                ->from("issue_slip_item_details as IS")
                ->join('itembasket as IT',"IT.id = IS.item_id")
                ->where("IS.issue_id",$issue_id)
                ->get()->result();
        
    }
    
    function update_mrn($data,$mrn_id){
        if ( !empty($data) && (int)$mrn_id > 0 ){
            return $this->db->where('id',$mrn_id)->update("material_receive_note",$data);
        }
        return false;
    }
    function delete_mrn($vendor_id){
        if($vendor_id && (int)$vendor_id > 0){
            return $this->db->where('id',$vendor_id)->delete("vendors");
        }
        return false;
    }
}
