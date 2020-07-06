<?php 
/**
 * Invoicing
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed.');

class Invoice extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');

		$this->load->model(array('orders/sales_model')); 
    }

    public function index()
	{
		$page['title']       = "Invoices"; 
		$page['description'] = "Create and manage invoices."; 

		$this->load->view('orders/inv_view', $page); 
	}

	/**
	 * View create invoice page
	 *
	 * @return void
	 */
	public function view_create_inv()
	{
		$page['title']       = "Create Invoice"; 
		$page['description'] = "Create new invoice for customer."; 

		$this->load->view('orders/inv_create_view.php', $page); 
	}
}
