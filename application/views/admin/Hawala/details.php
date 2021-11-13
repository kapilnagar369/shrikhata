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
                        <h4 class="page-title">Hawala</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Hawala</li>
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
                            <?php echo $this->session->flashdata('AddHawala');?>
                            <?php echo $this->session->flashdata('UpadteHawala');?>
                            <?php echo $this->session->flashdata('deleteHawala');?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Hawala</h5>
                              <!--   <div class="btn-group" style="float: right;">
                                    <a href="<?php // echo site_url('Hawala/addHawala');?>" id="addRow" class="btn btn-info" style="margin-top: -35px;">
                                       <i class="fa fa-plus"></i> Add
                                    </a>
                                </div> -->
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                          

                                            <tr>
                                              <th>S.no</th>
                                                <th>Trxn Date</th>
                                                <th>Amount</th>
                                                <th>Credit Party</th>
                                                <th>Debit Party</th>
                                                <th>Last Update At</th>
                                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                    foreach ($result as $value) {
                                                $i++;
                                            ?>
                                         <tr>
                                             <td ><?php echo $i;?></td>
                                              <td><?php echo date('d-m-Y',strtotime($value['trxn_date']));?></td>
                                              <td style="text-align: right;">   <?php  echo @number_format($value['amount'],2,'.',''); ?></td>
                                              
                                              <td><?php echo $value['debit_party_code'].' ('.$value['debit_party_name'].')';?></td>
                                              <td><?php echo $value['credit_party_code'].' ('.$value['credit_party_name'].')';?></td>
                                              <td ><?php $date = $value['updated_at'];echo date('d-m-Y H:i', strtotime($date)); ?></td>
                                          
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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

 <table id="myTable" class="table table-bordered table-striped table-fixed">
         <thead>
            <th>Key Account</th>
            <th>Key Account Code</th>
            <th>Potential Value</th>
            <th>Sales Value</th>
            <th>Penetration %</th>
            <th>Potential (H/M/L)</th>
            <th>Penetration (H/M/L)</th>
         </thead>
         <?php echo "Some data from database here";?>   
      </table>
      <button id="convert">
      Convert to image
      </button>
      <div id="result">
         <!-- Result will appear be here -->
      </div>
      <script type="text/javascript" src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
      <script>
         //convert table to image            
         function convertToImage() {
            var resultDiv = document.getElementById("result");
            html2canvas(document.getElementById("myTable"), {
                onrendered: function(canvas) {
                    var img = canvas.toDataURL("image/png");
                    result.innerHTML = '<a download="test.jpeg" href="'+img+'">test</a>';
                    
var fakeLink = document.createElement('a');
fakeLink.setAttribute('href', 'whatsapp://send?text='+encodeURIComponent(img));
fakeLink.setAttribute('data-action', 'share/whatsapp/share');
fakeLink.click();
                    }
            });
         }        
         //click event
         var convertBtn = document.getElementById("convert");
         convertBtn.addEventListener('click', convertToImage);
    

      </script>