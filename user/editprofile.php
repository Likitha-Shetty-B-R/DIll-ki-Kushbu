<?php
include('layouthead.php'); 

include('../backend_php/config.php');

  $stmt = "SELECT * FROM login where `email` = '$user'";
  $result = mysqli_query($conn,$stmt);
  while($data = mysqli_fetch_array($result))
  {
    $key_code=$data['id'];
    $Uname=$data['name'];
    $emal=$data['email'];
    $number=$data['number'];
    $address=$data['address'];
  }

?>

<style>
    
  </style>
  <body>
  
  <div class="page-header mb-0">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <h2>Edit Profile</h2>
          </div>
          <div class="col-12">
              <a href="index.php">Home</a>
              <a href="editprofile.php">Profile</a>
          </div>
      </div>
  </div>
</div>
  <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      </div>
      <div class="row g-6 justify-content-center">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" id="order"> 
          <form action="../backend_php/updateProfile.php?key=<?php echo $key_code; ?>" method="post" id="placeOrder">      
            <div class="row g-3">           
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" id="trans_id"  placeholder="Name" name="name" class="form-control" value="<?php echo $Uname; ?>"required>
                  <br>
                </div>
              </div>  
              <div class="col-md-12">
                  <div class="control-group">
                        <input type="text" id="trans_id" pattern="[6789][0-9]{9}" title="Must contain 10 digits or Invalid Phone number" minlength="10" maxlength="10"required name="phone" class="form-control" value="<?php echo $number; ?>" >
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
              <input type="text" name="address" id="address" required class="form-control" placeholder="Enter Address" required autocomplete="off"  value="<?php echo $address ?>">
                  <br>
                </div>
              </div>
              <div class="col-12">
                <input type="submit" name="user_submit" value="Update Profile" class="btn btn-warning text-light w-100 py-3">
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
 
</body>

</html>