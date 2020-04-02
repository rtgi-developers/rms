<?php 
/**
 * Customers
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed.');

class Customers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');

		$this->load->model(array('contacts/customers_model')); 
	}

	/**
	 * View customers page default method 
	 *
	 * @return void
	 */
	public function index()
	{
		$page['title']       = "Customers"; 
		$page['description'] = "Manage all customers."; 

		$this->load->view('contacts/cust_view', $page); 
	}
	
	/**
	 * View create customer page 
	 *
	 * @return void
	 */
	public function view_create_cust()
	{	
		$page['title']       = "Create Customer"; 
		$page['description'] = "Add or create new customer"; 

		$this->load->view('contacts/cust_create_view', $page); 
	}

	/**
	 * Create customer
	 *
	 * @return void
	 */
	public function create_cust()
	{
		// Set validation rules
		$this->form_validation->set_rules('txtCustName', 'Customer Name', 'required'); 
		$this->form_validation->set_rules('txtCustWebsite', 'Customer Website', 'valid_url'); 
		$this->form_validation->set_rules('txtCustEmail1', 'Customer Email 1', 'required|valid_email');
		$this->form_validation->set_rules('txtCustEmail2', 'Customer Email 2', 'valid_email');
		$this->form_validation->set_rules('txtCustPhone1', 'Customer Phone 1', 'required');

		// Validate user inputs
		if($this->form_validation->run() == true)
		{
			$cust_data['cust_name']        = $this->input->post('txtCustName');
			$cust_data['cust_website']     = $this->input->post('txtCustWebsite');
			$cust_data['cust_email_1']     = $this->input->post('txtCustEmail1');
			$cust_data['cust_email_2']     = $this->input->post('txtCustEmail2');
			$cust_data['cust_phone_1']     = $this->input->post('txtCustPhone1');
			$cust_data['cust_phone_2']     = $this->input->post('txtCustPhone2');
			$cust_data['cust_addr_1']      = $this->input->post('txtCustAddr1');
			$cust_data['cust_addr_2']      = $this->input->post('txtCustAddr2');
			$cust_data['cust_city']        = $this->input->post('txtCustCity');	
			$cust_data['cust_state']       = $this->input->post('txtCustState');	
			$cust_data['cust_postal_code'] = $this->input->post('txtCustPostalCode');
			$cust_data['cust_country']     = $this->input->post('txtCustCountry');
			$cust_data['cust_comment']     = $this->input->post('txtCustComment');
			$cust_data['cust_created_on']  = date('Y-m-d H: i: s'); 

			// Query to insert customer data
			$result = $this->customers_model->insert_cust($cust_data); 

			// Query result
			if($result['status'] == 'success')
			{
				$html = '
					<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
						<strong>Done!</strong> '.$result['data'].'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				';

				$json_data['status'] = 'success'; 
				$json_data['title']  = 'Created!'; 
				$json_data['data'] = $html; 
			}
			else {
				$html = '
					<div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
						<strong>Oops!</strong> '.$result['data'].'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				';

				$json_data['status'] = 'error'; 
				$json_data['title']  = 'Oops!'; 
				$json_data['data'] = $html; 
			}
		}
		else {
			$html = '
				<div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
					<strong>Oops!</strong> '.validation_errors().'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			';

			$json_data['status'] = 'error'; 
			$json_data['title']  = 'Oops!'; 
			$json_data['data'] = $html; 
		}

		// Send json encoded response 
		echo json_encode($json_data); 
	}
}