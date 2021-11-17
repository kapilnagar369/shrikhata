
    
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
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo Site_url('welcome/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
           
                <div class="row">
                    <?php if (!$this->session->userdata('Client')) { ?>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <a href="<?php echo site_url('Client/details');?>">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="fontlight text-white"><i class="mdi mdi-chart-pie"></i></h1>
                                <h3 style="color: white;"><?php if (empty($Client)) {
                                    echo '0';
                                }else
                                {
                                    echo $Client;
                                } ?></h3> 
                                <h6 class="text-white">Total Client</h6>
                            </div>
                        </div>
                        </a>
                    </div>

                <?php } else { ?>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <a href="<?php echo site_url('Party/details');?>">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-scatterplot-hexbin"></i></h1>
                                <h3 style="color: white;"><?php if (empty($Party)) {
                                        echo '0';
                                    }else
                                    {
                                        echo $Party;
                                    } ?></h3> 
                                <h6 class="text-white">Total Party</h6>
                            </div>
                        </div>
                        </a>
                    </div>

                 
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <a href="<?php echo site_url('/Exchange/details');?>">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h3 style="color: white;"><?php if (empty($Exchange)) {
                                        echo '0';
                                    }else
                                    {
                                        echo $Exchange;
                                    } ?></h3> 
                                <h6 class="text-white">Total Exchange</h6>
                            </div>
                        </div>
                        </a>
                    </div>

                    
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <a href="<?php echo site_url('/Idmaster/details');?>">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h3 style="color: white;"><?php if (empty($Idmaster)) {
                                        echo '0';
                                    }else
                                    {
                                        echo $Idmaster;
                                    } ?></h3> 
                                <h6 class="text-white">Total ID Master</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <a href="<?php echo site_url('/Entry/details');?>">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h3 style="color: white;"><?php if (empty($Entry)) {
                                        echo '0';
                                    }else
                                    {
                                        echo $Entry;
                                    } ?></h3> 
                                <h6 class="text-white">Total Entry</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    
                                <?php } ?>

                    
                    
                    <!-- Column -->
                 
                </div>
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
           