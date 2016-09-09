<?php

class Meni_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function linkovi() {
		$upit = $this->db->query("select * from meni ");
		return $upit->result_array();
	}

	public function zanr() {
		$upit1 = $this->db->query("select * from zanr");
		return $upit1->result_array();
	}

}
