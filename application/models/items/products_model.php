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
}