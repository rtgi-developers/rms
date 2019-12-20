<?php  
defined('BASEPATH') OR exit("No direct script access allowed");

/**
 * Dashboard
 *
 * @package 	CI
 * @subpackage 	Controller 
 * @author 		MD TARIQUE ANWER mtarique@outlook.com
 */
class Dashboard extends CI_controller
{	
	/**
	 * Construtor method
	 */
	public function __construct()
	{
		parent::__construct();

		// Load library
		$this->load->library(array('session'));

		// Check for active session
		if(!$this->session->tempdata('_username'))
		{
			// Redirect to session expired page
			redirect('errors/session_error');
		}
	}

	/**
	 * Loads dashboard page
	 * 
	 * @return [type] [description]
	 */
	public function index()
	{
		// Page data array
		$page['title'] = "Dashboard";
		$page['description'] = "";

		// Load view
		$this->load->view('home/dashboard_view', $page);
	}
}