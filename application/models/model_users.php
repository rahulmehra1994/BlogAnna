<?php
class Model_users extends CI_Model
{
   public function can_log_in()
   {  $this->load->database();

    $this->db->where('email',$this->input->post('email'));
    $this->db->where('password',$this->input->post('password'));
    $q=	$this->db->get('users');

    if($q->num_rows()==1)
    {
    	return true;
    }
    else {
    	return false;
    }
   


}
}


?>