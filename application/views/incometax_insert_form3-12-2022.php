<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->
<style>
.register{
    /*background: -webkit-linear-gradient(left, #3931af, #00c6ff);*/
	background: -webkit-linear-gradient(left, #393, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
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
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <!--<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>-->
                        <h3>Babylon Group</h3>
                        <p>Submit Your Tax Return.(Developed By Babylon HR & IT)</p>
                        <!--<input type="submit" name="" value="Login"/><br/>-->
                    </div>
                    <div class="col-md-9 register-right">
                    	<h3 class="register-heading">Submit Your Tax Return Info</h3>
                                <div class="row register-form">
                                <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
											<div class="text-center">
												<div class="alert alert-success text-center"><?php echo $responce; ?></div>
											</div>
										<?php endif; ?>
                                <form role="form" id="comment" autocomplete="off" action="<?php echo base_url(); ?>Home/incometax_insert" method="post" enctype="multipart/form-data">
                                    <div class="col-md-6">
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
										<label>Type<em>*</em></label>
										<select class="form-control" name="tid" id="tid">
											<option value="">Select....</option>
											<?php
											foreach ($tl as $row) {
											?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
											<?php
											}
											?>
										</select>
										<?php echo form_error('tid', '<div class="error">', '</div>');  ?>
									</div>
									<div class="form-group">
										<label>User ID(Mentioned Your Office ID Card)<em>*</em></label>
										<input type="text" class="form-control" name="userid" placeholder="User ID">
										<?php echo form_error('userid', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>User Name(Mentioned Your Office ID Card)<em>*</em></label>
										<input type="text" class="form-control" name="name" placeholder="User Name">
										<?php echo form_error('name', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>Department(Mentioned Your Office ID Card)<em>*</em></label>
										<input type="text" class="form-control" name="dept" placeholder="Department">
										<?php echo form_error('dept', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>Designation(Mentioned Your Office ID Card)<em>*</em></label>
										<input type="text" class="form-control" name="desig" placeholder="Designation">
										<?php echo form_error('desig', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>Mobile(11 Digit)<em>*</em></label>
										<input type="text" class="form-control" name="mobile" placeholder="Mobile">
										<?php echo form_error('mobile', '<div class="error">', '</div>');  ?>
									</div>
                                    <div class="form-group">
										<label>Office Email<em>*</em></label>
										<input type="text" class="form-control" name="oemail" placeholder="Office Email">
										<?php echo form_error('oemail', '<div class="error">', '</div>');  ?>
									</div>
                                    </div>
                                    <div class="col-md-6">
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
										<label>Fiscal Year</label>
										<select class="form-control" name="fyear" id="fyear">
											<!--<option value="2020-2021">2020-2021</option>-->
											<option value="2022-2023">2022-2023</option>
										</select>
									</div>
                                    <div class="form-group">
										<label>Remarks<em>*</em></label>
										<textarea class="form-control" rows="5" name="remarks" id="remarks"></textarea>
										<?php echo form_error('remarks', '<div class="error">', '</div>');  ?>
									</div>
									<div class="form-group">
										<label for="employeefile1">Return Documents(jpeg | jpg | png)</label>
										<input type="file" name="rfile">
                                        <?php echo form_error('rfile', '<div class="error">', '</div>');  ?>
									</div>
									<!--<div class="form-group">
                  						<label for="employeefile1">Challan Documents</label>
                  							<input type="file" name="cfile">
										</div>-->
                                        <input type="submit" class="btnRegister" name="submit"  value="Submit"/>
                                    </div>
                                    </form>
                                </div>
                     </div>
                </div>
			</div>