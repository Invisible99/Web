<?php

class Forum extends CI_Controller {

    //Show index page
    function index() {
        $this->load->view('Forum/index');
    }
}
