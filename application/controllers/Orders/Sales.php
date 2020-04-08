<?php 
/**
 * Sales orders
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed.');

class Sales extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');

		//$this->load->model(array('contacts/customers_model')); 
	}

	/**
	 * View customers page default method 
	 *
	 * @return void
	 */
	public function index()
	{
		$page['title']       = "Sales Orders"; 
		$page['description'] = "Manage all sales orders."; 

		$this->load->view('orders/sales_view', $page); 
    }
}
?>
