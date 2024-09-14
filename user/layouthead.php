<?php
  session_start();
  include('../backend_php/config.php');
  
  $user=$_SESSION["email"];
  if($user==""){
    header("Location:../index.php");
  }

  $stmt = "SELECT * FROM login where `email` = '$user'";
  $result = mysqli_query($conn,$stmt);
  while($data = mysqli_fetch_array($result))
  {
    $key_code=$data['id'];
    $Uname=$data['name'];
    $rname=$data['roll'];
  }

  $result1 = mysqli_query($conn,"SELECT * FROM cart where `user_id` = '$key_code'");
$row = mysqli_num_rows($result1);

?>
<style>

a{
  text-decoration: none;
  color: black;
}

a:visited{
  color: black;
}

.icons{
  display: inline;
  float: right
}

.notification{
  padding-top: 10px;
  position: relative;
  display: inline-block;
}



.notBtn{
  transition: 0.5s;
  cursor: pointer
}

.bellicon{
  font-size: 20pt;
  padding-bottom: 10px;
  color: #fbaf32;
  margin-right: 10px;
  margin-left: 10px;
}

.box{
  width: 400px;
  height: 0px;
  border-radius: 10px;
  transition: 0.5s;
  position: absolute;
  overflow-y: scroll;
  padding: 0px;
  left: -300px;
  margin-top: 5px;
  background-color: #F4F4F4;
  box-shadow: 10px 10px 23px 0px rgba(0,0,0,0.1);
  cursor: context-menu;
}

.bellicon:hover {
  color: #719a0a;
}

.notBtn:hover > .box{
  height: 60vh
}

.content{
  padding: 10px;
  color: black;
  vertical-align: middle;
  text-align: left;
}

.gry{
  background-color: #F4F4F4;
}

.top{
  color: black;
  padding: 10px
}

.display{
  position: relative;
}

.cont{
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: #F4F4F4;
}

.cont:empty{
  display: none;
}

.stick{
  text-align: center;  
  display: block;
  font-size: 50pt;
  padding-top: 70px;
  padding-left: 80px
}

.stick:hover{
  color: black;
}

.cent{
  text-align: center;
  display: block;
}

.sec{
  padding: 25px 10px;
  background-color: #F4F4F4;
  transition: 0.5s;
}

.profCont{
  padding-left: 15px;
}

.profile{
  -webkit-clip-path: circle(50% at 50% 50%);
  clip-path: circle(50% at 50% 50%);
  width: 75px;
  float: left;
}

.txt{
  vertical-align: top;
  font-size: 1rem;
  /* padding: 5px 10px 0px 115px; */
}

.sub{
  font-size: 1rem;
  color: grey;
}

.new{
  border-style: none none solid none;
  border-color: #fbaf32;
  padding: 5px;
}

.sec:hover{
  background-color: #BFBFBF;
}



</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DIL KI KUSHBHOO</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="DIL KI KUSHBHOO" name="keywords">
        <meta content="DIL KI KUSHBHOO" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">D<span>IL</span> K<span>I</span> K<span>USHBHOO</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="menu.php" class="nav-item nav-link" >Shop</a>
                        <a href="designers.php" class="nav-item nav-link">Top Vendors</a>
                        <a href="addfeedback.php" class="nav-item nav-link">Feedback</a>
                        <?php
                            if($rname=='user'){
                        ?>
                            <a href="vendor_reg.php"  class="nav-item nav-link">Vendor register</a>
                        <?php }else{
                            echo '';
                        } ?>  

                        <?php
                            $stmt1 = "SELECT * FROM vendor_register where `user_id`=$key_code and `restatus`=1";                                
                            $res = mysqli_query($conn,$stmt1);                        
                            while ($data1 = mysqli_fetch_array($res))
                            {                                        
                        ?> 
                        <?php 
                            if($data1['status']=='Approved')
                            {
                        ?>
                            <a href="vendordashboard/index.php"  class="nav-item nav-link">My Store</a>
                      <?php } ?>    
                        <?php 
                            }
                            ?>
                    <!-- <a href="team.html" class="nav-item nav-link">Cart</a> -->
                    <a class="nav-item nav-link" href="cart.php"><i class="fas fa-shopping-cart bellicon"></i> </a>
                        <div class = "icons">
                            <div class = "notification">
                                <a href = "#">
                                    <div class = "notBtn" href = "#"> 
                                        <i class="fas fa-bell bellicon "></i>
                                        <div class = "box">
                                            <div class = "display">                               
                                                <div class = "cont"><!-- Fold this div and try deleting evrything inbetween -->
                                                    <div class = "sec new">
                                                        <?php
                                                            $stmt1 = "SELECT * FROM vendor_register where `user_id`=$key_code";                                
                                                            $res = mysqli_query($conn,$stmt1);                        
                                                            while ($data1 = mysqli_fetch_array($res))
                                                            {                                        
                                                        ?>                                                 
                                                   
                                                        <div class = "txt"><?php echo $Uname; ?> Your Vendor Status has been <?php echo $data1['status'];?></div>
                                                    
                                                        <div class = "txt sub"><?php echo date('d F Y, h:i:s A', strtotime($data1['created_at']));?></div>
                                                        
                                                    </div>
                                                    <div class = "sec new">
                                                    <?php 
                                                            }
                                                            ?>

                                                        <?php
                                                            $stmt1 = "SELECT * FROM  order_details where `user_id`=$key_code";                                
                                                            $res = mysqli_query($conn,$stmt1);                        
                                                            while ($data1 = mysqli_fetch_array($res))
                                                            {                                        
                                                        ?> 
                                                         <div class = "txt"><?php echo $Uname; ?>  Your Order Status has been <?php echo $data1['status'];?></div>
                                                    
                                                    <div class = "txt sub"><?php echo date('d F Y, h:i:s A', strtotime($data1['created_at']));?></div>
                                                    <?php 
                                                        }
                                                        ?>
                                                     </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a class="nav-item nav-link" href="editprofile.php"><i class="fas fa-User bellicon"></i> </a>
                        <a href="../backend_php/logout.php" class="nav-item nav-link">Logout</a>                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->

