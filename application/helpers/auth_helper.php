<?php  
/**
 * User Authentication Helper
 *
 * Authorizes active session, role and permissions etc.
 *
 * Call this helper inside contructor function as shown below: 
 * $this->load->helper('authorization_helper');
 *
 * NOTE: Don't included any helper or library that has been already 
 * called here.
 *
 * @package CodeIgniter
 * @subpackage  Helper
 * @author MD TARIQUE ANWER <mtarique@outlook.com>
 * @copyright Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */

defined('BASEPATH') or exit("No direct script access allowed.");

// Get instance, access CI superobject
$CI = & get_instance(); 

// Load libraries
$CI->load->library('session');

// Load helper
$CI->load->helper('url');

// Load model
$CI->load->model('systems/auth_model');

// Check for session, admin and permission
if($CI->session->userdata('_username'))
{
	if($CI->session->userdata('_userrole') != 'ADMIN')
	{	
		$user_id      = $CI->session->userdata('_userid');
		$dir_name     = $CI->router->fetch_directory();
		$class_name   = $CI->router->fetch_class();
		$method_name  = $CI->router->fetch_method();
		
		// Query to get user permission
		$is_permitted = $CI->auth_model->get_user_perms($user_id, $dir_name, $class_name, $method_name);

		if($is_permitted['status'] == true) 
		{
			if($is_permitted['data'][0]['permission'] == 0) redirect('systems/errors/perms_error');
		}
		else redirect('systems/errors/perms_error');
	}
}
else redirect('systems/errors/session_error');
?>