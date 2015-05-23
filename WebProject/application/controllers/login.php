<?php

class Login extends CI_Controller {

    //Show login page
    function index() {
        $this->load->view('login/index');
    }
    
    //Show register page
    function register() {
        $this->load->view('login/register');
    }
    
    function insert(){
        if (isset($_POST["btn-reg"]) && $_POST["btn-reg"]=="Sign up" ){
            $this->load->model("users_model");
           // $this->users_model->insert(array('rolID'=>2,'username'=>$this->input->post('gebruikersnaam'),'password'=>'test', 'email'=>$this->input->post('email'), 'voornaam'=>$this->input->post('voornaam'), 'familienaam'=>$this->input->post('familienaam')));
            $this->users_model->insert($this->input->post('voornaam'), $this->input->post('familienaam'), $this->input->post('gebruikersnaam'), $this->input->post('email'));
        }
        /* $this->load->view('Home/index');*/
    }
}
