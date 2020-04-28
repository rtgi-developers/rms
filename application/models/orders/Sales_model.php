<?php  
/**
 * Products model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Sales_model extends CI_model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();

	}

    /**
     * Get errors in query 
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
	 * Insert SO header
	 *
	 * @param 	array 	$soheader		SO header data
	 * @return 	void
	 */
	public function insert_so_header($soheader)
	{	
		// Query 
		$query = $this->db->insert('so_header', $soheader); 

		if($query)
        {
            $result['status'] = 'success'; 
            $result['data'] = $this->db->insert_id();

            return $result; 
        }
        else return $this->get_db_error(); 
	}

	/**
	 * Insert SO product details
	 *
	 * @param 	array 	$sodetails		SO details data
	 * @return 	void
	 */
	public function insert_so_details($sodetails)
	{	
		// Query 
		$query = $this->db->insert('so_details', $sodetails); 

		if($query)
        {	
            $result['status'] = 'success'; 
            $result['data'] = null; 

            return $result; 
        }
        else return $this->get_db_error(); 
	}

	/**
	 * Query to delete sales order product
	 *
	 * @param 	integer 	$so_id 		Sales order id
	 * @param 	integer 	$prod_id	Product id
	 * @return 	void
	 */
	public function delete_so_prod($so_id, $prod_id)
	{
		$query = $this->db
						->where('so_id', $so_id)
                        ->where('prod_id', $prod_id)
						->delete('so_details');
		
		if($query)
		{
			$result['status'] = true;
			$result['data']   = "Product id ".$prod_id." deleted from Sales order id ".$so_id;

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to get all sales orders
	 * 
	 * @param  int 	  	$limit 	Limit
	 * @param  int 		$start 	Start
	 * @param  string  	$col   	Order by column
	 * @param  string 	$dir   	Order direction asc or desc
	 * @return array     
	 */
	public function get_all_so($limit, $start, $col, $dir)
	{	
		$query = $this->db
						->select('so_header.*, customers.cust_name')
						->join('customers', 'so_header.cust_id = customers.cust_id', 'left')
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('so_header');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count all sales orders
	 * 
	 * @return int
	 */
	public function count_all_so()
	{
		$query = $this->db
						->select('so_header.*, customers.cust_name')
						->join('customers', 'so_header.cust_id = customers.cust_id', 'left')	
						->get('so_header');

		return $query->num_rows();
	}

	/**
	 * Query to get searched sales orders
	 * 
	 * @param  int 	  	$limit 		Limit
	 * @param  int 		$start 		Start
	 * @param  string 	$search 	Search keyword
	 * @param  string  	$col   		Order by column
	 * @param  string 	$dir   		Order direction asc or desc
	 * @return array     
	 */
	public function get_search_so($limit,$start,$search,$col,$dir)
	{	
		$query = $this->db
						->select('so_header.*, customers.cust_name')
						->join('customers', 'so_header.cust_id = customers.cust_id', 'left')	
						->like('so_header.so_id', $search)
						->or_like('customers.cust_name', $search)
						->or_like('so_header.cust_po', $search)
						->or_like('so_header.order_date', $search)
						->or_like('so_header.cancel_date', $search)
						->or_like('so_header.so_status', $search)
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('so_header');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count searched sales orders result
	 * 
	 * @param  string 	$search 	Search keyword
	 * @return int  
	 */
	public function count_search_so($search)
	{
		$query = $this->db
						->select('so_header.*, customers.cust_name')
						->join('customers', 'so_header.cust_id = customers.cust_id', 'left')	
						->like('so_header.so_id', $search)
						->or_like('customers.cust_name', $search)
						->or_like('so_header.cust_po', $search)
						->or_like('so_header.order_date', $search)
						->or_like('so_header.cancel_date', $search)
						->or_like('so_header.so_status', $search)
						->get('so_header');

		return $query->num_rows();
	}
}