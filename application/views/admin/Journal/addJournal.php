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
                        <h4 class="page-title">Journal</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Journal/details');?>">Journal</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Journal</li>
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
                            <form class="form-horizontal" action="<?php echo site_url('Journal/addJournaldetails'); ?>" method="post" id="Myform" onsubmit="return Validate();" name="changepass">

                                                
                                <div class="card-body">
                                    <h4 class="card-title">Add Journal</h4>
                                    
                                      <div class="form-group row">
                                        <label for="Entry_code" class="col-sm-2 text-right control-label col-form-label">Vch.No.</label>
                                        <div class="col-sm-4">
                                            <input readonly="" type="text" maxlength="8" class="form-control" id="vouchar_no" value="<?php echo @$vouchar_no;?>"    name="vouchar_no" required >
                                            <input  type="hidden"  class="form-control" id="vouchar_id" value="<?php echo @$vouchar_id;?>"    name="vouchar_id" required >
                                       
                                        </div>
                                       <label for="" class="col-sm-2 text-right control-label col-form-label">Trxn Date  </label>
                                        <div class="col-sm-4">
                                            <input type="date"   class="form-control" id="date" value="<?php  echo date('Y-m-d'); ?>"  name="trxn_date" required >
                                        </div>
                                      </div>
                                    <div class="form-group row">
                                         
                                    
                                         

                                         <label for="debit_party_id" class="col-sm-2 text-right control-label col-form-label">Debit Party A/C</label>
                                        <div class="col-sm-4">
                                            <select  onchange="if(this.value==$('#credit_party_id').val()) {alert('debit party and credit party can`t be same'); $('#debit_party_id').val('').trigger('change');}" class="form-control"  id="debit_party_id"  name="debit_party_id" required >
                                              <option value="">Please Select</option>
                                              <?php if($Party) {
                                                  foreach($Party as $partyData) { ?>
                                              <option  <?php echo set_select('debit_party_id',$partyData['id'], ( !empty($debit_party_id) && $debit_party_id == $partyData['id'] ? TRUE : FALSE ))?>  value="<?php echo $partyData['id']; ?>"><?php echo  $partyData['party_code'] .' ( '. $partyData['party_name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>

                                         <label for="credit_party_id" class="col-sm-2 text-right control-label col-form-label">Credit Party A/C</label>
                                        <div class="col-sm-4">
                                            <select onchange="if(this.value==$('#debit_party_id').val()) {alert('debit party and credit party can`t be same'); $('#credit_party_id').val('').trigger('change');}"  class="form-control"  id="credit_party_id"  name="credit_party_id" required >
                                              <option value="">Please Select</option>
                                              <?php if($Party) {
                                                  foreach($Party as $partyData) { ?>
                                              <option  <?php echo set_select('credit_party_id',$partyData['id'], ( !empty($credit_party_id) && $credit_party_id == $partyData['id'] ? TRUE : FALSE ))?>  value="<?php echo $partyData['id']; ?>"><?php echo  $partyData['party_code'] .' ( '. $partyData['party_name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                       </div>

                                         <div class="form-group row">
                                         

                                    
                                         

                                         <label for="amount" class="col-sm-2 text-right control-label col-form-label">Amount</label>
                                        <div class="col-sm-4">
                                            <input type="number"   value="<?php echo set_value('amount'); ?>" step=".01" class="form-control" id="amount" placeholder="0.00" name="amount" required >
                                        </div>
                                       </div>
                                        <div class="form-group row">
                                         
                                    
                                         

                                         <label for="" class="col-sm-2 text-right control-label col-form-label">Remark</label>
                                        <div class="col-sm-10">
                                            <textarea name="remark" style="width: 100%"></textarea>
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
    