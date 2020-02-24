<?php  
/**
 * Unit of measurements
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Uom extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 

        $this->load->helper('auth_helper');
        
        $this->load->model('systems/uom_model'); 
    }

    /**
     * Load unit of measurement options
     *
     * @return json
     */
    public function load_uom_options()
    {
        // Query 
        $result = $this->uom_model->get_uom(); 

        if($result['status'] == true)
        {
            $html = '';

			foreach($result['data'] as $row) 
			{
				$html .= '<option value="'.$row['unit_id'].'">'.$row['unit_abbr'].'</option>';
			}

            $json_data['status'] = 'success';  
            $json_data['title']  = 'UOM list'; 
            $json_data['data']   = $html; 
            
        }
        else {
            $json_data['status'] = 'error';  
            $json_data['title']  = 'Oops!'; 
            $json_data['data']   = $result['data']; 
        }

        // Send json encoded response 
        echo json_encode($json_data); 
    }
}

?>