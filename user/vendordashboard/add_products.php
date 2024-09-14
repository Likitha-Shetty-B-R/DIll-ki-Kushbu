<?php

include('../../backend_php/config.php');
$sql = "SELECT * FROM vendor_register";
$res = mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($res))
{
  $keycode=$data['id'];
}
?>
<?php include('layout_head.php')?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Products</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                <li class="breadcrumb-item active">Add Products</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Products</h4>                                       
                        </div>
                        <div class="card-body p-4">        
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="POST" id="form"  action="../../backend_php/product_management.php?action=InsertProduct"  enctype="multipart/form-data">
                                    <input type="hidden" name="uid" value="<?php echo $key_code ?>">    
                                    <div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Category Name </label>
                                            <select id="catid" required name="catid" class="form-control">
                                                <option value=""selected disabled>-Select Category-</option>
                                                <?php
                                                    $query="SELECT * from category";
                                                    $result = mysqli_query($conn,$query);
                                                    while($data = mysqli_fetch_array($result))
                                                    {      
                                                ?>
                                                <option value="<?php echo $data['category_name']?>"><?php echo $data['category_name']?></option>                            
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Price</label>
                                            <input type="number" class="form-control"  min=0 name="price" placeholder="Enter product price" autocomplete="off"  autocomplete="off"  required>
                                        </div>
                                         <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Delivery/Vendor Number</label>
                                            <input type="text" class="form-control"  pattern="[6789][0-9]{9}" title="Must contain 10 digits or Invalid Phone number" minlength="10" maxlength="10"name="number" placeholder="Enter number" autocomplete="off"  autocomplete="off"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Image</label>
                                            <input type="file" class="form-control"  name="uploadfile" autocomplete="off"  required>
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Product Name </label>
                                            <input type="text" class="form-control"  id="prod_name" name="prod_name"  placeholder="Enter product name" autocomplete="off"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Product Color </label>
                                            <input type="color" required class="form-control"  id="prod_name" name="prod_color"  placeholder="Enter product name" autocomplete="off"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Product Code </label>
                                            <input type="text" class="form-control"  name="code" placeholder="Enter product code" autocomplete="off" autocomplete="off"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Description </label>
                                            <input type="text" class="form-control"  name="desc" placeholder="Enter product description" autocomplete="off" >
                                        </div>
                                       

                                        <div class="mb-3 mt-5" style="margin-left:20rem">
                                            <button type="submit" class="btn btn-primary " name="add_product">Add Product</button>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</div>
<?php include('footer.php')?>