<?php  
defined('BASEPATH') or exit('No direct script access allowed.');

/**
 * Task settings
 *
 * @package CI
 * @subpackage Controller
 * @author MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Tasks extends CI_Controller
{	
	/**
	 * Constructor function
	 */
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

		$this->load->view('settings/tasks_view', $page);
	}

	/**
	 * Show all tasks list in table 
	 * 
	 * @return [html] [html table]
	 */
	public function list_tasks()
	{
		// Query to get tasks list
		$result = $this->tasks_model->get_tasks();

		// Validate query result
		if($result['status'] == true)
		{
			// Html table
			$html = '
				<style>
					.dataTables_filter{
						display: none;
					}
				</style>
				<table class="table table-sm border border-gainsboro-2" id="tblTasks">
					<thead>
						<tr class="bg-light">
							<th class="align-middle text-center">Task Id</th>
							<th class="align-middle text-left">Task Name</th>
							<th class="align-middle text-left">Task Category</th>
							<th class="align-middle text-left">Class Name</th>
							<th class="align-middle text-left">Method Name</th>
							<th class="align-middle text-left">Parent Directory</th>
							<th class="align-middle text-left"></th>
						</tr>
					</thead>
					<tbody>
			';

			// Loop through resutl data and print rows
			foreach($result['data'] as $row)
			{
				$html .= '
					<tr>
						<td class="align-middle text-center">'.$row['task_id'].'</td>
						<td class="align-middle text-left">'.$row['task_name'].'</td>
						<td class="align-middle text-left">'.$row['task_cat'].'</td>
						<td class="align-middle text-left">'.$row['task_class'].'</td>
						<td class="align-middle text-left">'.$row['task_method'].'</td>
						<td class="align-middle text-left">'.$row['task_dir'].'</td>
						<td class="align-middle text-center">
							<div class="row text-center">
								<div class="col-md-5 py-0 px-1">
									<a href="#" class="btn btn-sm btn-block btn-outline-info btn-edit-task"  data-toggle="modal" data-target="#mdlEditTask" data-backdrop="static" data-keyboard="false" 
										task-id="'.$row['task_id'].'" 
										task-name="'.$row['task_name'].'" 
										task-cat="'.$row['task_cat'].'" 
										class-name="'.$row['task_class'].'" 
										method-name="'.$row['task_method'].'" 
										task-dir="'.$row['task_dir'].'">Edit</a>
								</div>
								<div class="col-md-5 py-0 px-1">
									<a href="#" class="btn btn-sm btn-block btn-outline-danger btn-del-task" id="btnDeleteUser" task-id="'.$row['task_id'].'">Delete</a>
								</div>
							</div>
						</td>
					</tr>
				';
			}

			// Close table
			$html .= '</tbody></table>';

			// Send json encoded success response 
			echo json_encode(array('success'=>true, 'data'=>$html));
		}
		else echo json_encode(array('success'=>false, 'data'=>$result['data']));
	}

	/**
	 * Get list option unique task category
	 * 
	 * @return [type] [description]
	 */
	public function task_cat_list()
	{	
		$result = $this->tasks_model->get_task_cat();

		if($result['status'] == true)
		{
			$html = '';

			foreach($result['data'] as $row) $html .= '<option value="'.$row['task_cat'].'"></option>';

			echo json_encode(array('success'=>true, 'data'=>$html));
		}
		else echo json_encode(array('success'=>false, 'data'=>$result['data']));
	}

	/**
	 * Create new task
	 * 
	 * @return [type] [description]
	 */
	public function create_task()
	{
		// Set validation rules for user inputs
		$this->form_validation->set_rules('txtTaskCat', 'Task Category', 'required');
		$this->form_validation->set_rules('txtTaskName', 'Task Name', 'required');
		$this->form_validation->set_rules('txtClassName', 'Task Desc', 'required');
		$this->form_validation->set_rules('txtMethodName', 'Task Desc', 'required');

		// If valid inputs
		if($this->form_validation->run() == true)
		{
			$form_data = array(
				'task_cat'	  => $this->input->post('txtTaskCat'), 
				'task_name'   => $this->input->post('txtTaskName'), 
				'task_class'  => strtolower($this->input->post('txtClassName')), 
				'task_method' => strtolower($this->input->post('txtMethodName')), 
				'task_dir'    => strtolower($this->input->post('txtDir'))  
			);

			// Query
			$result = $this->tasks_model->save_task($form_data);

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

				// Send json encoded message in ajax response
				echo json_encode(array('success'=>true, 'data'=>$html));
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

				// Send json encoded message in ajax response
				echo json_encode(array('success'=>false, 'data'=>$html));
			}
		}
		else{
			// Validation error message
			$html = '
				<div class="alert alert-danger rounded-0" role="alert"> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				  	<strong>Oops!</strong> '.validation_errors().'
				</div>
			';

			// Send json encoded message in ajax response
			echo json_encode(array('success'=>false, 'data'=>$html));
		}
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
		$this->form_validation->set_rules('txtEditTaskCat', 'Task Category', 'required');
		$this->form_validation->set_rules('txtEditTaskName', 'Task Name', 'required');
		$this->form_validation->set_rules('txtEditClassName', 'Task Desc', 'required');
		$this->form_validation->set_rules('txtEditMethodName', 'Task Desc', 'required');

		// If valid inputs
		if($this->form_validation->run() == true)
		{	
			$task_id = $this->input->post('txtEditTaskId');
			$task_data = array(
				'task_cat'	  => $this->input->post('txtEditTaskCat'), 
				'task_name'   => $this->input->post('txtEditTaskName'), 
				'task_class'  => strtolower($this->input->post('txtEditClassName')), 
				'task_method' => strtolower($this->input->post('txtEditMethodName')), 
				'task_dir'    => strtolower($this->input->post('txtEditDir'))  
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

				// Send json encoded message in ajax response
				echo json_encode(array('success'=>true, 'data'=>$html));
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

				// Send json encoded message in ajax response
				echo json_encode(array('success'=>false, 'data'=>$html));
			}
		}
		else{
			// Validation error message
			$html = '
				<div class="alert alert-danger rounded-0" role="alert"> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				  	<strong>Oops!</strong> '.validation_errors().'
				</div>
			';

			// Send json encoded message in ajax response
			echo json_encode(array('success'=>false, 'data'=>$html));
		}
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

		if($result['status'] == true) echo json_encode(array('success'=>true, 'data'=>$result['data']));
		else echo json_encode(array('success'=>false, 'data'=>$result['data']));
	}
}
?>