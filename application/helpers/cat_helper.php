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
function get_subcat_options($parent_cat_id)
{
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Query to get categories
    $result = $CI->categories_model->get_subcat($parent_cat_id);

    if(!empty($result))
    {
        // Declare variable to hold category options
        $cat_options = '';

        foreach($result as $row)
        {
            $cat_options .=  '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
        }	
    }
    else $cat_options =  '<option value>Not available</option>';

    return $cat_options;    
}

/**
 * Get categories and their sub-caegories full leneage
 *
 * @param   interger    $parent_cat_id      Parent category id
 * @return  void
 */
function get_all_subcat_options($parent_cat_id)
{
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Query to get categories
    $result_1 = $CI->categories_model->get_cat_by_id($parent_cat_id); 
    $result_2 = $CI->categories_model->get_all_subcat($parent_cat_id);


    // Validate query result
    if(!empty($result_1) && !empty($result_2))
    {
        // Declare variable to hold category options
        $cat_options = '<option value="'.$result_1[0]['cat_id'].'">'.get_cat_path($result_1[0]['cat_id']).'</option>';

        foreach($result_2 as $row)
        {   
            $cat_options .=  '<option value="'.$row['cat_id'].'">'.get_cat_path($row['cat_id']).'</option>';
        }	
    }
    else $cat_options =  '<option value>Not available</option>';

    return $cat_options;    
}

/**
 * Get category path by category id
 *
 * @param   integer     $cat_id     Category id
 * @return  void
 */
function get_cat_path($cat_id)
{
    // Get instance, access CI superobject
    $CI = & get_instance();

    // Query to get categories
    $result = $CI->categories_model->get_cat_by_id($cat_id);

    // Validate non empty query result
    if(!empty($result))
    {   
        if($result[0]['parent_cat_id'] != '')
        {
            $cat_path = get_cat_path($result[0]['parent_cat_id']).' > '.$result[0]['cat_name'];
        }
        else {
            $cat_path = $result[0]['cat_name']; 
        }

        return $cat_path; 
    }
    else return null; 
}
?>