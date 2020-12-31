<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Official_control extends CI_Controller 
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
		//===== Authenticate User permission to the pages =====
		if($id!=null)
		{
			$this->session->set_userdata("user_id",$id);
			$isOfficial = $this->oscs_model->confirmPermission($id, 4);
			$this->session->set_userdata("permissionOfficial",$isOfficial);
			if($isOfficial)
			{
				redirect("official_control/mainPage");
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
		$isOfficial = $this->session->userdata("permissionOfficial");
		if($isOfficial)
		{
			echo "Welcome to Official Page";
			//$this->load->view('');
		}
		else
		{
			redirect("main/index");
		}		

	}

}