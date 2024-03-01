<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ppdb extends CI_Model {

	public function registrasi()
	{
		$nama = htmlspecialchars($this->input->post('nama_lengkap'));
		$username = date('Y', time()) . rand(1500,3000) . '@daarulquran.sch.id';
		$strTime = strtotime($this->input->post('tanggalLahir'));
		$tempatLahir = htmlspecialchars(strtolower($this->input->post('tempatLahir',true)));
		$password_ori = $tempatLahir . date('dmY',$strTime);
		$password = password_hash($password_ori, PASSWORD_DEFAULT);

		$data = [
			'nama_siswa' => $nama,
			'no_whatsapp' => htmlspecialchars($this->input->post('wa',true)),
			'jenis_pendaftaran' => $this->input->post('jenjang'),
			'username' => strtolower($username),
			'password' => $password,
			'access_edit' => 1,
			'tempat_lahir' => $tempatLahir,
			'tanggal_lahir' => $strTime,
			'status_siswa'=> 0,
			'status_akun' => 1,

			'nik'				=> '0',
			'jln'				=> '-',
			'rt'				=> '-',
			'rw'				=> '-',
			'dusun'				=> '-',
			'desa'				=> '-',
			'kec'				=> '-',
			'kota'				=> '-',
			'prov'				=> '-',
			'email'				=> '-',
			'asal_sekolah'		=> '-',
			'alamat_sekolah'	=> '-',
			'email_sekolah'		=> '-',
			'nama_guru_bp_bk'	=> '-',
			'telp_hp'			=> '0',
			'nama_ayah'			=> '-',
			'tempat_lahir_ayah'	=> '-',
			'tanggal_lahir_ayah'=> time(),
			'pekerjaan_ayah'	=> '-',
			'hp_wa_ayah'		=> '0',
			'nama_ibu'			=> '-',
			'jenis_kelamin'		=> '-',
			'tempat_lahir_ibu'	=> '-',
			'tanggal_lahir_ibu'	=> time(),
			'pekerjaan_ibu'		=> '-',
			'hp_wa_ibu'			=> '0',
			'penghasilan_perbulan_ibu'		=> '0',
			'pendidikan_terakhir_ibu' 		=> '-',
			'pendidikan_terakhir_ayah'		=> '-',
			'penghasilan_perbulan_ayah'		=> '0'
		];

		$this->db->insert('master_data_siswa', $data);
		$set = [
			'nama_lengkap' => $nama,
			'username' => $username,
			'pass' => $password_ori
		];

		$this->session->set_userdata($set);

		redirect('ppdb/result');
	}

	public function getAll()
	{
		$this->db->order_by('nama_siswa', 'ASC');
		return $this->db->get('master_data_siswa')->result();
	}

	public function getSiswa($id)
	{
		$idS = $this->mapel->decodeUrl($id);
		return $this->db->get_where('master_data_siswa', ['id_siswa' => $idS])->result()[0];
	}

	public function login()
	{
		$user = strtolower($this->input->post('username'));
		$pass = $this->input->post('password');
		$cek = $this->db->get_where('master_data_siswa', ['username' => $user]);

		if ($cek->num_rows() > 0) {
			$cek = $cek->row_array();
			if (password_verify($pass, $cek['password'])) {
				$data = [
						'id_user' => $cek['id_siswa'],
						'token'  => $cek['password'],
						'name' => $cek['nama_siswa'],
						'sesi' => 9999
				];
				$this->session->set_userdata($data);
				redirect('ppdb/dashboard');
			} else {
				fGagal('Maaf, User / password Salah','ppdb/login');
			}			
		} else {
			fGagal('Maaf, User / password Salah','ppdb/login');
		}
		die;
	}


	public function edit()
	{
		$id = $this->input->post('ident');
		$data = [
			'nama_siswa' 		=> htmlspecialchars($this->input->post('nama_siswa',true)),
			'jenis_kelamin' 	=> htmlspecialchars($this->input->post('jk',true)),
			'tempat_lahir' 		=> htmlspecialchars($this->input->post('tempat_lahir',true)),
			'tanggal_lahir' 	=> strtotime($this->input->post('tanggal_lahir',true)),
			'nik'				=> htmlspecialchars($this->input->post('nik',true)),
			'jln'				=> htmlspecialchars($this->input->post('jalan',true)),
			'rt'				=> htmlspecialchars($this->input->post('rt',true)),
			'rw'				=> htmlspecialchars($this->input->post('rw',true)),
			'dusun'				=> htmlspecialchars($this->input->post('dusun',true)),
			'desa'				=> htmlspecialchars($this->input->post('desa',true)),
			'kec'				=> htmlspecialchars($this->input->post('kec',true)),
			'kota'				=> htmlspecialchars($this->input->post('kab',true)),
			'prov'				=> htmlspecialchars($this->input->post('prov',true)),
			'email'				=> htmlspecialchars($this->input->post('email',true)),
			'asal_sekolah'		=> htmlspecialchars($this->input->post('asal_sekolah',true)),
			'alamat_sekolah'	=> htmlspecialchars($this->input->post('alamat_sekolah',true)),
			'email_sekolah'		=> htmlspecialchars($this->input->post('email_sekolah',true)),
			'nama_guru_bp_bk'	=> htmlspecialchars($this->input->post('guru_bp',true)),
			'telp_hp'			=> htmlspecialchars($this->input->post('telp_hp',true)),
			'nama_ayah'			=> htmlspecialchars($this->input->post('nama_ayah',true)),
			'tempat_lahir_ayah'	=> htmlspecialchars($this->input->post('tempat_lahir_ayah',true)),
			'tanggal_lahir_ayah'=> strtotime($this->input->post('tanggal_lahir_ayah',true)),
			'pekerjaan_ayah'	=> htmlspecialchars($this->input->post('pekerjaan_ayah',true)),
			'hp_wa_ayah'		=> htmlspecialchars($this->input->post('hp_wa_ayah',true)),
			'nama_ibu'			=> htmlspecialchars($this->input->post('nama_ibu',true)),
			'jenis_kelamin'		=> htmlspecialchars($this->input->post('jenis_kelamin',true)),
			'tempat_lahir_ibu'	=> htmlspecialchars($this->input->post('tempat_lahir_ibu',true)),
			'tanggal_lahir_ibu'	=> strtotime($this->input->post('tanggal_lahir_ibu',true)),
			'pekerjaan_ibu'		=> htmlspecialchars($this->input->post('pekerjaan_ibu',true)),
			'hp_wa_ibu'			=> htmlspecialchars($this->input->post('hp_wa_ibu',true)),
			'no_whatsapp'		=> htmlspecialchars($this->input->post('wa',true)),
			'access_edit'		=> 0,
			'penghasilan_perbulan_ibu'		=> htmlspecialchars($this->input->post('penghasilan_perbulan_ibu',true)),
			'pendidikan_terakhir_ibu' 		=> htmlspecialchars($this->input->post('pendidikan_terakhir_ibu',true)),
			'pendidikan_terakhir_ayah'		=> htmlspecialchars($this->input->post('pendidikan_terakhir_ayah',true)),
			'penghasilan_perbulan_ayah'		=> htmlspecialchars($this->input->post('penghasilan_perbulan_ayah',true))
		];

		$this->db->set($data);
		$this->db->where('id_siswa',$id);
		$this->db->update('master_data_siswa');
		fSukses('Data berhasil di update','ppdb/sedit/' . urlencode(base64_encode(base64_encode($id))));
		
	}

	public function editA()
	{
		$id = $this->input->post('ident');
		$data = [
			'nama_siswa' 		=> htmlspecialchars($this->input->post('nama_siswa',true)),
			'jenis_kelamin' 	=> htmlspecialchars($this->input->post('jk',true)),
			'tempat_lahir' 		=> htmlspecialchars($this->input->post('tempat_lahir',true)),
			'tanggal_lahir' 	=> strtotime($this->input->post('tanggal_lahir',true)),
			'nik'				=> htmlspecialchars($this->input->post('nik',true)),
			'jln'				=> htmlspecialchars($this->input->post('jalan',true)),
			'rt'				=> htmlspecialchars($this->input->post('rt',true)),
			'rw'				=> htmlspecialchars($this->input->post('rw',true)),
			'dusun'				=> htmlspecialchars($this->input->post('dusun',true)),
			'desa'				=> htmlspecialchars($this->input->post('desa',true)),
			'kec'				=> htmlspecialchars($this->input->post('kec',true)),
			'kota'				=> htmlspecialchars($this->input->post('kab',true)),
			'prov'				=> htmlspecialchars($this->input->post('prov',true)),
			'email'				=> htmlspecialchars($this->input->post('email',true)),
			'asal_sekolah'		=> htmlspecialchars($this->input->post('asal_sekolah',true)),
			'alamat_sekolah'	=> htmlspecialchars($this->input->post('alamat_sekolah',true)),
			'email_sekolah'		=> htmlspecialchars($this->input->post('email_sekolah',true)),
			'nama_guru_bp_bk'	=> htmlspecialchars($this->input->post('guru_bp',true)),
			'telp_hp'			=> htmlspecialchars($this->input->post('telp_hp',true)),
			'nama_ayah'			=> htmlspecialchars($this->input->post('nama_ayah',true)),
			'tempat_lahir_ayah'	=> htmlspecialchars($this->input->post('tempat_lahir_ayah',true)),
			'tanggal_lahir_ayah'=> strtotime($this->input->post('tanggal_lahir_ayah',true)),
			'pekerjaan_ayah'	=> htmlspecialchars($this->input->post('pekerjaan_ayah',true)),
			'hp_wa_ayah'		=> htmlspecialchars($this->input->post('hp_wa_ayah',true)),
			'nama_ibu'			=> htmlspecialchars($this->input->post('nama_ibu',true)),
			'jenis_kelamin'		=> htmlspecialchars($this->input->post('jenis_kelamin',true)),
			'tempat_lahir_ibu'	=> htmlspecialchars($this->input->post('tempat_lahir_ibu',true)),
			'tanggal_lahir_ibu'	=> strtotime($this->input->post('tanggal_lahir_ibu',true)),
			'pekerjaan_ibu'		=> htmlspecialchars($this->input->post('pekerjaan_ibu',true)),
			'hp_wa_ibu'			=> htmlspecialchars($this->input->post('hp_wa_ibu',true)),
			'no_whatsapp'		=> htmlspecialchars($this->input->post('wa',true)),
			'penghasilan_perbulan_ibu'		=> htmlspecialchars($this->input->post('penghasilan_perbulan_ibu',true)),
			'pendidikan_terakhir_ibu' 		=> htmlspecialchars($this->input->post('pendidikan_terakhir_ibu',true)),
			'pendidikan_terakhir_ayah'		=> htmlspecialchars($this->input->post('pendidikan_terakhir_ayah',true)),
			'penghasilan_perbulan_ayah'		=> htmlspecialchars($this->input->post('penghasilan_perbulan_ayah',true))
		];

		$this->db->set($data);
		$this->db->where('id_siswa',$id);
		$this->db->update('master_data_siswa');
		fSukses('Data berhasil di update','ppdb/edit/' . urlencode(base64_encode(base64_encode($id))));
		
	}

	public function logout()
	{
		$data = [
			'id_user', 'name', 'token', 'sesi'
		];
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            Logout Successfully
	        </div>');
			redirect('ppdb/login');
	}

	public function changePassword()
	{
		$id = $this->input->post('ident');
		$cek = $this->db->get_where('master_data_siswa', ['id_siswa' => $id])->row_array();
		$password_lama = password_verify($this->input->post('password'), $cek['password']);
		if ($password_lama) {
			$data = [ 'password' => password_hash($this->input->post('passwordBaru'), PASSWORD_DEFAULT) ];
			$this->db->set($data);
			$this->db->where('id_siswa',$id);
			$this->db->update('master_data_siswa');
			fSukses('Password Berhasil Diganti', 'ppdb/changePassword/' . urlencode( base64_encode(base64_encode($id))));
		} else {
			redirect('ppdb/dashboard');
		}
	}

	public function terima($id)
	{
		$data = [
			'status_siswa' => 1
		];
		$this->db->set($data);
		$this->db->where('id_siswa', $id);
		$this->db->update('master_data_siswa');
		fSukses('Siswa Berhasil diupdate','ppdb/status');
	}

	public function batal($id)
	{
		$data = [
			'status_siswa' => 0,
			'access_edit' => 1
		];
		$this->db->set($data);
		$this->db->where('id_siswa', $id);
		$this->db->update('master_data_siswa');
		fSukses('Siswa Berhasil diupdate','ppdb/status');
	}

	public function doc()
	{
		$id = $this->input->post('ident');
		

		$config = [
			'upload_path' => './assets/images/config',
			'allowed_types' => 'pdf',
			'max_size' => '102048'
		];

		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$this->upload->do_upload('akta');
		$this->upload->data();	

		$this->upload->display_errors();
	}

	public function delete($id)
	{
		
		

		$file = $this->db->get_where('tbl_document',['id_siswa' => $id])->row_array();
		$path = FCPATH . 'assets/file/siswa/';
	
		

		if ($file['ktp'] != '') {
			if (file_exists($path . $file['ktp'])) {
				unlink($path . $file['ktp']);
			}
		}

		if ($file['akta'] != '') {
			if (file_exists($path . $file['akta'])) {
				unlink($path . $file['akta']);
			}
		}

		if ($file['foto'] != '') {
			if (file_exists($path . $file['foto'])) {
				unlink($path . $file['foto']);
			}
		}

		if ($file['ijasah'] != '') {
			if (file_exists($path . $file['ijasah'])) {
				unlink($path . $file['ijasah']);
			}
		}

		if ($file['skhun'] != '') {
			if (file_exists($path . $file['skhun'])) {
				unlink($path . $file['skhun']);
			}
		}

		if ($file['kk'] != '') {
			if (file_exists($path . $file['kk'])) {
				unlink($path . $file['kk']);
			}
		}
		
	
		$this->db->where('id_siswa',$id);
		$this->db->delete('master_data_siswa');
		$this->db->where('id_siswa', $id);
		$this->db->delete('tbl_document');

		fSukses('Data Berhasil Dihapus','ppdb/view');

		
	}

	public function getDoc($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_document');
		$this->db->join('master_data_siswa','tbl_document.id_siswa = master_data_siswa.id_siswa');
		$this->db->where('tbl_document.id_siswa',$id);
		return $this->db->get()->row_array();
	}

	public function getDocs()
	{
		
		$this->db->select('*');
		$this->db->from('tbl_document');
		$this->db->join('master_data_siswa', 'tbl_document.id_siswa = master_data_siswa.id_siswa');

		return $this->db->get()->result_array();
	}

	public function approve($type, $file)
	{
		$result = $this->db->get_where('tbl_document',[$type => $file])->row_array();
		$data = ['status_' . $type => 1];
		$this->db->set($data);
		$this->db->where($type, $file);
		$this->db->update('tbl_document');
		fSukses($type . ' Berhasil di approve','ppdb/documents');
	}

	public function reject($type, $file)
	{
		$result = $this->db->get_where('tbl_document',[$type => $file])->row_array();
		$data = ['status_' . $type => 3];
		$this->db->set($data);
		$this->db->where($type, $file);
		$this->db->update('tbl_document');
		fSukses($type . ' Berhasil di reject','ppdb/documents');
	}

	public function remove($type, $file)
	{
		$result = $this->db->get_where('tbl_document',[$type => $file])->row_array();
		$data = [
			'status_' . $type => 0,
			$type => ''
		];
		unlink(FCPATH . 'assets/file/siswa/' . $result[$type]);
		$this->db->set($data);
		$this->db->where($type, $file);
		$this->db->update('tbl_document');
		fSukses($type . ' Berhasil di hapus','ppdb/documents');
	}






}