<?php

if(isset($_GET['action'])){
    $function=$_GET['action'];
}else $function='';

switch($function){

        case 'InsertProduct':
            InsertProduct();
        break;

        case 'DeleteProduct':
            DeleteProduct();
        break;

        case 'EditProduct';
        EditProduct();
        break;

        case 'DeleteFeedback';
        DeleteFeedback();
        break;

        case 'InsertCategory':
            InsertCategory();
        break;

        default :
        echo 'no function';
       
}

function InsertProduct(){
    include('config.php');
    $Uid = $_POST['uid'];
    $Cat_id = $_POST['catid'];
    $ProdNam=$_POST["prod_name"];
    $ProdCol=$_POST["prod_color"];
    $ProdCod=$_POST["code"];
    $price=$_POST["price"];
    $numb=$_POST["number"];
    $descrp=$_POST["desc"];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "../user/documents/products/".$filename;

    move_uploaded_file($tempname,$folder);

        $insert="INSERT INTO `products`(`user_id`,`category_id`,`product_name`,`product_color`,`code`,`price`,`description`, `image`,`deliver_number`) VALUES ('$Uid','$Cat_id','$ProdNam','$ProdCol','$ProdCod','$price','$descrp','$filename','$numb')";
        $result=mysqli_query($conn,$insert); 
        if($result){
              echo "<script> location.href='../user/vendordashboard/all_products.php'; alert('Product Added Successfully ..');</script>";
        }else{
            echo "<script> location.href='../user/vendordashboard/add_products.php';  alert('Something went wrong !!');</script>";
        } 
        
    }

function DeleteProduct(){
    include('config.php');   
    $key_code=$_GET["key"];

    $delete="DELETE FROM `products` WHERE id=$key_code";
    $result=mysqli_query($conn,$delete); 
    if($result){
        echo "<script> location.href='../user/vendordashboard/all_products.php'; alert('Successfull ..');</script>";
  }else{
      echo "<script> location.href='../user/vendordashboard/all_products.php';  alert('Something went wrong !!');</script>";
  } 
}

function DeleteFeedback(){
    include('config.php');   
    $key_code=$_GET["key"];

    $delete="DELETE FROM `feedback` WHERE id=$key_code";
    $result=mysqli_query($conn,$delete); 
    if($result){
        echo "<script> location.href='../user/vendordashboard/vfeedback.php'; alert('Successfull ..');</script>";
  }else{
      echo "<script> location.href='../user/vendordashboard/vfeedback.php';  alert('Something went wrong !!');</script>";
  } 
}

function EditProduct(){
    include('config.php');
    $key_code=$_GET["key"];
    $Cat_id = $_POST['catid'];
    $eprod_name=$_POST["e_prodname"];
    $e_prodcolor=$_POST["e_prodcolor"];
    $ProdCod=$_POST["e_code"];
    $eprice=$_POST["e_price"];
    $edesc=$_POST["e_desc"];
    $enum=$_POST["e_num"];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "../user/documents/products/".$filename;

    move_uploaded_file($tempname,$folder);


    $update="UPDATE `products` SET `category_id`='$Cat_id',`product_name`='$eprod_name',`product_color`='$e_prodcolor',`price`='$eprice',`code`='$ProdCod',
    `description`='$edesc',`image`='$filename',`deliver_number`='$enum' WHERE id=$key_code";
     $result=mysqli_query($conn,$update); 
     if($result){
        echo "<script> location.href='../user/vendordashboard/all_products.php'; alert('Successfull ..');</script>";
        }else{
        echo "<script> location.href='../user/vendordashboard/edit_products.php';  alert('Something went wrong !!');</script>";
    } 
}

function InsertCategory(){
    include('config.php');
    $cat_name=$_POST['category'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "../user/documents/category/".$filename;

    move_uploaded_file($tempname,$folder);

    $query1 = "SELECT * FROM category WHERE category_name='$cat_name'";
    $result = mysqli_query($conn, $query1);
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Category already exist');
        window.location.href='../admin/category.php';</script>";
    }else{
    $query="INSERT INTO `category`(`category_name`,`category_image`) values('$cat_name','$filename')";
    $res=mysqli_query($conn,$query);    
      
        echo "<script> location.href='../admin/category.php'; alert('Successfull ..');</script>";
   }
}
?>