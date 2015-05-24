<?php
class users_model extends MY_Model {
  
    var $tableName="users";
    var $primkey="gebruikerID";
    
    var $emailColName="email";
    var $usernameColName="username";    
    var $passwordColName="password";
    var $activeColName="actief"; 
    var $rolIDColName="rolID";
    var $removedRolID=4;
    var $bannedRolID=5;

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
        $this->db->from($this->tableName)->where($this->usernameColName,$username)->where($this->activeColName,1)->where($this->rolIDColName . ' !=', $this->bannedRolID)->where($this->rolIDColName . ' !=', $this->removedRolID);
        $query=$this->db->get();
        return $query->row_array();
    }
    
    function findUser($username){
        $this->db->from($this->tableName)->where($this->usernameColName,$username);
        $query=$this->db->get();
        return $query->result_array();
    }
    
    function findallActive(){
        $this->db->from($this->tableName)->where($this->activeColName,1)->where($this->rolIDColName . ' !=', $this->bannedRolID)->where($this->primkey . ' !=', 1);
        $query=$this->db->get();
        return $query->result_array();
    }
    
    function findallInActive(){
        $this->db->from($this->tableName)->where($this->activeColName,0)->where($this->rolIDColName . ' !=', $this->bannedRolID)->where($this->rolIDColName . ' !=', $this->removedRolID);
        $query=$this->db->get();
        return $query->result_array();
    }
    
    function findallBanned(){
        $this->db->from($this->tableName)->where($this->rolIDColName, $this->bannedRolID);
        $query=$this->db->get();
        return $query->result_array();
    }
}
