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
                        <h4 class="page-title">Excahnge Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Exchange Report P/L</li>
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
                                <h5 class="card-title">Exchange Wise Report P/L</h5>
                             <div class="form-group row">
                                     <!--    <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Party</label>
                                        <div class="col-sm-2">
                                           <select  class="form-control" id="party_code"    name="party_code"  >
                                             <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                              <option    <?php if(isset($party_id) && $party_id==$pat['id']) { echo 'selected';}?>       value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                       
                                        </div> -->
                                    </div>  
                                <div class="table-responsive">
                                    <table  class="grid table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                             <th>Sr.No.</th>
                                             <th>Exchange   </th>
                                             <th>Party  </th>
                                             <th>Point  </th>
                                             <th>Rate  </th>

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
                                              <td><?php echo $value['point'];?></td>
                                              <td><?php echo $value['id_rate'];?></td>
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