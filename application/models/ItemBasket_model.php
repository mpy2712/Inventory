<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ItemBasket_model extends CI_Model {
     function __construct() { 
         parent::__construct(); 
      } 
 public function insert($data) { 
         if ($this->db->insert("itembasket", $data)) { 
            return true; 
         } 
      } 

     function update_item($item,$condition){
        return $this->db->where("id",$condition)->update("itembasket",$item);
     } 

public function getNewRandHash($length = 10)
{
    $taken = true;
    while ($taken)
    {
        $randstr = '';
            for($i=0; $i<$length; $i++){
            $randnum = mt_rand(0,61);
            if($randnum < 10){
                $randstr .= chr($randnum+48);
            }else if($randnum < 36){
                $randstr .= chr($randnum+55);
            }else{
                $randstr .= chr($randnum+61);
            }
        }
        $randstr = strtoupper($randstr);
         $this->db->where('hash',$randstr);
         $isTakenq = $this->db->get('randaomHash'); 
        if(empty($isTaken))// !user
        {
            return $randstr; // this should exit the while loop
        }
    }
} 
public function insertHash($data) { 
    if ($this->db->insert("randaomhash", $data)) { 
       return true; 
    } 
 }

 function get_item($item_id = null){
    if ( $item_id ){
        return $this->db->where("id",$item_id)->get("itembasket")->row();
    }
 }
 
 function getItemLists(){
     $data = $this->db->select("itembasket.*,( SELECT SUM(stock_in)- SUM(stock_out) from stock_evaluation where item_id = itembasket.id )as stock")
             ->get("itembasket")->result();
     
     if ( !empty($data) ) {
         foreach($data as $key=>$val){
             if ( $val->stock == '' || (int) $val->stock <=0 ){
                 unset($data[$key]);
             }
         }
     }
     return $data;
 }
 
}