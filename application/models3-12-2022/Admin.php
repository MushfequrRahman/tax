<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

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
	
	
	//public function dashboard_status()
//	{
//		$sql1="SELECT * FROM opinfo WHERE opstatus=0";
//		$query1=$this->db->query($sql1);
//		$result=$query1->result_array();
//		return $result;
//	}
//	public function all_op_count()
//	{
//		$sql1="SELECT count(opid) AS opcount FROM opinfo WHERE opstatus=0";
//		$query1=$this->db->query($sql1);
//		$result=$query1->result_array();
//		return $result;
//	}
	
	
	
	
	
	
	public function show_divisionname($factoryid)
	{
		$query="SELECT divisionid,divisionname FROM division WHERE factoryid='$factoryid' ORDER BY divisionname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function show_departmentname($factoryid,$divisionid)
	{
		$query="SELECT deptid,departmentname FROM department WHERE factoryid='$factoryid' AND divisionid='$divisionid' ORDER BY departmentname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function show_sectionname($factoryid,$divisionid,$departmentid)
	{
		$query="SELECT secid,sectionname FROM section WHERE factoryid='$factoryid' AND divisionid='$divisionid' AND departmentid='$departmentid' ORDER BY sectionname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function show_subsectionname($factoryid,$divisionid,$departmentid,$sectionid)
	{
		$query="SELECT subsecid,subsectionname FROM subsection WHERE factoryid='$factoryid' AND divisionid='$divisionid' AND departmentid='$departmentid' AND sectionid='$sectionid' ORDER BY subsectionname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	
	public function show_childdesignationname($parentdesignationid)
	{
		$query="SELECT childdesignationid,echilddesignation FROM childdesignation WHERE parentdesignationid='$parentdesignationid' ORDER BY echilddesignation ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function show_openernname($factoryid)
	{
		$query="SELECT opener.openerid,user.ename FROM opener 
		JOIN user ON user.userid=opener.openerid
		WHERE opener.factoryid='$factoryid' 
		ORDER BY opener.openerid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function show_areaname($regionname)
	{
		$query="SELECT areaid,areaname FROM area WHERE regionid='$regionname' ORDER BY areaname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function show_territoryname($regionname,$areaname)
	{
		$query="SELECT territoryid,territoryname FROM territory WHERE regionid='$regionname' AND areaid='$areaname' ORDER BY territoryname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function show_boxno($factoryid)
	{
		$query="SELECT biid,boxno FROM boxno_insert WHERE factoryid='$factoryid' ORDER BY boxno ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function fac_insert($facid,$facname,$fac_address)
	{
		$sql="SELECT * FROM factory WHERE factoryid='$facid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO factory VALUES ('$facid','$facname','$fac_address')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function factory_list()
	{
		$query="SELECT * FROM factory";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function factory_list_up($facid)
	{
		$sql1="SELECT * FROM factory
		
		
		WHERE factoryid='$facid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function flup($fid,$facid,$factoryname,$factory_address)
	{
		
		$sql="UPDATE factory SET factoryid='$facid',factoryname='$factoryname',factory_address='$factory_address' WHERE factoryid='$fid'";
		$query=$this->db->query($sql);
	}
	public function division_insert($diviname,$factoryid)
	{
		$sql="SELECT divisionname,factoryid FROM division WHERE divisionname='$diviname' AND factoryid='$factoryid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO division VALUES ('','$diviname','$factoryid')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function division_list()
	{
		$query="SELECT * FROM division 
		JOIN factory ON
		factory.factoryid=division.factoryid ORDER BY factory.factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function division_list_up($divisionid)
	{
		$sql1="SELECT * FROM division
		JOIN factory ON
		factory.factoryid=division.factoryid
		
		WHERE divisionid='$divisionid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function dlup($divisionid,$divisionname)
	{
		
		$sql="UPDATE division SET divisionid='$divisionid',divisionname='$divisionname' WHERE divisionid='$divisionid'";
		$query=$this->db->query($sql);
	}
	public function department_insert($factoryid,$divisionid,$department)
	{
		$sql="SELECT * FROM department WHERE factoryid='$factoryid' AND divisionid='$divisionid' AND departmentname='$department'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO department VALUES ('','$factoryid','$divisionid','$department')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	
	public function department_list()
	{
		$query="SELECT * FROM department 
		JOIN factory ON
		factory.factoryid=department.factoryid
		JOIN division ON
		division.divisionid=department.divisionid AND
		division.factoryid=department.factoryid ORDER BY factory.factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function department_list_up($deptid)
	{
		$sql1="SELECT * FROM department 
		JOIN factory ON
		factory.factoryid=department.factoryid
		JOIN division ON
		division.divisionid=department.divisionid AND
		division.factoryid=department.factoryid
		
		WHERE deptid='$deptid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function departmentlup($deptid,$departmentname)
	{
		
		$sql="UPDATE department SET deptid='$deptid',departmentname='$departmentname' WHERE deptid='$deptid'";
		$query=$this->db->query($sql);
	}
	
    public function section_insert($factoryid,$divisionid,$departmentid,$section)
	{
		$sql="SELECT * FROM section WHERE factoryid='$factoryid' AND divisionid='$divisionid' AND departmentid='$departmentid' AND sectionname='$section'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO section VALUES ('','$factoryid','$divisionid','$departmentid','$section')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function section_list()
	{
		$query="SELECT * FROM section 
		JOIN factory ON
		factory.factoryid=section.factoryid
		JOIN division ON
		division.divisionid=section.divisionid AND
		division.factoryid=section.factoryid
		JOIN department ON
		department.deptid=section.departmentid AND
		department.factoryid=section.factoryid AND
		department.divisionid=section.divisionid ORDER BY factory.factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function section_list_up($secid)
	{
		$sql1="SELECT * FROM section 
		JOIN factory ON
		factory.factoryid=section.factoryid
		JOIN division ON
		division.divisionid=section.divisionid AND
		division.factoryid=section.factoryid
		JOIN department ON
		department.deptid=section.departmentid AND
		department.factoryid=section.factoryid AND
		department.divisionid=section.divisionid
		
		WHERE secid='$secid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function sectionlup($secid,$sectionname)
	{
		
		$sql="UPDATE section SET secid='$secid',sectionname='$sectionname' WHERE secid='$secid'";
		$query=$this->db->query($sql);
	}
	public function subsection_insert($factoryid,$divisionid,$departmentid,$sectionid,$subsection)
	{
		$sql="SELECT * FROM subsection WHERE factoryid='$factoryid' AND divisionid='$divisionid' AND departmentid='$departmentid' AND sectionid='$sectionid' AND subsectionname='$subsection'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO subsection VALUES ('','$factoryid','$divisionid','$departmentid','$sectionid','$subsection')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	
	public function subsection_list()
	{
		$query="SELECT * FROM subsection 
		JOIN factory ON
		factory.factoryid=subsection.factoryid
		JOIN division ON
		division.divisionid=subsection.divisionid AND
		division.factoryid=subsection.factoryid
		JOIN department ON
		department.deptid=subsection.departmentid AND
		department.factoryid=subsection.factoryid AND
		department.divisionid=subsection.divisionid
		JOIN section ON
		section.departmentid=subsection.departmentid AND
		section.factoryid=subsection.factoryid AND
		section.divisionid=subsection.divisionid AND
		section.secid=subsection.sectionid ORDER BY factory.factoryid ASC
		";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function subsection_list_up($subsecid)
	{
		$sql1="SELECT * FROM subsection 
		JOIN factory ON
		factory.factoryid=subsection.factoryid
		JOIN division ON
		division.divisionid=subsection.divisionid AND
		division.factoryid=subsection.factoryid
		JOIN department ON
		department.deptid=subsection.departmentid AND
		department.factoryid=subsection.factoryid AND
		department.divisionid=subsection.divisionid
		JOIN section ON
		section.departmentid=subsection.departmentid AND
		section.factoryid=subsection.factoryid AND
		section.divisionid=subsection.divisionid AND
		section.secid=subsection.sectionid
		
		WHERE subsecid='$subsecid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function subsectionlup($subsecid,$subsectionname)
	{
		
		$sql="UPDATE subsection SET subsecid='$subsecid',subsectionname='$subsectionname' WHERE subsecid='$subsecid'";
		$query=$this->db->query($sql);
	}
	public function religion_insert($religionname)
	{
		$sql="SELECT * FROM religion WHERE religionname='$religionname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO religion VALUES ('','$religionname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function religion_list()
	{
		$query="SELECT * FROM religion";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function religion_list_up($religionid)
	{
		$sql1="SELECT * FROM religion WHERE religionid='$religionid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function religionlup($religionid,$religionname)
	{
		
		$sql="UPDATE religion SET religionname='$religionname' WHERE religionid='$religionid'";
		$query=$this->db->query($sql);
	}
	public function product_insert($pid,$product)
	{
		$sql="SELECT * FROM product WHERE pname='$product' OR pid='$pid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO product VALUES ('$pid','$product')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function product_import_excel($data)
	{
		
		$sql="INSERT INTO product VALUES ('$data[pid]','$data[pname]')";
		$query=$this->db->query($sql);
		return $query;
    }
	public function product_list()
	{
		$query="SELECT * FROM product";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function product_list_up($pid)
	{
		$sql1="SELECT * FROM product WHERE pid='$pid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function productlup($pid,$product)
	{
		
		$sql="UPDATE product SET pname='$product' WHERE pid='$pid'";
		$query=$this->db->query($sql);
	}
	public function productunit_insert($productunitname)
	{
		$sql="SELECT * FROM productunit WHERE productunitname='$productunitname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO productunit VALUES ('','$productunitname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function productunit_list()
	{
		$query="SELECT * FROM productunit";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function productunit_list_up($productunitid)
	{
		$sql1="SELECT * FROM productunit WHERE productunitid='$productunitid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function productunitlup($productunitid,$productunitname)
	{
		
		$sql="UPDATE productunit SET productunitname='$productunitname' WHERE productunitid='$productunitid'";
		$query=$this->db->query($sql);
	}
	public function producttype_insert($producttype)
	{
		$sql="SELECT * FROM producttype WHERE producttype='$producttype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO producttype VALUES ('','$producttype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function producttype_list()
	{
		$query="SELECT * FROM producttype";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function producttype_list_up($producttypeid)
	{
		$sql1="SELECT * FROM producttype WHERE producttypeid='$producttypeid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function producttypelup($producttypeid,$producttype)
	{
		
		$sql="UPDATE producttype SET producttype='$producttype' WHERE producttypeid='$producttypeid'";
		$query=$this->db->query($sql);
	}
	public function challantype_insert($challantype)
	{
		$sql="SELECT * FROM challantype WHERE challantype='$challantype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO challantype VALUES ('','$challantype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function challantype_list()
	{
		$query="SELECT * FROM challantype";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function challantype_list_up($challantypeid)
	{
		$sql1="SELECT * FROM challantype WHERE challantypeid='$challantypeid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function challantypelup($challantypeid,$challantype)
	{
		
		$sql="UPDATE challantype SET challantype='$challantype' WHERE challantypeid='$challantypeid'";
		$query=$this->db->query($sql);
	}
	public function gender_insert($gender)
	{
		$sql="SELECT * FROM gender WHERE gender='$gender'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO gender VALUES ('','$gender')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function gender_list()
	{
		$query="SELECT * FROM gender";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function gender_list_up($genderid)
	{
		$sql1="SELECT * FROM gender WHERE genderid='$genderid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function genderlup($genderid,$gender)
	{
		
		$sql="UPDATE gender SET gender='$gender' WHERE genderid='$genderid'";
		$query=$this->db->query($sql);
	}
	public function maritualstatus_insert($maritualstatus)
	{
		$sql="SELECT * FROM maritualstatus WHERE maritualstatus='$maritualstatus'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO maritualstatus VALUES ('','$maritualstatus')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function maritualstatus_list()
	{
		$query="SELECT * FROM maritualstatus";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function maritualstatus_list_up($maritualstatusid)
	{
		$sql1="SELECT * FROM maritualstatus WHERE maritualstatusid='$maritualstatusid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function maritualstatuslup($maritualstatusid,$maritualstatus)
	{
		
		$sql="UPDATE maritualstatus SET maritualstatus='$maritualstatus' WHERE maritualstatusid='$maritualstatusid'";
		$query=$this->db->query($sql);
	}
	public function parentdesignation_insert($eparentdesignation,$bparentdesignation)
	{
		$sql="SELECT * FROM parentdesignation WHERE eparentdesignation='$eparentdesignation' AND bparentdesignation='$bparentdesignation'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO parentdesignation VALUES ('','$eparentdesignation','$bparentdesignation')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function parentdesignation_list()
	{
		$query="SELECT * FROM parentdesignation";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function parentdesignation_list_up($parentdesignationid)
	{
		$sql1="SELECT * FROM parentdesignation WHERE parentdesignationid='$parentdesignationid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function parentdesignationlup($parentdesignationid,$eparentdesignation,$bparentdesignation)
	{
		
		$sql="UPDATE parentdesignation SET eparentdesignation='$eparentdesignation',bparentdesignation='$bparentdesignation' WHERE parentdesignationid='$parentdesignationid'";
		$query=$this->db->query($sql);
	}
	public function childdesignation_insert($parentdesignationid,$echilddesignation,$bchilddesignation)
	{
		$sql="SELECT * FROM childdesignation WHERE echilddesignation='$echilddesignation' AND bchilddesignation='$bchilddesignation'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO childdesignation VALUES ('','$parentdesignationid','$echilddesignation','$bchilddesignation')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function childdesignation_list()
	{
		$query="SELECT * FROM childdesignation JOIN parentdesignation ON
		parentdesignation.parentdesignationid=childdesignation.parentdesignationid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
   public function childdesignation_list_up($childdesignationid)
	{
		$sql1="SELECT * FROM childdesignation JOIN parentdesignation ON
		parentdesignation.parentdesignationid=childdesignation.parentdesignationid WHERE childdesignationid='$childdesignationid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
   public function childdesignationlup($childdesignationid,$echilddesignation,$bchilddesignation)
	{
		
		$sql="UPDATE childdesignation SET echilddesignation='$echilddesignation',bchilddesignation='$bchilddesignation' WHERE childdesignationid='$childdesignationid'";
		$query=$this->db->query($sql);
	}
  public function usertype_insert($usertype)
	{
		$sql="SELECT * FROM usertype WHERE usertype='$usertype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO usertype VALUES ('','$usertype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function usertype_list()
	{
		$query="SELECT * FROM usertype";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function usertype_list_up($usertypeid)
	{
		$sql1="SELECT * FROM usertype WHERE usertypeid='$usertypeid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function usertypelup($usertypeid,$usertype)
	{
		
		$sql="UPDATE usertype SET usertype='$usertype' WHERE usertypeid='$usertypeid'";
		$query=$this->db->query($sql);
	}
	public function useraccess_insert($userid,$bsre,$bswr,$tsre,$tswr,$lsre,$lswr,$nare,$nawr,$pare,$pawr,$eare,$eawr,$trre,$trwr,$swotre,$swotwr,$eore,$eowr,$mmre,$mmwr,$mmallure,$mmchac,$hr,$regisbook,$letterissuere,$letterissuewr,$care,$cawr,$capre,$capwr,$scre,$scwr,$dcre,$dcwr,$sbre,$sbwr,$prre,$prwr,$vtre,$vtwr,$ihre,$ihwr,$odre,$bldgre,$bldgwr,$recruitmentre,$recruitmentwr,$irre,$irwr,$baslre,$baslwr,$adminre,$adminwr,$receiptionre,$receiptionwr,$incidentre,$incidentwr,$innovationre,$innovationwr,$libraryre,$librarywr,$incometaxre,$incometaxwr,$misre,$miswr)
	{
		$sql="SELECT * FROM user_access WHERE userid='$userid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO user_access VALUES ('$userid','$bsre','$bswr','$tsre','$tswr','$lsre','$lswr','$nare','$nawr','$pare','$pawr','$eare','$eawr','$trre','$trwr','$swotre','$swotwr','$eore','$eowr','$mmre','$mmwr','$mmallure','$mmchac','$hr','$regisbook','$letterissuere','$letterissuewr','$care','$cawr','$capre','$capwr','$scre','$scwr','$dcre','$dcwr','$sbre','$sbwr','$prre','$prwr','$vtre','$vtwr','$ihre','$ihwr','$odre','$bldgre','$bldgwr','$recruitmentre','$recruitmentwr','$irre','$irwr','$baslre','$baslwr','$adminre','$adminwr','$receiptionre','$receiptionwr','$incidentre','$incidentwr','$innovationre','$innovationwr','$libraryre','$librarywr','$incometaxre','$incometaxwr','$misre','$miswr')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function useraccess_update($userid)
	{
		$sql1="SELECT * FROM user_access WHERE userid='$userid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function useraccesslup($userid,$bsre,$bswr,$tsre,$tswr,$lsre,$lswr,$nare,$nawr,$pare,$pawr,$eare,$eawr,$trre,$trwr,$swotre,$swotwr,$eore,$eowr,$mmre,$mmwr,$mmallure,$mmchac,$hr,$regisbook,$letterissuere,$letterissuewr,$care,$cawr,$capre,$capwr,$scre,$scwr,$dcre,$dcwr,$sbre,$sbwr,$prre,$prwr,$vtre,$vtwr,$ihre,$ihwr,$odre,$bldgre,$bldgwr,$recruitmentre,$recruitmentwr,$irre,$irwr,$baslre,$baslwr,$adminre,$adminwr,$receiptionre,$receiptionwr,$incidentre,$incidentwr,$innovationre,$innovationwr,$libraryre,$librarywr,$incometaxre,$incometaxwr,$misre,$miswr)
	{
		$sql1="UPDATE user_access SET 
		basicinfo_read='$bsre',basicinfo_write='$bswr',tasktracker_read='$tsre',tasktracker_write='$tswr',licensetracker_read='$lsre',licensetracker_write='$lswr',noticealbum_read='$nare',noticealbum_write='$nawr',policyalbum_read='$pare',policyalbum_write='$pawr',eventalbum_read='$eare',eventalbum_write='$eawr',training_read='$trre',training_write='$trwr',swot_read='$swotre',swot_write='$swotwr',eobservation_read='$eore',eobservation_write='$eowr',materialmovement_read='$mmre',materialmovement_write='$mmwr',materialmovement_allunit_read='$mmallure',materialmovement_challan_create='$mmchac',hr='$hr',regisbook='$regisbook',letterissue_read='$letterissuere',letterissue_write='$letterissuewr',calendar_read='$care',calendar_write='$cawr',compliancecap_read='$capre',compliancecap_write='$capwr',scorecard_read='$scre',scorecard_write='$scwr',dcaction_read='$dcre',dcaction_write='$dcwr',suggessionbox_read='$sbre',suggessionbox_write='$sbwr',production_read='$prre',production_write='$prwr',vehicletracker_read='$vtre',vehicletracker_write='$vtwr',ideaharbor_read='$ihre',ideaharbor_write='$ihwr',od_read='$odre',bloodgroup_read='$bldgre',bloodgroup_write='$bldgwr',recruitment_read='$recruitmentre',recruitment_write='$recruitmentwr',ir_read='$irre',ir_write='$irwr',basl_read='$baslre',basl_write='$baslwr',admin_read='$adminre',admin_write='$adminwr',receiption_read='$receiptionre',receiption_write='$receiptionwr',incident_read='$incidentre',incident_write='$incidentwr',innovation_read='$innovationre',innovation_write='$innovationwr',library_read='$libraryre',library_write='$librarywr',incometax_read='$incometaxre',incometax_write='$incometaxwr',mis_read='$misre',mis_write='$miswr'
		WHERE userid='$userid'";
		return $query1=$this->db->query($sql1);
		//$result=$query1->result_array();
		
	}
	public function user_insert($factoryid,$divisionid,$departmentid,$sectionid,$subsectionid,$location,$ename,$bname,$parentdesignationid,$childdesignationid,$religion,$maritual,$dobdate,$dojdate,$hdistrict,$epermanentaddress,$bpermanentaddress,$epresentaddress,$bpresentaddress,$nid,$tin,$bloodgroup,$gender,$salary,$efficiency,$imark,$oemail,$pemail,$pmobile,$emobile,$usertypeid,$servicetypeid,$worktypeid,$userid,$password,$pperiod,$commitment,$indate,$pic_file)
	{
		$indate= date("Y-m-d", strtotime($indate));
		$dobdate= date("Y-m-d", strtotime($dobdate));
		$dojdate= date("Y-m-d", strtotime($dojdate));
		$userid1=$factoryid.$userid;
		$sql="SELECT * FROM user WHERE userid='$userid1'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$puserid=$userid;
		//$userid=$factoryid.$userid;
		$ruserid=$userid;		
		$sql="INSERT INTO user VALUES ('$factoryid','$divisionid','$departmentid','$sectionid','$subsectionid','$location','$ename','$bname','$parentdesignationid','$childdesignationid','$religion','$maritual','$dobdate','$dojdate','$hdistrict','$epermanentaddress','$bpermanentaddress','$epresentaddress','$bpresentaddress','$nid','$tin','$bloodgroup','$gender','$salary','$efficiency','$imark','$oemail','$pemail','$pmobile','$emobile','$usertypeid','$servicetypeid','$worktypeid','$puserid','$userid','$ruserid','$password','$pperiod','1','$commitment','$pic_file','1','$indate')";
		$query=$this->db->query($sql);
		$sql1="INSERT INTO rootuser VALUES ('$ruserid')";
		$query1=$this->db->query($sql1);
		return $query;
		}
	}
	public function tuser_insert($factoryid,$divisionid,$departmentid,$sectionid,$subsectionid,$location,$ename,$bname,$parentdesignationid,$childdesignationid,$religion,$maritual,$dobdate,$dojdate,$hdistrict,$epermanentaddress,$bpermanentaddress,$epresentaddress,$bpresentaddress,$nid,$tin,$bloodgroup,$gender,$salary,$efficiency,$imark,$oemail,$pemail,$pmobile,$emobile,$usertypeid,$servicetypeid,$worktypeid,$userid,$tuserid,$password,$pperiod,$indate,$commitment)
	{
		$sql="SELECT * FROM user WHERE userid='$tuserid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql1="SELECT image FROM user WHERE userid='$userid'";
		$query1=$this->db->query($sql1);
		$query1=$query1->result_array();
		foreach($query1 as $row)
		{
			$pic_file=$row['image'];
		}
		$puserid=$tuserid;
		$tuserid=$factoryid.$tuserid;
		$ruserid=$userid;		
		$sql2="INSERT INTO user VALUES ('$factoryid','$divisionid','$departmentid','$sectionid','$subsectionid','$location','$ename','$bname','$parentdesignationid','$childdesignationid','$religion','$maritual','$dobdate','$dojdate','$hdistrict','$epermanentaddress','$bpermanentaddress','$epresentaddress','$bpresentaddress','$nid','$tin','$bloodgroup','$gender','$salary','$efficiency','$imark','$oemail','$pemail','$pmobile','$emobile','$usertypeid','$servicetypeid','$worktypeid','$puserid','$tuserid','$ruserid','$password','$pperiod','0','$commitment','$pic_file','1','$indate')";
		$query2=$this->db->query($sql2);
		$sql3="UPDATE user SET ustatus='3' WHERE userid='$userid'";
		$query3=$this->db->query($sql3);
		return $query2;
		}
	}
	public function factorywise_user_list($factoryid)
	{
		//$query="SELECT * FROM user
//		LEFT JOIN factory ON factory.factoryid=user.factoryid
//		LEFT JOIN division ON division.divisionid=user.divisionid 
//		LEFT JOIN department ON department.deptid=user.departmentid
//		LEFT JOIN section ON section.secid=user.sectionid
//		LEFT JOIN subsection ON subsection.subsecid=user.subsectionid
//		LEFT JOIN religion ON religion.religionid=user.religion
//		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=user.maritual
//		LEFT JOIN gender ON gender.genderid=user.gender
//		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
//		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
//		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
//		WHERE user.factoryid='$factoryid' ORDER BY userid";
		
		//$query="SELECT user.factoryid,user.userid,factory.factoryname,division.divisionname,(user.divisionid) AS diviid,user.departmentid,department.deptid,department.departmentname,user.sectionid,section.sectionname,user.subsectionid,subsection.subsectionname,user.location,user.ename,user.bname,user.parentdesignationid,user.childdesignationid,user.religion,user.maritual,user.dob,user.doj,user.hdistrict,user.epermanentaddress,user.bpermanentaddress,user.epresentaddress,user.bpresentaddress,user.nid,user.blodgroup,user.gender,user.salary,user.efficiency,user.identification,user.oemail,user.pemail,user.pmobile,user.emobile,user.user_type,user.service_type,user.puserid,user.ruserid,user.password,user.ustatus,usertype.usertypeid,usertype.usertype,servicetype.servicetypeid,servicetype.servicetype,userstatus.userstatusid,userstatus.userstatus,religion.religionid,religion.religionname,maritualstatus.maritualstatusid,maritualstatus.maritualstatus,gender.genderid,gender.gender,user.password,parentdesignation.eparentdesignation,parentdesignation.parentdesignationid,parentdesignation.bparentdesignation,childdesignation.childdesignationid,childdesignation.echilddesignation,childdesignation.bchilddesignation,user.pperiod,worktype,user.pperiod_status,user.image  FROM user
//		LEFT JOIN factory ON factory.factoryid=user.factoryid
//		LEFT JOIN division ON division.divisionid=user.divisionid 
//		LEFT JOIN department ON department.deptid=user.departmentid
//		LEFT JOIN section ON section.secid=user.sectionid
//		LEFT JOIN subsection ON subsection.subsecid=user.subsectionid
//		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=user.parentdesignationid
//		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
//		LEFT JOIN religion ON religion.religionid=user.religion
//		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=user.maritual
//		LEFT JOIN gender ON gender.genderid=user.gender
//		LEFT JOIN usertype ON usertype.usertypeid=user.user_type 
//		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
//		LEFT JOIN worktype ON worktype.wtid=user.work_type
//		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
//		WHERE user.factoryid='$factoryid' ORDER BY user.userid";

		$query="SELECT user.factoryid,user.userid,user.ename,user.doj,user.oemail,user.pemail,user.pmobile,user.emobile,usertype.usertype,user.service_type,user.ustatus,servicetype.servicetype,userstatus.userstatus,user.pperiod,worktype,user.pperiod_status,user.image  FROM user
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type 
		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
		LEFT JOIN worktype ON worktype.wtid=user.work_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus 
		WHERE user.factoryid='$factoryid' ORDER BY userid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function user_list_up($userid)
	{
		$sql1="SELECT user.factoryid,user.userid,factory.factoryname,division.divisionname,(user.divisionid) AS diviid,user.departmentid,department.deptid,department.departmentname,user.sectionid,section.sectionname,user.subsectionid,subsection.subsectionname,user.location,user.ename,user.bname,user.parentdesignationid,user.childdesignationid,user.religion,user.maritual,user.dob,user.doj,user.hdistrict,user.epermanentaddress,user.bpermanentaddress,user.epresentaddress,user.bpresentaddress,user.nid,tin,user.blodgroup,user.gender,user.salary,user.efficiency,user.identification,user.oemail,user.pemail,user.pmobile,user.emobile,user.user_type,user.service_type,user.puserid,user.ruserid,user.password,user.ustatus,usertype.usertypeid,usertype.usertype,servicetype.servicetypeid,servicetype.servicetype,userstatus.userstatusid,userstatus.userstatus,religion.religionid,religion.religionname,maritualstatus.maritualstatusid,maritualstatus.maritualstatus,gender.genderid,gender.gender,user.password,parentdesignation.eparentdesignation,parentdesignation.parentdesignationid,parentdesignation.bparentdesignation,childdesignation.childdesignationid,childdesignation.echilddesignation,childdesignation.bchilddesignation,user.pperiod,wtid,worktype,user.pperiod_status,user.indate  FROM user
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN division ON division.divisionid=user.divisionid 
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN section ON section.secid=user.sectionid
		LEFT JOIN subsection ON subsection.subsecid=user.subsectionid
		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=user.parentdesignationid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
		LEFT JOIN religion ON religion.religionid=user.religion
		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=user.maritual
		LEFT JOIN gender ON gender.genderid=user.gender
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type 
		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
		LEFT JOIN worktype ON worktype.wtid=user.work_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE userid='$userid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function ulup($factoryid,$divisionid,$departmentid,$sectionid,$subsectionid,$location,$ename,$bname,$parentdesignationid,$childdesignationid,$religion,$maritual,$dobdate,$dojdate,$hdistrict,$epermanentaddress,$bpermanentaddress,$epresentaddress,$bpresentaddress,$nid,$tin,$bloodgroup,$gender,$salary,$efficiency,$imark,$oemail,$pemail,$pmobile,$emobile,$usertypeid,$serviceypeid,$worktypeid,$userstatusid,$userid,$password,$pperiod,$pperiodstatus,$commitment,$indate)
	
	{
		$indate= date("Y-m-d", strtotime($indate));
		$dobdate= date("Y-m-d", strtotime($dobdate));
		$dojdate= date("Y-m-d", strtotime($dojdate));
		$sql="UPDATE user SET factoryid='$factoryid',divisionid='$divisionid',departmentid='$departmentid',sectionid='$sectionid',subsectionid='$subsectionid',location='$location',ename='$ename',bname='$bname',parentdesignationid='$parentdesignationid',childdesignationid='$childdesignationid',religion='$religion',maritual='$maritual',dob='$dobdate',doj='$dojdate',hdistrict='$hdistrict',epermanentaddress='$epermanentaddress',bpermanentaddress='$bpermanentaddress',epresentaddress='$epresentaddress',bpresentaddress='$bpresentaddress',nid='$nid',tin='$tin',blodgroup='$bloodgroup',gender='$gender',salary='$salary',efficiency='$efficiency',identification='$imark',oemail='$oemail',pemail='$pemail',pmobile='$pmobile',emobile='$emobile',user_type='$usertypeid',service_type='$serviceypeid',work_type='$worktypeid',ustatus='$userstatusid',password='$password',pperiod='$pperiod',pperiod_status='$pperiodstatus',commitment='$commitment',indate='$indate' WHERE userid='$userid'";
		$query=$this->db->query($sql);
	}
	public function servicetype_insert($servicetype)
	{
		$sql="SELECT * FROM servicetype WHERE servicetype='$servicetype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO servicetype VALUES ('','$servicetype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function servicetype_list()
	{
		$query="SELECT * FROM servicetype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function servicetype_list_up($servicetypeid)
	{
		$sql1="SELECT * FROM servicetype WHERE servicetypeid='$servicetypeid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function servicetypelup($servicetypeid,$servicetype)
	{
		
		$sql="UPDATE servicetype SET servicetype='$servicetype' WHERE servicetypeid='$servicetypeid'";
		$query=$this->db->query($sql);
	}
	public function worktype_insert($worktype)
	{
		$sql="SELECT * FROM worktype WHERE worktype='$worktype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO worktype VALUES ('','$worktype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function worktype_list()
	{
		$query="SELECT * FROM worktype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function worktype_list_up($worktypeid)
	{
		$sql1="SELECT * FROM worktype WHERE wtid='$worktypeid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function worktypelup($worktypeid,$worktype)
	{
		$sql="UPDATE worktype SET worktype='$worktype' WHERE wtid='$worktypeid'";
		$query=$this->db->query($sql);
	}
	public function userstatus_insert($userstatus)
	{
		$sql="SELECT * FROM userstatus WHERE userstatus='$userstatus'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO userstatus VALUES ('','$userstatus')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function userstatus_list()
	{
		$query="SELECT * FROM userstatus";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function userstatus_list_up($userstatusid)
	{
		$sql1="SELECT * FROM userstatus WHERE userstatusid='$userstatusid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function userstatuslup($userstatusid,$userstatus)
	{
		
		$sql="UPDATE userstatus SET userstatus='$userstatus' WHERE userstatusid='$userstatusid'";
		$query=$this->db->query($sql);
	}
	public function eimglup($userid,$pic_file)
	{
		
		$sql="UPDATE user SET image='$pic_file' WHERE userid='$userid'";
		return $query=$this->db->query($sql);
	}
	
	public function usercv_insert($userid,$pic_file)
	{
		
		$sql="SELECT * FROM user_cv WHERE userid='$userid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
			
		$sql="INSERT INTO user_cv VALUES ('$userid','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function user_profile($userid)
	{
		
		//$sql="SELECT user_cv.userid,user_cv.cv,user.ename,swot_insert.swot_type,swot_insert.sdetails,eobservation_insert.odetails,diciplinary_action_insert.accusedid,diciplinary_action_insert.disposal,diciplinary_action_insert.remarks FROM user_cv 
//		LEFT JOIN user ON user.userid=user_cv.userid
//		LEFT JOIN swot_insert ON swot_insert.userid=user_cv.userid
//		LEFT JOIN eobservation_insert ON eobservation_insert.userid=user_cv.userid
//		LEFT JOIN diciplinary_action_insert ON diciplinary_action_insert.accusedid=user_cv.userid
//		WHERE user_cv.userid='$userid'";
//		$result=$this->db->query($sql);
//		return $result->result_array();

		//$sql="SELECT user_cv.userid,user_cv.cv,user.ename,user.dob,bloodgroup_insert.bloodgroup,bloodgroup_insert.besttraits,
//bloodgroup_insert.worsttraits,swot_insert.swot_type,swot_insert.sdetails,eobservation_insert.odetails,
//diciplinary_action_insert.accusedid,diciplinary_action_insert.disposal,diciplinary_action_insert.remarks 
//FROM user 
//		LEFT JOIN user_cv ON user_cv.userid=user.userid
//		LEFT JOIN swot_insert ON swot_insert.userid=user.userid
//		LEFT JOIN eobservation_insert ON eobservation_insert.userid=user.userid
//		LEFT JOIN diciplinary_action_insert ON diciplinary_action_insert.accusedid=user.userid
//		LEFT JOIN bloodgroup_insert ON user.blodgroup=bloodgroup_insert.bloodgroup
//		WHERE user.userid='$userid'";
//		$result=$this->db->query($sql);
//		return $result->result_array();


		$sql="SELECT user_cv.userid,user_cv.cv,user.ename,user.dob,bloodgroup_insert.bloodgroup,bloodgroup_insert.besttraits,
bloodgroup_insert.worsttraits,swot_insert.swot_type,swot_insert.sdetails
FROM user 
		LEFT JOIN user_cv ON user_cv.userid=user.userid
		LEFT JOIN swot_insert ON swot_insert.userid=user.userid
		
		LEFT JOIN bloodgroup_insert ON user.blodgroup=bloodgroup_insert.bloodgroup
		WHERE user.userid='$userid'";
		$result=$this->db->query($sql);
		return $result->result_array();
		
	}
	public function user_profile1($userid)
	{
		
		

		$sql="SELECT eobservation_insert.odetails,
diciplinary_action_insert.accusedid,diciplinary_action_insert.disposal,diciplinary_action_insert.remarks 
FROM user 
		
		LEFT JOIN eobservation_insert ON eobservation_insert.userid=user.userid
		LEFT JOIN diciplinary_action_insert ON diciplinary_action_insert.accusedid=user.userid
		
		WHERE user.userid='$userid'";
		$result=$this->db->query($sql);
		return $result->result_array();


		
		
	}
	public function createtask_insert($userid,$tasktypeid,$taskname,$taskdescription,$createdate,$deadline)
	{
		
	date_default_timezone_set('Asia/Dhaka');
	$createdate = date("Y-m-d", strtotime($createdate));
	$deadline = date("Y-m-d", strtotime($deadline));
	$d=date('Y-m-d');
	$t= date("h:i:s");
	$d=str_replace("-","",$d);
	$t=str_replace(":","",$t);
	$ctid=$d.$t;
		$sql="INSERT INTO createtask VALUES ('$ctid','$userid','$tasktypeid','$taskname','$taskdescription','$createdate','$deadline',1,1)";
		$query=$this->db->query($sql);
		return $query;
		//}
	}
	public function task_list($userid)
	{
		$query="SELECT * FROM createtask
		JOIN user ON user.userid=createtask.userid
		
		LEFT JOIN tasktype ON tasktype.tasktypeid=createtask.tasktypeid
		WHERE createtaskstatus='1' AND createtask.userid='$userid' ORDER BY STR_TO_DATE(createdate,'%Y-%m-%d') DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function task_list_all()
	{
		$query="SELECT * FROM createtask
		JOIN user ON user.userid=createtask.userid
		
		LEFT JOIN tasktype ON tasktype.tasktypeid=createtask.tasktypeid
		WHERE createtaskstatus='1' ORDER BY STR_TO_DATE(createdate,'%Y-%m-%d') DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function taskassignee_select_insert($data)
	{
		$d=date('Y-m-d');
		$t= date("h:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$ctaid=$d.$t;
		$sql="SELECT * FROM task_assignee WHERE createtaskid='$data[createtaskid]' AND auserid='$data[userid]'";
		$query=$this->db->query($sql);
		
		if($query->num_rows()==1)
			{
				return false;
			}
		else
			{
				//$sql2="INSERT INTO assignee_task_list VALUES ('$ctaid','$userid','$data[userid]','$data[createtaskid]','$taskname','$taskdescription','$createdate','$deadline','$pic_file','1','','','','','')";
//				$query2=$this->db->query($sql2);
		
				$sql="INSERT INTO task_assignee VALUES ('$data[createtaskid]','$data[userid]')";
				$query=$this->db->query($sql);
				return true;
			}
	}
	public function screatetask_insert($userid,$tasktypeid,$auserid,$taskname,$taskdescription,$createdate,$deadline,$pic_file)
	{
		
	date_default_timezone_set('Asia/Dhaka');
	$createdate = date("Y-m-d", strtotime($createdate));
	$deadline = date("Y-m-d", strtotime($deadline));
	$d=date('Y-m-d');
	$t= date("h:i:s");
	$d=str_replace("-","",$d);
	$t=str_replace(":","",$t);
	$calen =$deadline.' '.'23:59:59';
	$ctid=$d.$t;
		$sql="INSERT INTO createtask VALUES ('$ctid','$userid','$tasktypeid','$taskname','$taskdescription','$createdate','$deadline',1,2)";
		$query=$this->db->query($sql);
		$sql1="INSERT INTO task_assignee VALUES ('$ctid','$auserid')";
		$query1=$this->db->query($sql1);
		$sql2="INSERT INTO assignee_task_list VALUES ('$ctid','$userid','$auserid','$ctid','$taskname','$taskdescription','$createdate','$deadline','$pic_file','1','','','','','')";
		$query2=$this->db->query($sql2);
		$sql3="INSERT INTO events VALUES ('','$taskname','$taskdescription','#000000','$calen','$auserid','1','0','0','0','0','0','0')";
		$query3=$this->db->query($sql3);
		//return $query;
		//}
	}
	public function completed_task_list_all()
	{
		$query="SELECT * FROM assignee_task_list_view 
		JOIN user ON user.userid=assignee_task_list_view.assignerid
		JOIN task_assignee_completed_view ON task_assignee_completed_view.createtaskid=assignee_task_list_view.createtaskid AND
		task_assignee_completed_view.auserid=assignee_task_list_view.assigneeid
		WHERE assigneestatus=0 ORDER BY assigneetlid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	
	public function completed_task_list($userid)
	{
		$query="SELECT * FROM assignee_task_list_view 
		JOIN user ON user.userid=assignee_task_list_view.assignerid
		JOIN task_assignee_completed_view ON task_assignee_completed_view.createtaskid=assignee_task_list_view.createtaskid AND
		task_assignee_completed_view.auserid=assignee_task_list_view.assigneeid
		WHERE 	assignerid='$userid' AND assigneestatus=0 ORDER BY assigneetlid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function completed_task_list_user($userid)
	{
		$query="SELECT * FROM assignee_task_list_view 
		JOIN user ON user.userid=assignee_task_list_view.assignerid
		JOIN task_assignee_completed_view ON task_assignee_completed_view.createtaskid=assignee_task_list_view.createtaskid
		 WHERE assigneeid='$userid' AND assigneestatus='0' ORDER BY assigneetlid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function task_details_update($createtaskid)
	{
		
		$sql="UPDATE createtask SET createtaskstatus='0' WHERE createtaskid='$createtaskid'";
		$query=$this->db->query($sql);
	}
	public function taskassignee_select($factoryid,$divisionid,$departmentid,$sectionid,$subsectionid)
	{
		$query="SELECT userid,ename FROM user WHERE factoryid='$factoryid' AND divisionid='$divisionid' AND departmentid='$departmentid' AND sectionid='$sectionid' AND ustatus!='2'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function assignee_task_list_update($assigneetlid)
	{
		
		$sql="UPDATE assignee_task_list SET assigneestatus='2',assignee_submitted_date=CURDATE() WHERE assigneetlid='$assigneetlid'";
		$query=$this->db->query($sql);
	}
	public function task_completed_insert($assigneetlid,$rating,$comments,$completeddate)
	{
		
		//$completeddate = date("Y-m-d", strtotime($completeddate));
//		$sql="UPDATE assignee_task_list SET assigneestatus='0',assigner_close_date='$completeddate',ratings='$rating',comments='$comments' WHERE assigneetlid='$assigneetlid'";
//		$query=$this->db->query($sql);


		$completeddate = date("Y-m-d", strtotime($completeddate));
		$sql1="SELECT createtaskid FROM assignee_task_list WHERE assigneetlid='$assigneetlid'";
		$result1=$this->db->query($sql1);
		$re1=$result1->result_array();
		foreach($re1 as $row1)
		{
			$createtaskid=$row1['createtaskid'];
		}
		
		$sql2="SELECT gstatus FROM createtask WHERE createtaskid='$createtaskid'";
		$result2=$this->db->query($sql2);
		$re2=$result2->result_array();
		foreach($re2 as $row2)
		{
			$gstatus=$row2['gstatus'];
		}
		if($gstatus=='2')
		{
			$sql3="UPDATE createtask SET createtaskstatus='0' WHERE createtaskid='$createtaskid' AND gstatus='2'";
			$query3=$this->db->query($sql3);
		}
		
		$sql="UPDATE assignee_task_list SET assigneestatus='0',assigner_close_date='$completeddate',ratings='$rating',comments='$comments' WHERE assigneetlid='$assigneetlid'";
		$query=$this->db->query($sql);
	}
	
	public function task_details($createtaskid)
	{
		$query="SELECT * FROM createtask
		JOIN user ON user.userid=createtask.userid
		
		JOIN task_assignee_view ON task_assignee_view.createtaskid=createtask.createtaskid
		WHERE createtask.createtaskid='$createtaskid'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function task_details_individual($userid,$createtaskid)
	{
		$query="SELECT * FROM task_assignee_view
		WHERE userid='$userid' AND createtaskid='$createtaskid'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function assignee_task_list($userid,$createtaskid)
	{
		$query="SELECT * FROM assignee_task_list 
		JOIN task_assignee_view
		ON assignee_task_list.createtaskid=task_assignee_view.createtaskid AND
		assignee_task_list.assigneeid=task_assignee_view.userid
		WHERE task_assignee_view.userid='$userid' AND task_assignee_view.createtaskid='$createtaskid' AND (assignee_task_list.assigneestatus='1' OR 		assignee_task_list.assigneestatus='2') 
		ORDER BY assigneetlid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
//public function assignee_task_list($userid,$createtaskid)
//	{
//		$query="SELECT * FROM assignee_task_list 
//		
//		WHERE assigneeid='$userid' AND createtaskid='$createtaskid' AND assigneestatus='1' OR assigneestatus='2' 
//		 ORDER BY assigneetlid DESC";
//		$result=$this->db->query($query);
//		return $result->result_array();
//		
//	}
	public function assignee_task_list1($userid)
	{
		$query="SELECT * FROM assignee_task_list JOIN task_assignee_view

ON assignee_task_list.assigneeid=task_assignee_view.userid
AND assignee_task_list.createtaskid=task_assignee_view.createtaskid
		WHERE assignee_task_list.assigneeid='$userid' AND (assignee_task_list.assigneestatus='1' OR assignee_task_list.assigneestatus='2') ORDER BY assigneetlid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function assignee_task_list_show_up($userid)
	{
		
		$sql="UPDATE assignee_task_list SET tasksstatus='1' WHERE assigneeid='$userid'";
		$query=$this->db->query($sql);
	}
	public function assignee_task_listadmin()
	{
		$query="SELECT * FROM assignee_task_list JOIN task_assignee_view

ON assignee_task_list.assigneeid=task_assignee_view.userid
AND assignee_task_list.createtaskid=task_assignee_view.createtaskid
		WHERE assignee_task_list.assigneestatus='1' OR assignee_task_list.assigneestatus='2' ORDER BY assigneetlid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function user_allontask($userid)
	{
		$query="SELECT * FROM assignee_task_list WHERE assigneeid='$userid' AND assigneestatus IN('1','2') ORDER BY assigneetlid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function task_details_individual_insert($assignerid,$assigneeid,$createtaskid,$taskname,$taskdescription,$createdate,$deadline,$pic_file)
	{
		$createdate = date("Y-m-d", strtotime($createdate));
		$deadline = date("Y-m-d", strtotime($deadline));
		$d=date('Y-m-d');
		$t= date("h:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$astaid=$d.$t;
		$sql="INSERT INTO assignee_task_list VALUES ('$astaid','$assignerid','$assigneeid','$createtaskid','$taskname','$taskdescription','$createdate','$deadline','$pic_file','1','','','','')";
		$query=$this->db->query($sql);
		return true;
			
	}
	public function task_comments_insert($assignerid,$createtaskid,$assigneeid,$assigneetlid,$taskcomments,$commentsuserid)
	{
		
		$d=date('Y-m-d');
		$t= date("h:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$tcid=$d.$t;
		$sql="INSERT INTO task_comments VALUES ('$tcid','$assignerid','$createtaskid','$assigneeid','$assigneetlid','$taskcomments','$commentsuserid',CURDATE(),CURTIME())";
		$query=$this->db->query($sql);
		return true;
			
	}
	public function task_comments_list($assignerid,$createtaskid,$assigneeid,$assigneetlid)
	{
		$query="SELECT * FROM task_comments WHERE assignerid='$assignerid' AND createtaskid='$createtaskid' AND userid='$assigneeid' AND assigneetlid='$assigneetlid'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function user_task_list_all()
	{
		
		$query="SELECT userid,ename,SUM(ratings) as ratings,
		SUM(CASE WHEN assigneestatus = 1 THEN 1 ELSE 0 END) as ongoing,
		SUM(CASE WHEN assigneestatus = 2 THEN 1 ELSE 0 END) as submitted,
		SUM(CASE WHEN assigneestatus = 0 THEN 1 ELSE 0 END) as completed 
		FROM assignee_task_list
		JOIN user ON
		user.userid=assignee_task_list.assigneeid 
		GROUP BY assigneeid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function user_task_list($userid)
	{
		
		$query="SELECT userid,ename,SUM(ratings) as ratings,
		SUM(CASE WHEN assigneestatus = 1 THEN 1 ELSE 0 END) as ongoing,
		SUM(CASE WHEN assigneestatus = 2 THEN 1 ELSE 0 END) as submitted,
		SUM(CASE WHEN assigneestatus = 0 THEN 1 ELSE 0 END) as completed 
		FROM assignee_task_list
		JOIN user ON
		user.userid=assignee_task_list.assigneeid
		WHERE assignerid='$userid' 
		GROUP BY assigneeid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function user_task_complete_list($userid)
	{
		//$query="SELECT COUNT(assigneeid) AS totaltask,SUM(ratings) AS ratings FROM assignee_task_list WHERE assigneeid='$userid'";
		$query="SELECT  userid,ename,
		SUM(ratings) AS ratings,
		(SELECT COUNT(assigneeid) FROM assignee_task_list WHERE assigneestatus='1' AND assigneeid='$userid') AS ongoing,
		(SELECT COUNT(assigneeid) FROM assignee_task_list WHERE assigneestatus='2' AND assigneeid='$userid' AND assignee_submitted_date <= deadline) AS wsubmitted,
		(SELECT COUNT(assigneeid) FROM assignee_task_list WHERE assigneestatus='2' AND assigneeid='$userid' AND assignee_submitted_date > deadline) AS osubmitted,
		(SELECT COUNT(assigneeid) FROM assignee_task_list WHERE assigneestatus='0' AND assigneeid='$userid') AS completed 
		FROM assignee_task_list 
		JOIN user ON user.userid=assignee_task_list.assigneeid
		WHERE assigneeid='$userid' GROUP BY assigneeid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_total_task_complete_list($pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT userid,ename,SUM(ratings) as ratings,
		SUM(CASE WHEN assigneestatus = 1 THEN 1 ELSE 0 END) as ongoing,
		SUM(CASE WHEN assigneestatus = 2 THEN 1 ELSE 0 END) as submitted,
		SUM(CASE WHEN assigneestatus = 0 THEN 1 ELSE 0 END) as completed 
		FROM assignee_task_list
		JOIN user ON
		user.userid=assignee_task_list.assigneeid
		WHERE assigner_close_date BETWEEN '$pd' AND '$wd' 
		GROUP BY assigneeid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function tasksstatus($userid)
	{
		$query="SELECT COUNT(tasksstatus) AS tasksstatus FROM assignee_task_list
		
		WHERE tasksstatus='0' AND assigneeid='$userid'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	
								///////////////////////////////////////////LICENSE/////////////////////////////////////
	
	public function licensename_insert($licensename,$licensetypeid,$pic_file)
	{
		$sql="INSERT INTO licensename VALUES ('','$licensename','$licensetypeid','$pic_file')";
		$query=$this->db->query($sql);
		return true;
	}
	public function licensename_list()
	{
		$query="SELECT * FROM licensename
		JOIN licensetype ON licensetype.licensetypeid=licensename.licensetype_id ORDER BY license_name";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function license_insert($factoryid,$divisionid,$departmentid,$licensetypeid,$licensename,$reauthority,$issuedate,$renewaldate,$processtime,$regulatoryfee,$misexp,$pic_file,$pic_file1,$adate,$status)
	{
		$issuedate = date("Y-m-d", strtotime($issuedate));
		$issuedate=$issuedate;
		$renewaldate = date("Y-m-d", strtotime($renewaldate));
		$renewaldate=$renewaldate;
		$adate = date("Y-m-d", strtotime($adate));
		$adate=$adate;
		$sql="INSERT INTO license VALUES ('','$factoryid','$licensename','$reauthority','$divisionid','$departmentid','$licensetypeid','$issuedate','$renewaldate','$processtime','$regulatoryfee','$misexp','$pic_file','$pic_file1','$adate','$status')";
				$query=$this->db->query($sql);
				return true;
	}
	public function license_list()
	{
		$query="SELECT * FROM license
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid 
		ORDER BY license.licensetypeid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factorywise_license_list($factoryid)
	{
		$query="SELECT * FROM license
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE license.factoryid='$factoryid' ORDER BY license.licensetypeid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function license_list_up($licenseid)
	{
		$sql1="SELECT * FROM license
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid 
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE licenseid='$licenseid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function licenselup($licenseid,$factoryid,$reauthority,$issuedate,$renewaldate,$processtime,$regulatoryfee,$misexp,$adate,$status)
	{
		$issuedate = date("Y-m-d", strtotime($issuedate));
		$issuedate=$issuedate;
		$renewaldate = date("Y-m-d", strtotime($renewaldate));
		$renewaldate=$renewaldate;
		$adate = date("Y-m-d", strtotime($adate));
		$adate=$adate;
		if($status==1)
		{
			$sql="UPDATE license SET factoryid='$factoryid',reauthority='$reauthority',issuedate='$issuedate',renewaldate='$renewaldate',processingtime='$processtime',regulatoryfee='$regulatoryfee',misexp='$misexp',licensefile1='',adate='$adate',status='$status' WHERE licenseid='$licenseid'";
			$query=$this->db->query($sql);
		}
		else
		{
			$sql="UPDATE license SET factoryid='$factoryid',reauthority='$reauthority',issuedate='$issuedate',renewaldate='$renewaldate',processingtime='$processtime',regulatoryfee='$regulatoryfee',misexp='$misexp',adate='$adate',status='$status' WHERE licenseid='$licenseid'";
			$query=$this->db->query($sql);
		}
	}
	public function licensefilelup($licenseid,$pic_file)
	{
		
		$sql="UPDATE license SET licensefile='$pic_file' WHERE licenseid='$licenseid'";
		return $query=$this->db->query($sql);
	}
	public function licenseafilelup($licenseid,$pic_file1)
	{
		$sql="UPDATE license SET licensefile1='$pic_file1' WHERE licenseid='$licenseid'";
		return $query=$this->db->query($sql);
	}
	public function licensetype_insert($licensetype)
	{
		$sql="SELECT * FROM licensetype WHERE licensetype='$licensetype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO licensetype VALUES ('','$licensetype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function licensetype_list()
	{
		$query="SELECT * FROM licensetype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
								///////////////////////////////////////////CERTIFICATE/////////////////////////////////////
								
	public function icertificatetype_insert($ictype)
	{
		$sql="SELECT * FROM icertificatetype WHERE ictype='$ictype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO icertificatetype VALUES ('','$ictype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function icertificatetype_list()
	{
		$query="SELECT * FROM icertificatetype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function icertificatename_insert($icname,$ictypeid)
	{
		$sql="INSERT INTO icertificatename_insert VALUES ('','$icname','$ictypeid')";
		$query=$this->db->query($sql);
		return true;
	}
	public function icertificatename_list()
	{
		$query="SELECT * FROM icertificatename_insert
		JOIN icertificatetype ON icertificatetype.ictid=icertificatename_insert.ictypeid ORDER BY icname";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function icertificate_insert($userid,$icname,$reauthority,$issuedate,$renewaldate,$processtime,$regulatoryfee,$misexp,$pic_file)
	{
		$issuedate = date("Y-m-d", strtotime($issuedate));
		$issuedate=$issuedate;
		$renewaldate = date("Y-m-d", strtotime($renewaldate));
		$renewaldate=$renewaldate;
		$sql="INSERT INTO icertificate VALUES ('','$userid','$icname','$reauthority','$issuedate','$renewaldate','$processtime','$regulatoryfee','$misexp','$pic_file')";
		$query=$this->db->query($sql);
		return true;
	}
	public function icertificate_list()
	{
		$query="SELECT * FROM icertificate
		JOIN user ON user.userid=icertificate.userid
		JOIN icertificatename_insert ON icertificatename_insert.iciid=icertificate.icnameid
		JOIN icertificatetype ON icertificatetype.ictid=icertificatename_insert.ictypeid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factorywise_icertificate_list($factoryid)
	{
		$query="SELECT * FROM icertificate
		JOIN user ON user.userid=icertificate.userid
		JOIN icertificatename_insert ON icertificatename_insert.iciid=icertificate.icnameid
		JOIN icertificatetype ON icertificatetype.ictid=icertificatename_insert.ictypeid
		WHERE factoryid='$factoryid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function icertificate_list_up($icinsid)
	{
		$sql1="SELECT * FROM icertificate
		JOIN user ON user.userid=icertificate.userid
		JOIN icertificatename_insert ON icertificatename_insert.iciid=icertificate.icnameid
		JOIN icertificatetype ON icertificatetype.ictid=icertificatename_insert.ictypeid
		WHERE icinsid='$icinsid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function icertificatelup($icinsid,$reauthority,$issuedate,$renewaldate,$processtime,$regulatoryfee,$misexp)
	{
		$issuedate = date("Y-m-d", strtotime($issuedate));
		$issuedate=$issuedate;
		$renewaldate = date("Y-m-d", strtotime($renewaldate));
		$renewaldate=$renewaldate;
		$sql="UPDATE icertificate SET reauthority='$reauthority',issuedate='$issuedate',renewaldate='$renewaldate',processtime='$processtime',regulatoryfee='$regulatoryfee',misexp='$misexp' WHERE icinsid='$icinsid'";
		$query=$this->db->query($sql);
	}
	public function icertificatefilelup($icinsid,$pic_file)
	{
		$sql="UPDATE icertificate SET icfile='$pic_file' WHERE icinsid='$icinsid'";
		return $query=$this->db->query($sql);
	}
	
								///////////////////////////////////////////NOTICE ALBUM/////////////////////////////////////
	
	public function notice_category_insert($nc)
	{
		$sql="INSERT INTO notice_category VALUES ('','$nc')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function notice_category_list()
	{
		$query="SELECT * FROM notice_category";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function notice_insert($pic_file,$unit,$nc,$noticename)
	{
		$sql="INSERT INTO notice_album VALUES ('','$unit','$nc','$noticename','$pic_file',CURDATE())";
		$query=$this->db->query($sql);
		return $query;
	}
	public function notice_list()
	{
		$query="SELECT * FROM notice_album 
		LEFT JOIN notice_category ON notice_category.ncid=notice_album.ncid
		ORDER BY ndate DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function notice_list_up($nid)
	{
		$query="SELECT * FROM notice_album 
		LEFT JOIN notice_category ON notice_category.ncid=notice_album.ncid
		WHERE nid='$nid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function noticelup($nid,$factoryid,$ncid,$name)
	{
		$sql="UPDATE notice_album SET factoryid='$factoryid',ncid='$ncid',name='$name' WHERE nid='$nid'";
		return $query=$this->db->query($sql);
	}
	
								///////////////////////////////////////////POLICY ALBUM/////////////////////////////////////
								
	public function policy_type_insert($policytype)
	{
		$sql="INSERT INTO policytype VALUES ('','$policytype')";
		$query=$this->db->query($sql);
		return $query;
	}
	
	public function policy_type_list()
	{
		
		$query="SELECT * FROM policytype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function policy_class_insert($policyclass)
	{
		$sql="INSERT INTO policyclass VALUES ('','$policyclass')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function policy_class_list()
	{
		
		$query="SELECT * FROM policyclass";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function policy_insert($pic_file,$unit,$policyname,$ptid,$pcid)
	{
		
		$sql="INSERT INTO policy_album VALUES ('','$unit','$ptid','$pcid','$policyname','$pic_file',CURDATE())";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function policy_list()
	{
		$query="SELECT * FROM policy_album 
		LEFT JOIN policytype ON policytype.ptid=policy_album.ptid
		LEFT JOIN policyclass ON policyclass.pcid=policy_album.pcid
		ORDER BY pdate DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function eventalbum_insert($data)
	{
		
		$sql="INSERT INTO eventalbum_insert VALUES ('','$data[eventname]','$data[pic_file]','$data[edate]')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	//public function event_list()
//	{
//		$query="SELECT DISTINCT(eventname) AS eventname FROM eventalbum_insert ORDER BY edate DESC";
//		$result=$this->db->query($query);
//		return $result->result_array();
//		
//	}
	public function event_list()
	{
		$query="SELECT * FROM eventalbum_insert GROUP BY eventname,edate ORDER BY  STR_TO_DATE(edate,'%d-%m-%Y') DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function event_list_show($eventname)
	{
		$query="SELECT * FROM eventalbum_insert WHERE eventname='$eventname' ORDER BY eaid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function trainingtype_insert($trainingtype)
	{
		$sql="SELECT * FROM trainingtype WHERE trainingtype='$trainingtype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO trainingtype VALUES ('','$trainingtype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function trainingtype_list()
	{
		$query="SELECT * FROM trainingtype";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function trainingcategory_insert($trainingcategory)
	{
		$sql="SELECT * FROM trainingcategory WHERE trainingcategory='$trainingcategory'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO trainingcategory VALUES ('','$trainingcategory')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function trainingcategory_list()
	{
		$query="SELECT * FROM trainingcategory";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function training_material_insert($data)
	{
		$sql="INSERT INTO trainingmaterial_insert VALUES ('','$data[trainingtypeid]','$data[trainingname]','$data[trainingcategoryid]','$data[pic_file]','$data[tdate]')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function trainingmaterial_list()
	{
		$query="SELECT * FROM trainingmaterial_insert GROUP BY trainingname,tdate ORDER BY trainingmaterialid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function trainingmaterial_list_show($trainingid)
	{
		$query="SELECT * FROM trainingmaterial_insert WHERE trainingmaterialid='$trainingid' ORDER BY tdate DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function tasktype_insert($tasktype)
	{
		$sql="SELECT * FROM tasktype WHERE tasktype='$tasktype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO tasktype VALUES ('','$tasktype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function tasktype_list()
	{
		$query="SELECT * FROM tasktype";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function trainingscope_insert($trainingscope)
	{
		$sql="SELECT * FROM trainingscope WHERE trainingscope='$trainingscope'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO trainingscope VALUES ('','$trainingscope')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function trainingscope_list()
	{
		$query="SELECT * FROM trainingscope";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function traininggroup_insert($traininggroup)
	{
		$sql="SELECT * FROM traininggroup WHERE traininggroup='$traininggroup'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO traininggroup VALUES ('','$traininggroup')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function traininggroup_list()
	{
		$query="SELECT * FROM traininggroup";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	//public function trainingtopic_insert($trainingscope,$trainingtopic,$traininggroup)
//	{
//		$sql="SELECT * FROM trainingtopic WHERE topicname='$trainingtopic'";
//		$query=$this->db->query($sql);
//		if($query->num_rows()==1)
//		{
//			return false;
//		}
//		else
//		{
//		$sql="INSERT INTO trainingtopic VALUES ('','$trainingscope','$trainingtopic','$traininggroup')";
//		$query=$this->db->query($sql);
//		return $query;
//		}
//	}

	public function trainingtopic_insert($data)
	{
		
		$sql="INSERT INTO trainingtopic VALUES ('','$data[factoryid]','$data[tpid]','$data[trainingtypeid]','$data[trscid]','$data[tragrpid]','$data[userid]','$data[tuserid]','$data[cdate]')";
		$query=$this->db->query($sql);
		return $query;
    }
	public function trainingtopic_list()
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=trainingtopic.userid) AS trainee,
		(SELECT ename FROM user WHERE user.userid=trainingtopic.tuserid) AS trainer,trainingtype,trainingscope,trainingtp,traininggroup,trainingscope,user.factoryid,user.userid,tuserid,ttid,tcdate
		 FROM trainingtopic
		  JOIN trainingtype ON trainingtype.trainingtypeid=trainingtopic.trainingtypeid
		 JOIN trainingscope ON trainingscope.trscid=trainingtopic.trscid
	 JOIN traininggroup ON traininggroup.tragrpid=trainingtopic.tragrpid
		 JOIN trainingtp ON trainingtp.tpid=trainingtopic.tpid
		 JOIN user ON user.userid=trainingtopic.userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function trainingtp_insert($trainingtp)
	{
		$sql="SELECT * FROM trainingtp WHERE trainingtp='$trainingtp'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO trainingtp VALUES ('','$trainingtp')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function trainingtp_list()
	{
		$query="SELECT * FROM trainingtp";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function resourcep_insert($userid,$tpid)
	{
		$sql="SELECT * FROM training_resourceperson WHERE userid='$userid' AND tpid='$tpid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO training_resourceperson VALUES ('','$userid','$tpid')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function resourcep_list()
	{
		$query="SELECT training_resourceperson.userid,image,ename,factoryid,trpid,GROUP_CONCAT(trainingtp SEPARATOR '<br/>') AS trainingtp  FROM training_resourceperson
		JOIN user ON user.userid=training_resourceperson.userid
		JOIN trainingtp ON trainingtp.tpid=training_resourceperson.tpid
		GROUP BY training_resourceperson.userid
		ORDER BY training_resourceperson.userid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function trainingcreate_insert($factoryid,$rp,$tp,$trainingtype,$pn,$tdate)
	{
		$tdate = date("Y-m-d", strtotime($tdate));
		$sql="INSERT INTO trainingcreate_insert VALUES ('','$factoryid','$rp','$tp','$trainingtype','$pn','$tdate')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function show_resourcepersonname($tp)
	{
		$query="SELECT training_resourceperson.userid,ename,trpid FROM training_resourceperson
		JOIN user ON user.userid=training_resourceperson.userid
		WHERE training_resourceperson.tpid='$tp'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function trainingcreate_list()
	{
		$query="SELECT image,ename,trainingcreate_insert.factoryid,user.userid,pn,trainingtp,tdate,tcid FROM trainingcreate_insert
		JOIN user ON user.userid=trainingcreate_insert.rp
		JOIN trainingtp ON trainingtp.tpid=trainingcreate_insert.tp
		ORDER BY STR_TO_DATE(tdate,'%Y-%m-%d') DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function trainingcreate_list_file_insert($tcid,$pic_file)
	{
		$sql="INSERT INTO trainingcreate_list_file_insert VALUES ('','$tcid','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function trainingcreate_list_details1($tcid)
	{
		$query="SELECT image,ename,trainingcreate_insert.factoryid,user.userid,pn,trainingtp,tdate,tcid FROM trainingcreate_insert
		JOIN user ON user.userid=trainingcreate_insert.rp
		JOIN trainingtp ON trainingtp.tpid=trainingcreate_insert.tp
		WHERE trainingcreate_insert.tcid='$tcid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function trainingcreate_list_details2($tcid)
	{
		$query="SELECT tfiles FROM trainingcreate_insert
		JOIN trainingcreate_list_file_insert ON trainingcreate_list_file_insert.tcid=trainingcreate_insert.tcid
		
		WHERE trainingcreate_insert.tcid='$tcid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
		
															/***************SWOT************/
		
	public function strength_insert($data)
	{
		$data['sdate'] = date("Y-m-d", strtotime($data['sdate']));
		$sql="INSERT INTO swot_insert VALUES ('','$data[factoryid]','$data[userid]','strength','$data[sdate]','$data[sbyid]','$data[sdetails]','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function weakness_insert($data)
	{
		$data['wdate'] = date("Y-m-d", strtotime($data['wdate']));
		$sql="INSERT INTO swot_insert VALUES ('','$data[factoryid]','$data[userid]','weakness','$data[wdate]','$data[wbyid]','$data[wdetails]','1')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function opportunity_insert($data)
	{
		$data['odate'] = date("Y-m-d", strtotime($data['odate']));
		$sql="INSERT INTO swot_insert VALUES ('','$data[factoryid]','$data[userid]','opportunity','$data[odate]','$data[obyid]','$data[odetails]','1')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function threat_insert($data)
	{
		$data['tdate'] = date("Y-m-d", strtotime($data['tdate']));
		$sql="INSERT INTO swot_insert VALUES ('','$data[factoryid]','$data[userid]','threat','$data[tdate]','$data[tbyid]','$data[tdetails]','1')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function swot_pending_list()
	{
		$query="SELECT * FROM swot_insert WHERE sstatus='1'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function swot_list_up($sid)
	{
		$sql="UPDATE swot_insert SET sstatus='0' WHERE sid='$sid'";
		$query=$this->db->query($sql);
	}
	public function swot_delete($sid)
	{
		$sql="DELETE FROM  swot_insert WHERE sid='$sid'";
		$query=$this->db->query($sql);
	}
	public function user_swot_list($userid)
	{
		$query="SELECT * FROM swot_insert WHERE userid='$userid' ORDER BY sdate";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function eobservation_insert($data)
	{
		$data['odate'] = date("Y-m-d", strtotime($data['odate']));
		$sql="INSERT INTO eobservation_insert VALUES ('','$data[factoryid]','$data[userid]','$data[odate]','$data[obyid]','$data[odetails]','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function eobservation_pending_list()
	{
		$query="SELECT * FROM eobservation_insert WHERE ostatus='1'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function eobservation_list_up($oid)
	{
		$sql="UPDATE eobservation_insert SET ostatus='0' WHERE oid='$oid'";
		$query=$this->db->query($sql);
	}
	public function eobservation_delete($oid)
	{
		$sql="DELETE FROM  eobservation_insert WHERE oid='$oid'";
		$query=$this->db->query($sql);
	}
	public function euser_observation_list($userid)
	{
		$query="SELECT * FROM eobservation_insert WHERE userid='$userid' ORDER BY odate";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function insertRecord($data)
	{
		
		$sql="INSERT INTO user1 VALUES ('$data[factoryid]','$data[divisionid]','$data[departmentid]','$data[sectionid]','$data[subsectionid]','$data[location]','$data[ename]','$data[bname]','$data[parentdesignationid]','$data[childdesignationid]','$data[religion]','$data[maritual]','$data[dobdate]','$data[dojdate]','$data[hdistrict]','$data[epermanentaddress]','$data[bpermanentaddress]','$data[epresentaddress]','$data[bpresentaddress]','$data[nid]','$data[tin]','$data[bloodgroup]','$data[gender]','$data[salary]','$data[efficiency]','$data[imark]','$data[oemail]','$data[pemail]','$data[pmobile]','$data[emobile]','$data[usertypeid]','$data[servicetypeid]','$data[wtid]','$data[puserid]','$data[userid]','$data[ruserid]','$data[password]','$data[pperiod]','$data[pperiod_status]','$data[commitment]','$data[image]','$data[ustatus]','$data[indate]')";
		$query=$this->db->query($sql);
		return $query;
    }
	public function challan_create($sfactoryid,$manualid,$challantypeid,$userid,$buyerid,$rfactoryid,$producttypeid,$item,$sqty,$unit,$value)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d1=str_replace("-","",$d);
		$t1=str_replace(":","",$t);
		$ccid=$d1.$t1;
		$sql="INSERT INTO challan_insert VALUES ('$ccid','$manualid','$challantypeid','$userid','$sfactoryid','$buyerid','$rfactoryid','$producttypeid','$item','$sqty','$unit','$value','$d','$t','','','','1','0')";
		$query=$this->db->query($sql);
		//if($challantypeid==2 || $challantypeid==3)
//		{
//			$sql1="INSERT INTO challan_return_insert VALUES ('$ccid','$ccid','$manualid','$challantypeid','$userid','$sfactoryid','$sfactoryid','$buyerid','$rfactoryid','$producttypeid','$item','$sqty','$sqty','$sqty','$unit','$d','$t',CURDATE(),CURTIME())";
//			$query1=$this->db->query($sql1);
//		}
		return $query;
		
	}
	public function challanm_create($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d1=str_replace("-","",$d);
		$t1=str_replace(":","",$t);
		$ccid=$d1.$t1;
		
		$d2=date('Y-m-d');
		$t2= date("H:i:s");
		$d21=str_replace("-","",$d2);
		$t21=str_replace(":","",$t2);
		$ccid1=$d21.$t21;
		$ccid1=$ccid1.$data['i'];
		$sql="INSERT INTO challanm1_insert VALUES ('$ccid','$data[sfactoryid]','$data[manualid]','$data[userid]','$data[buyerid]','$data[rfactoryid]','','','$d','$t','','','','','','','1')";
		$query=$this->db->query($sql);
		
		$sql1="INSERT INTO challanm2_insert VALUES ('$ccid1','$ccid','$data[challantypeid]','$data[producttypeid]','$data[item_name]','$data[sqty]','$data[item_unit]','','$data[description]','$data[remarks]')";
		$query1=$this->db->query($sql1);
		
		$sql2="INSERT INTO challanm_back_insert VALUES ('','$data[chmid2]','$ccid1','$data[manualid]','$data[sqty]','',CURDATE(),CURTIME(),'','')";
		$query2=$this->db->query($sql2);
		
		$sql3="DELETE FROM challanm_back_insert WHERE chmid_2=''";
		return $query3=$this->db->query($sql3);
		
		
		
		
		//return $query1;
		
	}
	public function challanm_list()
	{
		$query="SELECT * FROM challanm1_insert 
		LEFT JOIN buyer ON challanm1_insert.buyerid=buyer.bid
		ORDER BY chmid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_challanm_list($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM challanm1_insert 
				LEFT JOIN buyer ON challanm1_insert.buyerid=buyer.bid
				WHERE (sfactoryid='$factoryid' OR rfactoryid='$factoryid') AND (sdate BETWEEN '$pd' AND '$wd') ORDER BY chmid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_allunit_challanm_list($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM challanm1_insert 
				LEFT JOIN buyer ON challanm1_insert.buyerid=buyer.bid
				WHERE sfactoryid='$factoryid' AND (sdate BETWEEN '$pd' AND '$wd') ORDER BY chmid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_pending_list($factoryid)
	{
		$query="SELECT chmid,manualid,sfactoryid,rfactoryid,buyername,sdate,stime,rdate,rtime,status,SUM(sqty) AS sqty FROM challanm1_insert 
JOIN challanm2_insert ON challanm2_insert.chmid1=challanm1_insert.chmid
		LEFT JOIN productunit ON productunit.productunitid=challanm2_insert.item_unit
		LEFT JOIN producttype ON producttype.producttypeid=challanm2_insert.producttypeid
		LEFT JOIN challantype ON challantype.challantypeid=challanm2_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challanm1_insert.buyerid
		WHERE (sfactoryid='$factoryid' OR rfactoryid='$factoryid') AND (status='1' OR status='2') GROUP BY chmid ORDER BY chmid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_stpending_list($factoryid)
	{
		$query="SELECT chmid,manualid,sfactoryid,rfactoryid,buyername,sdate,stime,rdate,rtime,status,SUM(sqty) AS sqty FROM challanm1_insert 
JOIN challanm2_insert ON challanm2_insert.chmid1=challanm1_insert.chmid
		LEFT JOIN productunit ON productunit.productunitid=challanm2_insert.item_unit
		LEFT JOIN producttype ON producttype.producttypeid=challanm2_insert.producttypeid
		LEFT JOIN challantype ON challantype.challantypeid=challanm2_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challanm1_insert.buyerid
		WHERE (sfactoryid='$factoryid' OR rfactoryid='$factoryid') AND (status='1' OR status='2' OR status='3') GROUP BY chmid ORDER BY chmid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_receive_form($chmid)
	{
		$query="SELECT chmid,chmid2,manualid,sfactoryid,rfactoryid,buyername,sdate,stime,rdate,rtime,status,sqty,rqty,item_name,challanm2_insert.challantypeid,challantype,producttype,productunitname,description,remarks,pid,pname FROM challanm1_insert 
JOIN challanm2_insert ON challanm2_insert.chmid1=challanm1_insert.chmid
		LEFT JOIN product ON product.pid=challanm2_insert.item_name
		LEFT JOIN productunit ON productunit.productunitid=challanm2_insert.item_unit
		LEFT JOIN producttype ON producttype.producttypeid=challanm2_insert.producttypeid
		LEFT JOIN challantype ON challantype.challantypeid=challanm2_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challanm1_insert.buyerid
		WHERE chmid1='$chmid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_sapproved_form($chmid)
	{
		$query="SELECT chmid,chmid2,manualid,sfactoryid,rfactoryid,buyername,dname,vnumber,sdate,stime,rdate,rtime,status,sqty,item_name,challanm2_insert.challantypeid,challantype,producttype,productunitname,description,remarks,pid,pname FROM challanm1_insert 
JOIN challanm2_insert ON challanm2_insert.chmid1=challanm1_insert.chmid
		LEFT JOIN product ON product.pid=challanm2_insert.item_name
		LEFT JOIN productunit ON productunit.productunitid=challanm2_insert.item_unit
		LEFT JOIN producttype ON producttype.producttypeid=challanm2_insert.producttypeid
		LEFT JOIN challantype ON challantype.challantypeid=challanm2_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challanm1_insert.buyerid
		WHERE chmid1='$chmid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_sapproved($chmid,$dname,$vnumber)
	{
			date_default_timezone_set('Asia/Dhaka');
			$sql="UPDATE challanm1_insert SET dname='$dname',vnumber='$vnumber', seadate=CURDATE(),seatime=CURTIME(),status='2' WHERE chmid='$chmid'";
			return $query=$this->db->query($sql);
	}
	public function factory_challanm_stapproved($chmid)
	{
			date_default_timezone_set('Asia/Dhaka');
			$sql="UPDATE challanm1_insert SET stadate=CURDATE(),statime=CURTIME(),status='4' WHERE chmid='$chmid'";
			return $query=$this->db->query($sql);
	}
	public function challanm_receive($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$ccid1=$d.$t;
		//if($sqty!=$rqty)
//		{
//			$rstatus=1;
			//$sql="INSERT INTO challanr_insert VALUES ('$ccid','$ccid1','$rqty',CURDATE(),CURTIME())";
//			$query=$this->db->query($sql);
			$sql1="UPDATE challanm1_insert SET rdate=CURDATE(),rtime=CURTIME(),status='3' WHERE chmid='$data[chmid]'";
			$this->db->query($sql1);
			//return $query1=$this->db->query($sql1);
		//}
//		else
//		{
//			$rstatus=0;
			$sql2="UPDATE challanm2_insert SET rqty='$data[rqty]' WHERE chmid2='$data[chmid2]'";
			$query2=$this->db->query($sql2);
			
			$sql3="UPDATE challanm_back_insert SET bkrqty='$data[rqty]',bkrdate=CURDATE(),bkrtime=CURTIME() WHERE chmid_22='$data[chmid2]'";
			return $query3=$this->db->query($sql3);
		//}
		
	}
	public function challanm_details($chmid)
	{
		$query="SELECT chmid,chmid2,manualid,sfactoryid,rfactoryid,dname,vnumber,buyername,sdate,stime,rdate,rtime,status,sqty,rqty,item_name,challanm2_insert.challantypeid,challantype,producttype,productunitname,description,remarks,pid,pname FROM challanm1_insert 
		JOIN challanm2_insert ON challanm2_insert.chmid1=challanm1_insert.chmid
		LEFT JOIN product ON product.pid=challanm2_insert.item_name
		LEFT JOIN productunit ON productunit.productunitid=challanm2_insert.item_unit
		LEFT JOIN producttype ON producttype.producttypeid=challanm2_insert.producttypeid
		LEFT JOIN challantype ON challantype.challantypeid=challanm2_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challanm1_insert.buyerid
		WHERE chmid1='$chmid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function challanm_back_create($sfactoryid,$manualid,$userid,$chmid2,$rsqty)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$ccid1=$d.$t;
		//$query1="SELECT * FROM challan_insert WHERE ccid='$ccid'";
//			$result1=$this->db->query($query1);
//			$re=$result1->result_array();
//			foreach($re as $row)
//			{
//				$sent_factoryid=$row['sent_factoryid'];
//				$rfactoryid=$row['receive_factoryid'];
//				$challantypeid=$row['challantypeid'];
//				$buyerid=$row['buyerid'];
//				$producttypeid=$row['product_type'];
//				$item=$row['item'];
//				$osqty=$row['sqty'];
//				$orqty=$row['rqty'];
//				$unit=$row['unit'];
//				$sdate=$row['sdate'];
//				$stime=$row['stime'];
//			}
		//$sql1="INSERT INTO challan_insert VALUES ('$ccid1','$manualid','$challantypeid','$userid','$sfactoryid','$buyerid','$sent_factoryid','$producttypeid','$item','$rsqty','$unit','',CURDATE(),CURTIME(),'','','','1','0')";
//		$query1=$this->db->query($sql1);
		$sql="INSERT INTO challanm_back_insert VALUES ('$ccid1','$chmid2','$manualid','$rsqty',CURDATE(),CURTIME())";
		return $query=$this->db->query($sql);
	}
	public function date_wise_back_challanm_list($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM challanm2_insert
		JOIN challanm1_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		LEFT JOIN product ON product.pid=challanm2_insert.item_name
		LEFT JOIN productunit ON productunit.productunitid=challanm2_insert.item_unit
		LEFT JOIN producttype ON producttype.producttypeid=challanm2_insert.producttypeid
		LEFT JOIN challantype ON challantype.challantypeid=challanm2_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challanm1_insert.buyerid
		JOIN challanm_back_insert ON challanm_back_insert.chmid_2=challanm2_insert.chmid2
		
		WHERE (sfactoryid='$factoryid' OR rfactoryid='$factoryid') AND (sdate BETWEEN '$pd' AND '$wd') ORDER BY challanm1_insert.chmid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_back_challanm_summary($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT SUM(bkqty) AS bkqty,SUM(bkrqty) AS bkrqty,chmid,chmid_2,manualid,sfactoryid,buyername,rfactoryid,challantype,producttype,item_name,sqty,rqty,productunitname,sdate,stime,rdate,rtime,bkdate,bktime,pid,pname FROM challanm2_insert
		JOIN challanm1_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		LEFT JOIN product ON product.pid=challanm2_insert.item_name
		LEFT JOIN productunit ON productunit.productunitid=challanm2_insert.item_unit
		LEFT JOIN producttype ON producttype.producttypeid=challanm2_insert.producttypeid
		LEFT JOIN challantype ON challantype.challantypeid=challanm2_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challanm1_insert.buyerid
		JOIN challanm_back_insert ON challanm_back_insert.chmid_2=challanm2_insert.chmid2
		
		WHERE (sfactoryid='$factoryid' OR rfactoryid='$factoryid') AND (sdate BETWEEN '$pd' AND '$wd') GROUP BY chmid_2 ORDER BY challanm1_insert.chmid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function challan_back_create($sfactoryid,$manualid,$userid,$ccid,$rsqty)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$ccid1=$d.$t;
		$query1="SELECT * FROM challan_insert WHERE ccid='$ccid'";
			$result1=$this->db->query($query1);
			$re=$result1->result_array();
			foreach($re as $row)
			{
				$sent_factoryid=$row['sent_factoryid'];
				$rfactoryid=$row['receive_factoryid'];
				$challantypeid=$row['challantypeid'];
				$buyerid=$row['buyerid'];
				$producttypeid=$row['product_type'];
				$item=$row['item'];
				$osqty=$row['sqty'];
				$orqty=$row['rqty'];
				$unit=$row['unit'];
				$sdate=$row['sdate'];
				$stime=$row['stime'];
			}
		$sql1="INSERT INTO challan_insert VALUES ('$ccid1','$manualid','$challantypeid','$userid','$sfactoryid','$buyerid','$sent_factoryid','$producttypeid','$item','$rsqty','$unit','',CURDATE(),CURTIME(),'','','','1','0')";
		$query1=$this->db->query($sql1);
		$sql="INSERT INTO challan_back_insert VALUES ('$ccid1','$ccid','$manualid','$rsqty',CURDATE(),CURTIME())";
		return $query=$this->db->query($sql);
	}
	public function challan_return_create($sfactoryid,$manualid,$userid,$ccid,$rsqty)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$ccid1=$d.$t;
		$query1="SELECT * FROM challan_insert WHERE ccid='$ccid'";
			$result1=$this->db->query($query1);
			$re=$result1->result_array();
			foreach($re as $row)
			{
				$sent_factoryid=$row['sent_factoryid'];
				$rfactoryid=$row['receive_factoryid'];
				$challantypeid=$row['challantypeid'];
				$buyerid=$row['buyerid'];
				$producttypeid=$row['product_type'];
				$item=$row['item'];
				$osqty=$row['sqty'];
				$orqty=$row['rqty'];
				$unit=$row['unit'];
				$sdate=$row['sdate'];
				$stime=$row['stime'];
			}
		$sql1="INSERT INTO challan_insert VALUES ('$ccid1','$manualid','$challantypeid','$userid','$sfactoryid','$buyerid','$sent_factoryid','$producttypeid','$item','$rsqty','$unit','',CURDATE(),CURTIME(),'','','','1','0')";
		$query1=$this->db->query($sql1);
		$sql="INSERT INTO challan_return_insert VALUES ('$ccid1','$ccid','$manualid','$challantypeid','$userid','$sent_factoryid','$sfactoryid','$buyerid','$sent_factoryid','$producttypeid','$item','$osqty','$orty','$rsqty','$unit','$sdate','$stime',CURDATE(),CURTIME())";
		return $query=$this->db->query($sql);
	}
	public function challan_transfer_create($sfactoryid,$rfactoryid,$manualid,$userid,$ccid,$rsqty)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$ccid1=$d.$t;
		$query1="SELECT * FROM challan_insert WHERE ccid='$ccid'";
			$result1=$this->db->query($query1);
			$re=$result1->result_array();
			foreach($re as $row)
			{
				$osent_factoryid=$row['sent_factoryid'];
				//$rfactoryid=$row['receive_factoryid'];
				$challantypeid=$row['challantypeid'];
				$buyerid=$row['buyerid'];
				$producttypeid=$row['product_type'];
				$item=$row['item'];
				$osqty=$row['sqty'];
				$orqty=$row['rqty'];
				$unit=$row['unit'];
				$sdate=$row['sdate'];
				$stime=$row['stime'];
			}
		$sql1="INSERT INTO challan_insert VALUES ('$ccid1','$manualid','$challantypeid','$userid','$sfactoryid','$buyerid','$rfactoryid','$producttypeid','$item','$rsqty','$unit','',CURDATE(),CURTIME(),'','','','1','0')";
		$query1=$this->db->query($sql1);
		//$sql="INSERT INTO challan_transfer_insert VALUES ('$ccid1','$ccid','$rsqty',CURDATE(),CURTIME())";
		$sql="INSERT INTO challan_return_insert VALUES ('$ccid1','$ccid','$manualid','$challantypeid','$userid','$osent_factoryid','$sfactoryid','$buyerid','$rfactoryid','$producttypeid','$item','$osqty','$orqty','$rsqty','$unit','$sdate','$stime',CURDATE(),CURTIME())";
		return $query=$this->db->query($sql);
	}
	public function challan_list()
	{
		$query="SELECT * FROM challan_insert 
		LEFT JOIN productunit ON challan_insert.unit=productunit.productunitid
		LEFT JOIN producttype ON challan_insert.product_type=producttype.producttypeid
		LEFT JOIN challantype ON challan_insert.challantypeid=challantype.challantypeid
		LEFT JOIN buyer ON challan_insert.buyerid=buyer.bid
		ORDER BY ccid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function factory_challan_pending_list($factoryid)
	{
		$query="SELECT * FROM challan_insert 
		LEFT JOIN productunit ON productunit.productunitid=challan_insert.unit
		LEFT JOIN producttype ON producttype.producttypeid=challan_insert.product_type
		LEFT JOIN challantype ON challantype.challantypeid=challan_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challan_insert.buyerid
		WHERE (sent_factoryid='$factoryid' OR receive_factoryid='$factoryid') AND (status='1' OR status='2') ORDER BY ccid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_challan_list($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM challan_insert 
		LEFT JOIN productunit ON challan_insert.unit=productunit.productunitid
		LEFT JOIN producttype ON challan_insert.product_type=producttype.producttypeid
		LEFT JOIN challantype ON challan_insert.challantypeid=challantype.challantypeid
		LEFT JOIN buyer ON challan_insert.buyerid=buyer.bid
		
		WHERE (sent_factoryid='$factoryid' OR receive_factoryid='$factoryid') AND (sdate BETWEEN '$pd' AND '$wd') ORDER BY ccid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_back_challan_list($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM challan_insert 
		LEFT JOIN productunit ON productunit.productunitid=challan_insert.unit
		LEFT JOIN producttype ON producttype.producttypeid=challan_insert.product_type
		LEFT JOIN challantype ON challantype.challantypeid=challan_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challan_insert.buyerid
		JOIN challan_back_insert ON challan_back_insert.ccid=challan_insert.ccid
		
		WHERE (sent_factoryid='$factoryid' OR receive_factoryid='$factoryid') AND (sdate BETWEEN '$pd' AND '$wd') ORDER BY challan_insert.ccid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_back_challan_summary($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT SUM(bkqty) AS bkqty,challan_insert.ccid,manualid,sent_factoryid,buyername,receive_factoryid,challantype,producttype,item,sqty,rqty,productunitname,sdate,stime,rdate,rtime,bkdate,bktime FROM challan_insert 
		LEFT JOIN productunit ON productunit.productunitid=challan_insert.unit
		LEFT JOIN producttype ON producttype.producttypeid=challan_insert.product_type
		LEFT JOIN challantype ON challantype.challantypeid=challan_insert.challantypeid
		LEFT JOIN buyer ON buyer.bid=challan_insert.buyerid
		JOIN challan_back_insert ON challan_back_insert.ccid=challan_insert.ccid
		
		WHERE (sent_factoryid='$factoryid' OR receive_factoryid='$factoryid') AND (sdate BETWEEN '$pd' AND '$wd') GROUP BY ccid ORDER BY challan_insert.ccid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	//public function date_wise_return_challan_list($factoryid,$pd,$wd)
//	{
//		$pd=date("Y-m-d", strtotime($pd));
//		$wd=date("Y-m-d", strtotime($wd));
//		$query="SELECT * FROM challan_return_insert 
//		LEFT JOIN productunit ON challan_return_insert.unit=productunit.productunitid
//		LEFT JOIN producttype ON challan_return_insert.producttypeid=producttype.producttypeid
//		LEFT JOIN challantype ON challan_return_insert.challantypeid=challantype.challantypeid
//		LEFT JOIN buyer ON challan_return_insert.buyerid=buyer.bid
//		
//		WHERE (sfactoryid='$factoryid' OR rfactoryid='$factoryid') AND (rsdate BETWEEN '$pd' AND '$wd') ORDER BY rccid DESC";
//		$result=$this->db->query($query);
//		return $result->result_array();
//	}
	public function date_wise_allunit_challan_list($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM challan_insert 
		LEFT JOIN productunit ON challan_insert.unit=productunit.productunitid
		LEFT JOIN producttype ON challan_insert.product_type=producttype.producttypeid
		LEFT JOIN challantype ON challan_insert.challantypeid=challantype.challantypeid
		LEFT JOIN buyer ON challan_insert.buyerid=buyer.bid
		
		WHERE sent_factoryid='$factoryid' AND (sdate BETWEEN '$pd' AND '$wd') ORDER BY sent_factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function factory_challan_list($factoryid)
	{
		$query="SELECT * FROM challan_insert
		JOIN productunit ON challan_insert.unit=productunit.productunitid
		JOIN producttype ON challan_insert.product_type=producttype.producttypeid
		LEFT JOIN buyer ON challan_insert.buyerid=buyer.bid
		LEFT JOIN challan_return_insert ON challan_insert.ccid=challan_return_insert.rccid    
		WHERE sent_factoryid='$factoryid' OR receive_factoryid='$factoryid' ORDER BY ccid DESC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function challan_receive($ccid,$sqty,$rqty)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$cdate=date("Y-m-d", strtotime($cdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$ccid1=$d.$t;
		if($sqty!=$rqty)
		{
			$rstatus=1;
			//$sql="INSERT INTO challanr_insert VALUES ('$ccid','$ccid1','$rqty',CURDATE(),CURTIME())";
//			$query=$this->db->query($sql);
			$sql1="UPDATE challan_insert SET rqty='$rqty',rdate=CURDATE(),rtime=CURTIME(),status='2',rstatus='$rstatus' WHERE ccid='$ccid'";
			return $query1=$this->db->query($sql1);
		}
		else
		{
			$rstatus=0;
			$sql1="UPDATE challan_insert SET rqty='$rqty',rdate=CURDATE(),rtime=CURTIME(),status='0',rstatus='$rstatus' WHERE ccid='$ccid'";
			return $query1=$this->db->query($sql1);
		}
		
	}
	//public function challanr_create($ccid,$sqty)
//	{
//		
//			$query="SELECT * FROM challan_insert WHERE ccid='$ccid'";
//			$result=$this->db->query($query);
//			$re=$result->result_array();
//			foreach($re as $row)
//			{
//				$osqty=$row['sqty'];
//			}
//			if($osqty==$sqty)
//			{
//				$sql1="UPDATE challan_insert SET sqty='$sqty',rstatus='0' WHERE ccid='$ccid'";
//				return $query1=$this->db->query($sql1);
//			}
//			else
//			{
//				$sql1="UPDATE challan_insert SET sqty='$sqty',rstatus='1' WHERE ccid='$ccid'";
//				return $query1=$this->db->query($sql1);
//			}
//	}
	
	public function auditrp_insert($factoryid,$auditrpid)
	{
		
		$sql="INSERT INTO auditrp VALUES ('$auditrpid','$factoryid')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function auditrp_list()
	{
		$query="SELECT * FROM auditrp
		JOIN user ON user.userid=auditrp.auditrpid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function auditparty_insert($auditparty)
	{
		$sql="SELECT * FROM auditparty WHERE apname='$auditparty'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO auditparty VALUES ('','$auditparty')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function auditparty_list()
	{
		$query="SELECT * FROM auditparty";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function auditname_insert($auditname)
	{
		$sql="SELECT * FROM auditname WHERE auditname='$auditname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO auditname VALUES ('','$auditname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function auditname_list()
	{
		$query="SELECT * FROM auditname";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function audittype_list()
	{
		$query="SELECT * FROM audittype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function auditscope_list()
	{
		$query="SELECT * FROM auditscope";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function audittype_insert($audittype)
	{
		$sql="SELECT * FROM audittype WHERE audittypename='$audittype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO audittype VALUES ('','$audittype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function auditscope_insert($auditscope)
	{
		$sql="SELECT * FROM auditscope WHERE auditscopename='$auditscope'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO auditscope VALUES ('','$auditscope')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function currency_insert($currency)
	{
		$sql="SELECT * FROM currency WHERE currency='$currency'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO currency VALUES ('','$currency')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function currency_list()
	{
		$query="SELECT * FROM currency";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function auditcomp_insert($auditcomp)
	{
		$sql="SELECT * FROM audit_company_name WHERE auditcomp='$auditcomp'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO audit_company_name VALUES ('','$auditcomp')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function auditcomapny_list()
	{
		$query="SELECT * FROM audit_company_name";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function preauditinfo_insert($data)
	{
		$data['adate'] = date("Y-m-d", strtotime($data['adate']));
		//$sql="SELECT * FROM preauditinfo WHERE factoryname='$data[factoryname]' AND buyername='$data[buyername]' AND apid='$data[auditparty]' AND atid='$data[audittype]' AND acid='$data[auditscope]' AND fsl='$data[fsl]' AND auditdate='$data[adate]'";
		//$query=$this->db->query($sql);
		//$cid=$data['ordername'].$data['colour_id'];
		//if($query->num_rows()==1)
//			{
//				return false;
//			}
//		else
//			{
				
				$sql="INSERT INTO preauditinfo VALUES ('','$data[factoryname]','$data[buyername]','$data[auditparty]','$data[audittype]','$data[auditscope]','$data[fsl]','$data[findings]','$data[observation]','$data[adate]','$data[pdf_file]',0)";
				$query=$this->db->query($sql);
				return true;
			//}
	}
	//public function preauditinfo_pdfinsert($factoryname,$buyername,$audittype,$pdf_file,$adate)
//	{
//		$adate = date("Y-m-d", strtotime($adate));
//		$sql1="SELECT * FROM preauditinfopdf WHERE  factoryname='$factoryname' AND buyername='$buyername' AND atid='$audittype' AND preaudate='$adate'";
//		$query1=$this->db->query($sql1);
//		//$cid=$data['ordername'].$data['colour_id'];
//		if($query1->num_rows()==1)
//			{
//				return false;
//			}
//		else
//			{
//				
//				$sql2="INSERT INTO preauditinfopdf VALUES ('','$factoryname','$buyername','$audittype','$pdf_file','$adate')";
//				$query2=$this->db->query($sql2);
//				return true;
//			}
//	}
	//public function capinfo_report($adate,$factoryname,$buyername,$audittype,$auditparty,$auditscope)
//	{
//		$adate = date("Y-m-d", strtotime($adate));
//		$query="SELECT * FROM preauditinfo
//		LEFT JOIN auditparty ON auditparty.apid=preauditinfo.apid
//		LEFT JOIN audittype ON audittype.atid=preauditinfo.atid
//		LEFT JOIN auditscope ON auditscope.acid=preauditinfo.acid
//		LEFT JOIN buyer ON buyer.bid=preauditinfo.bid
//		WHERE preauditinfo.auditdate='$adate' AND preauditinfo.factoryname='$factoryname' AND buyer.bid='$buyername' AND audittype.atid='$audittype' AND auditparty.apid='$auditparty' AND auditscope.acid='$auditscope' AND preauditinfo.status='0'";
//		$result=$this->db->query($query);
//		return $result->result_array();
//		
//	}
public function capinfo_report($factoryname)
	{
		//$adate = date("Y-m-d", strtotime($adate));
		$query="SELECT * FROM preauditinfo
		LEFT JOIN auditparty ON auditparty.apid=preauditinfo.apid
		LEFT JOIN audittype ON audittype.atid=preauditinfo.atid
		LEFT JOIN auditscope ON auditscope.acid=preauditinfo.acid
		LEFT JOIN buyer ON buyer.bid=preauditinfo.bid
		WHERE preauditinfo.factoryname='$factoryname' AND preauditinfo.status='0'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function capinfo_report_insert($data)
	{
		$data['pd'] = date("Y-m-d", strtotime($data['pd']));
		$data['wd'] = date("Y-m-d", strtotime($data['wd']));
		$sql1="UPDATE preauditinfo SET status=1 WHERE preaid='$data[chpreaid]'";
		$query1=$this->db->query($sql1);
		$sql="INSERT INTO capreport VALUES ('','$data[preaid]','$data[cap]','$data[pr]','$data[pd]','$data[wd]','$data[pic_file]','',0)";
		$query=$this->db->query($sql);
		
		$query3="SELECT * FROM preauditinfo WHERE preaid='$data[preaid]' AND status=0";
		$result3=$this->db->query($query3);
		$re=$result3->result_array();
		foreach($re as $row3)
		{
			$va=$row3['preaid'];
			$sql2="DELETE FROM capreport WHERE preaid='$va'";
			$query2=$this->db->query($sql2);
		}
		
		
		
		return $query;
		
	}
	public function capfile_upload($adate,$factoryname,$buyername,$audittype,$auditparty,$auditscope)
	{
		$adate = date("Y-m-d", strtotime($adate));
		$query="SELECT COUNT(preauditinfo.preaid) AS cpreaid,COUNT(capreport.preaid) AS capreaid,preauditinfo.preaid,preauditinfo.bid,preauditinfo.factoryname,preauditinfo.apid,preauditinfo.atid,preauditinfo.acid,preauditinfo.auditdate,audittype.audittypename,auditscope.auditscopename,auditparty.apname,buyer.buyername 
		FROM preauditinfo 
		LEFT JOIN capreport ON preauditinfo.preaid=capreport.preaid
		LEFT JOIN audittype ON audittype.atid=preauditinfo.atid
		LEFT JOIN auditparty ON auditparty.apid=preauditinfo.apid
		LEFT JOIN auditscope ON auditscope.acid=preauditinfo.acid
		LEFT JOIN buyer ON buyer.bid=preauditinfo.bid
		WHERE preauditinfo.factoryname='$factoryname' AND buyer.bid='$buyername' AND preauditinfo.atid='$audittype'
		AND preauditinfo.apid='$auditparty' AND preauditinfo.acid='$auditscope'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function capstatus_report($adate,$factoryname,$buyername,$audittype)
	{
		$adate = date("Y-m-d", strtotime($adate));
		$query="SELECT preauditinfo.preaid,preauditinfo.factoryname,preauditinfo.bid,auditparty.apname,audittype.audittypename,auditscope.auditscopename,preauditinfo.fsl,preauditinfo.findings,preauditinfo.observation,preauditinfo.auditdate,capreport.cap,capreport.pr,capreport.tardate,capreport.comdate,capreport.capimage,capreport.ratings,capreport.status,user.ename,buyer.buyername 
		FROM preauditinfo 
		LEFT JOIN capreport ON
		preauditinfo.preaid=capreport.preaid
		LEFT JOIN user ON
		user.userid=capreport.pr
		JOIN audittype ON audittype.atid=preauditinfo.atid
		LEFT JOIN auditparty ON auditparty.apid=preauditinfo.apid
		LEFT JOIN auditscope ON auditscope.acid=preauditinfo.acid
		LEFT JOIN buyer ON buyer.bid=preauditinfo.bid
		WHERE preauditinfo.factoryname='$factoryname' AND  buyer.bid='$buyername' AND preauditinfo.atid='$audittype' ORDER BY preauditinfo.fsl";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function cap_status_insert($data)
	{
		$sql="UPDATE capreport SET ratings='$data[ratings]',status='$data[status]' WHERE preaid='$data[preaid]'";
		$query=$this->db->query($sql);
		return $query;
	}
	public function capfile_upload_insert($preaid,$pic_file)
	{
		$sql="SELECT * FROM capreportpdf WHERE preaid='$preaid'";
		$query=$this->db->query($sql);
		//$cid=$data['ordername'].$data['colour_id'];
		if($query->num_rows()==1)
			{
				return false;
			}
		else
			{
				
				$sql="INSERT INTO capreportpdf VALUES ('','$preaid','$pic_file')";
				$query=$this->db->query($sql);
				return true;
			}
	}
	//public function capfile_upload_insert($factoryname,$buyername,$audittype,$auditparty,$auditscope,$auditdate,$pdf_file)
//	{
//		$sql="SELECT * FROM capreportpdf WHERE factoryname='$factoryname' AND buyername='$buyername' AND audittype='$audittype' AND auditdate='$auditdate'";
//		$query=$this->db->query($sql);
//		//$cid=$data['ordername'].$data['colour_id'];
//		if($query->num_rows()==1)
//			{
//				return false;
//			}
//		else
//			{
//				
//				$sql="INSERT INTO capreportpdf VALUES ('','$factoryname','$buyername','$audittype','$pdf_file','$auditdate')";
//				$query=$this->db->query($sql);
//				return true;
//			}
//	}
	public function capfull_report($adate,$factoryname,$buyername,$audittype,$auditparty,$auditscope)
	{
		$adate = date("Y-m-d", strtotime($adate));
		$query="SELECT preauditinfo.preaid,preauditinfo.factoryname,buyer.buyername,auditparty.apname,audittype.audittypename,auditscope.auditscopename,preauditinfo.fsl,preauditinfo.findings,preauditinfo.observation,preauditinfo.auditdate,capreport.cap,capreport.pr,capreport.tardate,capreport.comdate,capreport.capimage,capreport.ratings,capreport.status,capreportpdf.capefile,user.ename 
		FROM preauditinfo 
		LEFT JOIN capreport ON
		preauditinfo.preaid=capreport.preaid
		LEFT JOIN user ON
		user.userid=capreport.pr
		
		LEFT JOIN capreportpdf ON
		capreportpdf.preaid=preauditinfo.preaid
		LEFT JOIN auditparty ON auditparty.apid=preauditinfo.apid
		LEFT JOIN audittype ON audittype.atid=preauditinfo.atid
		LEFT JOIN auditscope ON auditscope.acid=preauditinfo.acid
		
		LEFT JOIN buyer ON buyer.bid=preauditinfo.bid
		WHERE preauditinfo.factoryname='$factoryname' AND preauditinfo.bid='$buyername' AND preauditinfo.atid='$audittype' AND preauditinfo.apid='$auditparty' AND preauditinfo.acid='$auditscope' AND preauditinfo.auditdate='$adate' ORDER BY preauditinfo.fsl";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function preauditfile_report($adate,$factoryname,$buyername,$audittype)
	{
		$query="SELECT preauditpdf FROM preauditinfopdf 
		
		WHERE factoryname='$factoryname' AND buyername='$buyername' AND audittype='$audittype' AND preaudate='$adate'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function capauditfile_report($adate,$factoryname,$buyername,$audittype)
	{
		$query="SELECT pdffile FROM capreportpdf 
		
		WHERE factoryname='$factoryname' AND buyername='$buyername' AND audittype='$audittype' AND auditdate='$adate'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function complianceexp_insert($factoryname,$auditname,$auditscope,$audittype,$auditparty,$buyername,$adate,$idate,$iamount,$icurrency,$pdate,$pamount,$pcurrency,$auditcomp,$tsdate,$tedate,$coordinate,$remarks,$invoice_file,$pic_file)
	{
		date_default_timezone_set('Asia/Dhaka');
		$adate = date("Y-m-d", strtotime($adate));
		$idate = date("Y-m-d", strtotime($idate));
		$pdate = date("Y-m-d", strtotime($pdate));
		$tsdate = date("Y-m-d", strtotime($tsdate));
		$tedate = date("Y-m-d", strtotime($tedate));
		$d=date('Y-m-d');
		//$d=$cdate;
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$cexpid=$d.$t;
		$sql="INSERT INTO complianceexp VALUES ('$cexpid','$factoryname','$auditname','$auditscope','$audittype','$auditparty','$buyername','$adate','$idate','$iamount','$icurrency','$pdate','$pamount','$pcurrency','$auditcomp','$tsdate','$tedate','$coordinate','$remarks','$invoice_file','$pic_file')";
		$query=$this->db->query($sql);
		return true;
	}
	public function date_wise_complianceexp($pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM complianceexp
		LEFT JOIN auditname ON auditname.auditnameid=complianceexp.aunid
		LEFT JOIN auditscope ON auditscope.acid=complianceexp.acid
		LEFT JOIN audittype ON audittype.atid=complianceexp.atid
		LEFT JOIN auditparty ON auditparty.apid=complianceexp.apid
		LEFT JOIN buyer ON buyer.bid=complianceexp.bid
		LEFT JOIN currency ON currency.cid=complianceexp.icurrency
		
		LEFT JOIN audit_company_name ON audit_company_name.acnid=complianceexp.acnid
		LEFT JOIN user ON user.userid=complianceexp.userid
		LEFT JOIN factory ON factory.factoryid=complianceexp.factoryid
		
		WHERE adate BETWEEN '$pd' AND '$wd'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyer_insert($pic_file,$buyername,$cc,$local_address,$lcuserid,$lcmobile,$lcemail,$lmuserid,$lmmobile,$lmemail,$webaddress)
	{
		$sql="SELECT * FROM buyer WHERE buyername='$buyername'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO buyer VALUES ('','$buyername','$cc','$local_address','$lcuserid','$lcmobile','$lcemail','$lmuserid','$lmmobile','$lmemail','$webaddress','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function bimglup($bid,$pic_file)
	{
		
		$sql="UPDATE buyer SET image='$pic_file' WHERE bid='$bid'";
		$query=$this->db->query($sql);
	}
	//public function buyer_list()
//	{
//		$query="SELECT (SELECT ename FROM user WHERE user.userid=buyer.lcuserid) AS lcuser,
//		(SELECT ename FROM user WHERE user.userid=buyer.lmuserid) AS buser,bid,buyername,origin,local_address,lcuserid,lcmobile,lcemail,
//		lmuserid,lmmobile,lmemail,webaddress,image FROM buyer";
//		$result=$this->db->query($query);
//		return $result->result_array();
//	}
public function buyer_list()
	{
		$query="SELECT 
		(SELECT ename FROM user WHERE user.userid=buyer.lmuserid) AS buser,bid,buyername,origin,local_address,(lcuserid) AS lcuser,lcmobile,lcemail,
		lmuserid,lmmobile,lmemail,webaddress,image FROM buyer ORDER BY buyername ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function buyer_list_up($bid)
	{
		$sql1="SELECT * FROM buyer 
		JOIN country ON buyer.origin=country.country_code
		WHERE bid='$bid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function blup($bid,$buyername,$cc,$local_address,$lcuserid,$lcmobile,$lcemail,$lmuserid,$lmmobile,$lmemail,$webaddress)
	{
		
		$sql="UPDATE buyer SET buyername='$buyername',origin='$cc',local_address='$local_address',lcuserid='$lcuserid',lcmobile='$lcmobile',lcemail='$lcemail',lmuserid='$lmuserid',lmmobile='$lmmobile',lmemail='$lmemail',webaddress='$webaddress' WHERE bid='$bid'";
		$query=$this->db->query($sql);
	}
	public function buyer_list_details($bid)
	{
		$query="SELECT 
		(SELECT ename FROM user WHERE user.userid=buyer.lmuserid) AS buser,bid,buyername,origin,local_address,(lcuserid) AS lcuser,lcmobile,lcemail,
		lmuserid,lmmobile,lmemail,webaddress,image FROM buyer WHERE bid='$bid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function country_insert($cc,$cna)
	{
		$sql="SELECT * FROM country WHERE country_code='$cc'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO country VALUES ('$cc','$cna')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function country_list()
	{
		$query="SELECT * FROM country";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function country_list_up($cc)
	{
		$sql1="SELECT * FROM country WHERE country_code='$cc'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function countrylup($cc,$cna)
	{
		
		$sql="UPDATE country SET country_name='$cna' WHERE country_code='$cc'";
		$query=$this->db->query($sql);
	}
	public function buyerwcer_insert($data)
	{
		
		//$sql="SELECT * FROM buyerwf WHERE bid='$data[bid]' AND factoryid='$data[factoryid]'";
//		$query=$this->db->query($sql);
//		
//		if($query->num_rows()==1)
//			{
//				return false;
//			}
//		else
//			{
//				$data['vdate'] = date("Y-m-d", strtotime($data['vdate']));
				$sql="INSERT INTO buyerwcer VALUES ('','$data[factoryid]','$data[licensename]','$data[bid]','0')";
				$query=$this->db->query($sql);
				return true;
			//}
	}
	public function buyerwcer_listafl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		LEFT JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='AFL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listakl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='AKL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listatl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		 JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='ATL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listbcl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='BCL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listbgl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='BGL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listbpl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='BPL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listbtl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='BTL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listbwl()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='BWL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function buyerwcer_listjel()
	{
		$query="SELECT * FROM buyerwcer 
		LEFT JOIN license ON license.licensename=buyerwcer.lcid AND
		
		license.factoryid=buyerwcer.factid
		LEFT JOIN buyer ON buyer.bid=buyerwcer.buid
		JOIN licensename ON licensename.lnid=license.licensename
		WHERE factid='JEL'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
public function buyerwf_insert($bid,$afl,$akl,$atl,$bcl,$bgl,$bpl,$btl,$bwl,$jel)
	{
		
		//$sql="SELECT * FROM buyerwf WHERE bid='$data[bid]' AND factoryid='$data[factoryid]'";
//		$query=$this->db->query($sql);
//		
//		if($query->num_rows()==1)
//			{
//				return false;
//			}
//		else
//			{
				//$data['vdate'] = date("Y-m-d", strtotime($data['vdate']));
				$sql="INSERT INTO buyerwf VALUES ('','$bid','$afl','$akl','$atl','$bcl','$bgl','$bpl','$btl','$bwl','$jel')";
				$query=$this->db->query($sql);
				return true;
			//}
	}
	public function buyerwf_list()
	{
		$query="SELECT * FROM buyerwf JOIN
		buyer ON buyerwf.bid=buyer.bid
		";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	//public function dbuyerwf_list()
//	{
//		$query="SELECT DISTINCT(factoryid) AS fid FROM buyerwf JOIN
//		buyer ON buyerwf.bid=buyer.bid
//		ORDER BY buyer.buyername,buyerwf.factoryid";
//		$result=$this->db->query($query);
//		return $result->result_array();
//		
//	}
	public function buyerwf_list_up($bid)
	{
		$sql1="SELECT * FROM buyerwf JOIN
		buyer ON buyerwf.bid=buyer.bid
		
		WHERE bwfid='$bid' ORDER BY buyer.buyername,buyerwf.factoryid";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function bwflup($bwfid,$vdate)
	{
		$vdate = date("Y-m-d", strtotime($vdate));
		$sql="UPDATE buyerwf SET vdate='$vdate' WHERE bwfid='$bwfid'";
		return $query=$this->db->query($sql);
	}
	//public function clicense_list()
//	{
//		$query="SELECT * FROM c_license_view
//		";
//		$result=$this->db->query($query);
//		return $result->result_array();
//		
//	}
	public function factorywise_ssupervisor_list($factoryid)
	{
		
$query="SELECT user.factoryid,user.userid,factory.factoryname,division.divisionname,(user.divisionid) AS diviid,user.departmentid,department.deptid,department.departmentname,user.sectionid,section.sectionname,user.subsectionid,subsection.subsectionname,user.location,user.ename,user.bname,user.parentdesignationid,user.childdesignationid,user.religion,user.maritual,user.dob,user.doj,user.hdistrict,user.epermanentaddress,user.bpermanentaddress,user.epresentaddress,user.bpresentaddress,user.nid,user.blodgroup,user.gender,user.salary,user.efficiency,user.identification,user.oemail,user.pemail,user.pmobile,user.emobile,user.user_type,user.service_type,user.puserid,user.ruserid,user.password,user.ustatus,usertype.usertypeid,usertype.usertype,servicetype.servicetypeid,servicetype.servicetype,userstatus.userstatusid,userstatus.userstatus,religion.religionid,religion.religionname,maritualstatus.maritualstatusid,maritualstatus.maritualstatus,gender.genderid,gender.gender,user.password,parentdesignation.eparentdesignation,parentdesignation.parentdesignationid,parentdesignation.bparentdesignation,childdesignation.childdesignationid,childdesignation.echilddesignation,childdesignation.bchilddesignation,user.image  FROM user
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN division ON division.divisionid=user.divisionid 
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN section ON section.secid=user.sectionid
		LEFT JOIN subsection ON subsection.subsecid=user.subsectionid
		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=user.parentdesignationid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
		LEFT JOIN religion ON religion.religionid=user.religion
		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=user.maritual
		LEFT JOIN gender ON gender.genderid=user.gender
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type 
		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE user.factoryid='$factoryid' AND user.user_type='7' AND user.subsectionid !='' AND ustatus='1' ORDER BY user.userid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function sscorecardinsertRecord($data)
	{
		
		$sql="INSERT INTO sscore_card_insert VALUES ('$data[sscid]','$data[factoryid]','$data[userid]','$data[subsectionid]','$data[efficiency]','$data[varience]','$data[cutt2shiploss]','$data[wmcratio]','$data[dhusf]','$data[fivesscore]','$data[wto]','$data[woabsentism]','$data[ontpre]','$data[wofeedback]','$data[sleave]','$data[sabsent]','$data[slate]','$data[cdate]')";
		$query=$this->db->query($sql);
		return $query;
    }
	public function sscore_card_insert($data)
	{
		//date_default_timezone_set('Asia/Dhaka');
		$cdate= date("Y-m-d", strtotime($data['cdate']));
		$cdate=str_replace("-","",$cdate);
		$d=date('Y-m-d');
		$t= date("h:i:s");
		$d=str_replace("-","",$d);
		//$t=str_replace(":","",$t);
		$sscid=$data['userid'].$cdate;
		$sql="INSERT INTO sscore_card_insert VALUES ('$sscid','$data[factoryid]','$data[userid]','$data[subsectionid]','$data[efficiency]','$data[varience]','$data[cutt2shiploss]','$data[wmcratio]','$data[dhusf]','$data[fivesscore]','$data[wto]','$data[woabsentism]','$data[ontpre]','$data[wofeedback]','$data[sleave]','$data[sabsent]','$data[slate]','$cdate')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function date_wise_totalsscorecard($factoryid,$pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT user.factoryid,user.userid,user.ename,subsection.subsectionname,sscore_card_insert.efficiency,sscore_card_insert.varience,sscore_card_insert.cutt2shiploss,sscore_card_insert.wmcratio,sscore_card_insert.dhusf,sscore_card_insert.fivesscore,sscore_card_insert.wto,sscore_card_insert.woabsentism,sscore_card_insert.ontpre,sscore_card_insert.wofeedback,sscore_card_insert.cdate,sscore_card_insert.sleave,sscore_card_insert.sabsent,sscore_card_insert.slate FROM sscore_card_insert
		JOIN user ON sscore_card_insert.userid=user.userid
		LEFT JOIN subsection ON sscore_card_insert.subsectionid=subsection.subsecid
		
		WHERE cdate BETWEEN '$pd' AND '$wd' AND sscore_card_insert.factoryid='$factoryid' AND user.user_type='7'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_totalsummarysscorecard($factoryid,$pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT COUNT(cdate) AS wod,user.factoryid,user.userid,user.ename,subsection.subsectionname,
		SUM(sscore_card_insert.efficiency) AS efficiency,
		SUM(sscore_card_insert.varience) AS varience,
		SUM(sscore_card_insert.cutt2shiploss) AS cutt2shiploss,
		SUM(sscore_card_insert.wmcratio) AS wmcratio,
		SUM(sscore_card_insert.dhusf) AS dhusf,
		SUM(sscore_card_insert.fivesscore) AS fivesscore,
		SUM(sscore_card_insert.wto) AS wto,
		SUM(sscore_card_insert.woabsentism) AS woabsentism,
		SUM(sscore_card_insert.ontpre) AS ontpre,
		SUM(sscore_card_insert.wofeedback) AS wofeedback,
		sleave,sabsent,slate
		 
		FROM sscore_card_insert
		JOIN user ON sscore_card_insert.userid=user.userid
		LEFT JOIN subsection ON sscore_card_insert.subsectionid=subsection.subsecid
		
		WHERE cdate BETWEEN '$pd' AND '$wd' AND sscore_card_insert.efficiency !='' AND sscore_card_insert.factoryid='$factoryid' AND user.user_type='7' 
		GROUP BY user.userid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_individualsummarysscorecard($userid,$pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT  COUNT(cdate) AS wod,cdate,user.factoryid,user.userid,user.ename,subsection.subsectionname,
		SUM(sscore_card_insert.efficiency) AS efficiency,
		SUM(sscore_card_insert.varience) AS varience,
		SUM(sscore_card_insert.cutt2shiploss) AS cutt2shiploss,
		SUM(sscore_card_insert.wmcratio) AS wmcratio,
		SUM(sscore_card_insert.dhusf) AS dhusf,
		SUM(sscore_card_insert.fivesscore) AS fivesscore,
		SUM(sscore_card_insert.wto) AS wto,
		SUM(sscore_card_insert.woabsentism) AS woabsentism,
		SUM(sscore_card_insert.ontpre) AS ontpre,
		SUM(sscore_card_insert.wofeedback) AS wofeedback,
		SUM(sleave) AS sleave,
		SUM(sabsent) AS sabsent,
		SUM(slate) AS slate,image
		 
		FROM sscore_card_insert
		JOIN user ON sscore_card_insert.userid=user.userid
		LEFT JOIN subsection ON sscore_card_insert.subsectionid=subsection.subsecid
		
		WHERE cdate BETWEEN '$pd' AND '$wd' AND sscore_card_insert.efficiency !='' AND sscore_card_insert.userid='$userid' AND user.user_type='7' 
		GROUP BY user.userid";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_individualsummarysscorecard1($userid,$pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT COUNT(disposal) AS disposal FROM diciplinary_action_insert WHERE doacde BETWEEN '$pd' AND '$wd' AND accusedid='$userid' AND disposal !='5'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_individualsummarysscorecard2($userid,$pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT COUNT(cc) AS cco,
					   COUNT(at) AS ato,
		               COUNT(lo) AS loo,
		               COUNT(de) AS deo,
		               COUNT(re) AS reo,
					   SUM(cc) AS cc,
					   SUM(at) AS at,
					   SUM(lo) AS lo,
					   SUM(de) AS de,
					   SUM(re) AS re
		 FROM sshod_insert WHERE shdate BETWEEN '$pd' AND '$wd' AND userid='$userid'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_individualsummarysscorecardchart($userid,$pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT  cdate,
		efficiency,
		varience,
		cutt2shiploss,
		wmcratio,
		dhusf,
		fivesscore,
		wto,
		woabsentism,
		ontpre,
		wofeedback
		 
		FROM sscore_card_insert
		
		
		WHERE cdate BETWEEN '$pd' AND '$wd' AND userid='$userid' AND efficiency !='' AND dhusf !='' AND fivesscore !='' AND woabsentism !='' AND ontpre !='' ORDER BY cdate
		 ";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function sshod_insert($userid,$cc,$at,$lo,$de,$re,$shdate)
	{
		$shdate= date("Y-m-d", strtotime($shdate));
		$shdate=str_replace("-","",$shdate);
//		$d=date('Y-m-d');
		$t= date("h:i:s");
//		$d=str_replace("-","",$d);
		//$t=str_replace(":","",$t);
		$sscid=$userid.$shdate;
		$sql="INSERT INTO sshod_insert VALUES ('$sscid','$userid','$cc','$at','$lo','$de','$re','$shdate')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function monthname()
	{
		
		$query="SELECT DISTINCT(mn) AS mn FROM sscore_card_insert_mview";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function yearname()
	{
		
		$query="SELECT DISTINCT(yr) AS yr FROM sscore_card_insert_mview";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function year_wise_individualsummarysscorecard($userid,$yr)
	{
		
		$query="SELECT *
		 
		FROM sscore_card_insert_maview
		JOIN user ON sscore_card_insert_maview.userid=user.userid
		LEFT JOIN subsection ON sscore_card_insert_maview.subsectionid=subsection.subsecid
		
		WHERE yr='$yr' AND sscore_card_insert_maview.userid='$userid' AND user.user_type='7' GROUP BY user.userid
		";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function year_wise_individualsummarysscorecard1($userid,$yr)
	{
		
		$query="SELECT COUNT(yr) AS wod,SUM(sleave) AS sleave,SUM(sabsent) AS sabsent,SUM(slate) AS slate,SUM(aefficiency) AS efficiency,SUM(adhusf) AS dhusf,SUM(awoabsentism) AS woabsentism,SUM(awmcratio) AS wmcratio,SUM(afivesscore) AS fivesscore,SUM(aontpre) AS ontpre,mn,yr,aefficiency,adhusf,awoabsentism,awmcratio,afivesscore,aontpre
		 
		FROM sscore_card_insert_maview
		
		
		WHERE yr='$yr' AND userid='$userid' 
		";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function year_wise_individualsummarysscorecard2($userid,$yr)
	{
		
		$query="SELECT COUNT(dy) AS wod,SUM(disposal) AS disposal FROM diciplinary_action_insert_mview WHERE dy='$yr' AND accusedid='$userid'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function year_wise_individualsummarysscorecard3($userid,$year)
	{
		
		$query="SELECT COUNT(hoy) AS cco,
					   
					   SUM(cc) AS cc,
					   SUM(at) AS at,
					   SUM(lo) AS lo,
					   SUM(de) AS de,
					   SUM(re) AS re
		 FROM sshod_insert_mview WHERE hoy ='$year' AND userid='$userid'";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function year_wise_individualsummarysscorecardchart($userid,$yr)
	{
		
		$query="SELECT mn,yr,aefficiency,adhusf,awoabsentism,awmcratio,afivesscore,aontpre
		 
		FROM sscore_card_insert_maview
		
		
		WHERE yr='$yr' AND userid='$userid' ORDER BY FIELD(mn,'January','February','March','April','May','June','July','August','September','October','November','December') 
		";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function factorywise_ssupervisor_list_update($factoryid,$pd)
	{
	$pd= date("Y-m-d", strtotime($pd));	
	$query="SELECT 	sscore_card_insert.factoryid,sscore_card_insert.userid,user.image,user.ename,subsection.subsectionname,sscore_card_insert.efficiency,sscore_card_insert.varience,sscore_card_insert.cutt2shiploss,sscore_card_insert.wmcratio,sscore_card_insert.dhusf,sscore_card_insert.fivesscore,sscore_card_insert.wto,sscore_card_insert.woabsentism,sscore_card_insert.ontpre,sscore_card_insert.wofeedback,sscore_card_insert.sleave,sscore_card_insert.sabsent,sscore_card_insert.slate,sscore_card_insert.cdate
			FROM sscore_card_insert
			JOIN user ON
			user.userid=sscore_card_insert.userid
			JOIN subsection ON
			subsection.subsecid=sscore_card_insert.subsectionid
			WHERE sscore_card_insert.factoryid='$factoryid' AND sscore_card_insert.cdate='$pd' ORDER BY sscore_card_insert.userid";
			$result=$this->db->query($query);
			return $result->result_array();
		
	}
	public function sscore_card_update($data)
	{
		
		$sql="UPDATE sscore_card_insert SET efficiency='$data[efficiency]',varience='$data[varience]',cutt2shiploss='$data[cutt2shiploss]',wmcratio='$data[wmcratio]',dhusf='$data[dhusf]',fivesscore='$data[fivesscore]',wto='$data[wto]',woabsentism='$data[woabsentism]',ontpre='$data[ontpre]',wofeedback='$data[wofeedback]',sleave='$data[sleave]',sabsent='$data[sabsent]',slate='$data[slate]' WHERE userid='$data[userid]' AND cdate='$data[cdate]'";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function diciplinary_action_insert($dadate,$userid,$factoryid,$nameofreporterid,$primaryinvestigationbyid,$pidate,$accusedid,$victimid,$abusedforneg,$doinfachoddate)
	{
		date_default_timezone_set('Asia/Dhaka');
		if($dadate!='')
			{
				$dadate= date("Y-m-d", strtotime($dadate));
			}
		else
			{
				$dadate='';
			}
		if($dadate!='')
			{
				$pidate= date("Y-m-d", strtotime($pidate));
			}
		else
			{
				$pidate='';
			}
		if($dadate!='')
			{
				$doinfachoddate= date("Y-m-d", strtotime($doinfachoddate));
			}
		else
			{
				$doinfachoddate='';
			}
		
		
		$d=date('Y-m-d');
		$t= date("h:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$dcaid=$d.$t;
		$sql="INSERT INTO diciplinary_action_insert VALUES ('$dcaid','$userid','$dadate','$factoryid','$nameofreporterid','$primaryinvestigationbyid','$pidate','$accusedid','$victimid','$abusedforneg','$doinfachoddate','','','','','','','','','','','','','','','','','','1')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function dfacheadcomments_insert($commentsname)
	{
		$sql="SELECT * FROM dfacheadcomments_insert WHERE dfacheadcomments='$commentsname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO dfacheadcomments_insert VALUES ('','$commentsname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	
	public function dfacheadcomments_list()
	{
		$query="SELECT * FROM dfacheadcomments_insert";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function dfacheadcomments_list_up($dfacheadcommentsid)
	{
		$sql1="SELECT * FROM dfacheadcomments_insert WHERE dfacheadcommentsid='$dfacheadcommentsid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function dfacheadcommentslup($dfacheadcommentsid,$dfacheadcomments)
	{
		
		$sql="UPDATE dfacheadcomments_insert SET dfacheadcomments='$dfacheadcomments' WHERE dfacheadcommentsid='$dfacheadcommentsid'";
		$query=$this->db->query($sql);
	}
	public function dcatype_insert($dcatype)
	{
		$sql="SELECT * FROM dcatype WHERE dcatype='$dcatype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO dcatype VALUES ('','$dcatype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function dcatype_list()
	{
		$query="SELECT * FROM dcatype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function dcatype_list_up($dcatypeid)
	{
		$sql1="SELECT * FROM dcatype WHERE dcatypeid='$dcatypeid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function dcatypelup($dcatypeid,$dcatype)
	{
		
		$sql="UPDATE dcatype SET dcatype='$dcatype' WHERE dcatypeid='$dcatypeid'";
		$query=$this->db->query($sql);
	}
	public function dcadistype_insert($distype)
	{
		$sql="SELECT * FROM dcadistype WHERE distype='$distype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO dcadistype VALUES ('','$distype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function dcadistype_list()
	{
		$query="SELECT * FROM dcadistype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function dcadistype_list_up($dcadistypeid)
	{
		$sql1="SELECT * FROM dcadistype WHERE distypeid='$dcadistypeid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function dcadistypelup($dcadistypeid,$dcadistype)
	{
		
		$sql="UPDATE dcadistype SET distype='$dcadistype' WHERE distypeid='$dcadistypeid'";
		$query=$this->db->query($sql);
	}
	public function dcapending_list()
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.nameofreporterid) AS nameofreporter,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.primaryinvestigationbyid) AS primaryinvestigationbyname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.accusedid) AS accusedname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.victimid) AS victimname,
		dcaid,dadate,factoryid,nameofreporterid,primaryinvestigationbyid,pidate,accusedid,victimid,abusedforneg,doinfachoddate,dcastatus
		FROM diciplinary_action_insert 
		
		WHERE dcastatus IN('1','2')";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function dcaaction_inquiry($dcaid)
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.nameofreporterid) AS nameofreporter,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.primaryinvestigationbyid) AS primaryinvestigationbyname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.accusedid) AS accusedname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.victimid) AS victimname,
		dcaid,dadate,factoryid,nameofreporterid,primaryinvestigationbyid,pidate,accusedid,victimid,abusedforneg,doinfachoddate
		FROM diciplinary_action_insert 
		
		WHERE dcaid='$dcaid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function diciplinary_inquiry_insert($dcaid,$dflid,$dcatypeid,$actiondate,$accrdate,$vicrdate,$inqoff,$letoinqoffdate,$inqdate,$letoacudate,$inqredate,$inqcom,$docu)
	{
		if($actiondate!='')
			{
				$actiondate= date("Y-m-d", strtotime($actiondate));
			}
		else
			{
				$actiondate='';
			}
		if($accrdate!='')
			{
				$accrdate= date("Y-m-d", strtotime($accrdate));
			}
		else
			{
				$accrdate='';
			}
		if($vicrdate!='')
			{
				$vicrdate= date("Y-m-d", strtotime($vicrdate));
			}
		else
			{
				$vicrdate='';
			}
		if($letoinqoffdate!='')
			{
				$letoinqoffdate= date("Y-m-d", strtotime($letoinqoffdate));
			}
		else
			{
				$letoinqoffdate='';
			}
		if($inqdate!='')
			{
				$inqdate= date("Y-m-d", strtotime($inqdate));
			}
		else
			{
				$inqdate='';
			}
		if($letoacudate!='')
			{
				$letoacudate= date("Y-m-d", strtotime($letoacudate));
			}
		else
			{
				$letoacudate='';
			}
		if($inqredate!='')
			{
				$inqredate= date("Y-m-d", strtotime($inqredate));
			}
		else
			{
				$inqredate='';
			}
		
		$query="UPDATE diciplinary_action_insert SET dflid='$dflid',dcatypeid='$dcatypeid',actiondate='$actiondate',accrdate='$accrdate',vicrdate='$vicrdate',inqoff='$inqoff',letoinqoffdate='$letoinqoffdate',inqdate='$inqdate',letoacudate='$letoacudate',inqredate='$inqredate',inqcom='$inqcom',actiontypedocu='$docu',dcastatus='2'
		
		WHERE dcaid='$dcaid'";
		return $result=$this->db->query($query);
	}
	public function dcaaction_after_inquiry($dcaid)
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.nameofreporterid) AS nameofreporter,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.primaryinvestigationbyid) AS primaryinvestigationbyname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.accusedid) AS accusedname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.victimid) AS victimname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.inqoff) AS inqoffname,
		dcaid,dadate,factoryid,nameofreporterid,primaryinvestigationbyid,pidate,accusedid,victimid,abusedforneg,doinfachoddate,actiondate,accrdate,vicrdate,inqoff,letoinqoffdate,inqdate,letoacudate,inqredate,inqcom,dfacheadcomments,dcatype
		FROM diciplinary_action_insert 
		LEFT JOIN dfacheadcomments_insert ON dfacheadcomments_insert.dfacheadcommentsid=diciplinary_action_insert.dflid
		LEFT JOIN dcatype ON dcatype.dcatypeid=diciplinary_action_insert.dcatypeid
		
		WHERE dcaid='$dcaid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function diciplinary_after_inquiry_insert($dcaid,$apme,$disposal,$doacde,$remarks,$docu)
	{
		if($doacde!='')
			{
				$doacde= date("Y-m-d", strtotime($doacde));
			}
		else
			{
				$doacde='';
			}
		
		
		$query="UPDATE diciplinary_action_insert SET apme='$apme',disposal='$disposal',disposaldocu='$docu',doacde='$doacde',remarks='$remarks',dcastatus='0'
		
		WHERE dcaid='$dcaid'";
		return $result=$this->db->query($query);
	}
	public function date_wise_dcacompletelist($pd,$wd)
	{
		$pd= date("Y-m-d", strtotime($pd));
		$wd= date("Y-m-d", strtotime($wd));
		$query="SELECT (SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.nameofreporterid) AS nameofreporter,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.primaryinvestigationbyid) AS primaryinvestigationbyname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.accusedid) AS accusedname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.victimid) AS victimname,
		(SELECT ename FROM user WHERE user.userid=diciplinary_action_insert.inqoff) AS inqoffname,
		dcaid,dadate,factoryid,nameofreporterid,primaryinvestigationbyid,pidate,accusedid,victimid,abusedforneg,doinfachoddate,actiondate,accrdate,vicrdate,inqoff,letoinqoffdate,inqdate,letoacudate,inqredate,inqcom,dfacheadcomments,dcatype,apme,disposal,doacde,remarks,actiontypedocu,disposaldocu,dcastatus
		FROM diciplinary_action_insert 
		JOIN dfacheadcomments_insert ON dfacheadcomments_insert.dfacheadcommentsid=diciplinary_action_insert.dflid
		JOIN dcatype ON dcatype.dcatypeid=diciplinary_action_insert.dcatypeid
		
		WHERE dadate BETWEEN ('$pd' AND '$wd') AND dcastatus='0'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function opener_insert($factoryid,$openerid)
	{
		
		$sql="INSERT INTO opener VALUES ('$openerid','$factoryid')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function opener_list()
	{
		$query="SELECT * FROM opener
		JOIN user ON user.userid=opener.openerid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function fpr_insert($factoryid,$fprid)
	{
		
		$sql="INSERT INTO fpr VALUES ('$fprid','$factoryid')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function fpr_list()
	{
		$query="SELECT * FROM fpr
		JOIN user ON user.userid=fpr.fprid
		WHERE ustatus='1'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function grading_insert($grading)
	{
		$sql="INSERT INTO grading VALUES ('','$grading')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function grading_list()
	{
		$query="SELECT * FROM grading";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function boxno_insert($factoryid,$boxno)
	{
		$sql="INSERT INTO boxno_insert VALUES ('','$factoryid','$boxno')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function boxopen_insert($factoryid,$box,$sno,$odate,$ndate)
	{
		$odate = date("Y-m-d", strtotime($odate));
		$ndate = date("Y-m-d", strtotime($ndate));
		$sq="UPDATE boxopen_insert SET bostatus='0' WHERE factoryid='$factoryid' AND biid='$box'";
		$quer=$this->db->query($sq);
		$sql="INSERT INTO boxopen_insert VALUES ('','$factoryid','$box','$sno','$odate','$ndate','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function boxno_list()
	{
		$query="SELECT * FROM boxno_insert ORDER BY factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function boxopen_list()
	{
		$query="SELECT boxopen_insert.factoryid,boxno,sno,odate,ndate 
		FROM boxopen_insert 
		JOIN boxno_insert ON boxno_insert.biid=boxopen_insert.biid
		WHERE bostatus='1' ORDER BY factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function suggession_insert($sudate,$userid,$factoryid,$openerid1,$openerid2,$openerid3,$openerid4,$box,$location,$nameby,$details,$pic_file)
	{
		date_default_timezone_set('Asia/Dhaka');
		$sudate = date("Y-m-d", strtotime($sudate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$suid=$d.$t;
		$sql="INSERT INTO suggession VALUES ('$suid','$sudate','$userid','$factoryid','$openerid1','$openerid2','$openerid3','$openerid4','$box','$location','$nameby','$details','$pic_file','','','','','','','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function supending_list_all()
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=suggession.openerid1) AS opener1,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid2) AS opener2,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid3) AS opener3,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid4) AS opener4,
		(SELECT ename FROM user WHERE user.userid=suggession.fprid) AS fpr,
		suid,sudate,factoryid,openerid1,openerid2,openerid3,openerid4,box,location,nameby,details,pic_file,sustatus,grading,suggession.graid,fprid
		FROM suggession 
		LEFT JOIN grading ON
		grading.graid=suggession.graid
		
		WHERE sustatus IN('1','2') ORDER BY factoryid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function supending_list($userid,$factoryid)
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=suggession.openerid1) AS opener1,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid2) AS opener2,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid3) AS opener3,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid4) AS opener4,
		(SELECT ename FROM user WHERE user.userid=suggession.fprid) AS fpr,
		suid,sudate,factoryid,openerid1,openerid2,openerid3,openerid4,box,location,nameby,details,pic_file,sustatus,grading,suggession.graid,fprid
		FROM suggession 
		LEFT JOIN grading ON
		grading.graid=suggession.graid
		
		WHERE (sustatus='1' OR sustatus='2') AND factoryid='$factoryid' AND fprid='$userid'
		GROUP BY suid ORDER BY factoryid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function suggession_inquiry($suid)
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=suggession.openerid1) AS opener1,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid2) AS opener2,
		
		suid,sudate,factoryid,openerid1,openerid2,box,location,nameby,details,pic_file,sustatus
		FROM suggession
		
		WHERE suid='$suid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function suggession_inquiry_insert($suid,$corrective,$graid,$fprid,$inqday)
	{
		$query="SELECT sudate FROM suggession WHERE suid='$suid'";
		$result=$this->db->query($query);
		$row=$result->result_array();
		foreach($row as $val)
		{
			$sudate=$val['sudate'];
		}
		$targetdate=date('Y-m-d', strtotime('+'. $inqday .'day', strtotime($sudate)));
		$query="UPDATE suggession SET corrective='$corrective',graid='$graid',fprid='$fprid',targetdate='$targetdate',sustatus='2'
		
		WHERE suid='$suid'";
		return $result=$this->db->query($query);
	}
	public function suggession_after_inquiry($suid)
	{
		$query="SELECT (SELECT ename FROM user WHERE user.userid=suggession.openerid1) AS opener1,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid2) AS opener2,
		(SELECT ename FROM user WHERE user.userid=suggession.fprid) AS fpr,
		suid,sudate,factoryid,openerid1,openerid2,box,location,nameby,details,pic_file,corrective,grading,fprid,targetdate,sustatus
		FROM suggession
		JOIN grading ON grading.graid=suggession.graid
		
		WHERE suid='$suid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function suggession_after_inquiry_insert($suid,$fudate,$remarks)
	{
		$fudate= date("Y-m-d", strtotime($fudate));
		$query="UPDATE suggession SET followupdate='$fudate',remarks='$remarks',sustatus='0'
		
		WHERE suid='$suid'";
		return $result=$this->db->query($query);
	}
	public function date_wise_sucompletelist_all($factoryid,$pd,$wd)
	{
		$pd= date("Y-m-d", strtotime($pd));
		$wd= date("Y-m-d", strtotime($wd));
		$query="SELECT (SELECT ename FROM user WHERE user.userid=suggession.openerid1) AS opener1,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid2) AS opener2,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid3) AS opener3,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid4) AS opener4,
		(SELECT ename FROM user WHERE user.userid=suggession.fprid) AS fpr,
		suid,sudate,factory.factoryid,openerid1,openerid2,openerid3,openerid4,box,location,nameby,details,pic_file,corrective,grading,suggession.graid,fprid,targetdate,followupdate,remarks,sustatus,factoryname
		FROM suggession
		JOIN grading ON grading.graid=suggession.graid
		JOIN factory ON factory.factoryid=suggession.factoryid
		
		WHERE factory.factoryid='$factoryid' AND (sudate BETWEEN '$pd' AND '$wd') AND sustatus='0'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_sucompletelist($factoryid,$pd,$wd)
	{
		$pd= date("Y-m-d", strtotime($pd));
		$wd= date("Y-m-d", strtotime($wd));
		$query="SELECT (SELECT ename FROM user WHERE user.userid=suggession.openerid1) AS opener1,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid2) AS opener2,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid3) AS opener3,
		(SELECT ename FROM user WHERE user.userid=suggession.openerid4) AS opener4,
		(SELECT ename FROM user WHERE user.userid=suggession.fprid) AS fpr,
		suid,sudate,factory.factoryid,openerid1,openerid2,openerid3,openerid4,box,location,nameby,details,pic_file,corrective,grading,suggession.graid,fprid,targetdate,followupdate,remarks,sustatus,factoryname
		FROM suggession
		JOIN grading ON grading.graid=suggession.graid
		JOIN factory ON factory.factoryid=suggession.factoryid
		
		WHERE factory.factoryid='$factoryid' AND (sudate BETWEEN '$pd' AND '$wd') AND sustatus='0'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_susummarylist($pd,$wd)
	{
		$pd= date("Y-m-d", strtotime($pd));
		$wd= date("Y-m-d", strtotime($wd));
		$query="SELECT factoryid,
		SUM(CASE WHEN sustatus = 1 THEN 1 ELSE 0 END) as waiting,
		SUM(CASE WHEN sustatus = 2 THEN 1 ELSE 0 END) as running,
		SUM(CASE WHEN sustatus = 0 THEN 1 ELSE 0 END) as completed 
		FROM suggession
		
		
		WHERE sudate BETWEEN '$pd' AND '$wd'
		GROUP BY factoryid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	/*********************************************************INDUSTRIAL RELATION*********************************************/
	
	public function specialemp_insert($userid,$factory,$name,$section,$designation,$peradd,$preadd,$mobile,$nid,$pic_file)
	{
		$sql="INSERT INTO specialemp VALUES ('','$userid','$factory','$name','$section','$designation','$peradd','$preadd','$mobile','$nid','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function specialemp_list()
	{
		
		$query="SELECT * FROM specialemp";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function watchlistemp_insert($userid,$factory,$name,$section,$designation,$peradd,$preadd,$mobile,$nid,$pic_file)
	{
		$sql="INSERT INTO watchlistemp VALUES ('','$userid','$factory','$name','$section','$designation','$peradd','$preadd','$mobile','$nid','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function watchlistemp_list()
	{
		$query="SELECT * FROM watchlistemp";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addcasetype_insert($casetype)
	{
		$sql="SELECT * FROM casetype WHERE casetype='$casetype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO casetype VALUES ('','$casetype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function casetype_list()
	{
		$query="SELECT * FROM casetype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addcaseexpensearea_insert($caseexpensearea)
	{
		$sql="SELECT * FROM caseexpensearea WHERE caseexpensearea='$caseexpensearea'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO caseexpensearea VALUES ('','$caseexpensearea')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function caseexpensearea_list()
	{
		$query="SELECT * FROM caseexpensearea";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function caseexpense_insert($data)
	{
		$data['cdate'] = date("Y-m-d", strtotime($data['cdate']));
		$sql="INSERT INTO caseexpense_insert VALUES ('','$data[caseid]','$data[cdate]','$data[ce]','$data[qty]')";
		$query=$this->db->query($sql);
		return $query;
    }
	public function addcase_insert($idate,$factoryid,$opponent,$lawyer,$casedetails,$courtname,$casetypeid,$casenumber,$amount,$adate)
	{
		$idate = date("Y-m-d", strtotime($idate));
		$adate = date("Y-m-d", strtotime($adate));
		$sql="INSERT INTO case_insert VALUES ('','$idate','$factoryid','$opponent','$lawyer','$casedetails','$courtname','$casetypeid','$casenumber','$amount','$adate','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function case_list()
	{
		$query="SELECT case_insert.caseid,idate,factoryid,opponent,lawyer,casedetails,courtname,casetype,casenumber,camount,adate,hfdate,cstatus FROM case_insert 
		LEFT JOIN casetype ON casetype.casetypeid=case_insert.casetypeid
		LEFT JOIN hearing_date_case_file_view ON hearing_date_case_file_view.caseid=case_insert.caseid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function case_details($caseid)
	{
		$query="SELECT case_insert.caseid,idate,factoryid,opponent,lawyer,casedetails,courtname,casetype,casenumber,camount,adate,cstatus,adffile FROM case_insert 
		LEFT JOIN casetype ON casetype.casetypeid=case_insert.casetypeid
		LEFT JOIN admission_date_case_file ON admission_date_case_file.caseid=case_insert.caseid
		WHERE case_insert.caseid='$caseid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function case_details1($caseid)
	{
		$query="SELECT case_insert.caseid,idate,factoryid,opponent,lawyer,casedetails,courtname,casetype,casenumber,camount,hfdate,cstatus,hfile FROM case_insert 
		LEFT JOIN casetype ON casetype.casetypeid=case_insert.casetypeid
		LEFT JOIN hearing_date_case_file ON hearing_date_case_file.caseid=case_insert.caseid
		WHERE case_insert.caseid='$caseid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function case_expense($caseid)
	{
		$query="SELECT case_insert.caseid,cdate,caseexpensearea,qty FROM case_insert 
		LEFT JOIN caseexpense_insert ON caseexpense_insert.caseid=case_insert.caseid
		LEFT JOIN caseexpensearea ON caseexpense_insert.ce=caseexpensearea.ceid
		WHERE case_insert.caseid='$caseid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function caseexpense_list()
	{
		$query="SELECT casenumber,camount,SUM(qty) AS qty FROM case_insert 
		LEFT JOIN caseexpense_insert ON caseexpense_insert.caseid=case_insert.caseid
		LEFT JOIN caseexpensearea ON caseexpense_insert.ce=caseexpensearea.ceid
		ORDER BY qty DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function case_list_up($caseid)
	{
		$query="SELECT case_insert.caseid,idate,factoryid,opponent,lawyer,casedetails,courtname,casetype,case_insert.casetypeid,casenumber,camount,hfdate,adate,cstatus FROM case_insert 
		LEFT JOIN casetype ON casetype.casetypeid=case_insert.casetypeid
		LEFT JOIN hearing_date_case_file_view ON hearing_date_case_file_view.caseid=case_insert.caseid
		WHERE case_insert.caseid='$caseid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function caselup($idate,$factoryid,$opponent,$lawyer,$casedetails,$courtname,$casetypeid,$casenumber,$amount,$adate,$cstatus,$caseid)
	{
		$idate = date("Y-m-d", strtotime($idate));
		$adate = date("Y-m-d", strtotime($adate));
		$sql="UPDATE case_insert SET idate='$idate',factoryid='$factoryid',opponent='$opponent',lawyer='$lawyer',casedetails='$casedetails',courtname='$courtname',casetypeid='$casetypeid',casenumber='$casenumber',camount='$amount',adate='$adate',cstatus='$cstatus' WHERE caseid='$caseid'";
		$query=$this->db->query($sql);
	}
	public function admission_date_case_file_insert($caseid,$idate,$pic_file)
	{
		$idate = date("Y-m-d", strtotime($idate));
		
		$sql="INSERT INTO admission_date_case_file VALUES ('','$caseid','$idate','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function case_admission_date_list($caseid)
	{
		$query="SELECT * FROM admission_date_case_file 
		JOIN case_insert ON case_insert.caseid=admission_date_case_file.caseid 
		WHERE case_insert.caseid='$caseid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function case_hearing_date_list($caseid)
	{
		$query="SELECT * FROM hearing_date_case_file 
		JOIN case_insert ON case_insert.caseid=hearing_date_case_file.caseid 
		WHERE case_insert.caseid='$caseid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function hearing_date_case_file_insert($caseid,$idate,$pic_file)
	{
		$idate = date("Y-m-d", strtotime($idate));
		$sq="UPDATE hearing_date_case_file SET hstatus='0' WHERE caseid='$caseid' AND hstatus='1'";
		$quer=$this->db->query($sq);
		$sql="INSERT INTO hearing_date_case_file VALUES ('','$caseid','$idate','$pic_file','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function csr_list()
	{
		$query="SELECT * FROM csr_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addcsr_insert($sdate,$csr,$csrdetails)
	{
		$sdate = date("Y-m-d", strtotime($sdate));
		$sql="INSERT INTO csr_insert VALUES ('','$sdate','$csr','$csrdetails')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function csrimage_insert($csrid,$sdate,$pic_file)
	{
		$sdate = date("Y-m-d", strtotime($sdate));
		$sql="INSERT INTO csrimage_insert VALUES ('','$csrid','$sdate','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function csrcomments_insert($csrid,$sdate,$csrcomments)
	{
		$sdate = date("Y-m-d", strtotime($sdate));
		$sql="INSERT INTO csrcomments_insert VALUES ('','$csrid','$sdate','$csrcomments')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function csr_short_list()
	{
		$query="SELECT * FROM csr_insert 
		LEFT JOIN csrimage_insert ON csrimage_insert.csrid=csr_insert.csrid 
		GROUP BY csr_insert.csrid ORDER BY  STR_TO_DATE(sdate,'%Y-%m-%d') DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function csr_details_list($csrid)
	{
		$query="SELECT * FROM csr_insert 
		JOIN csrimage_insert ON csrimage_insert.csrid=csr_insert.csrid
		JOIN csrcomments_insert ON csrcomments_insert.csrid=csr_insert.csrid 
		WHERE csr_insert.csrid='$csrid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function csr_details_list1($csrid)
	{
		$query="SELECT * FROM csr_insert WHERE csrid='$csrid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function csr_details_list2($csrid)
	{
		$query="SELECT * FROM csrimage_insert WHERE csrid='$csrid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function csr_details_list3($csrid)
	{
		$query="SELECT * FROM csrcomments_insert WHERE csrid='$csrid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addbuddy_insert($userid,$buddyid,$duration)
	{
		//$sdate = date("Y-m-d", strtotime($sdate));
		$query1="SELECT doj FROM user WHERE userid='$userid'";
		$result1=$this->db->query($query1);
		$r=$result1->result_array();
		foreach($r as $row)
		{
			$doj=$row['doj'];
		}
		if($doj!='')
		{
		$doj1 = strtotime("+".$duration." days", strtotime($doj));
		$doj1 = date("Y-m-d", $doj1);
		$sql="INSERT INTO buddy_insert VALUES ('','$userid','$buddyid','$duration','$doj1')";
		$query=$this->db->query($sql);
		return $query;
		}
		else
		{
			return false;
		}
	}
	public function date_wise_buddy_report($pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT (SELECT ename FROM user WHERE user.userid=buddy_insert.userid) AS muser,buddy_insert.userid,
		(SELECT ename FROM user WHERE user.userid=buddy_insert.buserid) AS buser,buddy_insert.buserid,
		(SELECT doj FROM user WHERE user.userid=buddy_insert.userid) AS buserdoj,bedate,duration
		
		FROM user 
		JOIN buddy_insert ON
		buddy_insert.userid=user.userid
		
		WHERE bedate BETWEEN '$pd' AND '$wd' ORDER BY buddy_insert.buserid,bedate ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidsource_insert($aidsource)
	{
		$sql="SELECT * FROM aidsource_insert WHERE aidsource='$aidsource'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
			$sql="INSERT INTO aidsource_insert VALUES ('','$aidsource')";
			$query=$this->db->query($sql);
			return $query;
		}
	}
	public function aidsource_list()
	{
		$query="SELECT * FROM aidsource_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidtype_insert($aidtype)
	{
		$sql="SELECT * FROM aidtype_insert WHERE aidtype='$aidtype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO aidtype_insert VALUES ('','$aidtype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function aidtype_list()
	{
		$query="SELECT * FROM aidtype_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidcategory_insert($aidcategory)
	{
		$sql="SELECT * FROM aidcategory_insert WHERE aidcategory='$aidcategory'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
			$sql="INSERT INTO aidcategory_insert VALUES ('','$aidcategory')";
			$query=$this->db->query($sql);
			return $query;
		}
	}
	public function aidcategory_list()
	{
		$query="SELECT * FROM aidcategory_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addaid_insert($adate,$atype,$acategory,$asource,$auid,$afid,$afor,$amount)
	{
		date_default_timezone_set('Asia/Dhaka');
		$adate = date("Y-m-d", strtotime($adate));
		$year = date('Y', strtotime($adate));
		$month = date('F', strtotime($adate));
		$sql="INSERT INTO addaid_insert VALUES ('','$adate','$atype','$acategory','$asource','$auid','$afid','$afor','$amount','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function aid_list()
	{
		$query="SELECT amount,amonth,auid,ename,factoryname,afor,aidtype,aidcategory,aidsource,amonth,ayear FROM addaid_insert
				LEFT JOIN aidtype_insert ON aidtype_insert.aidtypeid=addaid_insert.atype
				LEFT JOIN aidcategory_insert ON aidcategory_insert.aidcid=addaid_insert.acategory
				LEFT JOIN aidsource_insert ON aidsource_insert.aidsid=addaid_insert.asource
				LEFT JOIN user ON user.userid=addaid_insert.auid
				LEFT JOIN factory ON factory.factoryid=addaid_insert.afid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidm_list()
	{
		$query="SELECT DISTINCT(amonth) AS amonth FROM addaid_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidy_list()
	{
		$query="SELECT DISTINCT(ayear) AS ayear FROM addaid_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidmtype_list($yr,$atype)
	{
		$query="SELECT SUM(amount) AS amount,amonth,auid,ename,factoryname,afor,aidtype,aidcategory,aidsource,amonth,ayear FROM addaid_insert
				LEFT JOIN aidtype_insert ON aidtype_insert.aidtypeid=addaid_insert.atype
				LEFT JOIN aidcategory_insert ON aidcategory_insert.aidcid=addaid_insert.acategory
				LEFT JOIN aidsource_insert ON aidsource_insert.aidsid=addaid_insert.asource
				LEFT JOIN user ON user.userid=addaid_insert.auid
				LEFT JOIN factory ON factory.factoryid=addaid_insert.afid
		 		WHERE atype='$atype' AND ayear='$yr' GROUP BY auid,atype,asource,acategory,amonth,ayear ORDER BY amonth ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidmcategory_list($yr,$acategory)
	{
		
		$query="SELECT SUM(amount) AS amount,amonth,auid,ename,factoryname,afor,aidtype,aidcategory,aidsource,amonth,ayear FROM addaid_insert
				LEFT JOIN aidtype_insert ON aidtype_insert.aidtypeid=addaid_insert.atype
				LEFT JOIN aidcategory_insert ON aidcategory_insert.aidcid=addaid_insert.acategory
				LEFT JOIN aidsource_insert ON aidsource_insert.aidsid=addaid_insert.asource
				LEFT JOIN user ON user.userid=addaid_insert.auid
				LEFT JOIN factory ON factory.factoryid=addaid_insert.afid
		 		WHERE ayear='$yr' AND addaid_insert.acategory='$acategory' GROUP BY auid,asource,acategory,amonth,ayear ORDER BY amonth ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function aidmsource_list($mo,$yr)
	{
		
		$query="SELECT SUM(amount) AS amount,amonth,auid,ename,factoryname,afor,aidtype,aidcategory,aidsource,amonth,ayear FROM addaid_insert
				LEFT JOIN aidtype_insert ON aidtype_insert.aidtypeid=addaid_insert.atype
				LEFT JOIN aidcategory_insert ON aidcategory_insert.aidcid=addaid_insert.acategory
				LEFT JOIN aidsource_insert ON aidsource_insert.aidsid=addaid_insert.asource
				LEFT JOIN user ON user.userid=addaid_insert.auid
				LEFT JOIN factory ON factory.factoryid=addaid_insert.afid
		 		WHERE amonth='$mo' AND ayear='$yr' GROUP BY asource,amonth,ayear,auid ORDER BY amonth ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function deathplace_insert($pofd)
	{
		$sql="INSERT INTO deathplace_insert VALUES ('','$pofd')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function deathplace_list()
	{
		$query="SELECT * FROM deathplace_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function deathstatus_insert($pofd)
	{
		$sql="INSERT INTO deathstatus_insert VALUES ('','$pofd')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function deathstatus_list()
	{
		$query="SELECT * FROM deathstatus_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function death_bfots_insert($bfots)
	{
		$sql="INSERT INTO death_bfots_insert VALUES ('','$bfots')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function death_bfots_list()
	{
		$query="SELECT * FROM death_bfots_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function deathclaim_insert($userid,$ddate,$pofd,$cdate,$udate,$fid,$uamount,$odate,$oid,$oamount,$reqdate,$nominee,$gidate,$ds,$pic_file)
	{
		$ddate = date("Y-m-d", strtotime($ddate));
		$cdate = date("Y-m-d", strtotime($cdate));
		$udate = date("Y-m-d", strtotime($udate));
		$odate = date("Y-m-d", strtotime($odate));
		$reqdate = date("Y-m-d", strtotime($reqdate));
		$gidate = date("Y-m-d", strtotime($gidate));
		$querytt="SELECT factoryid FROM user WHERE userid='$userid'";
		$resulttt=$this->db->query($querytt);
		$resulttt=$resulttt->result_array();
		foreach($resulttt as $rowtt)
		{
			$factoryid=$rowtt['factoryid'];
			
		}
		$sql="INSERT INTO deathclaim_insert VALUES ('','$userid','$factoryid','$ddate','$pofd','$cdate','$udate','$fid','$uamount','$odate','$oid','$oamount','$reqdate','$nominee','$gidate','$ds','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function deathclaim_list()
	{
		$query="SELECT * FROM deathclaim_insert
		LEFT JOIN deathplace_insert ON deathplace_insert.dpid=deathclaim_insert.pofd
		LEFT JOIN death_bfots_insert ON death_bfots_insert.dfoid=deathclaim_insert.oid
		LEFT JOIN deathstatus_insert ON deathstatus_insert.dsid=deathclaim_insert.ds
		LEFT JOIN user ON user.userid=deathclaim_insert.duserid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function deathclaim_list_up($dcid)
	{
		$query="SELECT * FROM deathclaim_insert
		LEFT JOIN deathplace_insert ON deathplace_insert.dpid=deathclaim_insert.pofd
		LEFT JOIN death_bfots_insert ON death_bfots_insert.dfoid=deathclaim_insert.oid
		LEFT JOIN deathstatus_insert ON deathstatus_insert.dsid=deathclaim_insert.ds
		WHERE deathclaim_insert.dcid='$dcid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function deathclaimlup($dcid,$ddate,$pofd,$cdate,$udate,$fid,$uamount,$odate,$oid,$oamount,$reqdate,$nominee,$gidate,$ds)
	{
		
		$ddate = date("Y-m-d", strtotime($ddate));
		$cdate = date("Y-m-d", strtotime($cdate));
		$udate = date("Y-m-d", strtotime($udate));
		$odate = date("Y-m-d", strtotime($odate));
		$reqdate = date("Y-m-d", strtotime($reqdate));
		$gidate = date("Y-m-d", strtotime($gidate));
		$sql="UPDATE deathclaim_insert SET ddate='$ddate',pofd='$pofd',cdate='$cdate',udate='$udate',fid='$fid',uamount='$uamount',odate='$odate',oamount='$oamount',reqdate='$reqdate',nominee='$nominee',gidate='$gidate',ds='$ds' WHERE dcid='$dcid'";
		$query=$this->db->query($sql);
	}
	public function deathclaimhm_insert($dcid,$pic_file)
	{
		$sql="INSERT INTO deathclaimhm_insert VALUES ('','$dcid','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function deathclaim_list_details($dcid)
	{
		$query="SELECT * FROM deathclaim_insert
		LEFT JOIN deathplace_insert ON deathplace_insert.dpid=deathclaim_insert.pofd
		LEFT JOIN death_bfots_insert ON death_bfots_insert.dfoid=deathclaim_insert.oid
		LEFT JOIN deathstatus_insert ON deathstatus_insert.dsid=deathclaim_insert.ds
		LEFT JOIN deathclaimhm_insert ON deathclaimhm_insert.ddcid=deathclaim_insert.dcid
		LEFT JOIN user ON user.userid=deathclaim_insert.duserid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
		LEFT JOIN section ON section.secid=user.sectionid
		WHERE deathclaim_insert.dcid='$dcid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	/**********************************************************************PRODUCTION***********************************************/
	
	public function cutting_insert($userid,$factoryid,$cqty,$ctqty,$cdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$cdate = date("Y-m-d", strtotime($cdate));
		//$d=date('Y-m-d');
		$year = date('Y', strtotime($cdate));
		$month = date('F', strtotime($cdate));
		$d=$cdate;
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$cid=$factoryid.$d;
		$sql="SELECT * FROM cutting_qty WHERE cutqid='$cid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO cutting_qty VALUES ('$cid','$userid','$factoryid','$ctqty','$cqty','$cdate','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function sewing_insert($userid,$factoryid,$stqty,$sqty,$sdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$sdate = date("Y-m-d", strtotime($sdate));
		//$d=date('Y-m-d');
		$year = date('Y', strtotime($sdate));
		$month = date('F', strtotime($sdate));
		$d=$sdate;
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$sewid=$factoryid.$d;
		$sql="SELECT * FROM sewing_qty WHERE sewqid='$sewid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO sewing_qty VALUES ('$sewid','$userid','$factoryid','$stqty','$sqty','$sdate','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function finishing_insert($userid,$factoryid,$ftqty,$fqty,$fdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$fdate = date("Y-m-d", strtotime($fdate));
		//$d=date('Y-m-d');
		$year = date('Y', strtotime($fdate));
		$month = date('F', strtotime($fdate));
		$d=$fdate;
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$fid=$factoryid.$d;
		$sql="SELECT * FROM finishing_qty WHERE fiqid='$fid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO finishing_qty VALUES ('$fid','$userid','$factoryid','$ftqty','$fqty','$fdate','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function date_wise_cutting_report($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM cutting_qty 
		
		WHERE factoryid='$factoryid' AND cdate BETWEEN '$pd' AND '$wd' ORDER BY cdate ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_sewing_report($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM sewing_qty 
		
		WHERE factoryid='$factoryid' AND sdate BETWEEN '$pd' AND '$wd' ORDER BY sdate ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_finishing_report($factoryid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM finishing_qty 
		
		WHERE factoryid='$factoryid' AND fdate BETWEEN '$pd' AND '$wd' ORDER BY fdate ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function cutting_prev_report()
	{
		$today = date("Y-m-d");
		$date = new DateTime($today);
    	$date->modify('-1 day');
    	$pred=$date->format('Y-m-d');
		$query="SELECT * FROM cutting_qty WHERE cdate='$pred' GROUP BY factoryid ORDER BY factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function sewing_prev_report()
	{
		$today = date("Y-m-d");
		$date = new DateTime($today);
    	$date->modify('-1 day');
    	$pred=$date->format('Y-m-d');
		$query="SELECT * FROM sewing_qty WHERE sdate='$pred' GROUP BY factoryid ORDER BY factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function finishing_prev_report()
	{
		$today = date("Y-m-d");
		$date = new DateTime($today);
    	$date->modify('-1 day');
    	$pred=$date->format('Y-m-d');
		$query="SELECT * FROM finishing_qty WHERE fdate='$pred' GROUP BY factoryid ORDER BY factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	public function date_wise_allproduction_report($pd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$query="SELECT * FROM csf_production
		 		WHERE cdate='$pd'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
												/*****************************LICENSE*****************************/
	
	
	public function license_susummarylist()
	{
		
		$query="SELECT factoryid,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) <= '0' THEN 1 ELSE 0 END) as expired,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN'1' AND '15' THEN 1 ELSE 0 END) as fiveteendays,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN'16' AND '25' THEN 1 ELSE 0 END) as twentyfivedays,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN'26' AND '35' THEN 1 ELSE 0 END) as thirtyfivedays,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN '36' AND '45' THEN 1 ELSE 0 END) as fourtyfivendays
		FROM license
		GROUP BY factoryid ORDER BY factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function factorywise_license_susummarylist($factoryid)
	{
		
		$query="SELECT factoryid,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) <= '0' THEN 1 ELSE 0 END) as expired,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN'1' AND '15' THEN 1 ELSE 0 END) as fiveteendays,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN'16' AND '25' THEN 1 ELSE 0 END) as twentyfivedays,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN'26' AND '35' THEN 1 ELSE 0 END) as thirtyfivedays,
		SUM(CASE WHEN DATEDIFF(renewaldate,CURDATE()) BETWEEN '36' AND '45' THEN 1 ELSE 0 END) as fourtyfivendays
		FROM license
		WHERE factoryid='$factoryid'
		GROUP BY factoryid ORDER BY factoryid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
								/*****************************VEHICLE************************/
	
	public function vinsurance_insert($insurance,$vehicleno,$caddress,$cost,$idate,$edate,$pic_file)
	{
		
		date_default_timezone_set('Asia/Dhaka');
		$idate = date("Y-m-d", strtotime($idate));
		$edate = date("Y-m-d", strtotime($edate));
		$sq="UPDATE vinsurance_insert SET istatus='0' WHERE vehicleno='$vehicleno' AND istatus='1'";
		$quer=$this->db->query($sq);
		$sql="INSERT INTO vinsurance_insert VALUES ('','$insurance','$vehicleno','$caddress','$cost','$idate','$edate','$pic_file','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function vinsurance_list()
	{
		
		$query="SELECT * FROM vinsurance_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vtaxtoken_insert($taxtoken,$vehicleno,$caddress,$cost,$idate,$edate,$pic_file)
	{
		
		date_default_timezone_set('Asia/Dhaka');
		$idate = date("Y-m-d", strtotime($idate));
		$edate = date("Y-m-d", strtotime($edate));
		$sq="UPDATE vtaxtoken_insert SET tstatus='0' WHERE vehicleno='$vehicleno' AND tstatus='1'";
		$quer=$this->db->query($sq);
		$sql="INSERT INTO vtaxtoken_insert VALUES ('','$taxtoken','$vehicleno','$caddress','$cost','$idate','$edate','$pic_file','1')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function vtaxtoken_list()
	{
		
		$query="SELECT * FROM vtaxtoken_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vfitness_insert($fitness,$vehicleno,$caddress,$cost,$idate,$edate,$pic_file)
	{
		
		date_default_timezone_set('Asia/Dhaka');
		$idate = date("Y-m-d", strtotime($idate));
		$edate = date("Y-m-d", strtotime($edate));
		$sq="UPDATE vfitness_insert SET fstatus='0' WHERE vehicleno='$vehicleno' AND fstatus='1'";
		$quer=$this->db->query($sq);
		$sql="INSERT INTO vfitness_insert VALUES ('','$fitness','$vehicleno','$caddress','$cost','$idate','$edate','$pic_file','1')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function vfitness_list()
	{
		
		$query="SELECT * FROM vfitness_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vfuel_insert($fuel)
	{
		$sql="INSERT INTO vfuel_insert VALUES ('','$fuel')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function vfuel_list()
	{
		
		$query="SELECT * FROM vfuel_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vroute_insert($route)
	{
		$sql="INSERT INTO vroute_insert VALUES ('','$route')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function vroute_list()
	{
		
		$query="SELECT * FROM vroute_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vehicle_insert($brand,$model,$vehichelno,$vtype,$registerno,$regisyr,$color,$cc,$engineno,$chasisno,$tyresize,$wheelsize,$weight,$fuel,$seatno,$price,$oid,$userunit,$factoryid,$rid)
	{
		date_default_timezone_set('Asia/Dhaka');
		$regisyr = date("Y-m-d", strtotime($regisyr));
//		$d=date('Y-m-d');
//		$d=$cdate;
//		$t= date("H:i:s");
//		$d=str_replace("-","",$d);
//		$t=str_replace(":","",$t);
//		$vtid=$d.$t;
		$sql="SELECT * FROM vehicle WHERE vehiclenumber='$vehichelno'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO vehicle VALUES ('','$brand','$model','$vehichelno','$vtype','$registerno','$regisyr','$color','$cc','$engineno','$chasisno','$tyresize','$wheelsize','$weight','$fuel','$seatno','$price','$oid','$userunit','$factoryid','$rid')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function vehicle_type_insert($vtype)
	{
		
		$sql="SELECT * FROM vehicle_type WHERE vtype='$vtype'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO vehicle_type VALUES ('','$vtype')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function vehicle_type_list()
	{
		$query="SELECT * FROM vehicle_type";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vehiclel_list()
	{
		$query="SELECT 
		brand,model,vehiclenumber,vtype,vehicletype,regisnumber,regisyr,color,cc,engineno,chasisno,tyresize,wheelsize,weight,fuel,seatno,price,insurance,fitness,taxtoken,
		(vinsurance_insert_view.company_address) AS ica,(vinsurance_insert_view.cost) AS ic,(vinsurance_insert_view.issudate) AS  iid,(vinsurance_insert_view.expiredate) AS ied,insfile,
		(vtaxtoken_insert_view.company_address) AS tca,(vtaxtoken_insert_view.cost) AS tc,(vtaxtoken_insert_view.issudate) AS tid,(vtaxtoken_insert_view.expiredate) AS ted,taxtfile,
		(vfitness_insert_view.company_address) AS fca,(vfitness_insert_view.cost) AS fc,(vfitness_insert_view.issudate) AS  fid,(vfitness_insert_view.expiredate) AS fed,fitfile
		FROM vehicle
		
		
		LEFT JOIN vinsurance_insert_view ON vinsurance_insert_view.vehicleno=vehicle.vehiclenumber
		LEFT JOIN vtaxtoken_insert_view ON vtaxtoken_insert_view.vehicleno=vehicle.vehiclenumber
		LEFT JOIN vfitness_insert_view ON vfitness_insert_view.vehicleno=vehicle.vehiclenumber
		LEFT JOIN vfuel_insert ON vfuel_insert.vfuid=vehicle.fuelid
		LEFT JOIN vroute_insert ON vroute_insert.vroid=vehicle.userunit
		LEFT JOIN vehicle_type ON vehicle_type.vtypeid=vehicle.vehicletype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vehicle_list()
	{
		$query="SELECT * FROM vehicle
		LEFT JOIN vinsurance_insert_view ON vinsurance_insert_view.vehicleno=vehicle.vehiclenumber
		LEFT JOIN vtaxtoken_insert_view ON vtaxtoken_insert_view.vehicleno=vehicle.vehiclenumber
		LEFT JOIN vfitness_insert_view ON vfitness_insert_view.vehicleno=vehicle.vehiclenumber
		LEFT JOIN vfuel_insert ON vfuel_insert.vfuid=vehicle.fuelid
		LEFT JOIN vroute_insert ON vroute_insert.vroid=vehicle.userunit
		LEFT JOIN vehicle_type ON vehicle_type.vtypeid=vehicle.vehicletype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addvreading_insert($vrn,$msr,$mer,$mdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$mdate = date("Y-m-d", strtotime($mdate));
		$year = date('Y', strtotime($mdate));
		$month = date('F', strtotime($mdate));
		$sql="SELECT * FROM addvreading_insert WHERE vmonth='$month' AND vyear='$year' AND vrn='$vrn'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO addvreading_insert VALUES ('','$vrn','$msr','$mer','$mdate','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function addvfueluse_insert($vrn,$fuel,$vfqty,$mdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$mdate = date("Y-m-d", strtotime($mdate));
		$year = date('Y', strtotime($mdate));
		$month = date('F', strtotime($mdate));
		$sql="INSERT INTO addvfueluse_insert VALUES ('','$vrn','$fuel','$vfqty','$mdate','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function vfuelusem_list()
	{
		$query="SELECT DISTINCT(vmonth) AS vmonth FROM addvreading_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vfuelusey_list()
	{
		$query="SELECT DISTINCT(vyear) AS vyear FROM addvreading_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vreading_list($mo,$yr)
	{
		$query="SELECT * FROM vreading_list_view WHERE vmonth='$mo' AND vyear='$yr'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_vfuse_list($pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM addvfueluse_insert
				LEFT JOIN vfuel_insert ON vfuel_insert.vfuid=addvfueluse_insert.vfuelid
		 		WHERE vfudate BETWEEN '$pd' AND '$wd' ORDER BY afuid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mvmfuse_list($mo,$yr,$fuel)
	{
		
		$query="SELECT * FROM vreading_list_view
				LEFT JOIN vfueluse_total_view ON vfueluse_total_view.vfurn=vreading_list_view.vrn
				LEFT JOIN vfuel_insert ON vfuel_insert.vfuid=vfueluse_total_view.vfuelid
		 		WHERE vmonth='$mo' AND vyear='$yr' AND vfuel_insert.vfuid='$fuel' GROUP BY vrn ORDER BY afuid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mvmt_list($mo,$yr,$vt)
	{
		
		$query="SELECT * FROM vreading_list_view
				LEFT JOIN vfueluse_total_view ON vfueluse_total_view.vfurn=vreading_list_view.vrn
				JOIN vehicle_type ON vehicle_type.vtypeid=vfueluse_total_view.vehicletype
		 		WHERE vmonth='$mo' AND vyear='$yr' AND vehicle_type.vtypeid='$vt' GROUP BY vrn ORDER BY afuid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mvreu_list($mo,$yr,$vt)
	{
		
		$query="SELECT * FROM vreading_list_view
				LEFT JOIN vfueluse_total_view ON vfueluse_total_view.vfurn=vreading_list_view.vrn
		 		WHERE vmonth='$mo' AND vyear='$yr' AND refactoryid='$vt' GROUP BY vrn ORDER BY afuid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mvmreu_list()
	{
		
		$query="SELECT DISTINCT(refactoryid) AS refactoryid FROM vehicle";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vrepair_insert($sdate,$vn,$vrparts,$vramounts)
	{
		date_default_timezone_set('Asia/Dhaka');
		$sdate = date("Y-m-d", strtotime($sdate));
		$year = date('Y', strtotime($sdate));
		$month = date('F', strtotime($sdate));
		$sql="INSERT INTO vrepair_insert VALUES ('','$sdate','$vn','$vrparts','$vramounts','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function vrepair_list()
	{
		$query="SELECT * FROM vrepair_insert ORDER BY rdate DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vservicing_insert($sdate,$vn,$vramounts,$vkr)
	{
		date_default_timezone_set('Asia/Dhaka');
		$sdate = date("Y-m-d", strtotime($sdate));
		$year = date('Y', strtotime($sdate));
		$month = date('F', strtotime($sdate));
		$sql="INSERT INTO vservicing_insert VALUES ('','$sdate','$vn','$vramounts','$vkr','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function vnextservicing_insert($sdate,$vn)
	{
		date_default_timezone_set('Asia/Dhaka');
		$sdate = date("Y-m-d", strtotime($sdate));
		$year = date('Y', strtotime($sdate));
		$month = date('F', strtotime($sdate));
		$sql="INSERT INTO vnextservicing_insert VALUES ('','$sdate','$vn','$month','$year')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function vservicingm_list()
	{
		$query="SELECT DISTINCT(vsmonth) AS vsmonth FROM vservicing_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vservicingy_list()
	{
		$query="SELECT DISTINCT(vsyear) AS vsyear FROM vservicing_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vservicing_list($mo,$yr)
	{
		$query="SELECT vsid,vsedate,vn,SUM(vsamounts) AS vsamounts,SUM(vkr) AS vkr,vsmonth,vsyear FROM vservicing_insert WHERE vsmonth='$mo' AND  vsyear='$yr' GROUP BY vn";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function vnextservicing_list()
	{
		$query="SELECT * FROM vnextservicing_insert ORDER BY vnsdate DESC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
											/***********************IDEA LIST**********************/
	
	public function ideagroup_insert($ideagroup)
	{
		date_default_timezone_set('Asia/Dhaka');
		
		
		$sql="INSERT INTO ideagroup VALUES ('','$ideagroup')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function ideagroup_list()
	{
		
		$query="SELECT * FROM ideagroup";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function idea_insert($userid,$igid,$idea,$pic_file)
	{
		date_default_timezone_set('Asia/Dhaka');
		
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$idid=$d.$t;
		$sql="INSERT INTO idea VALUES ('$idid','$userid','$igid','$idea','$pic_file',CURDATE(),'1')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	public function date_wise_idea_list($pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM idea 
		JOIN user ON user.userid=idea.userid
		LEFT JOIN ideagroup ON ideagroup.igid=idea.igid
		WHERE idate BETWEEN '$pd' AND '$wd' ORDER BY idate ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function od_insert($senddate,$pic_file)
	{
		
		$senddate=date("Y-m-d", strtotime($senddate));
		$sql="SELECT * FROM od WHERE senddate='$senddate'";
		$query=$this->db->query($sql);
		
		if($query->num_rows()==1)
			{
				return false;
			}
		else
			{
		$sql="INSERT INTO od VALUES ('','$pic_file','1','$senddate')";
		$query=$this->db->query($sql);
		return $query;
			}
		
	}
	public function od_list()
	{
		$query="SELECT * FROM od ORDER BY  STR_TO_DATE(senddate,'%Y-%m-%d') ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function od_delete($odid)
	{
		$query="DELETE FROM od WHERE odid='$odid'";
		return $result=$this->db->query($query);
	}
	public function bloodgroup_insert($bloodgroup,$humannature,$besttraits,$worsttraits,$personality)
	{
		$sql="INSERT INTO bloodgroup_insert VALUES ('$bloodgroup','$humannature','$besttraits','$worsttraits','$personality')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function bloodgroup_list()
	{
		$query="SELECT * FROM bloodgroup_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function talentpool_insert($factoryid,$divisionid,$departmentid,$sectionid,$subsectionid,$ename,$parentdesignationid,$childdesignationid,$religion,$maritual,$gender,$salary,$pemail,$pmobile,$fileno,$pic_file)
	{
			
		$sql="INSERT INTO talentpool VALUES ('','$factoryid','$divisionid','$departmentid','$sectionid','$subsectionid','$ename','$parentdesignationid','$childdesignationid','$religion','$maritual','$gender','$salary','$pemail','$pmobile','$fileno','$pic_file','0')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function talentpool_list()
	{
		$query="SELECT * FROM talentpool
		LEFT JOIN factory ON factory.factoryid=talentpool.factoryid
		LEFT JOIN division ON division.divisionid=talentpool.divisionid 
		LEFT JOIN department ON department.deptid=talentpool.departmentid
		LEFT JOIN section ON section.secid=talentpool.sectionid
		LEFT JOIN subsection ON subsection.subsecid=talentpool.subsectionid
		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=talentpool.parentdesignationid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=talentpool.childdesignationid
		LEFT JOIN religion ON religion.religionid=talentpool.religion
		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=talentpool.maritual
		LEFT JOIN gender ON gender.genderid=talentpool.gender
		ORDER BY factory.factoryid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function talentpool_list_up($talentpoolid)
	{
		$query="SELECT talentpoolid,factory.factoryid,division.divisionid,department.deptid,section.secid,subsection.subsecid,
parentdesignation.parentdesignationid,childdesignation.childdesignationid,religion.religionid,
maritualstatus.maritualstatusid,gender.genderid,factoryname,divisionname,departmentname,sectionname,
subsectionname,talentpool.ename,eparentdesignation,echilddesignation,religionname,maritualstatus,
gender.genderid,
gender.gender,salary,talentpool.pemail,talentpool.pmobile,fileno,tstatus
		 FROM talentpool
		LEFT JOIN factory ON factory.factoryid=talentpool.factoryid
		LEFT JOIN division ON division.divisionid=talentpool.divisionid 
		LEFT JOIN department ON department.deptid=talentpool.departmentid
		LEFT JOIN section ON section.secid=talentpool.sectionid
		LEFT JOIN subsection ON subsection.subsecid=talentpool.subsectionid
		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=talentpool.parentdesignationid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=talentpool.childdesignationid
		LEFT JOIN religion ON religion.religionid=talentpool.religion
		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=talentpool.maritual
		LEFT JOIN gender ON gender.genderid=talentpool.gender
		WHERE talentpoolid='$talentpoolid'
		ORDER BY factory.factoryid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function talentpoollup($talentpoolid,$factoryid,$divisionid,$departmentid,$sectionid,$subsectionid,$ename,$parentdesignationid,$childdesignationid,$religion,$maritual,$gender,$salary,$pemail,$pmobile,$fileno,$tstatus)
	{
		$sql="UPDATE talentpool SET factoryid='$factoryid',divisionid='$divisionid',departmentid='$departmentid',sectionid='$sectionid',subsectionid='$subsectionid',ename='$ename',
		parentdesignationid='$parentdesignationid',childdesignationid='$childdesignationid',religion='$religion',maritual='$maritual',gender='$gender',
		salary='$salary',pemail='$pemail',pmobile='$pmobile',fileno='$fileno',tstatus='$tstatus' WHERE talentpoolid='$talentpoolid'";
		return $query=$this->db->query($sql);
	}
	public function information_collect_insert($userid,$box,$name,$mobile,$pfactory,$designation)
	{
			
		$sql="INSERT INTO information_collect VALUES ('','$userid','$box','$name','$mobile','$pfactory','$designation')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function information_collect_list()
	{
		$query="SELECT * FROM information_collect
		LEFT JOIN user ON user.userid=information_collect.userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function information_collect_list_up($incid)
	{
		
		$query="SELECT * FROM information_collect
		LEFT JOIN user ON user.userid=information_collect.userid WHERE incid='$incid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function informationcollectlup($incid,$userid,$box,$name,$mobile,$pfactory,$designation)
	{
		$sql="UPDATE information_collect SET userid='$userid',box='$box',name='$name',mobile='$mobile',pfactory='$pfactory',designation='$designation' WHERE incid='$incid'";
		return $query=$this->db->query($sql);
	}
	public function intern_tracking_insert($factoryid,$name,$did,$sdate,$duration,$msubject,$uni,$mobile,$rdate,$tsdate,$icidate)
	{
		$sdate=date("Y-m-d", strtotime($sdate));
		//$edate=date("Y-m-d", strtotime($edate));
		$rdate=date("Y-m-d", strtotime($rdate));
		$tsdate=date("Y-m-d", strtotime($tsdate));
		$icidate=date("Y-m-d", strtotime($icidate));
			
		$sql="INSERT INTO intern_tracking VALUES ('','$factoryid','$name','$did','$sdate','$duration','$msubject','$uni','$mobile','$rdate',0,'$tsdate','$icidate')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function intern_tracking_list()
	{
		
		$query="SELECT intern_tracking.factoryid,factoryname,name,departmentname,sdate,duration,msubject,uni,mobile,rdate,itid,tsdate,icidate,intern_tracking.status FROM intern_tracking
		LEFT JOIN factory ON factory.factoryid=intern_tracking.factoryid
		LEFT JOIN department ON department.deptid=intern_tracking.deptid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function intern_tracking_list_up($itid)
	{
		
		$query="SELECT intern_tracking.factoryid,factoryname,name,department.deptid,departmentname,sdate,duration,msubject,uni,mobile,rdate,itid,tsdate,icidate,intern_tracking.status FROM intern_tracking
		LEFT JOIN factory ON factory.factoryid=intern_tracking.factoryid
		LEFT JOIN department ON department.deptid=intern_tracking.deptid WHERE itid='$itid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function interntrackinglup($itid,$factoryid,$name,$did,$sdate,$duration,$msubject,$uni,$mobile,$rdate,$tsdate,$icidate)
	{
		$sdate=date("Y-m-d", strtotime($sdate));
		//$edate=date("Y-m-d", strtotime($edate));
		$rdate=date("Y-m-d", strtotime($rdate));
		$tsdate=date("Y-m-d", strtotime($tsdate));
		$icidate=date("Y-m-d", strtotime($icidate));
		$sql="UPDATE intern_tracking SET factoryid='$factoryid',name='$name',deptid='$did',sdate='$sdate',duration='$duration',msubject='$msubject',uni='$uni',mobile='$mobile',rdate='$rdate',tsdate='$tsdate',icidate='$icidate' WHERE itid='$itid'";
		return $query=$this->db->query($sql);
	}
	public function intern_complete($itid)
	{
		$sq="UPDATE intern_tracking SET status='1' WHERE itid='$itid'";
		$quer=$this->db->query($sq);
		return $query;
	}
	public function retirement_tracking_list()
	{
		$query="SELECT user.factoryid,user.userid,factory.factoryname,division.divisionname,(user.divisionid) AS diviid,user.departmentid,department.deptid,department.departmentname,user.sectionid,section.sectionname,user.subsectionid,subsection.subsectionname,user.location,user.ename,user.bname,user.parentdesignationid,user.childdesignationid,user.religion,user.maritual,user.dob,user.doj,user.hdistrict,user.epermanentaddress,user.bpermanentaddress,user.epresentaddress,user.bpresentaddress,user.nid,user.blodgroup,user.gender,user.salary,user.efficiency,user.identification,user.oemail,user.pemail,user.pmobile,user.emobile,user.user_type,user.service_type,user.puserid,user.ruserid,user.password,user.ustatus,usertype.usertypeid,usertype.usertype,servicetype.servicetypeid,servicetype.servicetype,userstatus.userstatusid,userstatus.userstatus,religion.religionid,religion.religionname,maritualstatus.maritualstatusid,maritualstatus.maritualstatus,gender.genderid,gender.gender,user.password,parentdesignation.eparentdesignation,parentdesignation.parentdesignationid,parentdesignation.bparentdesignation,childdesignation.childdesignationid,childdesignation.echilddesignation,childdesignation.bchilddesignation,user.pperiod,worktype,user.pperiod_status,user.image,DATEDIFF(CURDATE(),doj) AS remaining  FROM user
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN division ON division.divisionid=user.divisionid 
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN section ON section.secid=user.sectionid
		LEFT JOIN subsection ON subsection.subsecid=user.subsectionid
		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=user.parentdesignationid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
		LEFT JOIN religion ON religion.religionid=user.religion
		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=user.maritual
		LEFT JOIN gender ON gender.genderid=user.gender
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type 
		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
		LEFT JOIN worktype ON worktype.wtid=user.work_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE DATEDIFF(CURDATE(),doj) >= 9720 AND ustatus!='2'
		ORDER BY user.userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function contractperiod_list()
	{
		$query="SELECT DATEDIFF(indate,CURDATE()) AS remaining,user.factoryid,userid,ename,departmentname,echilddesignation,doj,commitment,indate FROM user
				LEFT JOIN department ON department.deptid=user.departmentid
				LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
				LEFT JOIN worktype ON worktype.wtid=user.work_type 
				WHERE work_type='2'  AND service_type!='3' AND ustatus='1'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addcvcategory_insert($cvcategory)
	{
		$sql="INSERT INTO addcvcategory_insert VALUES ('','$cvcategory')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function cvcategory_list()
	{
		$query="SELECT * FROM addcvcategory_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function addcvinfo_insert($userid,$box,$name,$mobile,$pfactory,$department,$designation,$ccid,$pic_file)
	{
		$sql="INSERT INTO addcvinfo_insert VALUES ('','$userid','$box','$name','$mobile','$pfactory','$department','$designation','$ccid','$pic_file','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	
	public function categorycvinfo_list1()
	{
		$query="SELECT COUNT(addcvinfo_insert.ccid) AS cccid,addcvcategory_insert.ccid,ccname 
		FROM addcvinfo_insert
		RIGHT JOIN addcvcategory_insert ON addcvcategory_insert.ccid=addcvinfo_insert.ccid
		WHERE addcvcategory_insert.ccid IN('1','2','3','4','5','6','7','8','9','10')
		GROUP BY addcvcategory_insert.ccid ORDER BY ccname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function categorycvinfo_list2()
	{
		$query="SELECT COUNT(addcvinfo_insert.ccid) AS cccid,addcvcategory_insert.ccid,ccname 
		FROM addcvinfo_insert
		RIGHT JOIN addcvcategory_insert ON addcvcategory_insert.ccid=addcvinfo_insert.ccid
		WHERE addcvcategory_insert.ccid IN('11','12','13','14','15','16','17','18','19','20')
		GROUP BY addcvcategory_insert.ccid ORDER BY ccname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function categorycvinfo_list3()
	{
		$query="SELECT COUNT(addcvinfo_insert.ccid) AS cccid,addcvcategory_insert.ccid,ccname 
		FROM addcvinfo_insert
		RIGHT JOIN addcvcategory_insert ON addcvcategory_insert.ccid=addcvinfo_insert.ccid
		WHERE addcvcategory_insert.ccid IN('21','22','23','24','25','26','27','28','29','30')
		GROUP BY addcvcategory_insert.ccid ORDER BY ccname ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function cvinfo_list($ccid)
	{
		$query="SELECT * FROM addcvinfo_insert
		JOIN addcvcategory_insert ON addcvcategory_insert.ccid=addcvinfo_insert.ccid
		LEFT JOIN user ON user.userid=addcvinfo_insert.userid
		WHERE addcvinfo_insert.ccid='$ccid' AND cstatus IN(1,2)";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function cvlist_list_up($cid)
	{
		$query="SELECT * FROM addcvinfo_insert
		JOIN addcvcategory_insert ON addcvcategory_insert.ccid=addcvinfo_insert.ccid
		LEFT JOIN user ON user.userid=addcvinfo_insert.userid
		WHERE addcvinfo_insert.cid='$cid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function cvinfolup($userid,$box,$name,$mobile,$pfactory,$department,$designation,$ccid,$cstatus,$cid)
	{
		
		$sql="UPDATE addcvinfo_insert SET userid='$userid',box='$box',name='$name',mobile='$mobile',pfactory='$pfactory',department='$department',designation='$designation',ccid='$ccid',cstatus='$cstatus' WHERE cid='$cid'";
		return $query=$this->db->query($sql);
	}
	public function cvfilelup($cid,$pic_file)
	{
		$sql="UPDATE addcvinfo_insert SET cv='$pic_file' WHERE cid='$cid'";
		return $query=$this->db->query($sql);
	}
/////////////////////////////////////////////////////////////////////////INCENTIVE////////////////////////////////////////////////////////

	public function region_insert($regionname)
	{
		$sql="SELECT * FROM region WHERE regionname='$regionname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO region VALUES ('','$regionname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function region_list()
	{
		$query="SELECT * FROM region";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function region_list_up($regionid)
	{
		$sql1="SELECT * FROM region WHERE regionid='$regionid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function regionlup($regionid,$regionname)
	{
		
		$sql="UPDATE region SET regionname='$regionname' WHERE regionid='$regionid'";
		$query=$this->db->query($sql);
	}
	public function area_insert($regionname,$areaname)
	{
		$sql="SELECT * FROM area WHERE regionid='$regionname' AND areaname='$areaname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO area VALUES ('','$regionname','$areaname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function area_list()
	{
		$query="SELECT * FROM area
		JOIN region ON region.regionid=area.regionid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function area_list_up($areaid)
	{
		$sql1="SELECT * FROM area
		JOIN region ON region.regionid=area.regionid WHERE areaid='$areaid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function arealup($areaid,$areaname)
	{
		
		$sql="UPDATE area SET areaname='$areaname' WHERE areaid='$areaid'";
		$query=$this->db->query($sql);
	}
	public function territory_insert($regionname,$areaname,$territoryname)
	{
		$sql="SELECT * FROM territory WHERE regionid='$regionname' AND areaid='$areaname' AND territoryname='$territoryname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO territory VALUES ('','$regionname','$areaname','$territoryname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function territory_list()
	{
		$query="SELECT * FROM territory
		JOIN region ON region.regionid=territory.regionid
		JOIN area ON area.areaid=territory.areaid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function territory_list_up($territoryid)
	{
		$query="SELECT * FROM territory
		JOIN region ON region.regionid=territory.regionid
		JOIN area ON area.areaid=territory.areaid
		WHERE territoryid='$territoryid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function territorylup($territoryid,$territoryname)
	{
		
		$sql="UPDATE territory SET territoryname='$territoryname' WHERE territoryid='$territoryid'";
		$query=$this->db->query($sql);
	}
	public function position_insert($positionname)
	{
		$sql="SELECT * FROM position WHERE positionname='$positionname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO position VALUES ('','$positionname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function position_list()
	{
		$query="SELECT * FROM position";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function position_list_up($positionid)
	{
		$query="SELECT * FROM position
		WHERE positionid='$positionid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function positionlup($positionid,$positionname)
	{
		
		$sql="UPDATE position SET positionname='$positionname' WHERE positionid='$positionid'";
		$query=$this->db->query($sql);
	}
	public function baslagriwl_list()
	{
		$query="SELECT * FROM baslagriwl";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	
	
	public function baslagriuser_insert($userid,$regionid,$areaid,$teritorryid,$positionid,$baslagriwlid)
	{
		$sql="SELECT * FROM baslagriuser WHERE userid='$userid' AND regionid='$regionid' AND areaid='$areaid' AND territoryid='$teritorryid'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
			if($baslagriwlid==1)
				{
					$sql="INSERT INTO baslagriuser VALUES ('','$userid','$regionid','','','$positionid','$baslagriwlid')";
					$query=$this->db->query($sql);
					return $query;
				}
			if($baslagriwlid==2)
				{
					$sql="INSERT INTO baslagriuser VALUES ('','$userid','$regionid','$areaid','','$positionid','$baslagriwlid')";
					$query=$this->db->query($sql);
					return $query;
				}
			if($baslagriwlid==3)
				{
					$sql="INSERT INTO baslagriuser VALUES ('','$userid','$regionid','$areaid','$teritorryid','$positionid','$baslagriwlid')";
					$query=$this->db->query($sql);
					return $query;
				}
		}
	}
	public function baslagriuser_list()
	{
		$query="SELECT * FROM baslagriuser
		LEFT JOIN region ON region.regionid=baslagriuser.regionid
		LEFT JOIN area ON area.areaid=baslagriuser.areaid
		LEFT JOIN territory ON territory.territoryid=baslagriuser.territoryid AND
				territory.areaid=baslagriuser.areaid AND
				territory.regionid=baslagriuser.regionid
		LEFT JOIN position ON position.positionid=baslagriuser.positionid
		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
		LEFT JOIN user ON user.userid=baslagriuser.userid
		ORDER BY baslagriwl.baslagriwlid ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function baslagriuser_list_up($ratuid)
	{
		$query="SELECT * FROM baslagriuser
		LEFT JOIN region ON region.regionid=baslagriuser.regionid
		LEFT JOIN area ON area.areaid=baslagriuser.areaid
		LEFT JOIN territory ON territory.territoryid=baslagriuser.territoryid AND
				territory.areaid=baslagriuser.areaid AND
				territory.regionid=baslagriuser.regionid
		LEFT JOIN position ON position.positionid=baslagriuser.positionid
		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
		LEFT JOIN user ON user.userid=baslagriuser.userid
		WHERE ratuid='$ratuid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function baslagriuserlup($userid,$regionid,$areaid,$territoryid,$positionid,$baslagriwlid)
	{
		if($baslagriwlid==1)
		{
		$sql="UPDATE baslagriuser SET regionid='$regionid',areaid='',territoryid='',positionid='$positionid',baslagriwlid='$baslagriwlid' WHERE userid='$userid'";
		$query=$this->db->query($sql);
		}
		if($baslagriwlid==2)
		{
		$sql="UPDATE baslagriuser SET regionid='$regionid',areaid='$areaid',territoryid='',positionid='$positionid',baslagriwlid='$baslagriwlid' WHERE userid='$userid'";
		$query=$this->db->query($sql);
		}
		if($baslagriwlid==3)
		{
		$sql="UPDATE baslagriuser SET regionid='$regionid',areaid='$areaid',territoryid='$territoryid',positionid='$positionid',baslagriwlid='$baslagriwlid' WHERE userid='$userid'";
		$query=$this->db->query($sql);
		}
	}
	public function baslagriproduct_list()
	{
		return $this->db->get("menus")->result_array();
	}
	public function baslagriproduct_list1()
	{
		$query="SELECT * FROM menus WHERE parent!=''";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function baslagriproduct_insert($pid,$iname,$onumber)
	{
		//$sql="SELECT * FROM position WHERE positionname='$positionname'";
//		$query=$this->db->query($sql);
//		if($query->num_rows()==1)
//		{
//			return false;
//		}
//		else
//		{
	    if($pid=='')
		{
		$sql="INSERT INTO menus VALUES ('',NULL, '$iname', '', '$iname', '$onumber')";
		$query=$this->db->query($sql);
		return $query;
		}
		else
		{
		$sql="INSERT INTO menus VALUES ('','$pid', '$iname', '', '$iname', '$onumber')";
		$query=$this->db->query($sql);
		return $query;
		}
		//}
	}
	public function baslagrisctarget_insert($sdate,$productid,$territoryid,$ta,$cta)
	{
		date_default_timezone_set('Asia/Dhaka');
		
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		//$stid=$d.$t;
		$stid=$d.$productid.$territoryid;
		$year = date('Y', strtotime($sdate));
		$month = date('F', strtotime($sdate));
		$sdate=date("Y-m-d", strtotime($sdate));
		
		//$edate=date("Y-m-d", strtotime($edate));
		//$sql="SELECT * FROM baslagrisalestarget WHERE positionname='$positionname'";
//		$query=$this->db->query($sql);
//		if($query->num_rows()==1)
//		{
//			return false;
//		}
//		else
//		{
	    	$sql="INSERT INTO baslagrisctarget VALUES ('$stid','$productid','$territoryid','$ta','$cta','$sdate','$month','$year')";
			$query=$this->db->query($sql);
			return $query;
		//}
	}
	public function baslagriac_insert($sdate,$productid,$territoryid,$sa,$ca)
	{
		error_reporting(0);
		date_default_timezone_set('Asia/Dhaka');
		
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		//$stid=$d.$t;
		$stid=$d.$productid.$territoryid;
		$year = date('Y', strtotime($sdate));
		$month = date('F', strtotime($sdate));
		$sdate=date("Y-m-d", strtotime($sdate));
		//$edate=date("Y-m-d", strtotime($edate));
		//$sql="SELECT * FROM baslagrisalestarget WHERE positionname='$positionname'";
//		$query=$this->db->query($sql);
//		if($query->num_rows()==1)
//		{
//			return false;
//		}
//		else
//		{
		$querytt="SELECT * FROM baslagrisctarget WHERE productid='$productid' AND territoryid='$territoryid' AND tmonth='$month' AND tyear='$year'";
		$resulttt=$this->db->query($querytt);
		$resulttt=$resulttt->result_array();
		foreach($resulttt as $rowtt)
		{
			$baslagrisctt=$rowtt['baslagrisctt'];
			$tmonth=$rowtt['tmonth'];
			$tyear=$rowtt['tyear'];
			
		}
		$queryu="SELECT * FROM baslagriuser WHERE territoryid='$territoryid'";
		$resultu=$this->db->query($queryu);
		$resultu=$resultu->result_array();
		foreach($resultu as $row)
		{
			$regionid=$row['regionid'];
			$areaid=$row['areaid'];
			$positionid=$row['positionid'];
			$tuserid=$row['userid'];
		}
		$queryr="SELECT * FROM baslagriuser WHERE regionid='$regionid' AND areaid='0' AND territoryid='0'";
		$resultr=$this->db->query($queryr);
		$resultr=$resultr->result_array();
		foreach($resultr as $rowr)
		{
			$ruserid=$rowr['userid'];
			$rregionid=$rowr['regionid'];
			$rpositionid=$rowr['positionid'];
		}
		$querya="SELECT * FROM baslagriuser WHERE regionid='$regionid' AND areaid='$areaid' AND territoryid='0'";
		$resulta=$this->db->query($querya);
		$resulta=$resulta->result_array();
		foreach($resulta as $rowa)
		{
			$auserid=$rowa['userid'];
			$aareaid=$rowa['areaid'];
			$apositionid=$rowa['positionid'];
		}
	    if($ruserid!='' || $auserid!='' || $tuserid!='')
		{
		$sql="INSERT INTO baslagriac VALUES ('$stid','$productid','$rregionid','$aareaid','$territoryid','$sa','$ca','$ruserid','$auserid','$tuserid','$positionid','$rpositionid','$apositionid','$sdate','$baslagrisctt','$tmonth','$tyear')";
		$query=$this->db->query($sql);
		return $query;
		}
		else
		{
			return false;
		}
	}
	//public function baslagrisalestarget_insert($sdate,$edate,$productid,$territoryid,$ta)
//	{
//		date_default_timezone_set('Asia/Dhaka');
//		
//		$d=date('Y-m-d');
//		$t= date("H:i:s");
//		$d=str_replace("-","",$d);
//		$t=str_replace(":","",$t);
//		$stid=$d.$t;
//		$sdate=date("Y-m-d", strtotime($sdate));
//		$edate=date("Y-m-d", strtotime($edate));
//		//$sql="SELECT * FROM baslagrisalestarget WHERE positionname='$positionname'";
////		$query=$this->db->query($sql);
////		if($query->num_rows()==1)
////		{
////			return false;
////		}
////		else
////		{
//	    	$sql="INSERT INTO baslagrisalestarget VALUES ('$stid','$productid','$territoryid','$ta','$sdate','$edate')";
//			$query=$this->db->query($sql);
//			return $query;
//		//}
//	}
	//public function baslagrisalesachievement_insert($sdate,$productid,$territoryid,$aa)
//	{
//		date_default_timezone_set('Asia/Dhaka');
//		
//		$d=date('Y-m-d');
//		$t= date("H:i:s");
//		$d=str_replace("-","",$d);
//		$t=str_replace(":","",$t);
//		$stid=$d.$t;
//		$year = date('Y', strtotime($sdate));
//		$month = date('F', strtotime($sdate));
//		$sdate=date("Y-m-d", strtotime($sdate));
//		//$edate=date("Y-m-d", strtotime($edate));
//		//$sql="SELECT * FROM baslagrisalestarget WHERE positionname='$positionname'";
////		$query=$this->db->query($sql);
////		if($query->num_rows()==1)
////		{
////			return false;
////		}
////		else
////		{
//		$querytt="SELECT * FROM baslagrisctarget WHERE productid='$productid' AND territoryid='$territoryid' AND tmonth='$month' AND tyear='$year'";
//		$resulttt=$this->db->query($querytt);
//		$resulttt=$resulttt->result_array();
//		foreach($resulttt as $rowtt)
//		{
//			$baslagrisctt=$rowtt['baslagrisctt'];
//			
//		}
//		$queryu="SELECT * FROM baslagriuser WHERE territoryid='$territoryid'";
//		$resultu=$this->db->query($queryu);
//		$resultu=$resultu->result_array();
//		foreach($resultu as $row)
//		{
//			$regionid=$row['regionid'];
//			$areaid=$row['areaid'];
//			$tuserid=$row['userid'];
//		}
//		$queryr="SELECT * FROM baslagriuser WHERE regionid='$regionid' AND areaid='0' AND territoryid='0'";
//		$resultr=$this->db->query($queryr);
//		$resultr=$resultr->result_array();
//		foreach($resultr as $rowr)
//		{
//			$ruserid=$rowr['userid'];
//		}
//		$querya="SELECT * FROM baslagriuser WHERE regionid='$regionid' AND areaid='$areaid' AND territoryid='0'";
//		$resulta=$this->db->query($querya);
//		$resulta=$resulta->result_array();
//		foreach($resulta as $rowa)
//		{
//			$auserid=$rowa['userid'];
//		}
//	    
//		$sql="INSERT INTO baslagrisalesachievement VALUES ('$stid','$productid','$territoryid','$aa','$ruserid','$auserid','$tuserid','$sdate','$baslagrisctt')";
//		$query=$this->db->query($sql);
//		return $query;
//		//}
//	}
	//public function baslagrisalesctarget_insert($sdate,$edate,$productid,$territoryid,$ta)
//	{
//		date_default_timezone_set('Asia/Dhaka');
//		
//		$d=date('Y-m-d');
//		$t= date("H:i:s");
//		$d=str_replace("-","",$d);
//		$t=str_replace(":","",$t);
//		$stid=$d.$t;
//		$sdate=date("Y-m-d", strtotime($sdate));
//		$edate=date("Y-m-d", strtotime($edate));
//		//$sql="SELECT * FROM baslagrisalestarget WHERE positionname='$positionname'";
////		$query=$this->db->query($sql);
////		if($query->num_rows()==1)
////		{
////			return false;
////		}
////		else
////		{
//	    	$sql="INSERT INTO baslagrisalesctarget VALUES ('$stid','$productid','$territoryid','$ta','$sdate','$edate')";
//			$query=$this->db->query($sql);
//			return $query;
//		//}
//	}
	//public function baslagricachievement_insert($sdate,$productid,$territoryid,$aa)
//	{
//		date_default_timezone_set('Asia/Dhaka');
//		
//		$d=date('Y-m-d');
//		$t= date("H:i:s");
//		$d=str_replace("-","",$d);
//		$t=str_replace(":","",$t);
//		$stid=$d.$t;
//		$year = date('Y', strtotime($sdate));
//		$month = date('F', strtotime($sdate));
//		$sdate=date("Y-m-d", strtotime($sdate));
//		//$edate=date("Y-m-d", strtotime($edate));
//		//$sql="SELECT * FROM baslagrisalestarget WHERE positionname='$positionname'";
////		$query=$this->db->query($sql);
////		if($query->num_rows()==1)
////		{
////			return false;
////		}
////		else
////		{
//		$querytt="SELECT * FROM baslagrisctarget WHERE productid='$productid' AND territoryid='$territoryid' AND tmonth='$month' AND tyear='$year'";
//		$resulttt=$this->db->query($querytt);
//		$resulttt=$resulttt->result_array();
//		foreach($resulttt as $rowtt)
//		{
//			$baslagrisctt=$rowtt['baslagrisctt'];
//			
//		}
//	    $queryu="SELECT * FROM baslagriuser WHERE territoryid='$territoryid'";
//		$resultu=$this->db->query($queryu);
//		$resultu=$resultu->result_array();
//		foreach($resultu as $row)
//		{
//			$regionid=$row['regionid'];
//			$areaid=$row['areaid'];
//			$tuserid=$row['userid'];
//		}
//		$queryr="SELECT * FROM baslagriuser WHERE regionid='$regionid' AND areaid='0' AND territoryid='0'";
//		$resultr=$this->db->query($queryr);
//		$resultr=$resultr->result_array();
//		foreach($resultr as $rowr)
//		{
//			$ruserid=$rowr['userid'];
//		}
//		$querya="SELECT * FROM baslagriuser WHERE regionid='$regionid' AND areaid='$areaid' AND territoryid='0'";
//		$resulta=$this->db->query($querya);
//		$resulta=$resulta->result_array();
//		foreach($resulta as $rowa)
//		{
//			$auserid=$rowa['userid'];
//		}
//			$sql="INSERT INTO baslagricachievement VALUES ('$stid','$productid','$territoryid','$aa','$ruserid','$auserid','$tuserid','$sdate','$baslagrisctt')";
//			$query=$this->db->query($sql);
//			return $query;
//		//}
//	}
	public function date_wise_baslagri_incentive_list($pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT * FROM baslagrisctarget
		LEFT JOIN baslagriac ON baslagriac.baslagrisctt=baslagrisctarget.baslagrisctt
		LEFT JOIN menus ON menus.id=baslagriac.productid
		LEFT JOIN territory ON territory.territoryid=baslagriac.territoryid
		LEFT JOIN baslagriuser ON baslagriuser.userid=baslagriac.tuserid
		
		LEFT JOIN position ON position.positionid=baslagriuser.positionid
		LEFT JOIN region ON region.regionid=baslagriuser.regionid
		LEFT JOIN area ON area.areaid=baslagriuser.areaid
		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
	
	
		LEFT JOIN user ON user.userid=baslagriuser.userid
		WHERE acdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3'
		";
		$result=$this->db->query($query);
		return $result->result_array();
	}

	//public function date_wise_baslagri_incentive_list($pd,$wd)
//	{
//		$pd=date("Y-m-d", strtotime($pd));
//		$wd=date("Y-m-d", strtotime($wd));
//		$query="SELECT * FROM baslagriuser
//		LEFT JOIN baslagrisc ON baslagrisc.tuserid=baslagriuser.userid
//		LEFT JOIN baslagrisctarget ON baslagrisctarget.productid=baslagrisc.productid AND
//		baslagrisctarget.territoryid=baslagrisc.territoryid
//		
//		LEFT JOIN menus ON menus.id=baslagrisc.productid
//						  
//		LEFT JOIN region ON region.regionid=baslagriuser.regionid
//		LEFT JOIN area ON area.areaid=baslagriuser.areaid
//		LEFT JOIN territory ON territory.territoryid=baslagriuser.territoryid AND
//				territory.areaid=baslagriuser.areaid AND
//				territory.regionid=baslagriuser.regionid
//		LEFT JOIN position ON position.positionid=baslagriuser.positionid
//		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
//		
//		
//		LEFT JOIN user ON user.userid=baslagriuser.userid
//		
//		WHERE salachdate BETWEEN '$pd' AND '$wd' OR collecachdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3'";
//		$result=$this->db->query($query);
//		return $result->result_array();
//	}
	public function baslagri_incentive_user()
	{
		$query1="SELECT DISTINCT(userid) AS userid,ename FROM  baslagriac_inc_view";
		$result1=$this->db->query($query1);
		return $result1->result_array();
	}
	public function baslagri_incentive_month()
	{
		$query1="SELECT DISTINCT(ttmonth) AS ttmonth FROM  baslagriac_inc_view";
		$result1=$this->db->query($query1);
		return $result1->result_array();
	}
	public function baslagri_incentive_year()
	{
		$query1="SELECT DISTINCT(ttyear) AS ttyear FROM  baslagriac_inc_view";
		$result1=$this->db->query($query1);
		return $result1->result_array();
	}
	public function baslagri_location()
	{
		$query1="SELECT * FROM  baslagriwl";
		$result1=$this->db->query($query1);
		return $result1->result_array();
	}
	public function date_wise_baslagri_incentive_summary($mo,$yr,$positionid,$territoryid,$userid)
	{
		//$pd=date("Y-m-d", strtotime($pd));
		//$wd=date("Y-m-d", strtotime($wd));
		//$query1="SELECT DISTINCT(territoryid) AS territoryid FROM  baslagriac";
//		$result1=$this->db->query($query1);
//		$u=$result1->result_array();
//		foreach($u as $r)
//		{
//			echo $ur=$r['territoryid'];

		$query="SELECT * FROM baslagrisctarget
				LEFT JOIN baslagriac_view ON baslagriac_view.baslagrisctt=baslagrisctarget.baslagrisctt
				WHERE baslagriac_view.baslagriwlid='3' AND baslagriac_view.positionid='$positionid' 
				AND baslagriac_view.territoryid='$territoryid' AND baslagriac_view.userid='$userid' AND baslagriac_view.ttmonth='$mo' AND baslagriac_view.ttyear='$yr'
				GROUP BY baslagriac_view.territoryid,baslagriac_view.productid,baslagriac_view.userid";
		$result=$this->db->query($query);
		return $result->result_array();
			
			//$query="SELECT user.userid,ename,parentdesignationid,positionname,regionname,areaname,territoryname,slug,menus.id,baslagriac.productid,position.positionid,SUM(tamount) AS tamount,SUM(tcamount) AS tcamount,SUM(salesach) AS salesach,SUM(collectionach) AS collectionach,acdate,baslagriac.territoryid
//			 FROM baslagrisctarget
//			
//			
//		LEFT JOIN baslagriac ON baslagriac.baslagrisctt=baslagrisctarget.baslagrisctt AND
//		baslagriac.productid=baslagrisctarget.productid AND
//		baslagriac.territoryid=baslagrisctarget.territoryid
//		LEFT JOIN menus ON menus.id=baslagriac.productid
//		LEFT JOIN territory ON territory.territoryid=baslagriac.territoryid
//		LEFT JOIN baslagriuser ON baslagriuser.userid=baslagriac.tuserid
//		
//		LEFT JOIN position ON position.positionid=baslagriac.positionid
//		LEFT JOIN region ON region.regionid=baslagriuser.regionid
//		LEFT JOIN area ON area.areaid=baslagriuser.areaid
//		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
//		
//		
//	
//		LEFT JOIN user ON user.userid=baslagriuser.userid
//		WHERE acdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3' AND baslagriac.positionid='$positionid' AND baslagriac.territoryid='20'
//		GROUP BY baslagriac.territoryid,baslagriac.productid,baslagriac.tuserid,baslagriac.acdate";
//		$result=$this->db->query($query);
//		return $result->result_array();
		//}
		//$query="SELECT user.userid,ename,parentdesignationid,positionname,regionname,areaname,territoryname,slug,menus.id,baslagriac.productid,position.positionid,SUM(tamount) AS tamount,SUM(tcamount) AS tcamount,SUM(ttcamount) AS ttcamount,SUM(salesach) AS salesach,SUM(collectionach) AS collectionach,SUM(ccollectionach) AS ccollectionach,acdate,baslagriac.territoryid FROM baslagrisctarget
//		LEFT JOIN baslagriac ON baslagriac.baslagrisctt=baslagrisctarget.baslagrisctt AND
//		baslagriac.productid=baslagrisctarget.productid AND
//		baslagriac.territoryid=baslagrisctarget.territoryid
//		LEFT JOIN menus ON menus.id=baslagriac.productid
//		LEFT JOIN territory ON territory.territoryid=baslagriac.territoryid
//		LEFT JOIN baslagriuser ON baslagriuser.userid=baslagriac.tuserid
//		
//		LEFT JOIN position ON position.positionid=baslagriac.positionid
//		LEFT JOIN region ON region.regionid=baslagriuser.regionid
//		LEFT JOIN area ON area.areaid=baslagriuser.areaid
//		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
//		
//		LEFT JOIN baslagri_view4 ON baslagri_view4.tuserid=baslagriac.tuserid AND
//		baslagri_view4.territoryid=baslagriac.territoryid AND 
//		baslagri_view4.positionid=baslagriac.positionid
//	
//		LEFT JOIN user ON user.userid=baslagriuser.userid
//		WHERE acdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3' AND baslagriac.positionid='$positionid'
//		GROUP BY baslagriac.territoryid,baslagriac.productid,baslagriac.tuserid";
//		$result=$this->db->query($query);
//		return $result->result_array();
		//}
		//$query="SELECT user.userid,ename,parentdesignationid,positionname,regionname,areaname,territoryname,slug,menus.id,baslagriac.productid,position.positionid,SUM(tamount) AS tamount,SUM(tcamount) AS tcamount,SUM(salesach) AS salesach,SUM(collectionach) AS collectionach,acdate,baslagriac.territoryid FROM baslagrisctarget
//		LEFT JOIN baslagriac ON baslagriac.baslagrisctt=baslagrisctarget.baslagrisctt
//		LEFT JOIN menus ON menus.id=baslagriac.productid
//		LEFT JOIN territory ON territory.territoryid=baslagriac.territoryid
//		LEFT JOIN baslagriuser ON baslagriuser.userid=baslagriac.tuserid
//		
//		LEFT JOIN position ON position.positionid=baslagriac.positionid
//		LEFT JOIN region ON region.regionid=baslagriuser.regionid
//		LEFT JOIN area ON area.areaid=baslagriuser.areaid
//		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
//	
//	
//		LEFT JOIN user ON user.userid=baslagriuser.userid
//		WHERE acdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3' AND baslagriac.positionid='$positionid' 
//		GROUP BY baslagriac.territoryid,baslagriac.productid,baslagriac.tuserid";
//		$result=$this->db->query($query);
//		return $result->result_array();
		//}
		
		//$query="SELECT baslagri_view.userid,baslagri_view.ename,baslagri_view.parentdesignationid,baslagri_view.positionname,baslagri_view.regionname,baslagri_view.areaname,baslagri_view.territoryname,baslagri_view.slug,baslagri_view.tamount,baslagri_view.tcamount,ttcamount,tcollectionach,baslagri_view.salesach,baslagri_view.collectionach,baslagri_view.acdate,baslagri_view.territoryid 
//		FROM baslagri_view
//		JOIN baslagri_view1 ON baslagri_view1.userid=baslagri_view.userid AND
//							  baslagri_view1.territoryid =baslagri_view.territoryid  
//		WHERE baslagri_view.acdate BETWEEN '$pd' AND '$wd' AND baslagri_view.positionid='$positionid'
//		";
//		$result=$this->db->query($query);
//		return $result->result_array();

		//$query="SELECT user.userid,user.ename,user.parentdesignationid,position.positionname,region.regionname,area.areaname,territory.territoryname,menus.slug,SUM(baslagrisctarget.tamount) AS tamount,SUM(baslagrisctarget.tcamount) AS tcamount,SUM(baslagriac.salesach) AS salesach,SUM(baslagriac.collectionach) AS collectionach,SUM(ttcamount) AS ttcamount,SUM(tcollectionach) AS tcollectionach,baslagriac.acdate,baslagriac.territoryid FROM baslagrisctarget
//		LEFT JOIN baslagriac ON baslagriac.baslagrisctt=baslagrisctarget.baslagrisctt
//		LEFT JOIN menus ON menus.id=baslagriac.productid
//		LEFT JOIN territory ON territory.territoryid=baslagriac.territoryid
//		LEFT JOIN baslagriuser ON baslagriuser.userid=baslagriac.tuserid
//		
//		LEFT JOIN position ON position.positionid=baslagriac.positionid
//		LEFT JOIN region ON region.regionid=baslagriuser.regionid
//		LEFT JOIN area ON area.areaid=baslagriuser.areaid
//		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
//		
//		LEFT JOIN baslagri_view3 ON baslagri_view3.userid=baslagriac.tuserid AND
//									baslagri_view3.territoryid=baslagriac.territoryid AND
//									baslagri_view3.positionid=baslagriac.positionid AND
//									baslagri_view3.productid=baslagriac.productid
//	
//	
//		LEFT JOIN user ON user.userid=baslagriuser.userid
//		WHERE baslagriac.acdate BETWEEN '$pd' AND '$wd' AND baslagri_view3.acdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3' AND baslagriac.positionid='$positionid'
//		GROUP BY baslagriac.territoryid,baslagriac.productid,baslagriac.tuserid,baslagriac.positionid";
//		$result=$this->db->query($query);
//		return $result->result_array();
	
	}
	public function date_wise_baslagri_tincentive_summary($mo,$yr)
	{
		//$pd=date("Y-m-d", strtotime($pd));
		//$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT userid,ename,parentdesignationid,positionname,regionname,areaname,positionid,territoryname,territoryid,
				SUM(CASE WHEN productid = 10 THEN achieve ELSE 0 END) AS p10,
				SUM(CASE WHEN productid = 11 THEN achieve ELSE 0 END) AS p11,
				SUM(CASE WHEN productid = 12 THEN achieve ELSE 0 END) AS p12,
				SUM(CASE WHEN productid = 13 THEN achieve ELSE 0 END) AS p13,
				SUM(salesach) AS tsalesach,
				SUM(tcamount) AS ttcamount,
				SUM(collectionach) AS tcollectionach,
				ROUND((SUM(collectionach)/SUM(tcamount)),2)*100 AS tca,
				ttmonth,ttyear FROM baslagriac_inc_view
				WHERE ttmonth='$mo' AND ttyear='$yr'
 				GROUP BY userid,positionid,territoryid,ttmonth,ttyear 
				ORDER BY baslagriac_inc_view.userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_baslagri_aincentive_summary($mo,$yr)
	{
		//$pd=date("Y-m-d", strtotime($pd));
		//$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT userid,ename,parentdesignationid,positionname,regionname,areaname,positionid,
				SUM(CASE WHEN productid = 10 THEN achieve ELSE 0 END) AS p10,
				SUM(CASE WHEN productid = 11 THEN achieve ELSE 0 END) AS p11,
				SUM(CASE WHEN productid = 12 THEN achieve ELSE 0 END) AS p12,
				SUM(CASE WHEN productid = 13 THEN achieve ELSE 0 END) AS p13,
				SUM(salesach) AS tsalesach,
				SUM(tcamount) AS ttcamount,
				SUM(collectionach) AS tcollectionach,
				ROUND((SUM(collectionach)/SUM(tcamount)),2)*100 AS tca,
				ttmonth,ttyear FROM baslagriac_inc_aview
				WHERE ttmonth='$mo' AND ttyear='$yr'
 				GROUP BY userid,positionid,areaid,ttmonth,ttyear 
				ORDER BY baslagriac_inc_aview.userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_baslagri_rincentive_summary($mo,$yr)
	{
		//$pd=date("Y-m-d", strtotime($pd));
		//$wd=date("Y-m-d", strtotime($wd));
		$query="SELECT userid,ename,parentdesignationid,positionname,regionname,positionid,
				SUM(CASE WHEN productid = 10 THEN achieve ELSE 0 END) AS p10,
				SUM(CASE WHEN productid = 11 THEN achieve ELSE 0 END) AS p11,
				SUM(CASE WHEN productid = 12 THEN achieve ELSE 0 END) AS p12,
				SUM(CASE WHEN productid = 13 THEN achieve ELSE 0 END) AS p13,
				SUM(salesach) AS tsalesach,
				SUM(tcamount) AS ttcamount,
				SUM(collectionach) AS tcollectionach,
				ROUND((SUM(collectionach)/SUM(tcamount)),2)*100 AS tca,
				ttmonth,ttyear FROM baslagriac_inc_rview
				WHERE ttmonth='$mo' AND ttyear='$yr'
 				GROUP BY userid,positionid,regionid,ttmonth,ttyear 
				ORDER BY baslagriac_inc_rview.userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
												/***********************KNITTING INCENTIVE************************/
												
	public function kmachine_insert($mname)
	{
		$sql="SELECT * FROM kmachine_insert WHERE kmname='$mname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO kmachine_insert VALUES ('','$mname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function kmachine_list()
	{
		$query="SELECT * FROM kmachine_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function kmachinelist_up($kmid)
	{
		$sql1="SELECT * FROM kmachine_insert WHERE kmid='$kmid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function kmachinelup($kmid,$mname)
	{
		$sql="UPDATE kmachine_insert SET kmname='$mname' WHERE kmid='$kmid'";
		return $query=$this->db->query($sql);
	}
	public function kmachinenumber_insert($kmid,$mname,$mnum)
	{
		$sql="SELECT * FROM kmachinenumber_insert WHERE kmnnum='$mnum'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO kmachinenumber_insert VALUES ('$mnum','$kmid','$mname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function kmachinenumber_list()
	{
		$query="SELECT * FROM kmachinenumber_insert
		JOIN kmachine_insert ON kmachine_insert.kmid=kmachinenumber_insert.kmid
		ORDER BY kmachinenumber_insert.kmnnum ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function kmachinelistnumber_up($kmnnum)
	{
		$sql1="SELECT * FROM kmachinenumber_insert
		JOIN kmachine_insert ON kmachine_insert.kmid=kmachinenumber_insert.kmid
		WHERE kmnnum='$kmnnum'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function kmachinenumberlup($kmniid,$mname,$kmnnum)
	{
		$sql="UPDATE kmachinenumber_insert SET kmnname='$mname' WHERE kmnnum='$kmnnum'";
		return $query=$this->db->query($sql);
	}
	public function kfabric_insert($fname)
	{
		$sql="SELECT * FROM kfabric_insert WHERE kfname='$fname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO kfabric_insert VALUES ('','$fname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function kfabric_list()
	{
		$query="SELECT * FROM kfabric_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function kfabric_up($kfid)
	{
		$sql1="SELECT * FROM kfabric_insert WHERE kfid='$kfid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function kfabriclup($kfid,$kfname)
	{
		$sql="UPDATE kfabric_insert SET kfname='$kfname' WHERE kfid='$kfid'";
		return $query=$this->db->query($sql);
	}
	public function kshift_insert($kshift)
	{
		$sql="SELECT * FROM kshift_insert WHERE kshift='$kshift'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO kshift_insert VALUES ('','$kshift')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function kshift_list()
	{
		$query="SELECT * FROM kshift_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function kshiftlist_up($ksid)
	{
		$sql1="SELECT * FROM kshift_insert WHERE ksid='$ksid'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		return $result;
	}
	public function kshiftlup($ksid,$kshift)
	{
		
		$sql="UPDATE kshift_insert SET kshift='$kshift' WHERE ksid='$ksid'";
		return $query=$this->db->query($sql);
	}
	public function ktarget_insert($data)
	{
		$data['ktdate'] = date("Y-m-d", strtotime($data['ktdate']));
		$data['userid']="ATL".$data['userid'];
		$sql="INSERT INTO ktarget_insert VALUES ('','$data[kmnnum]','$data[ktarget]','$data[koutput]','$data[userid]','$data[ksid]','$data[ktdate]','0')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function ktarget_list($ktdate,$ksid)
	{
		$ktdate=date("Y-m-d", strtotime($ktdate));
		$sql="SELECT ktid,kmnnum,ktarget,koutput,ktarget_insert.userid,ename,kshift_insert.ksid,kshift_insert.kshift,ktdate
		FROM ktarget_insert
		LEFT JOIN kshift_insert ON kshift_insert.ksid=ktarget_insert.ksid
		LEFT JOIN user ON user.userid=ktarget_insert.userid  
		WHERE ktdate='$ktdate' AND kshift_insert.ksid='$ksid'";
		$result=$this->db->query($sql);
		return $result->result_array();
	}
	public function ktarget_list_up($ktid)
	{
		$ktdate=date("Y-m-d", strtotime($ktdate));
		$sql="SELECT ktid,kmnnum,ktarget,koutput,userid,kshift_insert.ksid,kshift_insert.kshift,ktdate 
		FROM ktarget_insert
		LEFT JOIN kshift_insert ON kshift_insert.ksid=ktarget_insert.ksid  
		WHERE ktid='$ktid'";
		$result=$this->db->query($sql);
		return $result->result_array();
	}
	public function ktargetlup($ktid,$kmnnum,$ktarget,$koutput,$userid,$ksid,$ktdate)
	{
		$ktdate=date("Y-m-d", strtotime($ktdate));
		$sql="UPDATE ktarget_insert SET kmnnum='$kmnnum',ktarget='$ktarget',koutput='$koutput',userid='$userid',ksid='$ksid',ktdate='$ktdate' WHERE ktid='$ktid'";
		return $query=$this->db->query($sql);
	}
	

//public function date_wise_baslagri_tincentive_summary1($pd,$wd,$positionid)
//	{
//		$pd=date("Y-m-d", strtotime($pd));
//		$wd=date("Y-m-d", strtotime($wd));
//		$query1="SELECT DISTINCT(tuserid) AS tuserid FROM  baslagriac";
//		$result1=$this->db->query($query1);
//		$u=$result1->result_array();
//		//foreach($u as $r)
////		{
////			echo $ur=$r['tuserid'];
//			
//			$query="SELECT user.userid,ename,parentdesignationid,positionname,regionname,areaname,territoryname,slug,menus.id,baslagriac.productid,position.positionid,SUM(tamount) AS tamount,SUM(tcamount) AS tcamount,SUM(salesach) AS salesach,SUM(collectionach) AS collectionach,acdate,baslagriac.territoryid FROM baslagrisctarget
//		LEFT JOIN baslagriac ON baslagriac.baslagrisctt=baslagrisctarget.baslagrisctt AND
//		baslagriac.productid=baslagrisctarget.productid AND
//		baslagriac.territoryid=baslagrisctarget.territoryid
//		LEFT JOIN menus ON menus.id=baslagriac.productid
//		LEFT JOIN territory ON territory.territoryid=baslagriac.territoryid
//		LEFT JOIN baslagriuser ON baslagriuser.userid=baslagriac.tuserid
//		
//		LEFT JOIN position ON position.positionid=baslagriac.positionid
//		LEFT JOIN region ON region.regionid=baslagriuser.regionid
//		LEFT JOIN area ON area.areaid=baslagriuser.areaid
//		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
//		
//		
//	
//		LEFT JOIN user ON user.userid=baslagriuser.userid
//		WHERE acdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3' AND baslagriac.positionid='$positionid'
//		GROUP BY baslagriac.territoryid,baslagriac.productid,baslagriac.tuserid ORDER BY baslagriac.tuserid ASC";
//		$result=$this->db->query($query);
//		return $result->result_array();
//}
//public function date_wise_baslagri_incentive_summary($pd,$wd,$positionid)
//	{
//		$pd=date("Y-m-d", strtotime($pd));
//		$wd=date("Y-m-d", strtotime($wd));
//		//$query1="SELECT DISTINCT(territoryid) AS territoryid FROM  baslagriac";
////		$result1=$this->db->query($query1);
////		$u=$result1->result_array();
////		foreach($u as $r)
////		{
////			echo $ur=$r['territoryid'];
//			
//			$query="SELECT user.userid,ename,parentdesignationid,positionname,regionname,areaname,territoryname,slug,menus.id,baslagriac.productid,position.positionid,SUM(tamount) AS tamount,SUM(tcamount) AS tcamount,SUM(salesach) AS salesach,SUM(collectionach) AS collectionach,acdate,baslagriac.territoryid FROM baslagrisctarget
//		LEFT JOIN baslagriac ON baslagriac.baslagrisctt=baslagrisctarget.baslagrisctt AND
//		baslagriac.productid=baslagrisctarget.productid AND
//		baslagriac.territoryid=baslagrisctarget.territoryid
//		LEFT JOIN menus ON menus.id=baslagriac.productid
//		LEFT JOIN territory ON territory.territoryid=baslagriac.territoryid
//		LEFT JOIN baslagriuser ON baslagriuser.userid=baslagriac.tuserid
//		
//		LEFT JOIN position ON position.positionid=baslagriac.positionid
//		LEFT JOIN region ON region.regionid=baslagriuser.regionid
//		LEFT JOIN area ON area.areaid=baslagriuser.areaid
//		LEFT JOIN baslagriwl ON baslagriwl.baslagriwlid=baslagriuser.baslagriwlid
//		
//		
//	
//		LEFT JOIN user ON user.userid=baslagriuser.userid
//		WHERE acdate BETWEEN '$pd' AND '$wd' AND baslagriuser.baslagriwlid='3' AND baslagriac.positionid='$positionid' AND baslagriac.territoryid='$ur'
//		GROUP BY baslagriac.territoryid,baslagriac.productid,baslagriac.tuserid";
//		$result=$this->db->query($query);
//		return $result->result_array();
//}

	public function examname_insert($examname)
	{
		$sql="SELECT * FROM examname WHERE examname='$examname'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO examname VALUES ('','$examname')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function examname_list()
	{
		$query="SELECT * FROM examname";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	//public function examques_insert($data)
//	{
//		//$data['odate'] = date("Y-m-d", strtotime($data['odate']));
//		$sql="INSERT INTO examques VALUES ('','$data[exnid]','$data[exq]')";
//		$query=$this->db->query($sql);
//		return $query;
//	}
	public function examques_insert($exnid,$exq)
	{
		//$data['odate'] = date("Y-m-d", strtotime($data['odate']));
		$qno1=1;
		$query="SELECT MAX(qno) AS qno FROM examques1 WHERE examname='$exnid'";
		$result=$this->db->query($query);
		$r=$result->result_array();
		foreach($r as $row)
		{
			$qno=$row['qno'];
			 $qno1=$qno1+$qno;
		}
		
		$sql="INSERT INTO examques1 VALUES ('','$exnid',1,'$qno1','$exq','','')";
		return $query=$this->db->query($sql);
		
		//$sqla="INSERT INTO examques1 VALUES ('','$data[exnid]',2,'$qno','$data[ans]')";
//		$querya=$this->db->query($sqla);
//		
//		$sqlm="INSERT INTO examques1 VALUES ('','$data[exnid]',3,'$qno','$data[marks]')";
//		$querym=$this->db->query($sqlm);
		
		//return $queryq;
	}
	public function examques_insert1($data)
	{
		$qno1=1;
		$query="SELECT MAX(qno) AS qno FROM examques1 WHERE examname='$data[exnid]'";
		$result=$this->db->query($query);
		$r=$result->result_array();
		foreach($r as $row)
		{
			$qno=$row['qno'];
			 $qno1=$qno1+$qno;
		}
		$data['am']=$data['exnid'].$qno.$data['sl'];
		$sql="INSERT INTO examques1 VALUES ('','$data[exnid]',2,'$qno','$data[ans]','$data[marks]','$data[am]')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function examques_insert2($data)
	{
		$qno1=1;
		$query="SELECT MAX(qno) AS qno FROM examques1 WHERE examname='$data[exnid]'";
		$result=$this->db->query($query);
		$r=$result->result_array();
		foreach($r as $row)
		{
			$qno=$row['qno'];
			 $qno1=$qno1+$qno;
		}
		$data['am']=$data['exnid'].$qno.$data['sl'];
		$sql="INSERT INTO examquesmarks VALUES ('','$data[am]','$data[marks]')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function examques_list($exnid)
	{
		//$query="SELECT * FROM examques JOIN examname ON examname.exnid=examques.exnid WHERE examname.exnid='$exnid'";
		$query="SELECT * FROM examques1 JOIN examname ON examname.exnid=examques1.examname WHERE examname.exnid='$exnid'  AND type='2'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function examquesans_insert_form($examquesid)
	{
		$query="SELECT * FROM examques JOIN examname ON examname.exnid=examques.exnid WHERE examques.examquesid='$examquesid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function examquesans_insert($data)
	{
		//$data['odate'] = date("Y-m-d", strtotime($data['odate']));
		$sql="INSERT INTO examquesans VALUES ('','$data[exnid]','$data[exquesid]','$data[ans]','$data[marks]')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function examqresult_list()
	{
		//$query="SELECT userid,mobileno,SUM(marks) AS marks FROM examques1 JOIN examresult ON examresult.examans=examques1.exqusid GROUP BY mobileno";
		$query="SELECT userid,mobileno,nidno,tinno,SUM(marks) AS marks,humannature,besttraits,worsttraits,personality 
				FROM examques1 JOIN examresult ON 	examresult.examans=examques1.exqusid 
				LEFT JOIN bloodgroup_insert ON bloodgroup_insert.bloodgroup=examresult.bloodgroup
				GROUP BY mobileno";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	public function userexport_xls($factoryid){
 		$response = array();
		$query="SELECT user.factoryid,user.userid,factory.factoryname,division.divisionname,(user.divisionid) AS diviid,user.departmentid,department.deptid,department.departmentname,user.sectionid,section.sectionname,user.subsectionid,subsection.subsectionname,user.location,user.ename,user.bname,user.parentdesignationid,user.childdesignationid,user.religion,user.maritual,user.dob,user.doj,user.hdistrict,user.epermanentaddress,user.bpermanentaddress,user.epresentaddress,user.bpresentaddress,user.nid,user.blodgroup,user.gender,user.salary,user.efficiency,user.identification,user.oemail,user.pemail,user.pmobile,user.emobile,user.user_type,user.service_type,user.puserid,user.ruserid,user.password,user.ustatus,usertype.usertypeid,usertype.usertype,servicetype.servicetypeid,servicetype.servicetype,userstatus.userstatusid,userstatus.userstatus,religion.religionid,religion.religionname,maritualstatus.maritualstatusid,maritualstatus.maritualstatus,gender.genderid,gender.gender,user.password,parentdesignation.eparentdesignation,parentdesignation.parentdesignationid,parentdesignation.bparentdesignation,childdesignation.childdesignationid,childdesignation.echilddesignation,childdesignation.bchilddesignation,pperiod,pperiod_status,user.image  FROM user
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN division ON division.divisionid=user.divisionid 
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN section ON section.secid=user.sectionid
		LEFT JOIN subsection ON subsection.subsecid=user.subsectionid
		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=user.parentdesignationid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
		LEFT JOIN religion ON religion.religionid=user.religion
		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=user.maritual
		LEFT JOIN gender ON gender.genderid=user.gender
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type 
		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE user.factoryid='$factoryid' ORDER BY user.userid";
		$result=$this->db->query($query);
		$response = $result->result_array();
	 	return $response;
	}
	
															/********************ADMIN********************/
	
	
	public function issuetype_insert($issuetype)
	{
		$sql="INSERT INTO issuetype VALUES ('','$issuetype')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function issuetype_list()
	{
		$query="SELECT * FROM issuetype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function issuetype_list_up($issuetypeid)
	{
		$query="SELECT * FROM issuetype
		WHERE issuetypeid='$issuetypeid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function issuetypelup($issuetypeid,$issuetype)
	{
		$sql="UPDATE issuetype SET issuetype='$issuetype' WHERE issuetypeid='$issuetypeid'";
		$query=$this->db->query($sql);
	}
	public function challanges_insert($issuetypeid,$details,$zone,$place,$dl,$fpr,$ps,$remarks)
	{
		$sql="INSERT INTO challanges VALUES ('','$issuetypeid','$details','$zone','$place','$dl','$fpr','$ps','$remarks','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function challanges_list()
	{
		$query="SELECT * FROM challanges
		JOIN issuetype ON issuetype.issuetypeid=challanges.issuetypeid
		LEFT JOIN user ON user.userid=challanges.fpr";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function challanges_list_up($chid)
	{
		$query="SELECT * FROM challanges
		JOIN issuetype ON issuetype.issuetypeid=challanges.issuetypeid
		LEFT JOIN user ON user.userid=challanges.fpr
		WHERE chid='$chid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function challangeslup($chid,$issuetypeid,$details,$zone,$place,$dl,$fpr,$ps,$remarks,$chstatus)
	{
		$sql="UPDATE challanges SET issuetypeid='$issuetypeid',details='$details',zone='$zone',place='$place',dl='$dl',fpr='$fpr',ps='$ps',remarks='$remarks',chstatus='$chstatus' WHERE chid='$chid'";
		return $query=$this->db->query($sql);
	}
	public function challanges_history_insert($chid,$details)
	{
		$sql="INSERT INTO challanges_history VALUES ('','$chid','$details')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function challanges_member_insert($chid,$mid)
	{
		$sql="INSERT INTO challanges_member VALUES ('','$chid','$mid')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function challanges_details_list1($chid)
	{
		$query="SELECT * FROM challanges
		JOIN issuetype ON issuetype.issuetypeid=challanges.issuetypeid
		JOIN user ON user.userid=challanges.fpr
		WHERE challanges.chid='$chid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function challanges_details_list2($chid)
	{
		$query="SELECT * FROM challanges
		JOIN challanges_history ON challanges_history.chid=challanges.chid
		WHERE challanges.chid='$chid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function challanges_details_list3($chid)
	{
		$query="SELECT * FROM challanges
		JOIN challanges_member ON challanges_member.chid=challanges.chid
		JOIN user ON user.userid=challanges_member.mid
		WHERE challanges.chid='$chid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
																/*****************HLMS********************/
	
	public function hcall_insert($userid,$unit,$reportername,$next,$details,$rdate,$reporttime)
	{
		$rdate=date("Y-m-d", strtotime($rdate));
		$sql="INSERT INTO hcall_insert VALUES ('','$userid','$unit','$reportername','$next','$details','$rdate','$reporttime','','1')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function hcall_list()
	{
		$query="SELECT * FROM hcall_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function hcall_list1($factoryid)
	{
		$query="SELECT * FROM hcall_insert WHERE unit='$factoryid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function hcall_list_up($hcid,$remarks)
	{
		$sql="UPDATE hcall_insert SET remarks='$remarks',hcstatus='0' WHERE hcid='$hcid'";
		return $query=$this->db->query($sql);
	}
	
															/*****************INCIDENT********************/
	
	public function incident_type_insert($inct)
	{
		$sql="INSERT INTO incident_type_insert VALUES ('','$inct')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function incident_type_list()
	{
		$query="SELECT * FROM incident_type_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incident_level_insert($incl)
	{
		$sql="INSERT INTO incident_level_insert VALUES ('','$incl')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function incident_level_list()
	{
		$query="SELECT * FROM incident_level_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incident_treatment_insert($inct)
	{
		$sql="INSERT INTO incident_treatment_insert VALUES ('','$inct')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function incident_treatment_list()
	{
		$query="SELECT * FROM incident_treatment_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incident_create($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$d=date('Y-m-d');
		$t= date("h:i:s");
		$d=str_replace("-","",$d);
		$t=str_replace(":","",$t);
		$inid=$d.$t;
		$data['cdate'] = date("Y-m-d", strtotime($data['cdate']));
		$sql="INSERT INTO incident_create VALUES ('$inid','$data[cdate]','$data[description]','$data[expense]','$data[ty]','$data[le]')";
		$query=$this->db->query($sql);
		
		$sql1="INSERT INTO incident_create1 VALUES ('','$inid','$data[userid]','$data[tre]')";
		$query1=$this->db->query($sql1);
		return $query1;
    }
	public function incident_list()
	{
		$query="SELECT * FROM incident_create 
				JOIN incident_level_insert ON incident_level_insert.ilid=incident_create.le
				JOIN incident_type_insert ON incident_type_insert.inctid=incident_create.ty";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incident_list_details($icid)
	{
		$query="SELECT * FROM incident_create 
				JOIN incident_create1_view ON incident_create1_view.inid=incident_create.icid
				JOIN incident_level_insert ON incident_level_insert.ilid=incident_create.le
				JOIN incident_type_insert ON incident_type_insert.inctid=incident_create.ty
				JOIN incident_treatment_insert ON incident_treatment_insert.inctrid=incident_create1_view.tre
				WHERE icid='$icid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incident_list_details1($icid)
	{
		$query="SELECT * FROM incident_files_insert
				WHERE icid='$icid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incident_files_insert($icid,$pic_file)
	{
		$sql="INSERT INTO incident_files_insert VALUES ('','$icid','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	
															/*****************INNOVATION********************/
															
	public function innovation_insert($iname,$pic_file)
	{
		$sql="INSERT INTO innovation_insert VALUES ('','$iname','$pic_file')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function innovation_list()
	{
		$query="SELECT * FROM innovation_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	
															/*****************LIBRARY********************/
															
	public function lbook_category_insert($lcname)
	{
		$sql="INSERT INTO lbook_category_insert VALUES ('','$lcname')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function lbook_category_list()
	{
		$query="SELECT * FROM lbook_category_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbook_category_list_up($lcbid)
	{
		$query="SELECT * FROM lbook_category_insert WHERE lcbid='$lcbid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbookclup($lcbid,$lcbname)
	{
		$sql="UPDATE lbook_category_insert SET lcbname='$lcbname' WHERE lcbid='$lcbid'";
		return $query=$this->db->query($sql);
	}
	public function lbook_info_insert($bno,$lcbid,$bname,$aname,$remarks,$cover_file,$content_file)
	{
		$sql="SELECT * FROM lbook_info_insert WHERE bno='$bno'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO lbook_info_insert VALUES ('$bno','$lcbid','$bname','$aname','$remarks','$cover_file','$content_file')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function lbook_info_list()
	{
		$query="SELECT COUNT(lbook_no.bno) AS cbno,lbook_info_insert.bno,bname,aname,remarks,cover_file,content_file,lcbname,lbook_category_insert.lcbid 
		FROM lbook_info_insert
		LEFT JOIN lbook_category_insert ON lbook_category_insert.lcbid=lbook_info_insert.lcbid
		LEFT JOIN lbook_no ON lbook_no.bno=lbook_info_insert.bno
		GROUP BY lbook_info_insert.bno ORDER BY CAST(lbook_info_insert.bno AS INT) ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbookinfo_list_up($bno)
	{
		$query="SELECT bno,bname,aname,remarks 
		FROM lbook_info_insert
		WHERE bno='$bno'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbook_insertno_form($bno)
	{
		$query="SELECT MAX(blno) AS blno,lbook_info_insert.bno,bname,aname,remarks,cover_file,content_file,lcbname,lbook_category_insert.lcbid,lbnid 
		FROM lbook_info_insert
		JOIN lbook_category_insert ON lbook_category_insert.lcbid=lbook_info_insert.lcbid
		LEFT JOIN lbook_no ON lbook_no.bno=lbook_info_insert.bno
		WHERE lbook_info_insert.bno='$bno'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbook_insertno($bno,$blno)
	{
		$bnoblno=$bno.'_'.$blno;
		$sql="SELECT * FROM lbook_no WHERE bno='$bno' AND blno='$blno'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO lbook_no VALUES ('','$bno','$blno','$bnoblno')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function lbookinfolup($bno,$bname,$aname,$remarks)
	{
		$sql="UPDATE lbook_info_insert SET bname='$bname',aname='$aname',remarks='$remarks' WHERE bno='$bno'";
		return $query=$this->db->query($sql);
	}
	public function lbookinfocover_list_up($bno)
	{
		$query="SELECT bno,cover_file,content_file 
		FROM lbook_info_insert
		WHERE bno='$bno'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbookinfocoverlup($bno,$pic_file)
	{
		$sql="UPDATE lbook_info_insert SET cover_file='$pic_file' WHERE bno='$bno'";
		return $query=$this->db->query($sql);
	}
	public function lbookinfocontent_list_up($bno)
	{
		$query="SELECT bno,cover_file,content_file 
		FROM lbook_info_insert
		WHERE bno='$bno'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbookinfocontentlup($bno,$pic_file)
	{
		$sql="UPDATE lbook_info_insert SET content_file='$pic_file' WHERE bno='$bno'";
		return $query=$this->db->query($sql);
	}
	public function lbook_listid($bno)
	{
		$query="SELECT lbook_info_insert.bno,lbook_info_insert.bname,aname,remarks,cover_file,content_file,lcbname,lbook_category_insert.lcbid,lbnid,lbook_no.bnoblno,status,user.userid,ename,rdate,lbliid 
		FROM lbook_info_insert
		JOIN lbook_category_insert ON lbook_category_insert.lcbid=lbook_info_insert.lcbid
		JOIN lbook_no ON lbook_no.bno=lbook_info_insert.bno
		LEFT JOIN lbookinfo_lend_insert ON lbookinfo_lend_insert.bnoblno=lbook_no.bnoblno
		LEFT JOIN user ON user.userid=lbookinfo_lend_insert.userid 
		WHERE lbook_info_insert.bno='$bno'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbookinfo_lend_form($bnoblno)
	{
		$query="SELECT lbook_info_insert.bno,bname,aname,remarks,cover_file,content_file,lcbname,lbook_category_insert.lcbid,lbnid,bnoblno 
		FROM lbook_info_insert
		JOIN lbook_category_insert ON lbook_category_insert.lcbid=lbook_info_insert.lcbid
		JOIN lbook_no ON lbook_no.bno=lbook_info_insert.bno 
		WHERE bnoblno='$bnoblno'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbookinfo_lend_insert($bnoblno,$userid,$rdate)
	{
		$rdate=date("Y-m-d", strtotime($rdate));
		$sql="INSERT INTO lbookinfo_lend_insert VALUES ('','$bnoblno','$userid','$rdate','1')";
		$query=$this->db->query($sql);
		
		$sql1="INSERT INTO lbookinfo_lend_history VALUES ('','$bnoblno','$userid','$rdate','1')";
		$query1=$this->db->query($sql1);
		return $query;
	}
	public function lbookinfo_return_form($lbliid)
	{
		$query="SELECT lbook_info_insert.bno,lbook_info_insert.bname,aname,remarks,cover_file,content_file,lcbname,lbook_category_insert.lcbid,lbnid,lbook_no.bnoblno,status,user.userid,ename,rdate,lbliid 
		FROM lbook_info_insert
		JOIN lbook_category_insert ON lbook_category_insert.lcbid=lbook_info_insert.lcbid
		JOIN lbook_no ON lbook_no.bno=lbook_info_insert.bno
		LEFT JOIN lbookinfo_lend_insert ON lbookinfo_lend_insert.bnoblno=lbook_no.bnoblno
		LEFT JOIN user ON user.userid=lbookinfo_lend_insert.userid 
		WHERE lbliid='$lbliid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function lbookinfo_return($lbliid,$rdate)
	{
		$rdate=date("Y-m-d", strtotime($rdate));
		$sql="DELETE FROM lbookinfo_lend_insert WHERE lbliid='$lbliid'";
		$this->db->query($sql);
		
		$sql1="UPDATE lbookinfo_lend_history SET rdate='$rdate',status='0' WHERE lbliid='$lbliid'";
		return $query=$this->db->query($sql1);
	}
	
															/*****************INCOME TAX********************/
															
	public function incometax_insert($userid,$tc,$tz,$rnumber,$cnumber,$rfile,$cfile,$sdate,$fyear)
	{
		$sdate=date("Y-m-d", strtotime($sdate));
		$sql="SELECT * FROM incometax_insert WHERE userid='$userid' AND fyear='$fyear'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO incometax_insert VALUES ('','$userid','$tc','$tz','$rnumber','$cnumber','$rfile','$cfile','$sdate','$fyear')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	
	public function factorywise_incometax_list($factoryid)
	{
		$query="SELECT itid,user.userid,ename,echilddesignation,image,nid,tin,factoryid,rnumber,cnumber,rfile,cfile,fyear,tc,tz,sdate FROM user
		LEFT JOIN incometax_insert ON incometax_insert.userid=user.userid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
		WHERE factoryid='$factoryid' AND tin!='' ORDER BY user.userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incometax_list_up($itid)
	{
		$query="SELECT itid,user.userid,ename,image,nid,tin,factoryid,rnumber,cnumber,rfile,cfile,fyear,tc,tz,sdate FROM user
		LEFT JOIN incometax_insert ON incometax_insert.userid=user.userid
		WHERE itid='$itid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function incometaxlup($itid,$userid,$tc,$tz,$rnumber,$cnumber,$sdate)
	{
		$sdate=date("Y-m-d", strtotime($sdate));
		
		$sql1="UPDATE incometax_insert SET tc='$tc',tz='$tz',rnumber='$rnumber',cnumber='$cnumber',sdate='$sdate' WHERE itid='$itid'";
		return $query=$this->db->query($sql1);
	}
	
														/*****************MIS REPORT********************/
															
	public function mis_section_insert($name)
	{
		$sql="SELECT * FROM mis_section WHERE name='$name'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO mis_section VALUES ('','$name')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function mis_section_list()
	{
		$query="SELECT * FROM mis_section";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_designation_insert($msid,$name)
	{
		$sql="SELECT * FROM mis_designation WHERE msid='$msid' AND mdesignation='$name'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO mis_designation VALUES ('','$msid','$name')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function mis_designation_list()
	{
		$query="SELECT * FROM mis_designation
		JOIN mis_section ON mis_section.msid=mis_designation.msid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_designation_list_sewing()
	{
		$query="SELECT * FROM mis_designation
		JOIN mis_section ON mis_section.msid=mis_designation.msid
		WHERE mis_section.msid='2'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_type_insert($msid,$name)
	{
		$sql="SELECT * FROM mis_type WHERE mtype='$name'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO mis_type VALUES ('','$msid','$name')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function mis_type_list()
	{
		$query="SELECT * FROM mis_type";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_machine_insert($fid,$qty,$mudate)
	{
		$mudate=date("Y-m-d", strtotime($mudate));
		$mum=date("F", strtotime($mudate));
		$muy=date("Y", strtotime($mudate));
		$sql="SELECT * FROM mis_machine WHERE mudate='$mudate'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO mis_machine VALUES ('','$fid','$qty','$mudate','$mum','$muy')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function mis_machine_list()
	{
		$query="SELECT * FROM mis_machine";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_machine_list_up($mmid)
	{
		$query="SELECT * FROM mis_machine WHERE mmid='$mmid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mismachinelup($mmid,$qty,$mudate)
	{
		$mudate=date("Y-m-d", strtotime($mudate));
		$mum=date("F", strtotime($mudate));
		$muy=date("Y", strtotime($mudate));
		
		$sql1="UPDATE mis_machine SET qty='$qty',mudate='$mudate',mum='$mum',muy='$muy' WHERE mmid='$mmid'";
		return $query=$this->db->query($sql1);
	}
	public function mis_dailyinfo_insert($data)
	{
		//date_default_timezone_set('Asia/Dhaka');
		$cdate= date("Y-m-d", strtotime($data['cdate']));
		$mum=date("F", strtotime($cdate));
		$muy=date("Y", strtotime($cdate));
		$sql="INSERT INTO mis_dailyinfo VALUES ('','$data[fid]','$data[mtid]','$data[qty]','$cdate','$mum','$muy')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function mis_rs_insert($data)
	{
		//date_default_timezone_set('Asia/Dhaka');
		$cdate= date("Y-m-d", strtotime($data['cdate']));
		$mum=date("F", strtotime($cdate));
		$muy=date("Y", strtotime($cdate));
		//$data['stdophel']=$data['stdop']+$data['stdhel'];
		$sql="INSERT INTO mis_rs VALUES ('','$data[fid]','$data[misdid]','$data[rec]','$data[lefty]','$data[res]','$data[dis]','$data[ret]','$data[tra]','$data[std]',
		'$data[ex]','$data[pr]','$data[rm]','$data[le]','$cdate','$mum','$muy')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function mis_mrs_list()
	{
		$query="SELECT * FROM mis_rs
		
		JOIN mis_stde ON mis_stde.fid=mis_rs.fid
		JOIN mis_section ON mis_section.msid=mis_rs.msid AND
		 		 mis_stde.msid=mis_rs.msid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_drs_list($cdate,$factoryid)
	{
		$cdate=date("Y-m-d", strtotime($cdate));
		$query="SELECT * FROM mis_rs
		JOIN mis_designation ON mis_designation.misdid=mis_rs.misdid
		JOIN mis_section ON mis_section.msid=mis_designation.msid
		WHERE cdate='$cdate'AND fid='$factoryid'
		ORDER BY mis_rs.fid,cdate";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_rs_list_up($mrsid)
	{
		$query="SELECT * FROM mis_rs
		JOIN mis_designation ON mis_designation.misdid=mis_rs.misdid
		JOIN mis_section ON mis_section.msid=mis_designation.msid
		WHERE mrsid='$mrsid'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function misrslup($mrsid,$rec,$lefty,$res,$dis,$ret,$tra,$std,$ex,$pr,$rm,$le,$cdate)
	{
		$cdate=date("Y-m-d", strtotime($cdate));
		$mum=date("F", strtotime($cdate));
		$muy=date("Y", strtotime($cdate));
		
		$sql1="UPDATE mis_rs SET rec='$rec',lefty='$lefty',res='$res',dis='$dis',ret='$ret',tra='$tra',std='$std',ex='$ex',pr='$pr',rm='$rm',le='$le',cdate='$cdate',mum='$mum',muy='$muy' WHERE mrsid='$mrsid'";
		return $query=$this->db->query($sql1);
	}
	public function mis_stde_insert($fid,$mtid,$qty,$mudate)
	{
		$mudate=date("Y-m-d", strtotime($mudate));
		$mum=date("F", strtotime($mudate));
		$muy=date("Y", strtotime($mudate));
		$sql="SELECT * FROM mis_stde WHERE fid='$fid' AND mtid='$mtid' AND smuy='$muy'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
		$sql="INSERT INTO mis_stde VALUES ('','$fid','$mtid','$qty','$mudate','$mum','$muy')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function mis_stde_list()
	{
		$query="SELECT * FROM mis_stde
		LEFT JOIN mis_section ON mis_section.msid=mis_stde.msid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_rs_rec_view4($cdate)
	{
		$query="SELECT * FROM mis_rs_rec_view4
		JOIN mis_designation ON mis_designation.misdid=mis_rs_rec_view4.misdid
		WHERE cdate='$cdate'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_rs_rec_view6($cdate)
	{
		$mum=date("F", strtotime($cdate));
		$query="SELECT * FROM mis_rs_rec_view6
		WHERE mum='$mum'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
																/*****************REGISTER LETTER********************/
	
	public function lettertype_insert($lettertype)
	{
		$sql="INSERT INTO regis_letter_type VALUES ('','$lettertype')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function lettertype_list()
	{
		$query="SELECT * FROM regis_letter_type ORDER BY ltypename ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function rletter_insert($fid,$ltype,$userid,$cuserid,$issuedate)
	{
		$issuedate=date("Y-m-d", strtotime($issuedate));
		$sql="INSERT INTO rletter_insert VALUES ('','$fid','$ltype','$userid','$cuserid','$issuedate')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function datewise_regisletter_list($pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		
		$query="SELECT (SELECT ename FROM user WHERE user.userid=rletter_insert.userid) AS user,
		(SELECT ename FROM user WHERE user.userid=rletter_insert.cuserid) AS prepare,
		rlid,issuedate,fid,userid,ltypename,cuserid 
		FROM rletter_insert 
		JOIN regis_letter_type 
		ON rletter_insert.ltype=regis_letter_type.rltid
		WHERE issuedate BETWEEN '$pd' AND '$wd'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function datewiseuser_regisletter_list($userid,$pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		
		$query="SELECT (SELECT ename FROM user WHERE user.userid=rletter_insert.userid) AS user,
		(SELECT ename FROM user WHERE user.userid=rletter_insert.cuserid) AS prepare,
		rlid,issuedate,fid,userid,ltypename,cuserid 
		FROM rletter_insert 
		JOIN regis_letter_type 
		ON rletter_insert.ltype=regis_letter_type.rltid
		WHERE rletter_insert.userid='$userid' AND issuedate BETWEEN '$pd' AND '$wd'";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function datewise_regisletter_listsummary($pd,$wd)
	{
		$pd=date("Y-m-d", strtotime($pd));
		$wd=date("Y-m-d", strtotime($wd));
		
		$query="SELECT COUNT(ltype) AS tltype,(SELECT ename FROM user WHERE user.userid=rletter_insert.userid) AS user,
		(SELECT ename FROM user WHERE user.userid=rletter_insert.cuserid) AS prepare,
		rlid,issuedate,fid,userid,ltypename,cuserid 
		FROM rletter_insert 
		JOIN regis_letter_type 
		ON rletter_insert.ltype=regis_letter_type.rltid
		WHERE issuedate BETWEEN '$pd' AND '$wd'
		GROUP BY rletter_insert.userid,ltype";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
																/*****************EVENT********************/
															
	public function mis_event_insert($fid,$eventname,$edate)
	{
		$edate=date("Y-m-d", strtotime($edate));
		$sql="INSERT INTO mis_event VALUES ('','$fid','$eventname','$edate')";
		$query=$this->db->query($sql);
		return $query;
	}
	public function mis_event_list_currentday()
	{
		$query="SELECT * FROM mis_event WHERE edate=CURDATE()";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_event_list_nextday()
	{
		$query="SELECT * FROM mis_event WHERE edate=CURDATE() + INTERVAL 1 DAY";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_event_list_dayaftertomorrow()
	{
		$query="SELECT * FROM mis_event WHERE edate=CURDATE() + INTERVAL 2 DAY";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_event_list_nextsevenday()
	{
		$query="SELECT * FROM mis_event WHERE edate BETWEEN CURDATE() + INTERVAL 3 DAY AND CURDATE() + INTERVAL 10 DAY";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function mis_event_list_upcomming()
	{
		$query="SELECT * FROM mis_event WHERE edate BETWEEN CURDATE() + INTERVAL 11 DAY AND CURDATE() + INTERVAL 130 DAY";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	
															
	
															/*****************LIVE SEARCH********************/
	// set user id
    public function setuserid($userid) {
        return $this->_userid = $userid;
    }
    // set user Name
    public function setename($ename) {
        return $this->_ename = $ename;
    }
	// set user Name
    public function setimage($image) {
        return $this->_image = $image;
    }
    // get All user
    public function getalluserid() {
        $this->db->select(array('userid as userid', 'ename as ename', 'image as image'));
        $this->db->from('user_staff as user_staff');
        $this->db->like('ename', $this->_ename, 'both');
        $query = $this->db->get();
        return $query->result_array();
    }
	function fetch_data($query)
 {
  $this->db->like('ename', $query);
  $query = $this->db->get('user');
  if($query->num_rows() > 0)
  {
   foreach($query->result_array() as $row)
   {
    $output[] = array(
	 'userid'  => $row["userid"],
     'ename'  => $row["ename"],
     'image'  => $row["image"]
    );
   }
   echo json_encode($output);
  }
 }
}
