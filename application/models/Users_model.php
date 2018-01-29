<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	/**
	 * @param $id_user
	 * @return bool
	 */
	function get_data_user($id_user)
	{
		$this->db->where('id', $id_user);
		$data = $this->db->get('apps_users');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $data_user
	 * @return bool
	 */
	function create_user($data_user)
	{
		if ($this->db->insert('apps_users', $data_user)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_user
	 * @param $data_user
	 * @return bool
	 */
	function update_data_user($id_user, $data_user)
	{
		$this->db->where('id', $id_user);
		if ($this->db->update('apps_users', $data_user)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */