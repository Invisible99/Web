<?php

class Forum extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('user_agent');
    }

    //Show index page
    function index() {
        //model laden
        $this->load->model("forum_model");
        $this->data['error'] = "";
        //alle subforums opvragen samen met laatste post en thread
        $this->data['forum'] = $this->forum_model->findSubforums();
        $this->data['forumNoThread'] = $this->forum_model->findSubforumsNoThread();
        $this->data['addButtonID'] = 0; //id maakt niet uit voor een categorie toe te voegen maar de controller die add afhandeld moet een int ontvangen
        if (empty($this->data['forum']) && empty($this->data['forumNoThread'])) {
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
        $this->data['addButtonID'] = $categorieID;
        if (empty($this->data['subforum']) && empty($this->data['subforumNoPost'])) {
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
        $this->data['addButtonID'] = $threadID;
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

        if (empty($this->data['thread'])) {
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
    function editPost($postID) {
        //model laden
        $this->load->model("thread_model");
        $this->data['error'] = "";
        $this->data['postID'] = $postID;
        //alle subforums opvragen samen met laatste post en thread
        $this->data['post'] = $this->thread_model->find($postID);
        if (empty($this->data['post'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Deze post kan je niet wijzigen!</div>";
        }

        $this->parser->parse('forum/editPost', $this->data);
    }

    //Show index page
    function deletePost($postID) {
        //model laden
        $this->load->model("thread_model");
        $this->data['error'] = "";
        $this->data['postID'] = $postID;
        //alle subforums opvragen samen met laatste post en thread
        $this->data['post'] = $this->thread_model->find($postID);

        if (empty($this->data['post'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Deze post kan je niet verwijderen!</div>";
        }

        $this->parser->parse('forum/deletePost', $this->data);
    }

    //Show index page
    function addPost($topicID) {
        //model laden
        $this->data['topicID'] = $topicID;
        $this->parser->parse('forum/addPost', $this->data);
    }

    //Show index page
    function doneEditing($id) {
        //wijzigen van 
        if (isset($_POST['editcat'])) {
            //$id is categorieid
            $this->load->model("forum_model");
            $this->forum_model->updateID(array('titel' => $this->input->post('formtitel'), 'omschrijving' => $this->input->post('formomschrijving')), array('categorieID' => $id));
            redirect(base_url() . "forum/index");
        }
        if (isset($_POST['deletecatyes'])) {
            //$id is categorieid
            $this->load->model("forum_model");
            $this->forum_model->deleteID(array('categorieID' => $id));
            redirect(base_url() . "forum/index");
        }
        if (isset($_POST['deletecatno'])) {
            redirect(base_url() . "forum/index");
        }
        if (isset($_POST['editthr'])) {
            //$id is threadid
            $this->load->model("subforum_model");
            //Huidige post opvragen
            $this->data['thread'] = $this->subforum_model->find($id);
            //thread updaten
            $this->subforum_model->updateID(array('titel' => $this->input->post('formtitel'), 'bericht' => $this->input->post('formbericht')), array('topicID' => $id));
            redirect(base_url() . "forum/subforum/" . $this->data['thread'][0]['categorieID']);
        }
        if (isset($_POST['deletethryes'])) {
            //$id is threadid
            $this->load->model("subforum_model");
            //Huidige post opvragen
            $this->data['thread'] = $this->subforum_model->find($id);
            //Kijken of dit dat laatste thread is
            $this->data['countID'] = $this->subforum_model->countID($this->data['thread'][0]['categorieID']);
            $this->subforum_model->deleteID(array('topicID' => $id));
            redirect(base_url() . "forum/subforum/" . $this->data['thread'][0]['categorieID']);
        }
        if (isset($_POST['deletethrno'])) {
            //$id is threadid
            $this->load->model("subforum_model");
            //Huidige post opvragen
            $this->data['thread'] = $this->subforum_model->find($id);
            redirect(base_url() . "forum/subforum/" . $this->data['thread'][0]['categorieID']);
        }
        if (isset($_POST['editpost'])) {
            //$id is berichtid
            $this->load->model("thread_model");
            //Huidige post opvragen
            $this->data['post'] = $this->thread_model->find($id);
            //post updaten
            $this->thread_model->updateID(array('bericht' => $this->input->post('formbericht')), array('berichtID' => $id));
            redirect(base_url() . "forum/thread/" . $this->data['post'][0]['topicID']);
        }
        if (isset($_POST['deletepostyes'])) {
            //$id is berichtid
            $this->load->model("thread_model");
            //Huidige post opvragen
            $this->data['post'] = $this->thread_model->find($id);
            //Kijken of dit dat enigste post is
            $this->data['countID'] = $this->thread_model->countID($this->data['post'][0]['topicID']);
            if ($this->data['countID']->countID > 1) {
                //hoogste post ID van deze thread ophalen
                $this->data['maxID'] = $this->thread_model->maxID($this->data['post'][0]['topicID']);
                //als dit de latestpost is moet de vorige post de latestpost worden
                if ($this->data['maxID']->maxID == $id) {
                    //post deleten
                    $this->thread_model->deleteID(array('berichtID' => $id));
                    //nieuwe laatste id berekenen
                    $this->data['newmaxID'] = $this->thread_model->maxID($this->data['post'][0]['topicID']);
                    //nieuwe latestpost op 1 zetten
                    $this->thread_model->updateLatestPost($this->data['newmaxID']->maxID);
                }
                //anders gewoon deleten
                else {
                    $this->thread_model->deleteID(array('berichtID' => $id));
                }
            }
            //indien dit de enigste post is kan men veilig verwijderen
            else {
                $this->thread_model->deleteID(array('berichtID' => $id));
                redirect(base_url() . "forum/thread/" . $this->data['post'][0]['topicID']);
            }
            redirect(base_url() . "forum/thread/" . $this->data['post'][0]['topicID']);
        }
        if (isset($_POST['deletepostno'])) {
            //$id is berichtid
            $this->load->model("thread_model");
            //Huidige post opvragen
            $this->data['post'] = $this->thread_model->find($id);
            redirect(base_url() . "forum/thread/" . $this->data['post'][0]['topicID']);
        } else {
            redirect(base_url());
        }
    }

    function doneAdding($id) {
        if (isset($_POST['addthr'])) {
            $this->load->model("subforum_model");
            $this->subforum_model->insert(array('gebruikerID' => $this->session->userdata['gebruikerID'], 'categorieID' => $id, 'titel' => $this->input->post('formtitel'), 'bericht' => $this->input->post('formbericht')));
            redirect(base_url() . "forum/subforum/" . $id);
        }
        if (isset($_POST['addcat'])) {
            $this->load->model("forum_model");
            $this->forum_model->insert(array('titel' => $this->input->post('formtitel'), 'omschrijving' => $this->input->post('formomschrijving'), 'magZienTot' => $this->input->post('categorieZien'), 'magPosten' => $this->input->post('postsZien'), 'magThreadsBewerken' => $this->input->post('threadsBewerken')));
            redirect(base_url() . "forum/index");
        }
        if (isset($_POST['addpost'])) {
            $this->load->model("thread_model");
            $this->load->model("subforum_model");
            //alle latestpost voor deze thread op nul zetten
            $this->thread_model->resetAllLatestPost($id);
            //toevoegen als laatste en latest op 1 zetten
            if ($this->session->has_userdata('gebruikerID')) {
                $gebruikerID = $this->session->userdata['gebruikerID'];
            } else {
                $gebruikerID = 3;
            }
            $this->thread_model->insert(array('gebruikerID' => $gebruikerID, 'topicID' => $id, 'bericht' => $this->input->post('formbericht'), 'latestPost' => 1));
            //doorsturen naar de thread
            redirect(base_url() . "forum/thread/" . $id);
        } else {
            redirect(base_url() . "forum/index");
        }
    }

    function wijzigProfiel() {
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url');
        $this->load->helper('path');
        $this->load->model("users_model");

        if (isset($_POST['editProfile'])) {
            $this->data['error'] = "";

            //qry uitvoeren om alles van de user met het userid uit de serrion op te halen om te controleren of de username en email gewijzigd zijn
            $this->data['user'] = $this->users_model->find($this->session->userdata('gebruikerID'));

            if (empty($this->data['user'])) {
                $this->data['error'] .= "<p class='alert alert-danger'>Kon uw gegevens niet ophalen aan de hand van de sessie.</p>";
            }

            if ($this->data['user'][0]['username'] != $this->input->post('gebruikersnaam')) {
                $this->data['usernameVanDB'] = $this->users_model->doesUsernameExist($this->input->post('gebruikersnaam'));
            }
            if ($this->data['user'][0]['email'] != $this->input->post('email')) {
                $this->data['emailVanDB'] = $this->users_model->doesEmailExist($this->input->post('email'));
            }

            if (!empty($this->data['usernameVanDB'])) {
                $this->data['error'] .= "<p class='alert alert-danger'>Deze gebruikersnaam is al in gebruik.</p>";
            }
            if (!empty($this->data['emailVanDB'])) {
                $this->data['error'] .= "<p class='alert alert-danger'>Dit e-mail adres is al in gebruik.</p>";
            }

            if ($this->data['error'] == "") {
                $wijzigArray = array('username' => $this->input->post('gebruikersnaam'), 'email' => $this->input->post('email'), 'voornaam' => $this->input->post('voornaam'), 'familienaam' => $this->input->post('familienaam'));
                $teWijzigen = array('gebruikerID' => $this->session->userdata('gebruikerID'));
                $result = $this->users_model->updateID($wijzigArray, $teWijzigen);
                if ($result == 1) {
                    $this->data['user'] = $this->users_model->find($this->session->userdata('gebruikerID'));
                    $this->data['error'] .= "<div class='alert alert-success'>Gegevens zijn opgeslagen</div>";

                    if (empty($this->data['user'])) {
                        //de alert-error is vn bootstrap
                        $this->data['error'] .= "<div class='alert alert-error'>De gebruiker is niet gevonden</div>";
                    }

                    if ($this->data['user'][0]['profielfoto'] == null) {
                        $this->data['profielfoto'] = base_url() . 'userpic/default.jpg';
                    } else {
                        $this->data['profielfoto'] = base_url() . 'userpic/' . $this->data['user'][0]['profielfoto'];
                    }
                } else {
                    $this->data['error'] .= "<div class='alert alert-error'>Kon de gebruiker niet updaten.</div>";
                }
            } else {
                if ($this->data['user'][0]['profielfoto'] == null) {
                    $this->data['profielfoto'] = base_url() . 'userpic/default.jpg';
                } else {
                    $this->data['profielfoto'] = base_url() . 'userpic/' . $this->data['user'][0]['profielfoto'];
                }
            }

            $this->parser->parse('forum/wijzigProfiel', $this->data);
        } else if (isset($_POST['btn-prfWzg'])) {
            //print($this->session->userdata('user'));
            $this->data['error'] = "";

            $this->data['user'] = $this->users_model->find($this->session->userdata('gebruikerID'));
            //$this->data['foto'] = base_url() . "img/team-1.jpg";
            //print_r($this->data);
            if (empty($this->data['user'])) {
                //de alert-error is vn bootstrap
                $this->data['error'] = "<div class='alert alert-error'>De gebruiker is niet gevonden</div>";
            }
            if ($this->data['user'][0]['profielfoto'] == null) {
                $this->data['profielfoto'] = base_url() . 'img/default.jpg';
            } else {
                $this->data['profielfoto'] = base_url() . 'userpic/' . $this->data['user'][0]['profielfoto'];
            }

            $this->parser->parse('forum/wijzigProfiel.php', $this->data);
            //$this->load->view('forum/wijzigProfiel');
        } else {
            $this->data['error'] = "";

            $this->data['user'] = $this->users_model->find($this->session->userdata('gebruikerID'));

            if (empty($this->data['user'])) {
                $this->data['profielfoto'] = "";
                $this->data['error'] = "<div class='alert alert-danger'>De gebruiker is niet gevonden</div>";
            } else {
                if ($this->data['user'][0]['profielfoto'] == null) {
                    $this->data['profielfoto'] = base_url() . 'userpic/default.jpg';
                } else {
                    $this->data['profielfoto'] = base_url() . 'userpic/' . $this->data['user'][0]['profielfoto'];
                }
            }

            $this->parser->parse('forum/wijzigProfiel.php', $this->data);
        }
    }

    public function do_upload() {
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url');
        $this->load->helper('path');
        $this->load->model("users_model");


        $filename = $this->session->userdata('gebruikerID');

        $config = array(
            'file_name' => $filename,
            'upload_path' => "./userpic/",
            'allowed_types' => "jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );

        $this->load->library('upload', $config);


        if ($this->upload->do_upload()) {
            $fileArray = $this->upload->data();
            $filename .= $fileArray['file_ext'];

            $wijzigArray = array('profielfoto' => $filename);
            $teWijzigen = array('gebruikerID' => $this->session->userdata('gebruikerID'));
            $result = $this->users_model->updateID($wijzigArray, $teWijzigen);

            redirect(base_url() . 'forum/wijzigProfiel', 'refresh');
        } else {
            redirect(base_url() . 'forum/wijzigProfiel', 'refresh');
        }
    }

}
