<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mapel extends CI_Model {

	public function lists()
	{
		return $this->db->get('tbl_mapel')->result();
	}

	public function mapelNum()
	{
		return $this->db->get('tbl_mapel')->num_rows();
	}

	public function list($id)
	{
		return $this->db->get_where('tbl_mapel', ['id' => $id])->result()[0];
	}

	public function encodeUrl($url){
		$fistr = base64_encode($url);
		$second = base64_encode($fistr);
		$third = base64_encode($second);
		return urlencode($third);
	}

	public function decodeUrl($url){
		$third = base64_decode($url);
		$second = base64_decode($third);
		$fistr = base64_decode($second);
		return urldecode($fistr);
	}

	public function add()
	{
		$data = [
			'kode_mapel' => 'DQ-' . htmlspecialchars($this->input->post('kode',true)),
			'nama_mapel' => htmlspecialchars($this->input->post('mapel',true)) 
		];

		$this->db->insert('tbl_mapel',$data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Mapel Berhasil Ditambahkan
        </div>');
		redirect('admin/mapel');
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$ck = $this->db->delete('tbl_mapel');
		if ($id != 'NULL') {
			$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Delete Successfully
        	</div>');
		} else {
			$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Delete Failed
        	</div>');
		}
		
		redirect('admin/mapel');
	}

	public function edit()
	{
		$key = $this->input->post('key');
		$id = $this->mapel->decodeUrl($key);
		$data = [
			'kode_mapel' => $this->input->post('kode',true),
			'nama_mapel' => $this->input->post('mapel',true)
		];

		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('tbl_mapel');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Edit Mapel Successfully
        </div>');
		redirect('admin/mapel');
	}

}