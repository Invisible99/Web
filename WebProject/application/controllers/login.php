<?php

class Login extends CI_Controller {

    //Show login page
    function index() {
        $this->load->view('login/index');
    }

    //Show register page
    function register() {
        $this->data['melding'] = "";
        $this->parser->parse('login/register.php', $this->data);
    }

    function insert() {

        //hier nog invoercontrole, alle velden zijn wel via html required. CI doet anti-sqlinjectie automatisch
        //met de parser kan je de ingevulde velden teruggeven in de value van het tekstvak zodat ze niet alles opnieuw moeten invullen
        //ook controle of de gebruikersnaam en e-mailadres al in gebruik zijn!

        if (isset($_POST['btn-reg'])) {
            $this->load->model("users_model");

            $this->data['melding'] = "";

            $this->data['voornaam'] = $this->input->post('voornaam');
            $this->data['familienaam'] = $this->input->post('familienaam');
            $this->data['gebruikersnaam'] = $this->input->post('gebruikersnaam');
            $this->data['email'] = $this->input->post('email');



            $this->data['emailVanDB'] = $this->users_model->doesEmailExist($this->input->post('email'));
            $this->data['usernameVanDB'] = $this->users_model->doesUsernameExist($this->input->post('gebruikersnaam'));

            if (!empty($this->data['usernameVanDB'])) {
                $this->data['melding'] .= "<p class='alert alert-danger'>Deze gebruikersnaam is al in gebruik.</p>";
            }
            if (!empty($this->data['emailVanDB'])) {
                $this->data['melding'] .= "<p class='alert alert-danger'>Dit e-mail adres is al in gebruik.</p>";
            }

            if ($this->data['melding'] == "") {
                $this->users_model->insert(array('rolID' => 2, 'username' => $this->input->post('gebruikersnaam'), 'password' => 'test', 'email' => $this->input->post('email'), 'voornaam' => $this->input->post('voornaam'), 'familienaam' => $this->input->post('familienaam')));

                /* if($this->db->affected_rows() == 1){ //hiermee kan je controleren of er effectief iets in de DB gebeurd is, maar als de insert niet lukt dan geeft hij meteen een database error, dus heeft de controle hier geen zin
                  echo "Hij zit er in.";
                  }
                  else{
                  echo "Hij zit er in ma deze controle werkt hier nie";
                  } */
                
                $this->data['melding'] = "";
                $this->data['voornaam'] = "";
                $this->data['familienaam'] = "";
                $this->data['gebruikersnaam'] = "";
                $this->data['email'] = "";
                $this->data['melding'] = "<p class='alert alert-success'>Bedankt voor uw registratie, een admin zal uw account zo snel mogelijk activeren.</p>";
            }
            //stuur door naar registerpagina en laat de errors of gelukte insert melding zien
            $this->parser->parse('login/register.php', $this->data);
        } else {
            $this->data['melding'] = "";
            $this->data['voornaam'] = "";
            $this->data['familienaam'] = "";
            $this->data['gebruikersnaam'] = "";
            $this->data['email'] = "";
            $this->parser->parse('login/register.php', $this->data);
        }
    }

}
