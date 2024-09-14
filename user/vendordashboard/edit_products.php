<?php

include('../../backend_php/config.php');
$keyCode=$_GET["key"];
$query="SELECT * from products WHERE id = '$keyCode'";
$result = mysqli_query($conn,$query);
while($data = mysqli_fetch_array($result))
{
  $keyCode=$data['id'];
  $prodname=$data['product_name'];
  $color=$data['product_color'];
  $category=$data['category_id'];
  $prodcode=$data['code'];
  $prod_price=$data['price'];
  $prod_desc=$data['description'];
  $prod_image=$data['image'];
  $number=$data['deliver_number'];
}

?>
<?php include('layout_head.php')?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Products</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Product</h4>                                       
                        </div>
                        <div class="card-body p-4">        
                            <div class="row">
                                <div class="col-lg-6">
                                <form method="POST" id="form"  action="../../backend_php/product_management.php?action=EditProduct&key=<?php echo $keyCode; ?>"  enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="<?php echo $key_code ?>">    
                                <div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Category Name </label>
                                            <input type="text" class="form-control" name="catid" placeholder="Enter the Category Name" autocomplete="off" readonly value="<?php echo $category; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Product Name </label>
                                            <input type="text" class="form-control" name="e_prodname" placeholder="Enter the Product Name" autocomplete="off" required value="<?php echo $prodname; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Product Color </label>
                                            <input type="color" class="form-control" name="e_prodcolor" placeholder="Enter the Product Name" autocomplete="off" required value="<?php echo $color; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Price</label>
                                            <input type="number" class="form-control" name="e_price" placeholder="Enter Product Price" autocomplete="off" value="<?php echo $prod_price; ?>" >
                      
                                        </div>
                                        

                                        <div class="mb-3">
                                         <div class="row">             
                                                <div class="col-md-3">
                                                <label for="example-search-input" class="form-label">Old Image</label>
                                                </div>
                                                <div class="col-md-6">
                                                <img src="../documents/products/<?php echo $prod_image; ?>" class="rounded" alt="Admin Image" width="150"> 
                                                </div>              
                                            </div><br>
                                            <div class="row">             
                                                <div class="col-md-3">
                                                <label for="example-search-input" class="form-label"> Image</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control" placeholder="Address" name="uploadfile">  
                                                </div>              
                                            </div><br>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Product Code </label>
                                            <input type="text" class="form-control" name="e_code" placeholder="Enter the Product Code" autocomplete="off" required value="<?php echo $prodcode; ?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Delivery/Vendor Number</label>
                                            <input type="number" class="form-control"  name="e_num" placeholder="Enter number" autocomplete="off"  autocomplete="off"  required value="<?php echo $number; ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-search-input" class="form-label"> Description </label>
                                            <textarea class="form-control"  name="e_desc" placeholder="Enter Product Description" autocomplete="off"><?php echo $prod_desc; ?></textarea>
                                        </div>
                                        <div class="mb-3" style="margin-left:20rem; margin-top:10rem">
                                            <button type="submit" class="btn btn-primary " name="add_product">Update Product</button>
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