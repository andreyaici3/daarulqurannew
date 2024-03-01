<?php 

class Backend
{
	protected $ci;
	function __construct(){
		$this->ci = &get_instance();
	}

	function view($template = NULL, $data = NULL){
		$newView = "_backend/" . $template;
		$data = [
			'_head' 		=> $this->ci->load->view('_template/_backend/_head', $data, TRUE),	
			'_libfooter'	=> $this->ci->load->view('_template/_backend/_libfooter', $data, TRUE),	
			'_sidebar'	=> $this->ci->load->view('_template/_backend/_sidebar', $data, TRUE),	
			'_navbar'	=> $this->ci->load->view('_template/_backend/_navbar', $data, TRUE)
		];

		$data['_mainContent'] 		= $this->ci->load->view($newView, $data, TRUE);
		$data['_content']			= $this->ci->load->view('_template/_backend/_content', $data, TRUE);

		echo $this->ci->load->view('_template/_backend/_template', $data, TRUE);
	}

    function fail($text='', $url){
        $this->ci->session->set_flashdata('msgi', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
            $text . '
        </div>');
        redirect($url);
    }

    function success($text = '', $url){
        $this->ci->session->set_flashdata('msgi', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            '. $text .'
	        </div>');
		redirect($url);
    }
}