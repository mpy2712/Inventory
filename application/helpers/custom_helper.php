<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_vendor_info($vendor_id){
    if ( $vendor_id && (int)$vendor_id > 0){
         $CI=&get_instance();;
         return $CI->db->where("id",$vendor_id)->get('vendors')->row();
    }
}

function getItems(){
    
         $CI=&get_instance();    
         return $CI->db->get("itembasket")->result();  
}