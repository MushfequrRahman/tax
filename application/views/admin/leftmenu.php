<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">TAX Return</li>
        <?php if($this->session->userdata('userid') && $this->session->userdata('user_type')=='1')
		{?>
       
        <li class="treeview">
        	<a href="#">
            	<i class="fa fa-info" aria-hidden="true"></i><span>Configuration</span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu">
            	
            	<li class="treeview">
        			<a href="#">
            			<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a href="<?php echo base_url();?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
            		</ul>
        		</li>
                
                
                
                
                
                
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Type</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a href="<?php echo base_url();?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
            		</ul>
        		</li>
                
                
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Employee Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a href="<?php echo base_url();?>Dashboard/user_insert_form"><i class="fa fa-circle-o"></i> Add User Info</a></li>
                		
                		<li><a href="<?php echo base_url();?>Dashboard/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
            		</ul>
        		</li>
                
                
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Employee Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a target="_blank" href="<?php echo base_url();?>Dashboard/incometax_list"><i class="fa fa-circle-o"></i>Tax List</a></li>
                <li><a target="_blank" href="<?php echo base_url();?>Dashboard/incometax_acclist"><i class="fa fa-circle-o"></i>ACC Report</a></li>
            		</ul>
        		</li>
            </ul>
        </li>
        
        <li class="treeview">
        	<a href="#">
            	<i class="fa fa-info" aria-hidden="true"></i><span>Report</span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu">
            	
            	
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Report</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a target="_blank" href="<?php echo base_url();?>Dashboard/incometax_list"><i class="fa fa-circle-o"></i>Tax List</a></li>
                <li><a target="_blank" href="<?php echo base_url();?>Dashboard/incometax_acclist"><i class="fa fa-circle-o"></i>ACC Report</a></li>
            		</ul>
        		</li>
            </ul>
        </li>
        
		
       
        
      
        <?php } ?>
        
        
        
        <?php if($this->session->userdata('userid') && $this->session->userdata('user_type')=='2')
		{?>
       
        
        
        <li class="treeview">
        	<a href="#">
            	<i class="fa fa-info" aria-hidden="true"></i><span>Report</span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu">
            	
            	
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Report</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a target="_blank" href="<?php echo base_url();?>Dashboard/incometax_list"><i class="fa fa-circle-o"></i>Tax List</a></li>
                <li><a target="_blank" href="<?php echo base_url();?>Dashboard/incometax_acclist"><i class="fa fa-circle-o"></i>ACC Report</a></li>
            		</ul>
        		</li>
            </ul>
        </li>
        
		
       
        
      
        <?php } ?>
       
        <?php //endif;?>
        
        												
        
        
     </ul>
  </section>
    <!-- /.sidebar -->
  </aside>