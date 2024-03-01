<?php 

class Frontend
{
	protected $ci;
	function __construct(){
		$this->ci = &get_instance();
	}

	function view($template = NULL, $data = NULL){
		$newView = "_frontend/" . $template;
		$data = [
			'_head'			=> $this->ci->load->view('_template/_frontend/_head', $data, TRUE),
			'_headCont'		=> $this->ci->load->view('_template/_frontend/_headCont', $data, TRUE),
			'_header'		=> $this->ci->load->view('_template/_frontend/_header', $data, TRUE),
			'_search'		=> $this->ci->load->view('_template/_frontend/_search', $data, TRUE),
			'_menu'			=> $this->ci->load->view('_template/_frontend/_menu', $data, TRUE),
			'_libfooter'	=> $this->ci->load->view('_template/_frontend/_libfooter', $data, TRUE),
			'_footer'		=> $this->ci->load->view('_template/_frontend/_footer', $data, TRUE),
			'_topbar'		=> $this->ci->load->view('_template/_frontend/_topbar', $data, TRUE)
		];

		$data['_mainContent'] 		= $this->ci->load->view($newView, $data, TRUE);
		$data['_content']			= $this->ci->load->view('_template/_frontend/_content', $data, TRUE);

		echo $this->ci->load->view('_template/_frontend/_template', $data, TRUE);
	}
}