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
		$data['ul']=$this->Admin->factorywise_incometax_list_summary();
		$data['tl']=$this->Admin->typewise_incometax_list_summary();
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
	 
	
	
	 
	 public function user_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='User Info Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul1']=$this->Admin->factory_list();
		
		$data['ul2']=$this->Admin->usertype_list();
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
			$name=$this->input->post('name');
			$usertypeid=$this->input->post('usertypeid');
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			
			$ins=$this->Admin->user_insert($factoryid,$name,$usertypeid,$userid,$password);
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
		$data['ul']=$this->Admin->user_list();
		$this->load->view('admin/user_list',$data);
	}
	public function incometax_insert_form()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Income Tax Info Insert';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$this->load->view('admin/incometax_insert_form',$data);
	 }
	 public function incometax_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Income Tax List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$data['fil']=$this->Admin->fiscal_year_list();
		$this->load->view('admin/incometax_list',$data);
	 }
	 public function factorywise_incometax_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Income Tax List';
		$factoryid = $this->input->post('factoryid');
		$fyear = $this->input->post('fyear');
		$data['ul']=$this->Admin->factorywise_incometax_list($factoryid,$fyear);
		$this->load->view('admin/factorywise_incometax_list',$data);
	 }
	 public function incometax_acclist()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Income Tax List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$data['fil']=$this->Admin->fiscal_year_list();
		$this->load->view('admin/incometax_acclist',$data);
	 }
	  public function factorywise_incometax_acclist()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Income Tax List';
		$factoryid = $this->input->post('factoryid');
		$fyear = $this->input->post('fyear');
		$data['ul']=$this->Admin->factorywise_incometax_list($factoryid,$fyear);
		$this->load->view('admin/factorywise_incometax_acclist',$data);
	 }
	 public function unit_wise_summary()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='SBU Wise Summary List';
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl']=$this->Admin->factory_list();
		$data['fil']=$this->Admin->fiscal_year_list();
		//$data['ul']=$this->Admin->unit_wise_summary();
		$this->load->view('admin/unit_wise_summary',$data);
	 }
	 public function unit_wise_summary_list()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Income Tax List';
		$factoryid = $this->input->post('factoryid');
		$fyear = $this->input->post('fyear');
		$data['ul']=$this->Admin->factorywise_incometax_list_summary1($fyear);
		$data['tl']=$this->Admin->typewise_incometax_list_summary1($fyear);
		$this->load->view('admin/unit_wise_summary_list',$data);
	 }
	 public function incometax_list_up()
	 {
		$this->load->database();
		$this->load->model('Admin');
		$data['title']='Content Update';
		$itid= $this->uri->segment(3);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ilup']=$this->Admin->incometax_list_up($itid);
		$this->load->view('admin/incometax_list_up',$data);
	 }
	 public function incometaxlup()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if($this->input->post('submit'))
		{
			$itid=$this->input->post('itid');
			$userid=$this->input->post('userid');
			$tc=$this->input->post('tc');
			$tz=$this->input->post('tz');
			$rnumber=$this->input->post('rnumber');
			//$cnumber=$this->input->post('cnumber');
			//$sdate=$this->input->post('sdate');
			
			$ins=$this->Admin->incometaxlup($itid,$userid,$tc,$tz,$rnumber,$cnumber,$sdate);
			if($ins==TRUE)
				{
					$this->session->set_flashdata('Successfully','Successfully Updated');
				}
			else
				{
					$this->session->set_flashdata('Successfully','Failed To Updated');
				}
					redirect('Dashboard/incometax_list','refresh');
				
		}
	 }
}


