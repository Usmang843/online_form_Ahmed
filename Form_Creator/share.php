<?php
include("header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1="SELECT * FROM `forms` WHERE `id`='$id'";
    $run1=mysqli_query($con,$query1);
    $data1=mysqli_fetch_assoc($run1);
    $token=$data1['token'];
    $base_url = "http://localhost/Online%20Form/online_form_/form.php?token=9raoj86a";
    // echo $base_url;
}
?>



<div align="center">
<div class="container">
  <br>
  <br>


<div class="alert alert-light" style="border:solid">
  <h2><span class="badge badge-primary">Form Link</span></h2>
<table class="table table-striped table-sm">
<tr>
<td><input type="text" name="title" class="form-control" required value="<?php echo $base_url;?>"></td></tr>
<tr>
<td>
	<a class="btn btn-success" href="mailto:support@example.com?subject=Fill%20Online%20Form&body=Click%20on%20this%20link%20and%20fill%20form%20<?php echo $base_url; ?>%20thank%20you">Email</a>

</td></tr>
</table>
</div>

</div>
</div>









</body>
</html>