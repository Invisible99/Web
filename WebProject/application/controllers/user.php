<?php

class User extends CI_Controller {

    //Show index page
    function index() {
        $this->load->view('index');
    }

    //Show events page
    function events() {
        $this->load->view('events');
    }

    //Show team page
    function team() {
        $this->load->view('team');
    }

    //Show register page
    function register() {
        $this->load->view('index');
    }

}
