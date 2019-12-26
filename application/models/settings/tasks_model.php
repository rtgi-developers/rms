<?php 
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * Settings users model
 *
 * @package    CI
 * @subpackage Model
 * @author 	   MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Tasks_model extends CI_Model
{
	/**
	 * Construtor method
	 */
	public function __construct()
	{
		parent::__construct();

		// Load database
		$this->load->database();
	}

	public function get_tasks()
	{
		// Query to get all tasks
		$this->db->select('tasks.*, modules.mod_name');
		$this->db->from('tasks');
		$this->db->join('modules', 'tasks.mod_id = modules.mod_id', 'left');
		$query = $this->db->get();

		// Validate query and non empty response 
		if($query)
		{
			$result['status'] = true;

			if($query->num_rows() > 0) $result['data'] = $query->result_array();
			else $result['data'] = "No records found.";

			return $result;
		}
		else{
			// Get db errors
			$db_error = $this->db->error();

			$result['status'] 	= false;
			$result['data']  = $db_error['message'];

			return $result;
		}
	}
}

?>