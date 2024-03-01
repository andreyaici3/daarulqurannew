<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates/front/head');
		$this->load->view('templates/front/header');
		$this->load->view('templates/front/menu');
		$this->load->view('templates/front/home');
		$this->load->view('templates/front/featur');
		$this->load->view('templates/front/course');
		$this->load->view('templates/front/counter');
		$this->load->view('templates/front/event');
		$this->load->view('templates/front/team');
		$this->load->view('templates/front/news');
		$this->load->view('templates/front/footer');
		$this->load->view('templates/front/foot');
	}


}
