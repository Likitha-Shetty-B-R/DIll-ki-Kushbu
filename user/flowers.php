<?php 
include('layouthead.php'); 
include('../backend_php/config.php');

$result1 = mysqli_query($conn,"SELECT * FROM cart where `user_id` = '$key_code'");
$row = mysqli_num_rows($result1);

$keycode=$_GET["key"];

?>
<div class="page-header mb-0">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <h2>Flower Menu</h2>
          </div>
          <div class="col-12">
              <a href="index.php">Home</a>
              <a href="menu.php">Menu</a>
          </div>
      </div>
  </div>
</div>
<div class="menu">
            <div class="container">
                <div class="section-header text-center mt-5 pt-3">
                    <p>Flower Menu</p>
                    <h2>Best Quality Flowers Menu</h2>
                </div>
                <div class="menu-tab">
                    <!-- <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#wedding">Wedding Flowers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#valentines">Valentine’s Day Flowers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#special">Special Occasional Flowers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#birthday">Birthday Blooms</a>
                        </li>
                    </ul> -->
                    <div class="tab-content">
                        <div id="wedding" class="container tab-pane active">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="flex-row-reverse  text-end d-flex mb-4 me-5">
                            <a class="fs-6 fw-bold" href="checkout.php"><i class="fas fa-money-check-alt fs-4 ms-4 pe-2 bellicon"></i>Checkout</a>
                            <a class="" href="cart.php"><i class="fas fa-shopping-cart fs-5 bellicon"></i> <span id="cart-item" class="text-light bg-success px-2 fw-bold mt-5 mr-2"><?php  echo $row; ?></span></a>
                            </div>
                            <div class="row g-4 filter_data ">
                            <div class="col-lg-6 col-6">
                                <div class="d-flex align-items-center ">
                                
                                </div>
                            </div>
                            </div> 
                        </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    <?php
                                    $query="SELECT * from products WHERE category_id = '$keycode'";
                                    $result = mysqli_query($conn,$query);
                                    $a=0;
                                    while($data = mysqli_fetch_array($result))
                                    {
                                                                                   
                                    ?>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                        <a href="documents/products/<?php echo $data['image'];?>"><img src="documents/products/<?php echo $data['image'];?>" alt="Image"></a>
                                         
                                        </div>
                                        <div class="menu-text">
                                            <h3><span><?php echo $data['product_name'] ?> </span></h3>
                                            <span class="d-flex justify-content-end">
                                               <p  class="pr-5 mr-5 text-success"><b>₹ .<?php echo number_format($data['price'],2)?></p></b>
                                                <p style="margin-left:20px !important;" ><a href="flower_det.php?key=<?php echo $data['id']; ?>"><b class="text-warning">Click Here For More Details >></b></a></p>  
                                            </span>
                                           
                                        </div>
                                    </div>
                                    <?php
                                        }
                                        ?>
                              
                                </div>
                                
                                <div class="col-lg-5 d-none d-lg-block">
                                    
                                    <img src="img/main_pics/occasion_wedding.jpg" alt="Image">
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <br>
            
        </div>
        <!-- Menu End -->
<?php include('footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    

//send products details
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var uid = $form.find(".uid").val();
      var pid = $form.find(".pid").val();
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


    var checkList = document.getElementById('list1');
checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
  if (checkList.classList.contains('visible'))
    checkList.classList.remove('visible');
  else
    checkList.classList.add('visible');
}
  });
  </script>

