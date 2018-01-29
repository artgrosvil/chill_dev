<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model
{
	/**
	 * @return bool
	 */
	function get_all_categories()
	{
		$data = $this->db->get('apps_categories');
		if ($data) {
			return $data;
		} else {
			return FALSE;
		}
	}
}

/* End of file Categories_model.php */
/* Location: ./application/models/Categories_model.php */