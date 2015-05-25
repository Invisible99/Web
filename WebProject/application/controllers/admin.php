<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');

        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url');

        if (!($this->session->has_userdata('user') && $this->session->has_userdata('logged_in') && $this->session->logged_in && $this->session->has_userdata('rolID') && $this->session->userdata['rolID'] == 1)) {
            $this->session->sess_destroy();
            redirect(base_url() . "login/index");
        }
    }

    
    function index() {
        
    }

    function gebruikerOverzicht() {
        $this->data['actievemelding'] = "";
        $this->data['inactievemelding'] = "";
        $this->data['bannedmelding'] = "";     

        $this->data['actieveGebruikers'] = $this->users_model->findallActive();     
        if (empty($this->data['actieveGebruikers'])) {
            $this->data['actievemelding'] .= "<div class='alert alert-info'>Er zijn geen geactiveerde gebruikers.</div>";
        }

        $this->data['inactieveGebruikers'] = $this->users_model->findallInActive();
        if (empty($this->data['inactieveGebruikers'])) {
            $this->data['inactievemelding'] .= "<div class='alert alert-info'>Er zijn geen gebruikers om te activeren.</div>";
        }

        $this->data['bannedGebruikers'] = $this->users_model->findallBanned();
        if (empty($this->data['bannedGebruikers'])) {
            $this->data['bannedmelding'] .= "<div class='alert alert-info'>Er zijn geen banned gebruikers.</div>";
        }
        $this->parser->parse('admin/overzicht_gebruikers.php', $this->data); //op de vieuw zelf nog controleren of hij wel admin is? kan je rechtstreeks met de url naar die pagina?
    }
    
    /*function geefInactiveUserCount(){
        $this->data['inactieveGebruikers'] = $this->users_model->findallInActive();
    }*/

    //enkel gebruiken voor nog niet geactiveerde gebruikers, deze hebben toch nog niets anders kunnen doen in de database dus die mogen echt verwijderd worden, anderen zal een update moeten gebeuren naar "removed user"
    function deleteGebruiker($gebruikerID) {
        $this->users_model->deleteID(array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function activeerGebruiker($gebruikerID) {
        $this->users_model->updateID(array('actief' => 1), array('gebruikerID' => $gebruikerID));
        
        //haal alle gegevens op van de user met dit ID en gebruik dit in de mail
        $this->data['gebruiker'] = $this->users_model->find($gebruikerID);
        $voornaam = $this->data['gebruiker'][0]['voornaam'];
        $familienaam = $this->data['gebruiker'][0]['familienaam'];
        $gebruikersnaam = $this->data['gebruiker'][0]['username'];
        $email = $this->data['gebruiker'][0]['email'];
        $randomPaswoord = $this->data['gebruiker'][0]['password'];
        
        $this->_mailToUser($voornaam, $familienaam, $gebruikersnaam, $email, $randomPaswoord);
                     
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function unbanGebruiker($gebruikerID) {
        $this->users_model->updateID(array('rolID' => 2), array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function deactivateGebruiker($gebruikerID) {
        $this->users_model->updateID(array('rolID' => 4, 'username' => 'Removed User', 'email' => $gebruikerID . '@noemail.com', 'actief' => 0), array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function banGebruiker($gebruikerID) {
        $this->users_model->updateID(array('rolID' => 5), array('gebruikerID' => $gebruikerID));
        redirect(base_url() . "admin/gebruikerOverzicht");
    }

    function bewerkGebruiker($gebruikerID) {
        //$this->users_model->deleteID(array('gebruikerID' => $gebruikerID));
        print_r($gebruikerID);
        //redirect(base_url() . "admin/gebruikerOverzicht");
    }
    
    //volledig profiel wijzigen, aanpassen naar enkel username aanpassen, als de username wordt aangepast moet er een mail gestuurd worden naar deze user!!!
    function wijzigProfiel() {
        $this->load->helper('path');


        if (isset($_POST['editProfile'])) {
            $this->data['error'] = "";
            $this->data['emailVanDB'] = $this->users_model->doesEmailExist($this->input->post('email'));
            $this->data['usernameVanDB'] = $this->users_model->doesUsernameExist($this->input->post('gebruikersnaam'));


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
                        $this->data['profielfoto'] = base_url() . '/img/team-1.jpg';
                    } else {
                        $this->data['profielfoto'] = base_url() . '/userpic/' . $this->data['user'][0]['profielfoto'];
                    }
                    
                } else {
                    $this->data['error'] .= "<div class='alert alert-error'>Kon de gebruiker niet updaten.</div>";
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
                $this->data['profielfoto'] = base_url() . '/img/team-1.jpg';
            } else {
                $this->data['profielfoto'] = base_url() . '/userpic/' . $this->data['user'][0]['profielfoto'];
            }

            $this->parser->parse('forum/wijzigProfiel.php', $this->data);
            //$this->load->view('forum/wijzigProfiel');
        } else {
            $this->data['error'] = "";

            $this->data['user'] = $this->users_model->find($this->session->userdata('gebruikerID'));
            if ($this->data['user'][0]['profielfoto'] == null) {
                $this->data['profielfoto'] = base_url() . '/img/team-1.jpg';
            } else {
                $this->data['profielfoto'] = base_url() . '/userpic/' . $this->data['user'][0]['profielfoto'];
            }
            if (empty($this->data['user'])) {
                //de alert-error is vn bootstrap
                $this->data['error'] = "<div class='alert alert-error'>De gebruiker is niet gevonden</div>";
            }

            $this->parser->parse('forum/wijzigProfiel.php', $this->data);
        }
    }
    
    //method om profielfoto te uploaden --> wijzigen naar profielfoto resetten en default img pakken
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

    function evenementOverzicht() {
        
    }

    //code voor mailmethods uit loigincontroler
    function _mailToUser($userVoornaam, $userAchternaam, $userUsername, $userEmail, $generatedPassword) {
        $to = $userEmail;
        $subject = 'TEDxPXL registratie';
        $message = "Beste " . $userVoornaam . " " . $userAchternaam . "\n\nBedankt voor uw registratie bij TEDxPXL.\nU kan nu inloggen met " . $userUsername . " met als wachtwoord " . $generatedPassword . "\nU zal uw wachtwoord moeten wijzigen bij de eerste keer inloggen.\n\nMet vriendelijke groet\n\nTEDxPXL Administratie";
        $headers = 'From: pxltedx@gmail.com';
        if (!mail($to, $subject, $message, $headers)) {
            //echo "Email sending failed";
        }
    }
}
