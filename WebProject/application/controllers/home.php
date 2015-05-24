<?php

define("KEY_FOR_RC4", "adadaNchsadagadgakk342eiejfiejifje4234MnUUK25fjiNNBZBZNAkdaasd8sadhHZKZJnGREQhhsdjdksdsde");

class Home extends CI_Controller {

    //Show index page
    function index() {
        $this->load->view('Home/index');
    }

    //Show events page
    function events() {
        $this->load->view('Home/events');
    }

    //Show register page
    function register() {
        $this->load->view('Home/register');
    }

    //Show contact page
    function contact() {
        $this->captcha();
        if (isset($_POST['contactBtn'])) {
            $this->data['melding'] = "";

            if ($this->data['melding'] == "") {
                $to = 'wefknrise@gmail.com';
                $subject = $this->input->post('onderwerp');
                $message = $this->input->post('bericht') . "\n\nNaam verzender: " . $this->input->post('naam') . "\n\nTelefoonnummer: " . $this->input->post('telefoon') . "\n\nE-mail: " . $this->input->post('email');
                $headers = 'From: ' . $this->input->post('email');
                mail($to, $subject, $message, $headers);
                $this->data['melding'] .= "<p class='alert alert-success'>Uw e-mail is met succes verzonden.</p>";
            }
            $this->parser->parse('home/contact.php', $this->data);
        } else {
            //$this->data['melding'] .= "<p class='alert alert-danger'>Gelieve het formulier in te vullen.</p>";
            $this->data['melding'] = "";
            $this->parser->parse('home/contact.php', $this->data);
        }
    }

    //$code = $this->str_encrypt($this->generateCode(6));
    /* $this->data['captcha'] = "<img src='captcha_images.php?width=120&height=40&code=<?php echo $code ?>' />"; */
    //eerste testqry uitvoeren
    function query() {
        /* $this->load->model("testModelUsers");

          $this->data['user'] = $this->testModelUsers->getUsers(); //dit is niet 100% juist eigenlijk zou de model enkel de QRY moeten uitvoeren en dan hier controle of het resultaat niet leeg is

          if(empty($this->data['user'])){
          $this->data['error'] = "Er zijn geen records gevonden in de tabel.";
          }
          else{
          $this->data['error'] = "";
          }

          $this->parser->parse('inloggen_view.html',  $this->data); */

        $this->load->model("tblgebruikers_model"); //model laden
        $this->data['error'] = "";
        $this->data['gebruikers'] = $this->tblgebruikers_model->findall(); //alle records uit de DB halen zie koen voor uitleg
        if (empty($this->data['gebruikers'])) {
            $this->data['error'] = "<div class='alert alert-error'>Er zijn geen records in de tabel users.</div>"; //de alert-error is vn bootstrap
        }
        $this->parser->parse('home/overzichtUsers_view.html', $this->data);
    }

    function captcha() {
        $this->load->helper('captcha');

        $captcha = array(
            'word' => '',
            'img_path' => './img/captcha/',
            'img_url' => base_url().'img/captcha/',
            'font_path' => base_url().'fonts/impact.ttf',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 7200
        );
        
        $img = create_captcha($captcha);
        $this->data['captcha'] = $img['image'];
    }

}
