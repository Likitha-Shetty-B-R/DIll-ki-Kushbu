<?php
session_start();
include('../backend_php/config.php');
$user=$_SESSION["email"];
if(!($user=="admin@gmail.com")){
  header("Location:../index.php");
}
?>
<?php include('layout_head.php')?>
<style>
     
    div.scroll {
 

        overflow-x: auto;
        overflow-y: hidden;
    }
  
    .btnbtn{
            /* background-color: red; */
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .greens{
            background-color: #199319;
        }
        .redds{
            background-color: red;
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
                                    <h4 class="mb-sm-0 font-size-18">Rejected Vendor</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor</a></li>
                                            <li class="breadcrumb-item active">Rejected Vendor</li>
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
                                        <h4 class="card-title">Rejected Vendor</h4>
                                    
                                    </div>
                                    <div class="card-body scroll">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                            <th >Sl No</th>
                                            <th>Shop Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Adhaar card</th>
                                            <th>Document</th>   
                                            <th>Qr Code</th>  
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            <?php
                                            
                                    $query="SELECT l.name,v.shop_name,v.vendor_name,l.email,v.vendor_num,l.address,v.adhaar,v.document,v.qrcode,v.status,v.restatus,v.user_id from vendor_register v INNER JOIN login l ON l.id = v.user_id  where status='Rejected'";
                                    $result = mysqli_query($conn,$query);
                                    $a=0;
                                    while($data = mysqli_fetch_array($result))
                                    {                               
                                ?>
                                <tr>
                                    <td><?php echo ++$a; ?></td>   
                                    <td><?php echo $data['shop_name'] ?></td>
                                    <td><?php echo $data['vendor_name'] ?></td>
                                    <td><?php echo $data['email'] ?></td>       
                                    <td><?php echo $data['vendor_num'] ?></td>
                                    <td><?php echo $data['address'] ?></td>
                                    <td> <a href="../user/documents/vendoradhaar/<?php echo $data['adhaar'];?>" class="pop"><img src="../user/documents/vendoradhaar/<?php echo $data['adhaar'];?>" class="rounded" alt="Admin Image" width="70"></a></td> 
                                    <td> <a href="../user/documents/vendordocs/<?php echo $data['document'];?>" class="pop"><img src="../user/documents/vendordocs/<?php echo $data['document'];?>" class="rounded" alt="Admin Image" width="70"></a></td>    
                                    <td> <a href="../user/documents/vendorqr/<?php echo $data['qrcode'];?>" class="pop"><img src="../user/documents/vendorqr/<?php echo $data['qrcode'];?>" class="rounded" alt="Admin Image" width="70"></a></td>                                            
                                   
                                    <!-- <td><a onClick="javascript: return confirm('Are you Sure Want To Delete');"  href="../backend_php/vendorregister.php?action=deletevendor&key=<?php echo $data['user_id'];?>"><i class="mdi mdi-delete" style="font-size: 2rem;"></i></a></td>                   -->
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
