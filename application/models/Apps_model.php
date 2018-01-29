<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps_model extends CI_Model
{
	/**
	 * @param $id_user
	 * @return bool
	 */
	function get_all_apps($id_user)
	{
		$data = $this->db->query("SELECT
			a.id AS id_app, a.id_user, a.name AS name_app, a.type, a.id_category, a.status, a.finished, a.count_added,
			b.id, b.name, b.title
			FROM apps AS a

			LEFT JOIN apps_categories AS b ON b.id = a.id_category

			WHERE a.id_user = $id_user");
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $key_where
	 * @param $search_arg
	 * @param $id_user
	 * @return bool
	 */
	function get_data_app($key_where, $search_arg, $id_user)
	{
		$this->db->where($key_where, $search_arg);
		$this->db->where('id_user', $id_user);
		$data = $this->db->get('apps');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_user
	 * @param $id_app
	 * @param $data
	 * @return bool
	 */
	function update_app($id_user, $id_app, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->where('id', $id_app);
		if ($this->db->update('apps', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $data
	 * @return bool
	 */
	function create_app($data)
	{
		if ($this->db->insert('apps', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_user
	 * @param $id_app
	 * @return bool
	 */
	function delete_app($id_user, $id_app)
	{
		$this->db->where('id', $id_app);
		$this->db->where('id_user', $id_user);
		if ($this->db->delete('apps')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Apps_model.php */
/* Location: ./application/models/Apps_model.php */