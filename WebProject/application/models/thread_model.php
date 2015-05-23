<?php

class thread_model extends MY_Model{
    var $tableName="threads";
    var $primkey="categorieID";
    
    function findThreads($id){
        $query = $this->db->query("SELECT threads.topicID, threads.titel, threads.bericht, users.username FROM threads LEFT JOIN users ON threads.gebruikerID = users.gebruikerID WHERE threads.categorieID = $id");
        $result = array();

        return $query->result();
    }
}