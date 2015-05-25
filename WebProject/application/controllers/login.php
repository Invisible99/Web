<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('captcha');
        $this->load->model('captcha_model');
    }

    //Show login page
    function index() {
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url');
        if (isset($_POST['btn-inlog'])) {

            $this->data['melding'] = "";
            $this->data['username'] = $this->input->post('gebruikersnaam');
            $this->data['password'] = $this->input->post('password');


            $this->data['inloggen'] = $this->users_model->login($this->input->post('gebruikersnaam'));

            if (!empty($this->data['inloggen'])) {
                if ($this->data['inloggen']["al_ingelogd"] == 0) {
                    if ($this->data['inloggen']["password"] == $this->input->post('password')) {
                        $this->firstlogin($this->data['inloggen']["gebruikerID"]);
                        return;

                        //$this->data['gebruikerID'] = $this->data['inloggen']["gebruikerID"];
                        //$this->parser->parse('login/firstlogin.php', $this->data);
                    } else {
                        $this->data['melding'] = "<p class='alert alert-danger'>De gebruikersnaam en wachtwoord komen niet overeen.</p>";
                    }
                } else {
                    $hash = $this->data['inloggen']["password"];

                    if (password_verify($this->input->post('password'), $hash)) {
                        //$this->data['melding'] = "<p class='alert alert-success'>Bedankt voor uw inloggen.</p>";
                        $data = array('user' => $this->data['inloggen']["username"], 'logged_in' => true, 'rolID' => $this->data['inloggen']["rolID"], 'gebruikerID' => $this->data['inloggen']["gebruikerID"]);

                        $this->session->set_userdata($data);
                    } else {
                        $this->data['melding'] = "<p class='alert alert-danger'>De gebruikersnaam en wachtwoord komen niet overeen.</p>";
                    }
                }
            } else {
                $this->data['melding'] = "<p class='alert alert-danger'>De gebruikersnaam en wachtwoord komen niet overeen.</p>";
            }

            if ($this->data['melding'] == "") {
                redirect($this->agent->referrer());
            } else {
                $this->parser->parse('login/index.php', $this->data);
            }
        } else if (isset($_POST['btn-logoff'])) {
            $this->session->sess_destroy();
            redirect($this->agent->referrer());
        } else {
            $this->data['melding'] = "";
            $this->data['gebruikersnaam'] = "";
            $this->data['password'] = "";

            $this->parser->parse('login/index.php', $this->data);
        }
    }

    function firstlogin($gebruikerID) {
        if (isset($_POST['btn-opslaan'])) {

            $this->data['melding'] = "";
            $this->data['gebruikerID'] = $gebruikerID;
            if ($this->input->post('newPassword') != $this->input->post('repeatPassword')) {
                $this->data['melding'] .= "<p class='alert alert-danger'>De wachtwoorden komen niet overeen.</p>";

                $this->data['gebruikerID'] = $gebruikerID;
                $this->parser->parse('login/firstlogin.php', $this->data);
            } elseif (strlen($this->input->post('newPassword')) < 8) {
                $this->data['melding'] .= "<p class='alert alert-danger'>Uw wachtwoord moet minimaal 8 karakters lang zijn.</p>";

                $this->data['gebruikerID'] = $gebruikerID;
                $this->parser->parse('login/firstlogin.php', $this->data);
            } else {
                //hash het wachtwoord
                $hash = password_hash($this->input->post('newPassword'), PASSWORD_DEFAULT);

                //update wachtw van gebruiker met ID
                $this->users_model->updateID(array('password' => $hash, 'al_ingelogd' => 1), array('gebruikerID' => $gebruikerID));

                $this->data['melding'] = "<p class='alert alert-success'>Uw wactwoord is vervangen, u kan nu inloggen met uw nieuw wachtwoord. <br/>U wordt doorverwezen naar de loginpagina.</p>";

                //$this->parser->parse('login/index.php', $this->data);
                $this->parser->parse('login/firstlogin.php', $this->data);
                header('Refresh: 5;url=../index');
            }
        } else {
            $this->data['melding'] = "";
            $this->data['gebruikerID'] = $gebruikerID;
            $this->parser->parse('login/firstlogin.php', $this->data);
        }
    }

    function register() {
        //hier nog invoercontrole, alle velden zijn wel via html required. CI doet anti-sqlinjectie automatisch
        //met de parser kan je de ingevulde velden teruggeven in de value van het tekstvak zodat ze niet alles opnieuw moeten invullen
        //ook controle of de gebruikersnaam en e-mailadres al in gebruik zijn!
        //Genereer captcha
        $this->data['captcha'] = $this->captcha_model->create_image();

        //Form validation captcha
        $this->form_validation->set_rules('captchaText', 'captchaText', 'trim|strip_tags|required|callback_captcha_check|match_captcha[captcha.captcha]');

        if (isset($_POST['btn-reg'])) {

            $this->data['melding'] = "";
            $this->data['voornaam'] = $this->input->post('voornaam');
            $this->data['familienaam'] = $this->input->post('familienaam');
            $this->data['gebruikersnaam'] = $this->input->post('gebruikersnaam');
            $this->data['email'] = $this->input->post('email');
            $this->data['captchaText'] = "";

            if ($this->form_validation->run() === false) {
                $this->data['captchaError'] = form_error('captchaText', "<p class='alert alert-danger'>");
                $this->parser->parse('login/register', $this->data);
            } else {
                $this->data['emailVanDB'] = $this->users_model->doesEmailExist($this->input->post('email'));
                $this->data['usernameVanDB'] = $this->users_model->doesUsernameExist($this->input->post('gebruikersnaam'));

                if (!empty($this->data['usernameVanDB'])) {
                    $this->data['melding'] .= "<p class='alert alert-danger'>Deze gebruikersnaam is al in gebruik.</p>";
                }
                if (!empty($this->data['emailVanDB'])) {
                    $this->data['melding'] .= "<p class='alert alert-danger'>Dit e-mail adres is al in gebruik.</p>";
                }

                if ($this->data['melding'] == "") {
                    //roep hier method aan die random passwd genereert
                    $randomPaswoord = $this->_genereerPaswoord();

                    $this->users_model->insert(array('rolID' => 2, 'username' => $this->input->post('gebruikersnaam'), 'password' => $randomPaswoord, 'email' => $this->input->post('email'), 'voornaam' => $this->input->post('voornaam'), 'familienaam' => $this->input->post('familienaam')));

                    //roep hier method aan die mail stuurt (met random passwd) indien insert gelukt is, zowel naar admin die moet activeren als naar persoon die zich wil registreren
                    //$this->_mailToUser($this->input->post('voornaam'), $this->input->post('familienaam'), $this->input->post('gebruikersnaam'), $this->input->post('email'), $randomPaswoord);
                    //$this->_mailToAdmin($this->input->post('voornaam'), $this->input->post('familienaam'), $this->input->post('gebruikersnaam'), $this->input->post('email'));

                    $this->data['melding'] = "";
                    $this->data['voornaam'] = "";
                    $this->data['familienaam'] = "";
                    $this->data['gebruikersnaam'] = "";
                    $this->data['email'] = "";
                    $this->data['captchaError'] = "";
                    $this->data['melding'] .= "<p class='alert alert-success'>Bedankt voor uw registratie, een admin zal uw account zo snel mogelijk activeren.</p>";
                }
                //stuur door naar registerpagina en laat de errors of gelukte insert melding zien
                $this->parser->parse('login/register.php', $this->data);
            }
        } else {
            $this->data['melding'] = "";
            $this->data['voornaam'] = "";
            $this->data['familienaam'] = "";
            $this->data['gebruikersnaam'] = "";
            $this->data['email'] = "";
            $this->data['captchaText'] = "";
            $this->data['captchaError'] = "";
            $this->parser->parse('login/register.php', $this->data);
        }
    }

    function _genereerPaswoord() {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, 8);
        return $password;
    }

    //moet hier niet gebruikt worden, maar vanaf het moment dat een admin een gebruiker goedkeurt!!!!!!!
    function _mailToUser($userVoornaam, $userAchternaam, $userUsername, $userEmail, $generatedPassword) {
        $to = $userEmail;
        $subject = 'TEDxPXL registratie';
        $message = "Beste " . $userVoornaam . " " . $userAchternaam . "\n\nBedankt voor uw registratie bij TEDxPXL.\nU kan nu inloggen met " . $userUsername . " met als wachtwoord " . $generatedPassword . "\nU zal uw wachtwoord moeten wijzigen bij de eerste keer inloggen.\n\nMet vriendelijke groet\n\nTEDxPXL Administratie";
        $headers = 'From: pxltedx@gmail.com';
        if (!mail($to, $subject, $message, $headers)) {
            //echo "Email sending failed";
        }
    }

    //wordt niet gebruikt ATM, kan gebruikt worden om de admin een mail te sturen als een nieuwe gebruiker zich registreert.
    function _mailToAdmin($userVoornaam, $userAchternaam, $userUsername, $userEmail) {
        $to = 'koen895@hotmail.com'; //hier email van TEDx admin indien nodig
        $subject = 'Nieuwe TEDxPXL gebruiker';
        $message = "Beste Admin \n\n" . $userVoornaam . " " . $userAchternaam . " wil zich registreren met gebruikersnaam: " . $userUsername . " en het e-mail adres " . $userEmail . "\nGa naar de website om dit te bevestigen of af te keuren.";
        $headers = 'From: pxltedx@gmail.com';
        if (!mail($to, $subject, $message, $headers)) {
            //echo "Email sending failed";
        }
    }

    function captcha_check($value) {
        if ($value == "") {
            $this->form_validation->set_message('captcha_check', 'Please enter the text from the image in the captcha field.');
            return false;
        } else {
            return true;
        }
    }

    function wachtwoordReset() {
        if (isset($_POST['btn-reset'])) {
            $this->data['user'] = $this->users_model->doesEmailExist($this->input->post('email'));

            if (!empty($this->data['user'])) {
                if ($this->data['user']["actief"] == 1) {
                    $randomPaswoord = $this->_genereerPaswoord();
                    $this->users_model->updateID(array('al_ingelogd' => 0, 'password' => $randomPaswoord), array('gebruikerID' => $this->data['user']['gebruikerID']));

                    $this->_mailToUserWWReset($this->data['user']['voornaam'], $this->data['user']['familienaam'], $this->input->post('email'), $randomPaswoord);

                    $this->data['melding'] = "<p class='alert alert-success'>U zal zodadelijk een mail krijgen om uw wachtwoord te veranderen.</p>";
                    $this->parser->parse('login/wachtwoordReset.php', $this->data);
                } else {
                    $this->data['melding'] = "<p class='alert alert-danger'>Er is geen geldige gebruiker met dit email adres.</p>";
                    $this->parser->parse('login/wachtwoordReset.php', $this->data);
                }
            } else {
                $this->data['melding'] = "<p class='alert alert-danger'>Er is geen geldige gebruiker mesdfqsdfqsdt dit email adres.</p>";
                $this->parser->parse('login/wachtwoordReset.php', $this->data);
            }
        } else {
            $this->data['melding'] = "";
            $this->parser->parse('login/wachtwoordReset.php', $this->data);
        }
    }

    function _mailToUserWWReset($userVoornaam, $userAchternaam, $userEmail, $generatedPassword) {
        $to = $userEmail;
        $subject = 'TEDxPXL password reset';
        $message = "Beste " . $userVoornaam . " " . $userAchternaam . "\n\nUw nieuw wachtwoord is " . $generatedPassword . "\nU zal uw wachtwoord moeten wijzigen bij de eerste keer inloggen.\n\nMet vriendelijke groet\n\nTEDxPXL Administratie";
        $headers = 'From: pxltedx@gmail.com';
        if (!mail($to, $subject, $message, $headers)) {
            //echo "Email sending failed";
        }
    }

}
