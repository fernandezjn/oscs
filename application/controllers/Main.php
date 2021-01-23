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
    $this->load->library('email');
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
                  	
                  	$identifyRole = $this->oscs_model->getUserRole($user_type);

                  		foreach($identifyRole as $row)
                    	{
                           
                            $user_role = $row->role;
                    	}

                    // if(!empty($this->input->post("remberMe")))
                    // {
                    //   $this->oscs_model->rememberUserLogin($u,$p);
                    // }

                  	if($user_role == "Administrator")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("admin_control/index/".$user_id);
                  	}
                  	else if($user_role == "Clearing Official")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("official_control/index/".$user_id);
                  	}
                  	else if($user_role == "Student")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("student_control/index/".$user_id);
                  	}
                  	else if($user_role == "Registrar")
                  	{
                  		$this->session->set_userdata('user_id', $user_id);
                    	redirect("registrar_control/index/".$user_id);
                  	}
                }
                else
                {
                    redirect("main/mainPage? message=Incorrect Username/Password");
                }
                
            }
        }
	}

	public function forgot_password()
	{
		$this->load->view('forgot_password');
    if($this->input->post("sendlink"))
    {
      $data_form = $this->input->post(NULL,TRUE);
        if($data_form)
        {
          $e = $data_form["emailInput"];
          $result = $this->oscs_model->forgotPass($e);
          if(!empty($result))
          {
            foreach($result as $row)
            {
              $user_id = $row->id;
              $user_name = $row->first_name." ".$row->middle_name." ".$row->last_name." ".$row->suffix_name;
            }
            $this->sendResetMail($user_id, $e, $user_name);
          }
          else
          {
            redirect("main/forgot_password?message=Email Unsuccessfully Sent | Email doesn't exist");
          }
        }
    }
	}

  public function sendResetMail($id, $email, $name) //not tested yet
  {
      
      $this->email->from('your@example.com', 'OSCS');
      $this->email->to($email);

      $this->email->subject('OSCS Password Reset');
      $this->email->message("Good Day ".$name." \n Here is the link to reset your password ".site_url('main/reset_password/'.$id.''));

      $this->email->send();
      redirect("main/mainPage?message=Email Successfully Sent");
  }

  public function reset_password($id)
  {
    $this->load->view('resetpassword');
    if($this->input->post("changePass"))
    {
      $data_form = $this->input->post(NULL,TRUE);
        if($data_form)
        {
          $p1 = $data_form["newPassInput"];
          $p2 = $data_form["retypePassInput"];

          if(strcmp($p1,$p2) == 0)
          {
              $this->oscs_model->resetPass($id, $p1);
              redirect("main/mainPage/?message=Password Reset Successfully");
          }
          else
          {
            redirect("main/reset_password/".$id."?message=Passwords doesn't match");
          }
         
          
        }
    }

  }


}
