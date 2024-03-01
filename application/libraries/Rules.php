<?php 

class Rules
{
	protected $ci;
	function __construct(){
		$this->ci = &get_instance();
	}

	function login(){
		$this->ci->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->ci->form_validation->set_rules('password','Password','required|trim');
	}

	function mapel(){
		$this->ci->form_validation->set_rules('kode','Kode Mapel','required|is_unique[tbl_mapel.kode_mapel]');
		$this->ci->form_validation->set_rules('mapel','Mata Pelajaran','required');
	}

	function mapelEdit(){
		$this->ci->form_validation->set_rules('kode','Kode Mapel','required');
		$this->ci->form_validation->set_rules('mapel','Mata Pelajaran','required');
	}

    function slider(){
		$this->ci->form_validation->set_rules('judul','Judul Slider','required');
	}

	function kelas()
	{
		$this->ci->form_validation->set_rules('kelas','Kelas','required|is_unique[tbl_kelas.kelas]',
			[
				'is_unique' => 'Kelas Sudah Ada Dalam Database, Tidak Bisa Ditambahkan',
				'required'	=> 'Mohon Masukan Nama Kelas'

			]);
	}

	function guru(){
		$this->ci->form_validation->set_rules('nip','nip','required',['required' => 'Mohon Masukan NIP Guru']);
		$this->ci->form_validation->set_rules('nama_guru','nama_guru','required',['required' => 'Mohon Masukan Nama Guru']);
		$this->ci->form_validation->set_rules('tempat_lahir','tempat_lahir','required',['required' => 'Mohon Masukan Tempat Lahir']);
		$this->ci->form_validation->set_rules('tanggal_lahir','tanggal_lahir','required',['required' => 'mohon Masukan Tanggal Lahir']);
		$this->ci->form_validation->set_rules('mapel','mapel','required',['required' => 'Mohon Pilih Mapel']);
	}

	function siswa(){
		$this->ci->form_validation->set_rules('nis','NIS','required|trim|max_length[12]');
		$this->ci->form_validation->set_rules('nama_siswa','Nama Siswa','required|trim');
		$this->ci->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|trim');
		$this->ci->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required|trim');
		$this->ci->form_validation->set_rules('id_kelas','Kelas','required|trim');
	}

	function pengumuman(){
		$this->ci->form_validation->set_rules('judul','Judul','required');
	}

	function file(){
		$this->ci->form_validation->set_rules('des','Deskripsi','required');
	}

	function berita(){
		$this->ci->form_validation->set_rules('judul','Judul','required');
	}

	function album(){
		$this->ci->form_validation->set_rules('judul','Judul','required');	
	}

	function foto(){
		$this->ci->form_validation->set_rules('ket','Keterangan','required');	
	}

	function puisi(){
		$this->ci->form_validation->set_rules('judul','Judul','required');	
	}



}