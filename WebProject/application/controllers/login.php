<?php

class Login extends CI_Controller {

    //Show login page
    function login() {
        $this->load->view('Forum/index');
    }
    
    //Show register page
    function register() {
        $this->load->view('Forum/index');
    }
}
