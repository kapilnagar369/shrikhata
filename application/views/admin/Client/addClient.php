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
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Client/details');?>">Client</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Client</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Client/addClientdetails'); ?>" method="post"  onsubmit="return Validate();" name="changepass">

                                                
                                <div class="card-body">
                                    <h4 class="card-title">Add Client</h4>
                                      <div class="form-group row">
                                        <label for="client_code" class="col-sm-2 text-right control-label col-form-label">Client Code</label>
                                        <div class="col-sm-4">
                                            <input type="text" maxlength="8" class="form-control" id="client_code"value="<?php echo set_value('client_code');?>"    name="client_code" required >
                                        <?php echo form_error('client_code'); ?>
                                        </div>
                                       <label for="client_name" class="col-sm-2 text-right control-label col-form-label">Client Name</label>
                                        <div class="col-sm-4">
                                            <input type="text"  class="form-control" id="client_name" value="<?php echo set_value('client_name');?>"  name="client_name" required >
                                        </div>
                                       
                                    </div>
                                     

                                    <div class="form-group row">
                                        <label for="reference" class="col-sm-2 text-right control-label col-form-label">Reference</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="refrence" value="<?php echo set_value('refrence');?>"    name="refrence" required >
                                        </div>
                                       <label for="edition" class="col-sm-2 text-right control-label col-form-label">Edition</label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="edition" onchange="changeeEdition(this.value);"   name="edition" required >
                                                <option value="" >Please Select</option>
                                                <option <?php echo set_select('edition','Demo', ( !empty($edition) && $edition == "Demo" ? TRUE : FALSE ))?> value="Demo">Demo</option>
                                                <option <?php echo set_select('edition','Basic', ( !empty($edition) && $edition == "Basic" ? TRUE : FALSE ))?> value="Basic">Basic</option>
                                                <option <?php echo set_select('edition','Advance', ( !empty($edition) && $edition == "Advance" ? TRUE : FALSE ))?> value="Advance">Advance</option>
                                            </select>
                                        </div>
                                       
                                    </div>
                                     
                                      <div class="form-group row">
                                        <label for="subscription_for_webaccess_of_party" class="col-sm-2 text-right control-label col-form-label whatsapp_api_required">Subscription for webaccess of party</label>
                                        <div class="col-sm-4">
                                        <select class="form-control whatsapp_api_required" id="subscription_for_webaccess_of_party"   name="subscription_for_webaccess_of_party" required >
                                        <option value="" >Please Select</option>
                                                <option <?php echo set_select('subscription_for_webaccess_of_party','20', ( !empty($subscription_for_webaccess_of_party) && $subscription_for_webaccess_of_party == "20" ? TRUE : FALSE ))?> value="20">20</option>
                                                <option <?php echo set_select('subscription_for_webaccess_of_party','50', ( !empty($subscription_for_webaccess_of_party) && $subscription_for_webaccess_of_party == "50" ? TRUE : FALSE ))?>  value="50">50</option>
                                                <option <?php echo  set_select('subscription_for_webaccess_of_party','75', ( !empty($subscription_for_webaccess_of_party) && $subscription_for_webaccess_of_party == "in75put" ? TRUE : FALSE ))?>  value="75">75</option>
                                                <option <?php echo set_select('subscription_for_webaccess_of_party','100', ( !empty($subscription_for_webaccess_of_party) && $subscription_for_webaccess_of_party == "100" ? TRUE : FALSE ))?>    value="100">100</option>
                                            </select>
                                       
                                        </div>
                                     
                                         <label for="whatsapp_api_required" class="col-sm-2 text-right control-label col-form-label  whatsapp_api_required ">Whatsapp Api Required</label>
                                        <div class="col-sm-4">
                                            <select  class="form-control whatsapp_api_required" id="whatsapp_api_required" value=""    name="whatsapp_api_required" required >
                                               <option value="" >Please Select</option>
                                                <option <?php echo set_select('whatsapp_api_required','Yes', ( !empty($whatsapp_api_required) && $whatsapp_api_required == "Yes" ? TRUE : FALSE ))?>   value="Yes">Yes</option>
                                                <option  <?php echo set_select('whatsapp_api_required','No', ( !empty($whatsapp_api_required) && $whatsapp_api_required == "No" ? TRUE : FALSE ))?>  value="No">No</option>
                                             
                                            </select>
                                        </div>
                                    </div>


                                      <div class="form-group row">
                                       

                                       <label for="mobile" class="col-sm-2 text-right control-label col-form-label">Mobile Number</label>
                                        <div class="col-sm-4">
                                            <input type="number" maxlength="10" minlength="10" class="form-control" id="mobile" value="<?php echo set_value('mobile_number');?>"  name="mobile_number" required >
                                        </div>
                                        
                                     


                                           <label for="subscription_type" class="col-sm-2 text-right control-label col-form-label">Subscription Type</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="subscription_type"    name="subscription_type" required >
                                               <option value="" >Please Select</option>
                                                <option <?php echo set_select('subscription_type','Monthly', ( !empty($subscription_type) && $subscription_type == "Monthly" ? TRUE : FALSE ))?>  value="Monthly">Monthly</option>
                                                <option <?php echo set_select('subscription_type','Quatrely', ( !empty($subscription_type) && $subscription_type == "Quatrely" ? TRUE : FALSE ))?>  value="Quatrely">Quatrely</option>
                                                <option <?php echo set_select('subscription_type','Half Yearly', ( !empty($subscription_type) && $subscription_type == "Half Yearly" ? TRUE : FALSE ))?> value="Half Yearly">Half Yearly</option>
                                                <option <?php echo set_select('subscription_type','Yearly', ( !empty($subscription_type) && $subscription_type == "Yearly" ? TRUE : FALSE ))?>  value="Yearly">Yearly</option>
                                            </select>
                                       
                                        </div>
                                    </div>

                                       <div class="form-group row">
                                           <label for="amount_ratio" class="col-sm-2 text-right control-label col-form-label">Amount Ratio</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="amount_ratio"  readonly   name="amount_ratio" required >
                                               <option value="" >Please Select</option>
                                                <option <?php echo set_select('amount_ratio','1', ( !empty($amount_ratio) && $amount_ratio == "1" ? TRUE : FALSE ))?>  value="1">1</option>
                                                <option <?php echo set_select('amount_ratio','10', ( !empty($amount_ratio) && $amount_ratio == "10" ? TRUE : FALSE ))?>  value="10">10</option>
                                                <option <?php echo set_select('amount_ratio','100', ( !empty($amount_ratio) && $amount_ratio == "100" ? TRUE : FALSE ))?> value="100">100</option>
                                                <option <?php echo set_select('amount_ratio','1000', ( !empty($amount_ratio) && $amount_ratio == "1000" ? TRUE : FALSE ))?>  value="1000">1000</option>
                                            </select>
                                       
                                        </div>
                                    </div>


                                      <div class="form-group row">
                                      
                                       <label for="email" class="col-sm-2 text-right control-label col-form-label">email</label>
                                        <div class="col-sm-4">
                                            <input type="email"   class="form-control" id="email" value="<?php echo set_value('email');?>"  name="email" required >
                                              <?php echo form_error('email'); ?>
                                        </div>
                                             <label for="smtp_details" class="col-sm-2 text-right control-label col-form-label">SMTP Details</label>
                                        <div class="col-sm-4">
                                          <select class="form-control" id="smtp_details"    onchange="changeSMTP(this.value)"  name="smtp_details" required >
                                                <option value="" >Please Select</option>
                                                <option <?php echo set_select('smtp_details','Yes', ( !empty($smtp_details) && $smtp_details == "Yes" ? TRUE : FALSE ))?>   value="Yes">Yes</option>
                                                <option  <?php echo set_select('smtp_details','No', ( !empty($smtp_details) && $smtp_details == "No" ? TRUE : FALSE ))?>  value="No">No</option>
                                             
                                            </select>
                                    </div>

                                </div>

                                <div class="form-group row smtp">
                                        <label for="server_address" class="col-sm-2 text-right control-label col-form-label"> SMTP server address</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="server_address"value="<?php echo set_value('server_address');?>"   placeholder="smtp.gmail.com"  name="server_address"  >
                                        </div>
                                      
                                        <label for="smtp_name" class="col-sm-2 text-right control-label col-form-label">SMTP name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="smtp_name"value="<?php echo set_value('smtp_name');?>"  placeholder="Your full name"  name="smtp_name"  >
                                        </div>
                                        
                                       
                                    </div>


                                    <div class="form-group row smtp">
                                        <label for="smtp_username" class="col-sm-2 text-right control-label col-form-label">SMTP username</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="smtp_username"value="<?php echo set_value('smtp_username');?>"  placeholder="Your full Email address"  name="smtp_username"  >
                                        </div>
                                      
                                        <label for="smtp_password" class="col-sm-2 text-right control-label col-form-label">SMTP password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="smtp_password"value="<?php echo set_value('smtp_password');?>"    name="smtp_password"  >
                                        </div>
                                        
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 text-right control-label col-form-label">Username</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="username"value="<?php echo set_value('username');?>"    name="username" required >
                                        </div>
                                      
                                        <label for="password" class="col-sm-2 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="password" value="<?php echo set_value('password');?>"   name="password" required >
                                        </div>
                                        
                                       
                                    </div>
                                   

                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" class="btn btn-primary">Submit</button>
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



            <script type="text/javascript">
             function changeSMTP(value) {
if(value=='No'){
        $('.smtp').hide();
    
       } else {
          $('.smtp').show();
         }
      
             }   

              function  changeeEdition(value) {
  
      if(value=='Basic'){
        $('.whatsapp_api_required').removeAttr('required');
        $('.whatsapp_api_required').hide();
          $('.whatsapp_api_required').next(".select2-container").hide();
    
       } else {
          $('.whatsapp_api_required').prop('required',true);
          $('.whatsapp_api_required').show();
           $('.whatsapp_api_required').next(".select2-container").show();
         }
      }
         

               
            </script>