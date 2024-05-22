<?php
include("header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1="SELECT * FROM `forms` WHERE `id`='$id'";
    $run1=mysqli_query($con,$query1);
    $data1=mysqli_fetch_assoc($run1);
}

if(isset($_POST['submit']))
{
$form_id=$_POST['form_id'];
$question=$_POST['question'];
$question_type=$_POST['question_type'];
$textFields=$_POST['textField'];

$query="INSERT INTO `questions`(`form_id`, `question`, `type`) VALUES ('$form_id','$question','$question_type')";
  $run=mysqli_query($con,$query);

if(isset($run)){
  $lastInsertedId = mysqli_insert_id($con);

    if($question_type=="Dropdown Fields" || $question_type=="Checkboxes" || $question_type=="Radio Button Fields"){
      foreach ($textFields as $key => $textField) {
        if(!empty($textField)){
        $quer2="INSERT INTO `question_detail`(`form_id`, `question_id`, `field_option`) VALUES ('$form_id','$lastInsertedId','$textField')";
        $ru2=mysqli_query($con,$quer2);
        }
      }
    }
  
    echo "<script>alert('Successfully Added.')</script>";
    echo "<script>window.open('add_form_questions.php?id=$form_id','_self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('add_form_questions.php?id=$form_id','_self')</script>";
    exit();
  }
}



if(isset($_POST['update']))
{
$title=$_POST['title'];
$last_date=$_POST['last_date'];
$query="UPDATE `forms` SET `title`='$title',`last_date`='$last_date' WHERE `id`='$id'";
  $run=mysqli_query($con,$query);
  if(isset($run)){
    echo "<script>alert('Successfully added!')</script>";
    echo "<script>window.open('add_form_questions.php?id=$id','_self')</script>";
    exit();
  }
  else{
    echo "<script>alert('unknown error!')</script>";
    echo "<script>window.open('add_form_questions.php?id=$id','_self')</script>";
    exit();
  }
}


if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $form_id = $_GET['form_id'];
    $query1="DELETE FROM `questions` WHERE `id`='$id'";
    $run1=mysqli_query($con,$query1);
    if(isset($run1)){
       echo "<script>alert('Successfully deleted!')</script>";
       echo "<script>window.open('add_form_questions.php?id=$form_id','_self')</script>";
     }
     else{
       echo "<script>alert('unknown error!')</script>";
       echo "<script>window.open('add_form_questions.php?id=$form_id','_self')</script>";
     }
}



?>



<div>
<div class="container">
  <br>
  <br>

<form method="post" enctype="multipart/form-data">
<div class="alert alert-light" style="border:solid">
  <h2><span class="badge badge-dark">Form Detail</span></h2>
<table class="table table-striped table-sm">
<tr><td>Form Title:*</td>
<td><input type="text" name="title" class="form-control" required value="<?php echo $data1['title'];?>"></td></tr>
<tr><td>Last Date/Time:</td>
<td><input type="datetime-local" name="last_date" class="form-control" value="<?php echo $data1['last_date'];?>"></td></tr>
<tr><td></td>
<td><br><div ><button type="submit" name="update" class="btn btn-warning">Update</button></div><br><br></td></tr>
</table>
</div>
</form>
<br>
<div class="alert alert-light" style="border:solid">
    <h2><span class="badge badge-dark">Questions</span></h2>
  <table class="table table-striped table-bordered table-sm">
    <thead class="thead-dark">
    <tr>
        <th>Question</th>
        <th>Type</th>
        <th>Fields</th>
        <th>Action</th>
    </tr>
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
         <td><?php echo $data['type']; ?></td>
         <td>
               <?php
               $question_id = $data['id'];
                  $query3="SELECT * FROM `question_detail` WHERE `form_id`='$id' AND `question_id`='$question_id'";
                  $run3=mysqli_query($con,$query3); 
                     if ($run3==TRUE)
                       {
                     while($data3=mysqli_fetch_array($run3))
                     { 
                      echo $data3['field_option'];
                      echo '<br>';
                     }
                   }
                   ?>
         </td>
         <td>
          <a href="?del_id=<?php echo $data['id']; ?>&form_id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
         </td>

         </tr>
<?php  
       }
     }
     ?>

    </thead>
  </table>

</div>  

<?php
if($question_count<10){
?>
<form method="post" enctype="multipart/form-data">
  <input type="text" name="form_id" class="form-control" hidden value="<?php echo $data1['id'];?>">
  <div class="alert alert-light" style="border:solid">
    <h2><span class="badge badge-dark">Add Question</span></h2>
    <table class="table table-striped table-sm" id="dynamic-form">
      <tr>
        <td>Question:*</td>
        <td><input type="text" name="question" class="form-control" required></td>
      </tr>
      <tr>
        <td>Question Type*</td>
        <td>
          <select name="question_type" title="question_type" required="" class="form-control access-dropdown">
            <option value="Short Text">Short Text</option>
            <option value="Long Text">Long Text</option>
            <option value="Dropdown Fields">Dropdown Fields</option>
            <option value="Checkboxes">Checkboxes</option>
            <option value="Radio Button Fields">Radio Button Fields</option>
          </select>
        </td>
      </tr>
    </table>
<button type="submit" name="submit" class="btn btn-primary">Add</button>
  </div>
</form>
<?php
}
?>
</div>
</div>



<script>
let userTextCount = 0;

function addSharedRow() {
  const table = document.getElementById("dynamic-form").getElementsByTagName('tbody')[0];
  const newRow = table.insertRow(table.rows.length);
  newRow.className = 'text_fields_class';

  const textCell = newRow.insertCell(0);
  textCell.innerText = '';

  const inputCell = newRow.insertCell(1);
  inputCell.className = 'input-group';

  const textInput = document.createElement('input');
  textInput.type = 'text';
  textInput.name = 'textField[]';
  textInput.placeholder = 'Enter an text';
  textInput.className = 'form-control';
  inputCell.appendChild(textInput);

  if (userTextCount === 0) {
    const addMoreButton = document.createElement('button');
    addMoreButton.type = 'button';
    addMoreButton.innerText = 'Add More';
    addMoreButton.className = 'btn btn-primary';
    addMoreButton.onclick = addSharedRow;
    inputCell.appendChild(addMoreButton);
  } else {
    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.innerText = 'Remove';
    removeButton.className = 'btn btn-danger';
    removeButton.onclick = function() {
      table.deleteRow(newRow.rowIndex);
      userTextCount--;
    };
    inputCell.appendChild(removeButton);
  }

  userTextCount++;
}

function removeAllTextRows() {
  const table = document.getElementById("dynamic-form").getElementsByTagName('tbody')[0];
  const rows = table.getElementsByClassName('text_fields_class');
  while (rows.length > 0) {
    table.deleteRow(rows[0].rowIndex);
  }
  userTextCount = 0;
}

document.addEventListener('DOMContentLoaded', function() {
  const accessDropdown = document.querySelector('.access-dropdown');
  
  accessDropdown.addEventListener('change', function(event) {
    if (accessDropdown.value === 'Dropdown Fields' || accessDropdown.value === 'Checkboxes' || accessDropdown.value === 'Radio Button Fields') {
      removeAllTextRows();
      addSharedRow();
    } else {
      removeAllTextRows();
    }
  });
});
</script>

</body>
</html>