<?php  
/**
 * Customers model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Customers_model extends CI_model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();

	}

	/**
	 * Get query error
	 *
	 * @return void
	 */
	public function get_db_error()
	{
		$db_error = $this->db->error();

		$result['status'] = false;
		$result['data']   = $db_error['message'];

		return $result;
	}
	
	/**
	 * Query to insert new customer data
	 *
	 * @param 	array 	$cust_data 	Customers data
	 * @return	void
	 */
	public function insert_cust($cust_data)
	{
		$query = $this->db->insert('customers', $cust_data); 

		if($query)
        {
            $result['status'] = 'success'; 
            $result['data']   = 'Customer created successfully.'; 

            return $result; 
        }
        else return $this->get_db_error(); 
	}
}