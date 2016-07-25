<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function index()
	{
		$this->load->view('login');
	}

	


	public function signup()
	{

		$this->load->view("signuppage");
	}

	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	


	public function restrict()
	{
		$this->load->view('restricted');
	}

	




	public function members()
	{


		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('members');
		}
		else
			{
				redirect('main/restrict');

			}
	}

	public function validate_credentials()
	{
		$this->load->model('model_users');


		 if($this->model_users->can_log_in())
    {
    	return true;
    }
    else {
    	$this->form_validation->set_message('validate_credentials','Incorrect username or password');

    	return false;
    }
   

	
}






	public function login_validation()
	{

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email','Email','required|trim|callback_validate_credentials');
	
		$this->form_validation->set_rules('password','Password','required|trim');

	if($this->form_validation->run())
	  	{
			
	  		$data=array(
	  			'email'=>$this->input->post('email'),
	  			'is_logged_in'=>1
	  			);
	  		$this->session->set_userdata($data);

	  			
			redirect('Main/members');

	 	}
	 	else {
	 		$this->load->view('login');
	 	}
	 	
	}

	public function signup_validationer()
{
	
$this->load->library('form_validation');

$this->form_validation->set_rules('emails','Email','required|trim|is_unique[users.email]');

$this->form_validation->set_rules('passwords','Password','required');

$this->form_validation->set_rules('cpassword','Confirm password','required|matches[passwords]');

$this->form_validation->set_message('is_unique','that email already exists');


if($this->form_validation->run())
{
	echo "signup form_validation->run method run";

}
else{
	echo "signup's form_validation->run method cannot be run";
	redirect('main/signup');
}

}



}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */