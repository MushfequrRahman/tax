<?php error_reporting(0);?>
 <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>Dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!--<span class="logo-mini"><b>HARMO</b>NIZER</span>-->
      <span class="logo-mini"><img style="width:35px; height:35px;" src="<?php echo base_url().'assets/images/babylon.png';?>" alt="logo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="width:50px; height:45px;" src="<?php echo base_url().'assets/images/babylon.png';?>" alt="logo"><b></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <!-- Navbar Right Menu -->
      
      <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
            </a>
            <ul class="dropdown-menu">
              
              <li class="user-header">
                

                <p>
                  <?php echo $this->session->userdata('name');?>
                  <small><?php echo $this->session->userdata('factoryid');?></small>
                </p>
              </li>
         
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>User_Login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
   
        </ul>
      </div>
	  
    </nav>
  </header>