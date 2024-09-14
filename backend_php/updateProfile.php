

<?php
// Include the database configuration file
session_start();
include('config.php');
$user=$_SESSION["email"];

/*if(isset($_POST["updateprofile"]))
{
    $key_code=$_GET["key"];
    $name= $_POST["name"];
    // $dob= $_POST["dob"];
    $address= $_POST["address"];
    $number= $_POST["contact"];
    $emails= $_POST["ed_email"];
    
    $sql="UPDATE `login` SET `name`='$name',`address`='$address',`number`='$number',`email`='$emails' WHERE `id`=$key_code ";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../admin/index.php';</script>";
    }else{
        echo "<script>alert('something went wrong.');
        window.location.href='../admin/editprofile.php';</script>";
    }

}

if(isset($_POST["updatevendor"]))
{
    $key_code=$_GET["key"];
    $name= $_POST["name"];
    // $dob= $_POST["dob"];
    $address= $_POST["address"];
    $number= $_POST["contact"];
    $emails= $_POST["ed_email"];
    
    $sql="UPDATE `login` SET `name`='$name',`address`='$address',`number`='$number',`email`='$emails' WHERE `id`=$key_code ";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../user/vendordashboard/index.php';</script>";
    }else{
        echo "<script>alert('something went wrong.');
        window.location.href='../user/vendordashboard/editprofile.php';</script>";
    }

}*/

if(isset($_POST["user_submit"]))
{
    $key_code=$_GET["key"];
    $name= $_POST["name"];
    // $dob= $_POST["dob"];
    $address= $_POST["address"];
    $number= $_POST["phone"];
    // $emails= $_POST["ed_email"];
    
    $sql="UPDATE `login` SET `name`='$name',`address`='$address',`number`='$number' WHERE `id`=$key_code ";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../user/index.php';</script>";
    }else{
        echo "<script>alert('something went wrong.');
        window.location.href='../user/editprofile.php';</script>";
    }

}
?>