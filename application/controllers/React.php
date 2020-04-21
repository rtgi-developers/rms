<?php 
/**
 * React playground
 *
 * @package 	Codeigniter
 * @subpackage  Controller
 * @author 		MD TARIQUE ANWER | mtarique@outlook.com
 * @copyright 	Copyright (c) 2019, Rituraj Textile & General Industries. (https://rituraj.com/)
 */
defined('BASEPATH') or exit('No direct script access allowed.');

class React extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 

        $this->load->helper('auth_helper');
    }

    /**
	 * View react playground page
	 *
	 * @return void
	 */
	public function index()
	{
		$page['title']       = "React Playground"; 
		$page['description'] = "Practicing playground for react.js."; 

		$this->load->view('react_view', $page); 
	}
}