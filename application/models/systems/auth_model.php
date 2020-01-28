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
	public function get_user_perms($userid, $taskid)
	{
		// Query to get permission details
		$query = $this->db->get_where('permissions', array('user_id'=>$userid, 'task_id'=>$taskid));

		// Validate and return query result
		if($query)
		{	
			if($query->num_rows() > 0)
			{
				$result['status'] = true;
				$result['data'] = $query->result_array();
			}
			else {
				$result['status'] = false;
				$result['data'] = "Permissions record not found.";
			}

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Get task id
	 * 
	 * @param  string 	$taskdir     	Task directory name
	 * @param  string 	$taskclass   	Task class or controller name
	 * @param  string 	$taskmethod  	Task method name
	 * @return array              		Query result status and data
	 */
	public function get_task_details($taskdir, $taskclass, $taskmethod)
	{
		$task_data = array('task_dir'=>$taskdir, 'task_class'=>$taskclass, 'task_method'=>$taskmethod);

		// Query 
		$query = $this->db->get_where('tasks', $task_data);

		// Validate query and non empty response 
		if($query)
		{	
			if($query->num_rows() > 0)
			{	
				$result['status'] = true;
				$result['data'] = $query->result_array();
			}
			else{
				$result['status'] = false;
				$result['data'] = "The requested task does not exist in our database.";
			}

			return $result;
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