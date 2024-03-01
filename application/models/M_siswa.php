<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function getAll(){
		$this->db->join('tbl_kelas','tbl_kelas.id_kelas = tbl_siswa.id_kelas');
		$this->db->order_by('nama_siswa','ASC');
		return $this->db->get('tbl_siswa')->result();
	}

	public function siswaNum()
	{
		return $this->db->get('tbl_siswa')->num_rows();
	}

	public function getOne($key){
		$this->db->join('tbl_kelas','tbl_kelas.id_kelas = tbl_siswa.id_kelas');
		$data = $this->db->get_where('tbl_siswa',['id_siswa' => $key])->result();
		return $data[0];
	}

	public function add()
	{
		
		$toTime = strtotime($this->input->post('tanggal_lahir'));

		if ($_FILES['foto_siswa']['error'] == 4) {
			$name = 'default.jpg';
		} else {
			$name = $_FILES['foto_siswa']['name'];
			$ext = explode('.',$name);
			$ext = end($ext);
			$name = "siswa-" .uniqid() . '.' .$ext;

			$config = [
				'upload_path' => './assets/images/siswa/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $name,
				'max_size' => '2048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('foto_siswa');
		}

		$data = [
			'nis' => htmlspecialchars($this->input->post('nis',true)),
			'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa',true)),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir',true)),
			'tanggal_lahir' => $toTime,
			'id_kelas' => htmlspecialchars($this->input->post('id_kelas',true)),
			'foto_siswa' => $name,
			'quote' => htmlspecialchars($this->input->post('quote',true))
		];

		$this->db->insert('tbl_siswa',$data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Data Berhasil Ditambahkan
        </div>');
		redirect('admin/siswa');
	}

	public function edit()
	{
		$foto_lama = $this->input->post('foto_lama');
		$id = $this->input->post('iden');

		if ($_FILES['foto_siswa']['error'] == 4) {
			$foto = $this->input->post('foto_lama');
		} else {
			$foto = $_FILES['foto_siswa']['name'];

			if (file_exists(FCPATH . 'assets/images/siswa/' . $foto)) {
				$ext = explode('.', $foto);
				$ext = end($ext);
				$foto = "siswa-" . uniqid() . '.' .$ext;
			}

			$config = [
				'upload_path' => './assets/images/siswa/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $foto,
				'max_size' => '2048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('foto_siswa');
			if ($foto_lama != 'default.jpg') {
				if (file_exists(FCPATH . 'assets/images/siswa/' . $foto_lama)) {
					unlink(FCPATH . 'assets/images/siswa/' . $foto_lama);
				}
			}
			
		}

		
		$data = [
			'nis' => htmlspecialchars($this->input->post('nis',true)),
			'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa',true)),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir',true)),
			'tanggal_lahir' => strtotime($this->input->post('tanggal_lahir',true)),
			'id_kelas' => htmlspecialchars($this->input->post('id_kelas',true)),
			'quote' => htmlspecialchars($this->input->post('quote',true)),
			'foto_siswa' => $foto
		];

		$this->db->set($data);
		$this->db->where('id_siswa',$id);
		$this->db->update('tbl_siswa');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Data Siswa Berhasil Di Update
        </div>');
		redirect('admin/siswa');
		
	}

	public function delete($id)
	{
		$siswa = $this->getOne($id);
		$foto = $siswa->foto_siswa;
		if ($foto != 'default.jpg') {
			if (file_exists(FCPATH . 'assets/images/siswa/' . $foto)) {
				unlink(FCPATH . 'assets/images/siswa/' . $foto);
			}
		}
		$this->db->where('id_siswa',$id);
		$this->db->delete('tbl_siswa');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Data Siswa Berhasil Di Hapus
        </div>');
		redirect('admin/siswa');
	}
}