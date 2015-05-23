<?php

class Forum extends CI_Controller {

    //Show index page
    function index() {
        //model laden
        $this->load->model("subforum_model");
        $this->data['error'] = "";
        $this->data['subforums'] = $this->subforum_model->findall();      
        if (empty($this->data['subforums'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen subforums!</div>";
        }
        $this->parser->parse('forum/index', $this->data);
    }
    
    //Show subforum page
    function subforum($categorieID){
        //model laden
        $this->load->model("thread_model");
        $this->data['error'] = "";
        $this->data['threads'] = $this->thread_model->findThreads($categorieID);      
        if (empty($this->data['threads'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn nog geen threads!</div>";
        }
        $this->parser->parse('forum/subforum', $this->data);
    }
    
        //Show index page
    function thread($threadID) {
        //model laden
        $this->load->model("post_model");
        $this->data['error'] = "";
        $this->data['posts'] = $this->post_model->findPosts($threadID);      
        if (empty($this->data['posts'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen posts!</div>";
        }
        $this->parser->parse('forum/thread', $this->data);
    }
}
