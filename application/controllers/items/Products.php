<?php 
defined('BASEPATH') or exit('No direct script access allowed.');

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');
	}

	public function index()
	{
		$page['title'] = "Products";
		$page['description'] = "Add, edit or delete products.";

		$this->load->view('item/products_view.php');
	}
}


?>