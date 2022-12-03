<style>
	.error {
		color: red;
	}

	em {
		color: red;
	}
</style>
<script type="text/javascript">
	$(function() {
		jQuery(".pd").datepicker({
			dateFormat: 'dd-mm-yy'
		});
		jQuery(".wd").datepicker({
			dateFormat: 'yy-mm-dd'
		});
	})
</script>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>Babylon Group</b></a>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="text-center">Income Tax Info Insert</h3>
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-12">
										<?php if ($responce = $this->session->flashdata('Successfully')) : ?>
											<div class="text-center">
												<div class="alert alert-success text-center"><?php echo $responce; ?></div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<form role="form" id="comment" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/incometax_insert" method="post" enctype="multipart/form-data">
								<div class="box-body ">
									<div class="form-group">
										<label>Unit<em>*</em></label>
										<select class="form-control" name="fid" id="fid">
											<option value="">Select....</option>
											<?php
											foreach ($fl as $row) {
											?>
												<option value="<?php echo $row['factoryid']; ?>"><?php echo $row['factoryname']; ?></option>
											<?php
											}
											?>
										</select>
										<?php echo form_error('fid', '<div class="error">', '</div>');  ?>
									</div>
									<div class="form-group">
										<label>User ID<em>*</em></label>
										<input type="text" class="form-control" name="userid" placeholder="User ID">
										<?php echo form_error('userid', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>User Name<em>*</em></label>
										<input type="text" class="form-control" name="uname" placeholder="User Name">
										<?php echo form_error('uname', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>Mobile<em>*</em></label>
										<input type="text" class="form-control" name="mobile" placeholder="Mobile">
										<?php echo form_error('mobile', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>Office Email<em>*</em></label>
										<input type="text" class="form-control" name="oemail" placeholder="Office Email">
										<?php echo form_error('oemail', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>TIN Number<em>*</em></label>
										<input type="text" class="form-control" name="tin" placeholder="TIN Number">
										<?php echo form_error('tin', '<div class="error">', '</div>');  ?>
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
									<?php /*?><div class="form-group">
										<label>Challan Number<em>*</em></label>
											<input type="text" class="form-control" name="cnumber" placeholder="Challan Number">
                    							<?php echo form_error('cnumber', '<div class="error">', '</div>');  ?>
                								</div><?php */ ?>
									<?php /*?><div class="form-group">
										<label>Date<em>*</em></label>
										<input type="text" class="form-control" name="sdate" value="<?php echo date('d-m-Y'); ?>">
										<?php echo form_error('cnumber', '<div class="error">', '</div>');  ?>
									</div><?php */?>
									<div class="form-group">
										<label>Fiscal Year<em>*</em></label>
										<select class="form-control" name="fyear" id="fyear">
											<!--<option value="2020-2021">2020-2021</option>-->
											<option value="2022-2023">2022-2023</option>
										</select>
									</div>
                                    <div class="form-group">
										<label>Remarks<em>*</em></label>
										<textarea class="form-control" rows="4" name="remarks" id="remarks"></textarea>
										<?php echo form_error('remarks', '<div class="error">', '</div>');  ?>
									</div>
									<div class="form-group">
										<label for="employeefile1">Return Documents</label>
										<input type="file" name="rfile">
									</div>
									<!--<div class="form-group">
                  						<label for="employeefile1">Challan Documents</label>
                  							<input type="file" name="cfile">
										</div>-->
									<div class="box-footer text-center">
										<input type="submit" class="btn btn-primary" id="btn" name="submit" value="Submit" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>