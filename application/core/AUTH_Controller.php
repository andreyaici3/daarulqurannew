<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->db2 = $this->load->database('akun', TRUE);
        if ($this->session->userdata('userdata')['cp_math'] && $this->session->userdata('userdata')['cp_sess']){
            $this->userdata = $this->db2->get_where('tbl_pegawai', ['email' => $this->session->userdata('userdata')['cp_sess']])->row();
        } 

        if ($this->session->userdata('status') == ''){
            $this->backend->fail("Silahkan Login Terlebih Dahulu", "auth");
        }
        
    }
}