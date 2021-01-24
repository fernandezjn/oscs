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
			$isStudent = $this->oscs_model->confirmPermission($id,3);
			$this->session->set_userdata("permissionStudent",$isStudent);
			if($isStudent)
			{
				$result = $this->oscs_model->getUserInfo($id);
				foreach($result as $row)
				{
					$name = $row->first_name." ".$row->middle_name." ".$row->last_name." ".$row->suffix_name; 
					$this->session->set_userdata("user_name",$name);
				}
				redirect("student_control/mainPage");
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
		$isStudent = $this->session->userdata("permissionStudent");
		if($isStudent)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$this->load->view('student_dashboard',$data);
		}
		else
		{
			redirect("main/index");
		}
		

	}

	public function view_clearance_record()
	{
		$isStudent = $this->session->userdata("permissionStudent");
		if($isStudent)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$this->load->view('view_student_clearance_record',$data);
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
