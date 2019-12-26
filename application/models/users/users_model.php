<?php 
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * users_model
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

		// Database
		$this->load->database();
	}

	/**
	 * Add or insert new user
	 * 
	 * @param [array] $usersdata [Users data array with field name and value.]
	 */
	public function add_user($usersdata)
	{
		// Query to insert data
		$this->db->insert('users', $usersdata);

		// Validate insert query
		if($this->db->affected_rows() > 0)
		{
			$result['status'] = true;
			return $result;
		}
		else{
			$result['status'] 	= false;

			// Get db errors
			$db_error = $this->db->error();

			// Customize db error message
			switch ($db_error['code']) {
				case '1062':
					$result['data']  = "An account already exist with this email.";
					break;

				default:
					$result['data']  = $db_error['code'].": ".$db_error['message'];
					break;
			}

			return $result;
		}
	}

	/**
	 * Get user details by email
	 * 
	 * @param  [string] $email [User email address]
	 * @return [array]        [description]
	 */
	public function get_user_by_email($email)
	{	
		// Query to get user details by email
		$query = $this->db->get_where('users', array('email'=>$email));

		// Validate query and non empty response 
		if($query)
		{
			$result['status'] = true;

			if($query->num_rows() > 0) $result['data'] = $query->result_array();
			else $result['data'] = "User does not exist";

			return $result;
		}
		else return $this->get_db_error();
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
}

?>