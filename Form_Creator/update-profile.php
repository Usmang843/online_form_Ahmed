<?php
include("header.php");

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
}

$query2="SELECT * FROM `users` WHERE id='$user_id'";
$run2=mysqli_query($con,$query2);
$data=mysqli_fetch_assoc($run2);



if(isset($_POST['submit']))
{
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$query1="UPDATE `users` SET `f_name`='$f_name',`l_name`='$l_name',`email`='$email',`contact`='$contact',`gender`='$gender',`dob`='$dob' WHERE `id`='$user_id'";
    $run1=mysqli_query($con,$query1);
if(isset($run1)){
  echo "<script>alert('Record has been Successfully Updated!')</script>";
  echo "<script>window.open('update-profile.php?id=$user_id','_self')</script>";
  //exit();
}
else{
  echo "<script>alert('unknown error!')</script>";
  echo "<script>window.open('update-profile.php?id=$user_id','_self')</script>";
  //exit();
}
}
if(isset($_POST['submit1']))
{
$filename=$_FILES["uploadimg"]["name"];
$tempname=$_FILES["uploadimg"]["tmp_name"];
$folder="../profiles/".$filename;
move_uploaded_file($tempname,$folder);
$query2="UPDATE `users` SET `image`='$filename' WHERE `id`='$user_id'";
    $run2=mysqli_query($con,$query2);
if(isset($run2)){
  echo "<script>alert('Picture has been Successfully Updated!')</script>";
  echo "<script>window.open('update-profile.php?id=$user_id','self')</script>";
  exit();
}
else{
  echo "<script>alert('unknown error!')</script>";
 echo "<script>window.open('update-profile.php?id=$user_id','self')</script>";
  //exit();
}
}


?>

<div class="container mt-5">
    <h1 class="mb-4"><span class="badge badge-dark">Update Profile</span></h1>
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            <form method="post" enctype="multipart/form-data">
                <div class="card shadow">
                    
                    <div class="profile-image p-2">
                        <img id="blah" class="card-img-top rounded-circle" src='<?php echo "../profiles/".$data['image']; ?>' alt="Profile Image" style="width: 150px; height: 150px;">
                    </div>
                    <div class="card-body">
                        <input type="file" name="uploadimg" value="Chosse File" class="form-control mb-2" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <button type="submit" name="submit1" class="form-control btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Profile Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="bg-light">Name</th>
                            <td><?php echo $data['f_name']." ".$data['l_name']; ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">User ID</th>
                            <td><?php echo $data['email']; ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Contact</th>
                            <td><?php echo $data['contact']; ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Date of Birth</th>
                            <td><?php echo $data['dob']; ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Gender</th>
                            <td><?php echo $data['gender']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($data['id'] == $user_id) {
        echo '<a href="update-profile.php?id='.$data['id'].'" class="btn btn-warning mt-4">Update Profile</a>';
    }
    ?>
</div>









</body>
</html>