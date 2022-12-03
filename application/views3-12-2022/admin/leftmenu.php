<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">IT MANAGEMENT SYSTEM</li>
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
            			<i class="fa fa-industry" aria-hidden="true"></i><span>Department Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a href="<?php echo base_url();?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
            		</ul>
        		</li>
                
                
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Designation</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a href="<?php echo base_url();?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
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
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Status</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
            			<li><a href="<?php echo base_url();?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
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
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>MPR Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/mpr_create_form"><i class="fa fa-circle-o"></i>Add MPR</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/date_wise_mpr_list_form"><i class="fa fa-circle-o"></i>Date Wise MPR List</a></li>
                        
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>PO Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<?php /*?><li><a href="<?php echo base_url();?>Dashboard/po_create_form"><i class="fa fa-circle-o"></i>Add PO</a></li><?php */?>
                        <li><a href="<?php echo base_url();?>Dashboard/po_from_mpr_form"><i class="fa fa-circle-o"></i>Add PO</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/date_wise_po_list_form"><i class="fa fa-circle-o"></i>Date Wise PO List</a></li>
                        
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Receive Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<?php /*?><li><a href="<?php echo base_url();?>Dashboard/po_create_form"><i class="fa fa-circle-o"></i>Add PO</a></li><?php */?>
                        <li><a href="<?php echo base_url();?>Dashboard/receive_from_mpr_form"><i class="fa fa-circle-o"></i>Add Receive</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/mpr_wise_receive_list_form"><i class="fa fa-circle-o"></i>MPR Wise Receive List</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/mpr_wise_sreceive_list_form"><i class="fa fa-circle-o"></i>MPR Wise Summary List</a></li>
                        
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Product Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/product_capop_insert_form"><i class="fa fa-circle-o"></i>Add Capax/Opex</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/product_capop_list"><i class="fa fa-circle-o"></i>Product Capex/Opex List</a></li>
            			<li><a href="<?php echo base_url();?>Dashboard/product_category_insert_form"><i class="fa fa-circle-o"></i>Add Product Category</a></li>
                        
                		<li><a href="<?php echo base_url();?>Dashboard/product_category_list"><i class="fa fa-circle-o"></i>Product Category List</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/product_details_list"><i class="fa fa-circle-o"></i>Product Details List</a></li>
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