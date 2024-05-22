<?php
include("header.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
 
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $filename = $_FILES["uploadimg"]["name"];
    $tempname = $_FILES["uploadimg"]["tmp_name"];
    $folder = "profiles/" . $filename;
    move_uploaded_file($tempname, $folder);

    if ($password == $cpassword) {
        // Assuming $con is your database connection
        $query = "INSERT INTO `users`(`f_name`, `l_name`,  `email`, `contact`, `gender`, `image`, `dob`, `password`) 
                  VALUES ('$f_name', '$l_name',  '$email', '$contact', '$gender', '$filename', '$dob', '$password')";


        $run = mysqli_query($con, $query);

        if ($run) {
            $confirmation_message = "Successfully registered!";
        } else {
            $error_message = "Error: " . mysqli_error($con);
        }
    } else {
        $error_message = "Password and Confirm Password do not match!";
    }
}
?>

<!-- Your HTML code remains the same -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div align="center">
    <div class="container mt-5">
      <div class="card shadow-lg p-4" style="max-width: 500px; margin: auto;">
        <h2 class="text-center mb-4">Registration</h2>
        <?php if (isset($confirmation_message)) : ?>
          <div class="alert alert-success">
            <?php echo $confirmation_message; ?>
          </div>
        <?php endif; ?>
        <?php if (isset($error_message)) : ?>
          <div class="alert alert-danger">
            <?php echo $error_message; ?>
          </div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">

           <div class="form-group">
            <label for="f_name">First Name:*</label>
            <input type="text" name="f_name" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="l_name">Last Name:*</label>
            <input type="text" name="l_name" class="form-control" required>
          </div>




          <div class="form-group">
            <label for="email">UserID/Email:*</label>
            <input type="email" name="email" class="form-control" placeholder="name@gmail.com" required>
          </div>
          <div class="form-group">
            <label for="contact">Contact no:</label>
            <input type="tel" name="contact" class="form-control">
          </div>
          <div class="form-group">
            <label for="gender">Gender:*</label>
            <select name="gender" title="gender" required class="form-control">
              <option value="">-- Select Gender --</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="uploadimg">Picture:</label>
            <input type="file" name="uploadimg" class="form-control-file">
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth:*</label>
            <input type="date" name="dob" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password">Password:*</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="cpassword">Confirm Password:*</label>
            <input type="password" name="cpassword" class="form-control" required>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
