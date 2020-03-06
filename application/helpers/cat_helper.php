<?php   
/**
 * Product and material category Helper
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

// CI models
$CI->load->model('items/categories_model'); 

/**
 * Get cat options by category id 
 *
 * @param  integer  $cat_id    Category id
 * @return void
 */
function get_cat_options($cat_id)
{
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Declare variable to hold category options
    $cat_options = '';

    // Query to get categories
    $result = $CI->categories_model->get_cat_by_parent_id($cat_id);

    if(!empty($result))
    {
        foreach($result as $row)
        {
            $cat_options .=  '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
        }	
    }
    else $cat_options .=  '<option value>Not available</option>';

    return $cat_options;    
}

?>