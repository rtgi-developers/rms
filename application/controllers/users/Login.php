<?php  
defined('BASEPATH') OR exit("No direct script access allowed");

/**
 * Login
 *
 * @package 	CI
 * @subpackage 	Controller 
 * @author 		MD TARIQUE ANWER mtarique@outlook.com
 */
class Login extends CI_Controller
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
	 * Loads login page
	 * 
	 * @return [type] [description]
	 */
	public function index()
	{
		$page['title'] 		  = "Login";
		$page['description']  = "";

		$this->load->view('users/login_view.php', $page);
	}

	/**
	 * User login authentication
	 * 
	 * @return [type] [description]
	 */
	public function authenticate()
	{
		// User inputs
		$email = $this->input->post('txtUserEmail');
		$pswd  = $this->input->post('txtUserPswd');

		// Set form validauion rules
		$this->form_validation->set_rules('txtUserEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('txtUserPswd', 'Password', 'required');

		// Processing errors array
		$errors = array();

		// Validate user inputs 
		if($this->form_validation->run() == true)
		{	
			// Query to get user details
			$result = $this->users_model->get_user_by_email($email);

			// Validate query and verify password
			if($result['status'] == true && (!password_verify($pswd, $result['data'][0]['password'])))
			{
				array_push($errors, "Incorrect email or password.");
			}
			elseif($result['status'] == true && (password_verify($pswd, $result['data'][0]['password'])) && $result['data'][0]['is_verified'] == 0)
			{
				array_push($errors, "Your account is pending for verification. Please check back again.");
			}
			elseif($result['status'] == false) 
			{
				//array_push($errors, "Email id does not exist in our database.");
				array_push($errors, $result['data']);
			}
		}
		else array_push($errors, validation_errors());

		// Validate processings
		if(empty($errors))
		{	
			// Get active users data
			$sess_users_data = array(
				'_userid'   => $result['data'][0]['user_id'], 
				'_username' => $result['data'][0]['name'], 
				'_userrole' => $result['data'][0]['role'], 
				'_usertitle'=> $result['data'][0]['title']
			);

			// Set session for active user
			$this->session->set_userdata($sess_users_data);

			// Redirect to dashboard
			$html = '<script>window.location.href="'.base_url('home/dashboard').'"</script>';

			// Send json encoded ajax response
			echo json_encode(array('success'=>true, 'data'=>$html));
		}
		else{
			// Error message
			$html = '
				<div class="alert alert-danger rounded-0" role="alert"> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			';

			// Loop through errors and print
			foreach($errors as $error) $html .= '<small>'.$error.'</small>';

			// Close message div
			$html .= '</div>';

			// Send json encoded as ajax response
			echo json_encode(array('success'=>true, 'data'=>$html));
		}
	}	
}