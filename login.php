<?php
include("header.php");
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow-lg">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Log In</h2>
          <form method="post">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" required class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="psw">Password:</label>
              <input type="password" name="psw" required class="form-control" id="psw">
            </div>
            <div class="form-group text-center">
              <button type="submit" name="done" class="btn btn-primary">Log In</button>
            </div>
          </form>
          <div class="text-center">
            <a href="signup.php">Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap CSS and JS links -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<?php
if (isset($_POST["done"])) {
  $email = $_POST["email"];
  $pass = $_POST["psw"];

  $query1 = "SELECT * FROM `users` WHERE  email='$email' AND password='$pass'";
  $run1 = mysqli_query($con, $query1);

  $row1 = mysqli_num_rows($run1);

  if ($row1 > 0) {
    $data1 = mysqli_fetch_assoc($run1);
    $id1 = $data1['id'];
    $_SESSION['uid1'] = $id1;
    header("location:Form_Creator/index.php");
  } else {
    echo "<script>alert('User name OR Password is invalid')</script>";
  }
}
?>
