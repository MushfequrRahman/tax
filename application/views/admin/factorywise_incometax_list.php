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
		.zoom {
  /*padding: 50px;*/
  
  transition: transform .2s; /* Animation */
 /* width: 200px;*/
 /* height: 200px;
  margin: 0 auto;*/
}

.zoom:hover {
  transform: scale(3.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
@keyframes up-right {
    0% {
        transform: scale(1);
        opacity: .25
    }
    50% {
        transform: scale (1, 5);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: .25;
    }
}
</style>

                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            
            <?php /*?><form action="<?php echo base_url() ?>Dashboard/userexport_xls" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
      </form><?php */?>
             	<div class="scrollable-table-wrapper">
                <table id="tableData" class="table table-hover table-bordered">
              	<thead style="background:#91b9e6;position: sticky;top: 0;">
                <tr>
                  <th>SL</th>
                  
                  <th>Factory</th>
                  <th>Employee ID</th>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Tin Number</th>
                  <th>Tax Circle</th>
                  <th>Tax Zone</th>
                  <th>Acknowledgment Slip Number</th>
                  <th>Upload Date</th>
                  <th>Assesment Year</th>
                  <th>Remarks</th>
                  <!--<th>Edit</th>-->
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				foreach($ul as $row)
				{ ?>
                <tr>
                  <td style="vertical-align:middle;"><?php echo $i++;?></td>
                 
                  
                 
                  <td style="vertical-align:middle;"><?php echo $row['fid'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['userid'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['sname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['name'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['department'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['designation'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['mobile'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['email'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['tin'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['tc'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['tz'];?></td>
                  <?php 
				  	if($row['rfile']!='')
					{
						?>
                  <td style="vertical-align:middle;"><img style="width:150px; height:150px;" class="zoom" src="<?php echo base_url().'assets/uploads/income_tax/'.$row['rfile'];?>" alt="Return File"><br/><strong><?php echo $row['rnumber'];?></strong></td>
                  <?php
					}
					else
					{
					?>
                    <td style="vertical-align:middle;">No File<br/><strong><?php echo $row['rnumber'];?></strong></td>
                    <?php
					}
					?>
                     
                   <?php 
				   if($row['sdate']=='0000-00-00')
				   {
					   ?>
                   <td style="vertical-align:middle;">0000-00-00</td>
                   <?php
				   }
				   else
				   {
				   ?>
                  <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['sdate']));?></td>
                  <?php
				   }
				   ?>
                  <td style="vertical-align:middle;"><?php echo $row['fyear'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['remarks'];?></td>
                  <?php /*?><td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/incometax_list_up/<?php echo $bn=$row['itid'];?>"><i class="fa fa-edit" style="font-size:22px"></i></a></td><?php */?>
                </tr>
                </tbody>
               <?php } ?>
              </table>
              </div>
            </div>
            
            <!-- /.box-body -->
         
