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
                        <h4 class="page-title">Client</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Client</li>
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
                            <?php echo $this->session->flashdata('AddClient');?>
                            <?php echo $this->session->flashdata('UpadteClient');?>
                            <?php echo $this->session->flashdata('deleteClient');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Client</h5>
                                <div class="btn-group" style="float: right;">
                                    <a href="<?php echo site_url('Client/addClient');?>" id="addRow" class="btn btn-info" style="margin-top: -35px;">
                                       <i class="fa fa-plus"></i> Add
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                          

                                            <tr>
                                              <th>S.no</th>
                                                <th>Client Code</th>
                                                <th>Client Name</th>
                                                <th>Refrence</th>
                                                <th>Edition</th>
                                                <th>Subscription for webaccess of party</th>
                                                <th>Statr Date</th>
                                                <th>Subscription Type</th>
                                                <th>Mobile Number</th>
                                                <th>Whatsapp Api Required?</th>
                                                <th>Email</th>
                                                <th>username </th>
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
                                              <td><?php echo $value['client_code'];?></td>
                                              <td><?php echo $value['client_name'];?></td>
                                              <td><?php echo $value['refrence'];?></td>
                                              <td><?php echo $value['edition'];?></td>
                                              <td><?php echo $value['subscription_for_webaccess_of_party'];?></td>
                                              <td><?php echo $value['start_date'];?></td>
                                              <td><?php echo $value['subscription_type'];?></td>
                                              <td><?php echo $value['mobile_number'];?></td>
                                              <td><?php echo $value['whatsapp_api_required'];?></td>
                                              <td><?php echo $value['email'];?></td>
                                              <td><?php echo $value['username'];?></td>
                                              <td ><?php $date = $value['updated_at'];echo date('d-m-Y H:i', strtotime($date)); ?></td>
                                                    <td>
                                                              <?php if($value['status']==1){ ?>
                                                              <a href="<?php echo site_url('Client/upadteStatus/'.'0'.'/'.$value['id']);?>" class="btn btn-success btn-sm" value="<?php echo $value['status'];?>">Active</i>
                                                              </a>
                                                              <?php }else{ ?>
                                                              <a href="<?php echo site_url('Client/upadteStatus/'.'1'.'/'.$value['id']);?>" class="btn btn-danger btn-sm" value="<?php echo $value['status'];?>">De-active</i>
                                                              </a><?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('Client/editClient/').$value['id'];?>" class="btn btn-info btn-sm">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('Client/deleterecord/').$value['id'];?>/Client/details" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Client?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
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