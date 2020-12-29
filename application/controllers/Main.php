<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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

	public function index()
	{
		redirect("main/mainPage");

	}

	public function mainPage()
	{
		$this->load->view('home_view');
		// ===== Login Authentication =====
		// if($this->input->post("login"))
		// {
		// 	$data_form = $this->input->post(NULL,TRUE);
  //           if($data_form)
  //           {
  //               $e = $data_form["emailInput"];
  //               $p = $data_form["passwordInput"];
  //               $result = $this->user_model->login($e,$p);
              
  //               if(!empty($result))
  //               {
  //                   foreach($result as $row)
  //                   {
                           
  //                           $user_id = $row->id;
  //                           $user_role = $row->usertype;
  //                   }
                  
  //                 	if($user_role == "Admin")
  //                 	{
  //                 		$this->session->set_userdata('user_id', $user_id);
  //                   	redirect("Admin/index/".$user_id);
  //                 	}
  //                 	else if($user_role == "Teacher")
  //                 	{
  //                 		$this->session->set_userdata('user_id', $user_id);
  //                   	redirect("professor/index/".$user_id);
  //                 	}
  //                 	else if($user_role == "Student")
  //                 	{
  //                 		$this->session->set_userdata('user_id', $user_id);
  //                   	redirect("student/index/".$user_id);
  //                 	}                                       
  //               }
  //               else
  //               {
  //                   redirect("user/home? message=Incorrect Email/Password");
  //               }
                
  //           }
	}

	public function aboutUS()
	{
		$this->load->view('aboutUs_view');
	}

}
