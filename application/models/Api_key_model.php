<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_key_model extends CI_Model
{
	/**
	 * @param $key_where
	 * @param $search_arg
	 * @return bool
	 */
	function get_data_api_key($key_where, $search_arg)
	{
		$this->db->where($key_where, $search_arg);
		$data = $this->db->get('apps_api_keys');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $data
	 * @return bool
	 */
	function add_api_key($data)
	{
		if ($this->db->insert('apps_api_keys', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Api_key_model.php */
/* Location: ./application/models/Api_key_model.php */