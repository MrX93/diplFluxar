<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Account extends MY_Controller {

	public function logIn() {
		$user = $this->input->post('user');
		$pass = md5($this->input->post('pass'));
		$this->load->model('korisnici_model');
		$rezultat = $this->korisnici_model->logovanje($user, $pass);

		if (isset($rezultat)) {
			$sesija = array(
					'uloga' => $rezultat['logovanje'][0]['uloga_id'],
					'nadimak' => $rezultat['logovanje'][0]['nadimak'],
					'korisnik_id' => $rezultat['logovanje'][0]['id']
			);
			$this->session->set_userdata($sesija);
                        
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
        
        public function registration(){
            $podaci['tittle']="registration";
            $this->stranica('registration', $podaci);
        }
        
        public function registration_insert() {
		$this->load->model('account_model');
                
                $full_name = $_POST['full_name'];
		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$confirm_password = md5($_POST['confirm_password']);
		$reMeil = '/^[\S]+@[a-z]{3,8}\.[a-z]{2,4}(\.[a-z]{2,4})?$/';
		$greske = array();

                if ($full_name == "") {
			$greske[] = "You must enter full name!!!";
		}

		if ($nickname == "") {
			$greske[] = "You must enter nickname!!!";
		}

		if (!preg_match($reMeil, $email)) {
			$greske[] = "E-mail isnt in right format!!!";
		}

		if ($password != $confirm_password) {
			$greske[] = "Passwords dose not mactch!!!";
		}
		if ($password == "") {
			$greske[] = "You must enter password!!!";
		}
		if (count($greske) == 0) {
			$data = array(
                                        'ime_prezime'=> $this->input->post('full_name'),
					'nadimak' => $this->input->post('nickname'),
					'mail' => $this->input->post('email'),
					'sifra' => md5($this->input->post('password')),
                                        'slika' =>'images/default_avatar.jpg',
					'uloga_id' => '2',
			);
			$this->account_model->registration($data);
			redirect(base_url());
		} else {
			foreach ($greske as $g) {
				echo $g . "</br>";
			}
		}
	}
        
}

