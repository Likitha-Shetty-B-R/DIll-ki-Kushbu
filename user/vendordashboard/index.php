
<?php 
include('layout_head.php');
include('../../backend_php/config.php');

$query="SELECT * FROM order_details  where vendor_id='$key_code' and status='Pending'";
if ($result=mysqli_query($conn,$query)) 
$rowcount1=mysqli_num_rows($result);

$query="SELECT * FROM order_details  where vendor_id='$key_code' and status='Delivered'";
if ($result=mysqli_query($conn,$query)) 
$rowcount3=mysqli_num_rows($result);

$query="SELECT * FROM products where user_id='$key_code'";
if ($result=mysqli_query($conn,$query)) 
$rowcount2=mysqli_num_rows($result);

$query="SELECT * FROM order_details  where vendor_id='$key_code' and status='Rejected'";
if ($result=mysqli_query($conn,$query)) 
$rowcount4=mysqli_num_rows($result);
?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Products</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $rowcount2; ?>">
                                                </h4>
                                            </div>

                                            <!-- <div class="col-6">
                                                <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                        
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Pending Orders</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $rowcount1; ?>">
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                       
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Approved Orders</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $rowcount3; ?>">
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                       
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Rejected Orders</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $rowcount4; ?>">
                                                </h4>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div> -->
                                        </div>
                                       
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->    
                        </div><!-- end row-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
    </html>