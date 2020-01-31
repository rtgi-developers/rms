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
	 * Get all notifications
	 * 
	 * @return array
	 */
	public function get_notifs()
	{
		$this->db->select('notif.*, users.name, users.email');
		$this->db->from('notif'); 
		$this->db->join('users', 'notif.user_posted = users.user_id', 'left');
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
	 * Query to get recipients or users
	 * 
	 * @return array
	 */
	public function get_rcpts()
	{
		$query = $this->db->get_where('users', array('is_verified' => '1'));

		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true;
				$result['data']   = $query->result_array();
			}
			else {
				$result['status'] = false;
				$result['data']   = "No recipients found!";	
			}

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to save new notification 
	 * 
	 * @param  string 	$notifmsg   	Notification message
	 * @param  int 		$userposted 	Posted by user
	 * @param  int  	$rcptid     	Notification recipient
	 * @return array    
	 */
	public function save_notif($notifmsg, $userposted)
	{	
		$notif_data = array(
			'notif_msg'   => $notifmsg, 
			'user_posted' => $userposted, 
			'time_posted' => date('Y-m-d H:i:s')
		);

		$query = $this->db->insert('notif', $notif_data);

		if($query)
		{	
			$result['status'] = true;
			$result['data'] = $this->db->insert_id();

			return $result;
		} 
		else return $this->get_db_error();
	}

	/**
	 * Add recipients to notification 
	 * 
	 * @param 	int 	$notifid 	Last inserted notification id 
	 * @param 	int 	$rcptid  	Recipient id
	 * @return  bool
	 */
	public function add_rcpts($notifid, $rcptid)
	{
		$rcpts_data = array(
			'notif_id' => $notifid, 
			'user_id'  => $rcptid, 
			'is_read'  => 0
		);

		$query = $this->db->insert('notif_rcpts', $rcpts_data);

		if($query)
		{
			$result['status'] = true;
			$result['data']   = "Noification created.";

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to delete notification 
	 * 
	 * @param  int    $notifid  Notification id 
	 * @return array
	 */
	public function del_notif($notifid)
	{	
		$query = $this->db
						->where('notif_id', $notifid)
						->delete('notif');
		
		if($query)
		{
			$result['status'] = true;
			$result['data']   = "Notification Id ".$notifid." deleted.";

			return $result;
		}
		else return $this->get_db_error();
	}
}