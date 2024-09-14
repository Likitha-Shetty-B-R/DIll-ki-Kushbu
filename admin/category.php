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
                                    <h4 class="mb-sm-0 font-size-18">All Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                                            <li class="breadcrumb-item active">All Category</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-header d-flex flex-row-reverse ">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                >Add Category</button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <form action="../backend_php/product_management.php?action=InsertCategory" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header ">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add Now</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label">Add Category:</label>
                                                                    <input type="text" name="category" class="form-control" id="recipient-name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="example-search-input" class="form-label">Category Image</label>
                                                                    <input type="file" class="form-control"  name="uploadfile" autocomplete="off"  required>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <div class="card-body scroll">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                            <th>Sl No</th>
                                            <th>Category Name</th>
                                            <th>Category Image</th>
                                            <!-- <th class="text-center">Delete</th> -->
                                            <!-- <th class="text-center">Edit</th>  -->
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            <?php
                                                $query="SELECT *  from category";
                                                $result = mysqli_query($conn,$query);
                                                $a=0;
                                                while($data = mysqli_fetch_array($result))
                                                {                                             
                                            ?>
                                        <tr>
                                        <td><?php echo ++$a; ?></td>         
                                        <td><?php echo $data['category_name'] ?></td>    
                                        <td> <a href="../user/documents/category/<?php echo $data['category_image'];?>" class="pop"><img src="../user/documents/category/<?php echo $data['category_image'];?>" class="rounded" alt="Admin Image" width="70"></a></td>                              
                                              
                                            <!-- <td><a onClick="javascript: return confirm('Are you Sure Want To Delete');"  href="../backend_php/product_management.php?action=DeleteProduct&key=<?php echo $data['id'];?>"><i class="fas fa-trash"></i></a></td>                   -->
                                            <!-- <td><a href="edit_products.php?key=<?php echo $data['id']; ?>"><i class="fas fa-user-edit"></i></a></td> -->
                                            
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
