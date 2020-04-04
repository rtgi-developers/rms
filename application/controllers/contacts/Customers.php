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
			$cust_data['cust_pymt_terms']  = $this->input->post('txtCustPymtTerms');
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

	public function get_cust_serverside()
	{
		// Columns
		$columns = array(
			0 => 'cust_id', 
			1 => 'cust_name', 
			2 => 'cust_email_1', 
			3 => 'cust_phone_1',  
			4 => ''
		);	

		// Post data
		$limit  = $this->input->post('length');
		$start  = $this->input->post('start');
		$order  = $columns[$this->input->post('order')[0]['column']];
		$dir    = $this->input->post('order')[0]['dir'];
		$key    = $this->input->post('search')['value'];

		// Get number of total and filtered
		$total_data = $this->customers_model->count_all_cust();
		$total_filtered = $total_data;

		// Query based on searched and non-searched keyword
		if(empty($key))
		{	
			// Query to get all customers
			$result = $this->customers_model->get_all_cust($limit,$start,$order,$dir);
		}
		else {	
			// Query to get searched customers
			$result = $this->customers_model->get_search_cust($limit,$start,$key,$order,$dir);
			$total_filtered = $this->customers_model->count_search_cust($key);
		}

		//  Declare an empty array to hold td values
		$data = array();

		// Non empty query result
		if(!empty($result))
		{
			// Loop through query result
			foreach($result as $row)
			{	
				// Customer name and website
				if($row->cust_website != null)
				{
					$cust_name = '
						<a href="'.$row->cust_website.'" target="_blank" class="text-decoration-none text-nowrap">'.$row->cust_name.'</a>
					';
				}
				else $cust_name = $row->cust_name; 
					
				// Format customer phone
				$cust_phone = $row->cust_phone_1; 
				if($row->cust_phone_2 != "") $cust_phone .= "<br>".$row->cust_phone_2; 

				// Format customer email
				$cust_email = '<a href="mailto:'.$row->cust_email_1.'" target="_blank" class="text-decoration-none text-nowrap">'.$row->cust_email_1.'</a>'; 
				if($row->cust_email_2 != "") $cust_email .= '<br><a href="mailto:'.$row->cust_email_2.'" target="_blank" class="text-decoration-none text-nowrap">'.$row->cust_email_2.'</a>'; 

				// Data to be nested inside data array
				$nestedData[0] = $row->cust_id;
				$nestedData[1] = $cust_name;
				$nestedData[2] = $cust_email;
				$nestedData[3] = $cust_phone;
				$nestedData[4] = '
					<div class="d-flex flex-row">	
						<a href="'.base_url('contacts/customers/view_cust_addr?custid='.$row->cust_id.'&custname='.$row->cust_name).'"
							class="px-2 text-decoration-none lnk-cust-addr text-primary"
							title="Manage addresses">
							<i class="las la-address-book la-2x"></i>
						</a>
						<a href="'.base_url('items/products/view_edit_prod?prodid='.$row->cust_id).'"
							class="px-2 text-decoration-none lnk-edit-prod text-primary"
							title="Edit Product">
							<i class="las la-pencil-alt la-lg"></i>
						</a>	
						<a href="#" 
							class="px-2 text-decoration-none lnk-del-prod text-danger" 
							title="Delete Product" 
							prod-id="'.$row->cust_id.'">
							<i class="las la-trash la-lg"></i>
						</a>
					</div>
				';

				// Add nested data elements to data array
				$data[] = $nestedData;
			}
		}
		
		// Get data into array
		$json_data = array(
			"success" 		  => true, 
			"type"    		  => 'success',
			"title"   		  => 'Customers Table',
			"draw"            => intval($this->input->post('draw')),  
			"recordsTotal"    => intval($total_data),  
			"recordsFiltered" => intval($total_filtered), 
			"data"            => $data   
		);

        // Send json encoded response
        echo json_encode($json_data);
	}

	/**
	 * View manage customers page
	 *
	 * @return void
	 */
	public function view_cust_addr()
	{
		$page['title']       = "Customer Addresses"; 
		$page['description'] = "Manage customer's billing and shipping addresses."; 
		$page['cust_id']	 = $this->input->get('custid'); 
		$page['cust_name']   = $this->input->get('custname');
		$page['cust_addr_table'] = $this->get_cust_addr_table($this->input->get('custid')); 

		$this->load->view('contacts/cust_addr_view', $page);
	}

	/**
	 * Get customer address table rows
	 *
	 * @param 	integer 	$cust_id	Customer id
	 * @return 	void
	 */
	public function get_cust_addr_table($cust_id)
	{	
		$html = '';

		$result = $this->customers_model->get_cust_addr($cust_id); 

		if(!empty($result))
		{
			foreach($result as $row)
			{	
				// Format customer address
				$cust_addr = $row->cust_addr_1.",<br>"; 
				if($row->cust_addr_2 != "") $cust_addr .= $row->cust_addr_2.",<br>"; 	
				$cust_addr .= $row->cust_city.", ";
				$cust_addr .= $row->cust_state." ";
				$cust_addr .= $row->cust_postal_code."<br>";
				$cust_addr .= $row->cust_country;

				$html .= '
					<tr>
						<td class="align-middle text-nowrap text-left w-75">'.$cust_addr.'</td>
						<td class="align-middle text-center">
							<a href="#" class="text-decoration-none lnk-del-cust-addr" data-toggle="tooltip" data-placement="bottom" data-html="false" title="Delete address" cust-id="'.$row->cust_id.'" cust-addr-id="'.$row->cust_addr_id.'">
								<i class="las la-trash la-lg text-danger"></i>
							</a>
						</td>
					</tr>
				';
			}
		}
		else {
			$html .= '
				<tr>
					<td class="align-middle text-nowrap font-weight-bold text-center w-100" colspan="4">No address found for this customer, please add one.</td>
				</tr>
			';
		}

		return $html;
	}

	/**
	 * Add customer address
	 *
	 * @return void
	 */
	public function add_cust_addr()
	{
		// Form validation rules
		$this->form_validation->set_rules('txtCustId', 'Customer Id', 'required'); 
		$this->form_validation->set_rules('txtCustAddr1', 'Address Line 1', 'required');
		$this->form_validation->set_rules('txtCustCity', 'City', 'required');
		$this->form_validation->set_rules('txtCustState', 'State', 'required');
		$this->form_validation->set_rules('txtCustPostalCode', 'Postal Code', 'required');
		$this->form_validation->set_rules('txtCustCountry', 'Country', 'required'); 

		// Validate user inputs
		if($this->form_validation->run() == true)
		{	
			$addr_data['cust_id']          = $this->input->post('txtCustId');
			$addr_data['cust_addr_1']      = $this->input->post('txtCustAddr1');
			$addr_data['cust_addr_2']      = $this->input->post('txtCustAddr2'); 
			$addr_data['cust_city']        = $this->input->post('txtCustCity'); 
			$addr_data['cust_state']       = $this->input->post('txtCustState');  
			$addr_data['cust_postal_code'] = $this->input->post('txtCustPostalCode');  
			$addr_data['cust_country']     = $this->input->post('txtCustCountry');  

			$result = $this->customers_model->insert_cust_addr($addr_data); 

			if($result['status'] == true)
			{	

				// Format customer address
				$cust_addr = $addr_data['cust_addr_1'].",<br>"; 
				if($addr_data['cust_addr_2'] != "") $cust_addr .= $addr_data['cust_addr_2'].",<br>"; 	
				$cust_addr .= $addr_data['cust_city'].", ";
				$cust_addr .= $addr_data['cust_state']." ";
				$cust_addr .= $addr_data['cust_postal_code']."<br>";
				$cust_addr .= $addr_data['cust_country'];  

				$html = '
					<tr class="table-success">
						<td class="align-middle text-nowrap text-left w-75">'.$cust_addr.'</td>
						<td class="align-middle text-center">
							<a href="#" class="text-decoration-none lnk-del-cust-addr" data-toggle="tooltip" data-placement="bottom" data-html="false" title="Delete address" cust-id="'.$addr_data['cust_id'].'" cust-addr-id="'.$result['addr_id'].'">
								<i class="las la-trash la-lg text-danger"></i>
							</a>
						</td>
					</tr>
				';

				$json_data['status'] = 'success'; 
				$json_data['title']  = "Added!"; 
				$json_data['data']   = $html; 
			}
			else {
				$html = '
					<tr class="table-danger">
						<td class="align-middle text-center" colspan="4">
							'.$result['data'].'
						</td>
					</tr>
				';

				$json_data['status'] = 'error'; 
				$json_data['title']  = 'Oops!';
				$json_data['data']   = $result['data'];
			}
		}
		else {
			$json_data['status'] = 'error'; 
			$json_data['title']  = 'Oops!';
			$json_data['data']   = validation_errors();
		}

		echo json_encode($json_data); 
	}

	/**
	 * Delete customer address
	 *
	 * @return void
	 */
	public function delete_cust_addr()
	{
		$cust_id = $this->input->get('custid'); 
		$cust_addr_id = $this->input->get('custaddrid');

		// Call model for query to delete notification 
		$result = $this->customers_model->delete_cust_addr($cust_addr_id, $cust_id);

		// Query response 
		if($result['status'] == true) 
		{
			$json_data = array(
				'status' => 'success', 
				'title'  => 'Deleted!', 
				'data'   => $result['data']
			);
		}
		else {
			$json_data = array(
				'status' => 'error', 
				'title'  => 'Oops!', 
				'data'   => $result['data']
			);
		}

		// Send json encoded response
		echo json_encode($json_data);
	}
}