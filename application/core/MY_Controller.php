<?php

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function stranica($ime_stranice, $podaci = array()) {
            $this->load->model("meni_model");
            
            $podaci['session'] = $this->session->all_userdata();
            $podaci['meni']=  $this->meni_model->linkovi();
            $podaci['zanr']=  $this->meni_model->zanr();
            
            $this->load->view('header', $podaci);
            $this->load->view($ime_stranice, $podaci);
            $this->load->view('footer', $podaci);
	}
}
