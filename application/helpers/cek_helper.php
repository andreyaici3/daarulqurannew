<?php 


function cek_sesi()
{
	$ci = get_instance();

	if (!$ci->session->userdata('email') && !$ci->session->userdata('level')) {
			$ci->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		            Please Login, before configuring the website
		        </div>');
			redirect('auth');		
		} else {
			cek_level();
		}	
}


function cek_level()
{
	$ci = get_instance();

	if ($ci->session->userdata('level') == 1) {
			redirect('dashboard/admin');
		} else if ($ci->session->userdata('level') == 2) {
			redirect('dashboard/member');
		} else {
			$ci->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		            Please Login, before configuring the website
		        </div>');
			redirect('auth');		
		}
}

function setWeb()
{
	$ci = get_instance();	
	return $ci->db->get_where('web', ['id' => 1])->row_array();
}

function guruJoinMapel()
{
	$ci = get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_guru');
	$ci->db->join('tbl_mapel', 'tbl_guru.mata_pelajaran = tbl_mapel.id','left');
	$ci->db->order_by('nama_guru','ASC');
	
	return $ci->db->get()->result_array();	
}

function beritaJoinUser()
{
	$ci = get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_berita');
	$ci->db->join('tbl_user', 'tbl_berita.id_user = tbl_user.id','left');
	$ci->db->order_by('id_berita','DESC');
	
	return $ci->db->get()->result_array();	
}

function siswaJoinKelas()
{
	$ci = get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_siswa');
	$ci->db->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas','left');
	$ci->db->order_by('nama_siswa','ASC');
	
	return $ci->db->get()->result_array();	
}

function detailSiswaJoinKelas($id)
{
	$ci = get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_siswa');
	$ci->db->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas','left');
	$ci->db->where('id_siswa',$id);
	
	return $ci->db->get()->row_array();	
}

function _lib($view, $data)
{
	$ci = get_instance();
	$ci->load->view('templates/back/head',$data);
	$ci->load->view('admin/layout/toplink');
	$ci->load->view('admin/layout/sidebar');
	$ci->load->view($view);
	$ci->load->view('admin/layout/footer');
	$ci->load->view('templates/back/footer');
}

function rulesGuru()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('nip','NIP','required|trim|max_length[12]');
	$ci->form_validation->set_rules('nama_guru','Nama Guru','required|trim');
	$ci->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|trim');
	$ci->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required|trim');
	$ci->form_validation->set_rules('mapel','Mata Pelajaran','required|trim');
	// $ci->form_validation->set_rules('foto_guru','Foto Guru','required|trim');
}



function rulesFoto()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('ket','Keterangan','required');
}

function formErr($namaForm)
{
	echo form_error($namaForm,' <div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
}



function fGagal($pesan,$href)
{
	$ci = get_instance();
	$ci->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . 
            $pesan
        . '</div>');
	redirect($href);
}



function initCi($title,$title2,$table)
{
	return $data = [
				'title' => $title,
				'title2' => $title2,
				'setup' => setWeb(),
				'datas' => queryAll($table)
			];
	
}

function act($a, $id, $url, $mdal=[])
{
	if ($a == 'edit') {
		echo '<a class="btn btn-xs btn-success" href="'. base_url($url) . urlencode( base64_encode(base64_encode($id))) .'"><i class="fa fa-pencil fa-fw"> </i></a>';
	} else {
		echo '<a class="btn btn-xs btn-danger ' . $mdal['modal'] .'" data-id="'. $id .'" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash fa-fw"> </i></a>';
	}
                                
}


