<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Movie extends MY_Controller {

	public function film_info($id) {
            $this->load->model('film_model');
            $podaci['film_info']=$this->film_model->jedan_film_info($id);
            $podaci['zanrovi']=$this->film_model->zanrovi($id);
            $podaci['glumci']=  $this->film_model->glumci($id);
            $podaci['komentari']= $this->film_model->komentari($id);
            $this->stranica('movieView', $podaci);
	}
        
        public function komentari(){
            $this->load->model('film_model');
            $komentar = $_POST['textarea'];
            $filmid=$_POST['filmid'];
            $data = array(
                'tekst'=> $this->input->post('textarea'),
                'vreme_unosa_komentara' => time(),
                'korisnik_id' => $this->session->userdata('korisnik_id'),
                'id_film' => $filmid
            );
            $this->film_model->unesi_komentar($data);
            $id=$filmid;
            header("Location:film_info/$id");
          
        }
}



