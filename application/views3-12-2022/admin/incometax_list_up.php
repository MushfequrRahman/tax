<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
	jQuery(".wd").datepicker({dateFormat: 'yy-mm-dd'});
	})
</script>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#activity" data-toggle="tab">Income Tax Details</a></li>
								</ul>
							<div class="tab-content">
								<div class="active tab-pane" id="activity">
									<?php 
										foreach($ilup as $row)
											{ 
									?>
												<form role="form" action="<?php echo base_url();?>Dashboard/incometaxlup" method="post" enctype="multipart/form-data">
													<input type="hidden" class="form-control" name="itid" value="<?php echo $row['itid']; ?>">
													<div class="form-group">
					<label>User ID<em>*</em></label>
					<input type="text" readonly class="form-control" name="userid" value="<?php echo $row['userid']; ?>">
                    <?php echo form_error('userid', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Tax Circle<em>*</em></label>
					<input type="text" class="form-control" name="tc" value="<?php echo $row['tc']; ?>">
                    <?php echo form_error('tc', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Tax Zone<em>*</em></label>
					<input type="text" class="form-control" name="tz" value="<?php echo $row['tz']; ?>">
                    <?php echo form_error('tz', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Return Number<em>*</em></label>
					<input type="text" class="form-control" name="rnumber" value="<?php echo $row['rnumber']; ?>">
                    <?php echo form_error('rnumber', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Challan Number<em>*</em></label>
					<input type="text" class="form-control" name="cnumber" value="<?php echo $row['cnumber']; ?>">
                    <?php echo form_error('cnumber', '<div class="error">', '</div>');  ?>
                </div>
                <div class="form-group">
					<label>Date<em>*</em></label>
					<input type="text" class="form-control pd" name="sdate" value="<?php echo date("d-m-Y", strtotime($row['sdate']));?>">
                    <?php echo form_error('sdate', '<div class="error">', '</div>');  ?>
                </div>
                
													<div class="box-footer text-center">
														<input type="submit" class="btn btn-primary" name="submit" value="Submit" />
													</div>
												</form>
								</div>
								<?php 
											} 
								?>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
<!-- ./wrapper -->


