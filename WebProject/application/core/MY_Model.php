<?php

class MY_Model extends CI_Model{
    
    var $tableName=NULL;
    var $primkey='id';
    
    function __construct(){
        parent::__construct();
    }
    function find($id){
        $this->db->from($this->tableName)->where($this->primkey,$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    function findall(){
        $this->db->from($this->tableName);
        $query=$this->db->get();
        return $query->result_array();
    }
    function insert($array){
        return $this->db->insert($this->tableName, $array);  
    }
    function deleteID($idArray){
        return $this->db->delete($this->tableName, $idArray);
    }
    function updateID($dataArray,$idArray){
        return $this->db->update($this->tableName, $dataArray, $idArray);
    }
}

?>
