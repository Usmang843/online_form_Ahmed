<?php
include("header.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $query1="SELECT * FROM `forms` WHERE `token`='$token'";
    $run1=mysqli_query($con,$query1);
    $data1=mysqli_fetch_assoc($run1);
    $id = $data1['id'];
}

if(isset($_POST['submit']))
{	

	$name=$_POST['name'];
	$email=$_POST['email'];
$fields=$_POST['field'];


$query="INSERT INTO `answer_by`(`name`, `email`, `form_id`) VALUES ('$name','$email','$id')";
  $run=mysqli_query($con,$query);

if(isset($run)){
  $lastInsertedId = mysqli_insert_id($con);
  foreach ($fields as $key => $field) {
  	if(!empty($field)){
		if(is_array($field)){
			$field = implode(', ', $field);
		}
		$quer2="INSERT INTO `answers`(`form_id`, `question_id`, `answer`, `answer_by_id`) VALUES ('$id','$key','$field','$lastInsertedId')";
        $ru2=mysqli_query($con,$quer2);
        }
	}  
  
    echo "<script>alert('Successfully Submitted.')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();
  }


}
?>



<div align="center">
<div class="container">
  <br>
  <br>

<form method="post" enctype="multipart/form-data">
<div class="alert alert-light" style="border:solid">
  <h2><span class="badge badge-dark">Online Form</span></h2>
<table class="table table-striped table-sm">
	<td>Your Name:*</td>
<td><input type="text" name="name" class="form-control" required></td></tr>
<tr><td>UserID/Email:*</td>
<td><input type="email" name="email" class="form-control" placeholder="name@gmail.com" required></td></tr>
<tr><td>Form Title:*</td>
<td><input type="text" name="title" class="form-control" readonly value="<?php echo $data1['title']; ?>"></td></tr>
<tr><td>Last Date/Time:*</td>
<td><input type="text" name="last_date" class="form-control" readonly value="<?php echo $data1['last_date']; ?>"></td></tr>


<tr>

<?php
    $query="SELECT * FROM `questions` WHERE `form_id`='$id'";
    $run=mysqli_query($con,$query); 
    $question_count=mysqli_num_rows($run);
       if ($run==TRUE)
         {
       while($data=mysqli_fetch_array($run))
       { 

        ?>
            <tr>
         <td><?php echo $data['question']; ?></td>
         <td>
         	<?php
         	$question_id = $data['id'];
         	if($data['type']=="Short Text"){
         		echo '<input type="text" class="form-control" name="field['.$question_id.']">';
         	}elseif($data['type']=="Long Text"){
         		echo '<textarea type="text" class="form-control" name="field['.$question_id.']"></textarea>';
         	}elseif($data['type']=="Dropdown Fields"){
         		echo '<select name="field['.$question_id.']" required class="form-control">';
         		$query3="SELECT * FROM `question_detail` WHERE `form_id`='$id' AND `question_id`='$question_id'";
                  $run3=mysqli_query($con,$query3); 
                     if ($run3==TRUE)
                       {
                     while($data3=mysqli_fetch_array($run3))
                     { 
                      $field_option = $data3['field_option'];
                      echo '<option value="'.$field_option.'">'.$field_option.'</option>';

                     }
                   }
                   echo '</select>';
         	}elseif($data['type']=="Checkboxes"){
         		
         		$query3="SELECT * FROM `question_detail` WHERE `form_id`='$id' AND `question_id`='$question_id'";
                  $run3=mysqli_query($con,$query3); 
                     if ($run3==TRUE)
                       {
                     while($data3=mysqli_fetch_array($run3))
                     { 
                      $field_option = $data3['field_option'];
                      echo '<input type="checkbox" name="field['.$question_id.'][]" value="'.$field_option.'">';
                      echo $field_option;
                      echo "<br>";

                     }
                   }
         	}
         	elseif($data['type']=="Radio Button Fields"){
         		
         		$query3="SELECT * FROM `question_detail` WHERE `form_id`='$id' AND `question_id`='$question_id'";
                  $run3=mysqli_query($con,$query3); 
                     if ($run3==TRUE)
                       {
                     while($data3=mysqli_fetch_array($run3))
                     { 
                      $field_option = $data3['field_option'];
                      
                      echo '<input type="radio" name="field['.$question_id.']" required value="'.$field_option.'">';
                      echo $field_option;
                      echo "<br>";

                     }
                   }
         	}



         	?>

         </td>

         </tr>
<?php  
       }
     }
     ?>
	
</tr>
<tr><td></td>
<td><br><div ><button type="submit" name="submit" class="btn btn-primary">Submit</button></div><br><br></td></tr>
</table>
</div>
</form>
</div>
</div>









</body>
</html>