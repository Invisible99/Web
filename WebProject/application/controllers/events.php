<?php

class Events extends CI_Controller {

    //Show index page
    function index() {
        $this->load->view('Events/events');
    }
}

