<?php

class thread_model extends MY_Model{
    var $tableName="posts";
    var $primkey="berichtID";
    
    function findPosts($id){
        $query = $this->db->query("SELECT posts.berichtID, posts.bericht, posts.postDate, users.username FROM posts LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.topicID = $id ORDER BY posts.berichtID ASC");
        $result = array();

        return $query->result();
    }
    
    function maxID($id){
        $query = $this->db->query("SELECT MAX(berichtID) 'maxID' FROM posts WHERE topicID = $id");
        $result = array();

        return $query->row();
    }
    
    function countID($id){
        $query = $this->db->query("SELECT COUNT(berichtID) 'countID' FROM posts WHERE topicID = $id");
        $result = array();

        return $query->row();
    }
    
    function updateLatestPost($id){
        $query = $this->db->query("UPDATE tedxpxl.posts SET latestPost = 1 WHERE posts.berichtID = $id");
        return $query;
    }
    
    function resetAllLatestPost($id){
        $query = $this->db->query("UPDATE tedxpxl.posts SET latestPost = 0 WHERE posts.topicID = $id");
        return $query;
    }
}