<?php 
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * Settings users model
 *
 * @package    CI
 * @subpackage Model
 * @author 	   MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Auth_model extends CI_Model
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
	 * Get user permission
	 * 
	 * @param  int 		$userid     description
	 * @param  string 	$taskdir    description
	 * @param  string 	$taskclass  description
	 * @param  string 	$taskmethod description
	 * @return array             	description
	 */
	public function get_user_perms($userid, $taskdir, $taskclass, $taskmethod)
	{	
		// Query to get all task
		$tasks = $this->get_task_id($taskdir, $taskclass, $taskmethod);

		if($tasks['status'] == true)
		{		
			// Get task id
			$taskid = $tasks['data'][0]['task_id'];

			// Query to 
			$query = $this->db->get_where('permissions', array('user_id'=>$userid, 'task_id'=>$taskid));

			// Validate
			if($query)
			{	
				if($query->num_rows() > 0)
				{
					$result['status'] = true;
					$result['data'] = $query->result_array();

					return $result;	
				}
				else {
					$result['status'] = false;
					$result['data'] = "Permissions record not found";

					return $result;	
				}
			}
			else return $this->db->get_db_error();
		}
		else {
			$result['status'] = $tasks['status'];
			$result['data'] = $tasks['data'];

			return $result; 
		}
	}

	/**
	 * Get task id
	 * 
	 * @param  string 	$taskdir     	Task directory name
	 * @param  string 	$taskclass   	Task class name
	 * @param  string 	$taskmethod  	Task method name
	 * @return array              		Query result status and data
	 */
	public function get_task_id($taskdir, $taskclass, $taskmethod)
	{
		$task_data = array('task_dir'=>$taskdir, 'task_class'=>$taskclass, 'task_method'=>$taskmethod);

		$query = $this->db->get_where('tasks', $task_data);

		// Validate query and non empty response 
		if($query)
		{	
			if($query->num_rows() > 0)
			{	
				$result['status'] = true;
				$result['data'] = $query->result_array();

				return $result;
			}
			else{
				$result['status'] = false;
				$result['data'] = "No such task found.";

				return $result;
			}
		}
		else return $this->get_db_error();
	}

	public function log_activity($logdata)
	{
		$query = $this->db->insert('logs', $logdata);

		if($query)
		{
			$result['status'] = true;

			return $result;
		}
		else return $this->get_db_error();
	}

}
?>