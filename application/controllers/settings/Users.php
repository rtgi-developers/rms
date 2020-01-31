<?php  
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * Users settings
 * 
 * @package CI
 * @subpackage Contoller
 * @author MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Users extends CI_Controller
{	
	/**
	 * Constructor function
	 */
	public function __construct()
	{
		parent::__construct();

		// Load helpers
		$this->load->helper('auth_helper');

		// Load models
		$this->load->model(array('settings/users_model', 'settings/tasks_model'));

		// Email configuration

		/* WORKED OUTLOOK */
		$config = array(
		  'mailtype' => 'html', 
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.live.com',
		  'smtp_crypto' => 'tls', 
		  'smtp_port' => 587,
		  'smtp_user' => $this->config->item('email_1'),
		  'smtp_pass' => $this->config->item('epass_1'),
		  'charset'    => 'utf-8',
		  'newline'    => "\r\n"
		);

		$this->load->library('email', $config);
	}

	/**
	 * Users settings page 
	 * 
	 * @return [boject] [Users view page]
	 */
	public function index()
	{
		$page['title']       = "Users";
		$page['description'] = "Use permission manager to grant access rights to other users.";
		$page['content']     = $this->show_users_table();

		$this->load->view('settings/users_view', $page);
	}

	/**
	 * Get users table in html table
	 * 
	 * @return [json] [Html table contains users details]
	 */
	public function show_users_table()
	{
		// Query to get users list
		$result = $this->users_model->get_users();

		// Validate query result
		if($result['status'] == true)
		{	
			// Html table
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

				<!-- Table actions -->
				<div class="row mb-2">
					<div class="col-md-10 pr-0">
						<div class="input-group">
						    <span class="input-group-prepend">
						    	<div class="input-group-text order-right-0 border bg-whitesmoke"><i class="la la-search"></i></div>
						    </span>
						    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchUsers" placeholder="Search all users">
						</div>
					</div>
					<div class="col-md-2 text-right export-buttons">
						<button id="btnInviteUser" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2" data-backdrop="static" data-keyboard="false">
							<i class="las la-user-plus la-lg"></i> Invite New User
						</button>
					</div>
				</div>
				<table class="table table-sm border border-gainsboro-2 table-borderles" id="tblUsers">
					<thead>
						<tr class="bg-light">
							<th class="align-middle text-left">Name</th>
							<th class="align-middle text-left">Email</th>
							<th class="align-middle text-left">Title</th>
							<th class="align-middle text-left">Role</th>
							<th class="align-middle text-left">Status</th>
							<th class="align-middle text-center"></th>
							<th class="align-middle text-center"></th>
							<th class="align-middle text-center"></th>
						</tr>
					</thead>
					<tbody>
			';

			// Loop through resutl data and print rows
			foreach($result['data'] as $row)
			{
				// Pending or Verified user status
				if($row['is_verified'] == 1)
				{
					$user_status = 'VERIFIED'; 
					$button_verify = "";
				}
				else{
					$user_status = 'PENDING';
					$button_verify = '
						<a href="#" class="btn btn-outline-success btn-sm btn-block text-nowrap btn-verify-user" user-id="'.$row['user_id'].'" user-email="'.$row['email'].'" id="btnVerifyUser'.$row['user_id'].'" user-name="'.$row['name'].'"><i class="las la-user-check"></i> Verify</a>
					';
				} 

				// Print table rows
				$html .= '
					<tr>
						<td class="align-middle text-left">'.$row['name'].'</td>
						<td class="align-middle text-left">
							<a href="mailto:'.$row['email'].'" class="text-decoration-none">
								'.$row['email'].'
							</a>
						</td>
						<td class="align-middle text-left">'.$row['title'].'</td>
						<td class="align-middle text-left">'.$row['role'].'</td>
						<td class="align-middle text-left">'.$user_status.'</td>
						<td class="align-middle text-center">
							<a href="'.base_url('settings/users/user_permissions?userid='.base64_encode($row['user_id']).'&username='.base64_encode($row['name']).'&useremail='.base64_encode($row['email']).'&userrole='.base64_encode($row['role'])).'" class="btn btn-sm btn-block btn-outline-info text-nowrap" user-name="'.$row['name'].'" user-email="'.$row['email'].'">Manage Permissions</a>
						</td>
						<td class="align-middle text-center">
							<a href="#" class="btn btn-sm btn-block btn-outline-danger text-nowrap btn-delete-user" id="btnDeleteUser'.$row['user_id'].'" user-id="'.$row['user_id'].'"><i class="lar la-trash-alt"></i> Delete</a>
						</td>
						<td class="align-middle text-center">
							'.$button_verify.'
						</td>
					</tr>
				';
			}

			// Close table
			$html .= '</tbody></table>';

			return $html;
		}
		else return $result['data'];
	}

	/**
	 * Get user permissions by user id
	 * 
	 * @return [type]        [description]
	 */
	public function user_permissions()
	{	
		// Decode parameter
		$userid    = base64_decode($this->input->get('userid'));
		$username  = base64_decode($this->input->get('username'));
		$useremail = base64_decode($this->input->get('useremail'));
		$userrole  = base64_decode($this->input->get('userrole'));

		// Data to be sent on page
		$page['title']       = "User Permissions";
		$page['description'] = "Add or edit user permissions for $username (<a href='mailto: $useremail' class='text-decoration-none'>$useremail</a>).";
		$page['tasks']       = $this->show_tasks_table($userid, $username, $userrole);
		
		// Load permissions view page
		$this->load->view('settings/perms_view.php', $page);
	}

	/**
	 * Show tasks table for user permissions
	 * 
	 * @param  [type] $userrole [description]
	 * @return [type]           [description]
	 */
	public function show_tasks_table($userid, $username, $userrole)
	{
		if($userrole == 'ADMIN')
		{
			$html = '
				<div class="alert alert-info alert-dismissible rounded-0 fade show" role="alert">
					<i class="las la-info-circle la-lg text-primary"></i>
				  	The user is an admin and have access all to tasks and functions of this sytem.
				  	<a href="javascript:history.back()" class="btn btn-primary btn-sm">&larr; Go Back</a>
				</div>
			';
		}
		else{
			// Query to get only permission required tasks
			$result = $this->tasks_model->get_perm_req_tasks();

			// Validate query result
			if($result['status'] == true)
			{
				$html = '
					<div class="d-flex flex-rw border border-gainsboro-2 mb-3">
					  	<div class="p-2">
					  		Check individual task to give access permission or make this user admin to grant permission in all functions of the system.
					  	</div>
					  	<div class="p-2">
					  		<a href="#" class="btn btn-sm btn-primary text-nowrap align-middle" id="btnMakeAdmin" user-id="'.$userid.'" user-name="'.$username.'">Make Admin</a>
					  	</div>
					</div>
					<form id="formSaveUserPerms">
						<div class="form-group content-hide">
							<input type="text" name="txtUserId" value="'.$userid.'">
						</div>
						<div class="table-responsive-sm">
						<table class="table table-sm border table-borderles table-hover border-gainsboro-2" id="tblUserPerms">
							<tbody>
				';

				$task_cat = '';

				foreach($result['data'] as $row) 
				{
					// Print module name row only once
					if($row['task_cat'] != $task_cat)
					{
						$html .= '
							<tr class="bg-light">
								<th class="align-middle text-left px-5">'.str_replace('_', ' ', $row['task_cat']).'</th>
								<th class="align-middle text-center">
									<div class="row justify-content-center" data-toggle="buttons">
										<label class="btn btn-sm btn-block btn-outline-info cursor-pointer my-0 mx-1 col-md-2" for="rdoNone'.$row['task_cat'].'">
											<input type="radio" id="rdoNone'.$row['task_cat'].'" name="rdo'.$row['task_cat'].'" class="custom-control-input rdo-task-cat" task-cat="'.$row['task_cat'].'" value="None"> None
										</label>
										<label class="btn btn-sm btn-block btn-outline-info cursor-pointer my-0 mx-1 col-md-2" for="rdoPartial'.$row['task_cat'].'">
											<input type="radio" id="rdoPartial'.$row['task_cat'].'" name="rdo'.$row['task_cat'].'" class="custom-control-input rdo-task-cat" task-cat="'.$row['task_cat'].'" value="Partial"> Partial
										</label>
										<label class="btn btn-sm btn-block btn-outline-info cursor-pointer my-0 mx-1 col-md-2" for="rdoFull'.$row['task_cat'].'"> <input type="radio" id="rdoFull'.$row['task_cat'].'" name="rdo'.$row['task_cat'].'" class="custom-control-input rdo-task-cat" task-cat="'.$row['task_cat'].'" value="Full"> Full
										</label>
									</div>
								</th>
							</tr>
						';
					}

					// Get permission for current iteration task
					$perms = $this->users_model->get_user_perms($userid, $row['task_id']);

					// Validate query response
					if($perms['status'] == true && $perms['data'][0]['permission'] == 1)
					{
						$perm = 1;
						$chkd = "checked";
					}
					else{
						$perm = 0;
						$chkd = "";
					}

					// Tasks and permissions row
					$html .= '
						<tr>
							<td class="align-middle text-left pl-5">'.$row['task_name'].'</td>
							<td class="align-middle text-center">
								<div class="content-hide text-center">
									<input type="text" name="txtTaskIds[]" value="'.$row['task_id'].'" class="form-control form-control-sm m-1 text-center">
									<input type="text" name="txtPerms[]" id="txtTask'.$row['task_id'].'"  value="'.$perm.'" class="form-control form-control-sm m-1 text-center txt-task-cat-'.$row['task_cat'].'">
								</div>
								<div class="custom-control custom-checkbox">
								  	<input type="checkbox" class="custom-control-input cbx-task cbx-task-cat-'.$row['task_cat'].'" id="cbxPerm'.$row['task_id'].'" name="cbxPerms[]" task-id="'.$row['task_id'].'" value="" '.$chkd.'>
								  	<label class="custom-control-label" for="cbxPerm'.$row['task_id'].'"></label>
								</div>
							</td>
						</tr>
					';

					$task_cat = $row['task_cat'];
				}

				$html .= '
					</tbody></table></div>
						<div class="form-group text-right">
							<button type="submit" name="btnSaveUserPerms" id="btnSaveUserPerms" class="btn btn-sm btn-primary">Save Changes</button>
							<a href="'.base_url('settings/users').'" class="btn btn-sm btn-secondary">Cancel</a>
						</div>
					</form>';
			}
			else $html = '<div class="alert alert-danger rounded-0" role="alert">'.$result['data'].'</div>';
		}

		return $html; 
	}

	/**
	 * Make user an admin 
	 * 
	 * @return json Sucess or error response
	 */
	public function make_admin()
	{
		$user_id = $this->input->get('userid');

		// Query to update user role
		$result = $this->users_model->update_role($user_id, "ADMIN");

		if($result['status'] == true)
		{	
			// Success message
			$json_data = array(
				'status' => 'success', 
				'title'  => 'Done!', 
				'data'   => $result['data']
			);
		}
		else {
			// Error message
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
	 * Save user permission changes 
	 * 
	 * @return [json] [json encode html message]
	 */
	public function save_user_perms()
	{	
		// User inputs
		$user_id  = $this->input->post('txtUserId');
		$task_ids = $this->input->post('txtTaskIds');
		$perms    = $this->input->post('txtPerms');

		// Declare loop pre-processing variables
		$errors = array(); 	// Hold loop processing errors
		$i      = 0; 		// Iteration counter

		// Loop through task id array
		foreach ($task_ids as $task_id) {
			// Query to update user permissions
			$result = $this->users_model->save_user_perms($user_id, $task_id, $perms[$i]);

			// Update errors array if query failed
			if($result['status'] == false) array_push($errors, $result['data']);

			// Increment iteration counter
			$i++;
		}

		// Check for no errors during loop process
		if(empty($errors))
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
				'title'  => 'Done!', 
				'data'   => $html
			);
		}
		else{
			// Error message
			$html = '
				<div class="alert alert-danger rounded-0" role="alert"> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
					 <strong>Oops!</strong><br>
			';

			foreach($errors as $error) $html .= $error."<br>";
	
			$html .= '</div>';

			$json_data = array(
				'status' => 'error', 
				'title'  => 'Oops!', 
				'data'   => $html
			);
		}

		// Send json encoded message in ajax response
		echo json_encode($json_data);
	}

	/**
	 * Delete user by id
	 * 
	 * @return [json] [contains ajax status and data]
	 */
	public function delete_user()
	{
		// Query to delete user
		$result = $this->users_model->del_user($this->input->get('userid'));

		// Validate query response and send json encoded response to ajax
		if($result['status'] == true) 
		{	
			$json_data = array(
				'status' => 'success', 
				'title'  => 'User Deleted!', 
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
	 * Verify user by id
	 * 
	 * @return [json] [contains ajax status and data]
	 */
	public function verify_user()
	{
		// Query to delete user
		$result = $this->users_model->verify_user($this->input->get('userid'));

		// Validate query response and send json encoded response to ajax
		if($result['status'] == true)
		{ 
			// Email format HTML
			$this->email->set_mailtype('html');

			// Email header
			$this->email->from($this->config->item('email_1'), $this->config->item('app_title'));
			$this->email->to($this->input->get('useremail'));
			$this->email->subject($this->config->item('app_name').' account verified');

			// Email content
			$message = '
				<p>Hi '.$this->input->get('username').',</p>
				<p>Your '.$this->config->item('app_title').' account has been verified.</P>
				<p>Please click on below link to login to '.$this->config->item('app_title').'.</p>
				<p><a href="'.base_url('users/login').'">'.base_url('users/login').'</a></p>
				<br>
				<address>Best Regards,
				<br>Administrator,
				<br>'.$this->config->item('app_name').'</address>

				<p><em>This is an automatically system generated email, please do not reply to it.</em></p>
			';

			// Email content
			$this->email->message($message);

			// Email sent confirmation
			if($this->email->send()) 
			{	
				$json_data = array(
					'status' => 'success', 
					'title'  => 'User Verified!', 
					'data'   => $result['data']
				);
			}
			else 
			{
				$json_data = array(
					'status' => 'error', 
					'title'  => 'Oops!', 
					'data'   => $this->email->print_debugger()
				);
			}
		}
		else {
			$json_data = array(
				'status' => 'error', 
				'title'  => 'Oops!', 
				'data'   => $result['data']
			);
		}

		// Send json encoded reponse
		echo json_encode($json_data);
	}

	/**
	 * Invite new user
	 * 
	 * @return [type] [description]
	 */
	public function invite_user()
	{
		$user_email = $this->input->get('email');

		// Send invitation email
		$this->email->set_mailtype('html');

		// Email header
		$this->email->from($this->config->item('email_1'), $this->config->item('app_title'));
		$this->email->to($user_email);
		$this->email->subject("You’ve been invited to become an authorized user of ".$this->config->item('app_title'));

		// Email content
		$message = '
			<p>Good day '.strstr($user_email, '@', true).',</p>
			<p>We would like to invite you to become an authorized (that is, trusted) '.$this->config->item('app_name').' user. The process is simple, just follow the steps below.</P>
			<ol>
				<li>Create your account at <a href="'.base_url('users/register').'">'.base_url('users/register').'</a>.</li>
				<li>We approve your account after reviewing it.</li>
				<li>Once approved you will get a confirmation email.</li>
				<li>Login to 
					<a href="'.base_url('users/login').'">'.$this->config->item('app_title').'</a>
				</li>
			</ol>
			<br>'.$this->config->item('email_sign_1').'
		';

		// Email content
		$this->email->message($message);

		// Email sent confirmation
		if($this->email->send()) 
		{
			$json_data = array(
				'status' => 'success', 
				'title'  => 'Invitation sent!', 
				'data'   => 'Your invitation to '.$user_email.' has been sent.'
			);
		}
		else {	
			$json_data = array(
				'status' => 'error', 
				'title'  => 'Oops!', 
				'data'   => $this->email->print_debugger()
			);
		}

		// Send json encoded response
		echo json_encode($json_data);
	}
}

?>