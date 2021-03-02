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
			$isOfficial = $this->oscs_model->confirmPermission($id,4);
			$this->session->set_userdata("permissionOfficial",$isOfficial);
			if($isOfficial)
			{
				$result = $this->oscs_model->getUserInfo($id);
				foreach($result as $row)
				{
					$name = $row->first_name." ".$row->middle_name." ".$row->last_name." ".$row->suffix_name; 
					$dep_id = $row->department_id;
					$this->session->set_userdata("user_name",$name);
					$this->session->set_userdata("depID",$dep_id);
				}
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
			$data["user_name"] = $this->session->userdata("user_name");
			$dep = $this->session->userdata("depID");
			$no_of_students = $this->oscs_model->totalNumberOfStudents();
			$scYear_list= $this->oscs_model->getScYears();

			foreach ($no_of_students as $row) {
				$data["totalStudents"] = $row->number_of_students;
				$totalStud = $row->number_of_students;
			}

			$current_clearance_info = $this->oscs_model->getCurrentClearanceData();
			foreach($current_clearance_info as $row)
			{
				$scYear = $row->sc_year_id;
				
				$sem = $row->semester;
				
			}

			foreach($scYear_list as $row)
			{
				if($row->id == $scYear)
				{
					$data["scYear"] = $row->school_years;
				}
			}
			
			if($sem == 1)
			{
				$data["sem"] = "1st";
			}
			else
			{
				$data["sem"] = "2nd";
			}
			
			
			$unreviewed = $this->oscs_model->checkForUnreviewedEntries($dep,$scYear,$sem);
			if(!empty($unreviewed))
            {
            	$course_list = $this->oscs_model->getCourses();
            	$year_list = $this->oscs_model->getYear();
            	$stop = 0;
            	foreach ($year_list as $row1) {

            		$data["Year"] = $row1->level;
            		$year_lvl = $row1->id;
            		

            		foreach ($course_list as $row2) {

            			$data["Course"] = $row2->course_name;
            			$course = $row2->id;
            			
            			$unreviewed = $this->oscs_model->getUnvreviewedEntries($dep,$scYear,$sem,$course,$year_lvl);

            			if(!empty($unreviewed))
            			{
            				$data["unreviewed_list"] = $unreviewed;
            				$this->load->view('clearingofficial_dashboard1',$data);
            				$stop = 1;
            				break;
            			}      
            		}

            		if($stop == 1)
            		{
            			break;
            		}
            	}
            }
            else
            {
            	$this->load->view('clearingofficial_dashboard',$data);
            }	

            if($this->input->post("submit"))
			{
				$data_form = $this->input->post(NULL,TRUE);
				if($data_form)
				{
					foreach ($unreviewed as $row) {
						$id = $row->entry_id;

						$deficiency = $data_form[$id];
						if($deficiency == "")
						{
							$deficiency = "Clear";
						}
	
						$this->oscs_model->updateDeficiency($id,$deficiency);
					}
				}

				redirect("official_control/mainPage");
			}

		}
		else
		{
			redirect("main/index");
		}
	}


	public function review_student_clearance($year=null,$course=null)
	{
		$isOfficial = $this->session->userdata("permissionOfficial");
		if($isOfficial)
		{
			$dep = $this->session->userdata("depID");
			$data["user_name"] = $this->session->userdata("user_name");
			$data["course_list"] = $this->oscs_model->getCourses();
			$data["year_list"] = $this->oscs_model->getYear();

			$current_clearance_info = $this->oscs_model->getCurrentClearanceData();
			foreach($current_clearance_info as $row)
			{
				$scYear = $row->sc_year_id;
				$sem = $row->semester;
			}

			$data["students_list"] = $this->oscs_model->getClearanceEntries2($dep,$scYear,$sem,$course,$year);

			$this->load->view('review_student_clearance',$data);

			if($this->input->post("filter"))
			{
				$data_form = $this->input->post(NULL,TRUE);
				if($data_form)
				{
					$c = $data_form["Course"];
					$y = $data_form["Year"];

					if($c == "#" && $y == "#")
					{
						redirect("official_control/review_student_clearance");
					}
					else
					{
						redirect("official_control/review_student_clearance/".$c."/".$y);
					}
				}
			}


		}
		else
		{
			redirect("main/index");
		}
		

	}

	public function clearStudent($studNum)
	{
		$dep = $this->session->userdata("depID");
		$id = $this->session->userdata("user_id");

		$this->oscs_model->clearClearance($studNum, $dep, $id);
		redirect("official_control/review_student_clearance");
	}

	public function unclearStudent($studNum)
	{
		$dep = $this->session->userdata("depID");
		$id = $this->session->userdata("user_id");
		$def = "Not Cleared";

		$this->oscs_model->unclearClearance($studNum, $dep, $def, $id);
		redirect("official_control/review_student_clearance");
	}

	public function logout()
	{
		redirect("main/index");
	}

}
