<?php 
/**
 * Model for ntification settings
 *
 * @package    CI
 * @subpackage Model
 * @author 	   MD TARIQUE ANWER | mtarique@outlook.com
 */
defined('BASEPATH') or exit("No direct script access allowed.");

class Notifs_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	/**
	 * Get database query error
	 * 
	 * @return array
	 */
	public function get_db_error()
	{
		$db_error = $this->db->error();

		$result['status'] = false;
		$result['data']   = $db_error['message'];

		return $result;
	}

	/**
	 * Get number of unread notification
	 * 
	 * @param  int 		$userid 	Current user id
	 * @return array
	 */
	public function num_unread_notif($userid)
	{	
		// Query to get notif_rcpts
		$query = $this->db->get_where('notif_rcpts', array('user_id'=>$userid, 'is_read'=>0));
	
		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true; 
				$result['data'] = $query->num_rows();
			}
			else {
				$result['status'] = false; 
				$result['data'] = '';	
			}

			return $result;
		}
		else return $this->get_db->error();
	}

	/**
	 * Get all notifications
	 * 
	 * @return array
	 */
	public function get_notifs_by_user($userid)
	{
		$this->db->select('notif_rcpts.*, notif.*, users.name, users.email');
		$this->db->from('notif_rcpts'); 
		$this->db->join('notif', 'notif_rcpts.notif_id = notif.notif_id', 'left');
		$this->db->join('users', 'notif.user_posted = users.user_id', 'left');
		$this->db->where('notif_rcpts.user_id', $userid);
		$this->db->order_by('notif.time_posted', 'desc');
		$query = $this->db->get();

		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true;
				$result['data']   = $query->result_array();
			}
			else {
				$result['status'] = false;
				$result['data']   = "No notifications found!";	
			}

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to mark unread notification as read by user 
	 * 
	 * @param  int 		$userid 	Current user id
	 * @return array
	 */
	public function mark_read_by_user($userid)
	{
		$query = $this->db
						->set('is_read', 1)
						->where('user_id', $userid)
						->update('notif_rcpts');

		if($query)
		{
			$result['status'] = true;
			$result['data'] = "Marked as read.";

			return $result;
		}
		else return $this->get_db_error();
	}
}

?>