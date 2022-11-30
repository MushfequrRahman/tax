<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
		 parent::__construct();
		 //$this->load->library('session');
		
			if(!$this->session->userdata('userid'))
				{
					redirect('User_Login');
				}
	 }
	 public function index()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Dashboard';
		$this->load->view('admin/head',$data);
		$userid=$this->session->userdata('userid');
		$usertype=$this->session->userdata('user_type');
		$factoryid=$this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav',$data);
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/dashboard',$data);
	}
	public function factory_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Factory Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/factory_insert_form',$data);
	}
	public function fac_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$facid=$this->form_validation->set_rules('facid', 'Factory ID', 'required');
			$facname=$this->form_validation->set_rules('facname', 'Factory Name', 'required');
			$fac_address=$this->form_validation->set_rules('fac_address', 'Factory Address', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->fac_insert_form();
				}
			else
				{
					$facid=$this->input->post('facid');
					$facname=$this->input->post('facname');
					$fac_address=$this->input->post('fac_address');
					$ins=$this->Admin->fac_insert($facid,$facname,$fac_address);
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/factory_insert_form','refresh');
				}
		}
	}
	public function factory_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Factory List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$this->load->view('admin/factory_list',$data);
	}
	public function factory_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Factory Info Update';
		$facid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['all_line']=$this->Admin->all_line();
		//$data['opskill']=$this->Admin->opskill($opid);
		$data['flup']=$this->Admin->factory_list_up($facid);
		$this->load->view('admin/factory_list_up',$data);
	 }
	 public function flup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$fid=$this->input->post('fid');
			$facid=$this->input->post('facid');
			$factoryname=$this->input->post('factoryname');
			$factory_address=$this->input->post('factory_address');
			
			$ins=$this->Admin->flup($fid,$facid,$factoryname,$factory_address);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/factory_list','refresh');
				
		}
	 }
	 public function department_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Department Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/department_insert_form',$data);
	}
	public function department_insert()
	  {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$department=$this->form_validation->set_rules('department', 'Department Name', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->department_insert_form();
				}
			else
				{
					$department=$this->input->post('department');
					$ins=$this->Admin->department_insert($department);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/department_insert_form','refresh');
				}
		}
	}
	public function department_list()
	 {
		
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Department List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->department_list();
		$this->load->view('admin/department_list',$data);
	 }
	 public function department_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Department Info Update';
		$deptid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup']=$this->Admin->department_list_up($deptid);
		$this->load->view('admin/department_list_up',$data);
	 }
	 public function departmentlup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$deptid=$this->input->post('deptid');
			$departmentname=$this->input->post('departmentname');
			
			$ins=$this->Admin->departmentlup($deptid,$departmentname);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/department_list','refresh');
				
		}
	 }
	 public function designation_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Designation Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/designation_insert_form',$data);
	}
	public function designation_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$designation=$this->form_validation->set_rules('designation', 'Designation', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->designation_insert_form();
				}
			else
				{
					$designation=$this->input->post('designation');
					$ins=$this->Admin->designation_insert($designation);
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/designation_insert_form','refresh');
				}
		}
	}
	public function designation_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Designation List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->designation_list();
		$this->load->view('admin/designation_list',$data);
	}
	public function designation_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Designation Update';
		$designationid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup']=$this->Admin->designation_list_up($designationid);
		$this->load->view('admin/designation_list_up',$data);
	 }
	 public function designationlup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$designation=$this->input->post('edesignation');
			$ins=$this->Admin->parentdesignationlup($designationid,$designation);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/designation_list','refresh');
		}
	 }
	  public function usertype_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Type Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/usertype_insert_form',$data);
	}
	public function usertype_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$usertype=$this->form_validation->set_rules('usertype', 'User type', 'required');
			 if($this->form_validation->run()==FALSE)
				{
					$this->usertype_insert_form();
				}
			else
				{
					$usertype=$this->input->post('usertype');
					$ins=$this->Admin->usertype_insert($usertype);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/usertype_insert_form','refresh');
				}
		}
	}
	public function usertype_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User type List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->usertype_list();
		$this->load->view('admin/usertype_list',$data);
	}
	 public function usertype_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Type Update';
		$usertypeid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		
		$data['dlup']=$this->Admin->usertype_list_up($usertypeid);
		$this->load->view('admin/usertype_list_up',$data);
	 }
	 public function usertypelup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$usertypeid=$this->input->post('usertypeid');
			$usertype=$this->input->post('usertype');
			
			$ins=$this->Admin->usertypelup($usertypeid,$usertype);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/usertype_list','refresh');
		}
	 }
	 public function userstatus_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Status Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/userstatus_insert_form',$data);
	}
	public function userstatus_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$userstatus=$this->form_validation->set_rules('userstatus', 'User Status', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->userstatus_insert_form();
				}
			else
				{
					$userstatus=$this->input->post('userstatus');
					
					$ins=$this->Admin->userstatus_insert($userstatus);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/userstatus_insert_form','refresh');
				}
		}
	}
	public function userstatus_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Status List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->userstatus_list();
		$this->load->view('admin/userstatus_list',$data);
	}
	 public function userstatus_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Status Info Update';
		$userstatusid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup']=$this->Admin->userstatus_list_up($userstatusid);
		$this->load->view('admin/userstatus_list_up',$data);
	 }
	 public function userstatuslup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$userstatusid=$this->input->post('userstatusid');
			$userstatus=$this->input->post('userstatus');
			
			$ins=$this->Admin->userstatuslup($userstatusid,$userstatus);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/userstatus_list','refresh');
		}
	 }
	 public function user_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->factory_list();
		$data['ul1']=$this->Admin->department_list();
		$data['ul2']=$this->Admin->designation_list();
		$data['ul3']=$this->Admin->usertype_list();
		$this->load->view('admin/user_insert_form',$data);
	 }
	public function user_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$factoryid=$this->input->post('factoryid');
			$departmentid=$this->input->post('departmentid');
			$name=$this->input->post('name');
			$designationid=$this->input->post('designationid');
			$oemail=$this->input->post('oemail');
			$pmobile=$this->input->post('pmobile');
			$usertypeid=$this->input->post('usertypeid');
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			$config['upload_path']          = APPPATH. '../assets/uploads/users';
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['max_size']             = 10000;
			$this->load->library('upload', $config);
			$this->upload->do_upload('pic_file');
			$upload_data = $this->upload->data();
            $pic_file= $upload_data['file_name'];
			$pic_file =  str_replace(' ', '_', $pic_file);
			$ins=$this->Admin->user_insert($factoryid,$departmentid,$designationid,$name,$oemail,$pmobile,$usertypeid,$userid,$password,$pic_file);
            		if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/user_insert_form','refresh');
				
		}
	}
	public function user_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$this->load->view('admin/user_list',$data);
	}
	public function factorywise_user_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User List';
		$factoryid = $this->input->post('factoryid');
		$data['ul']=$this->Admin->factorywise_user_list($factoryid);
		$this->load->view('admin/factorywise_user_list',$data);
	}
	public function user_imglist_up()
	  {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Update';
		$urid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['elup']=$this->Admin->user_list_up($urid);
		$this->load->view('admin/user_imglist_up',$data);
	 }
	 public function eimglup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$urid=$this->input->post('urid');
			$config['upload_path']          = APPPATH. '../assets/uploads/users';
					$config['allowed_types']        = 'jpg|jpeg|png|bmp';
					$config['max_size']             = 10000;
					$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('pic_file')){
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('upload_form', $error);
			}
			$upload_data = $this->upload->data();
			$pic_file = $upload_data['file_name'];
			$ins=$this->Admin->eimglup($urid,$pic_file);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/user_list','refresh');
				
		}
	 }
	 public function user_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Update';
		$userid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->factory_list();
		$data['ul1']=$this->Admin->department_list();
		$data['ul2']=$this->Admin->designation_list();
		$data['ul3']=$this->Admin->usertype_list();
		$data['ul4']=$this->Admin->userstatus_list();
		$data['ulup']=$this->Admin->user_list_up($userid);
		$this->load->view('admin/user_list_up',$data);
	 }
	 public function ulup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$factoryid=$this->input->post('factoryid');
			$departmentid=$this->input->post('departmentid');
			$name=$this->input->post('name');
			$designationid=$this->input->post('designationid');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$usertypeid=$this->input->post('usertypeid');
			$userstatusid=$this->input->post('userstatusid');
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			$indate=$this->input->post('indate');
			$userid=$this->input->post('userid');
					
					
						$ins=$this->Admin->ulup($factoryid,$departmentid,$designationid,$name,$email,$mobile,$usertypeid,$userstatusid,$userid,$password,$indate);
						if($ins==TRUE)
							{
								$this->session->set_flashdata('Successfully','Successfully Updated');
							}
						else
							{
								$this->session->set_flashdata('Successfully','Failed To Updated');
							}
					redirect('Dashboard/user_list','refresh');
		}
	 }
	 
	 public function user_transfer_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Transfer';
		$userid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->factory_list();
		$data['ul1']=$this->Admin->department_list();
		$data['ul2']=$this->Admin->designation_list();
		$data['ul3']=$this->Admin->usertype_list();
		$data['ul4']=$this->Admin->userstatus_list();
		$data['ulup']=$this->Admin->user_list_up($userid);
		$this->load->view('admin/user_transfer_form',$data);
	 }
	 public function user_transfer()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$factoryid=$this->input->post('factoryid');
			$departmentid=$this->input->post('departmentid');
			$designationid=$this->input->post('designationid');
			$name=$this->input->post('name');
			$oemail=$this->input->post('oemail');
			$mobile=$this->input->post('mobile');
			$usertypeid=$this->input->post('usertypeid');
			$userstatusid=$this->input->post('userstatusid');
			$ruserid=$this->input->post('ruserid');
			$password=$this->input->post('password');
			$userid=$this->input->post('userid');
			$pic_file=$this->input->post('pic_file');
					
					
						$ins=$this->Admin->user_transfer($factoryid,$departmentid,$designationid,$name,$oemail,$mobile,$usertypeid,$userstatusid,$userid,$password,$ruserid,$pic_file);
						if($ins==TRUE)
							{
								$this->session->set_flashdata('Successfully','Successfully Updated');
							}
						else
							{
								$this->session->set_flashdata('Successfully','Failed To Updated');
							}
					redirect('Dashboard/user_list','refresh');
		}
	 }
	 public function product_uom_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product UOM Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/product_uom_insert_form',$data);
	 }
	 
	 public function product_uom_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$puom=$this->form_validation->set_rules('puom', 'Product UOM', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->product_uom_insert_form();
				}
			else
				{
					$puom=$this->input->post('puom');
					$ins=$this->Admin->product_uom_insert($puom);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/product_uom_insert_form','refresh');
				}
		}
	}
	public function product_uom_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product UOM List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->product_uom_list();
		$this->load->view('admin/product_uom_list',$data);
	}
	public function product_uom_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product UOM Update';
		$puomid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['plup']=$this->Admin->product_uom_list_up($puomid);
		$this->load->view('admin/product_uom_list_up',$data);
	 }
	 public function productuomlup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$puomid=$this->input->post('puomid');
			$puom=$this->input->post('puom');
			
			$ins=$this->Admin->productuomlup($puomid,$puom);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/product_uom_list','refresh');
		}
	 }
	 public function product_capop_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Capax/OpexInsert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/product_capop_insert_form',$data);
	 }
	public function product_capop_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$puom=$this->form_validation->set_rules('pcapop', 'Product Capex/Opex', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->product_capop_insert_form();
				}
			else
				{
					$pcapop=$this->input->post('pcapop');
					$ins=$this->Admin->product_capop_insert($pcapop);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/product_capop_insert_form','refresh');
				}
		}
	}
	public function product_capop_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Cap/OP List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->product_capop_list();
		$this->load->view('admin/product_capop_list',$data);
	}
	public function product_category_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/product_category_insert_form',$data);
	 }
	public function product_category_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$pccode=$this->form_validation->set_rules('pccode', 'Product Code', 'required');
			$pcname=$this->form_validation->set_rules('pcname', 'Product Name', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->product_category_insert_form();
				}
			else
				{
					$pccode=$this->input->post('pccode');
					$pcname=$this->input->post('pcname');
					$ins=$this->Admin->product_category_insert($pccode,$pcname);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/product_category_insert_form','refresh');
				}
		}
	}
	public function product_category_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->product_category_list();
		$this->load->view('admin/product_category_list',$data);
	}
	public function product_category_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Update';
		$pccode= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['plup']=$this->Admin->product_category_list_up($pccode);
		$this->load->view('admin/product_category_list_up',$data);
	 }
	 public function productcategorylup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$pccode=$this->input->post('pccode');
			$pcname=$this->input->post('pcname');
			
			$ins=$this->Admin->productcategorylup($pccode,$pcname);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/product_category_list','refresh');
		}
	 }
	 public function product_details_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Details Insert';
		$this->load->view('admin/head',$data);
		$pcode= $this->uri->segment(3);
		$data['pd']=$pcode;
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul']=$this->Admin->product_uom_list();
		$data['ul1']=$this->Admin->product_capop_list();
		$data['fl']=$this->Admin->factory_list();
		$data['al']=$this->Admin->antivirus();
		$data['il']=$this->Admin->internet();
		$this->load->view('admin/product_details_insert_form',$data);
	 }
	 public function product_details_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$pccode=$this->form_validation->set_rules('pccode', 'Product Category Code', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->product_category_list();
				}
			else
				{
					$pccode=$this->input->post('pccode');
					$factoryid=$this->input->post('factoryid');
					$brand=$this->input->post('brand');
					$hdd=$this->input->post('hdd');
					$monitor=$this->input->post('monitor');
					$ups=$this->input->post('ups');
					$ip=$this->input->post('ip');
					$mb=$this->input->post('mb');
					$sn=$this->input->post('sn');
					$processor=$this->input->post('processor');
					$ram=$this->input->post('ram');
					$os=$this->input->post('os');
					$ms=$this->input->post('ms');
					$avid=$this->input->post('avid');
					$iid=$this->input->post('iid');
					$description=$this->input->post('description');
					$price=$this->input->post('price');
					$puomid=$this->input->post('puomid');
					$pqty=$this->input->post('pqty');
					$vendor=$this->input->post('vendor');
					$pcapop=$this->input->post('pcapop');
					$warranty=$this->input->post('warranty');
					$pdate=$this->input->post('pdate');
					$ins=$this->Admin->product_details_insert($pccode,$factoryid,$brand,$hdd,$monitor,$ups,$ip,$mb,$sn,$processor,$ram,$os,$ms,$avid,$iid,$description,$price,$pqty,$puomid,$vendor,$pcapop,$warranty,$pdate);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/product_category_list','refresh');
				}
		}
	}
	public function product_details_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Details List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['al']=$this->Admin->antivirus();
