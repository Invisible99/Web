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
}
