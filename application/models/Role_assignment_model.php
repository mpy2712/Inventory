<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_assignment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($table,$data) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
           
        }
    }

    function listModuleSubmoduleUserForms(){
        
        $this->db->where("status","Y");
        $query = $this->db->get("module");
        $data['module'] = $query->result_array();
        foreach($data['module'] as $i=>$product) {
            // Get an array of products images
            // Assuming 'p_id' is the foreign_key in the images table
            $this->db->where('moduleID', $product['id']);
            $submodule_query = $this->db->get('submodule')->result_array();         
            // Add the images array to the array entry for this product
            $data['module'][$i]['submodule'] = $submodule_query;

            foreach($data['module'][$i]['submodule'] as $k=>$v)
            {
                // Assuming 'p_id' is the foreign_key in the images table
                $this->db->where('moduleID', $product['id']);
                $this->db->where('subModuleID', $v['id']);
                $userForm_query = $this->db->get('userform')->result_array();         
                // Add the images array to the array entry for this product
                $data['module'][$i]['submodule'][$k]['userForms'] = $userForm_query;
            }
         
         }
         return $data;
    }

    function moduleIDS($fromID)
    {
        return $this->db->select('DISTINCT(mod.id) as mid,mod.moduleName')
        ->from("module as mod")
        ->join("userform as user","user.moduleID = mod.id")  
        ->where("mod.status",'Y')  
        ->where_in("user.id",$formID)  
        ->get()->result();       
        
    }

}
