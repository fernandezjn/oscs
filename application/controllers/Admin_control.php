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
			$data["user_name"] = $this->session->userdata("user_name");
			$data["user_info"] = $this->oscs_model->getUserInfo($id);
			$userInfo = $this->oscs_model->getUserInfo($id);
			foreach($userInfo as $row)
			{
				$offices = $this->oscs_model->getOffices();
				foreach($offices as $row1)
				{
					if($row->department_id == $row1->id)
					{
						$data["office"] = $row1->department_name;
						break;
					}
					else
					{
						$data["office"] = "";
					}
				}

				$organization = $this->oscs_model->getOrganizations();
				foreach($organization as $row2)
				{
					if($row->org_id == $row2->id)
					{
						$data["org"] = $row2->org_name;
						break;
					}
					else
					{
						$data["org"] = "";
					}
				}
	
				$position = $this->oscs_model->getPositions();
				foreach($position as $row3)
				{
					if($row->position_id == $row3->id)
					{
						$data["position"] = $row3->position_name;
						break;
					}
					else
					{
						$data["position"] = "";
					}
				}

				$year = $this->oscs_model->getYear();
				foreach($year as $row4)
				{
					if($row->year_id == $row4->id)
					{
						$data["year"] = $row4->level;
						break;
					}
					else
					{
						$data["year"] = "";
					}
				}

				$course = $this->oscs_model->getCourses();
				foreach($course as $row5)
				{
					if($row->course_id == $row5->id)
					{
						$data["course"] = $row5->course_name;
						break;
					}
					else
					{
						$data["course"] = "";
					}
				}

				$studType = $this->oscs_model->getStudent_types();
				foreach($studType as $row6)
				{
					if($row->student_type_id == $row6->id)
					{
						$data["studType"] = $row6->type;
						break;
					}
					else
					{
						$data["studType"] = "";
					}
				}
			}
			$this->load->view('view_user',$data);
		}
	}
	public function editUserInfo($id)
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$data["user_name"] = $this->session->userdata("user_name");	
			$data["user_info"] = $this->oscs_model->getUserInfo($id);
			$userInfo = $this->oscs_model->getUserInfo($id);
			foreach($userInfo as $row)
			{
				$offices = $this->oscs_model->getOffices();
				foreach($offices as $row1)
				{
					if($row->department_id == $row1->id)
					{
						$data["office"] = $row1->department_name;
						break;
					}
					else
					{
						$data["office"] = "";
					}
				}

				$organization = $this->oscs_model->getOrganizations();
				foreach($organization as $row2)
				{
					if($row->org_id == $row2->id)
					{
						$data["org"] = $row2->org_name;
						break;
					}
					else
					{
						$data["org"] = "";
					}
				}
	
				$position = $this->oscs_model->getPositions();
				foreach($position as $row3)
				{
					if($row->position_id == $row3->id)
					{
						$data["position"] = $row3->position_name;
						break;
					}
					else
					{
						$data["position"] = "";
					}
				}

				$year = $this->oscs_model->getYear();
				foreach($year as $row4)
				{
					if($row->year_id == $row4->id)
					{
						$data["year"] = $row4->level;
						break;
					}
					else
					{
						$data["year"] = "";
					}
				}

				$course = $this->oscs_model->getCourses();
				foreach($course as $row5)
				{
					if($row->course_id == $row5->id)
					{
						$data["course"] = $row5->course_name;
						break;
					}
					else
					{
						$data["course"] = "";
					}
				}

				$studType = $this->oscs_model->getStudent_types();
				foreach($studType as $row6)
				{
					if($row->student_type_id == $row6->id)
					{
						$data["studType"] = $row6->type;
						break;
					}
					else
					{
						$data["studType"] = "";
					}
				}
			}
			$data["role_list"] = $this->oscs_model->getRoles();
			$data["office_list"] = $this->oscs_model->getOffices();
			$data["org_list"] = $this->oscs_model->getOrganizations();
			$data["position_list"] = $this->oscs_model->getPositions();
			$data["year_list"] = $this->oscs_model->getYear();
			$data["course_list"] = $this->oscs_model->getCourses();
			$data["student_type_list"] = $this->oscs_model->getStudent_types();
			$this->load->view('edit_user', $data);

			if($this->input->post("save"))
			{
				$data_form = $this->input->post(NULL,TRUE);
	            if($data_form)
	            {
	                $role = $data_form["userRole"];
	                $uName = $data_form["userName"];
	                // $pass = $data_form["pass"];
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
	                
	                $this->oscs_model->editUserInfo($id,$uName,$role,$lName,$fName,$mName,$sName,$email,$contact, $studNo, $year, $course, $studType, $org, $office, $pos);
	                redirect("admin_control/viewUserInfo/".$id);

	            }
	        }
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
			$student_list = $this->oscs_model->getUsers("3");
			$users_list = $this->oscs_model->getUsers();
			$this->load->view('add_user',$data);

			if($this->input->post("addUser"))
			{
				$data_form = $this->input->post(NULL,TRUE);
	            if($data_form)
	            {
	                $role = $data_form["userRole"];
	                $uName = $data_form["userName"];
	                foreach($users_list as $row)
	                {
	                	if($uName == $row->username)
	                	{
	                		redirect("admin_control/add_user? message=Username Already Exist");
	                	}
	                }
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
	                	foreach($student_list as $row)
		                {
		                	if($studNo == $row->studNo)
		                	{
		                		redirect("admin_control/add_user? message=Student Number Already Exist");
		                	}
		                }
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

	public function initiate_clearance()
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$data["sc_year_list"] = $this->oscs_model->getScYears();
			$this->load->view('initiate_clearance',$data);

			if($this->input->post("initiateClearance"))
			{
				$data_form = $this->input->post(NULL,TRUE);
				if($data_form)
				{
					$sc_year = $data_form["scYear"];
					$sem = $data_form["sem"];
					$dueDate = $data_form["clearanceDueDate"];
					$existingClearance = $this->oscs_model->getCurrentClearanceData();
					foreach($existingClearance as $row)
					{
						if($sc_year == $row->sc_year_id && $sem == $row->semester)
						{
							redirect("admin_control/initiate_clearance? message=Clearance For This year and Sem Already Initiated");
						}
					}
					$this->oscs_model->newClearanceData($sc_year,$sem,$dueDate);

					$students_list = $this->oscs_model->getStudents();
					$departments_list = $this->oscs_model->getOffices();

					

					foreach($students_list as $row)
					{

						$studeNum = $row->student_number;
						foreach($departments_list as $row1)
						{
							$dep = $row1->id ;
							if($row1->id == '5')
							{
								for($pos = 0; $pos < 3; $pos++)
								{
									$this->oscs_model->createClearanceEntry($studeNum, $sc_year, $sem, $dep);
								}
							}
							else
							{
								$this->oscs_model->createClearanceEntry($studeNum, $sc_year, $sem, $dep);
							}
						}
					}

					redirect("admin_control/clearance_records");
				}
			}
		}
		
	}

	public function clearance_records($course=null,$year=null)
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$data["course_list"] = $this->oscs_model->getCourses();
			$data["year_list"] = $this->oscs_model->getYear();
			$data["students_list"] = $this->oscs_model->getStudents($year,$course);
			$this->load->view('clearance_records',$data);

			if($this->input->post("filter"))
			{
				$data_form = $this->input->post(NULL,TRUE);
				if($data_form)
				{
					$c = $data_form["Course"];
					$y = $data_form["Year"];

					if($c == "#" && $y == "#")
					{
						redirect("admin_control/clearance_records");
					}
					else
					{
						redirect("admin_control/clearance_records/".$c."/".$y);
					}
				}
			}
		}
		
	}

	public function view_clearance_record($id)
	{
		$scYear = null;
		$sem = null;
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$data["studID"] = $id;
			
			$data["scYear_list"] = $this->oscs_model->getScYears();
			$current_clearance_info = $this->oscs_model->getCurrentClearanceData();
			foreach($current_clearance_info as $row)
			{
				$scYear = $row->sc_year_id;
				$data["scYear"] = $row->sc_year_id;
				$data["scYear2"] = $row->school_years;

				$sem = $row->semester;

				if($row->semester == '1')
				{
					$data["currentSem"] = "1st";
					$data["currentSem2"] = "1";
				}
				else if($row->semester == '2')
				{
					$data["currentSem"] = "2nd";
					$data["currentSem2"] = "2";
				}
			}
			
			$data["student_info"] = $this->oscs_model->getStudent_info($id);
			$student_info = $this->oscs_model->getStudent_info($id);
			foreach ($student_info as $row) {
				$studNum = $row->student_number;
			}

			$data["ClearanceEntries"] = $this->oscs_model->getClearanceEntries($studNum,$scYear,$sem);


			$this->load->view('view_clearance_record',$data);


			if($this->input->post("filter"))
			{
				$data_form = $this->input->post(NULL,TRUE);
				if($data_form)
				{
					$year = $data_form["SchoolYear"];
					$semester = $data_form["Semester"];

					redirect("admin_control/view_clearance_records/".$id."/".$year."/".$semester);
				}
			}
		}
		
	}

	public function view_clearance_records($id,$year,$semester)
	{
		$isAdmin = $this->session->userdata("permissionAdmin");
		if($isAdmin)
		{
			$data["user_name"] = $this->session->userdata("user_name");
			$data["studID"] = $id;
			
			$data["scYear_list"] = $this->oscs_model->getScYears();
			$scYear_list = $this->oscs_model->getScYears();

			foreach($scYear_list as $row)
			{
				
				$data["scYear"] = $year;
				if($row->id == $year)
				{
					$data["scYear2"] = $row->school_years;
				}

				if($semester == '1')
				{
					$data["currentSem"] = "1st";
					$data["currentSem2"] = "1";
				}
				else if($semester == '2')
				{
					$data["currentSem"] = "2nd";
					$data["currentSem2"] = "2";
				}
			}
			
			$data["student_info"] = $this->oscs_model->getStudent_info($id);
			$student_info = $this->oscs_model->getStudent_info($id);
			foreach ($student_info as $row) {
				$studNum = $row->student_number;
			}

			$data["ClearanceEntries"] = $this->oscs_model->getClearanceEntries($studNum,$year,$semester);


			$this->load->view('view_clearance_record',$data);


			if($this->input->post("filter"))
			{
				$data_form = $this->input->post(NULL,TRUE);
				if($data_form)
				{
					$year = $data_form["SchoolYear"];
					$semester = $data_form["Semester"];

					redirect("admin_control/view_clearance_records/".$id."/".$year."/".$semester);
				}
			}
		}
		
	}

	public function clearRegOffice($studNum,$id)
	{
		$coID = $this->session->userdata("user_id");
		$dep = '10';
		$this->oscs_model->clearClearance($studNum, $dep,$coID);
		redirect("admin_control/view_clearance_record/".$id);


	}
	public function unclearRegOffice($studNum,$id)
	{
		$coID = $this->session->userdata("user_id");
		$dep = '10';
		$this->oscs_model->unclearRegOffClearance($studNum, $dep,$coID);
		redirect("admin_control/view_clearance_record/".$id);
	}

	public function yeet()
	{

	}


}
