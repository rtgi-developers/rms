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
		$this->form_validation->set_rules('txtCustEmail1', 'Customer Email 1', 'valid_email');
		$this->form_validation->set_rules('txtCustEmail2', 'Customer Email 2', 'valid_email');
		$this->form_validation->set_rules('txtCustDefCurr', 'Default Currency', 'required');

		// Validate user inputs
		if($this->form_validation->run() == true)
		{
			$cust_data['cust_name']        = $this->input->post('txtCustName');
			$cust_data['cust_website']     = $this->input->post('txtCustWebsite');
			$cust_data['cust_email_1']     = $this->input->post('txtCustEmail1');
			$cust_data['cust_email_2']     = $this->input->post('txtCustEmail2');
			$cust_data['cust_phone_1']     = $this->input->post('txtCustPhone1');
			$cust_data['cust_phone_2']     = $this->input->post('txtCustPhone2');
			$cust_data['cust_def_curr']    = $this->input->post('txtCustDefCurr');
			$cust_data['cust_comment']     = $this->input->post('txtCustComment');
			$cust_data['cust_created_on']  = date('Y-m-d H: i: s'); 
			$cust_data['cust_modified_on'] = date('Y-m-d H: i: s'); 

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

	/**
	 * Get customer options for select or datalist
	 *
	 * @return void
	 */
    public function get_cust_options_by_search()
    {
        $keyword = $this->input->get('keyword'); 

        $result = $this->customers_model->get_cust_by_search($keyword); 

        $cust_options = '';

        if(!empty($result))
        {
            foreach($result as $row)
            {    
				$cust = '['.$row['cust_id'].'] '.$row['cust_name']; 

                $cust_options .=  '<option value="'.$cust.'"></option>';
			}	
        }
		
		echo $cust_options; 
	}

	/**
	 * Get customers select options
	 *
	 * @return void
	 */
	public function get_cust_options()
    {
        $result = $this->customers_model->get_cust(); 

        $cust_options = '<option value>Select customer...</option>	';

        if($result['status'] == true)
        {
            foreach($result['data'] as $row)
            {    
				$cust = '['.$row['cust_id'].'] '.$row['cust_name']; 

                $cust_options .=  '<option value="'.$row['cust_id'].'">'.$cust.'</option>';
			}	
        }
		
		echo $cust_options; 
	}

	/**
	 * Get customers address options
	 *
	 * @return void
	 */
	public function get_cust_addr_options()
	{	
		// Customer id
		$cust_id = $this->input->get('custid'); 

		// Customer address html options
		$cust_addr_options = '<option value>Select address...</option>';

		// Query to get customer address
		$result = $this->customers_model->get_cust_addr($cust_id); 

		// Check empty query response
		if(!empty($result))
		{	
			foreach($result as $row)
			{   
				// Format customer address  
				$cust_addr = "[".$row->cust_addr_id."] "; 
				$cust_addr .= $row->cust_addr_1.", "; 
				if($row->cust_addr_2 != "") $cust_addr .= $row->cust_addr_2.", "; 	
				$cust_addr .= $row->cust_city.", ";
				$cust_addr .= $row->cust_state." ";
				$cust_addr .= $row->cust_postal_code.", ";
				$cust_addr .= $row->cust_country;

				$cust_addr_options .=  '<option value="'.$row->cust_addr_id.'">'.$cust_addr.'</option>';
			}	
		}
		
		echo $cust_addr_options;
	}

	/**
	 * Get customers datatable using server side processing
	 *
	 * @return void
	 */
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
					<div class="d-flex flex-row justify-content-center">	
						<a href="'.base_url('contacts/customers/view_cust_addr?custid='.$row->cust_id.'&custname='.$row->cust_name).'"
							class="px-2 text-decoration-none lnk-cust-addr text-info"
							title="Manage customer address">
							<i class="las la-address-book la-lg"></i>
						</a>
						<a href="'.base_url('contacts/customers/view_edit_cust?custid='.$row->cust_id).'"
							class="px-2 text-decoration-none lnk-edit-prod text-primary"
							title="Edit customer">
							<i class="las la-pencil-alt la-lg"></i>
						</a>	
						<a href="#" 
							class="px-2 text-decoration-none lnk-del-cust text-danger" 
							title="Delete customer" 
							cust-id="'.$row->cust_id.'">
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
	 * View edit customer page 
	 *
	 * @return void
	 */
	public function view_edit_cust()
	{	
		$page['title']          = "Edit Customer"; 
		$page['description']    = "Edit customer details."; 
		$page['cust_id']        = $this->input->get('custid'); 
		$page['form_edit_cust'] = $this->show_edit_cust_form($this->input->get('custid'));

		$this->load->view('contacts/cust_edit_view', $page); 
	}

	/**
	 * Show edit customer form
	 *
	 * @param 	integer 	$cust_id 	Customer id
	 * @return 	void
	 */
	public function show_edit_cust_form($cust_id)
	{	
		// Queru to get customer by id
		$result = $this->customers_model->get_cust($cust_id); 

		// Validate query result
		if($result['status'] == true)
		{
			$html = '
				<div class="card rounded-0">
					<div class="card-body">
						<form id="formEditCust">
							<div class="form-row">
								<div class="form-group col-md-3 content-hide">
									<label for="txtEditCustId" class="font-weight-bold req-after">Customer Id</label>
									<input type="text" name="txtEditCustId" id="txtEditCustId" class="form-control form-control-sm" value="'.$cust_id.'" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="txtEditCustName" class="font-weight-bold req-after">Customer Name</label>
									<input type="text" name="txtEditCustName" id="txtEditCustName" class="form-control form-control-sm" value="'.$result['data'][0]['cust_name'].'" required>
								</div>
								<div class="form-group col-md-6">
									<label for="txtEditCustWebsite" class="font-weight-bold">Website</label>
									<input type="url" name="txtEditCustWebsite" id="txtEditCustWebsite" class="form-control form-control-sm" placeholder="https://example.com" value="'.$result['data'][0]['cust_website'].'">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="txtEditCustEmail1" class="font-weight-bold">Email 1</label>
									<input type="email" name="txtEditCustEmail1" id="txtEditCustEmail1" class="form-control form-control-sm" placeholder="email_1@example.com" value="'.$result['data'][0]['cust_email_1'].'">
								</div>
								<div class="form-group col-md-3">
									<label for="txtEditCustEmail2" class="font-weight-bold">Email 2</label>
									<input type="email" name="txtEditCustEmail2" id="txtEditCustEmail2" class="form-control form-control-sm" placeholder="email_2@example.com" value="'.$result['data'][0]['cust_email_2'].'">
								</div>
								<div class="form-group col-md-3">
									<label for="txtEditCustPhone1" class="font-weight-bold">Phone 1</label>
									<input type="tel" name="txtEditCustPhone1" id="txtEditCustPhone1" class="form-control form-control-sm" value="'.$result['data'][0]['cust_phone_1'].'">
								</div>
								<div class="form-group col-md-3">
									<label for="txtEditCustPhone2" class="font-weight-bold">Phone 2</label>
									<input type="tel" name="txtEditCustPhone2" id="txtEditCustPhone2" class="form-control form-control-sm" value="'.$result['data'][0]['cust_phone_2'].'">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="txtEditCustDefCurr" class="font-weight-bold req-after">Default Currency</label>
									<select name="txtEditCustDefCurr" id="txtEditCustDefCurr" class="custom-select custom-select-sm" required>
										<option value>Currency</option>
										'.get_curr_options($result['data'][0]['cust_def_curr']).'
									</select>
								</div>
								<div class="form-group col-md-9">
									<label for="txtEditCustComment" class="font-weight-bold">Comment</label>
									<div class="d-flex flex-row">
										<input type="text" name="txtEditCustComment" id="txtEditCustComment" class="form-control form-control-sm col-md-8" value="'.$result['data'][0]['cust_comment'].'">
										<div class="col-md-4">
											<button type="submit" id="btnSaveCustChanges" class="btn btn-sm btn-primary">Save Changes</button>
											<a href="javascript: history.back();" class="btn btn-sm btn-secondary">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			';
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
		}

		return $html; 
	}

	/**
	 * Save customer changes 
	 *
	 * @return void
	 */
	public function save_cust_changes()
	{
		// Set validation rules
		$this->form_validation->set_rules('txtEditCustId', 'Customer Id', 'required');
		$this->form_validation->set_rules('txtEditCustName', 'Customer Name', 'required'); 
		$this->form_validation->set_rules('txtEditCustWebsite', 'Customer Website', 'valid_url'); 
		$this->form_validation->set_rules('txtEditCustEmail1', 'Customer Email 1', 'valid_email');
		$this->form_validation->set_rules('txtEditCustEmail2', 'Customer Email 2', 'valid_email');
		$this->form_validation->set_rules('txtEditCustDefCurr', 'Default Currency', 'required');

		// Validate user inputs
		if($this->form_validation->run() == true)
		{	
			/// Customer id
			$cust_id = $this->input->post('txtEditCustId'); 

			// Customer data
			$cust_data['cust_name']        = $this->input->post('txtEditCustName');
			$cust_data['cust_website']     = $this->input->post('txtEditCustWebsite');
			$cust_data['cust_email_1']     = $this->input->post('txtEditCustEmail1');
			$cust_data['cust_email_2']     = $this->input->post('txtEditCustEmail2');
			$cust_data['cust_phone_1']     = $this->input->post('txtEditCustPhone1');
			$cust_data['cust_phone_2']     = $this->input->post('txtEditCustPhone2');
			$cust_data['cust_def_curr']    = $this->input->post('txtEditCustDefCurr');
			$cust_data['cust_comment']     = $this->input->post('txtEditCustComment');
			$cust_data['cust_modified_on'] = date('Y-m-d H: i: s'); 

			// Query to update customer changes
			$result = $this->customers_model->update_cust($cust_id, $cust_data); 

			// Query result
			if($result['status'] == 'success')
			{
				$html = '
					<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
						<strong>Updated!</strong> '.$result['data'].'
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				';

				$json_data['status'] = 'success'; 
				$json_data['title']  = 'Updated!'; 
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

	/**
	 * Delete customer
	 *
	 * @return void
	 */
	public function delete_cust()
	{	
		// Get customer id
		$cust_id = $this->input->get('custid'); 

		// Query to delete customer 
		$result = $this->customers_model->delete_cust($cust_id);
		
		// Validate query result 
		if($result['status'] == true)
		{
			$json_data['status'] = 'success'; 
			$json_data['title']  = 'Deleted!'; 
			$json_data['data']   = $result['data']; 
		}
		else {
			$json_data['status'] = 'error';
			$json_data['title']  = 'Oops!'; 
			$json_data['data']   = $result['data']; 
		}

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