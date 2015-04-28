<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public function index() {
        $this->login();//home method uitvoeren
    }
    
    public function login(){
        $this->load->view("login_view");
    }
    
    public function login_validation(){
        //https://www.youtube.com/watch?v=W4PvPKRivZM&list=PL161C7E0E6A01B1E0&index=4
    }
    
}
