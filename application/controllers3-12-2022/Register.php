<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	 public function user_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Insert';
		$this->load->view('head',$data);
		//$this->load->view('toprightnav');
		//$this->load->view('leftmenu');
		$data['ul']=$this->Admin->factory_list();
		$data['ul1']=$this->Admin->department_list();
		$data['ul2']=$this->Admin->designation_list();
		//$data['ul3']=$this->Admin->usertype_list();
		$this->load->view('user_insert_form',$data);
	 }
	public function user_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$factoryid=$this->form_validation->set_rules('factoryid', 'Factory ID', 'required');
			$departmentid=$this->form_validation->set_rules('departmentid', 'Department Name', 'required');
			$name=$this->form_validation->set_rules('name', 'User Name', 'required');
			$designationid=$this->form_validation->set_rules('designationid', 'Designation', 'required');
			$pmobile=$this->form_validation->set_rules('pmobile', 'Mobile', 'required');
			$userid=$this->form_validation->set_rules('userid', 'User ID', 'required');
			$password=$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->user_insert_form();
				}
			else
				{
			
			
			$factoryid=$this->input->post('factoryid');
			$departmentid=$this->input->post('departmentid');
			$name=$this->input->post('name');
			$designationid=$this->input->post('designationid');
			$pmobile=$this->input->post('pmobile');
			//$usertypeid=$this->input->post('usertypeid');
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			
			$ins=$this->Admin->user_insert($factoryid,$departmentid,$designationid,$name,$pmobile,$userid,$password);
            		if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('User_Login');
				}
				
		}
	}
	
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	
	 
	
	
	
	
	
	 
	 
	 
	
	
	 
	 
	 
	
	 
}


