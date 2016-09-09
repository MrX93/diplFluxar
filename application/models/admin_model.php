<?php

class Admin_model extends CI_Model {

	public function dohvati_tabelu($tabela) {
		$this->db->select('*');
		$this->db->select('k.nadimak izmenio');
		$this->db->from('korisnici k');
		$this->db->join($tabela, "k.id=$tabela.korisnik_id", 'right');
		$query = $this->db->get();
     
		return $query->result();
	}
        public function uloga(){
            $upit = $query = $this->db->get('uloga');
            return $upit->result();
        }
            public function film(){
            $upit = $query = $this->db->get('film');
            return $upit->result();
        }
           public function glumac(){
            $upit = $query = $this->db->get('glumci');
            return $upit->result();
        }
           public function zanr(){
            $upit = $query = $this->db->get('zanr');
            return $upit->result();
        }
        
          public function film_zanr() {
            $this->db->select('*');
            $this->db->select('fz.vreme_unosa vreme');
            $this->db->select('fz.korisnik_id uneo');
            $this->db->from('film f');
            $this->db->join('fil_zan fz', 'f.id=fz.id_film', 'left' );
            $this->db->join('zanr z', 'z.id=fz.id_zanr', 'left');
            $this->db->group_by(array("z.id", "f.id"));
            $upit = $this->db->get();
             return $upit->result();
        }
        
        public function film_glumac() {
            $this->db->select('*');
            $this->db->select('fg.vreme_unosa vreme');
            $this->db->select('fg.korisnik_id uneo');
            $this->db->from('film f');
            $this->db->join('fil_glu fg', 'f.id=fg.id_film' );
            $this->db->join('glumci g', 'g.id=fg.id_glumac');
             $this->db->group_by(array("g.id", "f.id"));
            $upit = $this->db->get();
             return $upit->result();
        }
        
        public function obrisi_red($tabela, $id) {
		$this->db->delete($tabela, array('id' => $id));
	}
        
        public function obrisi_red1($tabela,$id_film,$id_glumac) {
		$this->db->delete($tabela, array('id_film' => $id_film, 'id_glumac' => $id_glumac ));
	}
        
        public function obrisi_red2($tabela,$id_film,$id_zanr) {
		$this->db->delete($tabela, array('id_film' => $id_film, 'id_zanr' => $id_zanr ));
	}

	public function dodaj_red($tabela, $vrednosti) {
		$this->db->insert($tabela, $vrednosti);
	}
	
	public function izmeni_red($tabela,$vrednosti,$id) {
		$this->db->where('id', $id);
		$this->db->update($tabela, $vrednosti); 
	}
        
        public function izmeni_red1($tabela,$vrednosti,$id_film,$id_glumac) {
		
         $this->db->update($tabela, $vrednosti, array('id_film' => $id_film, 'id_glumac' => $id_glumac));
		
	}
        
               public function izmeni_red2($tabela,$vrednosti,$id_film,$id_zanr) {
		
         $this->db->update($tabela, $vrednosti, array('id_film' => $id_film, 'id_zanr' => $id_zanr));
		
	}
	
	public function unesi_red($tabela,$vrednosti) {
		$this->db->insert($tabela, $vrednosti); 
	}
        
        
}
