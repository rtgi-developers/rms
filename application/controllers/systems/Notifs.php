<?php  
/**
 * Manage system notifications
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

		// Load helpers
		$this->load->helper('auth_helper');

		// Load models
		$this->load->model('systems/notifs_model');
	}

	/**
	 * Default method 
	 * 
	 * @return [type] [description]
	 */
	public function index()
	{
		// New notification message in page description
		$result = $this->notifs_model->num_unread_notif($this->session->userdata('_userid'));
		if($result['status'] == true) 
		{
			$page_description   = "You have ".$result['data']." unread notifications";
			$unread_notif_count = $result['data'];
		}
		else {
			$page_description   = "No new notifications";	
			$unread_notif_count = 0;
		} 


		$html = '
			<style>
				.col-wd-1000{
					word-wrap: break-word;
					min-width: 1000px;
					max-width: 1000px;
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
				<div class="col-md-8 pr-0">
					<div class="input-group">
					    <span class="input-group-prepend">
					    	<div class="input-group-text order-right-0 border bg-whitesmoke"><i class="la la-search"></i></div>
					    </span>
					    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke table-tool-input" type="search" id="txtSearchNotifs" placeholder="Search all notifications">
					</div>
				</div>
				<div class="col-md-4">
					<div class="btn-group" role="group" aria-label="Basic example">
					  <button type="button" class="btn btn-sm btn-outline-light btn-outline-light border-gainsboro-2 text-dark px-2 text-nowrap"><i class="las la-star text-warning"></i> New Notification <span class="badge badge-light bg-gainsboro-2">'.$unread_notif_count.'</span></button>
					  <button type="button" class="btn btn-sm btn-outline-light btn-outline-light border-gainsboro-2 text-dark px-2 text-nowrap"><i class="las la-check-double text-success"></i> All Notification <span class="badge badge-light bg-gainsboro-2" id="spanNumAllNotif">0</span></button>
					</div>
				</div>
			</div>
			
			<!-- Table -->
			<div class="row">
			<div class="col-md-12">
			<table class="table table-sm table-hover border border-gainsboro-2" id="tblNotifs">
				<thead>
					<tr class="bg-whitesmoke">
						<td></td>
						<td class="align-middle text-nowrap font-weight-bold small py-3 text-left col-wd1000">Notification Messages</td>
					</tr>
				</thead>
				<tbody>
		';

		// Query to get notification by user 
		$result = $this->notifs_model->get_notifs_by_user($this->session->userdata('_userid'));

		if($result['status'] == true)
		{	
			foreach($result['data'] as $row)
			{	

				// Notification status icons
				if($row['is_read']==1) $notif_status = '<i class="las la-check-double text-success"></i>';
				else $notif_status = '<i class="las la-star text-warning"></i>';

				$html .= '
					<tr>
						<td class="align-top text-right">'.$notif_status.'</td>
						<td class="align-middle text-left col-wd-1000 text-truncate" data-sort="'.date('Ymd', strtotime($row['time_posted'])).'">
							<span>'.$row['notif_msg'].'</span><br>
							<span class="text-secondary small"><a href="#" class="lnk-read-full-notif" notif-msg="'.$row['notif_msg'].'">Read full notification</a> |  Posted by '.$row['name'].' on '.date('D, d M Y', strtotime($row['time_posted'])).' at '.date('H:m:i', strtotime($row['time_posted'])).'</span>
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
		
		// Mark as read or seen
		$html .= $this->mark_notif_read($unread_notif_count);

		$page['title']        = "Notifications";
		$page['description']  = $page_description;
		$page['table_notifs'] = $html;

		$this->load->view('systems/notifs_view', $page);
	}

	/**
	 * Mark unread notifs as read
	 * 
	 * @param  int 		$unread_notif_count 	Number of unread notifs
	 * @return string                     
	 */
	public function mark_notif_read($unread_notif_count)
	{
		if($unread_notif_count > 0)
		{
			$result = $this->notifs_model->mark_read_by_user($this->session->userdata('_userid'));

			if($result['status'] == false)
			{
				$html = '
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  	<strong>Attention!</strong> Could not update notification status as read. Following error occurred: <br>
					  		'.$result['data'].'
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
				';

				return $html;
			}
		}
	}

	/**
	 * Count unread notification and show marked bell 
	 * icon for current icon.
	 * 
	 * @return [type] [description]
	 */
	public function count_unread_notif()
	{
		$result = $this->notifs_model->num_unread_notif($this->session->userdata('_userid'));

		if($result['status'] == true)
		{
			$html = '
				<i class="lar la-bell text-white" style="font-size: 26px;"></i>
				<span class="badge badge-danger notif-badge">'.$result['data'].'</span>
			';

			$json_data = array(
				'status' => 'success', 
				'title'  => 'New notifications!', 
				'data'   => $html
			);
		}
		else {
			$html = '<i class="lar la-bell text-white" style="font-size: 24px;"></i>';

			$json_data = array(
				'status' => 'error', 
				'title'  => 'Oops!', 
				'data'   => $html
			);
		}

		// Send json encoded ajax response
		echo json_encode($json_data);
	}
}