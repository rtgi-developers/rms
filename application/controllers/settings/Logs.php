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

		$this->load->model(array('settings/users_model', 'settings/tasks_model'));
	}

	public function index()
	{
		$page['title']       = "Logs"; 
		$page['description'] = "Track users activity.";

		$this->load->view('settings/logs_view.php', $page);
	}

	public function get_logs()
	{	
		//$res = $this->_condition($this->input->post(), $this->input->get());
		//$method = $this->input->server('REQUEST_METHOD');
		//$method = json_decode($this->input->raw_input_stream, true); 
		$data = json_encode($this->input->post());
		echo json_encode(array('success'=>true, 'data'=>$data));
	}

	public function _condition($post, $get)
    {
        if (isset($post['submit'])) 
        {
            $ret = $post['submit'];
        } 
        else {
            if (isset($get['condition'])) {
                $ret = $get['condition'];
            } else {
                $ret = "Not Get nor POST";
            }
        }
        return $ret;
    }
}