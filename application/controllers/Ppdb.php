<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {
	public function index()
	{
		
		$this->load->view('front/ppdb/menu');
		redirect('https://ppdb.daarulquran.sch.id');
	}

	public function pendaftaran()
	{
		$this->load->view('front/ppdb/sorry');
		
	
		// $this->load->model('M_ppdb');
		// $data = [
		// 	'title' => 'Registrasi Siswa'
		// ];
		// $this->load->view('templates/back/head',$data);
		// $this->load->view('front/ppdb/registrasiSiswa');
		// $this->load->view('templates/back/footer');

		// $this->form_validation->set_rules('nama_lengkap','Email','required|trim');
		// $this->form_validation->set_rules('wa','No Telp','required');
		// $this->form_validation->set_rules('jenjang','Jenis Pendaftaran','required');

		// if ($this->form_validation->run() == true) {
		// 	$this->M_ppdb->registrasi();
		// }

		

	}


	// public function result()
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('username')) {
	// 		$data = [
	// 			'title' => 'Result Registrasi Siswa'
	// 		];
	// 		$this->load->view('templates/back/head',$data);
	// 		$this->load->view('front/ppdb/resultRegAcc');
	// 		$this->load->view('templates/back/footer');
	// 	} else {
	// 		redirect('ppdb/pendaftaran');
	// 	}
	// }

	public function login()
	{
		$this->load->view('front/ppdb/sorry');
		
		// $session = [
		// 	'username','pass','nama_lengkap'
		// ];
		// $this->session->unset_userdata($session);
		// $this->load->model('M_ppdb');
		// $data = [
		// 	'title' => 'Login Calon Siswa'
		// ];
		// $this->load->view('templates/back/head',$data);
		// $this->load->view('front/ppdb/login');
		// $this->load->view('templates/back/footer');

		// $this->form_validation->set_rules('username','Username','required|trim');
		// $this->form_validation->set_rules('password','Password','required|trim');

		// if ($this->form_validation->run() == true) {
		// 	$this->M_ppdb->login();
		// }
	}

	// public function view()
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'PPDB',
	// 			'siswa' => $this->M_ppdb->getAll(),
	// 			'setup' => setWeb()
	// 		];

	// 		_lib('admin/ppdb/view', $data);		
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function status()
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'Status Penerimaan',
	// 			'siswa' => $this->M_ppdb->getAll(),
	// 			'setup' => setWeb()
	// 		];

	// 		_lib('admin/ppdb/status', $data);		
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function documents()
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'Document',
	// 			'siswa' => $this->M_ppdb->getAll(),
	// 			'document' => $this->M_ppdb->getDocs(),
	// 			'setup' => setWeb()
	// 		];

	// 		_lib('admin/ppdb/doc', $data);		
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function terima($id)
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$hasil = $this->M_ppdb->terima($id);
	// 		echo $hasil;die;
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function approve($type, $file)
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$this->M_ppdb->approve($type, $file);
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function reject($type, $file)
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$this->M_ppdb->reject($type, $file);
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function remove($type, $file)
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$this->M_ppdb->remove($type, $file);
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function delete($id)
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$this->M_ppdb->delete($id);
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }


	// public function batal($id)
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$hasil = $this->M_ppdb->batal($id);
	// 		echo $hasil;die;
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	// public function edit($id)
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('level') == 1) {
	// 		$this->load->model('M_ppdb');
	// 		$id = urldecode(base64_decode(base64_decode($id)));
	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'Edit Data Siswa PPDB',
	// 			'siswa'	=> $this->M_ppdb->getSiswa($id),
	// 			'identity' => urlencode(base64_encode(base64_encode($id))),
	// 			'setup' => setWeb()
	// 		];

	// 		$this->form_validation->set_rules('username','Username','required');

	// 		if ($this->form_validation->run() == true) {
	// 			$this->M_ppdb->editA();
	// 			fSukses('Data Berhasil Di Ubah','ppdb/edit/' . urlencode(base64_encode(base64_encode($id))));
	// 		}

	// 		_lib('admin/ppdb/edit', $data);

	// 	} else {
	// 		redirect('dashboard');
	// 	}
		
	// }

	// public function dashboard()
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
	// 		$data = [
	// 			'setup' => setWeb(),
	// 			'title' => 'dashboard',
	// 			'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()];
	// 		$this->load->view('templates/back/head',$data);
	// 		$this->load->view('admin/layout/toplink');
	// 		$this->load->view('admin/layout/sidebarPpdb');
	// 		$this->load->view('admin/ppdb/siswa/list');
	// 		$this->load->view('admin/layout/footer');
	// 		$this->load->view('templates/back/footer');
	// 	} else {
	// 		fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
	// 	}
		
	// }

	// public function sedit($id){
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
	// 		$this->load->model('M_ppdb');
	// 		$id = urldecode(base64_decode(base64_decode($id)));
	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'Edit Data Siswa PPDB',
	// 			'identity' => urlencode(base64_encode(base64_encode($id))),
	// 			'setup' => setWeb(),
	// 			'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()
	// 		];

	// 		$this->form_validation->set_rules('username','Username','required|trim');

	// 		if ($this->form_validation->run() == true) {
	// 			$this->M_ppdb->edit();
	// 		}

	// 		$this->load->view('templates/back/head',$data);
	// 		$this->load->view('admin/layout/toplink');
	// 		$this->load->view('admin/layout/sidebarPpdb');
	// 		$this->load->view('admin/ppdb/siswa/edit');
	// 		$this->load->view('admin/layout/footer');
	// 		$this->load->view('templates/back/footer');

	// 	} else {
	// 		redirect('ppdb/login');
	// 	}	
	// }

	// public function logout()
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	$this->load->model('M_ppdb','ppdb');
	// 	$this->ppdb->logout();
	// }

	// public function changePassword($id){
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
	// 		$this->load->model('M_ppdb');
	// 		$id = urldecode(base64_decode(base64_decode($id)));
	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'Change Password',
	// 			'identity' => urlencode(base64_encode(base64_encode($id))),
	// 			'setup' => setWeb(),
	// 			'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()
	// 		];

	// 		$this->form_validation->set_rules('password','Password','required');
	// 		$this->form_validation->set_rules('passwordBaru','Password Baru','required|min_length[6]|matches[passwordBaru1]');
	// 		$this->form_validation->set_rules('passwordBaru1','Konfirmasi Password Baru','required|matches[passwordBaru]');

	// 		if ($this->form_validation->run() == true) {
	// 			$this->M_ppdb->changePassword();
	// 		}

	// 		$this->load->view('templates/back/head',$data);
	// 		$this->load->view('admin/layout/toplink');
	// 		$this->load->view('admin/layout/sidebarPpdb');
	// 		$this->load->view('admin/ppdb/siswa/change');
	// 		$this->load->view('admin/layout/footer');
	// 		$this->load->view('templates/back/footer');

	// 	} else {
	// 		redirect('ppdb/dashboard');
	// 	}	
	// }


	// public function doc($id){
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
	// 		$this->load->model('M_ppdb');
	// 		$id = urldecode(base64_decode(base64_decode($id)));
	// 		$data = [
	// 			'title' => 'Admin',
	// 			'title2' => 'Upload Document',
	// 			'identity' => urlencode(base64_encode(base64_encode($id))),
	// 			'setup' => setWeb(),
	// 			'document' =>$this->M_ppdb->getDoc($id),
	// 			'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()
	// 		];

			

	// 		$this->load->view('templates/back/head',$data);
	// 		$this->load->view('admin/layout/toplink');
	// 		$this->load->view('admin/layout/sidebarPpdb');
	// 		$this->load->view('admin/ppdb/siswa/doc');
	// 		$this->load->view('admin/layout/footer');
	// 		$this->load->view('templates/back/footer');

	// 	} else {
	// 		redirect('ppdb/login');
	// 	}	
	// }

	// public function document()
	// {
	// 	$this->load->view('front/ppdb/sorry');
	// 	die;
	// 	$config = [
	// 		'upload_path' => './assets/ppdb/',
	// 		'allowed_types' => 'pdf',
	// 		'max_size' => '102048',
	// 		'file_name' => $this->input->post('ident') . '-persyaratan.pdf'
	// 	];

	// 	$query = $this->db->get_where('master_data_siswa',['id_siswa' => $id])->row_array();


	// 	unlink(FCPATH . 'assets/ppdb/' . $query['akta']);

	// 	$data = [
	// 		'akta' => $this->input->post('ident') . '-persyaratan.pdf'
	// 	];

	// 	$this->load->library('upload',$config);
	// 	$this->upload->initialize($config);

	// 	$this->upload->do_upload('akta');
	// 	$this->upload->data();	

	// 	$this->db->set($data);
	// 	$this->db->where('id_siswa',$this->input->post('ident'));
	// 	$this->db->update('master_data_siswa');

	// 	fSukses('persyaratan SUdah Di upload, jika anda mengalami kesalahan upload untuk memperbaikinya silahkan hubungi TIM kami','ppdb/dashboard');
		

		
	// }

}