<?php

class Events extends CI_Controller {

    //Show index page
    function index() {
        
        $this->load->model("maand_model");
        $this ->data['maanden'] = $this->maand_model->get_months();  
        $this->load->model("subforum_model");
        $this->data['error']="";
        $this->data['volgendEvent']=$this->subforum_model->selectNextEvent();
        print_r($this->data['volgendEvent']);
        if ($this->data['volgendEvent'][0]->datum == null) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn voorlopig geen events gepland.</div>";
            
        }
        $this->parser->parse('Events/eventsview.php',$this->data);
    }
    
    function showevents($maandID, $curYear){
        $this->load->model("maand_model");
        $this->load->model("subforum_model");
        $huidigJaar=date('Y');
        $this->data['curYear']=$huidigJaar;
        $this->data['nextYear']=$huidigJaar+1;
        $this->data['nextNextYear']=$huidigJaar+2;
        $this->data['error'] ="";
        $this->data['getMaandNaam'] = $this->maand_model->get_maandnaam($maandID);
        $this->data['maanden'] = $this->maand_model->get_months();
        $query=$this->subforum_model->findEvents($maandID, $curYear);
        $this->data['events']=$query['query'];
        $this->data['aantalEvents']=$query['count'];
        if (empty($this->data['events'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn nog geen events deze maand!</div>";
        }
        $this->parser->parse('Events/showevents',$this->data);
    }

function archief() {
        
        $this->load->model("maand_model");
        $this ->data['maanden'] = $this->maand_model->get_months();  
        $this->load->model("subforum_model");
        $this->data['error']="";
        $this->data['allEvents']=$this->subforum_model->selectAllEvents();
        if (empty($this->data['allEvents'])) {
            //de alert-error is vn bootstrap
            $this->data['error'] = "<div class='alert alert-error'>Er zijn nog geen events deze maand!</div>";
        }
        $this->parser->parse('Events/archief.php',$this->data);
    }
}

