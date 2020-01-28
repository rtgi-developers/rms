<?php  
defined('BASEPATH') or exit("No direct script access allowed.");

/**
 * Users settings
 * 
 * @package CI
 * @subpackage Contoller
 * @author MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Logs extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('auth_helper');

		$this->load->model('settings/logs_model');
	}

	public function index()
	{
		$page['title']       = "Logs"; 
		$page['description'] = "Shows only last 7 days users activity.";
		$page['content']	 = $this->show_logs_table();

		$this->load->view('settings/logs_view.php', $page);
	}

	public function show_logs_table()
	{	
		$result = $this->logs_model->get_user_logs();

		if($result['status'] == true)
		{
			$html = '
				<style>
					.col-wd-150{
						word-wrap: break-word;
						min-width: 150px;
						max-width: 150px;
					}
					.dataTables_filter, .dataTables_length, .dataTables_info{
						display: none;
					}
					.form-control:focus {
					    outline: 0 !important;
					    border-color: initial;
					    box-shadow: none;
					    background-color: white !important;
					}
				</style>
				<div class="row mb-2">
					<div class="col-md-10">
						<div class="input-group">
						    <span class="input-group-prepend">
						    	<div class="input-group-text order-right-0 border bg-whitesmoke"><i class="la la-search"></i></div>
						    </span>
						    <input class="form-control form-control-sm py-2 border-left-0 border bg-whitesmoke" type="search" id="txtSearchUserLogs" placeholder="Search all logs">
						</div>
					</div>
					<div class="col-md-2 export-buttons"></div>
				</div>

				<!-- Logs table -->
				<table class="table table-sm table-hover border border-gainsboro-2" id="tblUserLogs">
					<thead>
						<tr class="bg-whitesmoke">
							<td class="align-middle text-nowrap font-weight-bold small py-2 text-left">Request Time</td>
							<td class="align-middle text-nowrap font-weight-bold small py-2 text-center">User Id</td>
							<td class="align-middle text-nowrap font-weight-bold small py-2">Name</td>
							<td class="align-middle text-nowrap font-weight-bold small py-2">IP Address</td>
							<td class="align-middle text-nowrap font-weight-bold small py-2 col-wd-150">Browser</td>
							<td class="align-middle text-nowrap font-weight-bold small py-2 col-wd-150">Request URL</td>
							<td class="align-middle text-nowrap font-weight-bold small py-2">Request Metdod</td>
							<td class="align-middle text-nowrap font-weight-bold small py-2 col-wd-150">Request Data</td>
						</tr>
					</thead>
					<tbody>
			';

			if(count($result['data']) > 0)
			{
				foreach($result['data'] as $row)
				{	
					$requrl = base_url($row['req_directory'].$row['req_controller'].'/'.$row['req_method']);

					$html .= '
						<tr>
							<td class="align-middle text-left text-nowrap">'.$row['req_time'].'</td>
							<td class="align-middle text-center">'.$row['user_id'].'</td>
							<td class="align-middle">'.$row['name'].'</td>
							<td class="align-middle">'.$row['user_ip'].'</td>
							<td class="align-middle col-wd-150">'.$row['user_agent'].'</td>
							<td class="align-middle text-truncate text-break col-wd-150">'.$requrl.'<br><a href="#" class="show-full-content" user-name="'.$row['name'].'" td-content="'.$requrl.'">Show full content</a></td>
							<td class="align-middle">'.$row['req_type'].'</td>
							<td class="align-middle text-truncate text-break col-wd-150">'.$row['req_data'].'<br><a href="#" class="show-full-content" user-name="'.$row['name'].'" td-content="'.$row['req_data'].'">Show full content</a></td>
						</tr>
					';
				}	
			}
			else {
				$html .= '
					<tr>
						<td clas="align-middle text-center" colspan="8">There aren\'t any user logs.</td>
					</tr>
				';
			}

			$html .= '</tbody></table>';

			return $html;
		}
		else {
			// Error message
			$html = '
				<div class="alert alert-danger rounded-0 fade show" role="alert"> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				  	<strong>Oops! </strong>'.$result['data'].'
				</div>
			';

			return $html;
		}
	}
}