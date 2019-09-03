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

    function getCountRecords($table_name,$conditions=[]){       
        $this->db->select('count(id) as totalRecords');
        return $this->db->get($table_name)->result();
    }

    function getMonthWiseStockSummary()
    {
        $conditions=array('id'=>$_SESSION['finYear']);
        $finData=$this->get_single_record('financialyear',$conditions);  
       
        $this->db->select('sum(stock_evaluation.stock_in) as StockIN,sum(stock_evaluation.stock_out) as StockOUT,itembasket.itemName as itemName,itembasket.ItemCode as ItemCode')->from('stock_evaluation')->join('itembasket',
       'itembasket.id = stock_evaluation.item_id') ;          
        $this->db->where('stock_evaluation.created_date >=', $finData->finYearStartDate);
        $this->db->where('stock_evaluation.created_date <=', $finData->finYearEndDate);
        $this->db->order_by("itembasket.id", "asc");
        $this->db->group_by("itembasket.id");
        return $this->db->get()->result(); 
    }
    
    
    
}
