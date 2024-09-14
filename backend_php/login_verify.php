<?php
session_start();
include('config.php');
if(isset($_POST['btnLogin'])){
    
   $email = $_POST['email'];
   $password = $_POST['password'];
//    $user_type = $_POST['user_type'];

   $select = mysqli_query($conn," SELECT * FROM login WHERE email = '$email' && password = '$password'  ");

   $row = mysqli_fetch_array($select);
   if(is_array($row)) {
      $_SESSION["email"] = $row['email'];
      $_SESSION["password"] = $row['password'];
      $_SESSION["roll"] = $row['roll'];
  }   else {
      echo '<script type = "text/javascript">';
      echo 'alert("Invalid Username or Password !");';
      echo 'window.location.href = "../login.php"';
      echo '</script>';
  }
  }
  if(isset($_SESSION["email"]) && ($_SESSION["password"] &&($_SESSION['roll'] == 'admin'))){
      echo '<script type = "text/javascript">';
      echo 'window.location.href = "../admin/index.php"';
      echo '</script>';
  }else{
    echo '<script type = "text/javascript">';
    echo 'window.location.href = "../user/index.php"';
    echo '</script>';
  }
?>