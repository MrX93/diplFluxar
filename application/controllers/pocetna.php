<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pocetna extends MY_Controller {

	public function index() {
            $this->load->model("film_model");
            $podaci["film"]=  $this->film_model->film_info();
            $this->stranica('index', $podaci);
	}
        
        public function sort($ime) {
             $this->load->model("film_model");
             $podaci["film"]=  $this->film_model->sort_zanr($ime)   ;
            $this->stranica('index', $podaci);
        }
}

