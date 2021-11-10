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
                        <h4 class="page-title">ID master</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Idmaster/details');?>">ID master</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add ID master</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Idmaster/addIdmasterdetails'); ?>" method="post" id="Myform" onsubmit="return Validate();" name="changepass">

                                                
                                <div class="card-body">
                                    <h4 class="card-title">Add ID master</h4>
                                    <div class="form-group row">
                                         

                                         <label for="user_name" class="col-sm-2 text-right control-label col-form-label">User Name</label>
                                        <div class="col-sm-4">
                                            <input type="text"  value="<?php echo set_value('user_name'); ?>"  class="form-control" id="user_name" placeholder="User Name Here" name="user_name" required >
                                              <?php echo form_error('user_name');?>
                                        </div>
                                    
                                         

                                         <label for="Idmaster_type" class="col-sm-2 text-right control-label col-form-label">Party A/C</label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" onchange="Settlement(this.value)" id="Idmaster_type"  name="party_code" required >
                                              <option value="">Please Select</option>
                                              <?php if($Party) {
                                                  foreach($Party as $partyData) { ?>
                                              <option  <?php echo set_select('party_code',$partyData['id'], ( !empty($party_code) && $party_code == $partyData['id'] ? TRUE : FALSE ))?>  value="<?php echo $partyData['id']; ?>"><?php echo  $partyData['party_code'] .' ( '. $partyData['party_name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                       </div>

                                         <div class="form-group row">
                                         

                                        <label for="Idmaster_type" class="col-sm-2 text-right control-label col-form-label">Exchange</label>
                                        <div class="col-sm-4">
                                            <select  class="form-control  myselect" id="Idmaster_type"  name="exch_code" required >
                                              <option value="">Please Select</option>
                                              <?php if($Exchange) {
                                                  foreach($Exchange as $ExchangeData) { ?>
                                              <option    <?php echo set_select('exch_code',$ExchangeData['id'], ( !empty($exch_code) && $exch_code == $ExchangeData['id'] ? TRUE : FALSE ))?>     value="<?php echo $ExchangeData['id']; ?>"><?php echo $ExchangeData['Exchange_Code'].' ('.$ExchangeData['Exchange_Name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                    
                                         

                                         <label for="rate" class="col-sm-2 text-right control-label col-form-label">Rate</label>
                                        <div class="col-sm-4">
                                            <input type="number"   value="<?php echo set_value('rate'); ?>" step=".001" class="form-control" id="rate" placeholder="0.00" name="rate" required >
                                        </div>
                                       </div>


                                         <div class="form-group row">
                                         

                                         <label for="Commision" class="col-sm-2 text-right control-label col-form-label">Commision</label>
                                        <div class="col-sm-4">
                                            <input type="number"   value="<?php if(set_value('commision')) echo set_value('commision'); else echo '0.00';?>"  step=".01" class="form-control" id="commision" placeholder="0.00" name="commision" required >
                                        </div>
                                     <label for="Comm_Type" class="col-sm-2 text-right control-label col-form-label">Comm Type</label>
                                        <div class="col-sm-4">
                                            <Select class="form-control" id="commision_type" name="commision_type"  >
                                           <option value="">Please Select </option>
                                                <option <?php echo set_select('commision_type','0', ( !empty($commision_type) && $commision_type == "0" ? TRUE : FALSE ))?>   value="0">%</option>
                                                <option  <?php echo set_select('commision_type','1', ( !empty($commision_type) && $commision_type == "1" ? TRUE : FALSE ))?>  value="1">Currency</option>
                                            </Select>
                                        </div>
                                         


                                       </div>


                                        <div class="form-group row">
                                        
                                     
                                       <label for="Settlement_ac" class="col-sm-2 text-right control-label col-form-label">Commision A/C</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="commision_ac"  name="commision_ac"   >
                                             <option value=""> Please Select </option>
                                              <?php foreach($Party as $pat) { ?>
                                              <option   <?php echo set_select('commision_ac',$pat['id'], ( !empty($commision_ac) && $commision_ac == $pat['id'] ? TRUE : FALSE ))?> value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                        </div>
                                       

                                        <label for="partner_code" class="col-sm-2 text-right control-label col-form-label">Partner A/C</label>
                                        <div class="col-sm-4">
                                         

                                           <select  class="form-control  myselect" id="partner_code"  name="partner_code"  >
                                              <option value="">Please Select</option>
                                            <?php if($Party) {
                                                  foreach($Party as $partyData) { ?>
                                              <option <?php echo set_select('partner_code',$partyData['id'], ( !empty($partner_code) && $partner_code == $partyData['id'] ? TRUE : FALSE ))?>     value="<?php echo $partyData['id']; ?>"><?php echo  $partyData['party_code'] .' ( '. $partyData['party_name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>                                    
                                      </div>
    
                                       </div>


                                       

                                          <div class="form-group row">
                                          
                                       <label for="partnership_type" class="col-sm-2 text-right control-label col-form-label">Partnership Type</label>
                                        <div class="col-sm-4">
                                          <Select class="form-control" id="partnership_type" name="partnership_type"  >
                                           <option value="">Please Select </option>
                                                <option <?php echo set_select('partnership_type','0', ( !empty($partnership_type) && $partnership_type == "0" ? TRUE : FALSE ))?>   value="0">%</option>
                                                <option  <?php echo set_select('partnership_type','1', ( !empty($partnership_type) && $partnership_type == "1" ? TRUE : FALSE ))?>  value="1">Currency</option>
                                            </Select>
                                       
                                        </div>        
                                    
                                      <label for="partnership_rate" class="col-sm-2 text-right control-label col-form-label">Partnership Rate</label>
                                        <div class="col-sm-4">
                                            <input type="number" value="<?php if(set_value('partnership_rate')) echo set_value('partnership_rate'); else echo '0.00';  ?>" class="form-control" id="partnership_rate" placeholder="0.00" step=".01" name="partnership_rate" required >
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
         
               $('#commision_ac').val(val);
               $('#commision_ac').trigger('change');
            }
       </script>