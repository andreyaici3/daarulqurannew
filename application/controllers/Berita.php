<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index(){
		$perPage = $this->berita->perPage();
		$start	 = $this->uri->segment(3);
		$data = [
			'menuAktif'		=> 'Berita',
			'berita'		=> $this->berita->listAll($perPage, $start),
			'latestBerita'	=> $this->berita->latestBerita(7),
			'page'	=> $this->berita->paginationConf()
		];
		$this->frontend->view('berita', $data, TRUE);
	}

	public function post($tahun,$bulan,$slug){
        $berita = $this->berita->getDetailBerita($tahun,$bulan,$slug);
        $puisi = $this->puisi->getDetailPuisi($tahun,$bulan,$slug);
        if ($berita != []){
            $data = [
                'menuAktif'		=> 'Berita',
                'berita' => $berita,
                'latestBerita'	=> $this->berita->latestBerita(7)
            ];
            $this->frontend->view('post', $data, TRUE);
        } 

        if ($puisi != []){
            $data = [
                'menuAktif'		=> 'Puisi',
                'berita' => $puisi
                // 'latestBerita'	=> $this->berita->latestBerita(7)
            ];
            $this->frontend->view('puisi_post', $data, TRUE);
        }

    }
    
	public function indexa()
	{
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'Data Berita',
				'setup' => setWeb(),
				'berita' => beritaJoinUser()
			];

			_lib('admin/berita/list', $data);
		} else {
			redirect('dashboard');
		}
	}



	public function add()
	{
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'Tambah Berita',
				'setup' => setWeb()
			];

			rulesBerita();

			if ($this->form_validation->run() == true) {
				$this->M_berita->add();
			}

			_lib('admin/berita/add', $data);		
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
				'title2' => 'Edit Berita',
				'berita'	=> $this->db->get_where('tbl_berita',['id_berita' => $id])->row_array(),
				'identity' => urlencode(base64_encode(base64_encode($id))),
				'setup' => setWeb()
			];

			rulesBerita();

			if ($this->form_validation->run() == true) {
				$this->M_berita->edit();
			}

			_lib('admin/berita/edit', $data);

		} else {
			redirect('dashboard');
		}
		
	}


	public function delete($id)
	{
		if ($this->session->userdata('level') == 1) {
			$this->M_berita->delete($id);
		} else {
			redirect('dashboard');
		}
	}

	// public function post($tahun,$bulan,$slug)
	// {
	// 	$data = [
	// 		'title' => 'Admin',
	// 		'berita' => $this->M_berita->getDetailBerita($tahun,$bulan,$slug),
	// 		'latest' => $this->M_berita->latestBerita()
	// 	];

	// 	$this->load->view('templates/front/head',$data);
	// 	$this->load->view('templates/front/header');
	// 	$this->load->view('templates/front/menu');	
	// 	$this->load->view('front/beritaDetail');
	// 	$this->load->view('templates/front/footer');
	// 	$this->load->view('templates/front/foot');
	// }

}