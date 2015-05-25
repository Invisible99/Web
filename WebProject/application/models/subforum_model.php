<?php

class subforum_model extends MY_Model{
    var $tableName="threads";
    var $primkey="topicID";
    
    function findThreads($id){
        $query = $this->db->query("SELECT thr.titel 'thrtitel', thr.topicID 'thrtopicID', thr.bericht, posts.bericht 'lastpost', thr.gebruikerID 'thrGebruikerID', posts.gebruikerID 'postGebruikerID', posts.postDate, users.username FROM posts LEFT JOIN threads thr ON posts.topicID = thr.topicID LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.latestPost = 1 AND thr.categorieID = $id ORDER BY posts.postDate DESC");
        $result = array();

        return $query->result();
    }

    function findEvents($maandID, $curYear) {
            $query = $this->db->query("SELECT thr.topicID, thr.titel, thr.bericht, thr.gebruikerID, thr.categorieID, Date_Format(thr.eventDate,'%a %e %b %Y') 'eventDate', users.username FROM threads thr LEFT JOIN users ON thr.gebruikerID = users.gebruikerID WHERE categorieID = 1 AND month(eventDate)=$maandID AND year(eventDate)=$curYear ORDER BY thr.eventDate");
        return array(
            'query' => $query->result(),
            'count' => count($query->result())
        );
    }
    
    function findThreadsNoPost($id){
        $query = $this->db->query("SELECT * FROM threads WHERE (SELECT COUNT(subpo.latestPost) FROM posts subpo WHERE subpo.latestPost = 1 AND subpo.topicID = threads.topicID) = 0 AND threads.categorieID =$id ORDER BY threads.categorieID ASC");
        $result = array();

        return $query->result();
    }
    
    function selectAllEvents(){
        $query = $this->db->query("SELECT thr.topicID, thr.titel, thr.bericht, thr.gebruikerID, thr.categorieID, Date_Format(thr.eventDate,'%a %e %b %Y') 'eventDate', users.username FROM threads thr LEFT JOIN users ON thr.gebruikerID = users.gebruikerID WHERE categorieID = 1 ORDER BY thr.eventDate ASC");
        return $query->result();
        
    }
    
    function selectAllNieuws(){
        $query = $this->db->query("SELECT thr.topicID, thr.titel, thr.bericht, thr.gebruikerID, thr.categorieID, Date_Format(thr.postDate,'%d-%m-%Y') 'postDate', users.username FROM threads thr LEFT JOIN users ON thr.gebruikerID = users.gebruikerID WHERE categorieID = 4 ORDER BY thr.eventDate DESC");
        return $query->result();
        
    }
    
    function maxID($id){
        $query = $this->db->query("SELECT MAX(topicID) 'maxID' FROM threads WHERE categorieID = $id");
        $result = array();

        return $query->row();
    }
    
    function countID($id){
        $query = $this->db->query("SELECT COUNT(topicID) 'countID' FROM threads WHERE categorieID = $id");
        $result = array();

        return $query->row();
    }
    
    function selectNextEvent(){
        $query = $this->db->query("SELECT titel, min(Date_Format(eventDate,'%M %d-%m, %Y')) 'eventDate', eventDate 'datum' FROM threads WHERE categorieID = 1 AND eventDate >= NOW()");
        return $query->result();
    }
    
    function searchThreads($searchstring){
        //pakt alle categorien waar een latestthread aanstaat. hij pakt ook de content van deze de laatste thread in deze categorie
        $query = $this->db->query("SELECT thr.titel, thr.topicID, thr.bericht FROM threads thr WHERE thr.titel LIKE '%$searchstring%' OR thr.bericht LIKE '%$searchstring%' OR thr.eventdate LIKE '%$searchstring%' OR thr.postDate LIKE '%$searchstring%'");
        
        $result = array();

        return $query->result();
    }
    
    function getLatestNews(){
        $query = $this->db->query("SELECT thr.topicID, thr.titel, thr.bericht, thr.gebruikerID, thr.categorieID, Date_Format(thr.postDate,'%d-%m-%Y') 'postDate', users.username FROM threads thr LEFT JOIN users ON thr.gebruikerID = users.gebruikerID WHERE categorieID = 4 and  thr.topicID=(select max(topicID) from threads)");
        return $query->result();
    }
}
