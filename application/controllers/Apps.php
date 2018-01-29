<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller
{
	public $id_user;

	public $server_user_name;

	public $server_user_pass;

	public function __construct()
	{
		parent::__construct();
		// Check auth
		if ($this->session->userdata('logged')) {
			// Load models
			$this->load->model('apps_model');
			$this->load->model('api_key_model');
			$this->load->model('icons_model');
			$this->load->model('files_model');
			$this->load->model('users_model');
			$this->load->model('categories_model');

			// Load helpers for ssh2
			$this->load->helper('ssh2_client_helper');

			// Obtain the user id of the session
			$this->id_user = $this->session->userdata('id');

			// Data user server for auth
			$data_user = $this->users_model->get_data_user($this->id_user)->row();
			$this->server_user_name = $data_user->name_server;
			$this->server_user_pass = $data_user->pass_server;
		} else {
			redirect('/');
		}
	}

	public function index()
	{
		$data = [
			'apps' => $this->apps_model->get_all_apps($this->id_user)
		];
		$this->load->view('apps/main', $data);
	}

	public function create_app()
	{
		$type_app = $this->uri->segment(3);
		$categories = $this->categories_model->get_all_categories();

		// generate api key
		$api_key = substr(md5(uniqid(rand(), true)), 0, 30);

		$data_api_key = [
			'key' => $api_key,
			'level' => 1,
			'ignore_limits' => 1,
			'is_private_key' => 0
		];

		$this->api_key_model->add_api_key($data_api_key);

		$data_api_key = $this->api_key_model->get_data_api_key('key', $api_key)->row();

		// pre data for app
		$data_app = [
			'id_user' => $this->id_user,
			'name' => 'in process',
			'img' => 'avatar.png',
			'type' => $type_app,
			'id_api_key' => $data_api_key->id,
			'status' => 0,
			'id_category' => 1
		];
		$this->apps_model->create_app($data_app);

		$data_app = $this->apps_model->get_data_app('id_api_key', $data_api_key->id, $this->id_user)->row();

		$data = [
			'id_app' => $data_app->id,
			'categories' => $categories,
			'type_app' => $type_app,
			'api_key' => $api_key,
			'icons' => $this->icons_model->get_all_icons($data_app->id),
			'all_icons' => $this->icons_model->get_pack_icons('main')
		];
		$this->load->view('apps/' . $type_app . '/create', $data);
	}

	public function settings()
	{
		$id_app = $this->uri->segment(2);
		$app = $this->apps_model->get_data_app('id', $id_app, $this->id_user);
		$data_api_key = $this->api_key_model->get_data_api_key('id', $app->row()->id_api_key)->row();

		$data = [
			'id_app' => $id_app,
			'app' => $app,
			'api_key' => $data_api_key->key,
			'categories' => $this->categories_model->get_all_categories(),
			'icons' => $this->icons_model->get_all_icons($id_app),
			'all_icons' => $this->icons_model->get_pack_icons('main')
		];
		$this->load->view('apps/' . $app->row()->type . '/settings', $data);
	}

	public function update_app()
	{
		if ($this->form_validation->run()) {
			$id_app = $this->input->post('id_app');
			$img = $this->input->post('img');
			$name = $this->input->post('name');
			$id_category = $this->input->post('id_category');
			$language = $this->input->post('language');
			$status = $this->input->post('status');
			$description = $this->input->post('description');

			$data_app_tmp = $this->apps_model->get_data_app('id', $id_app, $this->id_user)->row();

			if (!empty($name)) {
				$data_app['name'] = $name;
			}

			if (!empty($img)) {
				$data_app['img'] = $img;
			}

			if (!empty($id_category)) {
				$data_app['id_category'] = $id_category;
			}

			if (!empty($language)) {
				$data_app['language'] = $language;
			}

			if (strlen($status) != 0) {
				$data_app['status'] = $status;
			}

			if (!empty($description)) {
				$data_app['description'] = $description;
			}

			if ($data_app_tmp->finished == 0 && $data_app_tmp->type == 'cloud') {

				$data_app['finished'] = 1;

				if ($language == 'php') {
					$type_ex_file = '.php';
				} else if ($language == 'python') {
					$type_ex_file = '.py';
				} else if ($language == 'ruby') {
					$type_ex_file = '.rb';
				}

				$data_file = [
					'id_app' => $id_app,
					'id_user' => $this->id_user,
					'name' => 'index' . $type_ex_file
				];

				$command_script = ["create_project.sh", $this->server_user_name, $id_app, "index" . $type_ex_file];

				if ($this->files_model->add_file($data_file) && exec_bash_script($command_script, FALSE)) {
					if ($this->apps_model->update_app($this->id_user, $id_app, $data_app)) {
						$data = [
							'status' => 'success',
							'message' => 'Update app success.'
						];
						print(json_encode($data));
					} else {
						$data = [
							'status' => 'success',
							'message' => 'Not updated app success.'
						];
						print(json_encode($data));
					}
				} else {
					$data = [
						'status' => 'error',
						'message' => 'Not added file. Not exec bash script.'
					];
					print(json_encode($data));
				}
			} elseif ($data_app_tmp->finished == 0 && $data_app_tmp->type == 'locally') {

				$data_app['finished'] = 1;

				if ($this->apps_model->update_app($this->id_user, $id_app, $data_app)) {
					$data = [
						'status' => 'success',
						'message' => 'Update app success.'
					];
					print(json_encode($data));
				} else {
					$data = [
						'status' => 'success',
						'message' => 'Not updated app success.'
					];
					print(json_encode($data));
				}
			} else {
				if ($this->apps_model->update_app($this->id_user, $id_app, $data_app)) {
					$data = [
						'status' => 'success',
						'message' => 'Update app success.'
					];
					print(json_encode($data));
				} else {
					$data = [
						'status' => 'success',
						'message' => 'Not updated app success.'
					];
					print(json_encode($data));
				}
			}
		} else {
			$data = [
				'status' => 'error',
				'message' => 'This field can\'t be blank.'
			];
			print(json_encode($data));
		}
	}

	public function delete_app()
	{
		if ($this->form_validation->run()) {
			$id_app = $this->input->post('id_app');

			if ($this->apps_model->delete_app($this->id_user, $id_app)) {
				$data = [
					'status' => 'success',
					'message' => 'App removed.'
				];
				print(json_encode($data));
			} else {
				$data = [
					'status' => 'error',
					'message' => 'Not removed app.'
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