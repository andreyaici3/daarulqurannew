<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengumuman extends CI_Model {

	
	public function latestPengumuman($banyak = 5){
		$this->db->order_by('id_pengumuman','DESC');
		return $result = $this->db->get('tbl_pengumuman', $banyak, 0)->result();
	}

	public function getOne($id){
		return $this->db->get_where('tbl_pengumuman',['id_pengumuman'  => $id])->result()[0];
	}

	public function getAll(){
		return $this->db->get('tbl_pengumuman')->result();
	}

	public function add()
	{
		$data = [
			'judul_pengumuman' => htmlspecialchars($this->input->post('judul',true)),
			'isi_pengumuman' => htmlspecialchars($this->input->post('isi',true)),
			'tanggal_pengumuman' => strtotime($this->input->post('tanggal',true))
		];

		$this->db->insert('tbl_pengumuman',$data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Pengumuman Berhasil Ditambahkan
        </div>');
		redirect('admin/pengumuman');
	}

	public function edit()
	{
		$id = $this->mapel->decodeUrl($this->input->post('ident',true));
		$data = [
			'judul_pengumuman' => htmlspecialchars($this->input->post('judul',true)),
			'isi_pengumuman' => htmlspecialchars($this->input->post('isi',true)),
			'tanggal_pengumuman' => strtotime($this->input->post('tanggal',true))
		];

		$this->db->set($data);
		$this->db->where('id_pengumuman',$id);
		$this->db->update('tbl_pengumuman');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Pengumuman Berhasil Di Edit
        </div>');
		redirect('admin/pengumuman');
	}

	public function delete($id)
	{
		$this->db->where('id_pengumuman',$id);
		$this->db->delete('tbl_pengumuman');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Pengumuman Berhasil Di Hapus
        </div>');
		redirect('admin/pengumuman');
	}

	public function getPengumumanId($id){
		return $this->db->get_where('tbl_pengumuman',['id_pengumuman' => $id])->result();
	}
}