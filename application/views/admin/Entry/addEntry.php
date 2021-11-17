      <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
     

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
          
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
                            <form class="form-horizontal" action="<?php echo site_url('Entry/addEntrydetails'); ?>" method="post"   name="changepass" id="entry">

                                                
                                <div class="card-body">
                                <h5 class="card-title  " id="SettlementEntry">Settlement Entry</h4>

                                      <div class="form-group row">
                                        <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Vch.No.</label>
                                        <div class="col-sm-2">
                                            <input readonly="" type="text" maxlength="8" class="form-control" id="vouchar_no" value="<?php echo $vouchar_no;?>"    name="vouchar_no" required >
                                       
                                        </div>
                                       <label for="" class="col-sm-1 text-right control-label col-form-label">Date  </label>
                                        <div class="col-sm-2">
                                            <input type="date"   class="form-control" id="date" value="<?php  echo @$entryd[0]['trxn_date']; ?>"  name="trxn_date" required >
                                        </div>

                                         <label for="" class="col-sm-1 text-right control-label col-form-label">Gross P/L  </label>
                                        <div class="col-sm-2">
                                            <input type="number" readonly=""  class="form-control" id="totalgrosspl" value="<?php  echo @$entryd[0]['gross_pl']; ?>"  placeholder="0.00" name="totalgrosspl"  >
                                        </div>
                                        <label for="" class="col-sm-3 text-center control-label col-form-label">Net P/L </label>
                                        
                                    </div>



                                     <div class="form-group row">
                                        <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Party</label>
                                        <div class="col-sm-2">
                                           <select <?php if(isset($vouchtemp) && count($vouchtemp)>0) { echo 'disabled'; }  ?> onchange='window.location = "<?php echo site_url('Entry/addEntry/'); ?>"+this.value+"/"+$("#Idmaster_type").val()' class="form-control" id="Upline_Code"    name="partty_code"  >
                                             <option value="0"> Please Select </option>
                                              <?php foreach($party as $pat) { ?>
                                              <option  value="<?php echo $pat['id'] ?>"
                                                 <?php if($pat['id']==$party_id) { echo 'selected'; }  ?>

                                                > <?php echo  $pat['party_code'] .' ( '. $pat['party_name'].')'; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                       
                                        </div>
                                         <label for="" class="col-sm-1 text-right control-label col-form-label">Import Excal  </label>

                                        <div class="col-sm-2">
                                            <input type="file"  class="form-control" id="" value=""  name=""  >
                                        </div>
                                          <label for="" class="col-sm-1 text-right control-label col-form-label">Commision  </label>
                                    <div class="col-sm-2">
                                            <input type="number" readonly="" class="form-control" value="<?php  echo @$entryd[0]['commision']; ?>" id="totalcommis" value="" placeholder="0.00"  name="totalcommis"  >
                                        </div> 
                                     <div class="col-sm-3">
                                            <input type="number" style="color:white;<?php if(@$entryd[0]['net_pl']>0)  echo 'background-color:green'; else echo 'background-color:red';  ?>" value="<?php  echo @$entryd[0]['net_pl']; ?>" readonly=""  class="form-control" id="totalnetpl" placeholder="0.00" name="totalnetpl"  >
                                        </div>
                                       
                                    </div>

                                       <div class="form-group row">
                                        <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Exchange </label>
                                        <div class="col-sm-2">
                                            <select  <?php if(isset($vouchtemp) && count($vouchtemp)>0) { echo 'disabled'; }  ?>  onchange='window.location = "<?php echo site_url('Entry/addEntry/'); ?>"+$("#Upline_Code").val()+"/"+this.value'    class="form-control  myselect" id="Idmaster_type"  name="exch_code"  >
                                              <option value="0">Please Select</option>
                                              <?php if($Exchange) {
                                                  foreach($Exchange as $ExchangeData) { ?>
                                              <option    <?php if($ExchangeData['id']==$exc_id) { echo 'selected'; }  ?>     value="<?php echo $ExchangeData['id']; ?>"


                                                ><?php echo $ExchangeData['Exchange_Code'].' ('.$ExchangeData['Exchange_Name'].')'; ?></option>
                                              <?php } } ?>
                                            </select>
                                          </div>
                                             <label for="" class="col-sm-1 text-right control-label col-form-label">  </label>
                                    <div class="col-sm-2">
                                          
                                        </div>

                                         <label for="" class="col-sm-1 text-right control-label col-form-label">Pati  </label>
                                    <div class="col-sm-2">
                                            <input type="number"  readonly="" class="form-control"  value="<?php  echo @$entryd[0]['pati']; ?>" id="totalpati" value=""  placeholder="0.00"  name="totalpati"  >
                                        </div>
                                       
                                     
                                      
                                    </div>
                                      <div class=" table-responsive">
                                        <table class="table     cell-border"  >
                                           <thead>
                                            <tr   align="center" >
                                                <th class="">S.No.</th>
                                                <th class="col-1">Id / User Name</th>
                                                <th class="col-1">Party</th>
                                                <th class="col-1">Rate</th>
                                                <th class="col-1" >Point +/-</th>
                                                <th class="col-1">Gross Amount</th>
                                                <th class="col-1">Commision +/-</th>
                                                <th class="col-1">Net Amount</th>
                                                <th class="col-1">Pati +/-</th>
                                                <th class="col-1">Final Amount</th>

                                                <th class="col-1">Gross Profit</th>
                                                <th class="col-1">Remove</th>
                                            </tr>
                                            </thead>
                                             <tbody>
                                             
                                            


                                              <?php  $i=1; if(isset($vouchtemp)) {
                                                foreach($vouchtemp as $vdata) { 
                                                ?>
                                                 <tr  align="center" class="tr_clone">
                                            <td style="width:2%"><spna class="sno<?php echo $i+1;?>"><?php echo $i++;?></spna></td>
                                             <td class="col-1" > 
                                                <select class="form-control Idmaster" id="Idmaster1001<?php echo $i; ?>" onchange="getIdDetails(this)"    name="Idmaster[]"  >
                                             <option value=""> Please Select </option>
                                              <?php foreach($Idmaster as $master) { ?>
                                              <option data-rate="<?php echo $master['rate'] ?>"
                                                  data-partyCcode="<?php echo $master['party_code'] ?>"
                                                  data-partyID="<?php echo $master['party_id'] ?>"
                                                  data-PatiType="<?php echo $master['partnership_type'] ?>"
                                                  data-Pati="<?php echo $master['partnership_rate'] ?>"
                                                  data-com="<?php echo $master['commision'] ?>"
                                                  data-comType="<?php echo $master['commision_type'] ?>"
                                                  data-exrate="<?php echo $master['exrate'] ?>"  
                                                  data-exch_code="<?php echo $master['exch_code'] ?>"
                                                 value="<?php echo $master['id'] ?>"   <?php  if(@$vdata['user_id']==$master['id'])  {  echo 'selected'; }?>> <?php echo   $master['user_name']; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                             </td>
                                              
                                              <td class="col-1"  >&nbsp;<span id='partytd1001<?php echo $i;?>' class="partytd"><?php echo @$vdata['party_code']; ?></span>
                                                <input type="hidden" class="partyin" name="partyin[]" id="partyin1001<?php echo $i;?>" value="<?php echo @$vdata['party_code']; ?>"> 
                                                <input type="hidden" class="partyidin" name="partyidin[]" id="partyidin1001<?php echo $i;?>" value="<?php echo @$vdata['party_id']; ?>">
                                              </td>
                                              


                                               <td class="col-1" ><span id="ratetd1001<?php echo $i;?>" class="ratetd"><?php echo @$vdata['id_rate']; ?></span>
                                                <input type="hidden" class="ratein" name="ratein[]" id="ratein1001<?php echo $i;?>"  value="<?php echo @$vdata['id_rate']; ?>">
                                               </td>
                                               

                                                <td class="col-1" >

                                                 <input step="0.01" onkeyup="calculateamount(this);"  type="number"  class="form-control tr_clone_add pointtd" style="color:white;<?php if(@$vdata['point']>0)  echo 'background-color:green'; else echo 'background-color:red';  ?>" id="pointtd1001<?php echo $i;?>"  value="<?php echo @$vdata['point']; ?>"  placeholder="0.00"  name="pointin[]"  >

                                                </td>

                                                <td class="col-1"> 

                                                  <input step="0.01" type="number"  class="form-control tr_clone_add amounttd"  id="amounttd1001<?php echo $i;?>" readonly=""   value="<?php echo @$vdata['gross_amount']; ?>"    name="amountin[]"  >

                                                </td>




                                                <td class="col-1" ><span id="comtd1001" class="comtd"><?php echo @$vdata['commision']; ?></span>
                                                  <input type="hidden" class="comin" name="comin[]" id="comin1001<?php echo $i;?>" value="<?php echo @$vdata['commision']; ?>">
                                                </td>

                                                <td class="col-1" ><span id="netamounttd1001<?php echo $i;?>" class="netamounttd" ><?php echo @$vdata['net_amount']; ?></span>
                                                <input type="hidden" class="netamountin" name="netamountin[]" id="netamountin1001<?php echo $i;?>" value="<?php echo @$vdata['net_amount']; ?>">
                                                </td>
                                               
                                                <td class="col-1" ><span id="patitd1001<?php echo $i;?>" class="patitd" ><?php echo @$vdata['pati']; ?></span>
                                                <input  class="patiin"  type="hidden" name="patiin[]" id="patiin1001<?php echo $i;?>" value="<?php echo @$vdata['pati']; ?>">
                                                </td>


                                              <td class="col-1" ><span id="finalamounttd1001<?php echo $i;?>" class="finalamounttd" ><?php echo @$vdata['final_amount']; ?></span>
                                               <input type="hidden"  class="finalamountin" name="finalamountin[]" id="finalamountin1001<?php echo $i;?>" value="<?php echo @$vdata['final_amount']; ?>">
                                              </td>

                                              <td class="col-1" ><input type="hidden"  name=""><span id="grossprofittd1001<?php echo $i;?>" class="grossprofittd"><?php echo @$vdata['gross_profit']; ?></span>
                                              <input type="hidden"  class="grossprofitin" name="grossprofitin[]" id="grossprofitin1001<?php echo $i;?>" value="<?php echo @$vdata['gross_profit']; ?>">
                                                </td>



                                                <td ><span class="remove"  onclick="$(this).closest('tr').remove();$('.pointtd').focus();"><i class="fas fa-trash"></i></span></td>
                                            </tr>

                                            <?php } } ?>




                                                <tr  align="center" class="tr_clone">
                                            <td style="width:2%"><spna class="sno"><?php echo $i++;?></spna></td>
                                             <td class="col-1" > 
                                                <select class="form-control Idmaster" id="Idmaster" onchange="getIdDetails(this)"    name="Idmaster[]"  >
                                             <option value=""> Please Select </option>
                                              <?php foreach($Idmaster as $master) { ?>
                                              <option data-rate="<?php echo $master['rate'] ?>"
                                                  data-partyCcode="<?php echo $master['party_code'] ?>"
                                                  data-partyID="<?php echo $master['party_id'] ?>"
                                                  data-PatiType="<?php echo $master['partnership_type'] ?>"
                                                  data-Pati="<?php echo $master['partnership_rate'] ?>"
                                                  data-com="<?php echo $master['commision'] ?>"
                                                  data-comType="<?php echo $master['commision_type'] ?>"
                                                  data-exrate="<?php echo $master['exrate'] ?>"  
                                                  data-exch_code="<?php echo $master['exch_code'] ?>"
                                                 value="<?php echo $master['id'] ?>"> <?php echo   $master['user_name']; ?></option>
                                             
                                              <?php } ?>
                                            </select>
                                             </td>
                                              
                                              <td class="col-1" >&nbsp;<span id='partytd' class="partytd"></span>
                                                <input type="hidden" class="partyin" name="partyin[]" id="partyin" value="0.00">
                                                <input type="hidden" class="partyidin" name="partyidin[]" id="partyidin" value="0.00">
                                              </td>
                                              


                                               <td class="col-1" ><span id="ratetd" class="ratetd">0.00</span>
                                                <input type="hidden" class="ratein" name="ratein[]" id="ratein" value="0.00">
                                               </td>
                                               

                                                <td class="col-1" >

                                                 <input step="0.01" onkeyup="calculateamount(this);" onfocus="calculateamount(this);" onclick="clone1(this)" type="number" readonly="" class="form-control tr_clone_add pointtd" id="pointtd"  value=""  placeholder="0.00"  name="pointin[]"  >

                                                </td>

                                                <td class="col-1"> 

                                                	<input step="0.01" type="number"  class="form-control tr_clone_add amounttd" onkeyup="calulatepoint(this)" id="amounttd" readonly=""   value=""  placeholder="0.00"  name="amountin[]"  >

                                                </td>




                                                <td class="col-1" ><span id="comtd" class="comtd">0.00</span>
                                                  <input type="hidden" class="comin" name="comin[]" id="comin" value="0.00">
                                                </td>

                                                <td class="col-1" ><span id="netamounttd" class="netamounttd" >0.00</span>
                                                <input type="hidden" class="netamountin" name="netamountin[]" id="netamountin" value="0.00">
                                                </td>
                                               
                                                <td class="col-1" ><span id="patitd" class="patitd" >0.00</span>
                                                <input  class="patiin"  type="hidden" name="patiin[]" id="patiin" value="0.00">
                                                </td>


                                              <td class="col-1" ><span id="finalamounttd" class="finalamounttd" >0.00</span>
                                               <input type="hidden"  class="finalamountin" name="finalamountin[]" id="finalamountin" value="0.00">
                                              </td>

                                              <td class="col-1" ><input type="hidden"  name=""><span id="grossprofittd" class="grossprofittd">0.00</span>
                                              <input type="hidden"  class="grossprofitin" name="grossprofitin[]" id="grossprofitin" value="0.00">
                                                </td>



                                                <td ><span class="remove" style="display: none" onclick="$(this).closest('tr').remove();$('.pointtd').focus();"><i class="fas fa-trash"></i></span></td>
                                            </tr>
                                           </tbody>
                                        </table>
                                      </div>
                                       <div class="border-top">
                                    <div class="card-body">
                                        
                                        <input type="submit" name="submit" id="submit" value="submit" class="btn btn-success float-right ">
                                         <button type="Submit" id="saveas" class="btn btn-primary float-right ">Save as Draft</button>
                                          <h5 class="card-title exchangeWisecls btn btn-success btn-lg float-left "  >Exchange wise Summry </h5>
                                    </div>
                                </div>



                                   
                                
                                     <div id="exchangeWise"></div>
                                   

                                    
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
<style type="text/css">
    
    .table-responsive{
  height:400px;  
  overflow:scroll;
}
 thead tr:nth-child(1) th{
    background: white;
    position: sticky;
    top: 0;
    z-index: 5;
    order-top: 1px solid #000!important;
  border-bottom: 1px solid #000!important;
  border-left: 1px solid #000;
  border-right: 1px solid #000;
  }

  .select2 {
width:100%!important;
}
.table td, .table th {
    padding: 0rem !important;
   }

   .modal-dialog {
   position:fixed;
   top:auto;
   right:auto;
   left:auto;
   bottom:0;
}  

.table {
  border: 1px solid black;
}

.table thead th {
  border-top: 1px solid #000!important;
  border-bottom: 1px solid #000!important;
  border-left: 1px solid #000;
  border-right: 1px solid #000;
}

.table td {
  border-left: 1px solid #000;
  border-right: 1px solid #000;
  border-top: none!important;
}
</style>



<!-- Modal Window -->
<div class="modal modal-bottom  fade" id="left_modal" tabindex="-1" role="dialog" aria-labelledby="left_modal">
  <div class="modal-dialog "  style="max-width:60% !important;width:100%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Exchange wise Summry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
                                    <div class="form-group row">
                                        <table id="myTable" class="table  exchangewisereport">
                                           <thead>
                                            <tr>
                                             <th>Sr.No.</th>
                                             <th>Exchange Name  </th>
                                             <th>Gross Profit / Loss </th>
                                            
                                             <th>Pati    </th>
                                              <th>Commsion </th>
                                             <th>Net Profit / Loss   </th>
                                               
                                            </tr>
                                            </thead>
                                             <tbody class="">
                                              
                                                 
                                           </tbody>
                                        </table>
                                      </div>
      </div>
         </div>
  </div>
</div>