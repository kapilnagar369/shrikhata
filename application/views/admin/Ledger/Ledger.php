    <style type="text/css">
        
            .alnright { text-align: right; }
             .debit{   background-color: red;
                       color: white;
                    font-weight: bold;
                }
            .credit{
                 background-color: green;
                       color: white;
                    font-weight: bold;
            }
    </style>
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
                        <h4 class="page-title">Legder</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ledger</li>
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
                    <div class="col-12">
                            <?php echo $this->session->flashdata('AddEntry');?>
                            <?php echo $this->session->flashdata('UpadteEntry');?>
                            <?php echo $this->session->flashdata('deleteEntry');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ledger</h5>
                        <form>
                                <div class="form-group row">
                                        <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Party</label>
                                        <div class="col-sm-2">
                                           <select onchange="changeparty(this.value)" class="form-control" id="Upline_Code"    name="partty_code"  >
                                             <option value=""> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                              <option    <?php if(isset($party_id) && $party_id==$pat['id']) { echo 'selected';}?>       value="<?php echo $pat['id'] ?>"> <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                       
                                        </div>
                                             <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Trxn Date </label>
                                        <div class="col-sm-2">
                                         <input type="text" name="daterange">
                                         <input type="hidden" value="<?php echo date('Y-m-d');?>" id="start">
                                         <input type="hidden" value="<?php echo date('Y-m-d');?>" id="end">
                                       
                                        </div>
                                        <div class="col-sm-1 pull-right">
                                          <input data-toggle="modal" data-target="#myModal" type="button" name="" class="btn btn-success" value="Hawala entry">
                                        </div>
                                    </div>
                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                          

                                            <tr>
                                              <th>Tally  </th>
                                              <th>S.no</th>
                                                <th>Voucher No</th>
                                                <th>Trxn Date</th>
                                                <th>Narration</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                 <th>Balance</th>
                                                <th colspan="2">Remark</th>
                                            </tr>
                                               <tr>
                                             <td ></td>
                                             <td ></td>
                                              <td></td>
                                              <td></td>
                                              <td>Opening Balance </td>
                                              <td class="alnright"></td>
                                              <td class="alnright"></td>
                                              <td class="alnright"><?php  echo @number_format($bal,2,'.','');  if(@$bal<0) { echo ' Cr.'; } else if(@$bal>0) { echo ' Dr.'; }?></td>
                                              <td colspan="2"></td>

                                                  
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                           


                                            <?php 
                                                $i=0;
                                                    foreach ($result as $value) {
                                                $i++;
                                            ?>
                                         <tr>
                                             <td ><input type="checkbox" id="trxn_id" class="trxn" name="trxn_id[]"  <?php if($value['is_tally']==1) { echo 'checked'; } ?> value="<?php echo $value['trxn_id']; ?>"></td>
                                             <td ><?php echo $i; ?></td>
                                              <td>

                                                <a href="<?php echo base_url('/index.php/Entry/editEntry/').$value['vouchar_id']?>"><?php echo $value['vch_no'];?></a>
                                                  <a href="<?php echo base_url('/index.php/Journal/editJournal/').$value['vouchar_id']?>"><?php echo $value['vch_noj'];?></a>
                                              </td>
                                              <td><?php echo date('d-m-Y',strtotime($value['trxn_date']));?></td>
                                              <td><?php echo $value['narration'];?></td>
                                              <td class="alnright"><?php echo number_format(abs($value['debit']), 2, '.', '');?></td>
                                              <td class="alnright"><?php echo number_format(abs($value['credit']),2,'.','');?></td>
                                              <td class="alnright"><?php  $bal =  number_format($bal+abs($value['debit']),2,'.','');
                                               echo $bal =  number_format($bal-abs($value['credit']),2,'.','');
                                               if(@$bal<0) { echo ' Cr.'; } else if(@$bal>0) { echo ' Dr.'; } 
                                              ?></td>
                                              <td colspan="2"><input type="text" value="<?php echo $value['comments']; ?>" name="comment" onfocusout="updateComment(this.value,<?php echo $value['trxn_id']; ?>)"></td>

                                                  
                                                    
                                                </tr>
                                            <?php } ?>

                                             
                                        </tbody>
                                        <tfoot>
                                            
                                             <tr>
                                             <td ></td>
                                             <td ></td>
                                              <td></td>
                                              <td></td>
                                              <td>Closing Balance </td>
                                              <td class="alnright"></td>
                                              <td class="alnright"></td>
                                              <td class="alnright  <?php  if(@$bal<0) { echo 'credit'; } else if(@$bal>0) { echo 'debit'; } ?>"><?php  echo @number_format($bal,2,'.','');  if(@$bal<0) { echo ' Cr.'; } else if(@$bal>0) { echo ' Dr.'; } ?></td>
                                              <td> <input type="checkbox" id="alltrxn" > <input name="closebal" type="hidden" id="closebal" value="<?php echo @$bal;?>"> 
                                         <input type="submit" name="submit" id="tallysubmit" value="Tally" class="btn btn-success  ">
                                         </td>
                                         <td style="font-weight: bold;">  <?php if(isset($tally_log)) { echo "Last Tally at ".date('d-m-Y',strtotime($tally_log->log_time))."</br> Amount is  <span style='font-size: large;
}'>".abs($tally_log->amount)."</span> ".$tally_log->dr_cr; } ?>
                                         </td>

                                                  
                                                    
                                                </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                              </form>
                            </div>
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



            <!-- hawala entry  -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hawala Entry </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
                               <div class="form-group row">
                                       
                                       <label for="" class="col-sm-4 text-right control-label col-form-label">Trxn Date  </label>
                                        <div class="col-sm-8">
                                            <input type="date"   class="form-control" id="date" value="<?php  echo date('Y-m-d'); ?>"  name="trxn_date" required >
                                        </div>
                                     
                                    
                                           </div>
                                    <div class="form-group row">

                                         <label for="debit_party_id" class="col-sm-4 text-right control-label col-form-label">Debit/Credit
                                         </label>
                                        <div class="col-sm-8">
                                            <select  onchange="" class="form-control"  id="debit_credit"  name="debit_credit" required >
                                              <option value="">Please Select</option>
                                              <option value="Credit">Credit</option>
                                              <option value="Debit">Debit</option>
                                            
                                            </select>
                                        </div>
                               
                                           </div>
                                    <div class="form-group row">
                                         <label for="credit_party_id" class="col-sm-4 text-right control-label col-form-label">Credit Party A/C</label>
                                        <div class="col-sm-8">
                                            <select onchange=""  class="form-control"  id="party_idh"  name="party_idh" required >
                                              <option value="">Please Select</option>
                                              <?php if($party) {
                                                  foreach($party as $partyData) { ?>
                                              <option    value="<?php echo $partyData['id']; ?>"><?php echo  $partyData['party_code'] .' ( '. $partyData['party_name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                      
                                         

                                      </div>
                                    <div class="form-group row">
                                         

                                         <label for="amount" class="col-sm-4 text-right control-label col-form-label">Amount</label>
                                        <div class="col-sm-8">
                                            <input type="number"   value="<?php echo set_value('amount'); ?>" step=".01" class="form-control" id="amount" placeholder="0.00" name="amount" required >
                                        </div>
                                       </div>
                                        <div class="form-group row">
                                         
                                    
                                           </div>
                                    <div class="form-group row">

                                         <label for="" class="col-sm-4 text-right control-label col-form-label">Remark</label>
                                        <div class="col-sm-8">
                                            <textarea name="remark" style="width: 100%"></textarea>
                                        </div>
                                    </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>