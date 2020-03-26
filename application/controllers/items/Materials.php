<?php  
/**
 * Item Materials 
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Materials extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper'); 

		$this->load->model(array('items/categories_model', 'items/materials_model'));
	}

	/**
	 * Default method
	 *
	 * @return void
	 */
	public function index()
	{
		$page['title']       = "Materials";
		$page['description'] = "Add and edit materials.";

		$this->load->view('items/material_view', $page);		
	}
	
	/**
	 * Get all materials using serverside
	 * 
	 * @return json
	 */
	public function get_matl_serverside()
	{
		// Columns
		$columns = array(
			0 => 'matl_name', 
			1 => 'matl_length', 
			2 => 'matl_color', 
			3 => 'matl_weight', 
			4 => 'matl_cat_id', 
			5 => ''
		);	

		// Post data
		$limit  = $this->input->post('length');
		$start  = $this->input->post('start');
		$order  = $columns[$this->input->post('order')[0]['column']];
		$dir    = $this->input->post('order')[0]['dir'];
		$key    = $this->input->post('search')['value'];

		// Get number of total and filtered
		$total_data = $this->materials_model->count_all_matl();
		$total_filtered = $total_data;

		// Query based on searched and non-searched keyword
		if(empty($key))
		{	
			// Query to get all materials
			$result = $this->materials_model->get_all_matl($limit,$start,$order,$dir);
		}
		else {	
			// Query to get searched materials
			$result = $this->materials_model->get_search_matl($limit,$start,$key,$order,$dir);
			$total_filtered = $this->materials_model->count_search_matl($key);
		}

		//  Declare an empty array to hold td values
		$data = array();

		// Non empty query result
		if(!empty($result))
		{
			// Loop through query result
			foreach($result as $row)
			{	
				$matl_size = $row->matl_length.'x'.$row->matl_width.'x'.$row->matl_height.' '.$row->matl_size_uom; 
				$matl_cat  = get_cat_path($row->matl_cat_id); 
				$matl_weight = $row->matl_weight.' '.$row->matl_weight_uom;
				
				// Data to be nested inside data array
				$nestedData[0] = $row->matl_name;
				$nestedData[1] = $matl_size;
				$nestedData[2] = $row->matl_color;
				$nestedData[3] = $matl_weight;
				$nestedData[4] = '<small>'.$matl_cat.'</small>';
				$nestedData[5] = '
					<div class="d-flex flex-row">
						<a href="'.base_url('items/materials/view_edit_matl?matlid='.$row->matl_id).'"
							class="px-1 text-decoration-none lnk-edit-matl text-primary">
							<i class="las la-pencil-alt la-lg"></i>
						</a>	
						<a href="#" 
							class="px-1 text-decoration-none lnk-del-matl text-danger" 
							title="Delete category" 
							matl-id="'.$row->matl_id.'">
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
			"title"   		  => 'Materials List',
			"draw"            => intval($this->input->post('draw')),  
			"recordsTotal"    => intval($total_data),  
			"recordsFiltered" => intval($total_filtered), 
			"data"            => $data   
		);

        // Send json encoded response
        echo json_encode($json_data);
	}

	/**
	 * Get material category options
	 *
	 * @return void
	 */
	public function get_matl_cat_options()
	{
		$cat_id = $this->input->get('cat-id');

		echo get_subcat_options($cat_id); 
	}

	/**
	 * Create new material 
	 * 
	 * @return json
	 */
	public function create_matl()
	{	
		// Set validation rules for user inputs
		$this->form_validation->set_rules('txtMatlCat', 'Material category', 'required');
		$this->form_validation->set_rules('txtMatlSubCat1', 'Material sub category 1', 'required'); 
		$this->form_validation->set_rules('txtMatlName', 'Material Name', 'required'); 

		// Validate user inputs
		if($this->form_validation->run() == true)
		{
			if($this->input->post('txtMatlSubCat2') != '')
			{
				$matl_data['matl_cat_id']   = $this->input->post('txtMatlSubCat2'); 
			}
			else {
				$matl_data['matl_cat_id']   = $this->input->post('txtMatlSubCat1'); 
			}

			$matl_data['matl_name']        = $this->input->post('txtMatlName');  
			$matl_data['matl_color']       = $this->input->post('txtMatlColor');  
			$matl_data['matl_length']      = $this->input->post('txtMatlLn');  
			$matl_data['matl_width']       = $this->input->post('txtMatlWd');  
			$matl_data['matl_height']      = $this->input->post('txtMatlHt');  
			$matl_data['matl_size_uom']     = $this->input->post('txtMatlSizeUom');  
			$matl_data['matl_weight']      = $this->input->post('txtMatlWt');  
			$matl_data['matl_weight_uom']  = $this->input->post('txtMatlWtUom');  
			$matl_data['matl_moq']         = $this->input->post('txtMatlMoq');  
			$matl_data['matl_moq_uom']     = $this->input->post('txtMatlMoqUom');  
			$matl_data['matl_created_on']  = date('Y-m-d H: i: s');  
			$matl_data['matl_modified_on'] = date('Y-m-d H: i: s'); 

			$result = $this->materials_model->insert_matl($matl_data); 

			if($result['status'] == true)
			{	
				$html = '
					<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
					  	<strong>Material Created!</strong> '.$result['data'].'
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
				'; 

				$json_data['status'] = 'success'; 
				$json_data['title']  = 'Material Created!';
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

		// Json encoded response
		echo json_encode($json_data); 
	}

	/**
	 * View create materials page
	 *
	 * @return void
	 */
	public function view_create_matl()
	{
		$page['title']       = "Create Material"; 
		$page['description'] = "You can create new material here."; 

		$this->load->view('items/material_create_view', $page);		
	}

	/**
	 * View edit material form
	 * 
	 * @return json
	 */
	public function view_edit_matl()
	{
		$page['title']        = "Edit Material"; 
		$page['description']  = "Change and save material details."; 
		$page['materialid']   = $this->input->get('matlid'); 
		$page['editmatlform'] = $this->show_edit_matl_form($this->input->get('matlid')); 

		$this->load->view('items/material_edit_view', $page);		
	}

	/**
	 * Show edit material form
	 * 
	 * @param  int 		$matlid 	Material id
	 * @return html
	 */
	public function show_edit_matl_form($matlid)
	{
		$result = $this->materials_model->get_matl_by_id($matlid);

		if($result['status'] == true)
		{	

			/**
			 * Get all categories options along with selected for this material
			 */
			$categories = explode(' > ', get_cat_path($result['data'][0]['matl_cat_id'])); 

			$cat_1 = (isset($categories[0]) && isset($categories[1])) ? get_subcat_options(get_cat_id_by_name($categories[0]), $categories[1]) : get_subcat_options(2);    
			$cat_2 = (isset($categories[1]) && isset($categories[2])) ? get_subcat_options(get_cat_id_by_name($categories[1]), $categories[2]) : '<option value>-- Select Category --</option>'; 
			$cat_3 = (isset($categories[2]) && isset($categories[3])) ? get_subcat_options(get_cat_id_by_name($categories[2]), $categories[3]) : '<option value>-- Select Category --</option>'; 

			// Html edit material form
			$html = '
				<form id="formEditMatl">
					<div class="card rounded-0">
						<div class="card-body">
							<div class="form-group row content-hide">
								<div class="col-md-3">
									<label for="txtEditMatlId">
										Material Id <br>
										<small class="text-muted">Enter material id to be edited</small>
									</label>
									<input type="text" name="txtEditMatlId" id="txtEditMatlId" class="form-control form-control-sm mr-2 text-center" value="'.$matlid.'" placeholder="Id" readonly required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<label for="txtMatlCat">
										Material Categories <br>
										<small class="text-muted">Select materials category and sub categories to enable other tabs</small>
									</label>
									<div class="d-flex flex-row">
										<select name="txtEditMatlCat" id="txtEditMatlCat" class="custom-select custom-select-sm mr-2" required>
											'.$cat_1.'
										</select>
										<select name="txtEditMatlSubCat1" id="txtEditMatlSubCat1" class="custom-select custom-select-sm mr-2" required>
											'.$cat_2.'
										</select>
										<select name="txtEditMatlSubCat2" id="txtEditMatlSubCat2" class="custom-select custom-select-sm mr-2">
											'.$cat_3.'
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="alert alert-secondary rounded-0" role="alert">
										Can\'t find your category? <a href="" id="lnkCreateCat" class="text-nowrap text-decoration-none" data-toggle="modal" data-target="#mdlCreateCat" data-backdrop="static" data-keyboard="false"><!--<i class="las la-plus-square la-lg"></i>--> Create new category</a>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<label for="txtEditMatlName">
										Material name &amp; color<br>
										<small class="text-muted">Enter material\'s name and color in their respective field</small>
									</label>
									<div class="d-flex flex-row">
										<input type="text" name="txtEditMatlName" id="txtEditMatlName" class="form-control form-control-sm mr-2 col-md-9" placeholder="Name" value="'.$result['data'][0]['matl_name'].'" required>
										<input type="text" name="txtEditMatlColor" id="txtEditMatlColor" class="form-control form-control-sm mr-2 col-md-3" placeholder="Color" value="'.$result['data'][0]['matl_color'].'">
									</div>
								</div>	
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label for="txtEditMatlMOQ">
										MOQ <br>
										<small class="text-muted">Minimum order qty &amp; uom</small>
									</label>
									<div class="d-flex flex-row">
										<input type="number" step="any" name="txtEditMatlMOQ" id="txtEditMatlMOQ" class="form-control form-control-sm mr-2 text-center" placeholder="Qty" value="'.$result['data'][0]['matl_moq'].'">
										<select name="txtEditMatlMOQUnit" id="txtEditMatlMOQUnit" class="form-control form-control-sm mr-2 txt-uom">
											'.get_uom_options('Count', $result['data'][0]['matl_moq_uom']).'
											'.get_uom_options('Length', $result['data'][0]['matl_moq_uom']).'
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<label for="txtEditMatlWt">
										Weight <br>
										<small class="text-muted">Enter weight of material &amp; uom</small>
									</label>
									<div class="d-flex flex-row">
										<input type="number" step="any" name="txtEditMatlWt" id="txtEditMatlWt" class="form-control form-control-sm text-center mr-2" placeholder="Wt" value="'.$result['data'][0]['matl_weight'].'">
										<select name="txtEditMatlWtUnit" id="txtEditMatlWtUnit" class="form-control form-control-sm mr-2 txt-uom">
										'.get_uom_options('Weight', $result['data'][0]['matl_weight_uom']).'
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label for="txtEditMatlSize">
										Size <br>
										<small class="text-muted">Enter length, width, height &amp; uom</small>
									</label>
									<div class="d-flex flex-row">
										<input type="number" step="any" name="txtEditMatlLn" id="txtEditMatlLn" class="form-control form-control-sm text-center mx-1" placeholder="L" value="'.$result['data'][0]['matl_length'].'">x
										<input type="number" step="any" name="txtEditMatlWd" id="txtEditMatlWd" class="form-control form-control-sm text-center mx-1" placeholder="W" value="'.$result['data'][0]['matl_width'].'">x
										<input type="number" step="any" name="txtEditMatlHt" id="txtEditMatlHt" class="form-control form-control-sm text-center mx-1" placeholder="H" value="'.$result['data'][0]['matl_height'].'">
										<select name="txtEditMatlSizeUom" id="txtEditMatlSizeUom" class="form-control form-control-sm mr-2 txt-uom">
										'.get_uom_options('Length', $result['data'][0]['matl_size_uom']).'
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row mt-3">
						<div class="col-md-12 text-right">
							<button type="submit" name="btnSaveMatlChanges" id="btnSaveMatlChanges" class="btn btn-sm btn-primary">Save Changes</button>
							<a href="javascript: history.back();" class="btn btn-sm btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
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

		// Return html form or error 
		return $html; 
	}

	/**
	 * Save material changes
	 *
	 * @return json
	 */
	public function save_matl_changes()
	{
		// Set validation rules for user inputs
		$this->form_validation->set_rules('txtEditMatlId', 'Material Id', 'required'); 
		$this->form_validation->set_rules('txtEditMatlName', 'Material Name', 'required'); 
		$this->form_validation->set_rules('txtEditMatlCat', 'Material Category', 'required'); 
		$this->form_validation->set_rules('txtEditMatlSubCat1', 'Material Sub Category 1', 'required');

		if($this->form_validation->run() == true)
		{	
			// Material id
			$matl_id = $this->input->post('txtEditMatlId');

			// Get the deepest sub category id
			if($this->input->post('txtEditMatlSubCat2') != '')
			{
				$matl_data['matl_cat_id']   = $this->input->post('txtEditMatlSubCat2'); 
			}
			else {
				$matl_data['matl_cat_id']   = $this->input->post('txtEditMatlSubCat1'); 
			}

			// Material data
			$matl_data['matl_name']       = $this->input->post('txtEditMatlName');  
			$matl_data['matl_color']      = $this->input->post('txtEditMatlColor');  
			$matl_data['matl_length']     = $this->input->post('txtEditMatlLn');  
			$matl_data['matl_width']      = $this->input->post('txtEditMatlWd');  
			$matl_data['matl_height']     = $this->input->post('txtEditMatlHt');  
			$matl_data['matl_size_uom']   = $this->input->post('txtEditMatlSizeUom');  
			$matl_data['matl_weight']     = $this->input->post('txtEditMatlWt');  
			$matl_data['matl_weight_uom'] = $this->input->post('txtEditMatlWtUnit');  
			$matl_data['matl_moq']        = $this->input->post('txtEditMatlMOQ');  
			$matl_data['matl_moq_uom']    = $this->input->post('txtEditMatlMOQUnit');  
			$matl_data['matl_modified_on'] = date('Y-m-d H:i:s');  

			// Query to update changes
			$result = $this->materials_model->update_matl($matl_id, $matl_data); 

			// Validate query result
			if($result['status'] == true)
			{	
				$html = '
					<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
					  	<strong>Changes saved!</strong> '.$result['data'].'
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
				'; 

				$json_data['status'] = 'success'; 
				$json_data['title']  = 'Material updated!';
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

		// Json encoded response
		echo json_encode($json_data); 
	}
	
	/**
	 * Delete material 
	 * 
	 * @return json
	 */
	public function delete_matl()
	{	
		// Material id
		$matl_id = $this->input->get('matlid');

		// Query to delete material
		$result = $this->materials_model->del_matl($matl_id);

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