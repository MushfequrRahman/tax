<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

	
	
	
	
	
	
	
	
	
	
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
	public function type_list()
	{
		$query="SELECT * FROM type";
		$result=$this->db->query($query);
		return $result->result_array();
		
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
	
	
	
	public function user_insert($factoryid,$name,$usertypeid,$userid,$password)
	{
		
		$sql="INSERT INTO user VALUES ('$factoryid','$name','$usertypeid','$userid','$password')";
		$query=$this->db->query($sql);
		return $query;
		
	}
	
	public function user_list()
	{
		$sql="SELECT * FROM user
		JOIN usertype ON usertype.usertypeid=user.user_type";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
		
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
	
	
	
	
	
	
	
	
	
												
	
											

	
	
	
															
	
															/*****************INCOME TAX********************/
															
	public function incometax_insert($fid,$tid,$userid,$name,$dept,$desig,$mobile,$oemail,$tin,$tc,$tz,$rnumber,$rfile,$fyear,$remarks)
	{
		//$sdate=date("Y-m-d", strtotime($sdate));
		$ipaddress = getenv("REMOTE_ADDR") ;
		$suserid=$fid.$userid;
		$sql="SELECT * FROM incometax_insert WHERE userid='$userid' AND fyear='$fyear'";
		$query=$this->db->query($sql);
		if($query->num_rows()==1)
		{
			//return false;
			$sql="UPDATE incometax_insert SET fid='$fid',type='$tid',name='$name',department='$dept',designation='$desig',mobile='$mobile',email='$oemail',tin='$tin',tc='$tc',tz='$tz',rnumber='$rnumber',remarks='$remarks',rfile='$rfile',sdate=CURDATE(),stime=CURTIME(),ip='$ipaddress' WHERE userid='$userid' AND fyear='$fyear'";
			$query=$this->db->query($sql);
			return $query;
		}
		else
		{
		$sql="INSERT INTO incometax_insert VALUES ('','$fid','$tid','$userid','$suserid','$name','$dept','$desig','$mobile','$oemail','$tin','$tc','$tz','$rnumber','$remarks','$rfile',CURDATE(),CURTIME(),'$fyear','$ipaddress')";
		$query=$this->db->query($sql);
		return $query;
		}
	}
	public function fiscal_year_list()
	{
		$query="SELECT DISTINCT(fyear) AS dfyear FROM incometax_insert";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	public function factorywise_incometax_list($factoryid,$fyear)
	{
		$query="SELECT * FROM incometax_insert
		WHERE fid='$factoryid' AND fyear='$fyear' ORDER BY userid";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	//public function incometax_list_up($itid)
//	{
//		$query="SELECT itid,user.userid,ename,image,nid,tin,factoryid,rnumber,cnumber,rfile,cfile,fyear,tc,tz,sdate FROM user
//		LEFT JOIN incometax_insert ON incometax_insert.userid=user.userid
//		WHERE itid='$itid'";
//		$result=$this->db->query($query);
//		return $result->result_array();
//	}
	//public function incometaxlup($itid,$userid,$tc,$tz,$rnumber,$cnumber,$sdate)
//	{
//		$sdate=date("Y-m-d", strtotime($sdate));
//		
//		$sql1="UPDATE incometax_insert SET tc='$tc',tz='$tz',rnumber='$rnumber',cnumber='$cnumber',sdate='$sdate' WHERE itid='$itid'";
//		return $query=$this->db->query($sql1);
//	}
	
														
}
