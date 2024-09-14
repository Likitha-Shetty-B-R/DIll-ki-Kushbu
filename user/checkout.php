<?php
include('layouthead.php'); 

include('../backend_php/config.php');


	$grand_total = 0;
	$allItems = '';
	$items = [];

  $stmt = "SELECT * FROM login where `email` = '$user'";
  $result = mysqli_query($conn,$stmt);
  while($data = mysqli_fetch_array($result))
  {
    $key_code=$data['id'];
    $Uname=$data['name'];
    $emal=$data['email'];
  }

  $query = "SELECT * FROM cart where user_id='$key_code'";
  
  $stmt = mysqli_query($conn,$query);
while($data = mysqli_fetch_array($stmt))
{
  // $keycode=$data['id'];
  $pid=$data['product_id'];
  $Vendorid=$data['vendor_id'];
  $prodtname=$data['product_name'];
  $grand_total += $data['total_price'];
  // $items[] = $row['ItemQty'];
  $prodqty=$data['qty'];
  $prodprice=$data['price']; 
}
// $allItems = implode(', ', $items);

  $value2='';
  $query = "SELECT trans_id from orders order by trans_id DESC LIMIT 1";
  $stmt = mysqli_query($conn,$query);
  if(mysqli_num_rows($stmt) > 0) {
      if ($row = mysqli_fetch_assoc($stmt)) {
          $value2 = $row['trans_id'];
          $value2 = substr($value2, 10, 13);//separating numeric part
          $value2 = $value2 + 1;//Incrementing numeric part
          $value2 = "ORD/22-23/" . sprintf('%03s', $value2);//concatenating incremented value
          $value = $value2; 
      }
  }   
  else {
      $value2 = "ORD/22-23/001";
      $value = $value2;
  }
  // echo $value;//
?>

<style>
    
  </style>
  <body>
  
  <div class="page-header mb-0">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <h2>Checkout</h2>
          </div>
          <div class="col-12">
              <a href="index.php">Home</a>
              <a href="checkout.php">checkout</a>
          </div>
      </div>
  </div>
</div>
  <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        
        <h1 class="display-5 mb-4 mt-3">Fill Payment details</h1>
      </div>
      <div class="row g-6 justify-content-center">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" id="order">         
          <div class="jumbotron p-3 mb-2 text-center">
         
            <!-- <h6 class="lead"><b>Product(s) : </b><?php echo $prodtname; ?></h6> -->
            <h5><b>Total Amount Payable : </b><?php echo number_format($grand_total,2) ?>/-</h5>
          </div>
          <form action="" method="post" id="placeOrder">          
          <input type="hidden" id="products" name="products" value="<?php echo $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
          <input type="hidden" id="uid" name="uid" value="<?php echo $key_code ?>">
          <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
          <input type="hidden" id="vid" name="vid" value="<?php echo $Vendorid ?>">
          <input type="hidden" id="pname" name="pname" value="<?php echo $prodtname ?>">
          <input type="hidden" id="pqty" name="pqty" value="<?php echo $prodqty ?>">
          <input type="hidden" id="pprice" name="pprice" value="<?php echo $prodprice ?>">
            <div class="row g-3">           
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" id="trans_id" name="trans_id" class="form-control" placeholder="Transaction ID" value="<?php echo $value; ?>" readonly>
                  <br>
                </div>
              </div>  
              <div class="col-md-12">
                  <div class="control-group">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" readonly value="<?php echo $Uname ?>" />
                  <br>
                  </div>
              
              </div>  
              <div class="col-md-12">
                <div class="control-group">
                  <input type="email" name="email" id="email"  class="form-control" placeholder="Enter E-Mail" readonly autocomplete="off"  value="<?php echo $emal ?>">
                  <br>
                </div>
              </div>
              <div class="col-md-12">
              <div class="control-group">
                  <input type="tel" required name="phone" id="phone"  title="Must contain 10 digits or Invalid Phone number" minlength="10" maxlength="10" class="form-control" placeholder="Enter Phone" pattern="[6789][0-9]{9}" autocomplete="off">
                  <br>
              </div>
              </div>
              <div class="col-md-12">
              <div class="control-group">
                  <input type="date" name="delivery_date" id="delivery_date" class="form-control" placeholder="Enter the date of delivery"  autocomplete="off" required>
                  <br>
                </div>
              </div>
              <div class="col-12">
              <div class="form-floating">
                  <textarea name="note" id="note" class="form-control"  required title="Enter any message you would like to delivery" name="feedback" placeholder="Enter any message you would like to delivery" style="height: 100px"></textarea>
                <br>
              </div>
              </div>
              <div class="col-md-12">
              <div class="control-group">
                  <select id="delivery" required name="delivery" onchange="check()" class="form-control">
                    <option value="" selected disabled>-Select Delivery Mode-</option>
                    <option value="pickup order">Pickup Order</option>
                    <option value="Deliver order">Deliver Order</option>  
                                
                  </select>         
                  <br>         
                </div>
              </div>
              <div class="col-md-12">
              <div class="control-group deliver_add">  
                  <textarea name="address" id="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
                 
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="control-group">
                  <select id= "pmode" required name="pmode" onchange="check()" class="form-control">
                    <option value="" selected>-Select Payment Mode-</option>
                    <option value="gpay">Gpay,Phonepe,Paytm</option>
                    <option value="cod">Cash on Delivery</option>
                  </select>
                  <br>
                </div>
              </div>  
              
              <div class="col-md-12">
                <div class="control-group phonepe">
                  <input type="text" class="form-control" id="upi" name="upi" autocomplete="off" placeholder="UPI Id">
                  <br>
                </div>
              </div>  
              <div class="col-md-12">
                <div class="control-group phonepe">
                  <a href="../user/documents/vendorqr/QR_code.png" class="pop"><img src="../user/documents/vendorqr/QR_code.png"  class="img-thumbnail ms-5" style="width: 200px !important;" id="scanner" alt="Admin Image"></a>
                </div>
              </div>
              <br>
              <div class="col-12">
              <?php if($grand_total==0) { echo"Your Amount is 0. Please Place an order to proceed.";?> <div class="carousel-btn"><a class="btn custom-btn" href="menu.php">View Menu</a></div> <?php } else{ ?><input type="submit" name="submit" value="Place Order" class="btn btn-warning text-light w-100 py-3 "><?php } ?>
              </div>
            </div>
        </form>
      </div>
    </div>
</div>
</div>
<?php include('footer.php');?>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the db
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: '../backend_php/order_det.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: '../backend_php/order.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });

  $(".deliver_add").hide();
  $("#delivery").change(function(){
        var group = $("#delivery").val();
        if(group=="Deliver order"){
            $(".deliver_add").show();
            $("#address").prop('required',true);
        }else {
          $(".deliver_add").hide();
        }
    });

   
  $(".phonepe").hide();
  $("#pmode").change(function(){
        var group = $("#pmode").val();
        if(group=="gpay"){          
            $(".phonepe").show();
            $("#upi").prop('required',false);
            $("#scanner").prop('required',false);
                
        }else {
            $(".phonepe").hide();
           
        }
    });
 
    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#delivery_date').attr('min', maxDate);
});

</script>
</body>

</html>