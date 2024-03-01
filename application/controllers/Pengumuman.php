<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller 
{
	public function index()
	{
		$data = [
			'menuAktif' => "Pengumuman",
			'pengumuman' => $this->db->get('tbl_pengumuman')->result()
		];
		$this->frontend->view('pengumuman', $data);
	}

	public function detail($id){
		$data['pengumuman'] = $this->pengumuman->getPengumumanId($id);
		$data['menuAktif'] = $data['pengumuman'][0]->judul_pengumuman;
		$this->frontend->view('detailPengumuman', $data);
	}

}