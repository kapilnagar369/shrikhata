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
                        <h4 class="page-title">User</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Category/details');?>">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <?php foreach ($records as $value) { ?>
                            <form class="form-horizontal" action="<?php echo site_url('User/edituserdetails'); ?>" method="post" id="Myform" enctype="multipart/form-data" onsubmit="return Validate();" name="changepass">
                                 <input type="hidden"  name="id" required="" value="<?php echo $value['id'];?>">
                                <div class="card-body">
                                    <h4 class="card-title">Edit User</h4>
                                    <div class="form-group row">
                                       
                                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">email</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="fname" placeholder="email Here" name="email" required value="<?php echo $value['email'];?>">
                                        </div>
                                          <label for="fname" class="col-sm-2 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="fname" value="<?php echo $value['password'];?>" placeholder="password Here" name="password" required >
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
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