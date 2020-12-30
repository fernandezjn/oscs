<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_control extends CI_Controller {

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
		//===== Authenticate User permission to the pages =====
		if($id!=null)
		{
			$this->session->set_userdata("user_id",$id);
			$isAdmin = $this->oscs_model->confirmPermission($id, 1);
			$this->session->set_userdata("permissionAdmin",$isAdmin);
			if($isAdmin)
			{
				redirect("admin_control/mainPage");
			}
			else
			{
				redirect("main/index");
			}
		}
		else
		{
				redirect("main/index");
		}
	}

	public function mainPage()
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$this->load->view('admin_dashboard');
		}
		else
		{
				redirect("main/index");
		}
	}

	public function logout()
	{
		redirect("main/index");
	}

}
