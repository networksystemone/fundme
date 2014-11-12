<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * user_model
 *
 * This model represents my user. It operates the following tables:
 * - user
 *
 * @author	Phat Pham
 */
class user_model extends CI_Model
{
	private $table_name	= 'user';

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Login
	 *
	 * @param   string, string
	 * @return	object
	 */
	function login($username, $password)
	{
		$this->db->where(array('username' => $username, 'password' => $password));
		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1 ? TRUE : FALSE;
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */