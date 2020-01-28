<?php  
defined('BASEPATH') OR exit("No direct script access allowed");

/**
 * Errors
 *
 * @package 	CI
 * @subpackage 	Controller 
 * @author 		MD TARIQUE ANWER mtarique@outlook.com
 */
class Errors extends CI_controller
{	
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Loads javascript error page
	 * 
	 * @return [type] [description]
	 */
	public function js_error()
	{
		// Page data array
		$page['title']       = "Javascript Error";
		$page['description'] = "";

		// Load view
		$this->load->view('errors/custom/error_js', $page);
	}

	/**
	 * Loads session error page
	 * 
	 * @return [type] [description]
	 */
	public function session_error()
	{
		// Page data
		$page['title']       = "Session expired";
		$page['description'] = "";

		// Load view
		$this->load->view('errors/custom/error_session', $page);	
	}

	/**
	 * Loads permission error page
	 * 
	 * @return [type] [description]
	 */
	public function perms_error($errormsg = null)
	{
		// Page data
		$page['title']       = "Access Denied!";
		$page['description'] = "";

		if(isset($errormsg)) $page['errormsg'] = $errormsg;

		// Load view
		$this->load->view('errors/custom/error_perms', $page);
	}
}

?>