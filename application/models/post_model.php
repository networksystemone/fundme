<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * post_model
 *
 * This model represents my post. It operates the following tables:
 * - post
 *
 * @author	Phat Pham
 */
class post_model extends CI_Model
{
	private $table_name	= 'post';

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get num total posts
	 *
	 * @return	object
	 */
	function total_posts()
	{
		$query = $this->db->get($this->table_name);
		return count($query->result_array());
	}

	/**
	 * Get posts list
	 *
	 * @return	object
	 */
	function get_posts_list($num = '', $offset = '', $column = 'date_created', $order = 'desc')
	{
		if (!empty($num)){
			$offset = empty($offset) ? 0 : $offset;
			$this->db->limit($num, $offset);
		}
		$this->db->order_by($column, $order);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	/**
	 * Get post
	 *
	 * @param   int
	 * @return	object
	 */
	function get_post($post_id)
	{
		$this->db->where('id', $post_id);
		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1 ? $query->row_array() : NULL;
	}

	/**
	 * Create post
	 *
	 * @param	array
	 * @return	array
	 */
	function create_post($data)
	{
		$data['date_created'] = date('Y-m-d H:i:s');
		
		if ($this->db->insert($this->table_name, $data)) {
			$data['id'] = $this->db->insert_id();
			return $data;
		} else {
			return NULL;
		}
	}

	/**
	 * Update post
	 *
	 * @param	array
	 * @return	bool
	 */
	function update_post($data)
	{
		$this->db->where('id', $data['id']);
		return $this->db->update($this->table_name, $data);
	}

	/**
	 * Delete post
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_post($post_id)
	{
		$this->db->where('id', $post_id);
		$this->db->delete($this->table_name);
		return $this->db->affected_rows() == 1 ? TRUE : FALSE;
	}
}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */