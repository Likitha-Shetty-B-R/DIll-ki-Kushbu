<?php
include('layouthead.php'); 

include('../backend_php/config.php');

?>

<div class="page-header mb-0">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <h2>Cart Items</h2>
          </div>
          <div class="col-12">
              <a href="index.php">Home</a>
              <a href="menu.php">Menu</a>
          </div>
      </div>
  </div>
</div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center m-0">Flowers in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <?php
                $stmt = "SELECT * FROM cart where user_id=$key_code";
                $res=mysqli_query($conn,$stmt);
                while($data = mysqli_fetch_array($res))
                {
                  $ppid=$data['product_id'];
                }
              ?>
               <?php 
                if(empty($ppid)) 
                { 
                  ?>                        
                  <th></th>               
                  <?php 
                  } 
                  else 
                  { 
                    ?>
                    <th>
                    <a href="../backend_php/order.php?clear=all" class="badge-primary bg-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Remove All</a>
                  </th>               
                <?php } ?>
                
              </tr>
            </thead>
            <tbody>
              <?php
                $stmt = $conn->prepare("SELECT * FROM cart where user_id=$key_code");
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <input type="hidden" class="uid" value="<?php echo $key_code ?>">
                <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                <td><img src="documents/products/<?php echo $row['image'];?>" width="50"></td>
                <td><?php echo $row['product_name'] ?></td>
                <td>
                  <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?php echo number_format($row['price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" min="1"value="<?php echo $row['qty'] ?>" style="width:75px;">
                </td>
                <td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?php echo number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="../backend_php/order.php?remove=<?php echo $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="menu.php" class="btn btn-warning text-light"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add
                    More</a>
                </td>
                <td colspan="2"><b>Gross Total</b></td>
                <td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?php echo number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-success <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Pay Now</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> -->
  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');
     
      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: '../backend_php/order.php',
        method: 'post',
        cache: false,
        data: {
         
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
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
  </script>
</body>

</html>