<?php   
/**
 * Currencies Helper
 *
 * Authorizes active session, role and permissions etc...
 *
 * Call this helper inside contructor function as shown below: 
 * $this->load->helper('curr_helper');
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
$CI->load->config('config_currencies'); 

/**
 * Get currencies in HTMl select options
 *
 * @param [type] $curr_status
 * @return void
 */
function get_curr_options($curr_selected = null)
{   
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Initialize currency options
    $curr_options = '';

    // Loop through currency array
    foreach($CI->config->item('currencies') as $curr)
    {	
        if(isset($curr_selected) && $curr[0] == $curr_selected)
        {
            $curr_options .= '<option value="'.$curr[0].'" selected>'.$curr[0].' - '.$curr[1].'</option>';
        }
        else {
            $curr_options .= '<option value="'.$curr[0].'">'.$curr[0].' - '.$curr[1].'</option>';
        } 
    }
 
    return $curr_options; 
}
?>