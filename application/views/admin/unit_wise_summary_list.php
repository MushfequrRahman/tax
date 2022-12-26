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
th,td{font-size:12px;text-align:center;}
div.scrollable-table-wrapper {
  height: 1000px;
  overflow: auto;
}
.header {
            position: sticky;
            top:0;
        }
		.zoom {
  /*padding: 50px;*/
  
  transition: transform .2s; /* Animation */
 /* width: 200px;*/
 /* height: 200px;
  margin: 0 auto;*/
}

.zoom:hover {
  transform: scale(3.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
@keyframes up-right {
    0% {
        transform: scale(1);
        opacity: .25
    }
    50% {
        transform: scale (1, 5);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: .25;
    }
}
</style>

                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            
            <?php /*?><form action="<?php echo base_url() ?>Dashboard/userexport_xls" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="row padall">  
        <div class="col-lg-12">
        <div class="float-right"> 
        <?php
        foreach($ul as $row1)
				{ ?> 
                <input type="hidden" name="factoryid" value="<?php echo $row1['factoryid'];?>" />
                <?php
				}
				?>
          <input type="radio" checked="checked" name="export_type" value="xlsx"> .xlsx
          <input type="radio" name="export_type" value="xls"> .xls
          <input type="radio" name="export_type" value="csv"> .csv
          <button type="submit" name="import" class="btn btn-primary">Export</button>
          </div> 
        </div>
        </div>
      </form><?php */?>
             	<div class="scrollable-table-wrapper">
                <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>SL</th>
                          <th>Unit</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        $tti = 0;
                        foreach ($ul as $row) { ?>
                          <tr>
                            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['fid']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['ti']; ?></td>
                          </tr>
                          <?php $tti += $row['ti']; ?>

                      </tbody>
                    <?php } ?>
                    <tr>
                      <td colspan="2" style="vertical-align:middle;"><strong>Total</strong></td>
                      <td style="vertical-align:middle;"><strong><?php echo $tti; ?></strong></td>
                    </tr>
                    </table>
                    <div class="box-header with-border">
                      <h3 class="box-title">Type Wise Total List</h3>
                    </div>
                    <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>SL</th>
                          <th>Unit</th>
                          <th>Employement Type</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        $ttypei = 0;
                        foreach ($tl as $row) { ?>
                          <tr>
                            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['fid']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['sname']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['ttype']; ?></td>
                          </tr>

                      </tbody>
                      <?php $ttypei += $row['ttype']; ?>
                    <?php } ?>
                    <tr>
                      <td colspan="3" style="vertical-align:middle;"><strong>Total</strong></td>
                      <td style="vertical-align:middle;"><strong><?php echo $ttypei; ?></strong></td>
                    <tr>
                    </table>
              </div>
            </div>
            
            <!-- /.box-body -->
         
