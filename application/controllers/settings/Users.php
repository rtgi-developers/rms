<?php  
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * Users settings
 * 
 * @package CI
 * @subpackage Contoller
 * @author MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Users extends CI_Controller
{	
	/**
	 * Constructor function
	 */
	public function __construct()
	{
		parent::__construct();

		// Load helpers
		$this->load->helper('auth_helper');
	}

	/**
	 * Users settings page 
	 * 
	 * @return [boject] [Users view page]
	 */
	public function index()
	{
		$page['title'] = "Users";
		$page['description'] = "Use permission manager to grant access rights to other users.";

		$this->load->view('settings/users_view', $page);
	}
}

?>