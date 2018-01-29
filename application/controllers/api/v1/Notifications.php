<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Notifications extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		// Load models
		$this->load->model('api/v1/users_model');
		$this->load->model('api/v1/icons_model');
		$this->load->model('api/v1/contacts_model');
		$this->load->model('api/v1/api_key_model');

		// Load helper for curl
		$this->load->helper('exec_curl_helper');
	}

	function index_post()
	{
		$content = $this->post("content");
		$text = $this->post("text");
		$type = $this->post("type");

		$api_key = $_SERVER['HTTP_X_API_KEY'];

		if (!empty($content) && !empty($type)) {

			$data_key = $this->api_key_model->get_data_key('key', $api_key)->row();

			$data_user = $this->users_model->get_data_user('id_api_key', $data_key->id)->row();

			if ($type == 'icon') {
				$data_icon = $this->icons_model->get_icon($content)->row();
				if (empty($text)) {
					$push_string = $data_user->name . ': ' . html_entity_decode(stripcslashes($data_icon->bytes));
				} else {
					$push_string = $data_user->name . ': ' . html_entity_decode(stripcslashes($data_icon->bytes)) . ' #' . $text;
				}
			} elseif ($type == 'location') {
				$push_string = html_entity_decode(stripcslashes('\xF0\x9F\x93\x8D')) . ' from ' . $data_user->name;
			} elseif ($type == 'parse') {
				$push_string = html_entity_decode(stripcslashes('\xF0\x9F\x93\xB7')) . ' from ' . $data_user->name;
			}

			$contacts_app = $this->contacts_model->get_contacts($data_user->id);

			foreach ($contacts_app->result() as $item_contact) {
				$parse_par = array(
					'channels' => ['us' . $item_contact->id_contact],
					'data' => array(
						'alert' => $push_string,
						'badge' => 1,
						'fromUserId' => $data_user->id,
						'sound' => 'default'
					)
				);
				$data_ch = exec_curl($parse_par);
				unset($parse_par);
			}

			if ($data_ch->result) {
				$data_response = array(
					'status' => 'success',
					'response' => $contacts_app->result()
				);
				$this->set_response($data_response, REST_Controller::HTTP_CREATED);
			} else {
				$data_response = array(
					'status' => 'failed',
					'response' => 'Notification is not sent.'
				);
				$this->set_response($data_response, REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			$data_response = array(
				'status' => 'failed',
				'response' => 'Data were not obtained or is not valid.'
			);
			$this->set_response($data_response, REST_Controller::HTTP_NO_CONTENT);
		}
	}
}

/* End of file Notifications.php */
/* Location: ./application/controllers/api/v1/Notifications.php */