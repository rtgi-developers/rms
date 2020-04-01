<?php  
/**
 * Bill of Maerials model
 *
 * @package 	Codeigniter
 * @subpackage  Model
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */ 
defined('BASEPATH') or exit('No direct script access allowed.');

class Bom_model extends CI_model
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
     * Query to insert bill of material
     *
     * @return void
     */
    public function insert_bom($bom_data)
    {
        $query = $this->db->insert('bom', $bom_data); 

        if($query)
		{
			$result['status'] = true; 
			$result['data'] = "Material successfully added.";

			return $result; 
		}
		else return $this->get_db_error();
    }

    /**
     * Get bill of material by product id
     *
     * @param [type] $prod_id
     * @return void
     */
    public function get_bom($prod_id)
    {
        $query = $this->db
                        ->select('bom.*, materials.*')
                        ->join('materials', 'bom.matl_id = materials.matl_id', 'left')
                        ->where('prod_id', $prod_id)
                        ->get('bom');

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null; 
    }

    /**
     * Query to delete bill of material
     *
     * @param integer   $prod_id    Product id
     * @param integer   $matl_id    Material id
     * @return void
     */
    public function delete_bom($prod_id, $matl_id)
    {
        $query = $this->db
                        ->where('prod_id', $prod_id)
                        ->where('matl_id', $matl_id)
						->delete('bom');
		
		if($query)
		{
			$result['status'] = true;
			$result['data']   = "Bill of material id ".$matl_id." deleted.";

			return $result;
		}
		else return $this->get_db_error();
    }
}

?>