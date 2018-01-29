<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_Model
{

	/**
	 * @param $data
	 * @return bool
	 */
	function add_message($data)
	{
		if ($this->db->insert('messages', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Messages_model.php */
/* Location: ./application/model/api/v1/Messages_model.php */