<?php

class Nieuws extends CI_Controller {

    function index() {
        $this->load->model("subforum_model");
        $this->data['error'] = "";
        $this->data['nieuws'] = $this->subforum_model->selectAllNieuws();
        if (empty($this->data['nieuws'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn nog geen events deze maand!</div>";
        }
        $this->parser->parse('Nieuws/nieuwsview.php', $this->data);
    }

}
