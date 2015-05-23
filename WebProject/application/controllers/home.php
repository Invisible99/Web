<?php

class Home extends CI_Controller {

    //Show index page
    function index() {
        $this->load->view('home/index');
    }

    //Show events page
    function events() {
        $this->load->view('home/events');
    }

    //Show register page
    function register() {
        $this->load->view('home/register');
    }
    
    //Show contact page
    function contact() {
        $this->load->view('home/contact');
    }
}
