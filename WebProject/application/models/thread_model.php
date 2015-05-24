<?php

class thread_model extends MY_Model{
    var $tableName="posts";
    var $primkey="categorieID";
    
    function findPosts($id){
        $query = $this->db->query("SELECT posts.berichtID, posts.bericht, posts.postDate, users.username FROM posts LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.topicID = $id ORDER BY posts.berichtID ASC");
        $result = array();

        return $query->result();
    }
  
}