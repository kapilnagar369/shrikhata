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
                        <h4 class="page-title">Exchange</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Exchange/details');?>">Exchange</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Exchange</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Exchange/editExchangedetails'); ?>" method="post" id="Myform"  onsubmit="return Validate();" name="changepass">
                                 <input type="hidden"  name="id" required="" value="<?php echo $value['id'];?>">
                                  <div class="card-body">
                                    <h4 class="card-title">Edit Exchange</h4>
                                    <div class="form-group row">
                                         

                                         <label for="fname" class="col-sm-2 text-right control-label col-form-label">Exchange Code</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="fname" placeholder="Exchange Code Here" readonly="" name="Exchange_code" required value="<?php echo $value['Exchange_Code'];?>">
                                        </div>
                                    
                                         

                                         <label for="Exchange_name" class="col-sm-2 text-right control-label col-form-label">Exchange Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="Exchange_name" placeholder="Exchange Name Here" name="Exchange_name" required value="<?php echo $value['Exchange_Name'];?>">
                                        </div>
                                       </div>

                                         <div class="form-group row">
                                         

                                         <label for="Currancy" class="col-sm-2 text-right control-label col-form-label">Currancy </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="Currancy" placeholder="Currancy Here" name="Currancy" required value="<?php echo $value['Currancy'];?>">
                                        </div>
                                    
                                         

                                        
                                         <label for="Upline_Code" class="col-sm-2 text-right control-label col-form-label">Upline A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="Upline_Code"  onchange="Settlement('Yes');"  name="Upline_Code" required >
                                             <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                              <option   <?php if($pat['id']==$value['Upline_Code']) { echo 'Selected'; } ?>        value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                        </div>
                                       </div>


                                         <div class="form-group row">
                                         

                                         <label for="Direct_Settle" class="col-sm-2 text-right control-label col-form-label">Direct Settle</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="Direct_Settle"  onchange="Settlement(this.value);"  name="Direct_Settle" required >
                                             <option value="">Please Select</option>
                                              <option <?php if($value['Direct_Settle'] == 'Yes'){ echo 'Selected';}?> value="Yes">Yes</option>
                                              <option <?php if($value['Direct_Settle'] == 'No'){ echo 'Selected';}?> value="No">No</option>
                                            </select>
                                        </div>
                                    
                                         

                                         <label for="Settlement_ac" class="col-sm-2 text-right control-label col-form-label">Settlement A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="Settlement_ac"  name="Settlement_ac" required >

                                              <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                              <option   <?php if($pat['id']==$value['Settlement_ac']) { echo 'Selected'; } ?>        value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                        </div>
                                       </div>
                           
                                     <div class="form-group row">
                                                                     
                                 <label for="Rate" class="col-sm-2 text-right control-label col-form-label">Rate</label>
                                  <div class="col-sm-4">
                                      <input type="number"  value="<?php echo $value['Rate']; ?>" class="form-control" id="Rate" placeholder="0.000" step=".001" name="Rate" required >
                                  </div>

                                  <label for="Commision" class="col-sm-2 text-right control-label col-form-label">Commision</label>
                                  <div class="col-sm-4">
                                      <input type="number"  value="<?php echo $value['Commision']; ?>" class="form-control num" id="Commision" placeholder="0.000" step=".001" name="Commision" required >
                                  </div>

                                 </div>

                                    


                                         <div class="form-group row">
                                         <label for="Comm_Type" class="col-sm-2 text-right control-label col-form-label">Comm Type</label>
                                        <div class="col-sm-4">
                                            <Select class="form-control" id="Comm_Type" name="Comm_Type" required >
                                                 <option value=""> Please Select </option>
                                                <option <?php if($value['Comm_Type'] == '0'){ echo 'Selected';}?>  value="0" > %</option>
                                                <option  <?php if($value['Comm_Type'] == '1'){ echo 'Selected';}?>   value="1">Currency</option>
                                            </Select>
                                        </div>
                                     
                                       <label for="Settlement_ac" class="col-sm-2 text-right control-label col-form-label">Commision A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="commision_ac"  name="commision_ac"   >
                                             <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                                    <option   <?php if($pat['id']==$value['commision_ac']) { echo 'Selected'; } ?>        value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                             
                                              <?php } ?>
                                            </select>
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

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">
         function Settlement(val) {
            if(val=='Yes') {
               var Upline_code= $('#Upline_Code').val();
               $('#Settlement_ac').val(Upline_code);
               $('#Settlement_ac').trigger('change');
              } else {
                               $('#Settlement_ac').val('');
                               $('#Settlement_ac').trigger('change');

              }
         }
          </script>