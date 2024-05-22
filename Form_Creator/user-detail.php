<!-- user-detail.php -->
<?php
include("header.php");

if (isset($_GET['id'])) {
  $user_id = $_GET['id'];
}

$query = "SELECT * FROM `users` WHERE id='$user_id'";
$run = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($run);

?>

<div class="container">
  <div class="row justify-content-center"> <!-- Center the form -->
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h5 class="card-title mb-0">Profile Information</h5>
        </div>
        <div class="card-body">
          <div class="profile-image" style="border-radius: 50%; overflow: hidden; margin-bottom: 20px;">
            <img src="<?php echo "../profiles/".$data['image']; ?>" alt="Profile Image" style="width: 100%;">
          </div>
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
    echo '<div class="text-center mt-3"><a href="update-profile.php?id='.$data['id'].'" class="btn btn-warning">Update Profile</a></div>';
  }
  ?>
</div>

</body>
</html>
