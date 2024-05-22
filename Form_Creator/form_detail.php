<?php
include("header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query6="SELECT * FROM `forms` WHERE `id`='$id'";
    $run6=mysqli_query($con,$query6);
    $data6=mysqli_fetch_assoc($run6);
    $query1="SELECT * FROM `answer_by` WHERE `form_id`='$id'";
    $run1=mysqli_query($con,$query1);
}


?>




<h2 style="text-align: center;"><span class="badge badge-primary">Form Detail</span></h2>
<div class="alert alert-light" style="border:solid" style="">
	
	<br>
  <div style="margin-left: px;">
<table align="center" class="table table-striped table-sm">

<!-- <caption>List of Registered User</caption> -->
<tr>
<th>Name</th>
<th>Email</th>
<?php
  $query5="SELECT * FROM `questions` WHERE `form_id`='$id'";
  $run5=mysqli_query($con,$query5); 
     if ($run5==TRUE)
       {
     while($data5=mysqli_fetch_array($run5))
     { 
      echo "<td>".$data5['question']."</td>";
     }
   }
   ?>
<th>Submit Date</th>
</tr>


<?php 
       if ($run1==TRUE)
         {
       while($data=mysqli_fetch_array($run1))
       { 

        ?>
            <tr>
         <td><?php echo $data['name']; ?></td>
         <td><?php echo $data['email']; ?></td>
       
        	<?php
               $answer_by_id = $data['id'];
                  $query3="SELECT * FROM `answers` WHERE `answer_by_id`='$answer_by_id' AND `form_id`='$id'";
                  $run3=mysqli_query($con,$query3); 
                     if ($run3==TRUE)
                       {
                     while($data3=mysqli_fetch_array($run3))
                     {  
                      ?>
                      <td><?php echo $data3['answer']; ?></td>
                      
                      <?php
                     }
                   }
                   ?>
       
         <td><?php echo $data['date']; ?></td>
         
         
        


         
         


         </tr>
<?php  
       }
     }
     ?>
         

         
      
        </table>
       
     </div>
     <div class="tex-center">
<a class="btn btn-info " target="_blanck" href="export.php?id=<?php echo $id; ?>">Export to Excel Sheet</a>
</div>
    </div>











</body>
</html>