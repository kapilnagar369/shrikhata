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
                        <h4 class="page-title">Party</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Party/details');?>">Party</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Party</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Party/addPartydetails'); ?>" method="post" id="Myform"  name="changepass">

                                                
                                <div class="card-body">
                                    <h4 class="card-title">Add Party</h4>
                                    <div class="form-group row">
                                         

                                         <label for="fname" class="col-sm-2 text-right control-label col-form-label">Party Code</label>
                                        <div class="col-sm-4">
                                         <input type="text" class="form-control" maxlength="8" id="fname" placeholder="Party Code Here" value="<?php echo set_value('party_code'); ?>" name="party_code" required >
                                         <?php echo form_error('party_code');?>
                                        </div>
                                    
                                         

                                         <label for="party_name" class="col-sm-2 text-right control-label col-form-label">Party Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="party_name" value="<?php echo set_value('party_name'); ?>" placeholder="Party Name Here" name="party_name" required >
                                        </div>
                                       </div>

                                         <div class="form-group row">
                                         

                                         <label for="reference" class="col-sm-2 text-right control-label col-form-label">Reference</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  value="<?php echo set_value('reference'); ?>"  id="reference" placeholder="Party reference Here" name="reference" required >
                                        </div>
                                    
                                         

                                         <label for="mobile" class="col-sm-2 text-right control-label col-form-label">Whatsapp Number </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control " minlength="10" maxlength="10" value="<?php echo set_value('wa_number'); ?>" 
                                            id="mobile" placeholder="Whatsapp Number Here" name="wa_number" required >
                                        </div>
                                       </div>


                                         <div class="form-group row">
                                         

                                         <label for="email" class="col-sm-2 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control email" value="<?php echo set_value('email'); ?>" id="email" placeholder=" email Here" name="email" required >
                                             <?php echo form_error('email');?>
                                        </div>
                                    
                                         

                                         <label for="party_type" class="col-sm-2 text-right control-label col-form-label">Party Type </label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="party_type"  name="party_type" required >
                                          
                                                <option value="" >Please Select</option>
                                                <option <?php echo set_select('party_type','Customer', ( !empty($party_type) && $party_type == "Customer" ? TRUE : FALSE ))?>   value="Customer">Customer</option>
                                                <option  <?php echo set_select('party_type','Upline', ( !empty($party_type) && $party_type == "Upline" ? TRUE : FALSE ))?>  value="Upline">Upline</option>
                                            </select>
                                        </div>
                                       </div>

                                       <div class="form-group row">
                                         

                                         <label for="op_bal" class="col-sm-2 text-right control-label col-form-label">Opening Balance</label>
                                        <div class="col-sm-4">
                                            <input type="number" step=".01" class="form-control " placeholder="0.00" id="op_bal" name="op_bal" required value="<?php echo set_value('op_bal'); ?>">
                                        </div>
                                    
                                         

                                         <label for="dr_cr" class="col-sm-2 text-right control-label col-form-label">Debit/Credit  </label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="dr_cr"  name="dr_cr" required >
                                             
                                               <option value="" >Please Select</option>
                                                <option <?php echo set_select('dr_cr','cr', ( !empty($dr_cr) && $dr_cr == "cr" ? TRUE : FALSE ))?>   value="cr">Credit</option>
                                                <option  <?php echo set_select('dr_cr','dr', ( !empty($dr_cr) && $dr_cr == "dr" ? TRUE : FALSE ))?>  value="dr">Debit</option>
                                            </select>
                                        </div>
                                       </div>


                                          <div class="form-group row">
                                          <label for="web_access" class="col-sm-2 text-right control-label col-form-label">Web Access </label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="web_access"  name="web_access" required onchange="checkwebAccess()">
                                               <option value="" >Please Select</option>
                                                <option <?php echo set_select('web_access','Yes', ( !empty($web_access) && $web_access == "Yes" ? TRUE : FALSE ))?>   value="Yes">Yes</option>
                                                <option  <?php echo set_select('web_access','No', ( !empty($web_access) && $web_access == "No" ? TRUE : FALSE ))?>  value="No">No</option>
                                            </select>
                                        </div>
                                            
                                    
                                       </div>

                                        <div class="form-group row" id="hideDiv" <?php  if(set_value('web_access')!='Yes') {  ?>style="display: none" <?php } ?>>
                                          <label for="user_name" class="col-sm-2 text-right control-label col-form-label">User Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="user_name" placeholder="User name Here" name="user_name"  value="<?php echo set_value('user_name'); ?>">
                                             <?php echo form_error('user_name');?>
                                        </div> 
                                        
                                         <label for="password" class="col-sm-2 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="password" placeholder=" password Here" name="password" value="<?php echo set_value('password'); ?>" >
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
                

              function  checkwebAccess() {
               var web_access = $('#web_access').val();

               if(web_access == 'No') {
                 $('#hideDiv').hide();
                 $('#user_name').val('');
                 $('#password').val('');
               }else{
                $('#hideDiv').show();
               }
            }
$(document).ready(function() {
 $('.num_only').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});


 $('.email').keyup(function(e)
                                {
  const email = document.querySelector('input[type=email]');
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (regex.test(email.value)) {
    email.setCustomValidity('');
  } else {
    email.setCustomValidity('Enter valid email Address');
  }
});



});  


</script>