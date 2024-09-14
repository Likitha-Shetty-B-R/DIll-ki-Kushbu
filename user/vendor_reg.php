<?php 
include('layouthead.php');

include('../backend_php/config.php');
$stmt = "SELECT * FROM login where `email` = '$user'";
$result = mysqli_query($conn,$stmt);
while($data = mysqli_fetch_array($result))
{
  $key_code=$data['id'];
  $Uname=$data['name'];
  $add=$data['address'];
  $num=$data['number'];
}
?>
<!-- Page Header Start -->
<div class="page-header">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Vendor Form</h2>
        </div>
        <div class="col-12">
            <a href="index.php">Home</a>
            <a href="vendor_reg.php">Vendor</a>
        </div>
    </div>
</div>
</div>
<!-- Contact Start -->
<div class="contact">
<div class="container">    
    <div class="section-header text-center">
        <p>Register now</p>       
    </div>
                
    <div class="row contact-form justify-content-center">                   
        <div class="col-md-6">
            <div id="success"></div>
            <form id="contact-form" method="POST" action="../backend_php/vendorregister.php?action=Insertvendors"  enctype="multipart/form-data">
            <input type="hidden" name="uid" value="<?php echo $key_code ?>">
                    <div class="row g-3"> 
                        <div class="col-12">
                            <div class="control-group">
                                <input type="text"  class="form-control" name="sname" placeholder="Name" pattern="[a-zA-Z\s]+" autocomplete="off" required>
                                <label for="subject">Shop Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                            <input type="text" class="form-control"  name="name" placeholder="Name"  required autocomplete="off" readonly value="<?php echo $Uname ?>">
                                <label for="email">Vendor Name</label>
                            </div>
                        </div>                  
                        <div class="col-md-6">
                            <div class="control-group">
                            <input type="text"  class="form-control" name="number" pattern="[6789][0-9]{9}" title="Must contain 10 digits or Invalid Phone number" minlength="10" maxlength="10"required placeholder="Phone:" value="<?php echo $num ?>">
                                <label for="email">Your Phone Number</label>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="control-group">
                                <textarea class="form-control"  required name="address" placeholder=" Shop Address : <?php echo"\n"?> Transportation charges per km" style="height: 100px"></textarea>
                                <label for="subject">Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                         <div class="control-group">
                                <input  type="file" class="form-control" name="b_file" required>
                                <span class="text-danger">Note: Upload Adhaar Card</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <input  type="file" class="form-control" name="N_file" required>
                                <span class="text-danger">Note: Upload License Document</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="control-group">
                                <input  type="file" class="form-control" name="Q_file" required>
                                <span class="text-danger">Note: Upload QR Code</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                        </div>                                 
                    </div>
            </form>
        </div>
    </div>
</div>
</div>


<?php include('footer.php') ?>