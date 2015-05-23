<?php

class testModelUsers extends CI_Model {

    function getUsers() {
        $querygebruiker = $this->db->query("SELECT * FROM users");
        $results = "";
        foreach ($querygebruiker->result() as $row) {
            $gebruikerID = $row->gebruikerID;
            $rolID = $row->rolID;
            $username = $row->username;
            $password = $row->password;
            $email = $row->email;

            $results .= $gebruikerID . " " . $rolID . " " . $username . " " . $password . " " . $email . "<br/>";
        }
        return $results;
    }

}
