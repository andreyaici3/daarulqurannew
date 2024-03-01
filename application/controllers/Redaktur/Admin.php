<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends AUTH_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data = [
            'title' => "Dashboard",
            'page'	=> "admin",
            'mapel' => $this->mapel->mapelNum(),
            'guru' => $this->guru->guruNum(),
            'kelas' => $this->kelas->kelasNum(),
            'siswa' => $this->siswa->siswaNum()
        ];
        $this->backend->view('dashboard', $data);
	}

	

	public function siswa($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->siswa(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->siswa('add');				
			} else if ($id == 'edit' || $id == 'Edit') {
				$this->mc->siswa('edit', $key);
			} else {
				$this->mc->siswa('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}

	public function kelas($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$data = [
					'title' => "Kelas",
					'page'	=> "admin",
					'type'	=> 'list',
					'list'	=> $this->kelas->lists(),
					'sess'	=> $this->auth->sessionProses()
				];
				$this->backend->view('kelas', $data);
			} else if ($id == 'add' || $id == 'Add') {
				$this->rules->kelas();
				if ($this->form_validation->run() != true) {
					$data = [
						'title' => "Tambah Kelas",
						'page'	=> "admin",
						'type' => "add",
						'sess'	=> $this->auth->sessionProses()
					];
					$this->backend->view('kelas', $data);
				} else {
					$this->kelas->add();
				}
			} else {
				$url = $this->mapel->decodeUrl($key);
				if ($url == $id) {
					$this->kelas->delete($id);
				} else {
					$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            			Delete Failed
        				</div>');
					redirect('admin/kelas');
				}
			}
		}else {
			$this->auth->redirect();
		}
	}

	public function guru($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->guru(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->guru('add');
			} else if ($id == 'detail'){
				$this->mc->guru('detail', $key);
			} else if ($id == 'edit') {
				$this->mc->guru('edit', $key);
			} else {
				$this->mc->guru('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}

	public function pengumuman($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->pengumuman(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->pengumuman('add');
			} else if ($id == 'detail'){
				$this->mc->pengumuman('detail', $key);
			} else if ($id == 'edit') {
				$this->mc->pengumuman('edit', $key);
			} else {
				$this->mc->pengumuman('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}

	public function berita($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->berita(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->berita('add');
			} else if ($id == 'detail'){
				$this->mc->berita('detail', $key);
			} else if ($id == 'edit') {
				$this->mc->berita('edit', $key);
			} else {
				$this->mc->berita('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}

	public function album($id = NULL, $key = NULL, $ids = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->album(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->album('add');
			} else if ($id == 'detail'){
				$this->mc->album('detail', $key);
			} else if ($id == 'edit') {
				$this->mc->album('edit', $key);
			} else if ($id == 'foto'){
				if ($key == 'delete') {
					$this->galery->deleteFoto($ids);
				} else {
					$this->mc->album('foto', $key);
				}
			}
			else {
				$this->mc->album('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}

	public function doc($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->doc(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->doc('add');
			} else if ($id == 'edit') {
				$this->mc->doc('edit', $key);
			} else {
				$this->mc->doc('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}

	public function ppdb($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->ppdb(NULL);
			} else {
				$this->mc->ppdb('detail', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}

    public function slider($id = NULL, $key = NULL){
        $cek = $this->auth->level();
        if ($cek == 1){
            if ($id == NULL && $key == NULL){
                $this->mc->slider(); 
            } else if ($id == 'add' || $id == 'Add') {
				$this->mc->slider('add');
			}  else {
                $this->mc->slider('delete', $key, $id);
            }       
        } else {
            $this->auth->redirect();
        }
    }

	public function puisi($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1 || $cek == 2) {
			if ($id == NULL && $key == NULL) {
				$this->mc->puisi(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->puisi('add');
			} else if ($id == 'detail'){
				$this->mc->puisi('detail', $key);
			} else if ($id == 'edit') {
				$this->mc->puisi('edit', $key);
			} else {
				$this->mc->puisi('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
    }
    
    public function cerpen($id = NULL, $key = NULL){
        $cek = $this->auth->level();
        if ($cek == 1 || $cek == 2) {
            if ($id == NULL && $key == NULL) {
				$this->mc->cerpen(NULL);
			}
        } else {
            $this->auth->redirect();
        }
    }   
    



	public function logout(){
		$cek = $this->auth->level();
		if ($cek != NULL) {
			$this->auth->logout();
		}else {
			$this->auth->redirect();
		}
		
	}
}