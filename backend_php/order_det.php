<?php
	session_start();
    include('config.php');
    // Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $Uid = $_POST['uid'];
	  $pid = $_POST['pid'];
	  $vid = $_POST['vid'];
	  $pname = $_POST['pname'];
	  $pqty = $_POST['pqty'];
	  $pprice = $_POST['pprice'];
	  $TransId = $_POST['trans_id'];
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $delivery = $_POST['delivery'];
	  $address = $_POST['address'];
	  $Pmode = $_POST['pmode'];
	  $Upi	= $_POST['upi'];
	  $Delivery_date= $_POST['delivery_date'];
	  $note=$_POST['note'];
	//   `product_id`,
	

	  $stmt2 ="INSERT INTO `orders` (`user_id`,`trans_id`,`name`, `email`, `phone`,`delivery_mode`, `address`, `pmode`,`amount_paid`,`upi`,`date`,`Delivery_date`,`Note`)VALUES('$Uid','$TransId','$name','$email','$phone','$delivery','$address','$Pmode','$grand_total','$Upi',CURRENT_DATE(),'$Delivery_date','$note')";	  
	  $res1=mysqli_query($conn,$stmt2);

	  $stmt2 = "SELECT id FROM orders";
	  $result2 = mysqli_query($conn,$stmt2);
	  while($data = mysqli_fetch_array($result2))
	  {
		$orderid=$data['id'];
        
	  }
     
      
      $query = "SELECT * FROM cart where user_id='$Uid'";
  
      $stmt = mysqli_query($conn,$query);
    while($data = mysqli_fetch_array($stmt))
    {
        $prdid = $data['product_id'];
        $venid = $data['vendor_id'];
        $prdname = $data['product_name'];
        $prdqty = $data['qty'];
        $prprice = $data['price'];
		$Delivery_date1= $_POST['delivery_date'];
	  	$note1=$_POST['note'];
        $totalprice = $prdqty * $prprice;
        $stmt1 ="INSERT INTO `order_details` (`order_id`,`product_id`,`user_id`,`vendor_id`,`qty`, `price`, `total`,`date`,`product_name`,`Delivery_date`,`Note`)VALUES('$orderid','$prdid','$Uid','$venid','$prdqty','$prprice','$totalprice',CURRENT_DATE(),'$prdname','$Delivery_date1','$note1')";	  
        // echo $stmt1;
        $res=mysqli_query($conn,$stmt1);
    
      
    }
	
	  

	 
	    $data = '';
	//   echo $result;
	  $stmt2 ="DELETE FROM cart";
	 $res2=mysqli_query($conn,$stmt2);
	  $data .= '<div class="text-center">							
								<p class="text-success">Your Order Placed Successfully!</p>
								<h4 style="font-family:"Open Sans", sans-serif">Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Payment : ' . number_format($grand_total,2) . '</h4>
								
						  </div>';
	  echo $data;
	}

    ?>