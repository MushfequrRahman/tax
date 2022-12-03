<style>
.error{color:red;}
em{color:red;}
</style>
<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
	jQuery(".wd").datepicker({dateFormat: 'dd-mm-yy'});
	})
</script> 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      

      

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
      
          <div class="row">
           
            <!-- /.col -->

            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">User Info Insert</h3>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<?php if($responce = $this->session->flashdata('Successfully')): ?>
								<div class="text-center">
									<div class="alert alert-success text-center"><?php echo $responce;?></div>
								</div>
							<?php endif;?>
						</div>
					</div>
              
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
				 <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/user_insert" method="post" enctype="multipart/form-data">
                  <div class="form-group">
					<label>Factory Name<em>*</em></label>
					<select class="form-control" name="factoryid" id="factoryid">
                    	<option value="">Select....</option>
                        <?php
						foreach($allf as $row)
						{
					?>
                    		<option value="<?php echo $row['factoryid'];?>"><?php echo $row['factoryname'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
				</div>
                 <div class="form-group">
					<label>Division<em>*</em></label>
					<select class="form-control" name="divisionid" id="divisionid">
                    	<option value="">Select....</option>
                        
                    </select>
                    
				</div>
				<div class="form-group">
					<label>Department<em>*</em></label>
						<select class="form-control" name="departmentid" id="departmentid">
                    		<option value="">Select....</option>
                        </select>
				</div>
                <div class="form-group">
					<label>Section<em>*</em></label>
						<select class="form-control" name="sectionid" id="sectionid">
                    		<option value="">Select....</option>
                        </select>
				</div>
                <div class="form-group">
					<label>Sub Section<em>*</em></label>
						<select class="form-control" name="subsectionid" id="subsectionid">
                    		<option value="">Select....</option>
                        </select>
				</div>
                <div class="form-group">
					<label>Location<em>*</em></label>
					<input type="text" class="form-control" name="location" placeholder="Enter Location">
                    <?php echo form_error('location', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Name(English)<em>*</em></label>
					<input type="text" class="form-control" name="ename" placeholder="Enter Name">
                    <?php echo form_error('ename', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>নাম (বাংলা)<em>*</em></label>
					<input type="text" class="form-control" name="bname" placeholder="আপনার নাম">
                    <?php echo form_error('bname', '<div class="error">', '</div>');  ?>
				</div>
                <?php /*?><div class="form-group">
					<label>Designation(English)<em>*</em></label>
					<input type="text" class="form-control" name="edesignation" placeholder="Enter Designation">
                    <?php echo form_error('edesignation', '<div class="error">', '</div>');  ?>
				</div><?php */?>
                <?php /*?><div class="form-group">
					<label>পদবী (বাংলা)<em>*</em></label>
					<input type="text" class="form-control" name="bdesignation" placeholder="আপনার পদবী">
                    <?php echo form_error('bdesignation', '<div class="error">', '</div>');  ?>
				</div><?php */?>
                <div class="form-group">
					<label>Designation<em>*</em></label>
					<select class="form-control" name="parentdesignationid" id="parentdesignationid">
                    	<option value="">Select....</option>
                        <?php
						foreach($pul as $row)
						{
					?>
                    		<option value="<?php echo $row['parentdesignationid'];?>"><?php echo $row['eparentdesignation'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('parentdesignationid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Sub Designation<em>*</em></label>
						<select class="form-control" name="childdesignationid" id="childdesignationid">
                    		<option value="">Select....</option>
                        </select>
				</div>
				<?php /*?><div class="form-group">
					<label>Religion<em>*</em></label>
					<input type="text" class="form-control" name="religion" placeholder="Enter Religion">
                    <?php echo form_error('religion', '<div class="error">', '</div>');  ?>
				</div><?php */?>
                <div class="form-group">
					<label>Religion<em>*</em></label>
					<select class="form-control" name="religion" id="religion">
                    	<option value="">Select....</option>
                        <?php
						foreach($rul as $row)
						{
					?>
                    		<option value="<?php echo $row['religionid'];?>"><?php echo $row['religionname'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('religionid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Marital Status<em>*</em></label>
					<select class="form-control" name="maritual" id="maritual">
                    	<option value="">Select....</option>
                        <?php
						foreach($mul as $row)
						{
					?>
                    		<option value="<?php echo $row['maritualstatusid'];?>"><?php echo $row['maritualstatus'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('maritualstatusid', '<div class="error">', '</div>');  ?>
				</div>
				<div class="form-group">
					<label>Date Of Birth<em>*</em></label>
					<input type="text" class="form-control pd" name="dobdate" value="<?php echo date('d-m-Y');?>">
                    <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */?>
				</div>
                <div class="form-group">
					<label>Date Of Join<em>*</em></label>
					<input type="text" class="form-control pd" name="dojdate" value="<?php echo date('d-m-Y');?>">
                   <?php /*?> <?php echo form_error('dojdate', '<div class="error">', '</div>');  ?><?php */?>
				</div>
                <div class="form-group">
					<label>Home District<em>*</em></label>
					<input type="text" class="form-control" name="hdistrict" placeholder="Enter Home District">
                    <?php echo form_error('hdistrict', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Permanent Address(English)<em>*</em></label>
					<input type="text" class="form-control" name="epermanentaddress" placeholder="Enter Permanent Address">
                    <?php echo form_error('epermanentaddress', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>স্থায়ী ঠিকানা (বাংলা)<em>*</em></label>
					<input type="text" class="form-control" name="bpermanentaddress" placeholder="স্থায়ী ঠিকানা">
                    <?php echo form_error('bpermanentaddress', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Present Address(English)<em>*</em></label>
					<input type="text" class="form-control" name="epresentaddress" placeholder="Enter Present Address">
                    <?php echo form_error('epresentaddress', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>বর্তমান ঠিকানা(বাংলা)<em>*</em></label>
					<input type="text" class="form-control" name="bpresentaddress" placeholder="বর্তমান ঠিকানা">
                    <?php echo form_error('bpresentaddress', '<div class="error">', '</div>');  ?>
				</div>
				<div class="form-group">
					<label>NID<em>*</em></label>
					<input type="text" class="form-control" name="nid" placeholder="Enter NID Number">
                    <?php echo form_error('nid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>TIN Number<em>*</em></label>
					<input type="text" class="form-control" name="tin" placeholder="Enter TIN Number">
                    <?php echo form_error('tin', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Blood Group<em>*</em></label>
					<input type="text" class="form-control" name="bloodgroup" placeholder="Enter Blood Group">
                    <?php echo form_error('bloodgroup', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Gender<em>*</em></label>
					<select class="form-control" name="gender" id="gender">
                    	<option value="">Select....</option>
                        <?php
						foreach($gul as $row)
						{
					?>
                    		<option value="<?php echo $row['genderid'];?>"><?php echo $row['gender'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('genderid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Salary<em>*</em></label>
					<input type="text" class="form-control" name="salary" placeholder="Enter Salary">
                    <?php echo form_error('salary', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Efficiency<em>*</em></label>
					<input type="text" class="form-control" name="efficiency" placeholder="Enter Efficiency">
                    <?php echo form_error('efficiency', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Identification Mark<em>*</em></label>
					<input type="text" class="form-control" name="imark" placeholder="Enter Identification Mark">
                    <?php echo form_error('imark', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Office Email<em>*</em></label>
					<input type="text" class="form-control" name="oemail" placeholder="Enter Office Email">
                    <?php echo form_error('oemail', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Personal Email<em>*</em></label>
					<input type="text" class="form-control" name="pemail" placeholder="Enter Personal Email">
                    <?php echo form_error('pemail', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Personal Mobile<em>*</em></label>
					<input type="text" class="form-control" name="pmobile" placeholder="Enter Personal Mobile">
                    <?php echo form_error('pmobile', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Emergency Mobile<em>*</em></label>
					<input type="text" class="form-control" name="emobile" placeholder="Enter Emergency Mobile">
                    <?php echo form_error('emobile', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>User Type<em>*</em></label>
					<select class="form-control" name="usertypeid" id="usertypeid">
                    	<option value="">Select....</option>
                        <?php
						foreach($uul as $row)
						{
					?>
                    		<option value="<?php echo $row['usertypeid'];?>"><?php echo $row['usertype'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('usertypeid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Service Type<em>*</em></label>
					<select class="form-control" name="servicetypeid" id="servicetypeid">
                    	<option value="">Select....</option>
                        <?php
						foreach($sl as $row)
						{
					?>
                    		<option value="<?php echo $row['servicetypeid'];?>"><?php echo $row['servicetype'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('servicetypeid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Work Type<em>*</em></label>
					<select class="form-control" name="worktypeid" id="worktypeid">
                    	<option value="">Select....</option>
                        <?php
						foreach($wl as $row)
						{
					?>
                    		<option value="<?php echo $row['wtid'];?>"><?php echo $row['worktype'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('worktypeid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>User ID<em>*</em></label>
					<input type="text" class="form-control" name="userid" placeholder="Enter Factory+User ID">
                    <?php echo form_error('userid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" name="password" placeholder="Enter User Password">
                    <?php echo form_error('password', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Probation Period<em>*</em></label>
					<input type="text" class="form-control" name="pperiod" placeholder="Probation Period">
                    <?php echo form_error('pperiod', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Commitment<em>*</em></label>
					<input type="text" class="form-control" name="commitment" placeholder="Commitment">
                    <?php echo form_error('commitment', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Date Of Inactive<em>*</em></label>
					<input type="text" class="form-control pd" name="indate" Placeholder="Enter Inactive Date">
                   <?php /*?> <?php echo form_error('dojdate', '<div class="error">', '</div>');  ?><?php */?>
				</div>
                <div class="form-group">
                  <label for="employeefile">User Photo</label>
                  <input type="file" name="pic_file">
				</div>
				
				
				

				 
				
				
                
  
               
               
    
                

             
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                </div>
				 </form>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        
          <!-- /.box -->
        </div>
        <!-- /.col -->

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

</body>
</html>


