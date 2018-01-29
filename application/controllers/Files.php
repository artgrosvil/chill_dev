<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends CI_Controller
{
	public $id_user;

	public $data_user;

	public $server_user_name;

	public $server_user_pass;

	public function __construct()
	{
		parent::__construct();
		// Load models
		$this->load->model('files_model');
		$this->load->model('users_model');

		// Load helpers for ssh2
		$this->load->helper('ssh2_client_helper');

		// Get data user
		$this->id_user = $this->session->userdata('id');
		$data_user = $this->users_model->get_data_user($this->id_user)->row();
		$this->server_user_name = $data_user->name_server;
		$this->server_user_pass = $data_user->pass_server;
		$this->data_user = $data_user;

		// Check auth
		if (!$this->session->userdata('logged')) {
			redirect('/');
		}
	}

	public function add_file()
	{
		if ($this->form_validation->run()) {
			$id_app = $this->input->post('id_app');
			$file_name = $this->input->post('file_name');

			$data_file = [
				'id_app' => $id_app,
				'id_user' => $this->id_user,
				'name' => $file_name
			];

			$command_script = ["create_file.sh", $this->server_user_name, $id_app, $file_name];

			if ($this->files_model->add_file($data_file) && exec_bash_script($command_script, FALSE)) {

				$data_file = $this->files_model->get_data_file('name', $file_name, $id_app, $this->id_user)->row();
				$data = [
					'status' => 'success',
					'message' => 'File added.',
					'content' => $data_file
				];
				print(json_encode($data));
			} else {
				$data = [
					'status' => 'error',
					'message' => 'File not added.'
				];
				print(json_encode($data));
			}
		} else {
			$data = [
				'status' => 'error',
				'message' => 'This field can\'t be blank.'
			];
			print(json_encode($data));
		}
	}

	public function delete_file()
	{
		if ($this->form_validation->run()) {
			$id_file = $this->input->post('id_file');
			$id_app = $this->input->post('id_app');

			$data_file = $this->files_model->get_data_file('id', $id_file, $id_app, $this->id_user)->row();

			$command_script = ["remove_file.sh", $this->server_user_name, $id_app, $data_file->name];

			if ($this->files_model->delete_file($id_file, $id_app, $this->id_user) && exec_bash_script($command_script, FALSE)) {

				$data = [
					'status' => 'success',
					'message' => $data_file->name,
					'content' => $data_file
				];
				print(json_encode($data));
			} else {
				$data = [
					'status' => 'error',
					'message' => 'File not removed.'
				];
				print(json_encode($data));
			}
		} else {
			$data = [
				'status' => 'error',
				'message' => 'This field can\'t be blank.'
			];
			print(json_encode($data));
		}
	}

	function update_file()
	{
		if ($this->form_validation->run()) {
			$id_file = $this->input->post('id_file');
			$id_app = $this->input->post('id_app');
			$file_name = $this->input->post('file_name');

			$data = [
				'name' => $file_name
			];

			if ($this->files_model->update_file($id_file, $id_app, $this->id_user, $data)) {
				$data = [
					'status' => 'success',
					'message' => 'File updated.',
					'content' => $data
				];
				print(json_encode($data));
			} else {
				$data = [
					'status' => 'error',
					'message' => 'File not updated.'
				];
				print(json_encode($data));
			}
		} else {
			$data = [
				'status' => 'error',
				'message' => 'This field can\'t be blank.'
			];
			print(json_encode($data));
		}
	}

	function get_data_file()
	{
		if ($this->form_validation->run()) {
			$id_file = $this->input->post('id_file');
			$id_app = $this->input->post('id_app');
			$file_name = $this->input->post('file_name');

			$command_script = ["get_data_file.sh", $this->server_user_name, $id_app, $file_name];

			$stream = exec_bash_script($command_script, TRUE);
			$data_file = [
				'file' => $stream,
				'id_file' => $id_file,
				'id_app' => $id_app,
				'name' => $file_name
			];

			$data = [
				'status' => 'success',
				'message' => 'Received file.',
				'content' => $data_file
			];
			print(json_encode($data));
		} else {
			$data = [
				'status' => 'error',
				'message' => 'This field can\'t be blank.'
			];
			print(json_encode($data));
		}
	}

	public function save_data_file()
	{
		if ($this->form_validation->run()) {
			$id_file = $this->input->post('id_file');
			$id_app = $this->input->post('id_app');
			$file_name = $this->input->post('file_name');
			$file = $this->input->post('file');

			$file_base64 = base64_encode($file);

			$command_script = ["update_file.sh", $this->server_user_name, $id_app, $file_name, $file_base64];

			if (exec_bash_script($command_script, FALSE)) {
				$data_file = [
					'file' => $file,
					'id_file' => $id_file,
					'id_app' => $id_app,
					'name' => $file_name
				];

				$data = [
					'status' => 'success',
					'message' => 'File saved.',
					'content' => $data_file
				];
				print(json_encode($data));
			} else {
				$data = [
					'status' => 'error',
					'message' => 'File not saved.'
				];
				print(json_encode($data));
			}
		} else {
			$data = [
				'status' => 'error',
				'message' => 'This field can\'t be blank.'
			];
			print(json_encode($data));
		}
	}
}

/* End of file Apps.php */
/* Location: ./application/controllers/Apps.php */