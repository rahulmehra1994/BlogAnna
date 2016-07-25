<?php 
class Articlesmodel extends CI_Model
{	

	public function view_articles($limit,$offset)
	{
		$userid=$this->session->userdata('user_id');

			$q=$this->db->select('*')->from('articles')
			->where('user_id', $userid)
			->limit($limit,$offset)
			->get();
		
			$count=$q->num_rows();
			if($count>0)
			{
				return $q->result_array();
			}
			else
			{
				return array();
				}
	}

	public function insert_article($array)
	{
		return $this->db->insert('articles',$array);
	}

	public function find_article($article_id)
	{

		$q=$this->db->select(['id','title','body'])->where('id',$article_id)->get('articles');
		return $q->row();
	}


	public function update_article($article_id,array $article_data)
	{
		return $this->db->where('id',$article_id)->update('articles',$article_data);
	}

	public function delete_article($article_id)
	{
		return $this->db->delete('articles',['id'=>$article_id]);
	}

	public function spit_rows()
	{
		$userid=$this->session->userdata('user_id');
		$sql = "SELECT id,user_id,title FROM articles WHERE user_id = ?";
			$q=$this->db->query($sql, $userid);
			$count=$q->num_rows();
			//print_r($count);
			if($count>0)
			{
				return $q->num_rows();
			}
			else
			{
				return array();
				}

	}

	public function count_all_articles()
	{

		$sql = "SELECT id,user_id,title FROM articles";
			$q=$this->db->query($sql);
			$count=$q->num_rows();
			if($count>0)
			{
				return $q->num_rows();
			}
			else
			{
				return array();
				}

	}

	public function view_all_articles($limit,$offset)
	{
		$q=$this->db->select('*')->from('articles')
			->limit($limit,$offset)
			->order_by('date','DESC')
			->get();
		
			$count=$q->num_rows();
			if($count>0)
			{
				return $q->result_array();
			}
			else
			{
				return array();
				}
	}
	public function search($query,$limit,$offset)
	{
		$q=$this->db->from('articles')
					->like('title',$query)
					->limit($limit,$offset)
					->get();
		return $q->result_array();

	}

	public function count_all_searcharticles($query)
	{

			$q=$this->db->select('*')
						->from('articles')
						->like('title',$query)
						->get();
		
			$count=$q->num_rows();
			if($count>0)
			{
				return $count;
			}
			else
			{
				return array();
				}
	}

	public function single_article($article_id)
	{
		$q=$this->db->select('*')
				->from('articles')
				->where('id',$article_id)
				->get();
		return $q->row();

	}

}
?>