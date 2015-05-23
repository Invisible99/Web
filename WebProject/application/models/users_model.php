<?php
class users_model extends MY_Model {
  
    var $tableName="users";
    var $primkey="gebruikerID";
    
    var $emailColName="email";
    var $usernameColName="username";    
    var $passwordColName="password";
    
    function doesEmailExist($email){
        $this->db->from($this->tableName)->where($this->emailColName,$email);
        $query=$this->db->get();
        return $query->row_array();
    }
    
    function doesUsernameExist($username){
        $this->db->from($this->tableName)->where($this->usernameColName,$username);
        $query=$this->db->get();
        return $query->row_array();
    }
        
    function login($username){
        $this->db->from($this->tableName)->where($this->usernameColName,$username);
        $query=$this->db->get();
        return $query->row_array();
    }
}
