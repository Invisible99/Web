<?php

class subforum_model extends MY_Model {

    var $tableName = "threads";
    //is de primary key niet topicID???
    var $primkey = "categorieID";

    function findThreads($id) {
        $query = $this->db->query("SELECT thr.titel 'thrtitel', thr.topicID 'thrtopicID', thr.bericht, posts.bericht 'lastpost', posts.gebruikerID, users.username FROM posts LEFT JOIN threads thr ON posts.topicID = thr.topicID LEFT JOIN users ON posts.gebruikerID = users.gebruikerID WHERE posts.latestPost = 1 AND thr.categorieID = $id");
        $result = array();

        return $query->result();
    }

    function findEvents($maandID, $curYear) {
            $query = $this->db->query("SELECT thr.topicID, thr.titel, thr.bericht, thr.gebruikerID, thr.categorieID, Date_Format(thr.eventDate,'%a %e %b %Y') 'eventDate', users.username FROM threads thr LEFT JOIN users ON thr.gebruikerID = users.gebruikerID WHERE categorieID = 1 AND month(eventDate)=$maandID AND year(eventDate)=$curYear ORDER BY eventDate");
        return array(
            'query' => $query->result(),
            'count' => count($query->result())
        );
    }
    
    function selectAllEvents(){
        $query = $this->db->query("SELECT thr.topicID, thr.titel, thr.bericht, thr.gebruikerID, thr.categorieID, Date_Format(thr.eventDate,'%a %e %b %Y') 'eventDate', users.username FROM threads thr LEFT JOIN users ON thr.gebruikerID = users.gebruikerID ORDER BY eventDate");
        return $query->result();
        
    }
    

}
