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
                        <h4 class="page-title">Balance Sheet</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Balance Sheet</li>
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
                                <h5 class="card-title">Balance Sheet</h5>
                        <form method="post">
                                <div class="form-group row">
                                        <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Party</label>
                                        <div class="col-sm-2">
                                           <select  class="form-control" id="report_type"    name="report_type"  >
                                             <option value=""> Please Select </option>
                                             <option <?php if($type=='Horizontal') { echo 'Selected';}?> value="Horizontal"> Horizontal </option>
                                             <option <?php if($type=='Vertical') { echo 'Selected';}?> value="Vertical"> Vertical </option>
                                           </select>
                                       
                                        </div>
                                             <label for="Entry_code" class="col-sm-1 text-right control-label col-form-label">Closing Date </label>
                                        <div class="col-sm-2">
                                         <input type="date"  value="<?php echo date('Y-m-d',strtotime($date));?>" name="closing_date">
                                       
                                        </div>
                                       <input type="submit" class="btn btn-success" value="Search">
                                    </div>
                               <?php if($type=='Horizontal') { ?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                          

                                            <tr>
                                              <th>Tally  </th>
                                              <th>S.no</th>
                                                <th>Party</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th >Remark</th>
                                            </tr>
                                              
                                        </thead>
                                        <tbody>
                                           


                                            <?php 
                                                $i=0;
                                                    foreach ($result as $value) {
                                                $i++;
                                            ?>
                                         <tr>
                                             <td ><input type="checkbox" id="trxn_id" class="trxn" name="party_id[]"  <?php if($value['is_tally']==1) { echo 'checked'; } ?> value="<?php echo $value['party_id']; ?>">
											<?php if($value['is_tally']==1) { ?> 
											   <input type="hidden"   name="checked_party_id[]"   value="<?php echo $value['party_id']; ?>">
											<?php } ?>

                                             </td>
                                             <td ><?php echo $i; ?></td>
                                              <td><a href="<?php echo base_url('/index.php/Ledger/details/').$value['party_id'].'/2020-01-01/'.date('Y-m-d')?>"><?php echo $value['party_code'].' ('.$value['party_name'].')';?></a></td>
                                              <td class="alnright"><?php echo number_format(abs($value['debit']), 2, '.', '');?></td>
                                              <td class="alnright"><?php echo number_format(abs($value['credit']),2,'.','');?></td>
                                              <td colspan="2"><input type="text" value="<?php echo $value['comments']; ?>" name="comment" onfocusout="updateCommentbal(this.value,<?php echo $value['party_id']; ?>)"></td>

                                                  
                                                    
                                                </tr>
                                            <?php } ?>

                                             
                                        </tbody>
                                             </table>
                                </div>
                                  <?php } else { ?>
                                    <div class="row">
                                      <div class="table-responsive col-sm-12">
                                    <table id="zero_config2" class="table table-striped table-bordered">
                                        <thead>
                                          

                                            <tr>
                                              <th>Tally  </th>
                                                <th>S.no</th>
                                                <th>Party</th>
                                                <th>Credit</th>
                                                <th >Remark</th>
                                                <th>Tally  </th>
                                                <th>S.no</th>
                                                <th>Party</th>
                                                <th>Debit</th>
                                                <th >Remark</th>
                                              </tr>
                                              
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                    foreach ($final as $value) {
                                                $i++;
                                            ?>
                                         <tr>
                                           <?php if(isset($value['is_tally'])){ ?>
											  <td ><input type="checkbox" id="trxn_id" class="trxn" name="party_id[]"  <?php if($value['is_tally']==1) { echo 'checked'; } ?> value="<?php echo $value['party_id']; ?>">
											  <?php if($value['is_tally']==1) { ?> 
											   <input type="hidden"   name="checked_party_id[]"   value="<?php echo $value['party_id']; ?>">
											<?php } ?>
		
											  </td>
                                             <td ><?php echo $i; ?></td>
                                              <td><a href="<?php echo base_url('/index.php/Ledger/details/').$value['party_id'].'/2020-01-01/'.date('Y-m-d')?>"><?php echo $value['party_code'].' ('.$value['party_name'].')';?></a></td>
                                              <td class="alnright"><?php echo number_format(abs($value['credit']),2,'.','');?></td>
                                              <td ><input type="text" value="<?php echo $value['comments']; ?>" name="comment" onfocusout="updateCommentbal(this.value,<?php echo $value['party_id']; ?>)"></td>
                                              <?php } else {  echo '<td colspan="5"></td>'; } ?>
                                              <?php if(isset($value['is_tallyd'])){ ?>
                                               <td ><input type="checkbox" id="trxn_id" class="trxn" name="party_id[]"  <?php if(@$value['is_tallyd']==1) { echo 'checked'; } ?> value="<?php echo @$value['party_idd']; ?>">
                                               	<?php if($value['is_tallyd']==1) { ?> 
											   <input type="hidden"   name="checked_party_id[]"   value="<?php echo $value['party_idd']; ?>">
											<?php } ?>

                                               </td>
                                             <td ><?php echo $i; ?></td>
                                              <td><a href="<?php echo base_url('/index.php/Ledger/details/').$value['party_idd'].'/2020-01-01/'.date('Y-m-d')?>"><?php echo @$value['party_coded'].' ('.@$value['party_named'].')';?></a></td>
                                              <td class="alnright"><?php echo number_format(abs(@$value['debitd']), 2, '.', '');?></td>
                                              <td><input type="text" value="<?php echo @$value['commentsd']; ?>" name="comment" onfocusout="updateCommentbal(this.value,<?php echo @$value['party_idd']; ?>)"></td>
                                       		 <?php }  else {  echo '<td colspan="5"></td>'; } ?>

                                          </tr>
                                            <?php } ?>

                                             
                                        </tbody>
                                      
                                    </table>
                                </div>
                                    
                                <?php } ?>
                                <div class=""> <input type="checkbox" id="alltrxn" > <input name="closebal" type="hidden" id="closebal" value="<?php echo @$bal;?>"> 
                                         <input type="submit" name="submit" id="tallybalsheetsubmit" value="Tally" class="btn btn-success  "></div>  
                                 
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