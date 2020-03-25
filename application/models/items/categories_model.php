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

	/**
	 * Get query errors
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
						->get('categories');

		return $query->num_rows();
	}

	/**
	 * Get categories by its parent category id
	 *
	 * @param 	integer 	$parent_cat_id 		Categorie's parent category id
	 * @return 	void
	 */
	public function get_subcat($parent_cat_id)
	{
		$query = $this->db->get_where('categories', array('parent_cat_id' => $parent_cat_id)); 

		if($query->num_rows() > 0) return $query->result_array();
		else return null;
	}

	/**
	 * Get sub categories of sub categories by its parent category id
	 *
	 * @param  	integer  	$parent_cat_id		Categorie's parent category id
	 * @return 	void
	 */
	public function get_all_subcat($parent_cat_id)
	{	
		// Query string 
		$query_string = "SELECT cat_id, cat_name FROM (SELECT * FROM categories ORDER BY cat_id) products_sorted, (SELECT @pv := '$parent_cat_id') initialisation WHERE FIND_IN_SET(parent_cat_id, @pv) > 0 AND @pv := CONCAT(@pv, ',', cat_id)";

		// Query
		$query = $this->db->query($query_string); 

		// Validate query
		if($query->num_rows() > 0) return $query->result_array();
		else return null;
	}

	/**
	 * Get category by it's id
	 *
	 * @param 	integer 	$cat_id		Category id
	 * @return 	void
	 */
	public function get_cat_by_id($cat_id)
	{
		$query = $this->db->get_where('categories', array('cat_id' => $cat_id)); 

		if($query->num_rows() > 0) return $query->result_array();
		else return null;
	}

	/**
	 * Get category by it's name
	 *
	 * @param 	string  $cat_name 	Category name
	 * @return 	void
	 */
	public function get_cat_by_name($cat_name)
	{
		$query = $this->db->get_where('categories', array('cat_name' => $cat_name)); 

		if($query->num_rows() > 0) return $query->result_array();
		else return null;
	}

	/**
	 * Check category if exist by name and parent id
	 *
	 * @param 	string 		$cat_name		Category name 
	 * @param 	integer 	$parent_cat_id	Parent category id
	 * @return 	boolean						TRUE or FALSE
	 */
	public function is_cat_exist($cat_name, $parent_cat_id)
	{
		$query = $this->db->get_where('categories', array('cat_name' => $cat_name, 'parent_cat_id' => $parent_cat_id)); 

		return ($query->num_rows() > 0) ? true : false;
	}

	/**
	 * Insret new category 
	 *
	 * @param 	array 	$catdata 	Category data array to be inserted
	 * @return 	void
	 */
	public function insert_cat($catdata)
	{
		$query = $this->db->insert('categories', $catdata); 

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
	 * Not in use because don't think we should delete the category
	 * 
	 * @param  int 		$catid 		Category id
	 * @return array
	 */
	public function delete_cat($catid)
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