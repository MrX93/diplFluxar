<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('uloga') == 1) {
			// ako  sesija postoji i uloga jednaka 1,tada taj nalog ima pristup kontroleru admin i svim njegovim funkcijama
		} else {
			redirect(base_url());
		}
	}

	public function admin_panel() {
            $podaci['title']="Admin panel";
            $this->stranica('admin_panel',$podaci);
	}

	public function prikazi_tabelu($tabela = NULL, $id = NULL) {
		$this->load->model('admin_model');
		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['zanr']=$this->admin_model->zanr();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
                $data['glumci']=$this->admin_model->glumac();
		$data['view'] = $tabela;
		$data['id'] = $id;
                
		$this->load->view('tabela', $data);
	}
        
        public function prikazi_tabelu1($tabela = NULL, $id_film = NULL, $id_glumac = NULL) {
		$this->load->model('admin_model');
		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['zanr']=$this->admin_model->zanr();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
                $data['glumci']=$this->admin_model->glumac();
		$data['view'] = $tabela;
		$data['id_film'] = $id_film;
                $data['id_glumac'] = $id_glumac;
		$this->load->view('tabela', $data);
	}
        
          public function prikazi_tabelu2($tabela = NULL, $id_film = NULL, $id_zanr = NULL) {
		$this->load->model('admin_model');
		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['zanr']=$this->admin_model->zanr();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
                $data['glumci']=$this->admin_model->glumac();
		$data['view'] = $tabela;
		$data['id_film'] = $id_film;
                $data['id_zanr'] = $id_zanr;
		$this->load->view('tabela', $data);
	}
        
        public function obrisi_red($tabela = NULL, $id = NULL) {
		$this->load->model('admin_model');
		$this->admin_model->obrisi_red($tabela, $id);
		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['zanr']=$this->admin_model->zanr();
                $data['glumci']=$this->admin_model->glumac();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
		$data['view'] = $tabela;
		unset($data['id']);
		$this->load->view('tabela', $data);
	}
        
          public function obrisi_red1($tabela = NULL, $id_film = NULL, $id_glumac = NULL) {
		$this->load->model('admin_model');
		$this->admin_model->obrisi_red1($tabela, $id_film,$id_glumac );
		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['zanr']=$this->admin_model->zanr();
                $data['glumci']=$this->admin_model->glumac();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
		$data['view'] = $tabela;
		unset($data['id_film']);
                unset($data['id_glumac']);
		$this->load->view('tabela', $data);
	}
        
        public function obrisi_red2($tabela = NULL, $id_film = NULL, $id_zanr = NULL) {
		$this->load->model('admin_model');
		$this->admin_model->obrisi_red2($tabela, $id_film,$id_zanr );
		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['zanr']=$this->admin_model->zanr();
                $data['glumci']=$this->admin_model->glumac();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
		$data['view'] = $tabela;
		unset($data['id_film']);
                unset($data['id_zanr']);
		$this->load->view('tabela', $data);
	}
        
                   public function izmeni_red1($id_film = NULL, $id_glumac = NULL) {
		$vrednosti = $this->input->post();

		$tabela = $vrednosti['tabela'];
		unset($vrednosti['tabela']);
                
		$vrednosti['vreme_unosa'] = time();
		$vrednosti['korisnik_id'] = $this->session->userdata('korisnik_id');

		$this->load->model('admin_model');
		$this->admin_model->izmeni_red1($tabela, $vrednosti, $id_film, $id_glumac);

		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['glumci']=$this->admin_model->glumac();
                $data['zanr']=$this->admin_model->zanr();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
		$data['view'] = $tabela;
		unset($data['id_film']);
                unset($data['id_zanr']);
                
		$this->load->view('tabela', $data);
	}
        
         public function izmeni_red2($id_film = NULL, $id_zanr = NULL) {
		$vrednosti = $this->input->post();

		$tabela = $vrednosti['tabela'];
		unset($vrednosti['tabela']);
                
		$vrednosti['vreme_unosa'] = time();
		$vrednosti['korisnik_id'] = $this->session->userdata('korisnik_id');

		$this->load->model('admin_model');
		$this->admin_model->izmeni_red2($tabela, $vrednosti, $id_film, $id_zanr);

		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['glumci']=$this->admin_model->glumac();
                $data['zanr']=$this->admin_model->zanr();
                $data['film_glumac']=$this->admin_model->film_glumac();
                $data['film_zanr']=$this->admin_model->film_zanr();
		$data['view'] = $tabela;
		unset($data['id_film']);
                unset($data['id_zanr']);
                
		$this->load->view('tabela', $data);
	}
        
        
        public function izmeni_red($id = NULL) {
		$vrednosti = $this->input->post();

		$tabela = $vrednosti['tabela'];
		unset($vrednosti['tabela']);

		$vrednosti['vreme_unosa'] = time();
		$vrednosti['korisnik_id'] = $this->session->userdata('korisnik_id');

		$this->load->model('admin_model');
		$this->admin_model->izmeni_red($tabela, $vrednosti, $id);

		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['glumci']=$this->admin_model->glumac();
                $data['zanr']=$this->admin_model->zanr();
                 $data['film_glumac']=$this->admin_model->film_glumac();
                 $data['film_zanr']=$this->admin_model->film_zanr();
		$data['view'] = $tabela;
		unset($data['id']);
                
		$this->load->view('tabela', $data);
	}
        
 
        
        public function dodaj_red() {
		$vrednosti = $this->input->post();

		$tabela = $vrednosti['tabela'];
		unset($vrednosti['tabela']);
                
                $vrednosti['vreme_unosa'] = time();
		$vrednosti['korisnik_id'] = $this->session->userdata('korisnik_id');
                
		$this->load->model('admin_model');
		$this->admin_model->dodaj_red($tabela, $vrednosti);
                 $data['uloga']=$this->admin_model->uloga();
                $data['film']=$this->admin_model->film();
                $data['zanr']=$this->admin_model->zanr();
                $data['glumci']=$this->admin_model->glumac();
		$data['kolone'] = $this->admin_model->dohvati_tabelu($tabela);
                 $data['film_glumac']=$this->admin_model->film_glumac();
                 $data['film_zanr']=$this->admin_model->film_zanr();
		$data['view'] = $tabela;
                
		$this->load->view('tabela', $data);
	}
        
        
}
