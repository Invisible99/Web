<?php

class Forum extends CI_Controller {

    //Show index page
    function index() {
        //model laden
        $this->load->model("forum_model");
        $this->data['error'] = "";
        //alle subforums opvragen samen met laatste post en thread
        $this->data['forum'] = $this->forum_model->findSubforums();      
        if (empty($this->data['forum'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen subforums!</div>";
        }
        $this->parser->parse('forum/index', $this->data);
    }
    
    //Show subforum page
    function subforum($categorieID){
        //model laden
        $this->load->model("subforum_model");
        $this->load->model("forum_model");
        $this->data['error'] = "";
        $this->data['error2'] = "";
        $this->data['subforum'] = $this->subforum_model->findThreads($categorieID);
        $this->data['dezeSub'] = $this->forum_model->find($categorieID); 
        $this->data['titel'] = $this->data['dezeSub']['titel'];
        $this->data['omschrijving'] = $this->data['dezeSub']['omschrijving'];
        print_r($this->data['titel']);
        print_r($this->data['omschrijving']);
        if (empty($this->data['subforum'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn nog geen threads!</div>";
        }
        $this->parser->parse('forum/subforum', $this->data);
    }
    
        //Show index page
    function thread($threadID) {
        //model laden
        $this->load->model("thread_model");
        $this->load->model("subforum_model");
        $this->data['error'] = "";
        $this->data['thread'] = $this->thread_model->findPosts($threadID);
        $this->data['dezeThread'] = $this->subforum_model->find($threadID); 
        //!!!Element uit mysql result halen
        $this->data['thrtitel'] = $this->data['dezeThread']['titel'];
        $this->data['thrbericht'] = $this->data['dezeThread']['bericht'];
        $this->data['categorieID'] = $this->data['dezeThread']['categorieID'];
        if (empty($this->data['thread'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen posts!</div>";
        }
        $this->parser->parse('forum/thread', $this->data);
    }
}
