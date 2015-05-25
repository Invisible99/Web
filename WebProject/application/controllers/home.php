<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
        $this->load->model('captcha_model');
    }

    //Show index page
    function index() {
        /* $this->load->library('session');
          $this->load->library('user_agent');
          $this->load->helper('url');
          $this->session->sess_destroy(); */
        //$this->load->view('Home/index');
        $this->load->model("subforum_model");
        $this->data['latestNews']=$this->subforum_model->getLatestNews();
        $this->parser->parse('Home/index.php',$this->data);
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
        $this->data['captcha'] = $this->captcha_model->create_image();

        //Form rules
        $this->form_validation->set_rules('naam', 'naam', 'trim|strip_tags|required');
        $this->form_validation->set_rules('email', 'email', 'trim|strip_tags|required|valid_email');
        $this->form_validation->set_rules('onderwerp', 'onderwerp', 'trim|strip_tags|required');
        $this->form_validation->set_rules('bericht', 'bericht', 'trim|strip_tags|required');
        $this->form_validation->set_rules('captchaText', 'captchaText', 'trim|strip_tags|required|callback_captcha_check|match_captcha[captcha.captcha]');
        if (isset($_POST['contactBtn'])) {
            $this->data['melding'] = "";
            $this->data['bericht'] = $this->input->post('bericht');
            $this->data['naam'] = $this->input->post('naam');
            $this->data['email'] = $this->input->post('email');
            $this->data['onderwerp'] = $this->input->post('onderwerp');
            $this->data['captchaText'] = "";
            if ($this->form_validation->run() === false) {
                $this->data['melding'] = $this->input->post('bericht');
                $this->data['naamError'] = form_error('naam', "<p class='alert alert-danger'>");
                $this->data['emailError'] = form_error('email', "<p class='alert alert-danger'>");
                $this->data['onderwerpError'] = form_error('onderwerp', "<p class='alert alert-danger'>");
                $this->data['berichtError'] = form_error('bericht', "<p class='alert alert-danger'>");
                $this->data['captchaError'] = form_error('captchaText', "<p class='alert alert-danger'>");
                $this->parser->parse('home/contact.php', $this->data);
            } else {
                $to = 'pxltedx@gmail.com';
                $subject = $this->input->post('onderwerp');
                $message = $this->input->post('bericht') . "\n\nNaam verzender: " . $this->input->post('naam') . "\n\nE-mail: " . $this->input->post('email');
                $headers = 'From: ' . $this->input->post('email');
                if (mail($to, $subject, $message, $headers)) {
                    $this->data['melding'] .= "<p class='alert alert-success'>Uw e-mail is met succes verzonden.</p>";
                    $this->data['naamError'] = "";
                    $this->data['emailError'] = "";
                    $this->data['onderwerpError'] = "";
                    $this->data['berichtError'] = "";
                    $this->data['captchaError'] = "";
                } else {
                    $this->data['melding'] .= "<p class='alert alert-danger'>Uw e-mail is niet met succes verzonden.</p>";
                    $this->data['naamError'] = "";
                    $this->data['emailError'] = "";
                    $this->data['onderwerpError'] = "";
                    $this->data['berichtError'] = "";
                    $this->data['captchaError'] = "";
                }
                $this->parser->parse('home/contact.php', $this->data);
            }
        } else {
            $this->data['naam'] = "";
            $this->data['email'] = "";
            $this->data['onderwerp'] = "";
            $this->data['bericht'] = "";
            $this->data['captchaText'] = "";
            $this->data['melding'] = "";
            $this->data['naamError'] = "";
            $this->data['emailError'] = "";
            $this->data['onderwerpError'] = "";
            $this->data['berichtError'] = "";
            $this->data['captchaError'] = "";
            $this->parser->parse('home/contact.php', $this->data);
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

    //$code = $this->str_encrypt($this->generateCode(6));
    /* $this->data['captcha'] = "<img src='captcha_images.php?width=120&height=40&code=<?php echo $code ?>' />"; */
}
