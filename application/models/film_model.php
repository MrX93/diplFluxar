<?php

class Film_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
        
            public function film_info() {
		$upit = $query = $this->db->get('film');
		return $upit->result_array();
	}
            
        public function jedan_film_info($id) {
           $upit = $this->db->get_where('film', array('id' => $id));
             return $upit->result_array();
        }
        
        public function sort_zanr($ime) {
            $upit = $this->db->get_where('film', array('glavni_zanr' => $ime));
             return $upit->result_array();
        }
        
          public function zanrovi($id) {
            $this->db->select('*');
            $this->db->from('film f');
            $this->db->join('fil_zan fz', 'f.id=fz.id_film', 'left' );
            $this->db->join('zanr z', 'z.id=fz.id_zanr', 'left');
            $this->db->group_by('fz.id_zanr'); 
            $this->db->where('f.id', $id);
            $upit = $this->db->get();
             return $upit->result_array();
        }
        
        public function glumci($id) {
            $this->db->select('*');
            $this->db->from('film f');
            $this->db->join('fil_glu fg', 'f.id=fg.id_film', 'left' );
            $this->db->join('glumci g', 'g.id=fg.id_glumac', 'left');
            $this->db->group_by('fg.id_glumac'); 
            $this->db->where('f.id', $id);
            $upit = $this->db->get();
             return $upit->result_array();
        } 
        
        public function komentari ($id){
            $this->db->select('*');
             $this->db->from('korisnici k ');
             $this->db->join('komentar ko', 'k.id=ko.korisnik_id');            
             $this->db->where('ko.id_film', $id);
             $this->db->order_by('ko.vreme_unosa', 'DESC');
             $upit = $this->db->get();

             return $upit->result_array();
        }
        
        public function unesi_komentar($data){
            $this->db->insert('komentar', $data);
        }
}
