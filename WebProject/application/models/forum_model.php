<?php

class forum_model extends MY_Model{
    var $tableName="categories";
    var $primkey="categorieID";
    
    function findSubforums(){
        //pakt alle categorien waar een latestthread aanstaat. hij pakt ook de content van deze de laatste thread in deze categorie
        $query = $this->db->query("SELECT cat.categorieID, cat.titel, cat.omschrijving, thr.titel 'thrtitel', thr.topicID, posts.bericht, posts.postDate, users.username FROM categories cat LEFT JOIN threads thr ON cat.categorieID = thr.categorieID LEFT JOIN posts ON thr.topicID = posts.topicID LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.latestPost = 1 AND posts.berichtID = (SELECT MAX(subpo.berichtID) FROM posts subpo LEFT JOIN threads subthr ON subpo.topicID = subthr.topicID WHERE subthr.categorieID = cat.categorieID) ORDER BY cat.categorieID ASC");
        $result = array();

        return $query->result();
    }
    
    function findSubforumsNoThread(){
        //pakt alle categorien waar geen latestthread aanstaat. Hij limiteert dit tot 1 entry per categorie. hij pakt een categorie ook mee als hij ziet dat er helemaal niet instaat
        $query = $this->db->query("SELECT cat.categorieID, cat.titel, cat.omschrijving FROM categories cat LEFT JOIN threads thr ON cat.categorieID = thr.categorieID LEFT JOIN posts ON thr.topicID = posts.topicID LEFT JOIN users ON posts.gebruikerID = users.gebruikerID
WHERE
(((SELECT COUNT(subpo.latestPost) FROM posts subpo LEFT JOIN threads subthr ON subpo.topicID = subthr.topicID WHERE subpo.latestpost = 1 AND subthr.categorieID = cat.categorieID) = 0)
AND
(thr.topicID = (SELECT MAX(subthr.topicID) FROM threads subthr WHERE subthr.categorieID = cat.categorieID)))
OR
((SELECT COUNT(subthr.topicID) FROM threads subthr WHERE subthr.categorieID = cat.categorieID) = 0)
ORDER BY cat.categorieID ASC");
        $result = array();

        return $query->result();
    }
    
    function searchSubforums($searchstring){
        //pakt alle categorien waar een latestthread aanstaat. hij pakt ook de content van deze de laatste thread in deze categorie
        $query = $this->db->query("SELECT cat.categorieID, cat.titel, cat.omschrijving FROM categories cat WHERE cat.titel LIKE '%$searchstring%' OR cat.omschrijving LIKE '%$searchstring%'");
    
        $result = array();

        return $query->result();
    }
}