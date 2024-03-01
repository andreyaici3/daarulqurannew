<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function slider(){
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'images',
				'setup' => setWeb()
			];
            var_dump($data['setup']); die;
			_lib('admin/setting/slider', $data);		
		} else {
			redirect('dashboard');
		}
	}

	public function upload(){
		if ($this->session->userdata('level') == 1) {
			$this->M_upload->slider();
		} else {
			redirect('dashboard');
		}	
		
	}

	public function hahay(){
		if ($this->session->userdata('level') == 1) {
			$this->M_upload->headerC();
		} else {
			redirect('dashboard');
		}	
		
	}

	public function headerC(){
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'header',
				'setup' => setWeb()
			];

			_lib('admin/setting/header', $data);		
		} else {
			redirect('dashboard');
		}
	}

	public function setProfile(){
		if ($this->session->userdata('level') == 1) {
			$data = [
				'title' => 'Admin',
				'title2' => 'Halaman Profile',
				'setup' => setWeb()
			];

			$this->form_validation->set_rules('id','ID','required');

			if ($this->form_validation->run() == true) {
				//untuk model
				if ($_FILES['pimp']['error'] == 0) {
					$this->M_setting->fotoPimp();
				}

				if ($_FILES['ra']['error'] == 0) {
					$this->M_setting->fotoRa();
				}

				if ($_FILES['mts']['error'] == 0) {
					$this->M_setting->fotoMts();
				}

				if ($_FILES['ma']['error'] == 0) {
					$this->M_setting->fotoMa();
				}

				$this->M_setting->descripProfile();

				fSukses('Data Berhasil Di update','setting/setProfile');
				//untuk model

			}

			_lib('admin/setting/profile', $data);		
		} else {
			redirect('dashboard');
		}
	}


}