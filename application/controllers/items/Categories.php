<?php  
/**
 * Item Categories 
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper'); 

		$this->load->model('items/categories_model');
	}

	public function index()
	{
		$page['title'] = "Categories";
		$page['description'] = "Manage categories of products and materials.";
		$page['table_cat'] = $this->show_cat_table();

		$this->load->view('items/categories_view', $page);		
	}

	/**
	 * Show category table 
	 * 
	 * @return html
	 */
	public function show_cat_table()
	{	
		// Table style
		$html = '
			<style>
				.col-wd-200{
					word-wrap: break-word;
					min-width: 200px;
					max-width: 200px;
				}
				.dataTables_filter, .dataTables_length, .dataTables_info{
					display: none;
				}
				.table-tool-input:focus {
				    outline: 0 !important;
				    border-color: initial;
				    box-shadow: none;
				    background-color: white !important;
				}
			</style>
		';

		// Table actions
		$html .= '
			<div class="row mb-2">
				<div class="col-md-10 pr-0">
					<div class="input-group">
					    <span class="input-group-prepend">
					    	<div class="input-group-text order-right-0 border bg-whitesmoke">
					    		<i class="la la-search"></i>
					    	</div>
					    </span>
					    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchCat" placeholder="Search all categories">
					</div>
				</div>
				<div class="col-md-2 text-right export-buttons">
					<a href="#" id="lnkCreateCat" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2" data-toggle="modal" data-target="#mdlCreateCat" data-backdrop="static" data-keyboard="false">
						<i class="las la-plus-circle la-lg"></i> Create Category
					</a>
				</div>
			</div>
		';

		// Table header
		$html .= '
			<table class="table table-sm table-hover border border-gainsboro-2" id="tblCat">
				<thead>
					<tr class="bg-whitesmoke">
						<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
							Category
						</td>
						<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
							Sub category
						</td>
						<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
							Category type
						</td>
						<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
					</tr>
				</thead>
			</table>
		';

		return $html;
	}

	/**
	 * Get categories using serverside
	 * 
	 * @return json
	 */
	public function get_cat_serverside()
	{
		// Columns
		$columns = array(
			0 => 'cat_name', 
			1 => 'subcat_name', 
			2 => 'cat_type', 
			3 => ''
		);

		// Post data
		$limit  = $this->input->post('length');
		$start  = $this->input->post('start');
		$order  = $columns[$this->input->post('order')[0]['column']];
		$dir    = $this->input->post('order')[0]['dir'];
		$key    = $this->input->post('search')['value'];

		// Get number of total and filtered
		$total_data = $this->categories_model->count_all_cat();
		$total_filtered = $total_data;

		// Query based on searched and non-searched keyword
		if(empty($key))
		{	
			// Query to get all categories
			$result = $this->categories_model->get_all_cat($limit,$start,$order,$dir);
		}
		else 
		{	
			// Query to get searched categories
			$result = $this->categories_model->get_search_cat($limit,$start,$key,$order,$dir);
			$total_filtered = $this->categories_model->count_search_cat($key);
		}

		// Check for non empty result
		if(!empty($result))
		{	
			$data = array();

			// Loop through query result
			foreach($result as $row)
			{
				$nestedData[0] = $row->cat_name;
                $nestedData[1] = $row->subcat_name;
                $nestedData[2] = $row->cat_type;
               	$nestedData[3] = '
               		<div class="d-flex flex-row">
               			<a href="#" 
							class="px-1 text-decoration-none lnk-edit-cat text-primary"
							title="Edit category" 
							data-toggle="modal" 
							data-target="#mdlEditCat" 
							data-backdrop="static" 
							data-keyboard="false"
							cat-id="'.$row->cat_id.'"
							cat-type="'.$row->cat_type.'" 
							cat-name="'.$row->cat_name.'" 
							subcat-name="'.$row->subcat_name.'">
							<i class="las la-pencil-alt la-lg"></i>
						</a>	
						<a href="#" 
							class="px-1 text-decoration-none lnk-del-cat text-danger" 
							title="Delete category" 
							cat-id="'.$row->cat_id.'">
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
			"title"   		  => 'Categories List',
	        "draw"            => intval($this->input->post('draw')),  
	       	"recordsTotal"    => intval($total_data),  
	        "recordsFiltered" => intval($total_filtered),
	        "data"            => $data   
        );
        
        // Send json encoded response
        echo json_encode($json_data);
	}

	/**
	 * Load category datalist options
	 * 
	 * @return json 
	 */
	public function load_cat_list()
	{	
		// Get category or item type from url
		$cat_type = $this->input->get('cattype');

		// Query to get category list by category type
		$result = $this->categories_model->get_cat_by_type($cat_type); 

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
				$html .= '<option value="'.$row['subcat_name'].'">'.$row['subcat_name'].'</option>';
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

	public function create_cat()
	{
		// Validate form input
		$this->form_validation->set_rules('txtCatType', 'Category type', 'required');
		$this->form_validation->set_rules('txtCat', 'Category', 'required');
		$this->form_validation->set_rules('txtSubCat', 'Sub category', 'required'); 

		// Validate form inputs
		if($this->form_validation->run() == true)
		{	
			// Form input data array with key as column name
			$cat_data = array(
				'cat_type'    => $this->input->post('txtCatType'),
				'cat_name'    => $this->input->post('txtCat'), 
				'subcat_name' => $this->input->post('txtSubCat')				
			);

			if($this->is_cat_exist($cat_data) == false)
			{
				// Query to check category if already exist 
				$result = $this->categories_model->add_cat($cat_data);

				// Validate query result
				if($result['status'] == true)
				{
					$json_data = array(
						'status' => 'success', 
						'title'  => 'Category created!', 
						'data'   => 'You have successfully created a new category. 
									 To view this new category please reload this page.'
					);
				}
				else $json_data = array('status'=>'error', 'title'=>'Oops!', 'data'=>$result['data']);
			}
			else {
				$json_data = array(
					'status' => 'error', 
					'title'  => 'Oops!', 
					'data'   => 'The category you are trying to create is already exist.'
				);
			}
		}
		else {
			$json_data = array(
				'status' => 'error', 
				'title'  => 'Missing or invalid inputs!', 
				'data'   => validation_errors()
			);
		}

		// Send json encoded response
		echo json_encode($json_data); 
	}

	/**
	 * Check if category already exist 
	 * 
	 * @param  array  $catdata Category type, Category name & Subacategory name 
	 * @return boolean 
	 */
	public function is_cat_exist($catdata)
	{
		$result = $this->categories_model->get_cat_by_details($catdata);

		return ($result['status'] == true) ? true : false;
	}

	/**
	 * Update or save changes - edit category
	 * 
	 * @return [type] [description]
	 */
	public function save_cat_changes()
	{
		// Validate form input
		$this->form_validation->set_rules('txtEditCatId', 'Category id', 'required');
		$this->form_validation->set_rules('txtEditCatType', 'Category type', 'required');
		$this->form_validation->set_rules('txtEditCat', 'Category', 'required');
		$this->form_validation->set_rules('txtEditSubCat', 'Sub category', 'required'); 

		// Validate form inputs
		if($this->form_validation->run() == true)
		{
			// Form input data array with key as column name
			$cat_id = $this->input->post('txtEditCatId'); 

			// Array data to update
			$cat_data = array(
				'cat_type'    => $this->input->post('txtEditCatType'),
				'cat_name'    => $this->input->post('txtEditCat'), 
				'subcat_name' => $this->input->post('txtEditSubCat')				
			);

			// Query to update changes
			$result = $this->categories_model->update_cat($cat_id, $cat_data); 

			if($result['status'] == true)
			{
				$json_data = array(
					'status' => 'success', 
					'title'  => 'Category updated!', 
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
		}
		else {
			$json_data = array(
				'status' => 'error', 
				'title'  => 'Missing or invalid inputs!', 
				'data'   => validation_errors()
			);
		}

		// Send json encoded response
		echo json_encode($json_data); 
	}	

	/**
	 * Delete category 
	 * 
	 * @return json
	 */
	public function delete_cat()
	{	
		// Category id
		$cat_id = $this->input->get('catid');

		// Query to delete category
		$result = $this->categories_model->del_cat($cat_id);

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