<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class return_model extends CI_Model {
    function __construct() { 
         parent::__construct(); 
    }
    
    
    
    function lists(){
        return $this->db->select('RS.*,EMP.name as employee_name,U.name as created_by_user_name,IS.slip_no as issue_slip_no')
                ->from("return_slip as RS")
                ->join("employees as EMP","EMP.id = RS.employee_id")
                ->join("issue_slips as IS","IS.id = RS.issue_slip_id")
                
                ->join("users as U","U.id = RS.created_by")
                ->get()->result();
    }
    
     function get_lssue_item_details($issue_slip_id){
        return $this->db->select("IS.*,IT.itemName,IT.itemCode")
                 ->from("issue_slip_item_details as IS")
                 ->join("itembasket as IT","IT.id = IS.item_id")
                 ->where("issue_id",$issue_slip_id)
                 ->get()->result();
     }
    
    
    function get_return_slip($id){
        
        return $this->db->select('RT.*,EM.name as employee_name,U.name as created_by_name')
                ->from("return_slip as RT")
                ->join("employees as EM","EM.id = RT.employee_id")
                ->join("users as U","U.id = RT.created_by ")
                ->where("RT.id",$id)
                ->get()->row();
    }
    
    function get_return_item_details($return_id){
        return $this->db->select('IT.itemCode,IT.itemName,IT.batch_no,RTD.*')
                ->from("return_item_details as RTD")
                ->join('itembasket as IT',"IT.id = RTD.item_id")
                ->where("RTD.return_slip_id",$return_id)
                ->get()->result();
        
    }
//    
//    function update_mrn($data,$mrn_id){
//        if ( !empty($data) && (int)$mrn_id > 0 ){
//            return $this->db->where('id',$mrn_id)->update("material_receive_note",$data);
//        }
//        return false;
//    }
//    function delete_mrn($vendor_id){
//        if($vendor_id && (int)$vendor_id > 0){
//            return $this->db->where('id',$vendor_id)->delete("vendors");
//        }
//        return false;
//    }
}
