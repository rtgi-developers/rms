<?php  
/**
 * Task settings
 *
 * @package CI
 * @subpackage Controller
 * @author MD TARIQUE ANWER <mtarique@outlook.com>
 */
defined('BASEPATH') or exit('No direct script access allowed.');

class Tasks extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();

		// Load helper
		$this->load->helper('auth_helper');

		// Load model
		$this->load->model('settings/tasks_model');
	}

	/**
	 * Load task viw page 
	 * 
	 * @return [html] [Loads html page]
	 */
	public function index()
	{
		$page['title']       = "Tasks";
		$page['description'] = "Add or edit system tasks and modules";
		$page['content']     = $this->show_tasks_table();

		$this->load->view('settings/tasks_view', $page);
	}

	/**
	 * Show all tasks list in table 
	 * 
	 * @return [html] [html table]
	 */
	public function show_tasks_table()
	{
		// Html table
		$html = '
			<style>
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

			<!-- Table actions -->
			<div class="row mb-2">
				<div class="col-md-10 pr-0">
					<div class="input-group">
					    <span class="input-group-prepend">
					    	<div class="input-group-text order-right-0 border bg-whitesmoke">
					    		<i class="la la-search"></i>
					    	</div>
					    </span>
					    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchTasks" placeholder="Search all tasks">
					</div>
				</div>
				<div class="col-md-2 text-right export-buttons">
					<a href="#" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2" id="linkCreateNewTask" data-toggle="modal" data-target="#mdlCreateTask" data-backdrop="static" data-keyboard="false"><i class="las la-plus-circle la-lg"></i> Create Task</a>
				</div>
			</div>

			<!-- Table -->
			<table class="table table-sm table-hover border border-gainsboro-2" id="tblTasks">
				<thead>
					<tr class="bg-light">
						<!--td class="align-middle font-weight-bold small py-2 text-center">Task Id</td-->
						<td class="align-middle font-weight-bold small py-2 text-left">Task Category</td>
						<td class="align-middle font-weight-bold small py-2 text-left">Task Name</td>
						<!--td class="align-middle font-weight-bold small py-2 text-left">Class Name</td>
						<td class="align-middle font-weight-bold small py-2 text-left">Metdod Name</td>
						<td class="align-middle font-weight-bold small py-2 text-left">Parent Directory</td-->
						<td class="align-middle font-weight-bold small py-2 text-left">Is permission Required?</td>
						<td class="align-middle font-weight-bold small py-2 text-left"></td>
					</tr>
				</thead>
				<tbody>
		';

		// Query to get tasks list
		$result = $this->tasks_model->get_tasks();

		// Validate query result
		if($result['status'] == true)
		{
			// Loop through resutl data and print rows
			foreach($result['data'] as $row)
			{
				($row['is_perm_req'] == 1) ? $isPermReq = "Yes" : $isPermReq = "No";

				$html .= '
					<tr>
						<!--td class="align-middle text-center">'.$row['task_id'].'</td-->
						<td class="align-middle text-left">'.str_replace('_', ' ', $row['task_cat']).'</td>
						<td class="align-middle text-left">'.$row['task_name'].'</td>
						<!--td class="align-middle text-left">'.$row['task_class'].'</td>
						<td class="align-middle text-left">'.$row['task_method'].'</td>
						<td class="align-middle text-left">'.$row['task_dir'].'</td-->
						<td class="align-middle text-left">'.$isPermReq.'</td>
						<td class="align-middle text-center">
							<div class="d-flex flex-row">
								<a href="#" 
									class="px-1 text-decoration-none lnk-edit-task text-primary" 
									data-toggle="modal" 
									data-target="#mdlEditTask" 
									data-backdrop="static" 
									data-keyboard="false" 
									title="Edit task"
									task-id="'.$row['task_id'].'" 
									task-name="'.$row['task_name'].'" 
									task-cat="'.$row['task_cat'].'" 
									class-name="'.$row['task_class'].'" 
									method-name="'.$row['task_method'].'" 
									task-dir="'.$row['task_dir'].'" 
									is-perm-req="'.$row['is_perm_req'].'">
									<i class="las la-pencil-alt la-lg"></i>
								</a>
								<a href="#" 
									class="px-1 text-decoration-none lnk-del-task text-danger" 
									id="btnDeleteUser" 
									task-id="'.$row['task_id'].'" 
									title="Delete task">
									<i class="las la-trash la-lg"></i>
								</a>
							</div>
						</td>
					</tr>
				';
			}
		}
		else {
			$html .= '
			<tr><td class="align-middle text-center" colspan="4">'.$result['data'].'</td></tr>';
		}

		// Close table
		$html .= '</tbody></table>';

		return $html;
	}

	/**
	 * Get list option unique task category
	 * 
	 * @return [type] [description]
	 */
	public function load_task_cat_options()
	{	
		// Query to get task ategory
		$result = $this->tasks_model->get_task_cat();

		if($result['status'] == true)
		{
			$html = '';

			foreach($result['data'] as $row) $html .= '<option value="'.$row['task_cat'].'"></option>';

			$json_data = array(
				'status' => 'success', 
				'title'  => 'Task category', 
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

		// Send json encoded ajax response
		echo json_encode($json_data);
	}

	/**
	 * Create new task
	 * 
	 * @return [type] [description]
	 */
	public function create_task()
	{
		// Set validation rules for user inputs
		$this->form_validation->set_rules('txtTaskCat', 'Task category', 'required');
		$this->form_validation->set_rules('txtTaskName', 'Task name', 'required');
		$this->form_validation->set_rules('txtClassName', 'Class or controller name', 'required');
		$this->form_validation->set_rules('txtMethodName', 'Method or function name', 'required');
		$this->form_validation->set_rules('txtIsPermReq', 'Is permission requierd?', 'required');

		// If valid inputs
		if($this->form_validation->run() == true)
		{
			$form_data = array(
				'task_cat'	  => str_replace(' ', '_', $this->input->post('txtTaskCat')), 
				'task_name'   => $this->input->post('txtTaskName'), 
				'task_class'  => strtolower($this->input->post('txtClassName')), 
				'task_method' => strtolower($this->input->post('txtMethodName')), 
				'task_dir'    => strtolower($this->input->post('txtDir')) , 
				'is_perm_req' => $this->input->post('txtIsPermReq') 
			);

			// Query
			$result = $this->tasks_model->add_task($form_data);

			// Validate query
			if($result['status'] == true)
			{	
				// Success message
				$html = '
					<div class="alert alert-success rounded-0" role="alert"> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						 </button>
					  	<strong>'.$result['data'].'</strong>
					</div>
				';

				$json_data = array(
					'status' => 'success', 
					'title'  => 'Task created!', 
					'data'   => $html
				);
			}
			else{
				// Response error
				$html = '
					<div class="alert alert-danger rounded-0" role="alert"> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						 </button>
					  	<strong>Oops!</strong> '.$result['data'].'
					</div>
				';

				$json_data = array(
					'status' => 'error', 
					'title'  => 'Oops!', 
					'data'   => $html
				);
			}
		}
		else{
			// Validation error message
			$html = '
				<div class="alert alert-danger rounded-0" role="alert"> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				  	<strong>Missing or invalid inputs!</strong> '.validation_errors().'
				</div>
			';

			$json_data = array(
				'status' => 'error', 
				'title'  => 'Missing or invalid inputs!', 
				'data'   => $html
			);
		}

		// Send json encoded message as ajax response 
		echo json_encode($json_data); 
	}

	/**
	 * Edit task and update changes
	 * 
	 * @return [type] [description]
	 */
	public function edit_task()
	{
		// Set validation rules for user inputs
		$this->form_validation->set_rules('txtEditTaskId', 'Task Id', 'required');
		$this->form_validation->set_rules('txtEditTaskCat', 'Task category', 'required');
		$this->form_validation->set_rules('txtEditTaskName', 'Task name', 'required');
		$this->form_validation->set_rules('txtEditClassName', 'Class or controller name', 'required');
		$this->form_validation->set_rules('txtEditMethodName', 'Method or function name', 'required');
		$this->form_validation->set_rules('txtEditIsPermReq', 'Is permission required?', 'required');

		// If valid inputs
		if($this->form_validation->run() == true)
		{	
			$task_id = $this->input->post('txtEditTaskId');

			$task_data = array(
				'task_cat'	  => str_replace(' ', '_', $this->input->post('txtEditTaskCat')), 
				'task_name'   => $this->input->post('txtEditTaskName'), 
				'task_class'  => strtolower($this->input->post('txtEditClassName')), 
				'task_method' => strtolower($this->input->post('txtEditMethodName')), 
				'task_dir'    => strtolower($this->input->post('txtEditDir')), 
				'is_perm_req' => $this->input->post('txtEditIsPermReq')
			);

			// Query
			$result = $this->tasks_model->update_task($task_id, $task_data);

			// Validate query
			if($result['status'] == true)
			{	
				// Success message
				$html = '
					<div class="alert alert-success rounded-0" role="alert"> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						 </button>
					  	<strong>'.$result['data'].'</strong>
					</div>
				';

				$json_data = array(
					'status' => 'success', 
					'title'  => 'Task updated!', 
					'data'   => $html
				);
			}
			else{
				// Response error
				$html = '
					<div class="alert alert-danger rounded-0" role="alert"> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						 </button>
					  	<strong>Oops!</strong> '.$result['data'].'
					</div>
				';

				$json_data = array(
					'status' => 'error', 
					'title'  => 'Oops!', 
					'data'   => $html
				);
			}
		}
		else{
			// Validation error message
			$html = '
				<div class="alert alert-danger rounded-0" role="alert"> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				  	<strong>Missing or invalid inputs!</strong> '.validation_errors().'
				</div>
			';

			$json_data = array(
				'status' => 'error', 
				'title'  => 'Missing or invalid inputs!', 
				'data'   => $html
			);
		}

		// Send json encoded response
		echo json_encode($json_data); 
	}

	/**
	 * Delete task 
	 * 
	 * @return [type] [description]
	 */
	public function delete_task()
	{
		$task_id = $this->input->get('taskid');

		$result = $this->tasks_model->del_task($task_id);

		if($result['status'] == true) 
		{	
			$json_data = array(
				'status' => 'success', 
				'title'  => 'Task deleted!', 
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

		// Send json encoded message as ajax response
		echo json_encode($json_data); 
	}
}
?>