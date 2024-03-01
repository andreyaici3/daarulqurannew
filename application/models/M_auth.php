<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_auth extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->db2 = $this->load->database('akun', TRUE);
    }

    public function login(){
        $email = $this->security->xss_clean(htmlspecialchars($this->input->post('email')));
        $paswd = $this->security->xss_clean(htmlspecialchars($this->input->post('password')));
        @$data = $this->select($email, "1", "1")->row();

        if (@$data && password_verify($paswd, @$data->password)){
            $session = [
                'status' => "masuk",
                'userdata' => [
                    'cp_sess' => $data->email,
                    'cp_math' => password_hash($data->email, PASSWORD_DEFAULT)
                ]
            ];
            $this->session->set_userdata($session);
            redirect('dashboard');
        } else {
            $this->backend->fail("Silahkan Masukan Email dan password yang benar", "auth");
        }        
    }

    public function select($email = '', $active = '', $jenis = ''){
        if ($email != ''){
            $this->db2->where('email',$email);
        }
        if ($active != ''){
            $this->db2->where('tbl_hak_akses_user.is_active',$active);
        }
        if ($jenis != ''){
            $this->db2->where('tbl_hak_akses_user.jenis_web',$jenis);
        }
            $this->db2->join('tbl_hak_akses_user', 'tbl_user.id = tbl_hak_akses_user.id_user');
        return $this->db2->get('tbl_user');
    }

	public function logout()
	{
		$data = [
			'status', 'userdata'
		];
		$this->session->unset_userdata($data);
        $this->backend->success("Logout Berhasil", "auth");
	}
}