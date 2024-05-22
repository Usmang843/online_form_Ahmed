<?php
include("header.php");

$query1 = "SELECT * FROM `forms` WHERE `user_id` = '$user_id'";
$run1 = mysqli_query($con, $query1);
$rows = mysqli_num_rows($run1);
if ($rows >= 10) {
    echo "<script>alert('You are allowed to create only 10 Forms!')</script>";
    echo "<script>window.open('forms.php','_self')</script>";
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $last_date = $_POST['last_date'];
    // Generate token
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $token = '';
    $length = 8;
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }

    $query = "INSERT INTO `forms`(`title`, `last_date`, `user_id`, `status`, `token`) VALUES ('$title','$last_date','$user_id','Active','$token')";
    $run = mysqli_query($con, $query);
    if (isset($run)) {
        $lastInsertedId = mysqli_insert_id($con);
        echo "<script>alert('Successfully added!')</script>";
        echo "<script>window.open('add_form_questions.php?id=$lastInsertedId','_self')</script>";
        exit();
    } else {
        echo "<script>alert('Unknown error!')</script>";
        exit();
    }
}
?>

<div align="center">
    <div class="container">
        <br>
        <br>

        <form method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Add Form</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Form Title:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="last_date">Last Date/Time:</label>
                        <input type="datetime-local" name="last_date" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
