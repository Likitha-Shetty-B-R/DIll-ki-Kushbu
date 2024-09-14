<?php
	session_start();
    include('config.php');

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $Uid = $_POST['uid'];
	  $pid = $_POST['pid'];
	  $vid = $_POST['vid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $conn->prepare('SELECT code,user_id FROM cart WHERE code=? AND user_id=?');
	  $stmt->bind_param('si',$pcode,$Uid);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['code'] ?? '';


	  if (!$code) {
	    $query = "INSERT INTO cart (`product_id`,`user_id`,`vendor_id`,`product_name`,`price`,`image`,`qty`,`total_price`,`code`) VALUES ('$pid','$Uid','$vid','$pname','$pprice','$pimage','$pqty','$total_price','$pcode')";
		// echo $query;
		$result3 = mysqli_query($conn,$query);

	
		if($result3){  

			echo "<script> location.href='../user/menu.php'; alert('Product added to your cart!');</script>";
							 
		  } }else {
			echo "<script>  location.href='../user/menu.php'; alert('Product already added to your cart!');</script>";		
		}
}

	// Get no.of items available in the cart table


	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = "DELETE FROM `cart` WHERE id='$id'";
	 $remove=mysqli_query($conn,$stmt);

	 echo "<script> location.href='../user/cart.php'; alert('Item removed from the cart!');</script>";
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt ="DELETE FROM cart";
	  $del=mysqli_query($conn,$stmt);
	  echo "<script> location.href='../user/cart.php'; alert('All Item removed from the cart!');</script>";
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = "UPDATE `cart` SET `qty`='$qty', total_price='$tprice' WHERE id='$pid'";
	  $result2=mysqli_query($conn,$stmt);
	}

	
?>