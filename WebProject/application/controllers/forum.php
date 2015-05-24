<?php

class Forum extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //Show index page
    function index() {
        //model laden
        $this->load->model("forum_model");
        $this->data['error'] = "";
        //alle subforums opvragen samen met laatste post en thread
        $this->data['forum'] = $this->forum_model->findSubforums();
        $this->data['forumNoThread'] = $this->forum_model->findSubforumsNoThread();
        $this->data['addButtonID']=0;//id maakt niet uit maar de controller die add afhandeld moet een int ontvangen
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
        $this->data['subforumNoPost'] = $this->subforum_model->findThreadsNoPost($categorieID);
        $this->data['dezeSub'] = $this->forum_model->find($categorieID);
        $this->data['addButtonID']=$categorieID;
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
            $this->data['error'] = "<div class='alert alert-error'>Dit subforum kan je niet wijzigen!</div>";
        }

        $this->parser->parse('forum/editSubforum', $this->data);
    }
    
    //Show index page
    function deleteSubforum($categorieID) {
        //model laden
        $this->load->model("forum_model");
        $this->data['error'] = "";
        $this->data['categorieID'] = $categorieID;
        //alle subforums opvragen samen met laatste post en thread
        $this->data['categorie'] = $this->forum_model->find($categorieID);

        if (empty($this->data['categorie'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Dit subforum kan je niet verwijderen!</div>";
        }

        $this->parser->parse('forum/deleteSubforum', $this->data);
    }
    
     //Show index page
    function addSubforum($categorieID) {
        //model laden
        $this->data['categorieID'] = $categorieID;
        $this->parser->parse('forum/addSubforum', $this->data);
    }

        
     //Show index page
    function editThread($topicID) {
        //model laden
        $this->load->model("subforum_model");
        $this->data['error'] = "";
        $this->data['topicID'] = $topicID;
        //alle subforums opvragen samen met laatste post en thread
        $this->data['thread'] = $this->subforum_model->find($topicID);

        if (empty($this->data['thread'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Deze thread kan je niet wijzigen!</div>";
        }

        $this->parser->parse('forum/editThread', $this->data);
    }
    
        //Show index page
    function deleteThread($topicID) {
        //model laden
        $this->load->model("subforum_model");
        $this->data['error'] = "";
        $this->data['topicID'] = $topicID;
        //alle subforums opvragen samen met laatste post en thread
        $this->data['thread'] = $this->subforum_model->find($topicID);

        if (empty($this->data['categorie'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Deze thread kan je niet verwijderen!</div>";
        }

        $this->parser->parse('forum/deleteThread', $this->data);
    }
    
    //Show index page
    function addThread($categorieID) {
        //model laden
        $this->data['categorieID'] = $categorieID;
        $this->parser->parse('forum/addThread', $this->data);
    }
    
    //Show index page
    function doneEditing($id) {
        //wijzigen van 
        if (isset($_POST['editcat'])) {
            $this->load->model("forum_model");
            $this->forum_model->updateID(array('titel' => $this->input->post('formtitel'), 'omschrijving' => $this->input->post('formomschrijving')), array('categorieID' => $id));
            redirect(base_url()."forum/index");
        }
        if (isset($_POST['deletecatyes'])) {
            $this->load->model("forum_model");
            $this->forum_model->deleteID(array('categorieID' => $id));
            redirect(base_url()."forum/index");
        }
        if (isset($_POST['deletecatno'])) {
            redirect(base_url()."forum/index");
        }
        if (isset($_POST['editthr'])) {
            $this->load->model("subforum_model");
            $this->subforum_model->updateID(array('titel' => $this->input->post('formtitel'), 'bericht' => $this->input->post('formbericht')), array('topicID' => $id));
            redirect(base_url()."forum/index");
        }
        if (isset($_POST['deletethryes'])) {
            $this->load->model("subforum_model");
            $this->subforum_model->deleteID(array('topicID' => $id));
            redirect(base_url()."forum/index");
        }
        if (isset($_POST['deletethrno'])) {
            redirect(base_url()."forum/index");
        }
        else
        {
            redirect(base_url()."forum/index");
        }
    }
    
    function doneAdding($categorieID) {
        if (isset($_POST['addthr'])) {
            $this->load->model("subforum_model");
            $this->subforum_model->insert(array('gebruikerID' => 1, 'categorieID' => $categorieID, 'titel' => $this->input->post('formtitel'),'bericht' => $this->input->post('formbericht')));
            redirect(base_url()."forum/index");
        }
                if (isset($_POST['addcat'])) {
            $this->load->model("forum_model");
            $this->forum_model->insert(array('titel' => $this->input->post('formtitel'),'omschrijving' => $this->input->post('formomschrijving')));
            redirect(base_url()."forum/index");
        }
        else
        {
            redirect(base_url()."forum/index");
        }
    }

    function wijzigProfiel() {
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url');
        $this->load->helper('path');
        $this->load->model("users_model");
        
        if (isset($_POST['editProfile'])) {
            $wijzigArray = array('username' => $this->input->post('gebruikersnaam'), 'email' => $this->input->post('email'), 'voornaam' => $this->input->post('voornaam'), 'familienaam' => $this->input->post('familienaam'));
            $teWijzigen = array('gebruikerID' => $this->session->userdata('gebruikerID'));
            $result = $this->users_model->updateID($wijzigArray, $teWijzigen);
            if ($result == 1) {
                $this->data['user'] = $this->users_model->find($this->session->userdata('gebruikerID'));
                $this->data['error'] = "<div class='alert alert-success'>Gegevens zijn opgeslagen</div>";

                if (empty($this->data['user'])) {
                    //de alert-error is vn bootstrap
                    $this->data['error'] = "<div class='alert alert-error'>De gebruiker is niet gevonden</div>";
                }

                $this->parser->parse('forum/wijzigProfiel', $this->data);
            }
            //$this->index();
        } else if (isset($_POST['btn-prfWzg'])) {
            print($this->session->userdata('user'));
            $this->data['error'] = "";

            $this->data['user'] = $this->users_model->find($this->session->userdata('gebruikerID'));
            $this->data['foto'] = base_url() . "img/team-1.jpg";

            //print_r($this->data);
            if (empty($this->data['user'])) {
                //de alert-error is vn bootstrap
                $this->data['error'] = "<div class='alert alert-error'>De gebruiker is niet gevonden</div>";
            }

            $this->parser->parse('forum/wijzigProfiel.php', $this->data);
            //$this->load->view('forum/wijzigProfiel');
        } else {
            redirect('home/index/', 'refresh');
        }
    }
}
