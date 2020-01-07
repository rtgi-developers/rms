<?php  
/**
 * User Authentication Helper
 *
 * Authorizes active session, role and permissions etc.
 *
 * Call this helper inside contructor function as shown below: 
 * $this->load->helper('authorization_helper');
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

// Load libraries
$CI->load->library(array('session', 'user_agent'));

// Load helper
$CI->load->helper('url');

// Load model
$CI->load->model('systems/auth_model');

// Check for session, admin and permission
if($CI->session->userdata('_username'))
{
	$log_data['user_id']        = $CI->session->userdata('_userid');
	$log_data['user_ip']        = $CI->input->ip_address();
	$log_data['user_agent']     = $CI->agent->browser()." ";
	$log_data['user_agent']    .= $CI->agent->version()." ";
	$log_data['user_agent']    .= $CI->agent->mobile()." "; 
	$log_data['user_agent']    .= $CI->agent->platform();
	$log_data['req_directory']  = $CI->router->fetch_directory();
	$log_data['req_controller'] = $CI->router->fetch_class();
	$log_data['req_method']     = $CI->router->fetch_method();
	$log_data['req_type']       = $CI->input->method(TRUE);
	$log_data['req_data']		= get_req_data($log_data['req_type']);
	$log_data['req_time']       = date('Y-m-d H:i:s');

	// Log user's activity
	$log_query = $CI->auth_model->log_activity($log_data);

	if($log_query['status'] == true)
	{
		// Check access permission
		if($CI->session->userdata('_userrole') != 'ADMIN')
		{	
			$task_dir     = $CI->router->fetch_directory();
			$task_class   = $CI->router->fetch_class();
			$task_method  = $CI->router->fetch_method();

			$perm_query = $CI->auth_model->get_user_perms($log_data['user_id'], $log_data['req_directory'], $log_data['req_controller'], $log_data['req_method']);

			if($perm_query['status'] == true) 
			{
				if($perm_query['data'][0]['permission'] == 0) redirect('systems/errors/perms_error');
			}
			else redirect('systems/errors/perms_error');
		}
	}
	else exit($log_query['data']);
}
else redirect('systems/errors/session_error');

/**
 * Get request input data
 * 
 * @param  char $reqmethod POST or GET
 * @return json            User's input data json encoded
 */
function get_req_data($reqmethod)
{
	$CI = & get_instance(); 

	return ($reqmethod == 'POST') ? json_encode($CI->input->post()) : json_encode($CI->input->get());
}
?>