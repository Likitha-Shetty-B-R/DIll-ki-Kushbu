<?php

if(isset($_GET['action'])){
    $function=$_GET['action'];
}else $function='';

switch($function){

        case 'InsertPayout':
            InsertPayout();
        break;


        case 'InsertDesigner':
            InsertDesigner();
        break;
    }

    function InsertPayout(){
        include('config.php');
        $Vendorid = $_POST['vendorid'];
        $amt=$_POST["amount"];
       

            $insert="INSERT INTO `payout`(`vendorid`,`amt`,`date`) VALUES ('$Vendorid','$amt',CURRENT_DATE())";
            // echo $insert;
            $result=mysqli_query($conn,$insert); 
            if($result){
                  echo "<script> location.href='../admin/payout.php'; alert('Successfull..');</script>";
            }else{
                echo " <script> location.href='../admin/payout.php'; alert('Something went wrong !!');</script>";
            } 
            
        }

        function InsertDesigner(){
            include('config.php');
            $Vendorid = $_POST['vendorid'];
            $desc=$_POST["desc"];
            $flower_name=$_POST["flower_name"];
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];   
            $folder = "../user/documents/topdesigner/".$filename;

            move_uploaded_file($tempname,$folder);
                
    
                $insert="INSERT INTO `top_designer`(`image`,`flower_name`,`vendor_id`,`description`) VALUES ('$filename','$flower_name','$Vendorid','$desc')";
                // echo $insert;
                $result=mysqli_query($conn,$insert); 
                if($result){
                      echo "<script> location.href='../admin/designers.php'; alert('Successfull..');</script>";
                }else{
                    echo " <script> location.href='../admin/designers.php'; alert('Something went wrong !!');</script>";
                } 
                
            }

        ?>