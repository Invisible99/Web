<?php

class Pages extends CI_Controller {

    function view($page = 'index') {
        if (!file_exists('application/views/pages/' . $page . '.php')) {
            show_404();
        }
        $this->load->view('pages/' . $page);
    }

    public function login() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('pass'));

        $result = $this->user_model->login($email, $password);
        if ($result)
            $this->welcome();
        else
            $this->index();
    }

    public function register() {
        $this->load->library('form_validation');
// field name, error message, validation rules
        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->user_model->add_user();
            $this->thank();
        }
    }

    public function logout() {
        $newdata = array(
            'user_id' => '',
            'user_name' => '',
            'user_email' => '',
            'logged_in' => FALSE,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        $this->index();
    }

}
