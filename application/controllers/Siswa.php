<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function index(){
		$data = [
			'menuAktif' => "Sekolah",
			'siswa'		=> $this->siswa->getAll()
		];
		$this->frontend->view('siswa', $data);
	}
}