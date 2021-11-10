<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>/assets/images/favicon.png">
    <title><?php if($this->session->userdata('Client')) { echo 'Admin'; } else { echo 'Client'; } ?> </title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/extra-libs/multicheck/multicheck.css">
    <link href="<?php echo base_url();?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/dist/css/style.min.css" rel="stylesheet">
     <link href="https://cdn.datatables.net/rowgroup/1.0.2/css/rowGroup.dataTables.min.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="color: black !important;">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo site_url('Client/dashboard');?>">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url();?>/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                            <!--  <img src="<?php echo base_url();?>/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            <b> <?php if($this->session->userdata('Client')) { echo $this->session->userdata('Client')->client_name.'('.$this->session->userdata('Client')->client_code.')'; } else { echo $this->session->userdata('Myadmin')->name; } ?>  </b>
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <?php $data=$this->Model->select('ad_admin');
                                        foreach ($data as $value) {
                                ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img src="<?php echo base_url();?>/uploads/admin/<?php echo $value['image'];?>" alt="user" class="rounded-circle" width="40px;" height="40px;"> -->
                            <b style="color: white;"> 
                                <b>Welcome  <?php echo $this->session->userdata('Client')->client_name; ?> </b>
                                <?php } ?></b>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <?php if($this->session->userdata('Client')) { ?>
                                <a class="dropdown-item" href="<?php echo site_url('Client/profile');?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                              
                                <a class="dropdown-item" href="<?php echo site_url('Client/logout');?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <?php } else { ?>
                                <a class="dropdown-item" href="<?php echo site_url('welcome/profile');?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                              
                                <a class="dropdown-item" href="<?php echo site_url('welcome/logout');?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                
                                <?php }?>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
<div id="snackbar"></div>

<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}




.side_bar_wrapper {
    position: fixed;
    top: 0;
    right: -300px;
    z-index: 999999;
    background: #f3f8ff;
    width: 300px;
    height: 100%;
    transition: all .2s ease-in-out;
    padding: 13px 20px;
    box-shadow: none;
    overflow: auto;
}
.sidebar_active .side_bar_wrapper{
    right: 0;
    box-shadow: 0px 0px 20px 10px #00000017;
    transition: all .2s ease-in-out;
}
#sidebar_open {
    box-shadow: none;
    outline: none;
    padding: 0;
    line-height: 1;
}
#sidebar_close {
    box-shadow: none;
    outline: none;
    padding: 0;
    font-size: 28px;
    color: #4ab4e4;
    line-height: 1;
}
#my_side_toggle {
    box-shadow: none;
    outline: none;
    padding: 0;
    font-size: 26px;
    color: #4ab4e4;
    line-height: 1;
    display: none;
}
.side_bar_wrapper ul{
    margin: 10px 0px 0px;
}
.side_bar_wrapper ul li {
    display: block;
    font-size: 16px;
    color: #2d3954;
    border-bottom: 1px solid #e2e2e2;
    padding: 10px 0px;
}
.side_bar_wrapper ul li span{
    margin-right: 10px;
}
.header .collapse:not(.show) {
    display: flex;
}
@media only screen and (min-width: 300px) and (max-width: 767px){
    .header li.nav-item.nav_item_btn {
        display: none;
    }
    #my_side_toggle {
        display: block;
    }
}
</style>