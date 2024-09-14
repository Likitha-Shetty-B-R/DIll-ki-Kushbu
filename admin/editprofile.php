<?php
session_start();
include('../backend_php/config.php');
$user=$_SESSION["email"];
if(!($user=="admin@gmail.com")){
  header("Location:../index.php");
}

$query="SELECT * from login WHERE email = '$user'";
$result = mysqli_query($conn,$query);
while($data = mysqli_fetch_array($result))
{
  $key_code=$data['id'];
  $Name=$data['name'];
  $dateofbirt=$data['dob'];
  $adss=$data['address'];
  $phone=$data['number'];
  $Email=$data['email'];
}

?>
<?php include("layout_head.php"); ?>

<!-- Page Container START -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Profile</h4>                                       
                            </div>
                            <div class="card-body p-4"> 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form id="change-pass" action="../backend_php/updateProfile.php?key=<?php echo $key_code; ?>" method="POST" enctype="multipart/form-data">
                                        <div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Name</label>
                                            
                                                <input type="text" class="form-control" name="name" placeholder="Enter the Name" required value="<?php echo $Name; ?>">
                                            </div>  
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">DOB</label>                                       
                                                <input type="date" class="form-control" name="dob" placeholder="Enter the Date Of Birth" required value="<?php echo $dateofbirt;?>">
                                            </div>                                   
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Address</label>                                        
                                                <input type="text" class="form-control" name="address" placeholder="Enter the Address" required value="<?php echo $adss;?>">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Contact No</label>                                        
                                                <input type="text" class="form-control" name="contact" placeholder="Enter the Contact Number" required value="<?php echo $phone;?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Email</label>                                       
                                                <input type="email" class="form-control" name="ed_email" placeholder="Enter the Email" required value="<?php echo $Email; ?>" readonly>
                                            </div>
                                            <div class="mb-3 mt-5" style="margin-left:20rem">
                                                <button type="submit" class="btn btn-primary" id="updateprofile" name="updateprofile">Update Profile</button>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
        </div>
    </div>
</div>
<?php include('footer.php')?>