<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_users_model extends CI_Model
{

	function create_stats ($data)
	{
		if ($this->db->insert('apps_users_statistics', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_user
	 * @return bool
	 */
	function get_stats_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$data = $this->db->get('apps_users_statistics');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}
}

/* End of file Statistics_users_model.php */
/* Location: ./application/models/Statistics_users_model.php */