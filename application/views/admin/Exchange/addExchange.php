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
                                    <li class="breadcrumb-item active" aria-current="page">Add Exchange</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Exchange/addExchangedetails'); ?>" method="post" id="Myform"  name="changepass">

                                                
                                <div class="card-body">
                                    <h4 class="card-title">Add Exchange</h4>
                                    <div class="form-group row">
                                         

                                         <label for="Exchange_code" class="col-sm-2 text-right control-label col-form-label">Exchange Code</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  value="<?php echo set_value('Exchange_code'); ?>"  id="Exchange_code" placeholder="Exchange Code Here" name="Exchange_code" required >
                                        <?php echo form_error('Exchange_code');?>
                                        </div>
                                    
                                         

                                         <label for="Exchange_name" class="col-sm-2 text-right control-label col-form-label">Exchange Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="Exchange_name"  value="<?php echo set_value('Exchange_name'); ?>"    placeholder="Exchange Name Here" name="Exchange_name" required >
                                        </div>
                                       </div>

                                         <div class="form-group row">
                                         

                                         <label for="Currancy" class="col-sm-2 text-right control-label col-form-label">Currancy </label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="Currancy"  name="Currancy" required >
                                            <option   <?php echo set_select('Currancy','INR', ( !empty($Currancy) && $Currancy == "INR" ? TRUE : FALSE ))?>   value="INR">INR</option>
                                            <option   <?php echo set_select('Currancy','HKD', ( !empty($Currancy) && $Currancy == "HKD" ? TRUE : FALSE ))?>    value="HKD">HKD</option>
                                            <option    <?php echo set_select('Currancy','USD', ( !empty($Currancy) && $Currancy == "USD" ? TRUE : FALSE ))?>   value="USD">USD</option>
                                            <option    <?php echo set_select('Currancy','AED', ( !empty($Currancy) && $Currancy == "AED" ? TRUE : FALSE ))?>   value="AED">AED</option>
                                            </select>
                                        </div>
                                    
                                         

                                         <label for="Upline_Code" class="col-sm-2 text-right control-label col-form-label">Upline A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="Upline_Code"  onchange="Settlement('Yes');"  name="Upline_Code" required >
                                             <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                              <option   <?php echo set_select('Upline_Code',$pat['id'], ( !empty($Upline_Code) && $Upline_Code == $pat['id'] ? TRUE : FALSE ))?>         value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                        </div>
                                       </div>


                                         <div class="form-group row">
                                         

                                         <label for="Direct_Settle" class="col-sm-2 text-right control-label col-form-label">Direct Settle</label>
                                        <div class="col-sm-4">
                                            <Select class="form-control"  onchange="Settlement(this.value);"  id="Direct_Settle" name="Direct_Settle" 
                                            required > 
                                            <option value="">Please Select</option>
                                                  <option <?php echo set_select('Direct_Settle','Yes', ( !empty($Direct_Settle) && $Direct_Settle == "Yes" ? TRUE : FALSE ))?>   value="Yes">Yes</option>
                                                <option  <?php echo set_select('Direct_Settle','No', ( !empty($Direct_Settle) && $Direct_Settle == "No" ? TRUE : FALSE ))?>  value="No">No</option>
                                       
                                            </Select>
                                        </div>
                                    
                                         

                                         <label for="Settlement_ac" class="col-sm-2 text-right control-label col-form-label">Settlement A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="Settlement_ac"  name="Settlement_ac"  required >
                                             <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                                <option   <?php echo set_select('Settlement_ac',$pat['id'], ( !empty($Settlement_ac) && $Settlement_ac == $pat['id'] ? TRUE : FALSE ))?>         value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                        </div>
                                       </div>
                            <div class="form-group row">
                                                                     
                                 <label for="Rate" class="col-sm-2 text-right control-label col-form-label">Rate</label>
                                  <div class="col-sm-4">
                                      <input type="number"  value="<?php echo set_value('Rate'); ?>" class="form-control" id="Rate" placeholder="0.000" step=".001" name="Rate" required >
                                  </div>

                                  <label for="Commision" class="col-sm-2 text-right control-label col-form-label">Commision</label>
                                  <div class="col-sm-4">
                                      <input type="number"  value="<?php echo set_value('Commision'); ?>" class="form-control num" id="Commision" placeholder="0.000" step=".001" name="Commision" required >
                                  </div>

                                 </div>

                                       
                                    <div class="form-group row">
                                         <label for="Comm_Type" class="col-sm-2 text-right control-label col-form-label">Comm Type</label>
                                        <div class="col-sm-4">
                                            <Select class="form-control" id="Comm_Type" name="Comm_Type" required >
                                            


                                                    <option <?php echo set_select('Comm_Type','0', ( !empty($Comm_Type) && $Comm_Type == "0" ? TRUE : FALSE ))?>   value="0">%</option>
                                                <option  <?php echo set_select('Comm_Type','1', ( !empty($Comm_Type) && $Comm_Type == "1" ? TRUE : FALSE ))?>  value="1">Currency</option>
                                            </Select>
                                        </div>
                                     
                                       <label for="Settlement_ac" class="col-sm-2 text-right control-label col-form-label">Commision A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="commision_ac"  name="commision_ac"   >
                                             <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                                  <option   <?php echo set_select('commision_ac',$pat['id'], ( !empty($commision_ac) && $commision_ac == $pat['id'] ? TRUE : FALSE ))?>         value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
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


           