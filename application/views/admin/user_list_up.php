<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
	})
</script> 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
   <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
         
         
          
          <!-- /.box -->

          <!-- About Me Box -->
        
          <!-- /.box -->
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">User Details</a></li>
            
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               
               <?php foreach($ulup as $row)
				{ ?>
              <form role="form" action="<?php echo base_url();?>Dashboard/ulup" method="post" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="userid" value="<?php echo $row['userid']; ?>">
              <div class="form-group">
					<label>Factory</label>
					<select class="form-control" name="factoryid" id="factoryid">
                    	<option value="<?php echo $row['factoryid']; ?>"><?php echo $row['factoryname']; ?></option>
                        <?php
						foreach($fl as $row3)
						{
					?>
                    		<option value="<?php echo $row3['factoryid'];?>"><?php echo $row3['factoryname'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php /*?><?php echo $row['factoryname']; ?><?php */?>
                    <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Division<em>*</em></label>
					<select class="form-control" name="divisionid" id="divisionid">
                    	<option value="<?php echo $row['diviid'];?>"><?php echo $row['divisionname'];?></option>
                        
                    </select>
                    <?php /*?><?php echo $row['divisionname'];?><?php */?>
				</div>
             	<div class="form-group">
					<label>Department<em>*</em></label>
						<select class="form-control" name="departmentid" id="departmentid">
                    		<option value="<?php echo $row['departmentid'];?>"><?php echo $row['departmentname'];?></option>
                        </select>
				</div>
                <?php /*?><?php echo $row['departmentname'];?><?php */?>
                <div class="form-group">
					<label>Section<em>*</em></label>
						<select class="form-control" name="sectionid" id="sectionid">
                    		<option value="<?php echo $row['sectionid'];?>"><?php echo $row['sectionname'];?></option>
                        </select>
				</div>
                <?php /*?><?php echo $row['sectionname'];?><?php */?>
                <div class="form-group">
					<label>Sub Section<em>*</em></label>
						<select class="form-control" name="subsectionid" id="subsectionid">
                    		<option value="<?php echo $row['subsectionid'];?>"><?php echo $row['subsectionname'];?></option>
                        </select>
				</div>
                <?php /*?><?php echo $row['subsectionname'];?><?php */?>
                <div class="form-group">
					<label>Location<em>*</em></label>
					<input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>">
                    <?php echo form_error('location', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Name(English)<em>*</em></label>
					<input type="text" class="form-control" name="ename" value="<?php echo $row['ename']; ?>">
                    <?php echo form_error('ename', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>নাম (বাংলা)<em>*</em></label>
					<input type="text" class="form-control" name="bname" value="<?php echo $row['bname']; ?>">
                    <?php echo form_error('bname', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Designation<em>*</em></label>
					<select class="form-control" name="parentdesignationid" id="parentdesignationid">
                    	<option value="<?php echo $row['parentdesignationid'];?>"><?php echo $row['eparentdesignation'];?></option>
                        <?php
						foreach($pul as $row3)
						{
					?>
                    		<option value="<?php echo $row3['parentdesignationid'];?>"><?php echo $row3['eparentdesignation'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('parentdesignationid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Sub Designation<em>*</em></label>
						<select class="form-control" name="childdesignationid" id="childdesignationid">
                    		<option value="<?php echo $row['childdesignationid'];?>"><?php echo $row['echilddesignation'];?></option>
                        </select>
				</div>
                <div class="form-group">
					<label>Religion<em>*</em></label>
					<select class="form-control" name="religion" id="religion">
                    	<option value="<?php echo $row['religionid'];?>"><?php echo $row['religionname'];?></option>
                        <?php
						foreach($rul as $row3)
						{
					?>
                    		<option value="<?php echo $row3['religionid'];?>"><?php echo $row3['religionname'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('religionid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Marital Status<em>*</em></label>
					<select class="form-control" name="maritual" id="maritual">
                    	<option value="<?php echo $row['maritualstatusid'];?>"><?php echo $row['maritualstatus'];?></option>
                        <?php
						foreach($mul as $row3)
						{
					?>
                    		<option value="<?php echo $row3['maritualstatusid'];?>"><?php echo $row3['maritualstatus'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('maritualstatusid', '<div class="error">', '</div>');  ?>
				</div>
				<div class="form-group">
					<label>Date Of Birth<em>*</em></label>
					<input type="text" class="form-control pd" name="dobdate" value="<?php echo $row['dob']; ?>">
                    <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */?>
				</div>
                <div class="form-group">
					<label>Date Of Join<em>*</em></label>
					<input type="text" class="form-control pd" name="dojdate" value="<?php echo $row['doj']; ?>">
                   <?php /*?> <?php echo form_error('dojdate', '<div class="error">', '</div>');  ?><?php */?>
				</div>
                <div class="form-group">
					<label>Home District<em>*</em></label>
					<input type="text" class="form-control" name="hdistrict" value="<?php echo $row['hdistrict']; ?>">
                    <?php echo form_error('hdistrict', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Permanent Address(English)<em>*</em></label>
					<input type="text" class="form-control" name="epermanentaddress" value="<?php echo $row['epermanentaddress']; ?>">
                    <?php echo form_error('epermanentaddress', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>স্থায়ী ঠিকানা (বাংলা)<em>*</em></label>
					<input type="text" class="form-control" name="bpermanentaddress" value="<?php echo $row['bpermanentaddress']; ?>">
                    <?php echo form_error('bpermanentaddress', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Present Address(English)<em>*</em></label>
					<input type="text" class="form-control" name="epresentaddress" value="<?php echo $row['epresentaddress']; ?>">
                    <?php echo form_error('epresentaddress', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>বর্তমান ঠিকানা(বাংলা)<em>*</em></label>
					<input type="text" class="form-control" name="bpresentaddress" value="<?php echo $row['bpresentaddress']; ?>">
                    <?php echo form_error('bpresentaddress', '<div class="error">', '</div>');  ?>
				</div>
				<div class="form-group">
					<label>NID<em>*</em></label>
					<input type="text" class="form-control" name="nid" value="<?php echo $row['nid']; ?>">
                    <?php echo form_error('nid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>TIN Number<em>*</em></label>
					<input type="text" class="form-control" name="tin" value="<?php echo $row['tin']; ?>">
                    <?php echo form_error('tin', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Blood Group<em>*</em></label>
					<input type="text" class="form-control" name="bloodgroup" value="<?php echo $row['blodgroup']; ?>">
                    <?php echo form_error('bloodgroup', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Gender<em>*</em></label>
					<select class="form-control" name="gender" id="gender">
                    	<option value="<?php echo $row['genderid'];?>"><?php echo $row['gender'];?></option>
                        <?php
						foreach($gul as $row3)
						{
					?>
                    		<option value="<?php echo $row3['genderid'];?>"><?php echo $row3['gender'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('genderid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Salary<em>*</em></label>
					<input type="text" class="form-control" name="salary" value="<?php echo $row['salary']; ?>">
                    <?php echo form_error('salary', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Efficiency<em>*</em></label>
					<input type="text" class="form-control" name="efficiency" value="<?php echo $row['efficiency']; ?>">
                    <?php echo form_error('efficiency', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Identification Mark<em>*</em></label>
					<input type="text" class="form-control" name="imark" value="<?php echo $row['identification']; ?>">
                    <?php echo form_error('imark', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Office Email<em>*</em></label>
					<input type="text" class="form-control" name="oemail" value="<?php echo $row['oemail']; ?>">
                    <?php echo form_error('oemail', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Personal Email<em>*</em></label>
					<input type="text" class="form-control" name="pemail" value="<?php echo $row['pemail']; ?>">
                    <?php echo form_error('pemail', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Personal Mobile<em>*</em></label>
					<input type="text" class="form-control" name="pmobile" value="<?php echo $row['pmobile']; ?>">
                    <?php echo form_error('pmobile', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Emergency Mobile<em>*</em></label>
					<input type="text" class="form-control" name="emobile" value="<?php echo $row['emobile']; ?>">
                    <?php echo form_error('emobile', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>User Type<em>*</em></label>
					<select class="form-control" name="usertypeid" id="usertypeid">
                    	<option value="<?php echo $row['usertypeid'];?>"><?php echo $row['usertype'];?></option>
                        <?php
						foreach($uul as $row3)
						{
					?>
                    		<option value="<?php echo $row3['usertypeid'];?>"><?php echo $row3['usertype'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php /*?><?php echo $row['usertype'];?><?php */?>
                    <?php echo form_error('usertypeid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Service Type<em>*</em></label>
					<select class="form-control" name="servicetypeid" id="servicetypeid">
                    	<option value="<?php echo $row['servicetypeid'];?>"><?php echo $row['servicetype'];?></option>
                        <?php
						foreach($sl as $row4)
						{
					?>
                    		<option value="<?php echo $row4['servicetypeid'];?>"><?php echo $row4['servicetype'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php /*?><?php echo $row['servicetype'];?><?php */?>
                    <?php echo form_error('servicetypeid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Work Type<em>*</em></label>
					<select class="form-control" name="worktypeid" id="worktypeid">
                    	<option value="<?php echo $row['wtid'];?>"><?php echo $row['worktype'];?></option>
                        <?php
						foreach($wl as $row6)
						{
					?>
                    		<option value="<?php echo $row6['wtid'];?>"><?php echo $row6['worktype'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('worktypeid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>User Status<em>*</em></label>
					<select class="form-control" name="userstatusid" id="userstatusid">
                    	<option value="<?php echo $row['userstatusid'];?>"><?php echo $row['userstatus'];?></option>
                        <?php
						foreach($usl as $row5)
						{
					?>
                    		<option value="<?php echo $row5['userstatusid'];?>"><?php echo $row5['userstatus'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php /*?><?php echo $row['userstatus'];?><?php */?>
                    <?php echo form_error('userstatusid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>User ID<em>*</em></label>
					<input type="text" class="form-control" name="tuserid" placeholder="Enter New User ID If User Transfer">
                    <?php //echo form_error('userid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                    <?php echo form_error('password', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Probation Period<em>*</em></label>
					<input type="text" class="form-control" name="pperiod" value="<?php echo $row['pperiod']; ?>">
                    <?php echo form_error('pperiod', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Probation Period Status(0=Completed,1=Running,2=Processing)<em>*</em></label>
					<input type="text" class="form-control" name="pperiodstatus" value="<?php echo $row['pperiod_status']; ?>">
                    <?php echo form_error('pperiodstatus', '<div class="error">', '</div>');  ?>
				</div> 
                <div class="form-group">
					<label>Commitment<em>*</em></label>
					<input type="text" class="form-control" name="commitment" value="<?php echo $row['commitment']; ?>">
                    <?php echo form_error('commitment', '<div class="error">', '</div>');  ?>
				</div> 
                <?php
					if($row['indate']=="0000-00-00")
					{
						$indate="0000-00-00";
						//$indate= date("d-m-Y", strtotime($indate));
					}
					else
					{
						$indate=$row['indate'];
						$indate= date("d-m-Y", strtotime($indate));
					}
				?>
				<div class="form-group">
					<label>Date Of Inactive<em>*</em></label>
					<input type="text" class="form-control pd" name="indate" value="<?php echo $indate; ?>">
                   <?php /*?> <?php echo form_error('dojdate', '<div class="error">', '</div>');  ?><?php */?>
				</div>
                
				
				
				
				
               
    
                

             
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                </div>
				 </form>
					
				<?php } ?>	
              </div>
             

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->

<script type="text/javascript">
$(document).ready(function(){

    $('#factoryid').change(function(event){
        event.preventDefault();
		var factoryid = $('#factoryid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_divisionname",
			dataType:"json",
                    data:{ factoryid:factoryid},
            success:function(res)
            	{
         		 	$('#divisionid').find('option').not(':first').remove();;
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#divisionid').append('<option value="'+data['divisionid']+'">'+data['divisionname']+'</option>');
          			});
				}
        	});
    	});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){

    $('#divisionid').change(function(event){
        event.preventDefault();
		var factoryid = $('#factoryid').val();
		var divisionid = $('#divisionid').val();
        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_departmentname",
			dataType:"json",
                    data:{ factoryid:factoryid,divisionid:divisionid},
            success:function(res)
            	{
         		 	$('#departmentid').find('option').not(':first').remove();;
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#departmentid').append('<option value="'+data['deptid']+'">'+data['departmentname']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#departmentid').change(function(event){
        event.preventDefault();
		var factoryid = $('#factoryid').val();
		var divisionid = $('#divisionid').val();
		var departmentid = $('#departmentid').val();
        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_sectionname",
			dataType:"json",
                    data:{ factoryid:factoryid,divisionid:divisionid,departmentid:departmentid},
            success:function(res)
            	{
         		 	$('#sectionid').find('option').not(':first').remove();;
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#sectionid').append('<option value="'+data['secid']+'">'+data['sectionname']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#sectionid').change(function(event){
        event.preventDefault();
		var factoryid = $('#factoryid').val();
		var divisionid = $('#divisionid').val();
		var departmentid = $('#departmentid').val();
		var sectionid = $('#sectionid').val();
        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_subsectionname",
			dataType:"json",
                    data:{ factoryid:factoryid,divisionid:divisionid,departmentid:departmentid,sectionid:sectionid},
            success:function(res)
            	{
         		 	$('#subsectionid').find('option').not(':first').remove();;
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#subsectionid').append('<option value="'+data['subsecid']+'">'+data['subsectionname']+'</option>');
          			});
				}
        	});
    	});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){

    $('#parentdesignationid').change(function(event){
        event.preventDefault();
		var parentdesignationid = $('#parentdesignationid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_childdesignationname",
			dataType:"json",
                    data:{ parentdesignationid:parentdesignationid},
            success:function(res)
            	{
         		 	$('#childdesignationid').find('option').not(':first').remove();;
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#childdesignationid').append('<option value="'+data['childdesignationid']+'">'+data['echilddesignation']+'</option>');
          			});
				}
        	});
    	});
	});
</script>
