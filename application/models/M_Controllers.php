<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Controllers extends CI_Model {

	public function mapel($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			
		} else if ($param == 'add'){
			$this->rules->mapel();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Mata Pelajaran",
					'page'	=> "admin",
					'type'	=> 'add',
					'list'	=> $this->mapel->lists(),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('mapel', $data);
			} else {
				$this->mapel->add();
			}
		} else if ($param == 'edit') {
			$url = $this->mapel->decodeUrl($key);
			$this->rules->mapelEdit();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Edit Mata Pelajaran",
					'page'	=> "admin",
					'type'	=> 'edit',
					'list'	=> $this->mapel->list($url),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('mapel', $data);
			} else {
				$this->mapel->edit();
			}
		} else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->mapel->delete($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/mapel');
			}
		}
	}

	public function siswa($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "Data Siswa",
				'page'	=> "admin",
				'type'	=> 'list',
				'list'	=> $this->siswa->getAll(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('siswa', $data);
		} else if ($param == 'add'){
			$this->rules->siswa();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Siswa",
					'page'	=> "admin",
					'type'	=> 'add',
					'list'	=> $this->kelas->lists(),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('siswa', $data);
			} else {
				$this->siswa->add();
			}
		} else if ($param == 'edit') {
			$url = $this->mapel->decodeUrl($key);
			$this->rules->siswa();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Edit Data Siswa",
					'page'	=> "admin",
					'type'	=> 'edit',
					'lists'	=> $this->kelas->lists(),
					'list'	=> $this->siswa->getOne($url),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('siswa', $data);
			} else {
				$this->siswa->edit();
			}
		} else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->siswa->delete($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/siswa');
			}
		}
	}

	public function guru($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "Guru",
				'page'	=> "admin",
				'type'	=> 'list',
				'list'	=> $this->guru->getAll(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('guru', $data);
		} else if ($param == 'add'){
			$this->rules->guru();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Guru",
					'page'	=> "admin",
					'type' => "add",
					'mapel' => $this->mapel->lists(),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('guru', $data);
			} else {
				$this->guru->add();
			}

		} else if ($param == 'edit') {
			$this->rules->guru();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Edit Data Guru",
					'page'	=> "admin",
					'type' => "edit",
					'mapel' => $this->mapel->lists(),
					'id'	=> $this->mapel->decodeUrl($key),
					'sess'	=> $this->auth->sessionProses()
				];
				$data['guru'] =  $this->guru->getOne($data['id']);
				$this->backend->view('guru', $data);
			} else {
				$this->guru->edit();
			}
		} else if ($param == 'detail') {
			$data = [
				'title' => "Detail Guru",
				'page'	=> "admin",
				'type' => "detail",
				'id'	=> $this->mapel->decodeUrl($key),
				'sess'	=> $this->auth->sessionProses()
			];
			$data['guru'] =  $this->guru->getOne($data['id']);
			$this->backend->view('guru', $data);
		} else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->guru->delete($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/guru');
			}
		}
	}

	public function pengumuman($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "Pengumuman",
				'page'	=> "admin",
				'menuAktif' => 'content',
				'subMenu' => 'pengumuman',
				'type'	=> 'list',
				'list'	=> $this->pengumuman->getAll(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('pengumuman', $data);
		} else if ($param == 'add'){
			$this->rules->pengumuman();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Pengumuman",
					'page'	=> "admin",
					'type'	=> 'add',
					'menuAktif' => 'content',
					'subMenu' => 'pengumuman',
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('pengumuman', $data);
			} else {
				$this->pengumuman->add();
			}
		} else if ($param == 'edit') {
			$url = $this->mapel->decodeUrl($key);
			$this->rules->pengumuman();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Edit Pengumuman",
					'page'	=> "admin",
					'type'	=> 'edit',
					'menuAktif' => 'content',
					'subMenu' => 'pengumuman',
					'list'	=> $this->pengumuman->getOne($url),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('pengumuman', $data);
			} else {
				$this->pengumuman->edit();
			}
		} else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->pengumuman->delete($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/pengumuman');
			}
		}
	}

	public function berita($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "Berita",
				'page'	=> "admin",
				'menuAktif' => 'content',
				'subMenu' => 'berita',
				'type'	=> 'list',
				'list'	=> $this->berita->listAllNL(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('berita', $data);
		} else if ($param == 'add'){
			$this->rules->berita();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Berita",
					'page'	=> "admin",
					'type'	=> 'add',
					'menuAktif' => 'content',
					'subMenu' => 'berita',
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('berita', $data);
			} else {
				$data['sess'] = $this->auth->sessionProses();
				$this->berita->add($data['sess']['user']->id);
			}
		} else if ($param == 'edit') {
			$url = $this->mapel->decodeUrl($key);
			$this->rules->berita();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Edit Berita",
					'page'	=> "admin",
					'type'	=> 'edit',
					'menuAktif' => 'content',
					'subMenu' => 'berita',
					'list'	=> $this->berita->getOne($url),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('berita', $data);
			} else {
				$data['sess'] = $this->auth->sessionProses();
				$this->berita->edit($key, $data);
			}
		} else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->berita->delete($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/pengumuman');
			}
		}
	}

	public function album($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "Album",
				'page'	=> "admin",
				'menuAktif' => 'content',
				'subMenu' => 'galery',
				'type'	=> 'list',
				'list'	=> $this->galery->getAlbum(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('galery', $data);
		} else if ($param == 'add'){
			$this->rules->album();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Album",
					'page'	=> "admin",
					'type'	=> 'add',
					'menuAktif' => 'content',
					'subMenu' => 'galery',
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('galery', $data);
			} else {
				$this->galery->add();
			}
		} else if ($param == 'edit') {
			$url = $this->mapel->decodeUrl($key);
			$this->rules->album();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Edit Album",
					'page'	=> "admin",
					'type'	=> 'edit',
					'menuAktif' => 'content',
					'subMenu' => 'galery',
					'list'	=> $this->galery->getOne($url),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('galery', $data);
			} else {
				$this->galery->edit($key);
			}
		} else if ($param == 'foto') {
			$url = $this->mapel->decodeUrl($key);
			$this->rules->foto();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Foto Album",
					'page'	=> "admin",
					'type'	=> 'foto',
					'menuAktif' => 'content',
					'subMenu' => 'galery',
					'list'	=> $this->galery->getDetail($url),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('galery', $data);
			} else {
				$this->galery->foto($key);
			}
		} else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->galery->delete($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/album');
			}
		}
	}

	public function doc($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "Document",
				'page'	=> "admin",
				'menuAktif' => 'content',
				'subMenu' => 'doc',
				'type'	=> 'list',
				'list'	=> $this->file->lists(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('doc', $data);
		} else if ($param == 'add'){
			$this->rules->file();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Document",
					'page'	=> "admin",
					'type'	=> 'add',
					'menuAktif' => 'content',
					'subMenu' => 'doc',
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('doc', $data);
			} else {
				$data['sess'] = $this->auth->sessionProses();
				$this->file->add($data['sess']['user']->id);
			}
		} else if ($param == 'edit') {
			if (!$key) {
				redirect('admin/doc');
			} else {
				$url = $this->mapel->decodeUrl($key);
				$this->rules->file();
				if ($this->form_validation->run() != true) {
					$data = [
						'title' => "Edit Document",
						'page'	=> "admin",
						'type'	=> 'edit',
						'menuAktif' => 'content',
						'subMenu' => 'doc',
						'sess'	=> $this->auth->sessionProses(),
						'list'	=> $this->file->getOne($url)
					];
					$this->backend->view('doc', $data);
				} else {
					$this->file->edit($key);
				}
			}
		} else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			$match = $id == $url;
			if ($match) {
				$this->file->delete($url);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         			Delete Failed
    				</div>');
				redirect('admin/doc');
			}
		}
	}

    public function slider($param = NULL, $key = NULL, $id = NULL){
        if ($param == NULL){
            $data = [
                'title'     => 'Pengaturan Slider',
                'page'      => "admin",
                'menuAktif' => 'slider',
                'subMenu'   => 'list',
                'type'      => 'list',
                'list'      => $this->file->get_slider(),
                'sess'	=> $this->auth->sessionProses()
            ];
            $this->backend->view('slider', $data);
        } else if ($param == 'add'){
            $this->rules->slider();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Pengaturan Slider",
					'page'	=> "admin",
                    'menuAktif' => "slider",
                    'subMenu'   => 'list',
					'type'	=> 'add',
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('slider', $data);
			} else {
				$this->galery->addSlider();
			}
        } else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->galery->deleteSlider($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/slider');
			}
		}
    }

	public function ppdb($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "PPDB SISWA",
				'page'	=> "admin",
				'menuAktif' => 'ppdb',
				'subMenu' => 'list',
				'type'	=> 'list',
				'list'	=> $this->ppdb->getAll(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('ppdb', $data);
		} else {
			$data = [
				'title' => "PPDB SISWA",
				'page'	=> "admin",
				'list' => $this->ppdb->getSiswa($key),
				'menuAktif' => 'ppdb',
				'subMenu' => 'list',
				'type'	=> 'detail',
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('ppdb', $data);
		}
    }
    
    public function cerpen($param, $key = NULL, $id = NULL){
        if ($param == NULL){
			$data = [
				'title' => "Cerpen",
				'page'	=> "admin",
				'type'	=> 'list',
				// 'list'	=> $this->puisi->listAllN(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('cerpen', $data);
		}
    }

	public function puisi($param, $key = NULL, $id = NULL){
		if ($param == NULL){
			$data = [
				'title' => "Puisi",
				'page'	=> "admin",
				'type'	=> 'list',
				'list'	=> $this->puisi->listAllN(),
				'sess'	=> $this->auth->sessionProses()
			];
			$this->backend->view('puisi', $data);
		} else if ($param == 'add'){
			$this->rules->puisi();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Tambah Puisi",
					'page'	=> "admin",
					'type'	=> 'add',
					// 'menuAktif' => 'content',
					// 'subMenu' => 'berita',
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('puisi', $data);
			} else {
				$data['sess'] = $this->auth->sessionProses();
				$this->puisi->add($data['sess']['user']->id);
			}
		} else if ($param == 'edit') {
			$url = $this->mapel->decodeUrl($key);
			$this->rules->puisi();
			if ($this->form_validation->run() != true) {
				$data = [
					'title' => "Edit Puisi",
					'page'	=> "admin",
					'type'	=> 'edit',
					'menuAktif' => 'content',
					'subMenu' => 'puisi',
					'list'	=> $this->db->get_where('tbl_puisi',['slug_puisi' => $url])->row(),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('puisi', $data);
			}  else {
				$data['sess'] = $this->auth->sessionProses();
				$this->puisi->edit($key, $data);
			} }
	
		 else if ($param == 'delete'){
			$url = $this->mapel->decodeUrl($key);
			if ($url == $id) {
				$this->puisi->delete($id);
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        			Delete Failed
    				</div>');
				redirect('admin/puisi');
            }
		}
	}



}