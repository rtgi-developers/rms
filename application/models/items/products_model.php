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

    /* function get_cat($cat_num, $prev_cat = null)
    {   
        $prev_cat_num = $cat_num-1; 

        $this->db->distinct(); 
        $this->db->select('prod_cat_'.$cat_num); 
        $this->db->from('products'); 
        
        if(isset($prev_cat)) $this->db->where('prod_cat_'.$prev_cat_num, $prev_cat);

        $query = $this->db->get(); 

        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else return null;
    } */
}