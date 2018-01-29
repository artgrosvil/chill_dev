<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	/**
	 * @param $key_where
	 * @param $search_arg
	 * @return mixed
	 */
	function get_data_user($key_where, $search_arg)
	{
		$this->db->where($key_where, $search_arg);
		$data = $this->db->get('apps');
		return $data;
	}

}

/* End of file Users_model.php */
/* Location: ./application/models/api/v1/Users_model.php */