<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users Model 
 *
 * @author Team TechArise
 *
 * @email info@techarise.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    // declare private variable
    private $_userID;
    private $_name;
    private $_userName;
    private $_email;
    private $_password;
    private $_status;
    private $_finYear;
    private $_finID;
    Private $_finPreFix;

    public function setUserID($userID) {
        $this->_userID = $userID;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

    public function setFinYearID($finYear) {
        $this->_finID = $finYear;
    }

    public function getUserInfo() {
        $this->db->select(array('u.user_id', 'u.name', 'u.email'));
        $this->db->from('users as u');
        $this->db->where('u.user_id', $this->_userID);
        $query = $this->db->get();
        return $query->row_array();
    }

    function login() {       
        $this->db->select('user_id, name, email,id,finYearID');
        $this->db->from('users');
        $this->db->where('user_id', $this->_email);
        $this->db->where('password', $this->_password);
        $this->db->where('finYearID', $this->_finID);
        $this->db->limit(1);
        $query = $this->db->get();
        //print_r($this->db->last_query());
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}

?>