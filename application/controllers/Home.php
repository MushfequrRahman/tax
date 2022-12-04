<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function index()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Tax Return Info Insert';
		$this->load->view('head',$data);
		//$this->load->view('toprightnav');
		//$this->load->view('leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$data['tl']=$this->Admin->type_list();
//		$data['ul1']=$this->Admin->department_list();
//		$data['ul2']=$this->Admin->designation_list();
		//$data['ul3']=$this->Admin->usertype_list();
		$this->load->view('incometax_insert_form',$data);
	 }
	 public function incometax_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$fid=$this->form_validation->set_rules('fid', 'Factory', 'required');
			$tid=$this->form_validation->set_rules('tid', 'Type', 'required');
			$userid=$this->form_validation->set_rules('userid', 'User ID', 'required');
			$name=$this->form_validation->set_rules('name', 'Name', 'required');
			$dept=$this->form_validation->set_rules('dept', 'Department', 'required');
			$desig=$this->form_validation->set_rules('desig', 'Designation', 'required');
			$mobile=$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{11}$/]');
			//$oemail=$this->form_validation->set_rules('oemail', 'Office Email', 'trim|required|valid_email');
			$tin=$this->form_validation->set_rules('tin', 'TIN', 'required');
			$tc=$this->form_validation->set_rules('tc', 'Tax Circle', 'required');
			$tz=$this->form_validation->set_rules('tz', 'Tax Zone', 'required');
			$rnumber=$this->form_validation->set_rules('rnumber', 'Return Number', 'required');
			$fyear=$this->form_validation->set_rules('fyear', 'Fiscal Year', 'required');
			if (empty($_FILES['rfile']['name']))
				{
   					 $this->form_validation->set_rules('rfile', 'Document', 'required');
				}
			
			if($this->form_validation->run()==FALSE)
				{
					$this->index();
				}
			else
				{
					//error_reporting(0);
					$fid=$this->input->post('fid');
					$tid=$this->input->post('tid');
					$userid=$this->input->post('userid');
					$name=$this->input->post('name');
					$dept=$this->input->post('dept');
					$desig=$this->input->post('desig');
					$mobile=$this->input->post('mobile');
					$oemail=$this->input->post('oemail');
					$tin=$this->input->post('tin');
					$tc=$this->input->post('tc');
					$tz=$this->input->post('tz');
					$rnumber=$this->input->post('rnumber');
					
					
					$fyear=$this->input->post('fyear');      
     				$remarks=$this->input->post('remarks'); 
					
					$config['upload_path']          = APPPATH. '../assets/uploads/income_tax';
					$config['allowed_types']        = 'jpg|jpeg|png';
					$config['max_size']             = 100000;
					$rfile = $_FILES['rfile']['name'];
					$rfile = $fid.'_'.$userid.'_'.$name.'_'.$fyear.pathinfo($rfile, PATHINFO_EXTENSION);
					$config['file_name'] = $rfile;
					//$config['file_name']=$fid.$userid.$name.$fyear.$config['file_name'];
					$config['file_name'] =  str_replace(' ', '_', $config['file_name']);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('rfile'))
					{
            			$upload_data = $this->upload->data();
               			$rfile= $upload_data['file_name']; 
						$ins=$this->Admin->incometax_insert($fid,$tid,$userid,$name,$dept,$desig,$mobile,$oemail,$tin,$tc,$tz,$rnumber,$rfile,$fyear,$remarks); 
						if($ins==TRUE)
							{
								$this->session->set_flashdata('Successfully','Successfully Submitted');
							}
						else
							{
								$this->session->set_flashdata('Error','Failed To Submitted');
							}
						redirect('Home','refresh');                  
        			}
					else
					{
         				 $this->session->set_flashdata('Error',$this->upload->display_errors());
						 $this->index();
						 //redirect('Home','refresh');
						 //print $this->upload->display_errors();
        			}  
					
					
					//$this->upload->do_upload('rfile');
//					$upload_data = $this->upload->data();
//               		$rfile= $upload_data['file_name'];
					//$rfile=$fid.$userid.$name.$fyear.$rfile;
					//$rfile =  str_replace(' ','_' , $rfile);
					
					
					//$ins=$this->Admin->incometax_insert($fid,$tid,$userid,$name,$dept,$desig,$mobile,$oemail,$tin,$tc,$tz,$rnumber,$rfile,$fyear,$remarks);
					
				}
		}
	}
	 
}


