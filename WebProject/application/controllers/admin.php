<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');

        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url');

        if (!($this->session->has_userdata('user') && $this->session->has_userdata('logged_in') && $this->session->logged_in && $this->session->has_userdata('rolID') && $this->session->userdata['rolID'] == 1)) {
            $this->session->sess_destroy();
            redirect(base_url() . "login/index");
        }
    }

    //Show overzichtsplatvorm page
    function index() {
        
    }

    function gebruikerOverzicht() {
        $this->data['actievemelding'] = "";
        $this->data['inactievemelding'] = "";
        $this->data['bannedmelding'] = "";     
        $this->data['aantalInactieveGebruikers'] = 0;

        $this->data['actieveGebruikers'] = $this->users_model->findallActive();     
        if (empty($this->data['actieveGebruikers'])) {
            $this->data['actievemelding'] .= "<div class='alert alert-info'>Er zijn geen geactiveerde gebruikers.</div>";
        }

        $this->data['inactieveGebruikers'] = $this->users_model->findallInActive();
        $this->data['aantalInactieveGebruikers'] = count($this->data['inactieveGebruikers']);
        if (empty($this->data['inactieveGebruikers'])) {
            $this->data['inactievemelding'] .= "<div class='alert alert-info'>Er zijn geen gebruikers om te activeren.</div>";
        }

        $this->data['bannedGebruikers'] = $this->users_model->findallBanned();
        if (empty($this->data['bannedGebruikers'])) {
            $this->data['bannedmelding'] .= "<div class='alert alert-info'>Er zijn geen banned gebruikers.</div>";
        }
        $this->parser->parse('admin/overzicht_gebruikers.php', $this->data); //op de vieuw zelf nog controleren of hij wel admin is? kan je rechtstreeks met de url naar die pagina?
    }
    
    /*function geefInactiveUserCount(){
        $this->data['inactieveGebruikers'] = $this->users_model->findallInActive();
    }*/

    //enkel gebruiken voor nog niet geactiveerde gebruikers, deze hebben toch nog niets anders kunnen doen in de database dus die mogen echt verwijderd worden, anderen zal een update moeten gebeuren naar "removed user"
    function deleteGebruiker($gebruikerID) {
        $this->users_model->deleteID(array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function activeerGebruiker($gebruikerID) {
        $this->users_model->updateID(array('actief' => 1), array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function unbanGebruiker($gebruikerID) {
        $this->users_model->updateID(array('rolID' => 2), array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function deactivateGebruiker($gebruikerID) {
        $this->users_model->updateID(array('rolID' => 4, 'username' => 'Removed User', 'email' => $gebruikerID . '@noemail.com', 'actief' => 0), array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function banGebruiker($gebruikerID) {
        $this->users_model->updateID(array('rolID' => 5), array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function bewerkGebruiker($gebruikerID) {
        //$this->users_model->deleteID(array('gebruikerID' => $gebruikerID));
        print_r($gebruikerID);
        //redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function evenementOverzicht() {
        
    }

    //code voor mailmethods uit loigincontroler halen
}
