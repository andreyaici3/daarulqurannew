<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends AUTH_Controller {

	public function __construct(){
		parent::__construct();
	}

    public function index(){
        $data = [
            'title' => "Mata Pelajaran",
            'page'	=> "admin",
            'type'	=> 'list',
            'list'	=> $this->mapel->lists()
        ];
        $this->backend->view('mapel/index', $data);
    }

    public function mapel($id = NULL, $key = NULL){
		$cek = $this->auth->level();
		if ($cek == 1) {
			if ($id == NULL && $key == NULL) {
				$this->mc->mapel(NULL);
			} else if ($id == 'add' || $id == 'Add') {
				$this->mc->mapel('add');				
			} else if ($id == 'edit' || $id == 'Edit') {
				$this->mc->mapel('edit', $key);
			} else {
				$this->mc->mapel('delete', $key, $id);
			}
		}else {
			$this->auth->redirect();
		}
	}
}