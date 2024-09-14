<?php
session_start();
include('../../backend_php/config.php');

$user=$_SESSION["email"];
if($user==""){
  header("Location:../../index.php");
}
$sql = "SELECT * FROM login where `email` = '$user'";
$res = mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($res))
{
  $key_code=$data['id'];
  $Name=$data['name'];
  $adss=$data['address'];
  $phone=$data['number'];
  $Email=$data['email'];
}
?>
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jun 2022 12:38:30 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Dashboard | DKK</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../../img/small/4.jpg">

        <!-- plugin css -->
        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- preloader css -->
        <!-- <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" /> -->

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
          <!-- DataTables -->
          <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="../img/small/4.jpg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="../img/small/4.jpg" alt="" height="24"> <span class="logo-txt">DIL KI KUSHBHOO</span>
                                </span>
                            </a>


                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Minia</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        
                    </div>

                    <div class="d-flex">

                        
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar"> -->
                                <span class="d-none d-xl-inline-block ms-1 fw-medium">Profile</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="editprofile.php?key=<?php echo $key_code;?>"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../backend_php/logout.php"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu"> 
                        <li>
                                <a href="../index.php">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Back to Home Page</span>
                                </a>
                            </li>                        
                            <li>
                                <a href="index.php">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>   
                           
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="sliders"></i>
                                    <span data-key="t-tables">Products</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="add_products.php" data-key="t-basic-tables">Add Products</a></li>
                                    <li><a href="all_products.php" data-key="t-data-tables">All Products</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="sliders"></i>
                                    <span data-key="t-tables">Orders</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pending_orders.php" data-key="t-basic-tables">Pending orders</a></li>
                                    <li><a href="accepted.php" data-key="t-basic-tables">Accepted orders</a></li>
                                    <li><a href="approved_orders.php" data-key="t-data-tables">Approved orders</a></li>
                                    <li><a href="rejected_orders.php" data-key="t-data-tables">Rejected orders</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="payouts.php">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Payouts</span>
                                </a>
                            </li> 
                            <li>
                                <a href="vfeedback.php">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Feedback</span>
                                </a>
                            </li> 
                            <li>
                                <a href="../../backend_php/logout.php">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Logout</span>
                                </a>
                            </li> 
                        </ul>                       
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            