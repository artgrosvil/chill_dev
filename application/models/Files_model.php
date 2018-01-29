<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_model extends CI_Model
{
	/**
	 * @param $id_app
	 * @param $id_user
	 * @return bool
	 */
	function get_all_files($id_app, $id_user)
	{
		$this->db->where('id_app', $id_app);
		$this->db->where('id_user', $id_user);
		$data = $this->db->get('apps_files');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $key_where
	 * @param $search_arg
	 * @param $id_app
	 * @param $id_user
	 * @return bool
	 */
	function get_data_file($key_where, $search_arg, $id_app, $id_user)
	{
		$this->db->where($key_where, $search_arg);
		$this->db->where('id_app', $id_app);
		$this->db->where('id_user', $id_user);
		$data = $this->db->get('apps_files');
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
	function add_file($data)
	{
		if ($this->db->insert('apps_files', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_file
	 * @param $id_app
	 * @param $id_user
	 * @param $data
	 * @return bool
	 */
	function update_file($id_file, $id_app, $id_user, $data)
	{
		$this->db->where('id', $id_file);
		$this->db->where('id_app', $id_app);
		$this->db->where('id_user', $id_user);
		if ($this->db->update('apps_files', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_file
	 * @param $id_app
	 * @param $id_user
	 * @return bool
	 */
	function delete_file($id_file, $id_app, $id_user)
	{
		$this->db->where('id', $id_file);
		$this->db->where('id_app', $id_app);
		$this->db->where('id_user', $id_user);
		if ($this->db->delete('apps_files')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Files_model.php */
/* Location: ./application/models/Files_model.php */