<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Puisi extends CI_Model {

    public function listNAll($limit, $start){
		$this->db->order_by('id_puisi','DESC');
		$this->db->join('tbl_user','tbl_puisi.users = tbl_user.id');
		return $result = $this->db->get('tbl_puisi', $limit, $start)->result();
    }
    
    public function getDetailPuisi($tahun,$bulan,$slug)
	{
		$url = $tahun . '/' . $bulan . '/' . $slug;
		$this->db->join('tbl_user','tbl_puisi.users = tbl_user.id');
		return $this->db->get_where('tbl_puisi',['slug_puisi' => $url])->row();
	}

    public function listAll($limit, $start){
		$this->db->order_by('id_puisi','DESC');
		$this->db->join('tbl_user','tbl_puisi.users = tbl_user.id');
		return $result = $this->db->get('tbl_puisi', $limit, $start)->result();
    }

    public function listAllN(){
		return $result = $this->db->get('tbl_puisi')->result();
    }
    
    public function latestPuisi($banyakBerita = 3, $start = 0)
	{
		$this->db->order_by('id_puisi','DESC');
		$this->db->join('tbl_user','tbl_puisi.users = tbl_user.id');
		return $result = $this->db->get('tbl_puisi', $banyakBerita, $start)->result();
	}

    public function perPage(){
		return 4;
    }

    public function delete($id = ''){
        $puisi = $this->db->get_where('tbl_puisi', ['id_puisi' => $id])->row();
        
        if (file_exists(FCPATH . 'assets/images/puisi/' . $puisi->thumbnail_puisi)){
           unlink(FCPATH . 'assets/images/puisi/' . $puisi->thumbnail_puisi);
        } 

        $this->db->delete('tbl_puisi',['id_puisi' => $id]);
        $this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Puisi Berhasil Di Hapus
        </div>');
		redirect('admin/puisi');
    }
    
    public function paginationConf(){
		$config['base_url'] = base_url('puisi/index');
		$config['total_rows'] = $this->db->get('tbl_puisi')->num_rows();
		$config['per_page'] = $this->perPage();
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

    public function upload(){
            $ext = explode('.', $_FILES['gambar_puisi']['name']);
            $ext = end($ext);
            
            $config['upload_path'] = './assets/images/puisi';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'PSI-DQ-' . uniqid() .'.' .$ext;
            $config['max_size'] = '12048';

            $this->load->library('upload',$config);
			$this->upload->initialize($config);

            if ( $this->upload->do_upload('gambar_puisi')){
                return $config['file_name'];
            } else{
                return 'default.jpg';
            }

    }

    public function add($id){
        if ($_FILES['gambar_puisi']['error'] == 0){
            $thumb = $this->upload();
        } else {
            $thumb = 'default.jpg';
        }        

        $url = date('Y/m/') . $this->textToSlug($this->input->post('judul'));

        $data = [
            'id_puisi'          => $this->kode(),
            'judul_puisi'       => htmlspecialchars($this->input->post('judul', true)),
            'thumbnail_puisi'   => $thumb,
            'slug_puisi'        => $url,
            'isi_puisi'         => htmlspecialchars($this->input->post('isi', true)),
            'date_created_puisi'    => time(),
            'date_updated_puisi'    => time(),
            'users'                 => $id
        ];
        
        $this->db->insert('tbl_puisi', $data);
        $this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Puisi Berhasil Ditambahkan
        </div>');
        redirect('admin/puisi');
        
        

    }

    public function kode(){
		$this->db->select('RIGHT(tbl_puisi.id_puisi,2) as ID', FALSE);
		$this->db->order_by('ID','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tbl_puisi');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->ID) + 1; 
		} else{      
			$kode = 1;  //cek jika kode belum terdapat pada table
        }
        
        $batas = str_pad($kode, 10, "0", STR_PAD_LEFT);    
        $kodetampil = "PSI-DQ-".$batas;  //format kode
        return $kodetampil;  
    }

    public function textToSlug($text='') {
        $text = trim($text);
        if (empty($text)) return '';
          $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
          $text = strtolower(trim($text));
          $text = str_replace(' ', '-', $text);
          $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
          return $text;
    }

    public function edit($key, $data){
        $url = $this->mapel->decodeUrl($key);
        $input = $this->input->post();

        if ($_FILES['gambar_puisi']['error'] == 0){
            $gambar = $this->upload();
        } else {
            $gambar = $this->db->get_where('tbl_puisi',['slug_puisi' => $url])->row();
            $gambar = $gambar->thumbnail_puisi;
        }

        $data = [
            'judul_puisi' => htmlspecialchars($input['judul'], true),
            'thumbnail_puisi' => $gambar,
            'isi_puisi'   => htmlspecialchars($input['isi'], true),
            'date_updated_puisi' => time()
        ];

        $this->db->update('tbl_puisi',$data,['slug_puisi' => $url]);
        $this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Puisi Berhasil Di Edit
        </div>');
        redirect('admin/puisi');

    }

    


}