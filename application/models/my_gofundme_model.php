<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * my_gofundme_model
 *
 * This model represents my gofundme project info. It operates the following tables:
 * - my_gofundme
 *
 * @author	Phat Pham
 */
class my_gofundme_model extends CI_Model
{
	private $table_name	= 'my_gofundme';

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get info
	 *
	 * @param	
	 * @return	object
	 */
	function get_info()
	{
		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1 ? $query->row_array() : NULL;
	}

	/**
	 * Update info
	 *
	 * @param	array
	 * @return	bool
	 */
	function update_info($data)
	{
		$data['last_fetched'] = date('Y-m-d H:i:s');
		return $this->db->update($this->table_name, $data);
	}
}

/* End of file my_gofundme_model.php */
/* Location: ./application/models/my_gofundme_model.php */