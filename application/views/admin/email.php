
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
              <li class="active"><a href="#activity" data-toggle="tab">User Type Details</a></li>
            
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               
               <div>
            <h3>Use the form below to send email</h3>
            <form method="post" action="<?php echo base_url();?>Dashboard/send" enctype="multipart/form-data">
                <input type="email" id="to" name="to" placeholder="Receiver Email">
                <br><br>
                <input type="text" id="subject" name="subject" placeholder="Subject">
                <br><br>
                <textarea rows="6" id="message" name="message" placeholder="Type your message here"></textarea>
                <br><br>
                <input type="submit" value="Send Email" />
            </form>
        </div>
				
				
				
				
                
                
                
                 
				
                
				
				
				
				
               
    
                

             
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                </div>
				 </form>
					
				
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


