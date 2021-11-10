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
                        <h4 class="page-title">Entry</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Entry</li>
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
                            <?php echo $this->session->flashdata('AddEntry');?>
                            <?php echo $this->session->flashdata('UpadteEntry');?>
                            <?php echo $this->session->flashdata('deleteEntry');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Entry</h5>
                                <div class="btn-group" style="float: right;">
                                    <a href="<?php echo site_url('Entry/addEntry');?>" id="addRow" class="btn btn-info" style="margin-top: -35px;">
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
                                                <th>Gross pl</th>
                                                <th>Commision</th>
                                                <th>Pati</th>
                                                 <th>Net pl</th>
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
                                              <td><?php echo $value['gross_pl'];?></td>
                                              
                                              <td><?php echo $value['commision'];?></td>
                                              <td><?php echo $value['pati'];?></td>
                                             <td><?php echo $value['net_pl'];?></td>
                                              <td ><?php $date = $value['updated_at'];echo date('d-m-Y H:i', strtotime($date)); ?></td>
                                                    <td>
                                                              <?php if($value['status']==0){ ?>
                                                              <a href="<?php echo site_url('Entry/upadteStatus/'.'1'.'/'.$value['id']);?>" class="btn btn-success btn-sm" value="<?php echo $value['status'];?>">Active</i>
                                                              </a>
                                                              <?php } else if($value['status']==2) { ?>
                                                                     <a href="<?php echo site_url('Entry/addEntry/');?>" class="btn btn-warning btn-sm" value="<?php echo $value['status'];?>">Draft</i>
                                                              </a>
                                                              <?php } else { ?>
                                                              <a href="<?php echo site_url('Entry/upadteStatus/'.'0'.'/'.$value['id']);?>" class="btn btn-danger btn-sm" value="<?php echo $value['status'];?>">De-active</i>
                                                              </a><?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('Entry/editEntry/').$value['id'];?>" class="btn btn-info btn-sm">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <!--  <a href="<?php echo site_url('Entry/deleterecord/').$value['id'];?>/Entry/details" class="btn btn-danger btn-sm" onclick="return deleteentry(<?php echo $value['id'];?>);">
                                                            <i class="fas fa-trash-alt"></i>
                                                          Button trigger modal 

                                                        </a> -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   <i class="fas fa-trash-alt"></i>
</button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are You Sure, Want to Delete This?
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="button" onclick="$('#no_e').removeClass('hide');$('.modal-body').text('Do You want accounting effect or not?');$(this).attr('onclick','askforpassword()')";
" class="btn btn-primary">Yes</button>
 <button type="button" id="no_e" onclick="deleteentry();" class="btn btn-primary hide">No,Only Entry!</button>
      </div>
    </div>
  </div>
</div>