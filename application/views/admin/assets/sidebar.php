    <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                         

                             <?php if (!$this->session->userdata('Client')) { ?>

                                <?php if($this->uri->segment(1) && $this->uri->segment(1)=="welcome") { ?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('welcome/dashboard');?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                         <?php }else { ?>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('welcome/dashboard');?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <?php } ?>
                        <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Client") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Client/details');?>" aria-expanded="false"><i class="mdi mdi-chart-scatterplot-hexbin"></i><span class="hide-menu">Client</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Client/details');?>" aria-expanded="false"><i class="mdi mdi-chart-scatterplot-hexbin"></i><span class="hide-menu">Client</span></a></li>  
                        <?php } ?> 


                        <?php } else { ?> 
                          

                          <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Client") { ?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Client/dashboard');?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                         <?php }else { ?>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Client/dashboard');?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <?php } ?>
                         <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Party") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Party/details');?>" aria-expanded="false"><i class="mdi mdi-account-settings"></i><span class="hide-menu">Party</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Party/details');?>" aria-expanded="false"><i class="mdi mdi-account-settings"></i><span class="hide-menu">Party</span></a></li>  
                        <?php } ?> 



                         <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Exchange") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Exchange/details');?>" aria-expanded="false"><i class="mdi mdi-counter"></i><span class="hide-menu">Exchange</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect City_scan-dark sidebar-link" href="<?php echo site_url('Exchange/details');?>" aria-expanded="false"><i class="mdi mdi-counter"></i><span class="hide-menu">Exchange</span></a></li>  
                        <?php } ?>

                        <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Idmaster") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Idmaster/details');?>" aria-expanded="false"><i class="mdi mdi-creation"></i><span class="hide-menu">ID Master</span></a></li>
                        <?php }else {?>
                          
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect City_scan-dark sidebar-link" href="<?php echo site_url('Idmaster/details');?>" aria-expanded="false"><i class="mdi mdi-creation"></i><span class="hide-menu">ID Master</span></a></li>  
                        <?php } ?>    


                       <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Entry") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Entry/details');?>" aria-expanded="false"><i class="mdi mdi-contrast-circle"></i><span class="hide-menu">Entry</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect City_scan-dark sidebar-link" href="<?php echo site_url('Entry/details');?>" aria-expanded="false"><i class="mdi mdi-contrast-circle"></i><span class="hide-menu">Entry</span></a></li>  
                        <?php } ?> 
                        <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Ledger") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Ledger/details');?>" aria-expanded="false"><i class="mdi mdi-clipboard-account"></i><span class="hide-menu">Ledger</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect City_scan-dark sidebar-link" href="<?php echo site_url('Ledger/details');?>" aria-expanded="false"><i class="mdi mdi-clipboard-account"></i><span class="hide-menu">Ledger</span></a></li>  
                        <?php } ?> 
                        <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Balancesheet") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Balancesheet/details');?>" aria-expanded="false"><i class="mdi mdi-scale-balance"></i><span class="hide-menu">Balance Sheet</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect City_scan-dark sidebar-link" href="<?php echo site_url('Balancesheet/details');?>" aria-expanded="false"><i class="mdi mdi-scale-balance"></i><span class="hide-menu">Balance Sheet</span></a></li>  
                        <?php } ?> 

                         <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Journal") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Journal/details');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Journal Entry</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect City_scan-dark sidebar-link" href="<?php echo site_url('Journal/details');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Journal Entry</span></a></li>  
                        <?php } ?> 
                        
                        <?php if($this->uri->segment(1) && $this->uri->segment(1)=="Report") {?>
                            <li class="sidebar-item selected"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Report/details');?>" aria-expanded="false"><i class="mdi mdi-contrast-circle"></i><span class="hide-menu">Report</span></a></li>
                        <?php }else {?>
                          <li class="sidebar-item "> <a class="sidebar-link waves-effect City_scan-dark sidebar-link" href="<?php echo site_url('Report/details');?>" aria-expanded="false"><i class="mdi mdi-contrast-circle"></i><span class="hide-menu">Report</span></a></li>  
                        <?php } ?> 
                        
                        <?php } ?> 
                     


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <style type="text/css">
          
          input[type=number] {text-align: right !important;}

        </style>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->