<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icons extends CI_Controller
{
	public $id_user;

	public function __construct()
	{
		parent::__construct();
		// Load models
		$this->load->model('apps_model');
		$this->load->model('icons_model');

		// Check auth
		$this->id_user = $this->session->userdata('id');
		if (!$this->session->userdata('logged')) {
			redirect('/');
		}
	}

	public function add_icon_app()
	{
		if ($this->form_validation->run()) {
			$id_app = $this->input->post('id_app');
			$id_icon = $this->input->post('id_icon');

			$data_icon = array(
				'id_user' => $this->id_user,
				'id_app' => $id_app,
				'id_icon' => $id_icon
			);

			if ($this->icons_model->check_icon($this->id_user, $id_icon, $id_app)) {
				if ($this->icons_model->add_icon($data_icon)) {
					$data_icon = $this->icons_model->get_data_icon($id_icon)->row();
					$data = array(
						'status' => 'success',
						'message' => 'Icon added.',
						'content' => $data_icon
					);
					print(json_encode($data));
				} else {
					$data = array(
						'status' => 'error',
						'message' => 'Server error.'
					);
					print(json_encode($data));
				}
			} else {
				$data = array(
					'status' => 'error',
					'message' => 'Icons exists.'
				);
				print(json_encode($data));
			}
		} else {
			$data = array(
				'status' => 'error',
				'message' => 'This field can\'t be blank.'
			);
			print(json_encode($data));
		}
	}

	function delete_icon_app()
	{
		if ($this->form_validation->run()) {
			$id_app = $this->input->post('id_app');
			$id_icon = $this->input->post('id_icon');

			if ($this->icons_model->delete_icon($id_icon, $id_app, $this->id_user)) {
				$data = [
					'status' => 'success',
					'redirect' => false,
					'message' => 'Icon removed.'
				];
				print(json_encode($data));
			} else {
				$data = [
					'status' => 'error',
					'message' => 'Icon not removed.'
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