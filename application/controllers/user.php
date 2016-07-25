<?php
class User extends CI_Controller
{
	public function index()
	{
		$this->load->model('articlesmodel');
		
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('user/index');
		$config['total_rows'] =$this->articlesmodel->count_all_articles();
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

	$articles=$this->articlesmodel->view_all_articles($config['per_page'],$this->uri->segment(3));
		$this->load->view("public/articles_list",compact('articles'));
	}

	public function search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Query','required|alphadash');
		if(!$this->form_validation->run())
		{
			return $this->index();
		}
		else
		{
			$query=$this->input->post('query');
			return redirect("user/search_results/$query");
		}
	}
	
	public function search_results($query)
	{
		$this->load->model('articlesmodel');
		$this->load->library('pagination');
		//only this much are required to run the pagination 
		$config['base_url'] = base_url("user/search_results/$query");
		$config['total_rows'] =$this->articlesmodel->count_all_searcharticles($query);
		$config['per_page'] = 5; 
		
		//these are only extra customization for pagination
		$config['uri_segment']=4;
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
		$config['cur_tag_close'] ="</a></li>";

		$this->pagination->initialize($config); 

		
		$search_results=$this->articlesmodel->search($query,$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('public/search_result',compact('search_results'));

	}

	public function find_single_article($article_id)
	{
		$this->load->model('articlesmodel');
		$result=$this->articlesmodel->single_article($article_id);
		$this->load->view('public/detailed_article',compact('result'));
	}

}

?>