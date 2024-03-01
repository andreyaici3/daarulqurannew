<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model 
{
	public function getAll(){
		$this->db->join('tbl_mapel','tbl_mapel.id = tbl_guru.mata_pelajaran');
		$this->db->order_by('nama_guru','ASC');
		return $this->db->get('tbl_guru')->result();
	}

	public function getOne($key){
		$this->db->join('tbl_mapel','tbl_mapel.id = tbl_guru.mata_pelajaran');
		$data = $this->db->get_where('tbl_guru',['id_guru' => $key])->result();
		return $data[0];
	}

	public function guruNum()
	{
		return $this->db->get('tbl_guru')->num_rows();
	}

	public function add(){
		$config = [
			'upload_path' => './assets/images/guru/',
			'allowed_types' => 'jpg|jpeg|gif|png',
			'file_name' => "guru-" . uniqid() . '.jpg',
			'max_size' => '2048' 
		];

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto_guru')) {
			$name = $config['file_name'];
		} else {
			$name = "default.jpg";
		}

		$data = [
			'nip' => htmlspecialchars($this->input->post('nip',true)),
			'nama_guru' => htmlspecialchars($this->input->post('nama_guru',true)),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir',true)),
			'tanggal_lahir' => strtotime($this->input->post('tanggal_lahir')),
			'mata_pelajaran' => htmlspecialchars($this->input->post('mapel',true)),
			'pendidikan' => htmlspecialchars($this->input->post('pendidikan',true)),
			'foto_guru' => $name
			];

		$this->db->insert('tbl_guru',$data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Data Guru Berhasil Ditambahkan
        </div>');
		redirect('admin/guru');
	}

	public function edit(){
		$foto_lama = $this->input->post('foto_lama');
		$id = $this->input->post('iden');
		
		if ($_FILES['foto_guru']['error'] == 4) {
			$foto = $this->input->post('foto_lama');
		} else {
			$foto = "guru-" . uniqid() . ".jpg";
			if ($foto_lama != 'default.jpg') {
				if (file_exists(FCPATH . 'assets/images/guru/' . $foto)) {
					$ext = explode('.', $foto);
					$ext = end($ext);
					$foto = "guru-" . uniqid() . '.' .$ext;
				}
			}

			$config = [
				'upload_path' => './assets/images/guru/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $foto,
				'max_size' => '2048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('foto_guru')) {
				if ($guru['foto_guru'] != 'default.jpg') {
					if (file_exists(FCPATH . 'assets/images/guru/' . $foto_lama)) {
						unlink(FCPATH . 'assets/images/guru/' . $foto_lama);
					}
				}
			} else {
				$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		            Data Guru Gagal Diupdate
		        </div>');
				redirect('admin/guru');
			}
		}

		$data = [
			'nip' => htmlspecialchars($this->input->post('nip',true)),
			'nama_guru' => htmlspecialchars($this->input->post('nama_guru',true)),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir',true)),
			'tanggal_lahir' => strtotime($this->input->post('tanggal_lahir')),
			'mata_pelajaran' => htmlspecialchars($this->input->post('mapel',true)),
			'pendidikan' => htmlspecialchars($this->input->post('pendidikan',true)),
			'foto_guru' => $foto
		];

		$this->db->set($data);
		$this->db->where('id_guru',$id);
		$this->db->update('tbl_guru');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Data Guru Berhasil Diupdate
        </div>');
		redirect('admin/guru');
	}

	public function delete($id)
	{
		$guru = $this->getOne($id);
		
		if ($guru->foto_guru != 'default.jpg') {
			if (file_exists(FCPATH . 'assets/images/guru/' . $guru->foto_guru)) {
				unlink(FCPATH . 'assets/images/guru/' . $guru->foto_guru);
			}
		} 
		
		$this->db->where('id_guru',$id);
		$this->db->delete('tbl_guru');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Data Guru Berhasil Dihapus
        </div>');
		redirect('admin/guru');
	}

}