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

	/**
	 * Get database query error
	 * 
	 * @return [array] [status, data]
	 */
	public function get_db_error()
	{
		$db_error = $this->db->error();

		$result['status'] = false;
		$result['data']   = $db_error['message'];

		return $result;
	}

	/**
	 * Get all tasks and module names
	 * 
	 * @return [array] [description]
	 */
	public function get_tasks()
	{
		// Query to get all tasks
		$query = $this->db->get('tasks');

		// Validate query and non empty response 
		if($query)
		{
			$result['status'] = true;

			if($query->num_rows() > 0) $result['data'] = $query->result_array();
			else $result['data'] = "No records found.";

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Get unique category list
	 * 
	 * @return [type] [description]
	 */
	public function get_task_cat()
	{	
		// Query to get unique task category
		$query = $this->db->distinct()->select('task_cat')->get('tasks');
		
		if($query)
		{
			$result['status'] = true;

			if($query->num_rows() > 0) $result['data'] = $query->result_array();
			else $result['data'] = "No category found.";

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Insert or create new task
	 * 
	 * @param  [array] $taskdata [Task data contains field name as key and dats as value]
	 * @return [array]           [description]
	 */
	public function save_task($tasksdata)
	{	
		// Query to insert into tasks table
		$this->db->insert('tasks', $tasksdata);

		// Number rows greater than zero 
		if($this->db->affected_rows() > 0) 
		{
			$result['status'] = true;
			$result['data'] = "Task created.";

			return $result;	
		}
		else return $this->get_db_error();
	}

	/**
	 * Update task 
	 * 
	 * @return [type] [description]
	 */
	public function update_task($taskid, $tasksdata)
	{
		$query = $this->db
						->where('task_id', $taskid)
						->update('tasks', $tasksdata);

		if($query)
		{
			$result['status'] = true;
			$result['data']   = "Task updated.";

			return $result;
		}
		else return $this->get_db_error();
	}

	public function del_task($taskid)
	{
		$query = $this->db
						->where('task_id', $taskid)
						->delete('tasks');

		// Validate query
		if($query)
		{
			$result['status'] = true;
			$result['data'] = "Tasks and it's permissions has been deleted.";

			return $result;
		}
		else return $this->get_db_error();
	}


}

?>