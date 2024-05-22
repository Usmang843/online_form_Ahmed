<?php
include("header.php");

$query1="SELECT * FROM `forms` WHERE `user_id` = '$user_id'";
$run1=mysqli_query($con,$query1);



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1="DELETE FROM `forms` WHERE `id`='$id'";
    $run1=mysqli_query($con,$query1);
    if(isset($run1)){
       echo "<script>alert('Successfully deleted!')</script>";
       echo "<script>window.open('forms.php','_self')</script>";
     }
     else{
       echo "<script>alert('unknown error!')</script>";
       echo "<script>window.open('forms.php','_self')</script>";
     }
}

?>




<h2 style="text-align: center;"><span class="badge badge-primary">My Created  Forms</span></h2>

<div class="alert alert-light" style="border:solid" style="">
  <div style="margin-left: px;">
<table align="center" class="table table-striped table-sm">
<tr>
<th>Form Title</th>
<th>Created At</th>
<th>Last Date</th>
<th>Status</th>
<th>Action</th>
</tr>


<?php 
       if ($run1==TRUE)
         {
       while($data=mysqli_fetch_array($run1))
       { 

        ?>
            <tr>
         <td><?php echo $data['title']; ?></td>
         <td><?php echo $data['created_at']; ?></td>
         <td><?php echo $data['last_date']; ?></td>
         <td><?php echo $data['status']; ?></td>
         
         
         <td><a href="form_detail.php?id=<?php echo $data['id']; ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="add_form_questions.php?id=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="?id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a><a href="share.php?id=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fa fa-share" aria-hidden="true"></i></a>
         </td>


         
         


         </tr>
<?php  
       }
     }
     ?>
         

         
      
        </table>
       
     </div>
     

    </div>











</body>
</html>