<?php

class forum_model extends MY_Model{
    var $tableName="categories";
    var $primkey="categorieID";
    
    function findSubforums(){
        $query = $this->db->query("SELECT cat.categorieID, cat.titel, cat.omschrijving, thr.titel 'thrtitel', thr.topicID, posts.bericht, users.username FROM categories cat LEFT JOIN threads thr ON cat.categorieID = thr.categorieID LEFT JOIN posts ON thr.topicID = posts.topicID LEFT JOIN users ON posts.gebruikerID = users.gebruikerID  WHERE posts.latestPost = 1 AND thr.latestThread = 1 ORDER BY cat.categorieID ASC");
        $result = array();

        return $query->result();
    }
    
    function findSubforumsNoThread(){
        $query = $this->db->query("SELECT * FROM categories WHERE (SELECT COUNT(subthr.latestThread) FROM threads subthr WHERE subthr.latestThread = 1 AND subthr.categorieID = categories.categorieID) = 0 ORDER BY categories.categorieID ASC");
        $result = array();

        return $query->result();
    }
}