<?php
include('layout_head.php');
include('../../backend_php/config.php');

?>
<style>
     
    div.scroll {

        overflow-x: auto;
        overflow-y: hidden;
    }
    </style>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Accepted Orders</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                                            <li class="breadcrumb-item active">Accepted Orders</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Accepted Orders</h4>
                                    
                                    </div>
                                    <div class="card-body scroll">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th >Sl No</th>
                                                <th>Trans Id</th>
                                               
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Products</th>
                                                <th>Quantity</th>
                                                <th>Price</th>                                                
                                                <th>Total</th>                                               
                                                <th>Date</th>
                                                <th>Delivery Mode</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Delivered</th>
                                                <th>Delivery Date</th>
                                                <th>Note</th>
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            <?php
                                                $query="SELECT a.id,n.address,a.product_name,a.date,a.status,a.qty,a.price,a.total,a.vendor_id,n.trans_id,n.name,n.email,n.phone,n.delivery_mode,n.upi,n.Delivery_Date,n.Note from orders n INNER JOIN order_details a on n.id=a.order_id WHERE a.vendor_id=$key_code  and a.status='Accepted'";
                                                $result = mysqli_query($conn,$query);
                                                $a=0;
                                                while($data = mysqli_fetch_array($result))
                                                {                                             
                                            ?>
                                        <tr>
                                            <td><?php echo ++$a; ?></td>                                            
                                            <td><?php echo $data['trans_id']?></td>
                                            <td><?php echo $data['name']?></td>
                                            <td><?php echo $data['phone']?></td>
                                            <td><?php echo $data['product_name']?></td>
                                            <td><?php echo $data['qty']?></td>
                                            <td><?php echo $data['price']?></td>
                                            <td><?php echo $data['total']?></td>
                                            <td><?php echo $data['date']?></td>
                                            <td><?php echo $data['delivery_mode'] ?></td>
                                            <?php 
                                                if($data['delivery_mode']=='Deliver order')  { 
                                                    ?>
                                                <td><?php echo $data['address'] ?></td>
                                              <?php 
                                              }else{                                                 
                                                 ?>
                                                  <td></td>
                                              <?php
                                              }
                                                ?>
                                            <!-- <td><?php echo $data['pmode'] ?></td>
                                            <?php 
                                                    if($data['pmode']=='gpay') {
                                                ?>                                                
                                                    <td><?php echo $data['upi'] ?></td>
                                                <?php } else {
                                                    ?>

                                                    <td><?php echo $data['razorpay_payment_id'] ?></td>
                                                    <?php } ?>
                                               
                                            <td><?php echo $data['amount_paid'] ?></td>  -->
                                            <td><?php echo $data['status'] ?></td>
                                            <td  class="text-center"><a onClick="javascript: return confirm('Are you Sure Want change to Delivered');"  href="../../backend_php/vendorregister.php?action=DeliverProduct&key=<?php echo $data['id'];?>&status=Deliver"><i class="mdi mdi-checkbox-marked-circle-outline" style="font-size: 2rem; color:green"></i></a></td> 
                                                
                                                <td><?php echo $data['Delivery_Date']?></td>
                                            <td><?php echo $data['Note']?></td>
                                        </tr>                                   
                                            <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                    
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
      

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>    

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/minia/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jun 2022 12:39:29 GMT -->
</html>
