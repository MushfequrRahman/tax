<style>
.error{color:red;}
em{color:red;}
</style>
<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
	jQuery(".wd").datepicker({dateFormat: 'yy-mm-dd'});
	})
</script>
<?php /*?><script type="text/javascript">

$(document).ready(function(){

    var counter = 2;
		
    $("#addau").click(function () {
				
	if(counter>100){
            alert("Only 100 rollboxes allow");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'AuDiv' + counter);

	newTextBoxDiv.after().html(
	      '<div class="row"><table class="table table-bordered table-striped text-center"><tr><td><input type="text" class="form-control" name="fsl[]' + counter + 
	      '" id="fsl' + counter + '" placeholder="' + 'Findings Serial' +'" ></td>' +
		  '<td><textarea class="form-control" rows="1" name="findings[]' + counter + 
	      '" id="findings' + counter + '" placeholder="' + 'Findings' +'" ></textarea></td>'+
		  '<td><textarea class="form-control" rows="1" name="observation[]' + counter + 
	      '" id="observation' + counter + '" placeholder="' + 'Observation' +'" ></textarea></td>'+
		  '</tr></table></div>');
            
	newTextBoxDiv.appendTo("#AuGroup");

				
	counter++;
	//console.log("#pd"+counter--);
	//jQuery("#pd"+counter--).datepicker({dateFormat: 'yy-mm-dd'});	
     });

     $("#removeau").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
        
	counter--;
			
        $("#AuDiv" + counter).remove();
			
     });
		
     
  });
</script><?php */?>	 
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
                  <h3 class="box-title">Income Tax Info Insert</h3>
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
                
				 <form role="form" id="comment" autocomplete="off" action="<?php echo base_url();?>Dashboard/incometax_insert" method="post" enctype="multipart/form-data">
                <div class="box-body ">
                       
						
						
                
                
                 <?php /*?><div class="form-group">
					<label>Unit<em>*</em></label>
					<select class="form-control" name="fid" id="fid">
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
                    <?php echo form_error('fid', '<div class="error">', '</div>');  ?>
                    
				</div><?php */?>
                
                
                
                
                
				
                <div class="form-group">
					<label>User ID<em>*</em></label>
					<input type="text" class="form-control" name="userid" placeholder="User ID">
                    <?php echo form_error('userid', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Tax Circle<em>*</em></label>
					<input type="text" class="form-control" name="tc" placeholder="Tax Circle">
                    <?php echo form_error('tc', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Tax Zone<em>*</em></label>
					<input type="text" class="form-control" name="tz" placeholder="Tax Zone">
                    <?php echo form_error('tz', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Return Number<em>*</em></label>
					<input type="text" class="form-control" name="rnumber" placeholder="Return Number">
                    <?php echo form_error('rnumber', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Challan Number<em>*</em></label>
					<input type="text" class="form-control" name="cnumber" placeholder="Challan Number">
                    <?php echo form_error('cnumber', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Date<em>*</em></label>
					<input type="text" class="form-control" name="sdate" value="<?php echo date('d-m-Y');?>">
                    <?php echo form_error('cnumber', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Fiscal Year<em>*</em></label>
					<select class="form-control" name="fyear" id="fyear">
                    	<!--<option value="2020-2021">2020-2021</option>-->
                        <option value="2021-2022">2021-2022</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="employeefile1">Return Documents</label>
                  <input type="file" name="rfile">
				</div>
                <div class="form-group">
                  <label for="employeefile1">Challan Documents</label>
                  <input type="file" name="cfile">
				</div>
                
                
				
				
				

				 
				
				
                
  
               
               
    
                

             
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <input type="submit" class="btn btn-primary" id="btn" name="submit" value="Submit" />
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


