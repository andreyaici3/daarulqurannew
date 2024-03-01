<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function getListFile()
	{
		$this->db->select('*');
		$this->db->from('tbl_file');
		$this->db->join('tbl_user','tbl_file.author = tbl_user.id','left');
		return $this->db->get()->result_array();
	}

	public function index()
	{
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'List Document',
				'setup' => setWeb(),
				'file' => $this->getListFile()
			];

			_lib('admin/document/list', $data);		
		} else {
			redirect('dashboard');
		}
	}

	public function add()
	{
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'Upload Document',
				'setup' => setWeb()
			];

			$this->form_validation->set_rules('ket','Keterangan','required');

			if ($this->form_validation->run() == true) {
				$this->M_upload->add();
			}

			_lib('admin/document/add', $data);		
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
				'title2' => 'Edit Data',
				'file' => $this->db->get_where('tbl_file',['id_file'=>$id])->row_array(),
				'identity' => urlencode(base64_encode(base64_encode($id))),
				'setup' => setWeb()
			];

			$this->form_validation->set_rules('ket','Keterangan','required');

			if ($this->form_validation->run() == true) {
				$this->M_upload->edit();
			}

			_lib('admin/document/edit', $data);

		} else {
			redirect('dashboard');
		}
		
	}

	public function delete($id)
	{
		if ($this->session->userdata('level') == 1) {
			$this->M_upload->delete($id);
		} else {
			redirect('dashboard');
		}
	}

	public function ktp()
	{
		if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
			$data = [
				'setup' => setWeb(),
				'title' => 'dashboard',
				'title2' => 'Upload KTP',
				'document' => $this->db->get_where('tbl_document', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array(),
				'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()];

			$this->load->view('templates/back/head',$data);
			$this->load->view('admin/layout/toplink');
			$this->load->view('admin/layout/sidebarPpdb');
			$this->load->view('admin/ppdb/siswa/ktp');
			$this->load->view('admin/layout/footer');
			$this->load->view('templates/back/footer');
		} else {
			fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
		}
	}

	public function kk()
	{
		if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
			$data = [
				'setup' => setWeb(),
				'title' => 'dashboard',
				'title2' => 'Upload Kartu Keluarga',
				'document' => $this->db->get_where('tbl_document', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array(),
				'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()];

			$this->load->view('templates/back/head',$data);
			$this->load->view('admin/layout/toplink');
			$this->load->view('admin/layout/sidebarPpdb');
			$this->load->view('admin/ppdb/siswa/kk');
			$this->load->view('admin/layout/footer');
			$this->load->view('templates/back/footer');
		} else {
			fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
		}
	}

	public function ijasah()
	{
		if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
			$data = [
				'setup' => setWeb(),
				'title' => 'dashboard',
				'title2' => 'Upload Ijasah',
				'document' => $this->db->get_where('tbl_document', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array(),
				'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()];

			$this->load->view('templates/back/head',$data);
			$this->load->view('admin/layout/toplink');
			$this->load->view('admin/layout/sidebarPpdb');
			$this->load->view('admin/ppdb/siswa/ijasah');
			$this->load->view('admin/layout/footer');
			$this->load->view('templates/back/footer');
		} else {
			fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
		}
	}

	public function skhun()
	{
		if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
			$data = [
				'setup' => setWeb(),
				'title' => 'dashboard',
				'title2' => 'Upload SKHUN',
				'document' => $this->db->get_where('tbl_document', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array(),
				'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()];

			$this->load->view('templates/back/head',$data);
			$this->load->view('admin/layout/toplink');
			$this->load->view('admin/layout/sidebarPpdb');
			$this->load->view('admin/ppdb/siswa/skhun');
			$this->load->view('admin/layout/footer');
			$this->load->view('templates/back/footer');
		} else {
			fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
		}
	}

	public function akta()
	{
		if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
			$data = [
				'setup' => setWeb(),
				'title' => 'dashboard',
				'title2' => 'Upload akta Kelahiran',
				'document' => $this->db->get_where('tbl_document', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array(),
				'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()];

			$this->load->view('templates/back/head',$data);
			$this->load->view('admin/layout/toplink');
			$this->load->view('admin/layout/sidebarPpdb');
			$this->load->view('admin/ppdb/siswa/akta');
			$this->load->view('admin/layout/footer');
			$this->load->view('templates/back/footer');
		} else {
			fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
		}
	}

	public function foto()
	{
		if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
			$data = [
				'setup' => setWeb(),
				'title' => 'dashboard',
				'title2' => 'Upload Pas Foto',
				'document' => $this->db->get_where('tbl_document', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array(),
				'person' => $this->db->get_where('master_data_siswa', ['id_siswa' => $this->session->userdata('id_user')])->row_array()];

			$this->load->view('templates/back/head',$data);
			$this->load->view('admin/layout/toplink');
			$this->load->view('admin/layout/sidebarPpdb');
			$this->load->view('admin/ppdb/siswa/foto');
			$this->load->view('admin/layout/footer');
			$this->load->view('templates/back/footer');
		} else {
			fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
		}
	}

	public function document($type)
	{
		if ($type == "ktp") {
			if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
				$this->M_upload->ktp();
			} else {
				fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
			}
		}

		if ($type == "kk") {
			if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
				$this->M_upload->kk();
			} else {
				fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
			}
		}

		if ($type == "ijasah") {
			if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
				$this->M_upload->ijasah();
			} else {
				fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
			}
		}

		if ($type == "skhun") {
			if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
				$this->M_upload->skhun();
			} else {
				fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
			}
		}

		if ($type == "akta") {
			if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
				$this->M_upload->akta();
			} else {
				fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
			}
		}

		if ($type == "foto") {
			if ($this->session->userdata('token') && $this->session->userdata('sesi') == 9999) {
				$this->M_upload->foto();
			} else {
				fGagal('Silahkan Login Terlebih Dahulu','ppdb/login');
			}
		}


	}
}