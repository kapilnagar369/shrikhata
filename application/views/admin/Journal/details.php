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
                        <h4 class="page-title">Journal</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Journal</li>
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
                            <?php echo $this->session->flashdata('AddJournal');?>
                            <?php echo $this->session->flashdata('UpadteJournal');?>
                            <?php echo $this->session->flashdata('deleteJournal');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Journal</h5>
                                <div class="btn-group" style="float: right;">
                                    <a href="<?php echo site_url('Journal/addJournal');?>" id="addRow" class="btn btn-info" style="margin-top: -35px;">
                                       <i class="fa fa-plus"></i> Add
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                          

                                            <tr>
                                              <th>S.no</th>
                                                <th>Voucher No</th>
                                                <th>Trxn Date</th>
                                                <th>Amount</th>
                                                <th>Credit Party</th>
                                                <th>Debit Party</th>
                                                <th>Last Update At</th>
                                                <th>Status</th>
                                                <th>Action</th>         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                    foreach ($result as $value) {
                                                $i++;
                                            ?>
                                         <tr>
                                             <td ><?php echo $i;?></td>
                                              <td><?php echo $value['vch_no'];?></td>
                                              <td><?php echo date('d-m-Y',strtotime($value['trxn_date']));?></td>
                                              <td style="text-align: right;">   <?php  echo @number_format($value['amount'],2,'.',''); ?></td>
                                              
                                              <td><?php echo $value['debit_party_code'].' ('.$value['debit_party_name'].')';?></td>
                                              <td><?php echo $value['credit_party_code'].' ('.$value['credit_party_name'].')';?></td>
                                              <td ><?php $date = $value['updated_at'];echo date('d-m-Y H:i', strtotime($date)); ?></td>
                                                <td>
                                                              <?php if($value['status']==0){ ?>
                                                              <a href="<?php echo site_url('Journal/upadteStatus/'.'1'.'/'.$value['id']);?>" class="btn btn-success btn-sm" value="<?php echo $value['status'];?>">Active</i>
                                                              </a>
                                                              <?php } else if($value['status']==2) { ?>
                                                                     <a href="<?php echo site_url('Journal/addJournal/');?>" class="btn btn-warning btn-sm" value="<?php echo $value['status'];?>">Draft</i>
                                                              </a>
                                                              <?php } else { ?>
                                                              <a href="<?php echo site_url('Journal/upadteStatus/'.'0'.'/'.$value['id']);?>" class="btn btn-danger btn-sm" value="<?php echo $value['status'];?>">De-active</i>
                                                              </a><?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('Journal/editJournal/').$value['id'];?>" class="btn btn-info btn-sm">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <!--  <a href="<?php //echo site_url('Journal/deleterecord/').$value['id'];?>/Journal/details" class="btn btn-danger btn-sm" onclick="return deleteJournal(<?php// echo $value['id'];?>);">
                                                            <i class="fas fa-trash-alt"></i>
                                                          Button trigger modal 

                                                        </a> -->
         <!--                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   <i class="fas fa-trash-alt"></i>
</button> -->
                                                     </td> 
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

          <!-- Modal -->
