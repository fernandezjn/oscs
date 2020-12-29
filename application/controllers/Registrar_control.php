<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar_control extends CI_Controller 
{

	public function __construct()
	{
		//call CodeIgniter's default Constructor
		parent::__construct();
		//load database library manually
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
    	$this->load->library('form_validation');
		$this->load->library('session');
		//load Model
		$this->load->model('oscs_model');		
	}

	public function index($id=null)
	{
		// ===== Authenticate User permission to the pages =====
		// if($id!=null)
		// {
		// 	$this->session->set_userdata("user_id",$id);
		// 	$isAdmin = $this->user_model->confirm_user($id,"Admin");
		// 	$this->session->set_userdata("permission",$isAdmin);
		// 	if($isAdmin)
		// 	{
		// 		redirect("registrar/mainPage");
		// 	}
		// 	else
		// 	{
		// 		redirect("main/mainPage");
		// 	}
		// }
		// else
		// {
		// 		redirect("main/mainPage");
		// }
		echo "Welcome to Registrar Page";
	}

	public function mainPage()
	{
		echo "Welcome to Registrar Page";
		//$this->load->view('');

	}

}
