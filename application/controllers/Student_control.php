<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_control extends CI_Controller 
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
			$isAdmin = $this->oscs_model->confirmPermission($id,3);
			$this->session->set_userdata("permissionStudent",$isStudent);
			if($isStudnet)
			{
				redirect("student_control/mainPage");
			}
			else
			{
				redirect("main/mainPage");
			}
		}
		else
		{
			redirect("main/mainPage");
		}
	}

	public function mainPage()
	{
		$isStudent = $this->session->userdata("permissionStudent");
		if($isStudent)
		{
			echo "Welcome to Student Page";
			//$this->load->view('');
		}
		else
		{
			redirect("main/mainPage");
		}
		

	}

}
