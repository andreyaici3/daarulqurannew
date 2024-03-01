<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

	// new function
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('M_berita');
	}

	public function getOne($slug){
		$string = explode('/', $slug);
		$data = $this->getDetailBerita($string[0], $string[1], $string[2]);
		return $data[0];
	}

	public function latestBerita($banyakBerita = 3, $start = 0)
	{
		$this->db->order_by('id_berita','DESC');
		$this->db->join('tbl_user','tbl_berita.id_user = tbl_user.id');
		return $result = $this->db->get('tbl_berita', $banyakBerita, $start)->result();
	}

	public function listAll($limit, $start){
		$this->db->order_by('id_berita','DESC');
		$this->db->join('tbl_user','tbl_berita.id_user = tbl_user.id');
		return $result = $this->db->get('tbl_berita', $limit, $start)->result();
	}

	public function listAllNL(){
		$this->db->order_by('id_berita','DESC');
		$this->db->join('tbl_user','tbl_berita.id_user = tbl_user.id');
		return $result = $this->db->get('tbl_berita')->result();
	}

	public function paginationConf(){
		$config['base_url'] = base_url('berita/index');
		$config['total_rows'] = $this->db->get('tbl_berita')->num_rows();
		$config['per_page'] = $this->M_berita->perPage();
		$config['next_link']	=	'<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
		$config['prev_link']	=	'<i class="fa fa-long-arrow-left" aria-hidden="true"></i>';
		$config['num_tag_open'] = 	"<li>";
		$config['num_tag_close'] = 	"</li>";
		$config['cur_tag_open'] = "<li class='active'><a>";
		$config['cur_tag_close'] = "</a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";
		$config['full_tag_open'] = '<div class="pagination_container d-flex flex-row align-items-center justify-content-start"><ul class="pagination_list">';
		$config['full_tag_close'] = '</ul>';

		$this->pagination->initialize($config);
		return $this->pagination->create_links();

	}

	public function perPage(){
		return 4;
	}

	// end new function

	public function add($id)
	{

		if ($_FILES['gambar_berita']['error'] == 0 ) {
			$foto = $_FILES['gambar_berita']['name'];
			$ext = explode('.', $foto);
			$ext = end($ext);
			$gambar_berita = "berita-" . uniqid() . '.' . $ext;

			$config = [
				'upload_path' => './assets/images/berita/',
				'allowed_types' => 'jpg|jpeg|gif|png|bmp',
				'file_name' => $gambar_berita,
				'max_size' => '12048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar_berita');
		} else {
			$gambar_berita = 'default.jpg';
		}		

		$data = [
			'judul_berita' => htmlspecialchars($this->input->post('judul',true)),
			'slug_berita' => date('Y/m/') . url_title($this->input->post('judul'),'dash',true),
			'isi_berita' => htmlspecialchars($this->input->post('isi')),
			'gambar_berita' => $gambar_berita,
			'tanggal_berita' => time(),
			'terakhir_diupdate' => time(),
			'id_user' => $id
		];

		
		$this->db->insert('tbl_berita',$data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berita Berhasil Di Tambahkan
        </div>');
		redirect('admin/berita');
	}

	public function edit($slug, $id)
	{
		$slug1 = $this->mapel->decodeUrl($slug);
		$string = explode('/', $slug1);
		$slug = $string[2];
		$lama = htmlspecialchars($this->input->post('gambar_lama',TRUE));

		if ($_FILES['gambar_berita']['error'] == 0) {
			$name = $_FILES['gambar_berita']['name'];
			$ext = explode('.',$name);
			$ext = end($ext);
			$gambar_berita = "berita-" .uniqid() . '.' .$ext;

			$config = [
				'upload_path' => './assets/images/berita/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'file_name' => $gambar_berita,
				'max_size' => '12048'
			];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar_berita');

			if ($lama != 'default.jpg') {
				if (file_exists(FCPATH . 'assets/images/berita/' . $lama)){
					unlink(FCPATH . 'assets/images/berita/' . $lama);
				}
			}

		} else {
			$gambar_berita = $lama;
		}

		$data = [
			'judul_berita' => htmlspecialchars($this->input->post('judul', TRUE)),
			'slug_berita' => $slug1,
			'isi_berita' => $this->input->post('isi'),
			'gambar_berita' => $gambar_berita,
			'terakhir_diupdate' => time(),
			'id_user' => $id['sess']['user']->id
		];

		$this->db->set($data);
		$this->db->where('slug_berita',$slug1);
		$this->db->update('tbl_berita');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berita Berhasil Di Edit
        </div>');
		redirect('admin/berita');
		
	}

	public function delete($id)
	{
		$query = $this->db->get_where('tbl_berita',['id_berita' => $id])->row_array();
		if ($query['gambar_berita'] != '') {
			if (file_exists(FCPATH . 'assets/images/berita/' . $query['gambar_berita'])) {
				unlink(FCPATH . 'assets/images/berita/' . $query['gambar_berita']);
			}
		}
		$this->db->where('id_berita',$id);
		$this->db->delete('tbl_berita');
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berita Berhasil Di Hapus
        </div>');
		redirect('admin/berita');
	}

	public function getDetailBerita($tahun,$bulan,$slug)
	{
		$url = $tahun . '/' . $bulan . '/' . $slug;
		$this->db->join('tbl_user','tbl_berita.id_user = tbl_user.id');
		return $this->db->get_where('tbl_berita',['slug_berita' => $url])->result();
    }
    
    // public function getDetailBerita($tahun,$bulan,$slug)
	// {
	// 	$url = $tahun . '/' . $bulan . '/' . $slug;
	// 	$this->db->select('tbl_puisi, tbl_berita');
	// }
	
}