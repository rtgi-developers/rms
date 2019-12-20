<?php  
defined('BASEPATH') OR exit("No direct script access allowed");

/**
 * Register
 *
 * @package 	CI
 * @subpackage 	Controller 
 * @author 		MD TARIQUE ANWER <mtarique@outlook.com>
 */
class Register extends CI_Controller
{	
	/**
	 * Construtor method
	 */
	public function __construct()
	{
		parent::__construct();

		// Libraries
		$this->load->library('session');

		// Models
		$this->load->model('users/users_model');
	}

	/**
	 * Loads register page
	 * 
	 * @return [type] [description]
	 */
	public function index()
	{
		$page['title'] 		  = "Register";
		$page['description']  = "";

		$this->load->view('users/register_view.php', $page);
	}	

	/**
	 * Create/register new user account 
	 * 
	 * @return [type] [description]
	 */
	public function create_account()
	{
		// Set validation rules
		$this->form_validation->set_rules('txtNewUserName', 'Name', 'required');
		$this->form_validation->set_rules('txtNewUserEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('txtNewUserPswd', 'Password', 'required');

		// Check for valid user inputs
		if($this->form_validation->run() == true)
		{
			// User inputs and default users data for new account
			$users_data = array(
				'name'  	   => $this->input->post('txtNewUserName'),
				'email'		   => $this->input->post('txtNewUserEmail'),
				'password' 	   => password_hash($this->input->post('txtNewUserPswd'), PASSWORD_DEFAULT),
				'date_regd'    => date('Y-m-d H:i:s'),
				'role'         => 'BASIC', 
				'is_verified'  => 0
			);

			// Run add user insert query
			$result = $this->users_model->add_user($users_data);

			if($result['status'] == true)
			{
				// Success message
				$html = '
					<div class="alert alert-success rounded-0" role="alert"> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						 </button>
					  	<i class="fas fa-check-circle"></i> 
					  	<strong>Congratulations!</strong><br> 
					  	<small>Your account has been created but pending for verification. Only verified users can login, once verified you will be notified via email.</small>
					</div>
				';

				// Send json encoded response to database
				echo json_encode(array('success'=>true, 'data'=>$html));
			}
			else{
				// Error message
				$html = '
					<div class="alert alert-danger rounded-0" role="alert"> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						<strong>Oops!</strong><br> 
						<small>'.$result['data'].'</small>
					</div>	
				';

				echo json_encode(array('success'=>false, 'data'=>$html));
			}
		}
	}
}