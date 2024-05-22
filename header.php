<?php
include("dbconnection.php");
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Forms</title>
  <!-- Bootstrap links -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   
  <!-- Font Awesome CSS (for icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #f6f6f6;">
  
  <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="box-shadow: 1px 2px 4px 1px rgba(0, 0, 0, 0.5);">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <span class="font-weight-bold" style="font-size: 24px;">Online Forms</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-danger text-white" href="signup.php"><i class="fa fa-user-plus"></i> Sign up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  

  <!-- Bootstrap JS (required for responsive navigation and other components) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
