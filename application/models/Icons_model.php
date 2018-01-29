<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icons_model extends CI_Model
{
	/**
	 * @param $id_app
	 * @return bool
	 */
	function get_all_icons($id_app)
	{
		$data = $this->db->query("SELECT
			a.id_app, a.id_icon,
			b.*
			FROM apps_icons AS a

			LEFT JOIN icons AS b ON b.id = a.id_icon

			WHERE a.id_app = $id_app");
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $pack
	 * @return bool
	 */
	function get_pack_icons($pack)
	{
		$this->db->where('pack', $pack);
		$data = $this->db->get('icons');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_icon
	 * @return bool
	 */
	function get_data_icon($id_icon)
	{
		$this->db->where('id', $id_icon);
		$data = $this->db->get('icons');
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
	function add_icon($data)
	{
		if ($this->db->insert('apps_icons', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	/**
	 * @param $id_icon
	 * @param $id_app
	 * @param $id_user
	 * @return bool
	 */
	function check_icon($id_icon, $id_app, $id_user)
	{
		$this->db->where('id_icon', $id_icon);
		$this->db->where('id_user', $id_user);
		$this->db->where('id_app', $id_app);
		$data = $this->db->get('apps_icons');
		if ($data->num_rows() == 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @param $id_app
	 * @param $id_icon
	 * @param $id_user
	 * @return bool
	 */
	function delete_icon($id_icon, $id_app, $id_user)
	{
		$this->db->where('id_icon', $id_icon);
		$this->db->where('id_app', $id_app);
		$this->db->where('id_user', $id_user);
		if ($this->db->delete('apps_icons')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Icons_model.php */
/* Location: ./application/models/Icons_model.php */