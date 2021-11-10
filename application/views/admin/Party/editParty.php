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
                            <form class="form-horizontal" action="<?php echo site_url('Party/editPartydetails'); ?>" method="post" id="Myform"  name="changepass">
                                 <input type="hidden"  name="id" required="" value="<?php echo $value['id'];?>">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Party</h4>
                                    <div class="form-group row">
                                         

                                         <label for="fname" class="col-sm-2 text-right control-label col-form-label">Party Code</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" maxlength="8" id="fname" placeholder="Party Code Here" name="party_code" required value="<?php echo $value['party_code'];?>"  readonly>
                                        </div>
                                    
                                         

                                         <label for="party_name" class="col-sm-2 text-right control-label col-form-label">Party Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="party_name" placeholder="Party Name Here" name="party_name" required value="<?php echo $value['party_name'];?>">
                                        </div>
                                       </div>

                                         <div class="form-group row">
                                         

                                         <label for="reference" class="col-sm-2 text-right control-label col-form-label">Reference</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reference" placeholder="Party reference Here" name="reference" required value="<?php echo $value['reference'];?>">
                                        </div>
                                    
                                         

                                         <label for="mobile" class="col-sm-2 text-right control-label col-form-label">Whatsapp Number </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control " id="mobile" minlength="10" maxlength="10" placeholder="Whatsapp Number Here" name="wa_number" required value="<?php echo $value['wa_number'];?>">
                                        </div>
                                       </div>


                                         <div class="form-group row">
                                         
                                    
                                         <label for="email" class="col-sm-2 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control email" id="email" placeholder=" email Here" name="email" required value="<?php echo $value['email'];?>">
                                        </div>
                                         

                                         <label for="party_type" class="col-sm-2 text-right control-label col-form-label">Party Type </label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="party_type"  name="party_type" required >
                                              <option value="">Please Select</option>
                                              <option <?php if($value['party_type'] == 'customer'){ echo 'Selected';}?> value="customer">Customer</option>
                                              <option <?php if($value['party_type'] == 'upline'){ echo 'Selected';}?> value="upline">Upline</option>
                                            </select>
                                        </div>

                                    

                                       </div>
                                       <div class="form-group row">
                                             <label for="op_bal" class="col-sm-2 text-right control-label col-form-label">Opening Balance</label>
                                        <div class="col-sm-4">
                                            <input type="number" step=".01" class="form-control " placeholder="0.00" id="op_bal" name="op_bal" required value="<?php echo $value['op_bal'];?>">

                                        </div>

                                    
                                       
                                         <label for="dr_cr" class="col-sm-2 text-right control-label col-form-label">Debit/Credit </label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="dr_cr"  name="dr_cr" required >
                                              <option value="">Please Select</option>
                                              <option <?php if($value['dr_cr'] == 'dr'){ echo 'Selected';}?> value="dr">Debit</option>
                                              <option <?php if($value['dr_cr'] == 'cr'){ echo 'Selected';}?> value="cr">Credit</option>
                                            </select>
                                        </div>
                                          </div>

                                       <div class="form-group row">
                                        <label for="web_access" class="col-sm-2 text-right control-label col-form-label">Web Access </label>
                                        <div class="col-sm-4">
                                            <select  class="form-control" id="web_access"  name="web_access" required onchange="checkwebAccess()">
                                              <option value="">Please Select</option>
                                              <option <?php if($value['web_access'] == 'Yes'){ echo 'Selected';}?> value="Yes">Yes</option>
                                              <option <?php if($value['web_access'] == 'No'){ echo 'Selected';}?> value="No">No</option>
                                            </select>
                                        </div>
                                       </div>
                                     

                                        <div class="form-group row" id="hideDiv" <?php if($value['web_access']=='No') { ?>style="display: none"<?php } ?>>
                                         
                                         <label for="user_name" class="col-sm-2 text-right control-label col-form-label">User Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  id="user_name" placeholder=" user_name Here" name="user_name" value="<?php echo $value['user_name'];?>" readonly>
                                        </div>
                                          
                                         <label for="password" class="col-sm-2 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password"  class="form-control" id="password" value="<?php echo $value['password']; ?>" placeholder=" password Here" name="password" >
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
                

              function  checkwebAccess() {
               var web_access = $('#web_access').val();
               if(web_access ==  'No') {
                 $('#hideDiv').hide();
                 
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

function onChange() {
  const email = document.querySelector('input[type=email]');
 
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (regex.test(email)) {
    email.setCustomValidity('');
  } else {
    email.setCustomValidity('Enter valid email Address');
  }
}
</script>