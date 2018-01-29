<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	/**
	 * @param $email_user
	 * @return bool
	 */
	function get_data_user($email_user)
	{
		$this->db->where('email', $email_user);
		$data = $this->db->get('apps_users');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */