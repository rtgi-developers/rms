<?php  
/**
 * Item categories model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Categories_model extends CI_model
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

	/**
	 * Query to get all categories
	 * 
	 * @param  int 	  	$limit 	Limit
	 * @param  int 		$start 	Start
	 * @param  string  	$col   	Order by column
	 * @param  string 	$dir   	Order direction asc or desc
	 * @return array     
	 */
	public function get_all_cat($limit, $start, $col, $dir)
	{	
		$query = $this->db
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('categories');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count all categories
	 * 
	 * @return int
	 */
	public function count_all_cat()
	{
		$query = $this->db->get('categories');

		return $query->num_rows();
	}

	/**
	 * Query to get serached categories
	 * 
	 * @param  int 	  	$limit 		Limit
	 * @param  int 		$start 		Start
	 * @param  string 	$search 	Search keyword
	 * @param  string  	$col   		Order by column
	 * @param  string 	$dir   		Order direction asc or desc
	 * @return array     
	 */
	public function get_search_cat($limit,$start,$search,$col,$dir)
	{	
		$query = $this->db
						->like('cat_name', $search)
						->or_like('subcat_name', $search)
						->or_like('cat_type', $search)
						->limit($limit, $start)
						->order_by($col, $dir)
						->get('categories');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count searched result
	 * 
	 * @param  string 	$search 	Search keyword
	 * @return int  
	 */
	public function count_search_cat($search)
	{
		$query = $this->db
						->like('cat_name', $search)
						->or_like('subcat_name', $search)
						->or_like('cat_type', $search)
						->get('categories');

		return $query->num_rows();
	}

	/**
	 * Get categories by its parent category id
	 *
	 * @param 	integer 	$parent_cat_id 		Categories parent category id
	 * @return 	void
	 */
	public function get_cat_by_parent_id($parent_cat_id)
	{
		$query = $this->db->get_where('categories', array('parent_cat_id' => $parent_cat_id)); 

		if($query->num_rows() > 0) return $query->result_array();
		else return null;
	}

	/**
	 * Query to get categories
	 * 
	 * @param  string $cattype Category or item type i.e. product or material
	 * @return array
	 */
	public function get_cat_by_type($cattype)
	{	
		// Query 
		$this->db->distinct();
		$this->db->select('cat_name'); 
		$this->db->from('categories'); 
		$this->db->where('cat_type', $cattype);
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
				$result['data']   = 'No categories found.';	
			}

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to get sub categories
	 * 
	 * @param  string $cattype Category or item type i.e. product or material
	 * @return array
	 */
	public function get_subcat_by_catname($catname)
	{	
		// Query 
		$this->db->select('*'); 
		$this->db->from('categories'); 
		$this->db->where('cat_name', $catname);
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
				$result['data']   = 'No sub categories found.';	
			}

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to get category details
	 * 
	 * @param  array 	$catdata 	Category type, category name, sub category
	 * @return array
	 */
	public function get_cat_by_details($catdata)
	{
		// Query 
		$query = $this->db->get_where('categories', $catdata); 

		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true; 
				$result['data']   = $query->result_array(); 
			}
			else {
				$result['status'] = false; 
				$result['data']   = 'No records found.'; 	
			}

			return $result; 
		}
		else return $this->get_db_error(); 
	}

	/**
	 * Query to insert new category 
	 * 
	 * @param 	array 	$catdat 	Cat type, cat name and sub cat name
	 * @return 	array
	 */
	public function add_cat($catdat)
	{
		$query = $this->db->insert('categories', $catdat); 

		if($query)
		{
			$result['status'] = true; 
			$result['data']   = 'Category created!'; 

			return $result; 
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to update category
	 * 
	 * @param  int 		$catid   Category id
	 * @param  array 	$catdata Type, Category and Subcategory
	 * @return array
	 */
	public function update_cat($catid, $catdata)
	{
		$query = $this->db
						->where('cat_id', $catid)
						->update('categories', $catdata);

		if($query)
		{
			$result['status'] = true; 
			$result['data'] = 'Category has been successfully updated!'; 

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to deleted item category 
	 * 
	 * @param  int 		$catid 		Category id
	 * @return array
	 */
	public function del_cat($catid)
	{
		$query = $this->db
						->where('cat_id', $catid)
						->delete('categories');

		if($query)
		{
			$result['status'] = true;
			$result['data'] = "Category deleted."; 

			return $result;
		}
		else return $this->get_db_error();
	}
}