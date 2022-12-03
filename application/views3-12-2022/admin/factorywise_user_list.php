<style type="text/css">

.paging-nav {
  text-align: right;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background: #91b9e6;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #187ed5;
  font-weight: bold;
}

.paging-nav,
#tableData {
  
 
  text-align:center;
}
th,td{font-size:12px;text-align:center;}
div.scrollable-table-wrapper {
  height: 1000px;
  overflow: auto;
}
.header {
            position: sticky;
            top:0;
        }
</style>

                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            
            <form action="<?php echo base_url() ?>Dashboard/userexport_xls" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="row padall">  
        <div class="col-lg-12">
        <div class="float-right"> 
        <?php
        foreach($ul as $row1)
				{ ?> 
                <input type="hidden" name="factoryid" value="<?php echo $row1['factoryid'];?>" />
                <?php
				}
				?>
          <input type="radio" checked="checked" name="export_type" value="xlsx"> .xlsx
          <input type="radio" name="export_type" value="xls"> .xls
          <input type="radio" name="export_type" value="csv"> .csv
          <button type="submit" name="import" class="btn btn-primary">Export</button>
          </div> 
        </div>
        </div>
      </form>
             	<div class="scrollable-table-wrapper">
                <table id="tableData" class="table table-hover table-bordered">
              	<thead style="background:#91b9e6;position: sticky;top: 0;">
                <tr>
                  <th>SL</th>
                  <!--<th>Image</th>-->
                  <th>Edit</th>
                  <th>ID</th>
                  <th>Name</th>
                  <!--<th>Factory</th>
                  <th>Division</th>
                  <th>Department</th>
                  <th>Section</th>
                  <th>Sub Section</th>
                  <th>Religion</th>
                  <th>Marital Status</th>
                  <th>Gender</th>
                  <th>Salary</th>
                  <th>P.Designation</th>
                  <th>C.Designation</th>
                  <th>Office Email</th>
                  <th>Personal Email</th>
                  <th>Personal Mobile</th>
                  <th>Emergency Mobile</th>
                  <th>Date Of Birth</th>-->
                  <th>Date of Join</th>
                  <!--<th>Home District</th>
                  <th>Permanent Address (English)</th>
                  <th>Pemanent Address (Bangla)</th>
                  <th>Present Address (English)</th>
                  <th>Presentt Address (Bangla)</th>
                  <th>National ID</th>
                  <th>Blood Group</th>
                  <th>Efficiency</th>
                  <th>Identification</th>-->
                  <th>User Type</th>
                  <th>Service Type</th>
                  <th>Work Type</th>
                  <th>User Status</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				foreach($ul as $row)
				{ ?>
                <tr>
                  <td style="vertical-align:middle;"><?php echo $i++;?></td>
                  <?php /*?><td><img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url().'assets/uploads/employee/'.$row['image'];?>" alt="User profile picture"></td><?php */?>
                  <?php /*?><td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/user_imglist_up/<?php echo $bn=$row['userid'];?>"><img class="profile-user-img img-responsive" src="<?php echo base_url().'assets/uploads/users/'.$row['image'];?>" alt="User profile picture"></a></td><?php */?>
                 <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/user_list_up/<?php echo $bn=$row['userid'];?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td> 
                 <td style="vertical-align:middle;"><a target="_blank" href="<?php echo base_url();?>Dashboard/user_profile/<?php echo $bn=$row['userid'];?>"><?php echo $row['userid'];?></a></td>
                  <?php /*?><td style="vertical-align:middle;"><?php echo $row['userid'];?></td><?php */?>
                  
                  <td style="vertical-align:middle;"><?php echo $row['ename'];?></td>
                  <?php /*?><td style="vertical-align:middle;"><?php echo $row['factoryname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['divisionname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['departmentname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['sectionname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['subsectionname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['religionname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['maritualstatus'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['gender'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['salary'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['eparentdesignation'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['echilddesignation'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['oemail'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['pemail'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['pmobile'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['emobile'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['dob'];?></td><?php */?>
                  <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['doj']));?></td>
                  <?php /*?><td style="vertical-align:middle;"><?php echo $row['hdistrict'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['epermanentaddress'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['bpermanentaddress'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['epresentaddress'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['bpresentaddress'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['nid'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['blodgroup'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['efficiency'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['identification'];?></td><?php */?>
                  <td style="vertical-align:middle;"><?php echo $row['usertype'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['servicetype'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['worktype'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['userstatus'];?></td>
                  
                </tr>
                </tbody>
               <?php } ?>
              </table>
              </div>
            </div>
            
            <!-- /.box-body -->
         
