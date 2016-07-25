<?php

class Users extends CI_controller{
	
 public function index()
 {
 	 $this->load->helper('array');
  $this->load->model('usermodel');
$data['users']= $this->usermodel->getusers();

   $this->load->view('view',$data);


  $array = array('color' => 'red', 'shape' => 'round', 'size' => '');
  
   echo element();
 }

}




?>