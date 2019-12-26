<?php  
/**
 * User Authentication Helper
 *
 * Authorizes active session, permissions etc.
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
$CI->load->library(array('session'));

// Check for active session
if(!$CI->session->userdata('_username')) redirect('errors/session_error');
?>