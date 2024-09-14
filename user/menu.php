<?php 
include('layouthead.php'); 
include('../backend_php/config.php');

$result1 = mysqli_query($conn,"SELECT * FROM cart where `user_id` = '$key_code'");
$row = mysqli_num_rows($result1);

?>
<!-- Page Header Start -->
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
        <!-- Page Header End -->
<!-- Ocassions Start -->
  <div class="food">
    <div style="text-align: center;" class="section-header">
        <h2 style="color:darkgoldenrod;">Occasional Flowers</h2>
    </div>
    
      <div class="container">
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
        <div class="row align-items-center">
          <?php
            $query = "SELECT DISTINCT(p.category_id),c.category_image,p.id FROM products p INNER JOIN category c on  p.category_id=c.category_name group by p.category_id ";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $data)
            {       
          ?>
          <div class="col-md-4">
            <div class="food-item">
                <div>
                    <img src="../user/documents/category/<?php echo $data['category_image'];?>" alt="Image">
                </div>
                <br>
                <h2><?php echo $data['category_id'];?></h2>
               
                <a href="flowers.php?key=<?php echo $data['category_id']; ?>">View Menu</a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
  </div>
        <!-- Menu Start -->

         <!-- Menu Start -->
        

<?php include('footer.php'); ?>
  
