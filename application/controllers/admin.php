<?php
class Admin extends My_Controller
{
	public function index()
	{
		if($this->session->userdata('user_id'))
		return redirect('admin/dashboard');
	$this->load->view("admin/admin_login");
	
			}
	

	public function admin_parser()
	{
		if($this->form_validation->run('adminlogin_rules'))
		{
			
			$username=$this->input->post("u");
			$password=$this->input->post("p");
			$this->load->model('loginmodel');
			$login_id=$this->loginmodel->login_valid($username,$password);
			
			
			if($login_id)
			{
				//session_start();
				$this->session->set_userdata('user_id',$login_id);
				//$_SESSION['user_id']=$login_id;
				$this->session->set_userdata('POSTDATA',$_POST);
				//$_SESSION['POSTDATA'] = $_POST;
				return redirect("admin/dashboard");
				 
			}
			else
			{
				//echo "password doesnot match";
				$this->session->set_flashdata('login_failed','Wrong Username or Password');
				return redirect("admin");
			}
			
		}
		else
		{
			return redirect("admin/admin_login");
		}
		
	}

	public function dashboard()
	{	
		if(!$this->session->userdata('user_id'))
			return redirect("admin");
		$this->load->model('articlesmodel');
		
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/dashboard');
		$config['total_rows'] =$this->articlesmodel->spit_rows();
		$config['per_page'] = 5; 
		
		$config['full_tag_open'] = "<ul class='pagination'>" ;
		$config['full_tag_close'] ="</ul>";
		$config['first_tag_open'] ="<li>";
		$config['num_tag_close'] ="</li>";
		$config['last_tag_open'] ="<li>";
		$config['last_tag_close'] ="</li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] ="</li>";
		$config['prev_tag_open'] ="<li>";
		$config['prev_tag_close'] ="</li>";
		$config['num_tag_open'] ="<li>";
		$config['num_tag_close'] ="</li>";
		$config['cur_tag_open'] ="<li class='active'><a>";
		$config['cur_tag_close'] ="</	a></li>";

		$this->pagination->initialize($config); 

		$articles=$this->articlesmodel->view_articles($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['art'=>$articles]);//all the articles stored in the database are given to the dashboard page in $art variable
		
	
	}

	public function addarticle()
	{
		$this->load->view('admin/addarticle');

	}

	public function store_article()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		

		$this->load->library('upload', $config);

		if($this->form_validation->run('addarticle_rules')==TRUE && $this->upload->do_upload())
		{
			$this->load->model('articlesmodel');
			$array=$this->input->post();
			
			$t=time();

			$t=date("Y-m-d",$t);
			echo $t;
			exit();
			$array['date']=$t;

			unset($_POST['submit']);

			$data=$this->upload->data();
			$image_path=base_url("uploads/".$data['raw_name'].$data['file_ext']);
			$array['image_path']=$image_path;
			$result=$this->articlesmodel->insert_article($array);
			if($result>=1)
			{
				
				$this->session->set_flashdata('feedback','Article was added successfuly...!');
				$this->session->set_flashdata('feedback_class','alert_success');

			}
			else
			{
				echo "insert failure";
				$this->session->set_flashdata('feedback','Failure in adding Article..! please try again');
				$this->session->set_flashdata('feedback_class','alert_danger');

			}

			//$this->load->view('admin/dashboard');
			return redirect('admin/dashboard');
			
		}
		else
		{
			$upload_error=$this->upload->display_errors();
			$this->load->view('admin/addarticle',compact('upload_error'));
		
		}
	}

	public function edit_article($article_id)
	{
		$this->load->model('articlesmodel');
		$article=$this->articlesmodel->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=> $article]);
		//print_r($article->title);
	}
	
	public function update_article($article_id)
	{
		$post=$this->input->post();
		$this->load->library('form_validation');
		if($this->form_validation->run('addarticle_rules')==TRUE)
		{
			
			$post=$this->input->post();
			unset($post['submit']);
			$this->load->model('articlesmodel');
			$result=$this->articlesmodel->update_article($article_id,$post);
			if($result>=1)
			{
				
				$this->session->set_flashdata('feedback','Article was updated successfuly...!');
				$this->session->set_flashdata('feedback_class','alert_success');

			}
			else
			{
				echo "insert failure";
				$this->session->set_flashdata('feedback','Failure in updating Article..! please try again');
				$this->session->set_flashdata('feedback_class','alert_danger');

			}

			//$this->load->view('admin/dashboard');//redirect lead to lose os post variable
			return redirect('admin/dashboard');
			
		}
		else
		{
			$this->load->model('articlesmodel');
		$article=$this->articlesmodel->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=> $article]);
		
		
		}
	}
	public function delete_article()
	{
		
		$article_id=$this->input->post('id');
		print_r($article_id);
		$this->load->model('articlesmodel');
		$result=$this->articlesmodel->delete_article($article_id);

		if($result>=1)
			{
				
				$this->session->set_flashdata('feedback','Article was deleted successfuly...!');
				$this->session->set_flashdata('feedback_class','alert_success');

			}
			else
			{
				echo "insert failure";
				$this->session->set_flashdata('feedback','Failure in deleting Article..! please try again');
				$this->session->set_flashdata('feedback_class','alert_danger');

			}

			//$this->load->view('admin/dashboard');//redirect lead to lose os post variable
			return redirect('admin/dashboard');

	}

	public function _construct()
	{
		parent::_construct();
		if(!$this->session->userdata('user_id'))
			return redirect("admin");
		$this->load->model('articlesmodel');

		
	}

	public function logout()
	{	

		
		//$this->session->unset_userdata("user_id");
		
		$this->session->sess_destroy();
		return redirect('admin');//to show the admin login page again admin is the controller and index function will run
		
	}

}



?>