<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function index()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Insert';
		$this->load->view('head',$data);
		//$this->load->view('toprightnav');
		//$this->load->view('leftmenu');
		$data['fl']=$this->Admin->factory_list();
//		$data['ul1']=$this->Admin->department_list();
//		$data['ul2']=$this->Admin->designation_list();
		//$data['ul3']=$this->Admin->usertype_list();
		$this->load->view('incometax_insert_form',$data);
	 }
	 
}


