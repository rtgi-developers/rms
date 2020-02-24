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

		$this->load->model(array('items/categories_model', 'items/materials_model', 'systems/uom_model'));
	}

	public function index()
	{
		$page['title']       = "Materials";
		$page['description'] = "Add and edit materials.";

		$this->load->view('items/material_view', $page);		
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
		$page['title']       = "Edit Material"; 
		$page['description'] = "Change and save material details."; 
		$page['materialid']  = $this->input->get('matlid'); 
		$page['editmatlform']  = $this->show_edit_matl_form($this->input->get('matlid')); 

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
								<div class="col-md-6">
									<label for="txtEditMatlName">
										Material name &amp; color<br>
										<small class="text-muted">Enter material\'s name and color in their respective field</small>
									</label>
									<div class="d-flex flex-row">
										<input type="text" name="txtEditMatlName" id="txtEditMatlName" class="form-control form-control-sm mr-2 col-md-9" placeholder="Name" value="'.$result['data'][0]['matl_name'].'" required>
										<input type="text" name="txtEditMatlColor" id="txtEditMatlColor" class="form-control form-control-sm mr-2 col-md-3" placeholder="Color" value="'.$result['data'][0]['matl_color'].'">
									</div>
								</div>
								<div class="col-md-3">
									<label for="txtEditMatlCat">
										Category <br>
										<small class="text-muted">Select material category</small>
									</label>
									<select name="txtEditMatlCat" id="txtEditMatlCat" class="form-control form-control-sm" required>
										<option value>Select category</option>
										'.$this->edit_cat_options($result['data'][0]['cat_name']).'
									</select>
								</div>
								<div class="col-md-3">
									<label for="txtEditMatlSubCat">
										Sub Category <br>
										<small class="text-muted">Select material\'s sub category</small>
									</label>
									<select name="txtEditMatlSubCat" id="txtEditMatlSubCat" class="form-control form-control-sm" required>
										'.$this->edit_subcat_options($result['data'][0]['cat_id'], $result['data'][0]['cat_name'], $result['data'][0]['subcat_name']).'
									</select>
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
											'.$this->edit_uom_options($result['data'][0]['count_unit_id'], $result['data'][0]['count_unit']).'
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
										'.$this->edit_uom_options($result['data'][0]['wt_unit_id'], $result['data'][0]['wt_unit']).'
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label for="txtEditMatlDim">
										Dimensions <br>
										<small class="text-muted">Enter length, width, height &amp; uom</small>
									</label>
									<div class="d-flex flex-row">
										<input type="number" step="any" name="txtEditMatlLn" id="txtEditMatlLn" class="form-control form-control-sm text-center mx-1" placeholder="L" value="'.$result['data'][0]['matl_length'].'">x
										<input type="number" step="any" name="txtEditMatlWd" id="txtEditMatlWd" class="form-control form-control-sm text-center mx-1" placeholder="W" value="'.$result['data'][0]['matl_width'].'">x
										<input type="number" step="any" name="txtEditMatlHt" id="txtEditMatlHt" class="form-control form-control-sm text-center mx-1" placeholder="H" value="'.$result['data'][0]['matl_height'].'">
										<select name="txtEditMatlDimUnit" id="txtEditMatlDimUnit" class="form-control form-control-sm mr-2 txt-uom">
										'.$this->edit_uom_options($result['data'][0]['dim_unit_id'], $result['data'][0]['dim_unit']).'
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
	 * Get category options for edit material form 
	 * 
	 * @param  string $category Material selected category
	 * @return html
	 */
	public function edit_cat_options($category)
	{
		// Query to get category list by category type
		$result = $this->categories_model->get_cat_by_type('Material'); 

		$cat_options = '';

		// Validate query
		if($result['status'] == true)
		{	
			foreach($result['data'] as $row) 
			{
				($row['cat_name'] == $category) ? $sel_status = 'selected' : $sel_status = ''; 

				$cat_options .= '
					<option value="'.$row['cat_name'].'" '.$sel_status.'>
						'.$row['cat_name'].'
					</option>
				';
			}
		}	
		else $cat_options .= '<option value="'.$category.'">'.$category.'</option>';

		// Return category options
		return $cat_options; 
	}

	/**
	 * Get sub category options for edit material form 
	 * 
	 * @param  string $category 	Material selected category
	 * @param  string $subcategory 	Material selected sub category
	 * @return html
	 */
	public function edit_subcat_options($catid, $category, $subcategory)
	{
		// Query to get category list by category type
		$result = $this->categories_model->get_subcat_by_catname($category); 

		$subcat_options = '';

		// Validate query 
		if($result['status'] == true)
		{
			foreach($result['data'] as $row)
			{
				($row['subcat_name'] == $subcategory) ? $sel_status = 'selected' : $sel_status = '';

				$subcat_options .= '
					<option value="'.$row['cat_id'].'" '.$sel_status.'>
						'.$row['subcat_name'].'
					</option>
				';
			}
		}
		else $subcat_options .= '<option value="'.$catid.'">'.$subcategory.'</option>';

		// Return sub category options 
		return $subcat_options; 
	}

	/**
	 * Get unit of measurement select options for edit materia, form 
	 *
	 * @param 	int 		$unitid 		Unit id
	 * @param 	string 		$unitabbr		Unit abbreviation
	 * @return 	html
	 */
	public function edit_uom_options($unitid, $unitabbr)
	{
		// Query 
		$result = $this->uom_model->get_uom(); 
		
		$uom_options = '';

        if($result['status'] == true)
        {
			foreach($result['data'] as $row)
			{
				($row['unit_id'] == $unitid) ? $sel_status = 'selected' : $sel_status = '';

				$uom_options .= '
					<option value="'.$row['unit_id'].'" '.$sel_status.'>
						'.$row['unit_abbr'].'
					</option>
				';
			}
		}
		else $uom_options .= '<option value="'.$unitid.'">'.$unitabbr.'</option>'; 

		// Return uom options
		return $uom_options; 
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
		$this->form_validation->set_rules('txtEditMatlSubCat', 'Material Sub Category', 'required');

		if($this->form_validation->run() == true)
		{	
			// Material id
			$matl_id = $this->input->post('txtEditMatlId');

			// Material data
			$matl_data['matl_cat_id']     = $this->input->post('txtEditMatlSubCat');  
			$matl_data['matl_name']       = $this->input->post('txtEditMatlName');  
			$matl_data['matl_color']      = $this->input->post('txtEditMatlColor');  
			$matl_data['matl_length']     = $this->input->post('txtEditMatlLn');  
			$matl_data['matl_width']      = $this->input->post('txtEditMatlWd');  
			$matl_data['matl_height']     = $this->input->post('txtEditMatlHt');  
			$matl_data['matl_dim_uom']    = $this->input->post('txtEditMatlDimUnit');  
			$matl_data['matl_weight']     = $this->input->post('txtEditMatlWt');  
			$matl_data['matl_weight_uom'] = $this->input->post('txtEditMatlWtUnit');  
			$matl_data['matl_moq']        = $this->input->post('txtEditMatlMOQ');  
			$matl_data['matl_count_uom']  = $this->input->post('txtEditMatlMOQUnit');  
			$matl_data['matl_modified_on'] = date('Y-m-d H:i:s');  

			// Query to update changes
			$result = $this->materials_model->update_matl($matl_id, $matl_data); 

			// Validate query result
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
		else 
		{	
			// Query to get searched materials
			$result = $this->materials_model->get_search_matl($limit,$start,$key,$order,$dir);
			$total_filtered = $this->materials_model->count_search_matl($key);
		}

		// Check for non empty result
		if(!empty($result))
		{	
			$data = array();

			// Loop through query result
			foreach($result as $row)
			{	
				$matl_size = $row->matl_length.'x'.$row->matl_width.'x'.$row->matl_height.' '.$row->dim_unit; 
				$matl_cat  = $row->cat_type.'>'.$row->cat_name.'>'.$row->subcat_name; 
				$matl_weight = $row->matl_weight.' '.$row->wt_unit;
				
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
	 * Load category options
	 * 
	 * @return json 
	 */
	public function load_cat_list()
	{	
		// Query to get category list by category type
		$result = $this->categories_model->get_cat_by_type('Material'); 

		// Validate query
		if($result['status'] == true)
		{	
			$html = '';

			foreach($result['data'] as $row) 
			{
				$html .= '<option value="'.$row['cat_name'].'">'.$row['cat_name'].'</option>';
			}

			$json_data = array(
				'status' => 'success', 
				'title'  => 'Category list', 
				'data'   => $html
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
	 * Load sub category datalist options
	 * 
	 * @return json 
	 */
	public function load_subcat_list()
	{	
		// Get category or item type from url
		$cat_name = $this->input->get('catname');

		// Query to get category list by category type
		$result = $this->categories_model->get_subcat_by_catname($cat_name); 

		// Validate query
		if($result['status'] == true)
		{	
			$html = '';

			foreach($result['data'] as $row) 
			{
				$html .= '<option value="'.$row['cat_id'].'">'.$row['subcat_name'].'</option>';
			}

			$json_data = array(
				'status' => 'success', 
				'title'  => 'Category list', 
				'data'   => $html
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
	 * Create new material 
	 * 
	 * @return json
	 */
	public function create_matl()
	{	
		// Set validation rules for user inputs
		$this->form_validation->set_rules('txtMatlName', 'Material Name', 'required'); 
		$this->form_validation->set_rules('txtMatlCat', 'Material Category', 'required'); 
		$this->form_validation->set_rules('txtMatlSubCat', 'Material Sub Category', 'required');

		if($this->form_validation->run() == true)
		{
			$matl_data['matl_cat_id']      = $this->input->post('txtMatlSubCat');  
			$matl_data['matl_name']        = $this->input->post('txtMatlName');  
			$matl_data['matl_color']       = $this->input->post('txtMatlColor');  
			$matl_data['matl_length']      = $this->input->post('txtMatlLn');  
			$matl_data['matl_width']       = $this->input->post('txtMatlWd');  
			$matl_data['matl_height']      = $this->input->post('txtMatlHt');  
			$matl_data['matl_dim_uom']     = $this->input->post('txtMatlDimUnit');  
			$matl_data['matl_weight']      = $this->input->post('txtMatlWt');  
			$matl_data['matl_weight_uom']  = $this->input->post('txtMatlWtUnit');  
			$matl_data['matl_moq']         = $this->input->post('txtMatlMOQ');  
			$matl_data['matl_count_uom']   = $this->input->post('txtMatlMOQUnit');  
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
	 * Delete material 
	 * 
	 * @return json
	 */
	public function delete_matl()
	{	
		// Category id
		$matl_id = $this->input->get('matlid');

		// Query to delete category
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