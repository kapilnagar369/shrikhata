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
                        <h4 class="page-title">Profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
            <?php echo $this->session->flashdata('updateadmin');?>
            <?php echo $this->session->flashdata('changepassword');?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card"> 
                            <?php foreach($admin as $row){ ?>
                                    <div class="card-body">
                                      <center><img src="<?php echo base_url();?>uploads/admin/<?php echo $row['image'];?>" class="img-responsive" alt="" style="height: 130px;width: 130px"></center>
                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-7 text-right control-label col-form-label"><?php echo ucwords($row['name']);?></label>
                                    </div>
                            
                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Full Name Here" value="<?php echo $row['name'];?>" name="name" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="cono1" placeholder="Contact No Here" value="<?php echo $row['designation'];?>" name="designation" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lname" placeholder="Last Name Here" value="<?php echo $row['mobile'];?>" name="mobile" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="Email" class="form-control" id="lname" placeholder="Password Here" value="<?php echo $row['email'];?>" name="email" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date Of Birth</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="email1" placeholder="Company Name Here" value="<?php echo $row['dob'];?>" name="dob" disabled>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" disabled><?php echo $row['address'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          <?php } ?>
                        </div>
                       

                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Edit Profile</h5>
                                  <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn btn-info" style="float: right; margin-top: -21px;"><i class="fa fa-key"></i> Change Password
                                  </a>
                                 <form class="form-horizontal" action="<?php echo site_url('welcome/addadmindetails');?>" method="post" id="login" enctype="multipart/form-data" style="margin-top: 30px;">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Full Name Here" value="<?php echo $row['name'];?>" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lname" placeholder="Last Name Here" value="<?php echo $row['mobile'];?>" name="mobile">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="Email" class="form-control" id="lname" placeholder="Password Here" value="<?php echo $row['email'];?>" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date Of Birth</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="email1" placeholder="Company Name Here" value="<?php echo $row['dob'];?>" name="dob">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="cono1" placeholder="Contact No Here" value="<?php echo $row['designation'];?>" name="designation">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address"><?php echo $row['address'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Profile</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="cono1" placeholder="Contact No Here" accept="image/gif, image/jpeg, image/jpg, image/png" name="picture">
                                        </div>
                                    </div>
                                    <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Change Password</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <form action="<?php echo site_url('welcome/changepassword');?>" method="post" id="login">
                                <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label">Old Password</label>
                                                <input class="form-control form-white" placeholder="Enter Old Password" type="Password" name="oldpass" required/>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="control-label">New Password</label>
                                                <input class="form-control form-white" placeholder="Enter New Password" type="Password" name="newpass" required/>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="control-label">Confirm Password</label>
                                                <input class="form-control form-white" placeholder="Enter Confirm Password" type="Password" name="conpass" required/>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="Submit" class="btn btn-danger waves-effect waves-light save-category" >Save</button>
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
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

        <script src="<?php echo base_url();?>dist/js/jquery-3.1.0.min.js"></script>
        <script src="<?php echo base_url();?>dist/js/jquery.validate.min.js"></script>
        <script>
            
            $(document).ready(function(){
                $("#login").validate({
                    rules:{
                        oldpass:{
                            required:true
                        },
                        newpass:{
                            required:true
                            
                        },
                         conpass:{
                            required:true
                            
                        },
                    },messages:{
                        oldpass:{
                            required:"Email Required"
                        }
                         
                        
                    }
                    
                });
            }); 
        </script>    