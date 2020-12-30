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
    $this->session->sess_destroy();
		$this->load->view('signin');
		//===== Login Authentication =====
		if($this->input->post("signin"))
		{
			$data_form = $this->input->post(NULL,TRUE);
            if($data_form)
            {
                $u = $data_form["usernameInput"];
                $p = $data_form["passwordInput"];
                $result = $this->oscs_model->login($u,$p);
              
                if(!empty($result))
                {
                    foreach($result as $row)
                    {
                           
                            $user_id = $row->id;
                            $user_type = $row->type;
                    }
                  	
                  	$identifyRole = $this->oscs_model->getRole($user_type);

                  		foreach($identifyRole as $row)
                    	{
                           
                            $user_role = $row->role;
                    	}

                    // if(!empty($this->input->post("remberMe")))
                    // {
                    //   $this->oscs_model->rememberUserLogin($u,$p);
                    // }

                  	if($user_role == "administrator")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("admin_control/index/".$user_id);
                  	}
                  	else if($user_role == "official")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("official_control/index/".$user_id);
                  	}
                  	else if($user_role == "student")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("student_control/index/".$user_id);
                  	}
                  	else if($user_role == "registrar")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("registrar_control/index/".$user_id);
                  	}
                }
                else
                {
                    redirect("main/mainPage? message=Incorrect Email/Password");
                }
                
            }
        }
	}

	public function aboutUS()
	{
		$this->load->view('aboutUs_view');
	}

}
