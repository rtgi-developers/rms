<?php  
/**
 * Unit of measurements model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Uom_model extends CI_model
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
     * Get all unit of measurements
     *
     * @return void
     */
    public function get_uom()
    {
        $query = $this->db->get('uom');

        if($query)
        {
            if($query->num_rows() > 0)
            {
                $result['status'] = true; 
                $result['data']   = $query->result_array();
            }
            else {
                $result['status'] = false; 
                $result['data']   = "No UOM";
            }

            return $result; 
        }
        else return $this->get_db_error(); 
    }
}
?>