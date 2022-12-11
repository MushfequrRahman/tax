<style>
.error{color:red;}
em{color:red;}
</style>
<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'yy-mm-dd'});
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
                  <h3 class="box-title">Income Tax List</h3>
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
				 <?php /*?><form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/user_task_complete_list" method="post" enctype="multipart/form-data"><?php */?>
                 
                	<div class="col-sm-12 col-md-5 col-lg-5">
					<label>Factory Name<em>*</em></label>
					<select class="form-control" name="factoryid" id="factoryid">
                    	<option value="">Select....</option>
                        <?php
						foreach($fl as $row)
						{
					?>
                    		<option value="<?php echo $row['factoryid'];?>"><?php echo $row['factoryname'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="col-sm-12 col-md-5 col-lg-5">
					<label>Assesment year<em>*</em></label>
					<select class="form-control" name="fyear" id="fyear">
                    	<option value="">Select....</option>
                        <?php
						foreach($fil as $row)
						{
					?>
                    		<option value="<?php echo $row['dfyear'];?>"><?php echo $row['dfyear'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php echo form_error('fyear', '<div class="error">', '</div>');  ?>
				</div>
               
                <!-- /.box-body -->
                <div class="col-sm-12 col-md-2 col-lg-2">
                  <label>&nbsp;</label>
                  <input type="submit" class="btn btn-primary form-control" name="submit" id="btn" value="Submit" />
                </div>
                </div>
				 <!--</form>-->
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
      <div id="ajax-content-container">
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->
<script>
    $(document).ready(function(){
        $( "#btn" ).click(function(event)
        {
            event.preventDefault();
            var factoryid= $("#factoryid").val();
			var fyear= $("#fyear").val();

            $.ajax(
                {
                    type:'post',
                    url: '<?php echo base_url(); ?>Dashboard/factorywise_incometax_list',
					dataType:"text",
                    data:{ factoryid:factoryid,fyear:fyear},
					      success: function(data) 
						  	{
       					  		$('#ajax-content-container').html(data);
								
      						},
	  					error: function(){
    					alert('error!');
  				}
                    
                });
        });
    });
</script>


</body>
</html>


