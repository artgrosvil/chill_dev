<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller
{
	public $id_user;

	public $data_user_server;

	public function __construct()
	{
		parent::__construct();
		// Check auth
		if ($this->session->userdata('logged')) {
			// Load models
			$this->load->model('apps_model');
			$this->load->model('icons_model');
			$this->load->model('files_model');
			$this->load->model('users_model');

			// Load helpers for ssh2
			$this->load->helper('ssh2_client_helper');

			// Obtain the user id of the session
			$this->id_user = $this->session->userdata('id');

			// Data user server for auth
			$this->data_user_server = $this->users_model->get_data_user($this->id_user)->row();
		} else {
			redirect('/');
		}
	}

	public function index()
	{
		$id_app = $this->uri->segment(3);
		$data_app = $this->apps_model->get_data_app('id', $id_app, $this->id_user)->row();

		$data = [
			'id_app' => $id_app,
			'icons' => $this->icons_model->get_all_icons($id_app),
			'files' => $this->files_model->get_all_files($id_app, $this->id_user),
			'all_icons' => $this->icons_model->get_pack_icons('main'),
			'status_exec' => $data_app->status_exec
		];
		$this->load->view('editor/main', $data);
	}
}

/* End of file Editor.php */
/* Location: ./application/controllers/Editor.php */