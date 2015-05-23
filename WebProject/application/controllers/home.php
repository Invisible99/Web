<?php

class Home extends CI_Controller {

    //Show index page
    function index() {
        $this->load->view('index');
    }

    //Show events page
    function events() {
        $this->load->view('events');
    }

    //Show register page
    function register() {
        $this->load->view('register');
    }

    //Show contact page
    function contact() {
        $this->load->view('contact');
    }

    //eerste testqry uitvoeren
    function query() {
        /* $this->load->model("testModelUsers");

          $this->data['user'] = $this->testModelUsers->getUsers(); //dit is niet 100% juist eigenlijk zou de model enkel de QRY moeten uitvoeren en dan hier controle of het resultaat niet leeg is

          if(empty($this->data['user'])){
          $this->data['error'] = "Er zijn geen records gevonden in de tabel.";
          }
          else{
          $this->data['error'] = "";
          }

          $this->parser->parse('inloggen_view.html',  $this->data); */

        $this->load->model("tblgebruikers_model"); //model laden
        $this->data['error'] = "";
        $this->data['gebruikers'] = $this->tblgebruikers_model->findall(); //alle records uit de DB halen zie koen voor uitleg
        if (empty($this->data['gebruikers'])) {
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen records in de tabel users.</div>"; //de alert-error is vn bootstrap
        }
        $this->parser->parse('overzichtUsers_view.html', $this->data);
    }

}
