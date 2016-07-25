<?php
cLass Loginmodel extends CI_Model
{
	
	public function login_valid($username,$password)
	{

		$sql = "SELECT * FROM users WHERE username = ? AND password = ? ";
		$q=$this->db->query($sql, array($username, $password));

		$a=$q->result_array();


		if($q->num_rows()>=1)
		{

		return $a[0]['id'];
		}
		else
		{
			
			return FALSE;
		}
			

	}
}



?>