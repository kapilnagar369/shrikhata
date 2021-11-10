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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Client/editClientdetails'); ?>" method="post" id="Myform" onsubmit="return Validate();" name="changepass">
                                 <input type="hidden"  name="id" required="" value="<?php echo $value['id'];?>">
                             <div class="card-body">
                                    <h4 class="card-title">Edit Client</h4>
                                   

                                    
                                
<div class="form-group row">
                                        <label for="client_code" class="col-sm-2 text-right control-label col-form-label">Client Code</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="client_code"    name="client_code" value="<?php echo $value['client_code']; ?>" readonly="" >
                                        </div>
                                       <label for="client_name" class="col-sm-2 text-right control-label col-form-label">Client Name</label>
                                        <div class="col-sm-4">
                                            <input type="text"  value="<?php echo $value['client_name']; ?>" class="form-control" id="client_name"  value="" name="client_name" required >
                                        </div>
                                       
                                    </div>
                                     

                                    <div class="form-group row">
                                        <label for="refrence" class="col-sm-2 text-right control-label col-form-label">Reference</label>
                                        <div class="col-sm-4">
                                            <input type="text" value="<?php echo $value['refrence']; ?>" class="form-control" id="refrence" value=""   name="refrence" required >
                                        </div>
                                       <label for="edition" class="col-sm-2 text-right control-label col-form-label">Edition</label>
                                        <div class="col-sm-4">
                                            <select  class="form-control"  id="edition"  onchange="changeeEdition(this.value);"   name="edition" required >
                                                <option value="">Please Select</option>
                                                <option value="Demo"  <?php if($value['edition']=='Demo') { echo 'selected'; } ?>   >Demo</option>
                                                <option value="Basic"  <?php if($value['edition']=='Basic') { echo 'selected'; } ?> >Basic</option>
                                                <option value="Advance"  <?php if($value['edition']=='Advance') { echo 'selected'; } ?> >Advance</option>
                                            </select>
                                        </div>
                                       
                                    </div>
                                     
                                      <div class="form-group row whatsapp_api_required"  <?php if($value['edition'] == "Basic") echo 'style="display:none"';  ?>>
                                        <label for="subscription_for_webaccess_of_party" class="col-sm-2 text-right control-label col-form-label">Subscription for webaccess of party</label>
                                        <div class="col-sm-4">
                                        <select class="form-control whatsapp_api_required" id="subscription_for_webaccess_of_party"    name="subscription_for_webaccess_of_party" required >
                                        <option value="">Please Select</option>
                                                <option value="20"  <?php if($value['subscription_for_webaccess_of_party']=='20') { echo 'selected'; } ?>   >20</option>
                                                <option value="50"   <?php if($value['subscription_for_webaccess_of_party']=='50') { echo 'selected'; } ?>    >50</option>
                                                <option value="75"   <?php if($value['subscription_for_webaccess_of_party']=='75') { echo 'selected'; } ?> >75</option>
                                                <option value="100"   <?php if($value['subscription_for_webaccess_of_party']=='100') { echo 'selected'; } ?> >100</option>
                                            </select>
                                       
                                        </div>
                                          <label for="whatsapp_api_required" class="col-sm-2 text-right control-label col-form-label ">Whatsapp Api Required</label>
                                        <div class="col-sm-4">
                                            <select  class="form-control whatsapp_api_required" id="whatsapp_api_required" value="<?php echo $value['whatsapp_api_required']; ?>"   name="whatsapp_api_required" required >
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                             
                                            </select>
                                        </div>
                                       
                                    </div>


                                      <div class="form-group row">
                                       

                                       <label for="mobile_number" class="col-sm-2 text-right control-label col-form-label">Mobile Number</label>
                                        <div class="col-sm-4">
                                            <input type="number" maxlength="10" value="<?php echo $value['mobile_number']; ?>" minlength="10" class="form-control" id="mobile"  value="" name="mobile_number" required >
                                        </div>
                                        
                                        <label for="subscription_type" class="col-sm-2 text-right control-label col-form-label">Subscription Type</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="subscription_type"   name="subscription_type" required >
                                                <option <?php if($value['subscription_type'] == "Monthly") echo 'Selected';  ?> value="Monthly">Monthly</option>
                                                <option  <?php if($value['subscription_type'] == "Quatrely") echo 'Selected';  ?> value="Quatrely">Quatrely</option>
                                                <option <?php if($value['subscription_type'] == "Half Yearly") echo 'Selected';  ?> value="Half Yearly">Half Yearly</option>
                                                <option <?php if($value['subscription_type'] == "Yearly") echo 'Selected';  ?> value="Yearly">Yearly</option>
                                            </select>
                                       
                                        </div>
                                    
                                    </div>


                                       <div class="form-group row">
                                           <label for="amount_ratio" class="col-sm-2 text-right control-label col-form-label">Amount Ratio</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="amount_ratio"    name="amount_ratio" required >
                                               <option value="" >Please Select</option>
                                                <option <?php if($value['amount_ratio'] == "1") echo 'Selected';  ?> value="1">1</option>
                                                <option <?php if($value['amount_ratio'] == "10") echo 'Selected';  ?>  value="10">10</option>
                                                <option <?php if($value['amount_ratio'] == "100") echo 'Selected';  ?> value="100">100</option>
                                                <option <?php if($value['amount_ratio'] == "1000") echo 'Selected';  ?>  value="1000">1000</option>
                                            </select>
                                       
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                      
                                       <label for="email" class="col-sm-2 text-right control-label col-form-label">email</label>
                                        <div class="col-sm-4">
                                            <input type="email"   class="form-control" id="email" value="<?php echo $value['email']; ?>"  name="email" required >
                                              <?php echo form_error('email'); ?>
                                        </div>
                                             <label for="smtp_details" class="col-sm-2 text-right control-label col-form-label">SMTP Details</label>
                                        <div class="col-sm-4">
                                          <select class="form-control" id="smtp_details"    onchange="changeSMTP(this.value)"  name="smtp_details" required >
                                                <option value="" >Please Select</option>
                                                <option <?php if($value['smtp_details'] == "Yes") echo 'Selected';  ?>   value="Yes">Yes</option>
                                                <option  <?php if($value['smtp_details'] == "No") echo 'Selected';  ?>  value="No">No</option>
                                             
                                            </select>
                                    </div>

                                </div>

                                <div class="form-group row smtp"   <?php if($value['smtp_details'] == "No") echo 'style="display:none"';  ?> >
                                        <label for="server_address" class="col-sm-2 text-right control-label col-form-label"> SMTP server address</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="server_address" value="<?php echo $value['server_address']; ?>"   placeholder="smtp.gmail.com"  name="server_address"  >
                                        </div>
                                      
                                        <label for="smtp_name" class="col-sm-2 text-right control-label col-form-label">SMTP name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="smtp_name" value="<?php echo $value['smtp_name']; ?>"  placeholder="Your full name"  name="smtp_name"  >
                                        </div>
                                        
                                       
                                    </div>


                                    <div class="form-group row smtp"  <?php if($value['smtp_details'] == "No") echo 'style="display:none"';  ?>>
                                        <label for="smtp_username" class="col-sm-2 text-right control-label col-form-label">SMTP username</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="smtp_username" value="<?php echo $value['smtp_username']; ?>"  placeholder="Your full Email address"  name="smtp_username"  >
                                        </div>
                                      
                                        <label for="smtp_password" class="col-sm-2 text-right control-label col-form-label">SMTP password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="smtp_password" value="<?php echo $value['smtp_password']; ?>"    name="smtp_password"  >
                                        </div>
                                        
                                       
                                    </div>
                                  

                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 text-right control-label col-form-label">Username</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="username" value="<?php echo $value['username']; ?>"  name="username" readonly >
                                        </div>
                                      
                                        <label for="password" class="col-sm-2 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="password" value="<?php echo $value['username']; ?>"   name="password" required >
                                        </div>
                                        
                                       
                                    </div>
                                   

                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" class="btn btn-primary">Submit</button>
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
    
       } else {
          $('.whatsapp_api_required').prop('required',true);
          $('.whatsapp_api_required').show();
         }
      }
         

               
            </script>