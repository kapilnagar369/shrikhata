      <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                            <?php echo $this->session->flashdata('AddReport');?>
                            <?php echo $this->session->flashdata('UpadteReport');?>
                            <?php echo $this->session->flashdata('deleteReport');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Report</h5>
                                <div class="btn-group" style="float: right;">
                                    <a href="<?php echo site_url('Report/addReport');?>" id="addRow" class="btn btn-info" style="margin-top: -35px;">
                                       <i class="fa fa-plus"></i> Add
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table  class="grid table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                             <th>Sr.No.</th>
                                             <th>Exchange   </th>
                                             <th>Party  </th>

                                             <th>Gross Profit / Loss </th>
                                              <th>Pati    </th>
                                              <th>Commsion </th>
                                             <th>Net Profit / Loss   </th>
                                               
                                            </tr>
                                            </thead>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                    foreach ($result as $value) {
                                                $i++;
                                            ?>
                                         <tr class="hidden">
                                              <td><?php echo $value['Exchange_Code'];?></td>

                                             <td ><?php  $i;?></td>
                                              <td><?php echo $value['party_code'];?></td>
                                              <td style="text-align: right;">   <?php  echo @number_format($value['gross_profit'],2,'.',''); ?></td>
                                              <td style="text-align: right;">   <?php  echo @number_format($value['pati'],2,'.',''); ?></td>
                                              <td style="text-align: right;">   <?php  echo @number_format($value['commision'],2,'.',''); ?></td>
                                              <td style="text-align: right;">   <?php  echo @number_format($value['net_profit'],2,'.',''); ?></td>
                                              </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

          <style type="text/css">
            
                .dataTables_scrollBody thead{
        visibility:hidden;
    }
    .group{
        font-size:11px;
        opacity:0.7;
    }
.hidden {
    display: none;
}
          </style>