<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts_model extends CI_Model
{

	/**
	 * @param $id_app
	 * @return bool
	 */
	function get_contacts($id_app)
	{
		$this->db->where('id_user', $id_app);
		$this->db->where('type_contact', 1);
		$data = $this->db->get('contacts');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}
}

/* End of file Contacts_model.php */
/* Location: ./application/model/api/v1/Contacts_model.php */