<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //Show index page
    function index() {
        if (isset($_POST['searchbutton'])) {
            if ($this->input->post('searchstring') != "") {
                //models laden
                $this->load->model("forum_model");
                $this->load->model("subforum_model");
                $this->load->model("thread_model");
                $this->data['error'] = "";
                $this->data['searchstring'] = $this->input->post('searchstring');
                //alle subforums doorzoeken samen met laatste post en thread
                $this->data['subforums'] = $this->forum_model->searchSubforums($this->data['searchstring']);
                $this->data['threads'] = $this->subforum_model->searchThreads($this->data['searchstring']);
                $this->data['posts'] = $this->thread_model->searchPosts($this->data['searchstring']);
                if (empty($this->data['searchstring']) && empty($this->data['threads']) && empty($this->data['posts'])){
                    //de alert-error is vn bootstrap
                    $this->data['error'] = "<div class='alert alert-error'>Deze zoekterm bestaat niet!</div>";
                }
                $this->parser->parse('search/index', $this->data);
            } else{
                redirect(base_url()."forum/index");
            }
        }
        else
        {
            redirect(base_url()."home/index");
        }
    }
}