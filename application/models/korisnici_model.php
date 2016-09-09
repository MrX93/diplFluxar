<?php

class Korisnici_model extends CI_Model {

    public function logovanje($user, $pass) {
        $podaci['logovanje'] = $this->db->get_where('korisnici', array('nadimak' => $user, 'sifra' => $pass))->result_array();
        return $podaci;
    }
}
