<?php

class Forum extends CI_Controller {

    //Show index page
    function index() {
        $this->load->view('forum/index');
    }
    
    //Show subforum page
    function subforum($categorieID){
        //model laden
        $this->load->model("thread_model");
        $this->data['error'] = "";
        $this->data['threads'] = $this->thread_model->findThreads($categorieID);      
        if (empty($this->data['threads'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen records in de tabel threads.</div>";
        }
        $this->parser->parse('forum/subforum', $this->data);
    }
}
