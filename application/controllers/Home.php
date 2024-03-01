<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$data = [
			'berita'		=> $this->berita->latestBerita(3),
			'pengumuman'	=> $this->pengumuman->latestPengumuman(6),
			'menuAktif'		=> 'Home',
			'head'			=> 'Home'
		];
		$this->frontend->view('index', $data, TRUE);
    }
    
    public function puisi(){
        $perPage = $this->puisi->perPage();
		$start	 = $this->uri->segment(3);
		$data = [
			'menuAktif'		=> 'Karya',
			'berita'		=> $this->puisi->listAll($perPage, $start),
			'latestBerita'	=> $this->puisi->latestPuisi(7),
			'page'	=> $this->puisi->paginationConf()
		];
		$this->frontend->view('puisi', $data, TRUE);
    }
	
}
