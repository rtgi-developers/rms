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

class Products_model extends CI_model
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
     * Insert product
     *
     * @param   array   $proddata   Products all data
     * @return void
     */
    public function insert_prod($proddata)
    {
        $query = $this->db->insert('products', $proddata); 

        if($query)
        {
            $result['status'] = 'success'; 
            $result['data'] = 'Product created successfully.'; 

            return $result; 
        }
        else return $this->get_db_error(); 
    }

    /**
	 * Query to get all materials
	 * 
	 * @param  int 	  	$limit 	Limit
	 * @param  int 		$start 	Start
	 * @param  string  	$col   	Order by column
	 * @param  string 	$dir   	Order direction asc or desc
	 * @return array     
	 */
	public function get_all_prod($limit, $start, $col, $dir)
	{	
		$query = $this->db
						->select('*')
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('products');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count all materials
	 * 
	 * @return int
	 */
	public function count_all_prod()
	{
		$query = $this->db->get('products');

		return $query->num_rows();
	}

	/**
	 * Query to get serached materials
	 * 
	 * @param  int 	  	$limit 		Limit
	 * @param  int 		$start 		Start
	 * @param  string 	$search 	Search keyword
	 * @param  string  	$col   		Order by column
	 * @param  string 	$dir   		Order direction asc or desc
	 * @return array     
	 */
	public function get_search_prod($limit,$start,$search,$col,$dir)
	{	
		$query = $this->db
						->select('*')
						->like('prod_name', $search)
						->or_like('prod_color', $search)
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('products');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count searched result
	 * 
	 * @param  string 	$search 	Search keyword
	 * @return int  
	 */
	public function count_search_prod($search)
	{
		$query = $this->db
						->like('prod_name', $search)
						->or_like('prod_color', $search)
						->get('products');

		return $query->num_rows();
    }

    /**
     * Delete product query
     *
     * @param   integer     $prodid     Product id
     * @return  void
     */
    public function delete_prod($prodid)
    {
        $query = $this->db
						->where('prod_id', $prodid)
						->delete('products');

		if($query)
		{
			$result['status'] = true;
			$result['data'] = "Product deleted."; 

			return $result;
		}
		else return $this->get_db_error();
    }
}