//		$data['il']=$this->Admin->internet();
		$data['ul']=$this->Admin->product_details_list();
		$this->load->view('admin/product_details_list',$data);
	}
	public function product_details_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Details Update';
		$pdiid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$data['ul']=$this->Admin->product_uom_list();
		$data['al']=$this->Admin->antivirus();
		$data['il']=$this->Admin->internet();
		$data['plup']=$this->Admin->product_details_list_up($pdiid);
		$this->load->view('admin/product_details_list_up',$data);
	 }
	public function productdetailslup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$pdiid=$this->input->post('pdiid');
			$pcode=$this->input->post('pcode');
			$brand=$this->input->post('brand');
			$hdd=$this->input->post('hdd');
			$monitor=$this->input->post('monitor');
			$ups=$this->input->post('ups');
			$ip=$this->input->post('ip');
			$mb=$this->input->post('mb');
			$sn=$this->input->post('sn');
			$processor=$this->input->post('processor');
			$ram=$this->input->post('ram');
			$os=$this->input->post('os');
			$ms=$this->input->post('ms');
			$avid=$this->input->post('avid');
			$iid=$this->input->post('iid');
			$factoryid=$this->input->post('factoryid');
			$description=$this->input->post('description');
			$price=$this->input->post('price');
			$puomid=$this->input->post('puomid');
			$pqty=$this->input->post('pqty');
			$vendor=$this->input->post('vendor');
			$warranty=$this->input->post('warranty');
			$pdate=$this->input->post('pdate');
			
			$ins=$this->Admin->productdetailslup($pdiid,$factoryid,$pcode,$brand,$hdd,$monitor,$ups,$ip,$mb,$sn,$processor,$ram,$os,$ms,$avid,$iid,$description,$price,$pqty,$puomid,$vendor,$warranty,$pdate);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/product_details_list','refresh');
		}
	 }
	 public function product_transfer_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Transfer';
		$pdiid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$data['plup']=$this->Admin->product_details_list_up($pdiid);
		$this->load->view('admin/product_transfer_form',$data);
	 }
	 public function producthistorylup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$pccode=$this->input->post('pccode');
			$pcode=$this->input->post('pcode');
			$factoryid=$this->input->post('factoryid');
			$ins=$this->Admin->producthistorylup($factoryid,$pccode,$pcode);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/product_details_list','refresh');
		}
	 }
	 public function product_assign_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Insert';
		$pcode= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['ul']=$this->Admin->product_uom_list();
		$data['pcode']=$pcode;
		$this->load->view('admin/product_assign_form',$data);
	 }
	 public function product_assign_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$userid=$this->form_validation->set_rules('userid', 'User ID', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->product_details_list();
				}
			else
				{
					$pcode=$this->input->post('pcode');
					$userid=$this->input->post('userid');
					$adate=$this->input->post('adate');
					
					$ins=$this->Admin->product_assign_insert($pcode,$userid,$adate);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/product_details_list','refresh');
				}
		}
	}
	public function product_return_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Product Return';
		$pcode= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['ul']=$this->Admin->product_uom_list();
		$data['pcode']=$pcode;
		$this->load->view('admin/product_return_form',$data);
	 }
	 public function product_return_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$pcode=$this->form_validation->set_rules('pcode', 'Product ID', 'required');
			if($this->form_validation->run()==FALSE)
				{
					$this->product_details_list();
				}
			else
				{
					$pcode=$this->input->post('pcode');
					//$userid=$this->input->post('userid');
					$rdate=$this->input->post('rdate');
					
					$ins=$this->Admin->product_return_insert($pcode,$rdate);
			
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/product_details_list','refresh');
				}
		}
	}
	public function mpr_create_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='MPR Create';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['il']=$this->Admin->product_category_list();
		$data['ul']=$this->Admin->product_uom_list();
		$data['fl']=$this->Admin->factory_list();
		$data['dep']=$this->Admin->department_list();
		$data['des']=$this->Admin->designation_list();
		$data['col']=$this->Admin->product_capop_list();
		$this->load->view('admin/mpr_create_form',$data);
	 }
	public function mpr_create()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		//if ($this->input->get('submit')) {
			$userid = $this->input->get('userid');
			$mprid = $this->input->get('mprid');
			$factoryid = $this->input->get('factoryid');
			$departmentid = $this->input->get('departmentid');
			$name = $this->input->get('name');
			$designationid = $this->input->get('designationid');
			$mprdate = $this->input->get('mprdate');
			$item = $this->input->get('item');
			$model = $this->input->get('model');
			$type = $this->input->get('type');
			$qty = $this->input->get('qty');
			$uom = $this->input->get('uom');
			$description = $this->input->get('description');
			$price = $this->input->get('price');
			$remarks = $this->input->get('remarks');
			$uname = $this->input->get('uname');
			for ($i = 0; $i < count($item); $i++) {
				$data["i"] = $i;
				$data["userid"] = $userid;
				$data["mprid"] = $mprid;
				$data["factoryid"] = $factoryid;
				$data["departmentid"] = $departmentid;
				$data["name"] = $name;
				$data["designationid"] = $designationid;
				$data["mprdate"] = $mprdate;
				$data["item"] = $item[$i];
				$data["model"] = $model[$i];
				$data["type"] = $type[$i];
				$data["qty"] = $qty[$i];
				$data["uom"] = $uom[$i];
				$data["description"] = $description[$i];
				$data["price"] = $price[$i];
				$data["remarks"] = $remarks[$i];
				$data["uname"] = $uname[$i];
				$ins = $this->Admin->mpr_create($data);
			}
			if($ins)
				{
					echo  "ok";	
				}
			else
				{
					echo  "error";	
				}
	}
	public function date_wise_mpr_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'MPR List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/date_wise_mpr_list_form', $data);
	} 
	public function date_wise_mpr_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		//$factoryid = $this->input->post('factoryid');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['ul'] = $this->Admin->date_wise_mpr_list($pd, $wd);
		$this->load->view('admin/date_wise_mpr_list', $data);
	}
	public function date_wise_mpr_list_xls()
	{
		$this->load->database();
		$this->load->model('Admin');
		//$factoryid = $this->input->post('factoryid');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$extension = $this->input->post('export_type');
		if (!empty($extension)) {
			$extension = $extension;
		} else {
			$extension = 'xlsx';
		}
		$this->load->helper('download');
		$data = array();
		$data['title'] = 'Export Excel Sheet';
		// get employee list
		$empInfo = $this->Admin->date_wise_mpr_list($pd, $wd);
		$fileName = 'date_wise_mpr_list-' . time();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'MPR NO');
		$sheet->setCellValue('B1', 'Unit');
		$sheet->setCellValue('C1', 'MPR Prepared By');
		$sheet->setCellValue('D1', 'Item');
		$sheet->setCellValue('E1', 'Model');
		$sheet->setCellValue('F1', 'Type');
		$sheet->setCellValue('G1', 'Qty');
		$sheet->setCellValue('H1', 'Description');
		$sheet->setCellValue('I1', 'Unit Price');
		$sheet->setCellValue('J1', 'Total Price');
		$sheet->setCellValue('K1', 'Remarks');
		$sheet->setCellValue('L1', 'User');
		$sheet->setCellValue('M1', 'Date');

		// 
		$rowCount = 2;
		foreach ($empInfo as $element) {
			$sheet->setCellValue('A' . $rowCount, $element['mprid']);
			$sheet->setCellValue('B' . $rowCount, $element['fid']);
			$sheet->setCellValue('C' . $rowCount, $element['name'].'--'.$element['departmentname'].'--'.$element['designation']);
			$sheet->setCellValue('D' . $rowCount, $element['pcname']);
			$sheet->setCellValue('E' . $rowCount, $element['model']);
			$sheet->setCellValue('F' . $rowCount, $element['pcapop']);
			$sheet->setCellValue('G' . $rowCount, $element['qty']." ".$row['puom']);
			$sheet->setCellValue('H' . $rowCount, $element['description']);
			$sheet->setCellValue('I' . $rowCount, $element['price']);
			$sheet->setCellValue('J' . $rowCount, $element['qty']*$element['price']);
			$sheet->setCellValue('K' . $rowCount, $element['remarks']);
			$sheet->setCellValue('L' . $rowCount, $element['uname']);
			$sheet->setCellValue('M' . $rowCount, $element['mdate']);


			$rowCount++;
		}

		if ($extension == 'csv') {
			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
			$fileName = $fileName . '.csv';
		} elseif ($extension == 'xlsx') {
			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
			$fileName = $fileName . '.xlsx';
		} else {
			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
			$fileName = $fileName . '.xls';
		}

		$this->output->set_header('Content-Type: application/vnd.ms-excel');
		$this->output->set_header("Content-type: application/csv");
		$this->output->set_header('Cache-Control: max-age=0');
		$writer->save(ROOT_UPLOAD_PATH . $fileName);
		//redirect(HTTP_UPLOAD_PATH.$fileName); 
		$filepath = file_get_contents(ROOT_UPLOAD_PATH . $fileName);
		force_download($fileName, $filepath);
	}
	public function po_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PO Create';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['il']=$this->Admin->product_category_list();
		$data['ul']=$this->Admin->product_uom_list();
		$this->load->view('admin/po_create_form', $data);
	}
	//public function po_create()
