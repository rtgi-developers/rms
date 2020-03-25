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

	/**
	 * Default method to load categories view page
	 *
	 * @return void
	 */
	public function index()
	{
		$page['title']       = "Categories";
		$page['description'] = "Manage categories of products and materials.";

		$this->load->view('items/categories_view', $page);		
	}

	/**
	 * Create new category
	 *
	 * @return void
	 */
	public function create_cat()
	{	
		// Set validation rules
		$this->form_validation->set_rules('txtNewCat', 'New category name', 'required'); 
		$this->form_validation->set_rules('txtParentCat', 'Parent category', 'required'); 

		// Validate user inputs
		if($this->form_validation->run() == true)
		{	
			// User inputs
			$cat_data['cat_name']      = $this->input->post('txtNewCat'); 
			$cat_data['parent_cat_id'] = $this->input->post('txtParentCat');

			// Create category if not exist
			if(!$this->categories_model->is_cat_exist($cat_data['cat_name'], $cat_data['parent_cat_id']))
			{
				// Query to insert new category
				$result = $this->categories_model->insert_cat($cat_data); 

				if($result['status'] == true)
				{
					$json_data = array(
						'status' => 'success', 
						'title'  => 'Category created!', 
						'data'   => 'You have successfully created a new category. Reload the parent page to get the newly created category.'
					);
				}
				else $json_data = array('status'=>'error', 'title'=>'Oops!', 'data'=>$result['data']);
			}
			else {
				$json_data = array(
					'status' => 'error', 
					'title'  => 'Already existing category!', 
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
	 * Get categories using serverside
	 * 
	 * @return json
	 */
	public function get_cat_serverside()
	{
		// Columns
		$columns = array(
			0 => 'cat_id', 
			1 => 'cat_name', 
			2 => ''
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

		//  Declare an empty array to hold td values
		$data = array();

		// Check for non empty result
		if(!empty($result))
		{	
			// Loop through query result
			foreach($result as $row)
			{
				$nestedData[0] = $row->cat_id;
				$nestedData[1] = get_cat_path($row->cat_id);
               	$nestedData[2] = '
               		<div class="d-flex flex-row">
               			<a href="#" 
							class="px-1 text-decoration-none lnk-edit-cat text-primary"
							title="Edit category" 
							data-toggle="modal" 
							data-target="#mdlEditCat" 
							data-backdrop="static" 
							data-keyboard="false"
							cat-id="'.$row->cat_id.'"
							cat-name="'.$row->cat_name.'"
							cat-path="'.get_cat_path($row->cat_id).'">
							<i class="las la-pencil-alt la-lg"></i>
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
	 * Update or save changes - edit category
	 * 
	 * @return [type] [description]
	 */
	public function save_cat_changes()
	{
		// Validate form input
		$this->form_validation->set_rules('txtEditCatId', 'Category id', 'required');
		$this->form_validation->set_rules('txtEditCat', 'Category', 'required'); 

		// Validate form inputs
		if($this->form_validation->run() == true)
		{
			// Form input data array with key as column name
			$cat_id = $this->input->post('txtEditCatId'); 

			// Array data to update
			$cat_data = array(
				'cat_name'    => $this->input->post('txtEditCat'), 
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
}

?>