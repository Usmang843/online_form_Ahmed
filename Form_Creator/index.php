<?php
session_start();
$user_id = $_SESSION["uid1"];
include("../dbconnection.php");
if (isset($user_id)) {

} else {
    header("location:../login.php");
    exit();
}

$query4 = "SELECT * FROM `users` WHERE id='$user_id'";
$run4 = mysqli_query($con, $query4);
$data4 = mysqli_fetch_assoc($run4);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Online Forms</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #f6f6f6;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light" style="box-shadow: 1px 2px 4px 1px rgba(0, 0, 0, 0.5);">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="font-weight-bold" style="font-size:24px;">Online Forms</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user-detail.php?view=<?php echo $user_id; ?>">
                            <img src="<?php echo "../profiles/" . $data4['image']; ?>" alt="Profile Image" style="height: 30px; width: 30px; border-radius: 50%; margin-right: 5px;">
                            <?php echo $data4['f_name'] . " " . $data4['l_name']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fa fa-sign-out-alt"></i> Logout
                        </a>
 
         
                    </li>

                     <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>

                      <li class="nav-item">
                        <a class="nav-link" href="add_form.php">
                            <i class=""></i> Add New Form
                        </a>
                    </li>

                        <li class="nav-item">
                        <a class="nav-link" href="forms.php">
                            <i class=""></i> My Form
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Dashboard Content -->
        <h1 class="text-center">Welcome to Admin Dashboard</h1>
        <hr>
        <!-- Add your dashboard content here -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
