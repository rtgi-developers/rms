<?php  
/**
 * Currencies model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Currencies_model extends CI_model
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
     * Get list of currencies
     *
     * @param   string    $curr_status Enabled or disabled | optional
     * @return  array
     */
    public function get_curr($curr_status = null)
    {
        if(isset($curr_status)) $query = $this->db->get_where('currencies', array('curr_status' => $curr_status));
        else $query = $this->db->get('currencies');

        if($query)
        {
            if($query->num_rows() > 0)
            {
                $result['status'] = true; 
                $result['data']   = $query->result_array();
            }
            else {
                $result['status'] = false; 
                $result['data']   = "Currencies not found.";
            }

            return $result; 
        }
        else return $this->get_db_error();
    }
}