<style type="text/css">
.paging-nav {
  text-align: right;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background: #91b9e6;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #187ed5;
  font-weight: bold;
}

.paging-nav,
#tableData {
  
 
  text-align:center;
}
th,td{font-size:10px;text-align:center;}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 12px;
}
.fayellow{color:#FF6;}
.fared{color:#900;}
.faorange{color:#F90;}

div.scrollable-table-wrapper {
  height: 500px;
  overflow: auto;
}
  .header {
            position: sticky;
            top:0;
        }
		.text-right-input{text-align:right;  width:100%; padding:0 10px 0 0;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Dashboard</h1>
			</section>
			<section class="content">
            	<?php /*?><div class="row">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="info-box">
							<!--<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>-->
                        	<span class="info-box-icon bg-yellow" style="font-size:12px;">Cutting</span>
							<div class="info-box-content">
								<span class="info-box-text"></span>
								<span class="info-box-number">
									<?php 
										foreach($pcr as $row)
											{  
												echo $row['factoryid'].':'.$row['cqty'];
									   			echo "<br/>";
											}
									?>
								</span>
							</div>
						</div>
					</div><?php */?>
                	<?php /*?><div class="col-md-4 col-sm-6 col-xs-12">
						<div class="info-box">
							<!--<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>-->
                        	<span class="info-box-icon bg-yellow" style="font-size:12px;">Sewing</span>
							<div class="info-box-content">
								<span class="info-box-text"></span>
								<span class="info-box-number">
									<?php 
										foreach($psr as $row)
											{  
												echo $row['factoryid'].':'.$row['sqty'];
									   			echo "<br/>";
											}
									?>
								</span>
							</div>
						</div>
					</div><?php */?>
					<?php /*?><div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="info-box">
								<!--<span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-certificate"></i></span>--> 
                            	<span class="info-box-icon bg-yellow" style="font-size:12px;">Finishing</span>
								<div class="info-box-content">
									<span class="info-box-text"></span>
									<span class="info-box-number">
										<?php 
											foreach($pfr as $row)
												{  
													echo $row['factoryid'].':'.$row['fqty'];
									   				echo "<br/>";
												}
										?>
									</span>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
					</div>
                </div><!-- /.row --><?php */?>
				<?php /*?><div class="row">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="info-box">
							<!--<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>-->
                        	<span class="info-box-icon bg-yellow" style="font-size:12px;">Cutting</span>
							<div class="info-box-content">
								<span class="info-box-text"></span>
								<span class="info-box-number">
									<div id="cpiechart"></div>
								</span>
							</div>
						</div>
					</div>
                	<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="info-box">
							<!--<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>-->
                        	<span class="info-box-icon bg-yellow" style="font-size:12px;">Sewing</span>
							<div class="info-box-content">
								<span class="info-box-text"></span>
								<span class="info-box-number">
									<div id="spiechart"></div>
								</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="info-box">
								<!--<span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-certificate"></i></span>--> 
                            	<span class="info-box-icon bg-yellow" style="font-size:12px;">Finishing</span>
									<div class="info-box-content">
										<span class="info-box-text"></span>
										<span class="info-box-number">
											<div id="fpiechart"></div>
										</span>
									</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
					</div>
                </div><!-- /.row --><?php */?>
				
                
                
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
										<?php $this->session->userdata('userid');?>
										<?php $this->session->userdata('accessid');?>
										<?php $this->session->userdata('user_type');?>
										<h3 class="box-title"></h3>
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
											<?php /*?><?php if($responce = $this->session->flashdata('Successfully')): ?>
											<div class="text-center">
												<div class="alert alert-success text-center"><?php echo $responce;?></div>
											</div>
											<?php endif;?><?php */?>
										</div>
									</div>
								</div>
								<!-- /.box-header -->
                                <div class="text-right">
                					<span style="padding:0 10px 0 0;"><i class="fa fa-circle fayellow"></i>&nbsp;On Deadline</span>
                					<span style="padding:0 10px 0 0;"><i class="fa fa-circle fared"></i>&nbsp;Cross Deadline</span>
                                    <span style="padding:0 10px 0 0;"><i class="fa fa-circle faorange"></i>&nbsp;Above Deadline</span>
                				</div>
                                <br/>
                                <div class="text-right-input">
                                	<div class="row">
                                		<div class="col-md-3 col-md-offset-9">
                                			<input type='text' class="form-control" id='txt_searchall' placeholder='Enter search text'> 
                                		</div>
                                	</div> 
                                </div>
                                <br/>
								<div class="box-body table-responsive no-padding">
                                <div class="scrollable-table-wrapper">
                                
                                
									<table id="tableData" class="table table-hover table-bordered">
										<thead style="background:#91b9e6;position: sticky;top: 0;">
											<tr>
												<th>SL</th>
												<th>File</th>
												<th>Main Task ID</th>
												<!--<th>Main Task Name</th>-->
												<!--<th>Asignee Task ID</th>-->
												<th>Asignee Task Name</th>
												<th>Description</th>
												<!--<th>Assigner ID</th>-->
												<th>Assigner Name</th>
												<th>Assignee ID</th>
												<th>Assignee Name</th>
												<th>Create Date</th>
												<th>Deadline</th>
												<th>Execution Day</th>
												<th>Remaining Day</th>
												<th>Status</th>
												<th>Submit Date</th>
												<th>Comments</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$i=1;
											foreach($tid as $row)
												{ 
										?>
													<tr>
														<td style="vertical-align:middle;"><?php echo $i++;?></td>
														<?php /*?><td style="vertical-align:middle;"><?php echo $row['createtaskid'];?></td><?php */?>
														<?php /*?><td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/task_assignee_list/<?php echo $bn=$row['createtaskid'];?>"><?php echo $row['createtaskid'];?></a></td><?php */?>
														<?php
															if($row['pic_file']=='')
																{
														?>
																	<td style="vertical-align:middle">No File</td>
														<?php
																}
															else
																{
														?>
																	<td style="vertical-align:middle"><a target="_blank" href="<?php echo base_url().'assets/uploads/task/'.$row['pic_file'];?>"><i class="fa fa-file"></i></a></td>
														<?php
																}
														?>
																	<td style="vertical-align:middle;"><?php echo $row['createtaskid'];?></td>
																	<?php /*?><td style="vertical-align:middle;"><?php echo $row['taskname'];?></td><?php */?>
																	<?php /*?><td style="vertical-align:middle;"><?php echo $row['assigneetlid'];?></td><?php */?>
																	<td style="vertical-align:middle;"><?php echo $row['assigneetaskname'];?></td>
																	<td style="vertical-align:middle;font-size:14px; font-weight:bold; text-align:justify;"><?php echo $row['assigneetaskdescription'];?></td>
																	<?php /*?><td style="vertical-align:middle;"><?php echo $row['assignerid'];?></td><?php */?>
																	<td style="vertical-align:middle;"><?php echo $row['taskassignername'];?></td>
																	<td style="vertical-align:middle;"><?php echo $row['userid'];?></td>
																	<td style="vertical-align:middle;"><?php echo $row['aename'];?></td>
														<?php
																	$assignedate = date("d-m-Y", strtotime($row['assignedate']));
																	$deadline = date("d-m-Y", strtotime($row['deadline']));
																	$prevday=date('Y-m-d', strtotime('-1 day', strtotime($deadline)));
																	$assignedate1 = strtotime($assignedate);
																	$deadline1 = strtotime($deadline);
																	$datediff = $deadline1-$assignedate1;
																	$curday=strtotime(date("d-m-Y"));
																	$datediff1 = $deadline1-$curday;
																	$executionday=round($datediff / (60 * 60 * 24));
																	$remainingday=round($datediff1 / (60 * 60 * 24));
														?>
																	<td style="vertical-align:middle;"><?php echo $assignedate;?></td>
																	<?php /*?><td style="vertical-align:middle;"><?php echo $deadline;?></td><?php */?>
																	<?php 
																		if($row['deadline']==date('Y-m-d'))
																			{
																	?>
																				<td style="vertical-align:middle; background:#FF6;color:#fff;font-weight:bold;"><?php echo $deadline;?></td>
																	<?php
																			}
																		elseif(date('Y-m-d') > $row['deadline'])
																			{
																	?>
																				<td style="vertical-align:middle; background: #900;color:#fff;font-weight:bold;"><?php echo $deadline;?></td>
																	<?php
																			}
																		elseif($prevday)
																			{
																	?>
																				<td style="vertical-align:middle; background: #F90;color:#fff;font-weight:bold;"><?php echo $deadline;?></td>
																	<?php
																			}
																		else
																			{
																	?>
																				<td style="vertical-align:middle;"><?php echo $deadline;?></td>
																	<?php
																			}
																	?>
																				<td style="vertical-align:middle;"><?php echo $executionday;?></td>
																				<td style="vertical-align:middle;"><?php echo $remainingday;?></td>
																	<?php 
																		if($this->session->userdata('user_type')!=1)
																			{
																	?>
																				<?php 
																					if($row['assigneestatus']==1)
																						{
																				?>
																							<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/assignee_task_list_update/<?php echo $row['assigneetlid'];?>">Active</a></td>
																				<?php
																						}
																				?>
																				<?php 
																					if($row['assigneestatus']==2)
																						{
																			?>
																							<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/assignee_task_list_update/<?php echo $row['assigneetlid'];?>">Decesion Pending</a></td>
																	<?php
																						}
																			}
																		elseif($this->session->userdata('user_type')==1 && ($this->session->userdata('userid')==$row['assigneeid']))
																			{
																	?>
																				<?php 
																					if($row['assigneestatus']==1)
																						{
																				?>
																							<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/assignee_task_list_update/<?php echo $row['assigneetlid'];?>">Active</a></td>
																				<?php
																						}
																				?>
																				<?php 
																					if($row['assigneestatus']==2)
																						{
																				?>
																							<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/assignee_task_list_update/<?php echo $row['assigneetlid'];?>">Decesion Pending</a></td>
																				<?php
																						}
																			}
																		elseif($this->session->userdata('user_type')==1)
																			{
																?>
																				<?php 
																					if($row['assigneestatus']==1)
																						{
																				?>
																							<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/task_completed_form/<?php echo $row['assigneetlid'];?>">Active</a></td>
																				<?php
																						}
																				?>
																				<?php 
																					if($row['assigneestatus']==2)
																						{
																				?>
																							<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/task_completed_form/<?php echo $row['assigneetlid'];?>">Decesion Pending</a></td>
																<?php
																						}
																			}
																?>
																			<?php $assignee_submitted_date = date("d-m-Y", strtotime($row['assignee_submitted_date']));?>
																			<?php 
																				if($row['assignee_submitted_date']=='0000-00-00')
																					{
																			?>
																						<td style="vertical-align:middle;"></td>
																			<?php
																					}
																		else
																			{
																?>
																				<td style="vertical-align:middle;"><?php echo $assignee_submitted_date;?></td>
																<?php
																			}
																?>
																				<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/task_comments_form/<?php echo $row['assignerid'];?>/<?php echo $row['createtaskid'];?>/<?php echo $row['userid'];?>/<?php echo $row['assigneetlid'];?>"><i class="fa fa-info-circle"></i></a></td>
													</tr>
										</tbody>
										<?php 
												} 
										?>
									</table>
                                 </div>
								</div>
                                
							</div>
							<script type="text/javascript">
								$(document).ready(function() {
								$('#tableData').paging({limit:50});
								});
							</script>
						</div>
					</div>
				</div>
			</section><!--content-->
		</div><!--content-wrapper-->
	</div><!--wrapper-->
</div>
<script type='text/javascript'>

    $(document).ready(function(){


        // Search all columns

        $('#txt_searchall').keyup(function(){

            var search = $(this).val();


            $('table tbody tr').hide();


            var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;


            if(len > 0){

              $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){

                  $(this).closest('tr').show();

              });

            }else{

              $('.notfound').show();

            }

            

        });

    });

    // Case-insensitive searching (Note - remove the below script for Case sensitive search )

    $.expr[":"].contains = $.expr.createPseudo(function(arg) {

        return function( elem ) {

            return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;

        };

    });

</script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Cutting', 'Unit'],
<?php
                    foreach ($pcr as $row) {
                        extract((array)$row);
                        echo "['{$factoryid}', {$cqty}],";
                    } ?>
					

]);
// Optional; add a title and set the width and height of the chart
//var options = {'title':'My Average page visit per Day', 'width':550, 'height':400};
var options = {

        responsive: true,

        title: {

          display: true,

          position: "top",

          text: "Monthly Registered Users Count",

          fontSize: 18,

          fontColor: "#111"

        },

        legend: {

          display: true,

          position: "bottom",

          labels: {

            fontColor: "#333",

            fontSize: 16

          }

        }

      };

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('cpiechart'));
chart.draw(data, options);
}
</script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Sewing', 'Unit'],
<?php
                    foreach ($psr as $row) {
                        extract((array)$row);
                        echo "['{$factoryid}', {$sqty}],";
                    } ?>
					

]);
// Optional; add a title and set the width and height of the chart
//var options = {'title':'My Average page visit per Day', 'width':550, 'height':400};
var options = {

        responsive: true,

        title: {

          display: true,

          position: "top",

          text: "Monthly Registered Users Count",

          fontSize: 18,

          fontColor: "#111"

        },

        legend: {

          display: true,

          position: "bottom",

          labels: {

            fontColor: "#333",

            fontSize: 16

          }

        }

      };

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('spiechart'));
chart.draw(data, options);
}
</script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Finishing', 'Unit'],
<?php
                    foreach ($pfr as $row) {
                        extract((array)$row);
                        echo "['{$factoryid}', {$fqty}],";
                    } ?>
					

]);
// Optional; add a title and set the width and height of the chart
//var options = {'title':'My Average page visit per Day', 'width':550, 'height':400};
var options = {

        responsive: true,

        title: {

          display: true,

          position: "top",

          text: "Monthly Registered Users Count",

          fontSize: 18,

          fontColor: "#111"

        },

        legend: {

          display: true,

          position: "bottom",

          labels: {

            fontColor: "#333",

            fontSize: 16

          }

        }

      };

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('fpiechart'));
chart.draw(data, options);
}
</script>
</body>
</html>
