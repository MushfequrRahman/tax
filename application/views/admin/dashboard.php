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


    text-align: center;
  }

  th,
  td {
    font-size: 12px;
    text-align: center;
  }

  .info-box-number {
    display: block;
    font-weight: bold;
    font-size: 12px;
  }

  .text-right-input {
    text-align: right;
    width: 100%;
    padding: 0 10px 0 0;
  }
</style>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>Dashboard</h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Unit Wise Total List</h3>
                  </div>
                  <div class="box-body table-responsive no-padding">
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
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

</html>