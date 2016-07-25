<?php

class Usermodel extends CI_Model{

 public function getusers()
 	{
 		$this->load->database();
 		$q=$this->db->query("select * from users");
 		
 		$result=$q->result_array();
 		echo"<pre>";
 		return $result;
 	}

}


?>