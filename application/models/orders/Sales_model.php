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
}