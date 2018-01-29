<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Check auth
		if ($this->session->userdata('logged')) {
			redirect('/apps');
		}
	}
	public function index()
	{
		$this->load->view('landing/main');
	}
}

/* End of file Landing.php */
/* Location: ./application/controllers/Landing.php */