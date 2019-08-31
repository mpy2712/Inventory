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

function getFinancialYearPreFix(){
    $finYearID=$_SESSION['finYear'];
    $CI=&get_instance();    
    return $CI->db->where("id",$finYearID)->get("financialyear")->row();  
}

function getLastSeqNo($type)
{  
     $finYearID=$_SESSION['finYear'];
     $CI=&get_instance();    
     $CI->db->where("finYearID",$finYearID);
    return $CI->db->where("transactionType",$type)->get("sequenceNoByTransactionType")->row();
       

}

function formatNbr($nbr){
    if ($nbr < 10)
        return "000".$nbr;
    elseif ($nbr >= 10 && $nbr < 100 )
        return "00".$nbr;
    else
        return strval($nbr);
    }