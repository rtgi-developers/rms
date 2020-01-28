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
		$this->db->select('*');
		$this->db->from('tasks');
		$this->db->order_by('task_cat asc', 'task_class asc');

		$query = $this->db->get();

		// Validate query and non empty response 
		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true;
				$result['data']   = $query->result_array();
			}
			else {
				$result['status'] = false;
				$result['data']   = "<strong>No system tasks found!</strong><br>Please contact developer or admin.";
			}
			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to get only permission required task
	 * 
	 * @return array
	 */
	public function get_perm_req_tasks()
	{
		// Query to get only permisssion required tasks
		$this->db->select('*');
		$this->db->from('tasks');
		$this->db->where('is_perm_req', '1');
		$this->db->order_by('task_cat asc', 'task_class asc');

		$query = $this->db->get();

		// Validate query and non empty response 
		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true;
				$result['data']   = $query->result_array();
			}
			else {
				$result['status'] = false;
				$result['data']   = "<strong>No system tasks found!</strong><br>Please contact developer or admin.";
			}
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
	public function add_task($tasksdata)
	{	
		// Query to insert into tasks table
		$query = $this->db->insert('tasks', $tasksdata);

		// Number rows greater than zero 
		if($query) 
		{
			$result['status'] = true;
			$result['data'] = "Task created!";

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