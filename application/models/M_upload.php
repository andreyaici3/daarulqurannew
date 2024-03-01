<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload extends CI_Model {

	public function lists(){
		$this->db->join('tbl_user','tbl_user.id = tbl_file.author');
		$this->db->order_by('ket_file','ASC');
		return $this->db->get('tbl_file')->result();
	}

	public function getOne($id){
		return $this->db->get_where('tbl_file',['id_file' => $id])->result()[0];
	}

	public function add($id)
	{
		if ($_FILES['doc']['error'] == 4) {
			$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            	Gagal Upload, Silahkan Pilih File Untuk Di Upload
        		</div>');
			redirect('admin/doc');
		} else {

			$ex = explode('.', $_FILES['doc']['name']);
			$newExtensi = '.' . end($ex);
			$nama = date('Ymd') . '-dqfiles-' . time() . $newExtensi;
			$config = [
				'upload_path' => './assets/file/',
				'allowed_types' => 'pdf|docx|doc|xlsx|ppt',
				'file_name' => $nama,
				'max_size' => '102048'
			];

			$time = explode('-', $config['file_name']);

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('doc')) {
				$data = [
					'nama_file' => $config['file_name'],
					'ket_file' => $this->input->post('des'),
					'author' => $id,
					'waktu_upload' => strtotime($time[0])
				];

				$this->db->insert('tbl_file',$data);
				$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            	File Upload Sukses
	        		</div>');
				redirect('admin/doc');
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            	Gagal Upload, File Tidak Di ijinkan
	        		</div>');
				redirect('admin/doc');
			}
		}

	}

	public function slider()
	{
		$query = $this->db->get('web')->row_array();
		$config = [
			'upload_path' => './assets/images/config',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '102048'
		];

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if (!$_FILES['slider1']['error'] == 4) {
			$slider1 = $_FILES['slider1']['name'];
			unlink(FCPATH . 'assets/images/config/' . $query['slider_1_foto']);
			$this->upload->do_upload('slider1');
			$this->upload->data();		
		} else {
			$slider1 = $query['slider_1_foto'];
		}

		if (!$_FILES['slider2']['error'] == 4) {
			$slider2 = $_FILES['slider2']['name'];
			unlink(FCPATH . 'assets/images/config/' . $query['slider_2_foto']);
			$this->upload->do_upload('slider2');
			$this->upload->data();		
		} else {
			$slider2 = $query['slider_2_foto'];
		}

		if (!$_FILES['slider3']['error'] == 4) {
			$slider3 = $_FILES['slider3']['name'];
			unlink(FCPATH . 'assets/images/config/' . $query['slider_3_foto']);
			$this->upload->do_upload('slider3');
			$this->upload->data();		
		} else {
			$slider3 = $query['slider_3_foto'];
		}

		if (!$_FILES['logo_ponpes']['error'] == 4) {
			$logo_ponpes = $_FILES['logo_ponpes']['name'];
			unlink(FCPATH . 'assets/images/config/' . $query['slider_3_foto']);
			$this->upload->do_upload('logo_ponpes');
			$this->upload->data();		
		} else {
			$logo_ponpes = $query['logo_ponpes'];
		}

		if (!$_FILES['logo_ra']['error'] == 4) {
			$logo_ra = $_FILES['logo_ra']['name'];
			unlink(FCPATH . 'assets/images/config/' . $query['slider_3_foto']);
			$this->upload->do_upload('logo_ra');
			$this->upload->data();		
		} else {
			$logo_ra = $query['logo_ra'];
		}

		if (!$_FILES['logo_mts']['error'] == 4) {
			$logo_mts = $_FILES['logo_mts']['name'];
			// unlink(FCPATH . 'assets/images/config/' . $query['slider_3_foto']);
			$this->upload->do_upload('logo_mts');
			$this->upload->data();		
		} else {
			$logo_mts = $query['logo_mts'];
		}

		if (!$_FILES['logo_ma']['error'] == 4) {
			$logo_ma = $_FILES['logo_ma']['name'];
			// unlink(FCPATH . 'assets/images/config/' . $query['slider_3_foto']);
			$this->upload->do_upload('logo_ma');
			$this->upload->data();		
		} else {
			$logo_ma = $query['logo_ma'];
		}

		$data = [
			'slider_1_foto' => $slider1,
			'slider_1_judul' => htmlspecialchars($this->input->post('slider1judul',true)),
			'slider_1_sub' => htmlspecialchars($this->input->post('slider1sub',true)),
			'slider_2_foto' => $slider2,
			'slider_2_judul' => htmlspecialchars($this->input->post('slider2judul',true)),
			'slider_2_sub' => htmlspecialchars($this->input->post('slider2sub',true)),
			'slider_3_foto' => $slider3,
			'slider_3_judul' => htmlspecialchars($this->input->post('slider3judul',true)),
			'slider_3_sub' => htmlspecialchars($this->input->post('slider3sub',true)),
			'logo_ponpes' => $logo_ponpes,
			'judul_ponpes' => htmlspecialchars($this->input->post('judul_ponpes',true)),
			'sub_ponpes' => htmlspecialchars($this->input->post('sub_ponpes',true)),
			'logo_ra' => $logo_ra,
			'judul_ra' => htmlspecialchars($this->input->post('judul_ra',true)),
			'sub_ra' => htmlspecialchars($this->input->post('sub_ra',true)),
			'logo_mts' => $logo_mts,
			'judul_mts' => htmlspecialchars($this->input->post('judul_mts',true)),
			'sub_mts' => htmlspecialchars($this->input->post('sub_mts',true)),
			'logo_ma' => $logo_ma,
			'judul_ma' => htmlspecialchars($this->input->post('judul_ma',true)),
			'sub_ma' => htmlspecialchars($this->input->post('sub_ma',true))
		];

		$this->db->set($data);
		$this->db->where('id', 1);
		$this->db->update('web');
		
		fSukses('Data Berhasil di ubah!!','setting/slider');
		

		
	}

	public function edit($url)
	{
		$id = $this->mapel->decodeUrl($url);
		$data = [
			'ket_file' => htmlspecialchars($this->input->post('des'), TRUE)
		];
		$this->db->set($data);
		$this->db->where('id_file', $id);
		$this->db->update('tbl_file');

		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            	Deskripsi Berhasil Di Ubah
	        		</div>');
		redirect('admin/doc');
		
	}

	public function delete($id)
	{
		$file = $this->db->get_where('tbl_file',['id_file' => $id])->result()[0]->nama_file;
		$lokasi = FCPATH . 'assets/file/' . $file;

		if (file_exists($lokasi)) {
			unlink($lokasi);
		}

		$this->db->where('id_file',$id);
		$this->db->delete('tbl_file');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            	Document Berhasil Di Hapus
	        		</div>');
		redirect('admin/doc');
	}

	public function headerC(){
		$data = [
			'header_1' => htmlspecialchars($this->input->post('header_1',true)),
			'sub_header_1' => htmlspecialchars($this->input->post('sub_header_1',true)),
			'header_2' => htmlspecialchars($this->input->post('header_2',true)),
			'sub_header_2' => htmlspecialchars($this->input->post('sub_header_2',true)),
			'header_3' => htmlspecialchars($this->input->post('header_3',true)),
			'sub_header_3' => htmlspecialchars($this->input->post('sub_header_3',true)),
			'header_4' => htmlspecialchars($this->input->post('header_4',true)),
			'sub_header_4' => htmlspecialchars($this->input->post('sub_header_4',true))
		];

		$this->db->set($data);
		$this->db->where('id', 1);
		$this->db->update('web');
		
		fSukses('Data Berhasil di ubah!!','setting/headerC');
	}	


	public function ktp()
	{
		$id = $this->input->post('ident');
			$query =  $this->db->get_where('tbl_document', ['id_siswa' => $id])->row_array();

			if (!$query) {
				$data = [
					'id_siswa' => $id,
					'status_kk' => 0,
					'status_akta' => 0,
					'status_foto' => 0,
					'status_skhun' => 0,
					'status_ijasah' => 0
				];
				$this->db->insert('tbl_document',$data);
			}

			$config = [
				'upload_path' => './assets/file/siswa/',
				'allowed_types' => 'pdf',
				'file_name' => 'KTP-' . uniqid() . '.pdf',
				'max_size' => '102048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('ktp')) {
				$nama = $config['file_name'];
			} else {
				fGagal('Ktp Gagal Di upload','ppdb/dashboard');
			}

			if ($query['ktp'] != '') {
				if (file_exists(FCPATH . 'assets/file/siswa/' . $query['ktp'])) {
					unlink(FCPATH . 'assets/file/siswa/' . $query['ktp']);
				} 
			}
				


			$data = [
				'ktp' => $nama,
				'status_ktp' => 2				
			];

			$this->db->set($data);
			$this->db->where('id_siswa',$id);
			$this->db->update('tbl_document');
			fSukses('Ktp Berhasil Di upload','ppdb/dashboard');
	}

	public function kk()
	{
		$id = $this->input->post('ident');
			$query =  $this->db->get_where('tbl_document', ['id_siswa' => $id])->row_array();

			if (!$query) {
				$data = [
					'id_siswa' => $id,
					'status_kk' => 0,
					'status_akta' => 0,
					'status_foto' => 0,
					'status_skhun' => 0,
					'status_ijasah' => 0
				];
				$this->db->insert('tbl_document',$data);
			}

			$config = [
				'upload_path' => './assets/file/siswa/',
				'allowed_types' => 'pdf',
				'file_name' => 'KK-' . uniqid() . '.pdf',
				'max_size' => '102048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('kk')) {
				$nama = $config['file_name'];
			} else {
				fGagal('kartu keluarga Gagal Di upload','ppdb/dashboard');
			}

			if ($query['kk'] != '') {
				if (file_exists(FCPATH . 'assets/file/siswa/' . $query['kk'])) {
					unlink(FCPATH . 'assets/file/siswa/' . $query['kk']);
				} 
			}


			$data = [
				'kk' => $nama,
				'status_kk' => 2				
			];

			$this->db->set($data);
			$this->db->where('id_siswa',$id);
			$this->db->update('tbl_document');
			fSukses('Kartu Keluarga Berhasil Di upload','ppdb/dashboard');
	}

	public function ijasah()
	{
		$id = $this->input->post('ident');
			$query =  $this->db->get_where('tbl_document', ['id_siswa' => $id])->row_array();

			if (!$query) {
				$data = [
					'id_siswa' => $id,
					'status_kk' => 0,
					'status_akta' => 0,
					'status_foto' => 0,
					'status_skhun' => 0,
					'status_ijasah' => 0
				];
				$this->db->insert('tbl_document',$data);
			}

			$config = [
				'upload_path' => './assets/file/siswa/',
				'allowed_types' => 'pdf',
				'file_name' => 'IJASAH-' . uniqid() . '.pdf',
				'max_size' => '102048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('ijasah')) {
				$nama = $config['file_name'];
			} else {
				fGagal('Ijasah Gagal Di upload','ppdb/dashboard');
			}

			if ($query['ijasah'] != '') {
				if (file_exists(FCPATH . 'assets/file/siswa/' . $query['ijasah'])) {
					unlink(FCPATH . 'assets/file/siswa/' . $query['ijasah']);
				} 
			}

			$data = [
				'ijasah' => $nama,
				'status_ijasah' => 2				
			];

			$this->db->set($data);
			$this->db->where('id_siswa',$id);
			$this->db->update('tbl_document');
			fSukses('Ijasah Berhasil Di upload','ppdb/dashboard');
	}

	public function skhun()
	{
		$id = $this->input->post('ident');
			$query =  $this->db->get_where('tbl_document', ['id_siswa' => $id])->row_array();

			if (!$query) {
				$data = [
					'id_siswa' => $id,
					'status_kk' => 0,
					'status_akta' => 0,
					'status_foto' => 0,
					'status_skhun' => 0,
					'status_ijasah' => 0
				];
				$this->db->insert('tbl_document',$data);
			}

			$config = [
				'upload_path' => './assets/file/siswa/',
				'allowed_types' => 'pdf',
				'file_name' => 'SKHUN-' . uniqid() . '.pdf',
				'max_size' => '102048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('skhun')) {
				$nama = $config['file_name'];
			} else {
				fGagal('SKHUN Gagal Di upload','ppdb/dashboard');
			}

			if ($query['skhun'] != '') {
				if (file_exists(FCPATH . 'assets/file/siswa/' . $query['skhun'])) {
					unlink(FCPATH . 'assets/file/siswa/' . $query['skhun']);
				} 
			}


			$data = [
				'skhun' => $nama,
				'status_skhun' => 2				
			];

			$this->db->set($data);
			$this->db->where('id_siswa',$id);
			$this->db->update('tbl_document');
			fSukses('SKHUN Berhasil Di upload','ppdb/dashboard');
	}

	public function akta()
	{
		$id = $this->input->post('ident');
			$query =  $this->db->get_where('tbl_document', ['id_siswa' => $id])->row_array();

			if (!$query) {
				$data = [
					'id_siswa' => $id,
					'status_kk' => 0,
					'status_akta' => 0,
					'status_foto' => 0,
					'status_skhun' => 0,
					'status_ijasah' => 0
				];
				$this->db->insert('tbl_document',$data);
			}

			$config = [
				'upload_path' => './assets/file/siswa/',
				'allowed_types' => 'pdf',
				'file_name' => 'AKTA-' . uniqid() . '.pdf',
				'max_size' => '102048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('akta')) {
				$nama = $config['file_name'];
			} else {
				fGagal('Akta Kelahiran Gagal Di upload','ppdb/dashboard');
			}

			if ($query['akta'] != '') {
				if (file_exists(FCPATH . 'assets/file/siswa/' . $query['akta'])) {
					unlink(FCPATH . 'assets/file/siswa/' . $query['akta']);
				} 
			}

			$data = [
				'akta' => $nama,
				'status_akta' => 2				
			];

			$this->db->set($data);
			$this->db->where('id_siswa',$id);
			$this->db->update('tbl_document');
			fSukses('Akta Kelahiran Berhasil Di upload','ppdb/dashboard');
	}

	public function foto()
	{
		$id = $this->input->post('ident');
			$query =  $this->db->get_where('tbl_document', ['id_siswa' => $id])->row_array();

			if (!$query) {
				$data = [
					'id_siswa' => $id,
					'status_kk' => 0,
					'status_akta' => 0,
					'status_foto' => 0,
					'status_skhun' => 0,
					'status_ijasah' => 0
				];
				$this->db->insert('tbl_document',$data);
			}

			$config = [
				'upload_path' => './assets/file/siswa/',
				'allowed_types' => 'jpg|jpeg|png|bmp',
				'file_name' => 'FOTO-' . uniqid() . '.jpg',
				'max_size' => '102048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$nama = $config['file_name'];
			} else {
				fGagal('Foto Gagal Di upload','ppdb/dashboard');
			}

			if ($query['foto'] != '') {
				if (file_exists(FCPATH . 'assets/file/siswa/' . $query['foto'])) {
					unlink(FCPATH . 'assets/file/siswa/' . $query['foto']);
				}
			} 


			$data = [
				'foto' => $nama,
				'status_foto' => 2				
			];

			$this->db->set($data);
			$this->db->where('id_siswa',$id);
			$this->db->update('tbl_document');
			fSukses('Foto Berhasil Di upload','ppdb/dashboard');
	}

    public function get_slider(){
        return $this->db
            ->join('tbl_foto', 'tbl_foto.id_foto = tb_slider.id_foto')
            ->get('tb_slider')
            ->result();
    }




}