<?php

//function getNews(){
// $data = array();
//
// $Q = $this->db->query('SELECT year,month,(SELECT COUNT(id) FROM posts WHERE month = p.`month`) AS c FROM posts p  GROUP BY p.month ORDER BY p.year, p.month');
// if ($Q->num_rows() > 0){
//   foreach ($Q->result_array() as $row){
//     $data[] = $row;
//   }
//}
//$Q->free_result();  
//return $data;
//}
class maand_model extends MY_Model {

    var $tableName = "maanden";
    var $primkey = "maandID";

    function get_months() {
       $query=$this->db->query("SELECT maandID, maandNaam FROM maanden");
       
       return $query->result();
    }
    
    function get_maandnaam($maandID){
        $query=$this->db->query("SELECT maandNaam FROM maanden where maandID=$maandID");
        return $query->result();
    }

}
