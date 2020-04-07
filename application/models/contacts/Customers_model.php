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
	 * Get customer by customer id
	 *
	 * @param 	integer 	$cust_id 	Customer id
	 * @return 	void
	 */
	public function get_cust($cust_id)
	{
		$query = $this->db
						->where('cust_id', $cust_id)
						->get('customers'); 

		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true; 
				$result['data'] = $query->result_array(); 
			}
			else {
				$result['status'] = false; 
				$result['data'] = "Customer not found.";  	
			}

			return $result;
		}
		else return $this->get_db_error(); 
	}

	/**
	 * Query to update customer changes
	 *
	 * @param 	integer 	$cust_id		Customer id
	 * @param 	array 		$cust_data		Customer's changed data
	 * @return 	void			
	 */
	public function update_cust($cust_id, $cust_data)
	{	
		$query = $this->db
						->where('cust_id', $cust_id)
						->update('customers', $cust_data);

		if($query)
		{
			$result['status'] = true; 
			$result['data']   = 'Customer changes has been successfully updated!'; 

			return $result;
		}
		else return $this->get_db_error();
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

	/**
	 * Query to get all customers
	 * 
	 * @param  int 	  	$limit 	Limit
	 * @param  int 		$start 	Start
	 * @param  string  	$col   	Order by column
	 * @param  string 	$dir   	Order direction asc or desc
	 * @return array     
	 */
	public function get_all_cust($limit, $start, $col, $dir)
	{	
		$query = $this->db
						->select('*')
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('customers');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count all customers
	 * 
	 * @return int
	 */
	public function count_all_cust()
	{
		$query = $this->db->get('customers');

		return $query->num_rows();
	}

	/**
	 * Query to get serached customers
	 * 
	 * @param  int 	  	$limit 		Limit
	 * @param  int 		$start 		Start
	 * @param  string 	$search 	Search keyword
	 * @param  string  	$col   		Order by column
	 * @param  string 	$dir   		Order direction asc or desc
	 * @return array     
	 */
	public function get_search_cust($limit,$start,$search,$col,$dir)
	{	
		$query = $this->db
						->select('*')
						->like('cust_name', $search)
						->or_like('cust_email_1', $search)
						->or_like('cust_email_2', $search)
						->or_like('cust_phone_1', $search)
						->or_like('cust_phone_2', $search)
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('customers');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count searched result
	 * 
	 * @param  string 	$search 	Search keyword
	 * @return int  
	 */
	public function count_search_cust($search)
	{
		$query = $this->db
						->like('cust_name', $search)
						->or_like('cust_email_1', $search)
						->or_like('cust_email_2', $search)
						->or_like('cust_phone_1', $search)
						->or_like('cust_phone_2', $search)
						->get('customers');

		return $query->num_rows();
	}

	/**
	 * Query to delete customer
	 *
	 * @param 	integer 	$cust_id 	Customer id
	 * @return 	void
	 */
	public function delete_cust($cust_id)
	{
		$query = $this->db
						->where('cust_id', $cust_id)
						->delete('customers');

		if($query)
		{
			$result['status'] = true;
			$result['data']   = "Customers deleted."; 

			return $result;
		}
		else return $this->get_db_error();
	}

	 /**
	  * Query to insert customer address
	  *
	  * @param 	array 	$addr_data 	Customers address data
	  * @return void
	  */
    public function insert_cust_addr($addr_data)
    {
        $query = $this->db->insert('customers_address', $addr_data); 

        if($query)
		{
			$result['status'] = true; 
			$result['addr_id'] = $this->db->insert_id();
			$result['data'] = "Customer address successfully added.";

			return $result; 
		}
		else return $this->get_db_error();
	}
	
	/**
     * Get customer address by product id
     *
     * @param 	integer 	$cust_id 	Customer id
     * @return 	void
     */
    public function get_cust_addr($cust_id)
    {
        $query = $this->db
                        ->where('cust_id', $cust_id)
                        ->get('customers_address');

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null; 
	}

	/**
	 * Query to delete customers address
	 *
	 * @param 	integer 	$cust_addr_id		Customer address id
	 * @param 	integer 	$cust_id			Customer id
	 * @return void
	 */
    public function delete_cust_addr($cust_addr_id, $cust_id)
    {
        $query = $this->db
                        ->where('cust_addr_id', $cust_addr_id)
                        ->where('cust_id', $cust_id)
						->delete('customers_address');
		
		if($query)
		{
			$result['status'] = true;
			$result['data']   = "Address deleted.";

			return $result;
		}
		else return $this->get_db_error();
    }
}