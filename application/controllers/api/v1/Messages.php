<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Messages extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        // Load models
        $this->load->model('api/v1/messages_model');
        $this->load->model('api/v1/users_model');
        $this->load->model('api/v1/contacts_model');
        $this->load->model('api/v1/api_key_model');
    }

    function index_post()
    {
        $content = $this->post("content");
        $type = $this->post("type");
        $text = $this->post("text");

        $api_key = $_SERVER['HTTP_X_API_KEY'];

        if (!empty($content) && !empty($type)) {

            $data_key = $this->api_key_model->get_data_key('key', $api_key)->row();
            $data_user = $this->users_model->get_data_user('id_api_key', $data_key->id)->row();
            $contacts_app = $this->contacts_model->get_contacts($data_user->id);

            $data_result_all = [];

            $data_message = array(
                'id_sender' => $data_user->id,
                'content' => $content,
                'type' => $type,
                'text' => $text,
                'type_message' => 1
            );

            foreach ($contacts_app->result() as $item_contact) {
                $data_message['id_recipient'] = $item_contact->id_contact;
                $data_result['id_contact'] = $item_contact->id_contact;
                if ($this->messages_model->add_message($data_message)) {
                    $data_result['status'] = TRUE;
                } else {
                    $data_result['status'] = FALSE;
                }
                array_push($data_result_all, $data_result);
                unset($data_result);
            }

            $data_response = array(
                'status' => 'success',
                'response' => $data_result_all
            );
            $this->set_response($data_response, REST_Controller::HTTP_CREATED);
        } else {
            $data_response = array(
                'status' => 'failed',
                'response' => 'Data were not obtained or is not valid.'
            );
            $this->set_response($data_response, REST_Controller::HTTP_NO_CONTENT);
        }
    }
}

/* End of file Messages.php */
/* Location: ./application/controllers/api/v1/Messages.php */