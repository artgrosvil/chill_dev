<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load models
		$this->load->model('auth_model');
		$this->load->model('users_model');
		$this->load->model('statistics_users_model');

		// Load helpers for ssh2
		$this->load->helper('ssh2_client_helper');
	}

	public function auth_user()
	{
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$data_user = $this->auth_model->get_data_user($email);
			if ($data_user->num_rows() == 1) {

				$data_user = $data_user->row();
				$hash_pass_tmp = crypt($password, $data_user->hash_pass);
				if ($data_user->hash_pass == $hash_pass_tmp) {
					$auth_data = array(
						'id' => $data_user->id,
						'email' => $data_user->email,
						'logged' => TRUE
					);
					$this->session->set_userdata($auth_data);
					$data = array(
						'status' => 'success',
						'message' => 'Auth success.'
					);
					print(json_encode($data));
				} else {
					$data = array(
						'status' => 'error',
						'message' => 'Wrong password.'
					);
					print(json_encode($data));
				}
			} else {
				$data = array(
					'status' => 'error',
					'message' => 'Unrecognised email.'
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

	public function reg_user()
	{
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$data_user_tmp = $this->auth_model->get_data_user($email);
			if ($data_user_tmp->num_rows() == 0) {
				$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
				$key_pass = crypt($password, $salt);

				$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
				$hash_pass = crypt($password, $salt);

				$name_user_server = 'chill_' . substr(md5(uniqid(rand(), true)), 0, 20);
				$pass_user_server = substr(md5(uniqid(rand(), true)), 0, 20);

				$data = array(
					'email' => $email,
					'key_pass' => $key_pass,
					'hash_pass' => $hash_pass,
					'name_server' => $name_user_server,
					'pass_server' => $pass_user_server
				);

				if ($this->users_model->create_user($data)) {

					$command_script = ["create_user.sh", $name_user_server, $pass_user_server];

					if (exec_bash_script($command_script, FALSE)) {
						$data_user = $this->auth_model->get_data_user($email)->row();

						$data_stats = [
							'id_user' => $data_user->id,
							'apps' => 0,
							'contacts' => 0
						];
						$this->statistics_users_model->create_stats($data_stats);

						$auth_data = array(
							'id' => $data_user->id,
							'email' => $data_user->email,
							'logged' => TRUE
						);
						$this->session->set_userdata($auth_data);
						$data = array(
							'status' => 'success',
							'message' => 'Registration success.'
						);
						print(json_encode($data));
					} else {
						$data = array(
							'status' => 'error',
							'message' => 'Not exec script.'
						);
						print(json_encode($data));
					}
				} else {
					$data = array(
						'status' => 'error',
						'message' => 'User not created.'
					);
					print(json_encode($data));
				}
			} else {
				$data = array(
					'status' => 'error',
					'message' => 'This email is already in use.'
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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}