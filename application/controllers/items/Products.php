<?php 
/**
 * Products 
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed.');

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');

		$this->load->model(array('items/categories_model', 'items/products_model')); 
	}

	/**
	 * View products page default method 
	 *
	 * @return void
	 */
	public function index()
	{
		$page['title']       = "Products";
		$page['description'] = "Add, edit or delete products.";

		$this->load->view('items/product_view', $page);
	}

	/**
	 * View create product page
	 *
	 * @return void
	 */
	public function view_create_prod()
	{
		$page['title'] = "Create Product"; 
		$page['description'] = "You can create new product here."; 

		$this->load->view('items/product_create_view', $page); 
	}

	/**
	 * Get product categories 
	 *
	 * @return void
	 */
	public function get_prod_cat_options()
	{
		$cat_id = $this->input->get('cat-id'); 

		echo get_subcat_options($cat_id);
	}

	/**
	 * Create new product
	 *
	 * @return json
	 */
	public function create_product()
	{
		// Set validation rules
		$this->form_validation->set_rules('txtProdCat', 'Product category', 'required');
		$this->form_validation->set_rules('txtProdSubCat1', 'Product sub category 1', 'required'); 
		$this->form_validation->set_rules('txtProdStyleNum', 'Style number', 'required'); 
		$this->form_validation->set_rules('txtProdName', 'Product name', 'required'); 
		$this->form_validation->set_rules('txtProdColor', 'Product color', 'required'); 
		$this->form_validation->set_rules('txtProdLn', 'Product length', 'required'); 
		$this->form_validation->set_rules('txtProdWd', 'Product width', 'required'); 
		$this->form_validation->set_rules('txtProdSizeUom', 'Product dimension UOM', 'required'); 
		$this->form_validation->set_rules('txtProdWt', 'Product weight', 'required'); 
		$this->form_validation->set_rules('txtProdWtUom', 'Product weight UOM', 'required'); 
		$this->form_validation->set_rules('txtProdMoq', 'Product MOQ', 'required'); 
		$this->form_validation->set_rules('txtProdMoqUom', 'Product MOQ UOM', 'required');  
		$this->form_validation->set_rules('txtIpQty', 'Inner Pack Quantity', 'required'); 
		$this->form_validation->set_rules('txtIpQtyUom', 'Inner Pack Quantity UOM', 'required'); 
		$this->form_validation->set_rules('txtIpLn', 'Inner Pack Length', 'required'); 
		$this->form_validation->set_rules('txtIpWd', 'Inner Pack Width', 'required'); 
		$this->form_validation->set_rules('txtIpHt', 'Inner Pack Height', 'required');
		$this->form_validation->set_rules('txtIpDimUom', 'Inner Pack UOM', 'required');
		$this->form_validation->set_rules('txtMpQty', 'Master Pack Quantity', 'required'); 
		$this->form_validation->set_rules('txtMpQtyUom', 'Master Pack Quantity UOM', 'required'); 
		$this->form_validation->set_rules('txtMpLn', 'Master Pack Length', 'required'); 
		$this->form_validation->set_rules('txtMpWd', 'Master Pack Width', 'required'); 
		$this->form_validation->set_rules('txtMpHt', 'Master Pack Height', 'required');
		$this->form_validation->set_rules('txtMpDimUom', 'Master Pack UOM', 'required');
		
		// Validate user inputs
		if($this->form_validation->run() == true)
		{
			// Array of user inputs
			
			if($this->input->post('txtProdSubCat2') != '')
			{
				$prod_data['prod_cat_id']   = $this->input->post('txtProdSubCat2'); 
			}
			else {
				$prod_data['prod_cat_id']   = $this->input->post('txtProdSubCat1'); 
			}

			$prod_data['prod_style_num']    = $this->input->post('txtProdStyleNum');
			$prod_data['prod_name']         = strtoupper($this->input->post('txtProdName'));
			$prod_data['prod_color']        = strtoupper($this->input->post('txtProdColor'));
			$prod_data['prod_length']       = $this->input->post('txtProdLn');
			$prod_data['prod_width']        = $this->input->post('txtProdWd');
			$prod_data['prod_height']       = $this->input->post('txtProdHt');
			$prod_data['prod_size_uom']     = $this->input->post('txtProdSizeUom');
			$prod_data['prod_weight']       = $this->input->post('txtProdWt');
			$prod_data['prod_weight_uom']   = $this->input->post('txtProdWtUom');
			$prod_data['prod_moq']          = $this->input->post('txtProdMoq');
			$prod_data['prod_moq_uom']      = $this->input->post('txtProdMoqUom');
			$prod_data['prod_mfg_time']     = $this->input->post('txtProdMfgTime'); 
			$prod_data['prod_mfg_time_uom'] = $this->input->post('txtProdMfgTimeUom');
			$prod_data['prod_cost']         = $this->input->post('txtProdCost');
			$prod_data['prod_cost_curr']    = $this->input->post('txtProdCostCurr');
			$prod_data['prod_price']        = $this->input->post('txtProdPrice');
			$prod_data['prod_price_curr']   = $this->input->post('txtProdPriceCurr');
			$prod_data['ip_qty']            = $this->input->post('txtIpQty');
			$prod_data['ip_qty_uom']        = $this->input->post('txtIpQtyUom');
			$prod_data['ip_weight']         = $this->input->post('txtIpWt');
			$prod_data['ip_weight_uom']     = $this->input->post('txtIpWtUom');
			$prod_data['ip_length']         = $this->input->post('txtIpLn');
			$prod_data['ip_width']          = $this->input->post('txtIpWd');
			$prod_data['ip_height']         = $this->input->post('txtIpHt');
			$prod_data['ip_dim_uom']        = $this->input->post('txtIpDimUom');
			$prod_data['mp_qty']            = $this->input->post('txtMpQty');
			$prod_data['mp_qty_uom']        = $this->input->post('txtMpQtyUom');
			$prod_data['mp_weight']         = $this->input->post('txtMpWt');
			$prod_data['mp_weight_uom']     = $this->input->post('txtMpWtUom');
			$prod_data['mp_length']         = $this->input->post('txtMpLn');
			$prod_data['mp_width']          = $this->input->post('txtMpWd');
			$prod_data['mp_height']         = $this->input->post('txtMpHt'); 
			$prod_data['mp_dim_uom']        = $this->input->post('txtMpDimUom');
			$prod_data['date_created']      = date('Y-m-d H: m: i'); 
			$prod_data['date_modified']     = date('Y-m-d H: m: i'); 

			// Query to insert new product data
			$result = $this->products_model->insert_prod($prod_data);

			// Validate query result
			if($result['status'] == true)
			{
				$html = '
					<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
					  	<strong>Product Created!</strong> '.$result['data'].'
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
				'; 

				$json_data['status'] = 'success'; 
				$json_data['title']  = 'Product Created!';
				$json_data['data']   = $html;
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
				$json_data['data']   = $html; 
			}
		}
		else {
			$html = '
				<div class="alert alert-warning alert-dismissible fade show rounded-0" role="alert">
				  	<strong>Oops!</strong> '.validation_errors().'
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>
			'; 

			$json_data['status'] = 'error'; 
			$json_data['title']  = 'Oops!'; 
			$json_data['data']   = $html; 
		}

		// Send json encoded response
		echo json_encode($json_data);
	}

	/**
	 * Get all products using serverside
	 *
	 * @return void
	 */
	public function get_prod_serverside()
	{
		// Columns
		$columns = array(
			0 => 'prod_style_num', 
			1 => 'prod_name', 
			2 => 'prod_size', 
			3 => 'prod_color', 
			4 => 'prod_cat_id', 
			5 => ''
		);	

		// Post data
		$limit  = $this->input->post('length');
		$start  = $this->input->post('start');
		$order  = $columns[$this->input->post('order')[0]['column']];
		$dir    = $this->input->post('order')[0]['dir'];
		$key    = $this->input->post('search')['value'];

		// Get number of total and filtered
		$total_data = $this->products_model->count_all_prod();
		$total_filtered = $total_data;

		// Query based on searched and non-searched keyword
		if(empty($key))
		{	
			// Query to get all materials
			$result = $this->products_model->get_all_prod($limit,$start,$order,$dir);
		}
		else {	
			// Query to get searched materials
			$result = $this->products_model->get_search_prod($limit,$start,$key,$order,$dir);
			$total_filtered = $this->products_model->count_search_prod($key);
		}

		//  Declare an empty array to hold td values
		$data = array();

		// Non empty query result
		if(!empty($result))
		{
			// Loop through query result
			foreach($result as $row)
			{	
				$prod_size = $row->prod_length.'x'.$row->prod_width.'x'.$row->prod_height.' '.$row->prod_size_uom; 
				$prod_cat  = get_cat_path($row->prod_cat_id); 
				//$matl_weight = $row->matl_weight.' '.$row->matl_weight_uom;
				
				// Data to be nested inside data array
				$nestedData[0] = $row->prod_style_num;
				$nestedData[1] = $row->prod_name;
				$nestedData[2] = $prod_size;
				$nestedData[3] = $row->prod_color;
				$nestedData[4] = '<small>'.$prod_cat.'</small>';
				$nestedData[5] = '
					<div class="d-flex flex-row">
						<a href="'.base_url('items/bom?prodid='.$row->prod_id.'&prodname='.$row->prod_name).'"
							class="px-2 text-decoration-none lnk-prod-bom text-dark"
							title="Bill of Materials">
							<i class="las la-list-alt la-lg"></i>
						</a>	
						<a href="'.base_url('items/products/view_edit_prod?prodid='.$row->prod_id).'"
							class="px-2 text-decoration-none lnk-edit-prod text-primary"
							title="Edit Product">
							<i class="las la-pencil-alt la-lg"></i>
						</a>	
						<a href="#" 
							class="px-2 text-decoration-none lnk-del-prod text-danger" 
							title="Delete Product" 
							prod-id="'.$row->prod_id.'">
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
			"title"   		  => 'Products Table',
			"draw"            => intval($this->input->post('draw')),  
			"recordsTotal"    => intval($total_data),  
			"recordsFiltered" => intval($total_filtered), 
			"data"            => $data   
		);

        // Send json encoded response
        echo json_encode($json_data);
	}

	/**
	 * Get product options for select or datalist
	 *
	 * @return void
	 */
    public function get_prod_options_by_search()
    {
        $keyword = $this->input->get('keyword'); 

        $result = $this->products_model->get_prod_by_search($keyword); 

        $prod_options = '';

        if(!empty($result))
        {
            foreach($result as $row)
            {    
				$prod = '['.$row['prod_id'].'] '.$row['prod_name'].' '.$row['prod_color']; 

				preg_match('/\\[(.+?)\\]/', $prod, $match); 

				$pid = $match[1]; 

				/* $prod .= " - ".$pid;  */
				

                $prod_options .=  '<option value="'.$prod.'"></option>';
			}	
        }
		
		echo $prod_options; 
	}

	/**
	 * Get product details
	 *
	 * @return void
	 */
	public function get_prod_details()
	{
		$prod_id = $this->input->get('prodid');
		
		$result = $this->products_model->get_prod_by_id($prod_id); 

		if(!empty($result))
		{
			$json_data['status'] = 'success'; 
			$json_data['prod_uom'] = $result[0]->prod_moq_uom; 
		}
		else {
			$json_data['status'] = 'error'; 
			$json_data['data'] = 'Could not fetch product quantity UOM.'; 
		}

		echo json_encode($json_data); 
	}

	/**
	 * Delete product 
	 * 
	 * @return json
	 */
	public function delete_prod()
	{	
		// Product id
		$prod_id = $this->input->get('prodid');

		// Query to delete product
		$result = $this->products_model->delete_prod($prod_id);

		// Validate query result
		if($result['status'] == true)
		{
			$json_data = array('status'=>'success', 'title'=>'Deleted!', 'data'=>$result['data']);
		}
		else {
			$json_data = array('status'=>'error', 'title'=>'Oops!', 'data'=>$result['data']);
		}

		// Send json encoded response
		echo json_encode($json_data);
	}
}


?>