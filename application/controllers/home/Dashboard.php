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

		// Load helpers
		$this->load->helper('auth_helper');
	}

	/**
	 * Loads dashboard page
	 * 
	 * @return [html] [Loads dashboard view page]
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