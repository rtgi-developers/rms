<?php  
/**
 * Logout active user
 *
 * Logs out an active user from the system.
 *
 * @package 	CodeIgniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER <mtarique@outlook.com>
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */

defined('BASEPATH') or exit("No direct script access allowed.");

class Logout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// 
		$this->load->library('session');
	}

	/**
	 * Logout user
	 * 
	 * @return [type] [description]
	 */
	public function index()
	{	
		// Destroy all session
		$this->session->sess_destroy();

		// Redirect to Login page
		redirect('users/login');
	}
}

?>