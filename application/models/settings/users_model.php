<?php 
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * Settings users model
 *
 * @package    CI
 * @subpackage Model
 * @author 	   MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Users_model extends CI_Model
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
	 * Get all users from database
	 * 
	 * @return [array] [Array of query results or error]
	 */
	public function get_users()
	{
		// Query to get user details
		$query = $this->db->get('users');

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
	 * Get user permissions by user id and task id
	 * 
	 * @param  [int] $userid [User id]
	 * @param  [int] $taskid [Task id]
	 * @return [type]         [description]
	 */
	public function get_user_perms($userid, $taskid)
	{	
		// Query to get user permissions by user and task
		$query = $this->db->get_where('permissions', array('user_id'=>$userid, 'task_id'=>$taskid));

		// Validate query and non empty response 
		if($query)
		{
			$result['status'] = true;

			if($query->num_rows() > 0) $result['data'] = $query->result_array();
			else $result['data'] = 0;

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Update user role 
	 * 
	 * @param  int 	  $userid 	User id
	 * @param  char   $role  	User role ADMIN or BASIC
	 * @return array       		Result status and data
	 */
	public function update_role($userid, $role)
	{
		$query = $this->db
						->set('role', $role)
						->where('user_id', $userid)
						->update('users');

		if($query)
		{
			$result['status'] = true;
			$result['data'] = "User role changed to ".$role;

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Save user permission changes
	 * 
	 * @param  [INT] 	$userid [User id]
	 * @param  [INT] 	$taskid [Task id]
	 * @param  [BOOL] 	$perm   [Permission 1 or 0]
	 * @return [ARRAY]         	[status and data]
	 */
	public function save_user_perms($userid, $taskid, $perm)
	{	
		// Query to check if task exist for user in permissions table
		$query = $this->db->get_where('permissions', array('user_id'=>$userid, 'task_id'=>$taskid));

		// Validate query
		if($query)
		{
			// Update or insert
			if($query->num_rows() > 0) return $this->update_user_perms($userid, $taskid, $perm);
			else return $this->insert_user_perms($userid, $taskid, $perm);

			return $result;

		}
		else return $this->get_db_error();
	}

	/**
	 * Update task permisssions for user if exist
	 * 
	 * @param  [INT] 	$userid [User id]
	 * @param  [INT] 	$taskid [Task id]
	 * @param  [BOOL] 	$perm   [Permission 1 or 0]
	 * @return [ARRAY]         	[status and data]
	 */
	public function update_user_perms($userid, $taskid, $perm)
	{
		// Query to update permissions
		$query = $this->db
						->set('permission', $perm)
						->where(array('user_id' => $userid, 'task_id' => $taskid))
						->update('permissions');

		// Validate query
		if($query)
		{
			$result['status'] = true;
			$result['data'] = "Permission changes saved.";

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Insert task permisssions for user if not exist
	 * 
	 * @param  [INT] 	$userid [User id]
	 * @param  [INT] 	$taskid [Task id]
	 * @param  [BOOL] 	$perm   [Permission 1 or 0]
	 * @return [ARRAY]         	[status and data]
	 */
	public function insert_user_perms($userid, $taskid, $perm)
	{	
		// Query to insert permissions data into database
		$this->db->insert('permissions', array('user_id'=>$userid, 'task_id'=>$taskid, 'permission'=>$perm));

		// Validate query
		if($this->db->affected_rows() > 0)
		{
			$result['status'] = true;
			$result['data'] = "Permission changes saved.";

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Delete user
	 * 
	 * @param  [int] $userid [User id]
	 * @return [type]         [description]
	 */
	public function del_user($userid)
	{
		$query = $this->db
						->where('user_id', $userid)
						->delete('users');

		// Validate query
		if($query)
		{
			$result['status'] = true;
			$result['data'] = "The user and it's record has been removed.";

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Verify user
	 * 
	 * @param  [int] $userid [User id]
	 * @return [array]       [description]
	 */
	public function verify_user($userid)
	{	
		// Query to update user status
		$query = $this->db
						->set('is_verified', '1')
						->where('user_id', $userid)
						->update('users');

		// Validate query
		if($query)
		{
			$result['status'] = true;
			$result['data']   = "User verified and a confirmation email sent to the user.";

			return $result;
		}
		else return $this->get_db_error();
	}
}

?>
