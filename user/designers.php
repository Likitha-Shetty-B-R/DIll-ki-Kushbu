<?php 
include('layouthead.php'); 
include('../backend_php/config.php');


?>   
<!-- Page Header Start -->
<div class="page-header mb-0">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <h2>Best Flower Vendors</h2>
          </div>
          <div class="col-12">
              <a href="index.php">Home</a>
              <a href="designers.php">Top Vendors</a>
          </div>
      </div>
  </div>
</div>
       <!-- Team Start -->
       <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Team</p>
                    <h2>Our Best Flower Designers</h2>
                </div>
                <div class="row">
                <?php
                            $query="SELECT l.name,p.image,p.description,p.flower_name from top_designer p INNER JOIN login l ON l.id = p.vendor_id";
                            $result = mysqli_query($conn,$query);
                            $a=0;
                            while($data = mysqli_fetch_array($result))
                            {                                               
                        ?>
                    <div class="col-lg-3 col-md-6">
                       
                        <div class="team-item">
                            <div class="team-img">
                            <img src="documents/topdesigner/<?php echo $data['image'];?>" class="rounded" alt="Admin Image" style="with:30rem; height:15rem;">
                                <!--<div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>-->
                            </div>
                            <div class="team-text">
                                <h2><?php echo $data['flower_name'] ?></h2>
                                <p><b><?php echo $data['name'] ?></b></p>
                                <p style="text-align: justify;"><?php echo $data['description']?></p>
                            </div>
                        </div>
                      
                    </div>
                    <?php
                            }
                        ?>
                </div>
            </div>
        </div>
        <!-- Team End -->
        <?php include('footer.php'); ?>
  