//	{
//		$this->load->database();
//		$this->load->library('form_validation');
//		$this->load->model('Admin');
//		//if ($this->input->get('submit')) {
//			$userid = $this->input->get('userid');
//			$mprid = $this->input->get('mprid');
//			$po = $this->input->get('po');
//			$supplier = $this->input->get('supplier');
//			$podate = $this->input->get('podate');
//			$item = $this->input->get('item');
//			$qty = $this->input->get('qty');
//			$uom = $this->input->get('uom');
//			$description = $this->input->get('description');
//			$price = $this->input->get('price');
//			for ($i = 0; $i < count($item); $i++) {
//				$data["i"] = $i;
//				$data["userid"] = $userid;
//				$data["mprid"] = $mprid;
//				$data["po"] = $po;
//				$data["supplier"] = $supplier;
//				$data["podate"] = $podate;
//				$data["item"] = $item[$i];
//				$data["qty"] = $qty[$i];
//				$data["uom"] = $uom[$i];
//				$data["description"] = $description[$i];
//				$data["price"] = $price[$i];
//				$ins = $this->Admin->po_create($data);
//			}
//			if($ins)
//				{
//					echo  "ok";	
//				}
//			else
//				{
//					echo  "error";	
//				}
//	}
	public function po_create()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userid = $this->input->post('userid');
			$mprid = $this->input->post('mprid');
			$po = $this->input->post('po');
			$supplier = $this->input->post('supplier');
			$podate = $this->input->post('podate');
			$item = $this->input->post('item');
			$pqty = $this->input->post('pqty');
			$premarks = $this->input->post('premarks');
			$pprice = $this->input->post('pprice');
			$pstatus = $this->input->post('pstatus');
			for ($i = 0; $i < count($item); $i++) {
				$data["i"] = $i;
				$data["userid"] = $userid;
				$data["mprid"] = $mprid;
				$data["po"] = $po[$i];
				$data["supplier"] = $supplier[$i];
				$data["podate"] = $podate[$i];
				$data["item"] = $item[$i];
				$data["pqty"] = $pqty[$i];
				$data["premarks"] = $premarks[$i];
				$data["pprice"] = $pprice[$i];
				$data["pstatus"] = $pstatus[$i];
				$ins = $this->Admin->po_create($data);
				//var_dump($data);
			}
		
			if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					redirect('Dashboard/po_from_mpr_form','refresh');
		}
	}
	public function date_wise_po_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PO List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/date_wise_po_list_form', $data);
	}
	public function date_wise_po_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		//$factoryid = $this->input->post('factoryid');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['ul'] = $this->Admin->date_wise_po_list($pd, $wd);
		$this->load->view('admin/date_wise_po_list', $data);
	}
	//public function date_wise_po_list_xls()
