<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {
	public function lists()
	{
		$this->db->order_by('kelas','ASC');
		return $this->db->get('tbl_kelas')->result();
	}

	public function kelasNum()
	{
		return $this->db->get('tbl_kelas')->num_rows();
	}

	public function add()
	{
		$data = [
			'kelas' => htmlspecialchars($this->input->post('kelas',true))
		];

		$this->db->insert('tbl_kelas',$data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Kelas Berhasil Ditambahkan
        </div>');
		redirect('admin/kelas');
	}

	public function edit()
	{
		$id = $this->input->post('id',true);
		$data = [
			'kelas' => htmlspecialchars($this->input->post('kelas',true))
		];

		$this->db->set($data);
		$this->db->where('id_kelas',$id);
		$this->db->update('tbl_kelas');
		fSukses('kelas Berhasil Di Edit','kelas');
	}

	public function delete($id)
	{
		$this->db->where('id_kelas',$id);
		$ck = $this->db->delete('tbl_kelas');
		if ($id != 'NULL') {
			$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Delete Successfully
        	</div>');
		} else {
			$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Delete Failed
        	</div>');
		}
		
		redirect('admin/kelas');

	}
}