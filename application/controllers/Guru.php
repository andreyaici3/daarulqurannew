<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function index()
	{
		$data = [
			'menuAktif' => "Sekolah",
			'guru'		=> $this->guru->getAll()
		];
		$this->frontend->view('guru', $data);
	}

}