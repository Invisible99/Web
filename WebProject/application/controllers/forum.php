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
    function subforum($categorieID) {
        //model laden
        $this->load->model("subforum_model");
        $this->load->model("forum_model");
        $this->data['error'] = "";
        $this->data['error2'] = "";
        $this->data['subforum'] = $this->subforum_model->findThreads($categorieID);
        $this->data['dezeSub'] = $this->forum_model->find($categorieID);
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
        if (empty($this->data['thread'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen posts!</div>";
        }
        $this->parser->parse('forum/thread', $this->data);
    }

    //Show index page
    function editSubforum($categorieID) {
        //model laden
        $this->load->model("forum_model");
        $this->data['error'] = "";
        $this->data['categorieID'] = $categorieID;
        //alle subforums opvragen samen met laatste post en thread
        $this->data['categorie'] = $this->forum_model->find($categorieID);
    
        if (empty($this->data['categorie'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen subforums!</div>";
        }
  
        $this->parser->parse('forum/editSubforum', $this->data);
    }

    //Show index page
    function doneEditing($categorieID) {
        if (isset($_POST['editcat'])) {
            $this->load->model("forum_model");
            $this->data['forum'] = $this->forum_model->findSubforums();
            print($this->forum_model->updateID(array('titel' => $this->input->post('formtitel'), 'omschrijving' => $this->input->post('formomschrijving')), array('categorieID' => $categorieID)));
            $this->index();
        }
    }

    function wijzigProfiel() {
        if (isset($_POST['editProfile'])) {
            
        } else if (isset($_POST['btn-prfWzg'])) {
            $this->load->library('session');
            $this->load->library('user_agent');
            $this->load->helper('url');
            
            $this->load->model("users_model");
            
            //print($this->session->userdata('user'));
            $this->data['error'] = "";
            
            $this->data['user'] = $this->users_model->findUser($this->session->userdata('user'));
            print_r($this->data['user']);
            $this->parser->parse('forum/wijzigProfiel', $this->data);
            //$this->load->view('forum/wijzigProfiel');
        }
    }

}
