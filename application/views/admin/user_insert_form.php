<style>
.error{color:red;}
em{color:red;}
</style>

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
						foreach($ul1 as $row)
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
					<label>Name(English)<em>*</em></label>
					<input type="text" class="form-control" name="name" placeholder="Enter Name">
                    <?php echo form_error('name', '<div class="error">', '</div>');  ?>
				</div>
                
                
                
                
                
                
                
               
                <div class="form-group">
					<label>User Type<em>*</em></label>
					<select class="form-control" name="usertypeid" id="usertypeid">
                    	<option value="">Select....</option>
                        <?php
						foreach($ul2 as $row)
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
					<label>User ID<em>*</em></label>
					<input type="text" class="form-control" name="userid" placeholder="Enter Factory+User ID">
                    <?php echo form_error('userid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" name="password" placeholder="Enter User Password">
                    <?php echo form_error('password', '<div class="error">', '</div>');  ?>
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

</body>
</html>


