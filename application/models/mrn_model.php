<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Mrn_model extends CI_Model {
    function __construct() { 
         parent::__construct(); 
    }
    
    function create($mrn_data){
        if ( !empty($mrn_data) ){
            $this->db->insert("material_receive_note",$mrn_data);
            return $this->db->insert_id();;
        }
        return false;
    }
    
//    function save_item_details($item_details){
//        if ( $item_details  ){
//            $this->db->insert("mrn_items_details",$item_details);
//            return $this->db->insert_id();;
//        }
//        return false;
//    }
    
    function lists(){
        return $this->db->select('MRN.*,VN.name as vendor_name,U.name as created_by_user_name')
                ->from("material_receive_note as MRN")
                ->join("vendors as VN","VN.id = MRN.vendor_id")
                ->join("users as U","U.id = MRN.created_by")
                ->get()->result();
    }
    
    function get_mrn($id){
        return $this->db->where('id',$id)->get("material_receive_note")->row();
    }
    
    function get_mrn_item_details($mrn_id){
        return $this->db->select('IT.itemCode,IT.itemName,MIT.*')
                ->from("mrn_items_details as MIT")
                ->join('itembasket as IT',"IT.id = MIT.item_id")
                ->where("MIT.mrn_id",$mrn_id)
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
