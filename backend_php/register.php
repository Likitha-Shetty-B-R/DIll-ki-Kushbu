<?php
session_start();
include('config.php');
if(isset($_POST["SignUp"]))
{

    $name= $_POST["name"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $number= $_POST["number"];
    $address= $_POST["address"];
    $roll = "user";
    $query = "SELECT * FROM login WHERE email='$email'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) > 0){
        echo "<script>alert('Sorry... email already taken');
        window.location.href='../login.php';</script>";
    }else{
    $sql=mysqli_query($conn,"INSERT INTO login (name,address,number,password,email,roll) values('$name','$address','$number','$password','$email','$roll');");   
        echo "<script>alert('Registration successfull Kindly login');
        window.location.href='../login.php';</script>";
    }
    

}


?>

