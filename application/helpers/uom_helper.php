<?php   
/**
 * Unit of Measurement Helper
 *
 * NOTE: Don't included any helper or library that has already been 
 * called in autoload.
 *
 * @package 	Codeigniter
 * @subpackage  Helper
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */

defined('BASEPATH') or exit("No direct script access allowed.");

// Get instance, access CI superobject
$CI = & get_instance();

// CI configurations
$CI->load->config('config_uom'); 

/**
 * Get unit of measurements in HTMl select options
 *
 * @param [type] $curr_status
 * @return void
 */
function get_uom_options($uom_type, $selected_uom_abbr = null)
{   
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Initialize uom options
    $uom_options = '';

    // Loop through uom array
    foreach($CI->config->item($uom_type, 'uom') as $uom)
    {	
        if(isset($selected_uom_abbr) && $uom[1] == $selected_uom_abbr)
        {
            $uom_options .= '<option value="'.$uom[1].'" selected>'.$uom[0].' ('.$uom[1].')</option>';
        }
        else {
            $uom_options .= '<option value="'.$uom[1].'">'.$uom[0].' ('.$uom[1].')</option>';
        } 
    }
 
    return $uom_options; 
}

?>