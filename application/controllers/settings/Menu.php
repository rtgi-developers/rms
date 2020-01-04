<?php  
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * Settings Menu
 * 
 * @package CI
 * @subpackage Contoller
 * @author MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Menu extends CI_Controller
{	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');
	}

	/**
	 * Loads menu page 
	 * 
	 * @return [type] [description]
	 */
	public function index()
	{	
		$page['title'] = "Settings";
		$page['description'] = "Manage system administrative settings.";

		$this->load->view('settings/menu_view', $page);
	}
}

?>