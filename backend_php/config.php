<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = mysqli_connect($servername,$username,$password,"$dbname");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
//   echo "Connected successfully";

$db = new PDO('mysql:host=localhost;dbname=flower', $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>