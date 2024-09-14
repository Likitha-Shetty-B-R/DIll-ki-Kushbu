<?php

if(isset($_GET['action'])){
    $function=$_GET['action'];
}else $function='';

switch($function){

        case 'Insertvendors':
            Insertvendors();
        break;
        
        case 'Approvevendor':
            Approvevendor();
            break;

        case 'DeliverProduct':
            DeliverProduct();
            break;

        case 'deletevendor':
            deletevendor();
            break;

        case 'InsertFeedback':
            InsertFeedback();
            break;

            case 'activate':
                activate();
                break;
      
        default :
        echo 'no function';
       
}

function Insertvendors(){
    include('config.php');
    $Uid = $_POST['uid'];
    $Shopname=$_POST["sname"];
    $Vname=$_POST["name"];
    $Vnum1=$_POST["number"];
    $Vadd=$_POST["address"];

    $Wfilename = $_FILES["b_file"]["name"];
    $gtempname = $_FILES["b_file"]["tmp_name"];   
    $gfolde = "../user/documents/vendoradhaar/".$Wfilename;
    move_uploaded_file($gtempname,$gfolde);

    $Bfilename = $_FILES["N_file"]["name"];
    $tempname = $_FILES["N_file"]["tmp_name"];   
    $folder = "../user/documents/vendordocs/".$Bfilename;
    move_uploaded_file($tempname,$folder);

    $Qfilename = $_FILES["Q_file"]["name"];
    $tempname = $_FILES["Q_file"]["tmp_name"];   
    $folder = "../user/documents/vendorqr/".$Qfilename;

    move_uploaded_file($tempname,$folder);
    $query = "SELECT * FROM vendor_register WHERE user_id='$Uid' and status='Approved'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) > 0){
        echo "<script>alert('Sorry... Already registered');
        window.location.href='../user/vendor_reg.php';</script>";
    }else{
        $insert=mysqli_query($conn,"INSERT INTO `vendor_register`(`user_id`, `shop_name`, `vendor_name`, `vendor_num`,`vendor_add`, `adhaar`,`document`,`qrcode`,`status`,`restatus`,`date`) VALUES ('$Uid','$Shopname','$Vname','$Vnum1','$Vadd','$Wfilename','$Bfilename','$Qfilename','Pending',1,CURRENT_DATE())");
              echo "<script> location.href='../user/index.php'; alert('Application Sent Successfully Wait for the confirmation !');</script>";
        }
        
}

function DeliverProduct(){
    include('config.php');   
    $keyCode=$_GET["key"];
    $sts = $_GET["status"];

    if($sts=='Deliver'){
        $update="UPDATE `order_details` SET `status`='Delivered' WHERE `id`=$keyCode";
        // echo $update;
        $result=mysqli_query($conn,$update); 

      
    }else if($sts=='Reject'){
        $update="UPDATE `order_details` SET `status`='Rejected'  WHERE `id`=$keyCode";
        $result=mysqli_query($conn,$update); 
    }
    else if($sts=='Accept'){
        $update="UPDATE `order_details` SET `status`='Accepted'  WHERE `id`=$keyCode";
        $result=mysqli_query($conn,$update); 
    }else{
        echo "alert('Something went wrong !!');</script>";
    }
    if($result){
        echo "<script>location.href='../user/vendordashboard/approved_orders.php'; alert('Successfull ..');</script>";
  }else{
      echo "<script>location.href='../user/vendordashboard/pending_orders.php';alert('Something went wrong !!');</script>";
  }  
    
}
function Approvevendor(){
    include('config.php');   
    $key_code=$_GET["key"];
    $sts = $_GET["status"];

    if($sts=='Approve'){
        $update="UPDATE `vendor_register` SET `status`='Approved' WHERE `user_id`=$key_code";
        $result=mysqli_query($conn,$update); 

        $sql="UPDATE `login` SET roll='Vendor' WHERE `id`=$key_code";
        $res=mysqli_query($conn,$sql); 
    }else if($sts=='Reject'){
        $update="UPDATE `vendor_register` SET `status`='Rejected'  WHERE `user_id`=$key_code";
        $result=mysqli_query($conn,$update); 
    }else{
        echo "alert('Something went wrong !!');</script>";
    }
    if($result){
        echo "<script>location.href='../admin/approvedvendors.php'; alert('Successfull ..');</script>";
  }else{
      echo "<script>location.href='../admin/pendingvendors.php';alert('Something went wrong !!');</script>";
  }  
    
}

// function deleteuser(){
//     include('config.php');   
//     $key_code=$_GET["key"];

//     $delete="DELETE FROM `login` WHERE id=$key_code";
//     $result=mysqli_query($conn,$delete); 
//     if($result){
//         echo "<script> location.href='../admin/users.php'; alert('Deleted Successfully');</script>";
//     }else{
//         echo "<script> location.href='../admin/users.php';  alert('Something went wrong !!');</script>";
//     } 
// }

function deletevendor(){
    include('config.php');   
    $key_code=$_GET["key"];

    $delete="DELETE FROM `vendor_register` WHERE id=$key_code";
    $result=mysqli_query($conn,$delete); 
    if($result){
        echo "<script> location.href='../admin/index.php'; alert('Successfull ..');</script>";
    }else{
        echo "<script> location.href='../admin/index.php';  alert('Something went wrong !!');</script>";
    } 
}

function InsertFeedback(){
    include('config.php');
    $Feedname=$_POST["name"];
    $Feedadds=$_POST["feedback"];
    $feedemail=$_POST["email"];
    $insert="INSERT INTO `feedback`(`fname`,`femail`,`description`,`date`) VALUES ('$Feedname','$feedemail','$Feedadds',CURRENT_DATE())";
    $result=mysqli_query($conn,$insert); 
    if($result){
          echo "<script>  location.href='../user/index.php'; alert('Thank you for your feedback');</script>";
    }else{
        echo "<script> location.href='../user/addfeedback.php';  alert('Something went wrong !!');</script>";
    } 
}


function activate(){
    include('config.php');   
    $key_code=$_GET["Dkey"];
    $restatus = $_GET["status"];
// echo $restatus;
    if($restatus=='actives'){
        $update="UPDATE `vendor_register` SET `restatus`=1  WHERE `user_id`=$key_code";
        // echo $update;
        $result=mysqli_query($conn,$update); 
        $update="UPDATE `products` SET `restatus`=1  WHERE `user_id`=$key_code";
        // echo $update;
        $result=mysqli_query($conn,$update); 

    }else if($restatus=='deactive'){
        $update="UPDATE `vendor_register` SET `restatus`=0  WHERE `user_id`=$key_code";
        $result=mysqli_query($conn,$update); 

        $result=mysqli_query($conn,$update); 
        $update="UPDATE `products` SET `restatus`=0  WHERE `user_id`=$key_code";
    }else{
        echo "alert('Something went wrong !!');</script>";
    }
    if($result){
        echo "<script>location.href='../admin/approvedvendors.php'; alert('Successfull ..');</script>";
  }else{
      echo "<script>location.href='../admin/approvedvendors.php';alert('Something went wrong !!');</script>";
  }  
}
?>
