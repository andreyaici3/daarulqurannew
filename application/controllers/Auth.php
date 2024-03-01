<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
        if ($this->form_validation->run() != true) {
			$data = ['page' => "login", 'title' => "Login" ];
			$this->backend->view('auth/login', $data, TRUE);
		} else {
			$this->auth->login();
		}
    }

	public function logout(){
		$this->auth->logout();
	}
}