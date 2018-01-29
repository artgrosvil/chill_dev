<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	public $id_user;

	public function __construct()
	{
		parent::__construct();
		// Load models
		$this->load->model('users_model');
		$this->load->model('apps_model');
		$this->load->model('statistics_users_model');

		// Check auth
		$this->id_user = $this->session->userdata('id');
		if (!$this->session->userdata('logged')) {
			redirect('/');
		}
	}

	public function index()
	{
		$data = [
			'user' => $this->users_model->get_data_user($this->id_user),
			'stats_user' => $this->statistics_users_model->get_stats_user($this->id_user)
		];
		$this->load->view('users/main', $data);
	}

	public function update()
	{
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$name = $this->input->post('name');
			$password = $this->input->post('password');

			if (!empty($email)) {
				$data['email'] = $email;
			}
			if (!empty($name)) {
				$data['name'] = $name;
			}
			if (!empty($password)) {
				$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
				$key_pass = crypt($password, $salt);

				$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
				$hash_pass = crypt($password, $salt);

				$data['key_pass'] = $key_pass;
				$data['hash_pass'] = $hash_pass;
			}

			if ($this->users_model->update_data_user($this->id_user, $data)) {
				$data = array(
					'status' => 'success',
					'message' => 'Update user data success.'
				);
				print(json_encode($data));
			} else {
				$data = array(
					'status' => 'error',
					'message' => 'Update user data failed.'
				);
				print(json_encode($data));
			}
		} else {
			$data = array(
				'status' => 'error',
				'message' => 'Please try once more.'
			);
			print(json_encode($data));
		}
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */