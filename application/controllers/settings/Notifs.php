<?php  
/**
 * Manage system notification settings
 *
 * @package 	Codeigniter
 * @subpackage 	Controller
 * @author  	MD TARIQUE ANWER | mtarique@outlook.com
 */
defined('BASEPATH') or exit("No direct script access allowed.");

class Notifs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');

		$this->load->model(array('settings/notifs_model'));
	}

	public function index()
	{	
		$page['title']       = "Notifications";
		$page['description'] = "Manage system notifications.";
		$page['content']	 = $this->show_notif_table();

		$this->load->view('settings/notifs_view', $page);
	}

	/**
	 * Show notification table 
	 * 
	 * @return [type] [description]
	 */
	public function show_notif_table()
	{
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
					    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchNotifs" placeholder="Search all notifications">
					</div>
				</div>
				<div class="col-md-2 text-right export-buttons">
					<a href="#" id="lnkCreateNotif" class="btn btn-primary btn-sm btn-block text-nowrap border-gainsboro-2" data-toggle="modal" data-target="#mdlCreateNotif" data-backdrop="static" data-keyboard="false"><i class="las la-plus-circle la-lg"></i> Create Notification</a>

				</div>
			</div>
			
			<!-- Table -->
			<div class="row">
			<div class="col-md-12">
			<table class="table table-sm table-hover border border-gainsboro-2" id="tblNotifs">
				<thead>
					<tr class="bg-whitesmoke">
						<td class="align-middle text-nowrap font-weight-bold small py-2 text-center">Id</td>
						<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">
							Notification Messages
						</td>
						<td class="align-middle text-nowrap font-weight-bold small py-2">Posted by</td>
						<td class="align-middle text-nowrap font-weight-bold small py-2">Posted Datetime</td>
						<td class="align-middle text-nowrap font-weight-bold small py-2"></td>
					</tr>
				</thead>
				<tbody>
		';

		// Query to get all notification
		$result = $this->notifs_model->get_notifs();

		// Validate query status
		if($result['status'] == true)
		{	
			foreach($result['data'] as $row)
			{	
				$html .= '
					<tr>
						<td class="align-middle text-center">'.$row['notif_id'].'</td>
						<td class="align-middle text-left col-wd-200 text-truncate">'.$row['notif_msg'].'</td>
						<td class="align-middle">'.$row['name'].'</td>
						<td class="align-middle text-left text-nowrap">'.$row['time_posted'].'</td>
						<td class="align-middle text-center">
							<a href="#" class="lnk-del-notif text-danger" notif-id="'.$row['notif_id'].'">
								<i class="las la-trash la-lg"></i>
							</a>
						</td>
					</tr>
				';
			}
		}
		else {
			$html = '
				<tr>
					<td class="align-middle" colspan="4">'.$result['data'].'</td>
				</tr>
			';
		}

		$html .= '</body></table>';	

		return $html;
	}

	/**
	 * Show recipients
	 * 
	 * @return [type] [description]
	 */
	public function show_rcpts()
	{
		$result = $this->notifs_model->get_rcpts();

		if($result['status'] == true)
		{	
			$html = '';
			foreach ($result['data'] as $row) 
			{
				$html .= '
					<tr>
						<td class="align-middle text-left pr-0">
							<div class="custom-control custom-checkbox">
							  	<input type="checkbox" 
								  class="custom-control-input cbx-rcpt" 
								  id="cbxRcpt'.$row['user_id'].'"
								  value="'.$row['user_id'].'" user-id="'.$row['user_id'].'">
								<label class="custom-control-label" 
								  for="cbxRcpt'.$row['user_id'].'"></label>
								<input type="text" id="txtIsSel'.$row['user_id'].'" value="0" name="txtIsSelRcpts[]" class="content-hide txt-is-sel">
								<input type="text" id="txtUserId'.$row['user_id'].'" value="'.$row['user_id'].'" name="txtUserIds[]" class="content-hide">
							</div>
						</td>
						<td class="align-middle text-left">'.$row['name'].'</td>
						<td class="align-middle text-left"><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>
						<td class="align-middle text-left">'.$row['title'].'</td>
					</tr>
				';
			}

			$json_data = array(
				'status' => 'success', 
				'title'  => 'Recipients List', 
				'data'   => $html
			);
		}
		else {
			$html = '<tr><td class="align-middle text-center" colspan="3">'.$result['data'].'</td></tr>';

			$json_data = array(
				'status' => 'error', 
				'title'  => 'Oops!', 
				'data'   => $html
			);
		}

		// Send json encoded data as response
		echo json_encode($json_data);
	}

	/**
	 * Create new notification 
	 *
	 * @return json
	 */
	public function create_notif()
	{
		$sel_rcpts   = $this->input->post('txtIsSelRcpts');
		$rcpts_ids   = $this->input->post('txtUserIds');
		$notif_msg   = $this->input->post('txtNotifMsg');
		$user_posted = $this->session->userdata('_userid');

		$result = $this->notifs_model->save_notif($notif_msg, $user_posted);

		if($result['status'] == true)
		{
			// Declare loop pre-processing variables
			$errors = array(); 	// Hold loop processing errors
			$i      = 0; 		// Iteration counter
			$notif_id = $result['data'];

			foreach($rcpts_ids as $rcpt_id)
			{
				if($sel_rcpts[$i] == 1)
				{	
					$result = $this->notifs_model->add_rcpts($notif_id, $rcpt_id);

					if($result['status'] == false) array_push($errors, $result['data']);
				}

				$i++;
			}

			// Validate processing result
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
					'title'  => 'Notification Created!', 
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

				// Loop through errors
				foreach($errors as $error) $html .= $error."<br>";
		
				$html .= '</div>';

				$json_data = array(
					'status' => 'error', 
					'title'  => 'Oops!', 
					'data'   => $html
				);
			}
		}
		else {
			$html = '
					<div class="alert alert-danger rounded-0" role="alert"> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						 </button>
					  	<strong>Oops! </strong> '.$result['data'].'
					</div>
				';

			$json_data = array(
					'status' => 'error', 
					'title'  => 'Oops!', 
					'data'   => $html
				);
		}

		echo json_encode($json_data);
	}

	/**
	 * Delete notification by id
	 * 
	 * @return json
	 */
	public function delete_notif()
	{
		// Call model for query to delete notification 
		$result = $this->notifs_model->del_notif($this->input->get('notifid'));

		// Query response 
		if($result['status'] == true) 
		{
			$json_data = array(
				'status' => 'success', 
				'title'  => 'Notification Deleted!', 
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

?>