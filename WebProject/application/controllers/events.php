<?php

class Events extends CI_Controller {

    //Show index page
    function index() {
        
        $this->load->model("maand_model");
        $this ->data['maanden'] = $this->maand_model->get_months();
        //print_r($this ->data['maanden']);
        $this->parser->parse('Events/eventsview.php', $this->data);
    }
    
    function showevents($maandID){
        $this->load->model("maand_model");
        $this ->data['getMaandNaam'] = $this->maand_model->get_maandnaam($maandID);
        $this ->data['maanden'] = $this->maand_model->get_months();
        $this->parser->parse('Events/showevents',$this->data);
    }
//    
//    function showmonths(){
//        $this->load->model("events_model");
//        $this ->data['maanden'] = $this->events_model->get_monts();
//        $this->parser->parse('Events/events', $this->data);
//    }
}

