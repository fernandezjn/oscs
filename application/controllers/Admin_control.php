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
				$result = $this->oscs_model->getUserInfo($id);
				foreach($result as $row)
				{
					$name = $row->first_name." ".$row->middle_name." ".$row->last_name." ".$row->suffix_name; 
					$this->session->set_userdata("user_name",$name);
				}
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
			$data["user_name"] = $this->session->userdata("user_name");
			$this->load->view('admin_dashboard',$data);
		}
		else
		{
				redirect("main/index");
		}
	}

	public function viewProfile()
	{

	}

	public function users()
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$data["users"] = $this->oscs_model->getUsers();
			$this->load->view('users',$data);
		}		
	}
	public function viewUserInfo($id)
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			
		}
	}
	public function editUserInfo($id)
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			
		}
	}
	public function deleteUser($id)
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$this->oscs_model->deleteUser($id);
			redirect("admin_control/users");
		}
	}

	public function add_user()
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$data["roles"] = $this->oscs_model->getRoles();
			$data["offices"] = $this->oscs_model->getOffices();
			$data["org"] = $this->oscs_model->getOrganizations();
			$data["positions"] = $this->oscs_model->getPositions();
			$data["year"] = $this->oscs_model->getYear();
			$data["courses"] = $this->oscs_model->getCourses();
			$data["student_types"] = $this->oscs_model->getStudent_types();
			$this->load->view('add_user',$data);

			if($this->input->post("addUser"))
			{
				$data_form = $this->input->post(NULL,TRUE);
	            if($data_form)
	            {
	                $role = $data_form["userRole"];
	                $uName = $data_form["userName"];
	                $pass = $data_form["pass"];
	                $lName = $data_form["lastName"];
	                $fName = $data_form["firstName"];
	                $mName = $data_form["middleName"];
	                if(!empty($data_form["suffixName"]))
	                {
	                	$sName = $data_form["suffixName"];
	                }
	                else
	                {
	                	$sName = "";
	                }	                
	                $email = $data_form["email"];
	                $contact = $data_form["contact"];

	                if(!empty($data_form["office"]))
	                {
	                	$office = $data_form["office"]; //Department
	                }
	                else
	                {
	                	$office = "";
	                }

	                if(!empty($data_form["org"]))
	                {
	                	$org = $data_form["org"];
	                }
	                else
	                {
	                	$org = "";
	                }
	                
	                if(!empty($data_form["position"]))
	                {
	                	$pos = $data_form["position"];
	                }
	                else
	                {
	                	$pos = "";
	                }
	                
	                if(!empty($data_form["studentNo"]))
	                {
	                	$studNo = $data_form["studentNo"];
	                }
	                else
	                {
	                	$studNo = "";
	                }

	                if(!empty($data_form["year"]))
	                {
	                	$year = $data_form["year"];
	                }
	                else
	                {
	                	$year = "";
	                }

	                if(!empty($data_form["course"]))
	                {
	                	$course = $data_form["course"];
	                }
	                else
	                {
	                	$course = "";
	                }

	                if(!empty($studType = $data_form["studentType"]))
	                {
	                	$studType = $data_form["studentType"];  
	                }
	                else
	                {
	                	$studType = "";  
	                }
	                
	                $this->oscs_model->addUser($uName,$pass,$role,$lName,$fName,$mName,$sName,$email,$contact, $studNo, $year, $course, $studType, $org, $office, $pos);
	                redirect("admin_control/users");
	                
				}
			}
		}
	}



	public function logout()
	{
		redirect("main/index");
	}



}
