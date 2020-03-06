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
 * Get category in HTMl select options
 *
 * @param [type] $curr_status
 * @return void
 */
function get_cat_options($cat_type, $sel_cat_name = null)
{   
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Declare variable to hold category options
    $cat_options = '';

    // Query to get categories
    $result = $CI->categories_model->get_cat_by_type($cat_type); 

    if($result['status'] == true)
    {  
        foreach($result['data'] as $row)
        {   
            if(isset($sel_cat_name) && $row == $sel_cat_name)
            {
                $cat_options .=  '<option value="'.$row['cat_name'].'" selected>'.$row['cat_name'].'</option>';
            }
            else {
                $cat_options .=  '<option value="'.$row['cat_name'].'">'.$row['cat_name'].'</option>';
            }
        }
    }
    else $cat_options .=  '<option value>'.$result['data'].'</option>';
 
    return $cat_options; 
}

/**
 * Get sub category in HTMl select options
 *
 * @param [type] $curr_status
 * @return void
 */
function get_subcat_options($cat_name, $sel_cat_id = null)
{   
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Declare variable to hold category options
    $subcat_options = '';

    // Query to get categories
    $result = $CI->categories_model->get_subcat_by_catname($cat_name);

    if($result['status'] == true)
    {  
        foreach($result['data'] as $row)
        {   
            if(isset($sel_cat_id) && $row == $sel_cat_id)
            {
                $subcat_options .=  '<option value="'.$row['cat_id'].'" selected>'.$row['subcat_name'].'</option>';
            }
            else {
                $subcat_options .=  '<option value="'.$row['cat_id'].'">'.$row['subcat_name'].'</option>';
            }
        }
    }
    else $subcat_options .=  '<option value>'.$result['data'].'</option>';
 
    return $subcat_options; 
}

?>