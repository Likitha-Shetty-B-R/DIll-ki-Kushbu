
<?php 
include('layouthead.php'); 
include('../backend_php/config.php');

$keycode=$_GET["key"];
$query="SELECT p.product_name,p.category_id,p.user_id,p.code,p.price,p.description,p.image,p.id,p.image,p.product_color,p.deliver_number,v.vendor_name,v.shop_name,v.vendor_num,v.vendor_add from vendor_register v INNER JOIN products p ON  p.user_id=v.user_id WHERE p.id = '$keycode'";
$result = mysqli_query($conn,$query);
while($data = mysqli_fetch_array($result))
{
  $keycode=$data['id'];
  $Vendorid=$data['user_id'];
  $prodname=$data['product_name'];
  $prodcode=$data['code'];
  $prod_price=$data['price'];
  $prod_desc=$data['description'];
  $prod_image=$data['image'];
  $number=$data['deliver_number'];
  $vendor_name=$data['vendor_name'];
  $shop_name=$data['shop_name'];
  $vendor_num=$data['vendor_num'];
  $vendor_add=$data['vendor_add'];
  $product_color=$data['product_color'];
}

?>
     <!-- Page Header Start -->
     <div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Book A Bouquet/Flower</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="cart.php">Booking</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <div class="booking mt-3">
            <div class="container">
              <form action="" class="form-submit">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="booking-content">
                            <div class="section-header">
                                
                                <h2><?php echo $prodname ?></h2>
                                <p>₹ .<?php echo number_format($prod_price,2) ?></p>
                            </div>
                            <div class="about-text">
                                <p>
                                <?php echo $prod_desc ?>
                                </p>
                                <p><b>Product Color:</b> <?php echo $product_color; ?></p>
                                  <div class="col-md-2 py-1">
                                    
                                    <label>Qty:</label><input type="number" min="1" class="form-control pqty mb-2" value="1" required>
                                    </div>
                                    <button class="btn addItemBtn custom-btn" type="submit">Add to
                                    cart</button><br><hr>
                                    <h2>For More Info Contact Vendor</h2>
                                    <div  class="text-dark">
                                      <p><b>Shop Name:</b> <?php echo $shop_name?></p>
                                      <p><b>Vendor Name:</b> <?php echo $vendor_name?></p>
                                      <p><b>Vendor Number:</b> <?php echo $vendor_num?></p>
                                      <p><b>Vendor Address:</b> <?php echo $vendor_add?></p>
                                    </div>
                                    
                            </div>
                            <input type="hidden" class="uid" value="<?php echo $key_code ?>">
                                <input type="hidden" class="pid" value="<?php echo $keycode ?>">
                                <input type="hidden" class="vid" value="<?php echo $Vendorid ?>">
                                <input type="hidden" class="pname" value="<?php echo $prodname ?>">
                                <input type="hidden" class="pprice" value="<?php echo $prod_price ?>">
                                <input type="hidden" class="pimage" value="<?php echo $prod_image ?>">
                                <input type="hidden" class="pcode" value="<?php echo $prodcode ?>">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div>
                        <a href="documents/products/<?php echo $prod_image;?>"><img class="flex-shrink-0 img-fluid rounded" src="documents/products/<?php echo $prod_image;?>" alt=""  style="width:100%; object-fit:cover; height:400px" ></a>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
        <!-- Booking End -->   
    
<?php include('footer.php'); ?>

<script type="text/javascript">
  $(document).ready(function() {
//send products details
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var uid = $form.find(".uid").val();
      var pid = $form.find(".pid").val();
      var vid = $form.find(".vid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();
     
      $.ajax({
        url: '../backend_php/order.php',
        method: 'post',
        data: {
          uid:uid,
          pid: pid,
          vid: vid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // total no.of items added in the cart and display 
    load_cart_item_number();
   
    function load_cart_item_number() {
      $.ajax({
        url: '../backend_php/order.php',
        method: 'get',
        data: {
         
          cartItem: "cart_item"
        },
        success: function(response) {
          // $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
