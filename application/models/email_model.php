<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * email_model
 *
 * This model represents my email. It operates the following tables:
 * - email
 *
 * @author	Phat Pham
 */
class email_model extends CI_Model
{
	private $table_name	= 'email';

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get email
	 *
	 * @param	
	 * @return	object
	 */
	function get_email($email_id)
	{
		$this->db->where('id', $email_id);
		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1 ? $query->row_array() : NULL;
	}

	/**
	 * Create email
	 *
	 * @param	array
	 * @return	bool
	 */
	function create_email($data)
	{
		$data['date_created'] = date('Y-m-d H:i:s');
		return $this->db->insert($this->table_name, $data);
	}
}

/* End of file email_model.php */
/* Location: ./application/models/email_model.php */