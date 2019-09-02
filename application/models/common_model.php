<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {
    function __construct() { 
         parent::__construct(); 
    }
    
    function insert_record($table_name,$record){
        $this->db->insert($table_name,$record);
        return $this->db->insert_id();;
    }
    function update_record($table_name,$record,$conditions){
        if ( !empty($conditions) ){
            foreach($conditions as $key=>$val){
                $this->db->where($key,$val);
            }
            return $this->db->update($table_name,$record);
        }
    }
    
    function delete_record($table_name,$conditions){
        if ( !empty($conditions) ){
            foreach($conditions as $key=>$val){
                $this->db->where($key,$val);
            }
            return $this->db->delete($table_name);
        }
    }
    function get_single_record($tableName,$conditions){
        if ( !empty($conditions) ){
            foreach($conditions as $key=>$val){
                $this->db->where($key,$val);
            }
            return $this->db->get($tableName)->row();
        }
    }
    
    function get_all_records($table_name,$conditions=[]){
        if ( !empty($conditions) ){
            foreach($conditions as $key=>$val){
                $this->db->where($key,$val);
            }
            
        }
        return $this->db->get($table_name)->result();
    }
    
    
    
}
