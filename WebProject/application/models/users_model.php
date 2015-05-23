<?php
class register extends CI_Model {
  
	public function insert($voornaam, $familienaam, $gebruikersnaam, $email){
            $sql = "INSERT INTO users (rolID, username, password, email, voornaam, familienaam) VALUES(2,'?','test','?','?', '?')";
            $this->db->query($sql, array($gebruikersnaam, $email, $voornaam, $familienaam));
	}
}
