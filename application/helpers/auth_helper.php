<?php  
/**
 * User Authentication Helper
 *
 * Authorizes active session, role and permissions etc.
 *
 * Call this helper inside contructor function as shown below: 
 * $this->load->helper('auth_helper');
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
$CI->load->model(array('systems/auth_model', 'settings/tasks_model'));

// Check for session, admin and permission
if($CI->session->userdata('_username'))
{	
	// Add requested task if not exist
	add_new_req_task();

	// Declare an array of user activity log data
	$logdata['user_id']        = $CI->session->userdata('_userid');
	$logdata['user_ip']        = $CI->input->ip_address();
	$logdata['user_agent']     = $CI->agent->browser()." ";
	$logdata['user_agent']    .= $CI->agent->version()." ";
	$logdata['user_agent']    .= $CI->agent->mobile()." "; 
	$logdata['user_agent']    .= $CI->agent->platform();
	$logdata['req_directory']  = $CI->router->fetch_directory();
	$logdata['req_controller'] = $CI->router->fetch_class();
	$logdata['req_method']     = $CI->router->fetch_method();
	$logdata['req_type']       = $CI->input->method(TRUE);
	$logdata['req_data']	   = get_sent_data($logdata['req_type']);
	$logdata['req_time']       = date('Y-m-d H:i:s');

	/*
	|-----------------------------------------------------------------
	| ACCESS PERMISSION 
	|----------------------------------------------------------------- 
	*/
	$check_perm = check_access_perm($logdata['user_id'], $logdata['req_directory'], 
		$logdata['req_controller'], $logdata['req_method']);

	// Check access permission for current user id, role and on requested task
	if($check_perm['status'] == false)
	{	
		if($CI->input->is_ajax_request()) 
		{
			// Ajax response since the reques was ajax		
			echo json_encode(array('success'=>false, 'title'=>"Access denied!", 'data'=>$check_perm['message'], 'type'=>'error'));

			// Stop program execution 
			exit();
		}
		else redirect('systems/errors/perms_error/'.base64_encode($check_perm['message']));
	}

	// Log cuurent user activity
	log_user_activity($logdata);
}
else redirect('systems/errors/session_error');

/**
 * Get request input data
 * 
 * @param  char $reqmethod POST or GET
 * @return json            User's input data json encoded
 */
function get_sent_data($reqmethod)
{	
	// Get CI instance
	$CI = & get_instance(); 

	// 
	$sentdata = '';

	if($reqmethod == 'POST')
	{	
		if(!empty($CI->input->post()))
		{
			foreach ($CI->input->post() as $key => $value) 
			{	
				if(is_array($value)) foreach($value as $val) $sentdata .= $key.": ".$val."\n";
				else $sentdata .= $key.": ".$value."\n";
			}
		}
		else $sentdata .= "No data sent by user.";
	}
	else {
		if(!empty($CI->input->get()))
		{
			foreach ($CI->input->get() as $key => $value) $sentdata .= $key.": ".$value."\n";	
		}
		else $sentdata .= "No data sent by user.";
	} 
	return $sentdata;
}

/**
 * Checks access permission by requesed task, user id and user type
 * 
 * @param  int 		$userid     	User id
 * @param  string 	$directory  	Path for  class or controller
 * @param  string 	$controller 	Name of class or controller 
 * @param  string 	$method     	Class or controllers method or function
 * @return array 					Status and message
 */
function check_access_perm($userid, $directory, $controller, $method)
{
	// CI instances
	$CI = & get_instance(); 

	if($CI->session->userdata('_userrole') != 'ADMIN')
	{
		$tasks_query = $CI->auth_model->get_task_details($directory, $controller, $method);

		if($tasks_query['status'] == true)
		{
			if($tasks_query['data'][0]['is_perm_req'] == 1) 
			{	
				// Check user permission for accessing the requested task id
				return check_user_perm($userid, $tasks_query['data'][0]['task_id']);
			}
			else {
				$result['status']  = true;
				$result['message'] = "Permission granted!";

				return $result;
			}
		}
		else {
			$result['status'] = false;
			$result['message'] = $tasks_query['data'];

			return $result;
		}
	}
	else {
		$result['status'] = true;
		$result['message'] = "Permission granted!";

		return $result;
	}
}

/**
 * Check user permission for accessing requested task
 * 
 * @param  int 	$userid 	User id
 * @param  int 	$taskid 	Requested task id
 * @return array 			Status and Message
 */
function check_user_perm($userid, $taskid)
{	
	// CI instances
	$CI = & get_instance(); 

	// Query to get get user permission to the task
	$perm_query = $CI->auth_model->get_user_perms($userid, $taskid);

	// Validate quey and return permission status
	if($perm_query['status'] == true) 
	{
		if($perm_query['data'][0]['permission'] == 0) 
		{
			$result['status'] = false;
			$result['message'] = "You do not have enough privileges to access this page or function.";
		}
		else {
			$result['status'] = true;
			$result['message'] = "Permission granted!";	
		}

		return $result;
	}
	else {
		$result['status'] = false;
		$result['message'] = $perm_query['data'];

		return $result;
	}
}

/**
 * Log current active user activity
 * 
 * @param  array $logdata Contain data to log in database 
 * @return [type]          [description]
 */
function log_user_activity($logdata)
{	
	// Get CI instance
	$CI = & get_instance(); 

	$log_query = $CI->auth_model->log_activity($logdata);

	if($log_query['status'] == false) exit($log_query['data']); 
}

/**
 * Add new request task automatically if not exist
 * 
 */
function add_new_req_task()
{	
	// Get CI instance
	$CI = & get_instance();

	// Task info
	$task_data = array(
		'task_class'  => strtolower($CI->router->fetch_class()), 
		'task_method' => strtolower($CI->router->fetch_method()), 
		'task_dir'    => strtolower($CI->router->fetch_directory()), 
	);

	// Get task details
	$task_exist = $CI->auth_model->get_task_details($task_data['task_dir'], $task_data['task_class'], $task_data['task_method']);

	// Validate get task details query
	if($task_exist['status'] == false)
	{	
		// Add task 
		$add_task = $CI->tasks_model->add_task($task_data);

		// Validate add task query
		if($add_task['status'] == false)
		{
			if($CI->input->is_ajax_request()) 
			{
				// Ajax response since the reques was ajax		
				echo json_encode(array('success'=>false, 'title'=>"Access denied!", 'data'=>$add_task['data'], 'type'=>'error'));

				// Stop program execution 
				exit();
			}
			else redirect('systems/errors/perms_error/'.base64_encode($add_task['data']));
		}
	}
}
?>