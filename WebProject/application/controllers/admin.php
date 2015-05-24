<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    //Show overzichtsplatvorm page
    function index() {
        
    }

    function gebruikerOverzicht() {
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url');
        //hier controle of amdin wel admin is --> deze controle moet eignelijk gebeuren VOOR je in deze method kan geraken, 
        //wnt nrml mag je de dropdown niet zien dan!, ma  toch nog hier ergens zodat als ze de url rechtstreeks ingeven dat ze hier nog niet geraken!!!!
        
        if($this->session->has_userdata('user') && $this->session->has_userdata('logged_in') && $this->session->logged_in && $this->session->has_userdata('rolID')){
            
            $this->data['melding'] = "";
            $this->data['gebruikers'] = $this->users_model->findall();
            if (empty($this->data['gebruikers'])) {
                $this->data['melding'] = "<div class='alert alert-danger'>Er zijn geen records in de tabel users.</div>";
            }
            $this->parser->parse('admin/overzicht_gebruikers.php', $this->data);
        }
        
    }

    function evenementOverzicht() {
        
    }

    //code voor mailmethods uit loigincontroler halen
}
