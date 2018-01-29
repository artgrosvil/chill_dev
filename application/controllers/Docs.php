<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Check auth
		if (!$this->session->userdata('logged')) {
			redirect('/');
		}
	}

	public function index()
	{
		$this->load->view('docs/main');
	}

	public function messages()
	{
		$this->load->view('docs/messages');
	}

	public function notifications()
	{
		$this->load->view('docs/notifications');
	}
}

/* End of file Docs.php */
/* Location: ./application/controllers/Docs.php */