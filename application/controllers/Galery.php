<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galery extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_galery','galery');
	}

	public function index()
	{
		$data = [
			'menuAktif' => "Galery",
			'album'		=> $this->galery->getAlbum()
		];
		$this->frontend->view('galery', $data);
	}

	public function detail($id)
	{
		$data['menuAktif'] = "Galery";
		$data['detail'] = $this->galery->getDetail($id);
		$this->frontend->view('detail', $data);	
	}

	// public function index()
	// {
	// 	if ($this->session->userdata('level') == 1) {

	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'Galery',
	// 			'list' => $this->M_galery->getAlbum(),
	// 			'setup' => setWeb()
	// 		];

	// 		_lib('admin/galery/list', $data);		
	// 	} else {
	// 		redirect('dashboard');
	// 	} 
	// }

	public function add()
	{
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'Tambah Album',
				'setup' => setWeb()
			];

			rulesPengumuman();

			if ($this->form_validation->run() == true) {
				$this->M_galery->add();
			}

			_lib('admin/galery/add', $data);		
		} else {
			redirect('dashboard');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('level') == 1) {
			$id = urldecode(base64_decode(base64_decode($id)));
			$data = [
				'title' => 'Admin',
				'title2' => 'Edit kelas',
				'album' => $this->db->get_where('tbl_album', ['id_album' => $id])->row_array(),
				'identity' => urlencode(base64_encode(base64_encode($id))),
				'setup' => setWeb()
			];

			rulesPengumuman();

			if ($this->form_validation->run() == true) {
				$this->M_galery->edit();
			}

			_lib('admin/galery/edit', $data);

		} else {
			redirect('dashboard');
		}
		
	}

	public function delete($id)
	{
		if ($this->session->userdata('level') == 1) {
			$this->M_galery->delete($id);
		} else {
			redirect('dashboard');
		}
	}

	public function foto($album){

		$data = [
			'title' => 'Admin',
			'title2' => 'Tambah Foto: ',
			'album' => $this->db->get_where('tbl_album', ['id_album' => $album])->row_array(),
			'foto' => $this->db->get_where('tbl_foto',['id_album'=> $album])->result_array(),
			'setup' => setWeb()
		];

		rulesFoto();

		if ($this->form_validation->run() == true) {
			$this->M_galery->foto();
		}

		_lib('admin/galery/foto', $data);
	}

	public function hapusFoto($id)
	{
		if ($this->session->userdata('level') == 1) {
			$this->M_galery->hapusFoto($id);
		} else {
			redirect('dashboard');
		}
	}

}