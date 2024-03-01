<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galery extends CI_Model {

	public function getAlbum()
	{
		$this->db->select('tbl_album.*,count(tbl_foto.id_album) as jml');
		$this->db->from('tbl_album');
		$this->db->join('tbl_foto','tbl_foto.id_album = tbl_album.id_album','left');
		$this->db->group_by('tbl_album.id_album');
		$this->db->order_by('tbl_album.judul_album','ASC');
		return $this->db->get()->result();
	}

	public function getOne($id){
		$data = $this->db->get_where('tbl_album',['id_album' => $id])->result();
		return $data[0];
	}

	public function getDetail($id)
	{
		$data = [
			'galery' => $this->db->get_where('tbl_album', ['id_album' => $id])->result(),
			'foto' => $this->db->get_where('tbl_foto', ['id_album' => $id])->result()
		];
		return $data;
	}

	public function add()
	{
		if ($_FILES['sampul']['error'] == 0) {
			$string = $_FILES['sampul']['name'];
			$ext = explode('.', $string);
			$ext = end($ext);
			$name = 'album-' . date('Ym', time()) . '-' . uniqid() . '.' . $ext;

			$config = [
				'upload_path' => './assets/images/galery/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $name,
				'max_size' => '12048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('sampul');

		} else {
			$name = "default.jpg";
		}

		
		$data = [
			'sampul' => $config['file_name'],
			'judul_album' => htmlspecialchars($this->input->post('judul',true))
		];

		$this->db->insert('tbl_album', $data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Album Berhasil Ditambahkan
        </div>');
		redirect('admin/album');
	}

	public function edit($id)
	{
		$newId = $this->mapel->decodeUrl($id);
		$sampulLama = htmlspecialchars($this->input->post('sampulLama', TRUE));

		if ($_FILES['sampul']['error'] == 0) {
			$string = $_FILES['sampul']['name'];
			$ext = explode('.', $string);
			$ext = end($ext);
			$sampul = 'album-' . date('Ym', time()) . '-' . uniqid() . '.' . $ext;

			$config = [
				'upload_path' => './assets/images/galery/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $sampul,
				'max_size' => '12048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('sampul');

			if ($sampulLama != 'default.jpg') {
				if (file_exists(FCPATH . 'assets/images/galery/' . $sampulLama)) {
					unlink(FCPATH . 'assets/images/galery/' . $sampulLama);
				}
			}

		} else {
			$sampul = $sampulLama;
		}

		$data = [
			'judul_album' => htmlspecialchars($this->input->post('judul',true)),
			'sampul' => $sampul
		];

		$this->db->set($data);
		$this->db->where('id_album',$newId);
		$this->db->update('tbl_album');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Album Berhasil Di Edit
        </div>');
		redirect('admin/album');
	}


	public function foto($url)
	{
		$idAlbum = $this->mapel->decodeUrl($url); 

		if ($_FILES['sampul']['error'] == 0) {
			$names = $_FILES['sampul']['name'];
			$ext = explode('.', $names);
			$ext = end($ext);
			$name = 'foto-' . date('Ymd') . uniqid() . '.' . $ext;
			
			$config = [
				'upload_path' => './assets/images/galery/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $name,
				'max_size' => '12048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('sampul');

			$data = [
				'ket_foto' => htmlspecialchars($this->input->post('ket',true)),
				'id_album' => $idAlbum,
				'foto' => $name
			];

			$this->db->insert('tbl_foto',$data);
			$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Foto Berhasil Di Tambahkan
	        </div>');
			redirect('admin/album/foto/' . $url);
		} else {
			$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Foto Gagal Di Tambahkan
	        </div>');
			redirect('admin/album/foto/' . $url);
		}

	}

	public function deleteFoto($ids)
	{
		$id = $this->mapel->decodeUrl($ids);
		$foto = $this->db->get_where('tbl_foto',['id_foto' => $id])->row();
		
		if (file_exists(FCPATH . 'assets/images/galery/' . $foto->foto)) {
			unlink(FCPATH . 'assets/images/galery/' . $foto->foto);
		}

		$this->db->where('id_foto',$id);
		$this->db->delete('tbl_foto');

		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Foto Berhasil Di Hapus
	        </div>');
		redirect('admin/album/foto/' . $this->mapel->encodeUrl($foto->id_album));
	}

    public function deleteSlider($id){
        $this->db->delete('tb_slider', ['id_foto' => $id]);
        $ids = $this->mapel->encodeUrl($id);
        $foto = $this->db->get_where('tbl_foto',['id_foto' => $id])->row();
		
		if (file_exists(FCPATH . 'assets/images/config/' . $foto->foto)) {
			unlink(FCPATH . 'assets/images/config/' . $foto->foto);
		}

        $this->db->delete('tbl_foto', ['id_foto' => $id]);

        $this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Slider Berhasil Dihapus
	        </div>');
		redirect('admin/slider');
    }

    public function addSlider(){
        $idAlbum = 0; 

		if ($_FILES['sampul']['error'] == 0) {
			$names = $_FILES['sampul']['name'];
			$ext = explode('.', $names);
			$ext = end($ext);
			$name = 'foto-' . date('Ymd') . uniqid() . '.' . $ext;
			
			$config = [
				'upload_path' => './assets/images/config/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $name,
				'max_size' => '12048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('sampul');

			$data = [
                'judul_foto'=> htmlspecialchars($this->input->post('judul',true)), 
				'ket_foto' => htmlspecialchars($this->input->post('desc',true)),
				'id_album' => $idAlbum,
				'foto' => $name
			];

			$this->db->insert('tbl_foto',$data);
            $id_foto = $this->db->insert_id();
            
            $data1 = [
                'id_foto'   => $id_foto,
                'active'    => 0
            ];
            $this->db->insert('tb_slider', $data1);

			$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Slider Berhasil Di Tambahkan
	        </div>');
			redirect('admin/slider');
		} else {
			$this->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Slider Gagal Ditambahkan
	        </div>');
			redirect('admin/slider/');
		}
    }


	public function delete($id)
	{
		$foto = $this->db->get_where('tbl_foto',['id_album' => $id])->result();
		$album = $this->db->get_where('tbl_album',['id_album' => $id])->result()[0];

		foreach ($foto as $value) {
			if (file_exists(FCPATH . 'assets/images/galery/' . $value->foto) && $value->foto != 'default.jpg') {
				unlink(FCPATH . 'assets/images/galery/' . $value->foto);
			}
			$this->db->where('id_album',$value->id_album);
			$this->db->delete('tbl_foto');
		}

		if ($album->sampul != 'default.jpg') {
			unlink(FCPATH . 'assets/images/galery/' . $album->sampul);
		}

		$this->db->where('id_album',$id);
		$this->db->delete('tbl_album');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Album Berhasil Di Hapus
	        </div>');
		redirect('admin/album');
	}

	

	
	
}