//	{
//		$this->load->database();
//		$this->load->model('Admin');
//		//$factoryid = $this->input->post('factoryid');
//		$pd = $this->input->post('pd');
//		$wd = $this->input->post('wd');
//		$extension = $this->input->post('export_type');
//		if (!empty($extension)) {
//			$extension = $extension;
//		} else {
//			$extension = 'xlsx';
//		}
//		$this->load->helper('download');
//		$data = array();
//		$data['title'] = 'Export Excel Sheet';
//		// get employee list
//		$empInfo = $this->Admin->date_wise_po_list($pd, $wd);
//		$fileName = 'date_wise_po_list-' . time();
//		$spreadsheet = new Spreadsheet();
//		$sheet = $spreadsheet->getActiveSheet();
//
//		$sheet->setCellValue('A1', 'MPR NO');
//		$sheet->setCellValue('B1', 'Unit');
//		$sheet->setCellValue('C1', 'MPR Prepared By');
//		$sheet->setCellValue('D1', 'Item');
//		$sheet->setCellValue('E1', 'Model');
//		$sheet->setCellValue('F1', 'Type');
//		$sheet->setCellValue('G1', 'Qty');
//		$sheet->setCellValue('H1', 'Description');
//		$sheet->setCellValue('I1', 'Unit Price');
//		$sheet->setCellValue('J1', 'Total Price');
//		$sheet->setCellValue('K1', 'Remarks');
//		$sheet->setCellValue('L1', 'User');
//		$sheet->setCellValue('M1', 'Date');
//
//		// 
//		$rowCount = 2;
//		foreach ($empInfo as $element) {
//			$sheet->setCellValue('A' . $rowCount, $element['mprid']);
//			$sheet->setCellValue('B' . $rowCount, $element['fid']);
//			$sheet->setCellValue('C' . $rowCount, $element['name'].'--'.$element['departmentname'].'--'.$element['designation']);
//			$sheet->setCellValue('D' . $rowCount, $element['pcname']);
//			$sheet->setCellValue('E' . $rowCount, $element['model']);
//			$sheet->setCellValue('F' . $rowCount, $element['pcapop']);
//			$sheet->setCellValue('G' . $rowCount, $element['qty']." ".$row['puom']);
//			$sheet->setCellValue('H' . $rowCount, $element['description']);
//			$sheet->setCellValue('I' . $rowCount, $element['price']);
//			$sheet->setCellValue('J' . $rowCount, $element['qty']*$element['price']);
//			$sheet->setCellValue('K' . $rowCount, $element['remarks']);
//			$sheet->setCellValue('L' . $rowCount, $element['uname']);
//			$sheet->setCellValue('M' . $rowCount, $element['mdate']);
//
//
//			$rowCount++;
//		}
//
//		if ($extension == 'csv') {
//			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
//			$fileName = $fileName . '.csv';
//		} elseif ($extension == 'xlsx') {
//			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
//			$fileName = $fileName . '.xlsx';
//		} else {
//			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
//			$fileName = $fileName . '.xls';
//		}
//
//		$this->output->set_header('Content-Type: application/vnd.ms-excel');
//		$this->output->set_header("Content-type: application/csv");
//		$this->output->set_header('Cache-Control: max-age=0');
//		$writer->save(ROOT_UPLOAD_PATH . $fileName);
//		//redirect(HTTP_UPLOAD_PATH.$fileName); 
//		$filepath = file_get_contents(ROOT_UPLOAD_PATH . $fileName);
//		force_download($fileName, $filepath);
//	}
	public function po_from_mpr_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'MPR List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/po_from_mpr_form', $data);
	}
	public function po_for_mpr_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mprid = $this->input->post('mprid');
		//$pd = $this->input->post('pd');
