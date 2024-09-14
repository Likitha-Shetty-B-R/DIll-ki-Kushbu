<?php
include('layout_head.php');
include('../../backend_php/config.php');
?>

<style>
     
    div.scroll {
 

        overflow-x: auto;
        overflow-y: hidden;
    }
    .dot {
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
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
                                    <h4 class="mb-sm-0 font-size-18">All Products</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                            <li class="breadcrumb-item active">All Products</li>
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
                                        <h4 class="card-title">All Products</h4>
                                    
                                    </div>
                                    <div class="card-body scroll">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                            <th>Sl No</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Product Color</th>
                                            <th>Product Code</th>
                                            <th>Price</th>
                                            <th>Description</th>                                           
                                            <th class="text-center">Delete</th>
                                            <th class="text-center">Edit</th> 
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            <?php
                                                $query="SELECT * from products where user_id='$key_code'";
                                                $result = mysqli_query($conn,$query);
                                                $a=0;
                                                while($data = mysqli_fetch_array($result))
                                                {                                             
                                            ?>
                                        <tr>
                                        <td><?php echo ++$a; ?></td>                                           
                                            <td> <a href="../documents/products/<?php echo $data['image'];?>" class="pop"><img src="../documents/products/<?php echo $data['image'];?>" class="rounded" alt="Admin Image" width="70"></a></td>
                                                  
                                            <td><?php echo $data['product_name'] ?></td>
                                            <td><span class="dot" style="background-color:<?php echo $data['product_color'];?>;"></span>
                                        </td>
                                            <td><?php echo $data['code'] ?></td>
                                            <td><?php echo $data['price'] ?></td>
                                            <td><?php echo $data['description'] ?></td>             
                                            <td><a onClick="javascript: return confirm('Are you Sure Want To Delete');"  href="../../backend_php/product_management.php?action=DeleteProduct&key=<?php echo $data['id'];?>"><i class="fas fa-trash"></i></a></td>                  
                                            <td><a href="edit_products.php?key=<?php echo $data['id']; ?>"><i class="fas fa-user-edit"></i></a></td>
                                            
                            
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
