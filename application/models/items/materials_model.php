<?php  
/**
 * Maerials model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Materials_model extends CI_model
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
	 * Query to get all materials
	 * 
	 * @param  int 	  	$limit 	Limit
	 * @param  int 		$start 	Start
	 * @param  string  	$col   	Order by column
	 * @param  string 	$dir   	Order direction asc or desc
	 * @return array     
	 */
	public function get_all_matl($limit, $start, $col, $dir)
	{	
		$query = $this->db
						->select('materials.*, categories.*, count.unit_id AS count_unit_id, count.unit_abbr AS count_unit, weight.unit_id AS wt_unit_id, weight.unit_abbr AS wt_unit, dimension.unit_id AS dim_unit_id, dimension.unit_abbr as dim_unit')
						->limit($limit, $start)
						->order_by($col, $dir)
						->join('categories', 'materials.matl_cat_id = categories.cat_id', 'left')
						->join('uom count', 'materials.matl_count_uom = count.unit_id', 'left')
						->join('uom weight', 'materials.matl_weight_uom = weight.unit_id', 'left')
						->join('uom dimension', 'materials.matl_dim_uom = dimension.unit_id', 'left')
						->get('materials');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count all materials
	 * 
	 * @return int
	 */
	public function count_all_matl()
	{
		$query = $this->db->get('materials');

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
	public function get_search_matl($limit,$start,$search,$col,$dir)
	{	
		$query = $this->db
						->select('materials.*, categories.*, count.unit_id AS count_unit_id, count.unit_abbr AS count_unit, weight.unit_id AS wt_unit_id, weight.unit_abbr AS wt_unit, dimension.unit_id AS dim_unit_id, dimension.unit_abbr as dim_unit')
						->like('matl_name', $search)
						->or_like('matl_color', $search)
						->limit($limit, $start)
						->order_by($col, $dir)
						->join('categories', 'materials.matl_cat_id = categories.cat_id', 'left')
						->join('uom count', 'materials.matl_count_uom = count.unit_id', 'left')
						->join('uom weight', 'materials.matl_weight_uom = weight.unit_id', 'left')
						->join('uom dimension', 'materials.matl_dim_uom = dimension.unit_id', 'left')
						->get('materials');

		if($query->num_rows() > 0) return $query->result();
		else return null;
	}

	/**
	 * Query to count searched result
	 * 
	 * @param  string 	$search 	Search keyword
	 * @return int  
	 */
	public function count_search_matl($search)
	{
		$query = $this->db
						->like('matl_name', $search)
						->or_like('matl_color', $search)
						->get('materials');

		return $query->num_rows();
	}

	/**
	 * Insert new material
	 * 
	 * @param  array 	$matldata 	Materials data including field name as key
	 * @return array
	 */
	public function insert_matl($matldata)
	{
		$query = $this->db->insert('materials', $matldata); 

		if($query)
		{
			$result['status'] = true; 
			$result['data'] = "Material created successfully.";

			return $result; 
		}
		else return $this->get_db_error(); 
	}

	/**
	 * Update material changes
	 *
	 * @param 	int 	$matlid		Material id
	 * @param 	array 	$matldata 	Material's data to be updated
	 * @return 	array
	 */
	public function update_matl($matlid, $matldata)
	{
		$query = $this->db
						->where('matl_id', $matlid)
						->update('materials', $matldata);

		if($query)
		{
			$result['status'] = true; 
			$result['data']   = 'Material has been successfully updated!'; 

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Query to deleted material 
	 * 
	 * @param  int 		$catid 		Category id
	 * @return array
	 */
	public function del_matl($matlid)
	{
		$query = $this->db
						->where('matl_id', $matlid)
						->delete('materials');

		if($query)
		{
			$result['status'] = true;
			$result['data'] = "Materials deleted."; 

			return $result;
		}
		else return $this->get_db_error();
	}

	/**
	 * Get material by id 
	 * 
	 * @param  int 		$matlid 	Material id
	 * @return array
	 */
	public function get_matl_by_id($matlid)
	{
		$query = $this->db
						->select('materials.*, categories.*, count.unit_id AS count_unit_id, count.unit_abbr AS count_unit, weight.unit_id AS wt_unit_id, weight.unit_abbr AS wt_unit, dimension.unit_id AS dim_unit_id, dimension.unit_abbr as dim_unit')
						->join('categories', 'materials.matl_cat_id = categories.cat_id', 'left')
						->join('uom count', 'materials.matl_count_uom = count.unit_id', 'left')
						->join('uom weight', 'materials.matl_weight_uom = weight.unit_id', 'left')
						->join('uom dimension', 'materials.matl_dim_uom = dimension.unit_id', 'left')
						->where('matl_id', $matlid)
						->get('materials');

		if($query)
		{
			if($query->num_rows() > 0)
			{
				$result['status'] = true; 
				$result['data'] = $query->result_array(); 
			}
			else {
				$result['status'] = false; 
				$result['data'] = "Material not found.";  	
			}

			return $result;
		}
		else return $this->get_db_error(); 
	}

}