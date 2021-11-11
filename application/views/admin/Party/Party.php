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
                        <h4 class="page-title">Party Master </h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Party Master </li>
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
                            <?php echo $this->session->flashdata('AddParty');?>
                            <?php echo $this->session->flashdata('UpadteParty');?>
                            <?php echo $this->session->flashdata('deleteParty');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Party</h5>
                                <div class="btn-group" style="float: right;">
                                    <a href="<?php echo site_url('Party/addParty');?>" id="addRow" class="btn btn-info" style="margin-top: -35px;">
                                       <i class="fa fa-plus"></i> Add
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                          

                                            <tr>
                                              <th>S.no</th>
                                                <th>Party Code</th>
                                                <th>Party Name</th>
                                                <th>Reference</th>
                                                <th>Whatsapp Number</th>
                                                <th>Email</th>
                                                <th>Party Type</th>
                                                <th>OP Bal</th>
                                                <th>DR/CR</th>
                                                <th>Web Access</th>
                                                <th>User Name</th>
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
                                              <td><?php echo $value['party_code'];?></td>
                                              <td><?php echo $value['party_name'];?></td>
                                              <td><?php echo $value['reference'];?></td>
                                              <td><?php echo $value['wa_number'];?></td>
                                              <td><?php echo $value['email'];?></td>
                                              <td><?php echo $value['party_type'];?></td>
                                              <td><?php echo $value['op_bal'];?></td>
                                              <td><?php echo $value['dr_cr'];?></td>
                                              <td><?php if($value['web_access']==1){ echo "Yes";} else { echo 'No'; }?></td>
                                              <td><?php echo $value['user_name'];?></td>
                                              <td ><?php $date = $value['updated_at'];echo date('d-m-Y H:i', strtotime($date)); ?></td>
                                                    <td>
                                                              <?php if($value['status']==1){ ?>
                                                              <a href="<?php echo site_url('Party/upadteStatus/'.'0'.'/'.$value['id']);?>" class="btn btn-success btn-sm" value="<?php echo $value['status'];?>">Active</i>
                                                              </a>
                                                              <?php }else{ ?>
                                                              <a href="<?php echo site_url('Party/upadteStatus/'.'1'.'/'.$value['id']);?>" class="btn btn-danger btn-sm" value="<?php echo $value['status'];?>">De-active</i>
                                                              </a><?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('Party/editParty/').$value['id'];?>" class="btn btn-info btn-sm">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                      <!--   <a href="<?php //echo site_url('Party/deleterecord/').$value['id'];?>/Party/details" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Party?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a> -->
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