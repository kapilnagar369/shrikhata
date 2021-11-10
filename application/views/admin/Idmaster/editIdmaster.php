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
                        <h4 class="page-title">State</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Idmaster/details');?>">Idmaster</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Party</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Idmaster/editIdmasterdetails'); ?>" method="post" id="Myform"  onsubmit="return Validate();" name="changepass">
                                 <input type="hidden"  name="id" required="" value="<?php echo $value['id'];?>">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Idmaster</h4>
                                      <div class="form-group row">
                                         

                                         <label for="user_name" class="col-sm-2 text-right control-label col-form-label">User Name</label>
                                        <div class="col-sm-4">
                                            <input type="text"  readonly="" value="<?php echo $value['user_name']; ?>"  class="form-control" id="user_name" placeholder="User Name Here" name="user_name" required >
                                           
                                        </div>
                                    
                                         

                                         <label for="Idmaster_type" class="col-sm-2 text-right control-label col-form-label">Party A/C</label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" onchange="Settlement(this.value)" id="Idmaster_type"  name="party_code" required >
                                              <option value="">Please Select</option>
                                              <?php if($Party) {
                                                  foreach($Party as $partyData) { ?>
                                              <option   <?php if($partyData['id']==$value['party_code']) { echo 'Selected'; } ?>   value="<?php echo $partyData['id']; ?>"><?php echo  $partyData['party_code'] .' ( '. $partyData['party_name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                       </div>

                                         <div class="form-group row">
                                         

                                        <label for="Idmaster_type" class="col-sm-2 text-right control-label col-form-label">Exchange</label>
                                        <div class="col-sm-4">
                                            <select  readonly class="form-control  myselect" id="Idmaster_type"  name="exch_code" required >
                                              <option value="">Please Select</option>
                                              <?php if($Exchange) {
                                                  foreach($Exchange as $ExchangeData) { ?>
                                              <option   <?php if($ExchangeData['id']==$value['exch_code']) { echo 'Selected'; } ?>       value="<?php echo $ExchangeData['id']; ?>"><?php echo $ExchangeData['Exchange_Code'].' ('.$ExchangeData['Exchange_Name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                    
                                         

                                         <label for="rate" class="col-sm-2 text-right control-label col-form-label">Rate</label>
                                        <div class="col-sm-4">
                                            <input type="number"   value="<?php echo $value['rate']; ?>" step=".001" class="form-control" id="rate" placeholder="0.00" name="rate" required >
                                        </div>
                                       </div>


                                         <div class="form-group row">
                                         

                                         <label for="Commision" class="col-sm-2 text-right control-label col-form-label">Commision</label>
                                        <div class="col-sm-4">
                                            <input type="number"   value="<?php echo $value['commision']; ?>"  step=".001" class="form-control" id="commision" placeholder="0.00"  name="commision" required >
                                        </div>
                                     <label for="Comm_Type" class="col-sm-2 text-right control-label col-form-label">Comm Type</label>
                                        <div class="col-sm-4">
                                            <Select class="form-control" id="commision_type" name="commision_type" required >
                                           <option value="">Please Select </option>
                                                 <option value=""> Please Select </option>
                                                <option <?php if($value['commision_type'] == '0'){ echo 'Selected';}?>  value="0" > %</option>
                                                <option  <?php if($value['commision_type'] == '1'){ echo 'Selected';}?>   value="1">Currency</option>
                                            </Select>
                                        </div>
                                         


                                       </div>


                                        <div class="form-group row">
                                        
                                     
                                       <label for="Settlement_ac" class="col-sm-2 text-right control-label col-form-label">Commision A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="commision_ac"  name="commision_ac"  required >
                                             <option value=""> Please Select </option>
                                              <?php foreach($Party as $pat) { ?>
                                              <option  <?php if($pat['id']==$value['commision_ac']) { echo 'Selected'; } ?>       value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                        </div>
                                       

                                        <label for="partner_code" class="col-sm-2 text-right control-label col-form-label">Partner A/C</label>
                                        <div class="col-sm-4">
                                         

                                           <select  class="form-control  myselect" id="partner_code"  name="partner_code" required >
                                              <option value="">Please Select</option>
                                            <?php if($Party) {
                                                  foreach($Party as $partyData) { ?>
                                              <option   <?php if($partyData['id']==$value['partner_code']) { echo 'Selected'; } ?>       value="<?php echo $partyData['id']; ?>"><?php echo  $partyData['party_code'] .' ( '. $partyData['party_name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>                                    
                                      </div>
    
                                       </div>


                                       

                                          <div class="form-group row">
                                          
                                       <label for="partnership_type" class="col-sm-2 text-right control-label col-form-label">Partnership Type</label>
                                        <div class="col-sm-4">
                                          <Select class="form-control" id="partnership_type" name="partnership_type" required >
                                           <option value="">Please Select </option>
                                                 <option value=""> Please Select </option>
                                                <option <?php if($value['partnership_type'] == '0'){ echo 'Selected';}?>  value="0" > %</option>
                                                <option  <?php if($value['partnership_type'] == '1'){ echo 'Selected';}?>   value="1">Currency</option>
                                            </select>
                                       
                                        </div>        
                                    
                                      <label for="partnership_rate" class="col-sm-2 text-right control-label col-form-label">Partnership Rate</label>
                                        <div class="col-sm-4">
                                            <input type="number" value="<?php echo $value['partnership_rate']; ?>" class="form-control" id="partnership_rate" placeholder="0.00" step=".01" name="partnership_rate" required >
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