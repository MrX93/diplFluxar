<?php

class Account_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function registration($data){
            $this->db->insert('korisnici', $data);
	}
}

