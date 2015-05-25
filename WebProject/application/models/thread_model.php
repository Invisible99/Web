<?php

class thread_model extends MY_Model{
    var $tableName="posts";
    var $primkey="berichtID";
    
    function findPosts($id){
        $query = $this->db->query("SELECT posts.berichtID, posts.bericht, posts.postDate, users.username, posts.gebruikerID FROM posts LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.topicID = $id ORDER BY posts.berichtID ASC");
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
        $query = $this->db->query("UPDATE tedxpxl.posts SET latestPost = 0, postDate = postDate WHERE posts.topicID = $id");
        return $query;
    }
    
    function searchPosts($searchstring){
        //pakt alle categorien waar een latestthread aanstaat. hij pakt ook de content van deze de laatste thread in deze categorie
        $query = $this->db->query("SELECT posts.berichtID, posts.bericht, posts.postDate, posts.topicID, users.username FROM posts LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.bericht LIKE '%$searchstring%' OR posts.postDate LIKE '%$searchstring%' OR users.username LIKE '%$searchstring%'");
        
        $result = array();

        return $query->result();
    }
}