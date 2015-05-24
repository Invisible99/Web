<?php

class subforum_model extends MY_Model{
    var $tableName="threads";
    var $primkey="categorieID";
    
    function findThreads($id){
        $query = $this->db->query("SELECT thr.titel 'thrtitel', thr.topicID 'thrtopicID', posts.bericht 'lastpost', posts.gebruikerID, users.username FROM posts LEFT JOIN threads thr ON posts.topicID = thr.topicID LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.latestPost = 1 AND thr.categorieID = $id");
        $result = array();

        return $query->result();
    }
}