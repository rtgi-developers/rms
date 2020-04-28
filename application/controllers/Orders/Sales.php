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

		$this->load->model(array('orders/sales_model')); 
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

		$this->load->view('orders/so_view', $page); 
	}

	/**
	 * View create sales order page
	 *
	 * @return void
	 */
	public function view_create_so()
	{
		$page['title']       = "Create Sales Order"; 
		$page['description'] = "Create new sales order for customer."; 

		$this->load->view('orders/so_create_view.php', $page); 
	}

	/**
	 * Create sales order
	 *
	 * @return void
	 */
	public function add_so_header()
	{
		// Set form validation rules 
		$this->form_validation->set_rules('txtCust', 'Customer', 'required');
		$this->form_validation->set_rules('txtBillAddrId', 'Billing Address', 'required'); 
		$this->form_validation->set_rules('txtShipAddrId', 'Shipping Address', 'required'); 
		$this->form_validation->set_rules('txtCustPO', 'Customer PO', 'required'); 
		$this->form_validation->set_rules('txtOrderDate', 'Order Date', 'required'); 
		$this->form_validation->set_rules('txtCancelDate', 'Cancel Date', 'required'); 
		$this->form_validation->set_rules('txtCurrCode', 'Currency', 'required'); 
		
		// Validate
		if($this->form_validation->run() == true)
		{	
			$customer = preg_match('/\\[(.+?)\\]/', $this->input->post('txtCust'), $match); 

			$cust_id = $match[1]; 

			// Form inputs
			$so_header['cust_id']      = $cust_id; 
			$so_header['bill_addr_id'] = $this->input->post('txtBillAddrId'); 
			$so_header['ship_addr_id'] = $this->input->post('txtShipAddrId'); 
			$so_header['cust_po']      = $this->input->post('txtCustPO'); 
			$so_header['order_date']   = date('Y-m-d', strtotime($this->input->post('txtOrderDate'))); 
			$so_header['cancel_date']  = date('Y-m-d', strtotime($this->input->post('txtCancelDate'))); 
			$so_header['ship_method']  = $this->input->post('txtShipMethod'); 
			$so_header['pymt_terms']   = $this->input->post('txtPymtTerms'); 
			$so_header['curr_code']    = $this->input->post('txtCurrCode'); 
			$so_header['date_created'] = date('Y-m-d');  
			$so_header['date_updated'] = date('Y-m-d');  
			$so_header['so_status']    = 'OPEN';
			
			// Query to insert sale order form data
			$result = $this->sales_model->insert_so_header($so_header);
			
			// Validate query response
			if($result['status'] == 'success')
			{
				$json_data['status'] = 'success';
				$json_data['so_id']  = $result['data'];  	
			}
			else {
				$json_data['status']  = 'error';
				$json_data['message'] = $result['data'];
			}
		}
		else {
			$json_data['status']  = 'error';
			$json_data['message'] = validation_errors();   
		}

		// Send json encoded response
		echo json_encode($json_data); 
	}

	/**
	 * Sales order details
	 *
	 * @return void
	 */
	public function add_so_details()
	{
		// Set form validation rules 
		$this->form_validation->set_rules('txtSoId', 'Sales Order Id', 'required');
		$this->form_validation->set_rules('txtProd', 'Customer', 'required');
		$this->form_validation->set_rules('txtProdQty', 'Quantity', 'required'); 
		$this->form_validation->set_rules('txtProdPrice', 'Price per unit', 'required');
		
		if($this->form_validation->run() == true)
		{
			$product = preg_match('/\\[(.+?)\\]/', $this->input->post('txtProd'), $match); 
			$prod_id = $match[1]; 

			$so_details['so_id']      = $this->input->post('txtSoId'); 
			$so_details['prod_id']    = $prod_id; 
			$so_details['prod_qty_ord']   = $this->input->post('txtProdQty');
			$so_details['prod_qty_shp']   = 0; 
			$so_details['prod_price'] = $this->input->post('txtProdPrice'); 

			// Query insert SO product details
			$result = $this->sales_model->insert_so_details($so_details); 

			// Validate query response
			if($result['status'] == 'success')
			{
				$html = '
					<tr>
						<td class="align-middle text-nowrap small p-0 w-50">
							<input type="text" name="txtEditSoId" id="txtEditSoId" value="'.$so_details['so_id'].'" class="form-control form-control-sm border-0 rounded-0 content-hide" required>
							<input type="search" list="listProd" name="txtEditProd" id="txtEditProd" value="'.$this->input->post('txtProd').'" class="form-control form-control-sm border-0 rounded-0" placeholder="Search and select product by name, color and id." required>   
							<datalist id="listProd"></datalist>
						</td>
						<td class="align-middle text-nowrap small p-0">
							<div class="input-group border-0">
								<input type="number" step="any" name="txtEditProdQty" id="txtEditProdQty" value="'.$so_details['prod_qty_ord'].'" class="form-control form-control-sm border-0 rounded-0 text-right" required>  
								<input type="text" name="txtEditProdQtyUOM" id="txtEditProdQtyUOM" value="'.$this->input->post('txtProdQtyUOM').'" class="form-control form-control-sm border-0 rounded-0 px-0 text-center text-prod-uom" placeholder="UOM" readonly>
							</div>
						</td>
						<td class="align-middle text-nowrap small p-0">
							<div class="input-group border-0">
								<input type="number" step="any" name="txtEditProdPrice" id="txtEditProdPrice" value="'.$so_details['prod_price'].'" class="form-control form-control-sm border-0 rounded-0 text-right" required>  
								<input type="text" name="txtEditProdPriceCurr" id="txtEditProdPriceCurr" value="'.$this->input->post('txtProdPriceCurr').'" class="form-control form-control-sm border-0 rounded-0 px-0 text-center" placeholder="CURR" readonly>
							</div>    
						</td>
						<td class="align-middle text-nowrap small p-0">
							<div class="input-group border-0">
								<input type="number" step="any" name="txtEditTotalPrice" id="txtEditTotalPrice" value="'.round($so_details['prod_qty_ord']*$so_details['prod_price'], 2).'" class="form-control form-control-sm border-0 rounded-0 text-right" readonly>  
								<input type="text" name="txtEditTotalPriceCurr" id="txtEditTotalPriceCurr" value="'.$this->input->post('txtTotalPriceCurr').'" class="form-control form-control-sm border-0 rounded-0 px-0 text-center" placeholder="CURR" readonly>
							</div>    
						</td>
						<td class="align-middle text-nowrap small p-0">
							<button type="button" class="btn btn-sm btn-link text-center text-danger btn-del-so-prod" title="Delete this product from sales order"><i class="fas fa-trash lalg"></i></button>
						</td>
					</tr>
				';

				$inserted_row = '
					<tr>
						<td class="align-middle text-nowrap small">
							'.$this->input->post('txtProd').'
						</td>
						<td class="align-middle text-nowrap small px-1 py-0">
                            <div class="d-flex flex-row justify-content-end">
                                <span id="txtDispProdQty" class="pr-1">'.$so_details['prod_qty_ord'].'</span>
                                <span class="text-prod-qty-uom">'.$this->input->post('txtProdQtyUOM').'</span>
                            </div>
						</td>
						<td class="align-middle text-nowrap small py-0">
                            <div class="d-flex flex-row justify-content-end">
                                <span id="txtDispProdPrice" class="pr-1">'.$so_details['prod_price'].'</span>
                                <span class="text-prod-qty-uom">'.$this->input->post('txtProdPriceCurr').'</span>
                            </div>
						</td>
						<td class="align-middle text-nowrap small py-0">
                            <div class="d-flex flex-row justify-content-end">
                                <span id="txtDispTotalPrice" class="pr-1">'.round($so_details['prod_qty_ord']*$so_details['prod_price'], 2).'</span>
                                <span class="text-prod-qty-uom">'.$this->input->post('txtTotalPriceCurr').'</span>
                            </div>
						</td>	
						<td class="align-middle text-nowrap small p-0 justify-content-center">
							<button type="button" class="btn btn-sm btn-link text-center text-danger btn-del-so-prod" so-id="'.$so_details['so_id'].'" prod-id="'.$so_details['prod_id'].'" title="Delete this product from sales order">
								<i class="fas fa-trash lalg"></i>
							</button>
						</td>				
					</tr>
				';

				$json_data['status'] = 'success';
				$json_data['message']  = $inserted_row;  	
			}
			else {
				$json_data['status']  = 'error';
				$json_data['message'] = $result['data'];
			}
		}
		else {
			$json_data['status']  = 'error';
			$json_data['message'] = validation_errors(); 
		}

		// Send json encoded response
		echo json_encode($json_data); 
	}

	/**
	 * Delete sales order product
	 *
	 * @return void
	 */
	public function delete_so_prod()
	{	
		$so_id = $this->input->get('soid'); 
		$prod_id = $this->input->get('prodid');
		
		$result = $this->sales_model->delete_so_prod($so_id, $prod_id);

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

	/**
	 * Get sales orders datatable using server side processing
	 *
	 * @return void
	 */
	public function get_so_serverside()
	{
		// Columns
		$columns = array(
			0 => 'so_id', 
			1 => 'cust_name', 
			2 => 'cust_po', 
			3 => 'order_date',  
			4 => 'cancel_date', 
			5 => 'so_status', 
			6 => '', 
			7 => ''
		);	

		// Post data
		$limit  = $this->input->post('length');
		$start  = $this->input->post('start');
		$order  = $columns[$this->input->post('order')[0]['column']];
		$dir    = $this->input->post('order')[0]['dir'];
		$key    = $this->input->post('search')['value'];

		// Get number of total and filtered
		$total_data = $this->sales_model->count_all_so();
		$total_filtered = $total_data;

		// Query based on searched and non-searched keyword
		if(empty($key))
		{	
			// Query to get all customers
			$result = $this->sales_model->get_all_so($limit,$start,$order,$dir);
		}
		else {	
			// Query to get searched customers
			$result = $this->sales_model->get_search_so($limit,$start,$key,$order,$dir);
			$total_filtered = $this->sales_model->count_search_so($key);
		}

		//  Declare an empty array to hold td values
		$data = array();

		// Non empty query result
		if(!empty($result))
		{
			// Loop through query result
			foreach($result as $row)
			{	
				$ready_to_ship_pct = rand(1, 100); 
				// Data to be nested inside data array
				$nestedData[0] = $this->config->item('SALES_ORDER')."-".str_pad($row->so_id, 5, 0, STR_PAD_LEFT);
				$nestedData[1] = $row->cust_name;
				$nestedData[2] = $row->cust_po;
				$nestedData[3] = $row->order_date;
				$nestedData[4] = $row->cancel_date; 
				$nestedData[5] = $row->so_status; 
				$nestedData[6] = '
					<div class="progress rounded-0" style="height:12px;">
						<div class="progress-bar progress-barstriped bg-success small" role="progressbar" style="width: '.$ready_to_ship_pct.'%" aria-valuenow="'.$ready_to_ship_pct.'" aria-valuemin="0" aria-valuemax="100">'.$ready_to_ship_pct.'%</div>
					</div>
				'; 
				
				$nestedData[7] = '
					<div class="d-flex flex-row justify-content-center dropdown">
						<a href="'.base_url().'"
							class="px-2 text-decoration-none lnk-cust-addr text-secondary"
							title="Print order"
							data-toggle="dropdown" 
							aria-haspopup="true" 
							aria-expanded="false">
							<i class="fas fa-ellipsis-h"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right animated slideIn rounded-0" aria-labelledby="dropdownMenuButton">
							<a href="'.base_url().'"
								class="px-2 text-decoration-none lnk-cust-addr text-secondary dropdown-item">
								<i class="las la-print la-lg"></i> Print order
							</a>	
							<a href="'.base_url().'"
								class="px-2 text-decoration-none lnk-cust-addr text-secondary dropdown-item">
								<i class="fas fa-shipping-fast"></i> Ship order
							</a>
							<a href="'.base_url().'"
								class="px-2 text-decoration-none lnk-edit-prod text-secondary dropdown-item">
								<i class="fas fa-edit"></i> Edit order
							</a>	
							<a href="#" 
								class="px-2 text-decoration-none lnk-del-cust text-danger dropdown-item"
								so-id="'.$row->so_id.'">
								<i class="fas fa-trash lalg"></i> Delete order
							</a>
						</div>
						<!--
						<a href="'.base_url().'"
							class="px-2 text-decoration-none lnk-cust-addr text-secondary"
							title="Print order">
							<i class="las la-print la-lg"></i>
						</a>	
						<a href="'.base_url().'"
							class="px-2 text-decoration-none lnk-cust-addr text-secondary"
							title="Ship order">
							<i class="fas fa-shipping-fast"></i>
						</a>
						<a href="'.base_url().'"
							class="px-2 text-decoration-none lnk-edit-prod text-secondary"
							title="Edit order">
							<i class="fas fa-edit"></i>
						</a>	
						<a href="#" 
							class="px-2 text-decoration-none lnk-del-cust text-danger" 
							title="Delete order" 
							data-toggle="tooltip" 
							data-placement="bottom"
							so-id="'.$row->so_id.'">
							<i class="fas fa-trash lalg"></i>
						</a>
						-->
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
			"title"   		  => 'Sales orders table',
			"draw"            => intval($this->input->post('draw')),  
			"recordsTotal"    => intval($total_data),  
			"recordsFiltered" => intval($total_filtered), 
			"data"            => $data   
		);

        // Send json encoded response
        echo json_encode($json_data);
	}

}
?>
