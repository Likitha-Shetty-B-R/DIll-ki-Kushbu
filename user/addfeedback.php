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
}
?>
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Feedback</h2>
            </div>
            <div class="col-12">
                <a href="index.php">Home</a>
                <a href="addfeedback.php">Add Feedback</a>
            </div>
        </div>
    </div>
</div>
            <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-warning fw-normal">Feedbacks</h5>
                    <h1 class="mb-5">We'd love to hear from you !</h1>                    
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form id="contact-form" method="POST" action="../backend_php/vendorregister.php?action=InsertFeedback"  enctype="multipart/form-data">
                        <input type="hidden" name="uid" value="<?php echo $key_code ?>">
                            <div class="row g-3"> 
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                        <input type="text" class="form-control"  name="name" placeholder="Name"  autocomplete="off" value="<?php echo $Uname ?>" readonly>
                                        <br>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $emal ?>" readonly class="form-control">
                                            <br>
                                        </div>
                                    </div>
                                                              
                                   
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control"  required title="Enter your feedback"name="feedback" placeholder=" Feedback :" style="height: 100px"></textarea>
                                          <br>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12">
                                        <button class="btn custom-btn w-100 py-3"  name="SignUp" type="submit">Submit</button>
                                    </div>                                 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('footer.php') ?>