//		$wd = $this->input->post('wd');
		$data['ul'] = $this->Admin->po_for_mpr_list($mprid);
		$this->load->view('admin/po_for_mpr_list', $data);
	}
	public function receive_from_mpr_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Receive List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/receive_from_mpr_form', $data);
	}
	public function receive_for_mpr_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Receive List';
		$this->load->view('admin/head', $data);
		$mprid = $this->input->post('mprid');
		//$pd = $this->input->post('pd');
//		$wd = $this->input->post('wd');
		$data['ul'] = $this->Admin->receive_for_mpr_list($mprid);
		$this->load->view('admin/receive_for_mpr_list', $data);
	}
	// public function receive_create()
	// {
	// 	$this->load->database();
	// 	$this->load->library('form_validation');
	// 	$this->load->model('Admin');
	// 	if ($this->input->post('submit')) {
	// 		$userid = $this->input->post('userid');
	// 		$mprid = $this->input->post('mprid');
			
	// 		//$supplier = $this->input->post('supplier');
	// 		//$podate = $this->input->post('podate');
	// 		$item = $this->input->post('item');
	// 		$sipoid = $this->input->post('sipoid');
	// 		$po = $this->input->post('po');
	// 		$grn = $this->input->post('grn');
			
	// 		$rqty = $this->input->post('rqty');
	// 		$rdate = $this->input->post('rdate');
	// 		$rremarks = $this->input->post('rremarks');
	// 		//$rprice = $this->input->post('pprice');
	// 		//$pstatus = $this->input->post('pstatus');
	// 		for ($i = 0; $i < count($item); $i++) {
	// 			$data["i"] = $i;
	// 			$data["userid"] = $userid;
	// 			$data["mprid"] = $mprid;
	// 			$data["po"] = $po[$i];
	// 			$data["grn"] = $grn[$i];
	// 			//$data["supplier"] = $supplier[$i];
	// 			$data["rdate"] = $rdate[$i];
	// 			$data["item"] = $item[$i];
	// 			$data["sipoid"] = $sipoid[$i];
	// 			$data["rqty"] = $rqty[$i];
	// 			$data["rremarks"] = $rremarks[$i];
	// 			//$data["pprice"] = $pprice[$i];
	// 			//$data["pstatus"] = $pstatus[$i];
	// 			$ins = $this->Admin->receive_create($data);
	// 			//var_dump($data);
	// 		}
		
	// 		if($ins==TRUE)
	// 					{
	// 						$this->session->set_flashdata('Successfully','Successfully Inserted');
	// 					}
	// 				else
	// 					{
	// 						$this->session->set_flashdata('Successfully','Failed To Inserted');
	// 					}
	// 				redirect('Dashboard/receive_from_mpr_form','refresh');
	// 	}
	// }
	public function receive_create()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		//if ($this->input->post('submit')) {
			$userid = $this->input->post('userid');
			$mprid = $this->input->post('mprid');
			$item = $this->input->post('item');
			$sipoid = $this->input->post('sipoid');
			$po = $this->input->post('po');
			$grn = $this->input->post('grn');
			$rqty = $this->input->post('rqty');
			$rdate = $this->input->post('rdate');
			$rremarks = $this->input->post('rremarks');
			$ins = $this->Admin->receive_create($userid,$mprid,$item,$sipoid,$po,$grn,$rqty,$rdate,$rremarks);
			if($ins)
				{
					echo  "ok";	
				}
			else
				{
					echo  "error";	
				}
		//}
	}
	public function mpr_wise_receive_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Receive List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/mpr_wise_receive_list_form', $data);
	}
	public function mpr_wise_receive_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mprid = $this->input->post('mprid');
		//$pd = $this->input->post('pd');
//		$wd = $this->input->post('wd');
		$data['ul'] = $this->Admin->mpr_wise_receive_list($mprid);
		$this->load->view('admin/mpr_wise_receive_list', $data);
	}    
	public function mpr_wise_sreceive_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Receive List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/mpr_wise_sreceive_list_form', $data);
	}
	public function mpr_wise_sreceive_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mprid = $this->input->post('mprid');
		//$pd = $this->input->post('pd');
//		$wd = $this->input->post('wd');
		$data['ul'] = $this->Admin->mpr_wise_sreceive_list($mprid);
		$this->load->view('admin/mpr_wise_sreceive_list', $data);
	}    
}


