<?php  
/**
 * Settings logs model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Logs_model extends CI_Model
{
 	public function __construct()
 	{
 		parent::__construct();

 		$this->load->database();
 	}

	public function get_db_error()
	{
		$db_error = $this->db->error();

		$result['status'] = false;
		$result['data']   = $db_error['message'];

		return $result;
	}

 	public function get_user_logs()
 	{	
 		$this->db->select('logs.*, users.name, users.email');
 		$this->db->from('logs');
 		$this->db->join('users', 'logs.user_id = users.user_id', 'left');
 		$query = $this->db->get();

 		if($query)
 		{	
			$result['status'] = true;
			$result['data']   = $query->result_array();

 			return $result;
 		}
 		else return $this->get_db_error();
 	}
}

?>