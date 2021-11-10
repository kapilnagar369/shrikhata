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
                        <h4 class="page-title">Users</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            <?php echo $this->session->flashdata('Addcategory');?>
                            <?php echo $this->session->flashdata('Upadtecategory');?>
                            <?php echo $this->session->flashdata('deletecat');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <!-- <div class="btn-group" style="float: right;">
                                    <a href="<?php echo site_url('Category/addcategory');?>" id="addRow" class="btn btn-info" style="margin-top: -35px;">
                                       <i class="fa fa-plus"></i> Add
                                    </a>
                                </div> -->
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <!-- <th>Address</th> -->
                                                <!-- <th>Profile</th> -->
                                                <th>Date</th>
                                                <th>Satus</th>
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
                                                    <!-- <td><?php if ($value['type']=='2') { echo "Vendor";}elseif ($value['type']=='3') {
                                                       echo "Supplier";
                                                    }elseif ($value['type']=='4') {
                                                       echo "Labour";
                                                    }?></td> -->
                                                     <td ><?php echo $value['name'];?></td>
                                                     <td ><?php echo $value['email'];?></td>
                                                     <td ><?php echo $value['phone'];?></td>
                                                     <!-- <td ><?php echo $value['address'];?></td> -->

                                                     <!-- <td ><img src="<?php echo $value['profile_pic'];?>"></td> -->
                                                    
                                                    <td ><?php $date = $value['date'];echo date('d-m-Y', strtotime($date)); ?></td>
                                                    <td>
                                                              <?php if($value['status']==1){ ?>
                                                              <a href="<?php echo site_url('User/upadteStatus/'.'0'.'/'.$value['id']);?>" class="btn btn-success btn-sm" value="<?php echo $value['status'];?>">Active</i>
                                                              </a>
                                                              <?php }else{ ?>
                                                              <a href="<?php echo site_url('User/upadteStatus/'.'1'.'/'.$value['id']);?>" class="btn btn-danger btn-sm" value="<?php echo $value['status'];?>">De-active</i>
                                                              </a><?php } ?>
                                                    </td>
                                                    <td>
                                                     <!--    <a href="<?php echo site_url('Category/editcategory/').$value['id'];?>" class="btn btn-info btn-sm">
                                                            <i class="far fa-edit"></i>
                                                        </a> -->
                                                        <a href="<?php echo site_url('User/deleterecord/').$value['id'];?>/ad_user/details" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?')">
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