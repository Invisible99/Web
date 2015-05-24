<?php

class Captcha_model extends CI_Model {

    function create_image() {
        $abc = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $word = '';
        $n = 0;
        while ($n < 8) {
            $word .=$abc[mt_rand(0, 35)];
            $n++;
        }

        $captcha = array(
            'word' => strtoupper($word),
            'img_path' => './img/captcha/',
            'img_url' => base_url() . 'img/captcha/',
            'font_path' => './fonts/impact.ttf',
            'img_width' => 230,
            'img_height' => 70,
            'expiration' => 60,
            'time' => time()
        );
        
        //$expire = time() - $captcha['expiration'];
        
        //Delete expired captchas
        //$this->db->where('tijd < ', $expire);
        //$this->db->delete('captcha');

        $values = array(
            'tijd' => $captcha['time'],
            'ip_adres' => $this->input->ip_address(),
            'captcha' => $captcha['word']
        );

        //insert values in captcha table
        $this->db->insert('captcha', $values);

        $img = create_captcha($captcha);

        return $data = $img['image'];
    }

}
