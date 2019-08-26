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
 
}