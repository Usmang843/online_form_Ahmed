<?php
session_start();
$user_id=$_SESSION["uid1"];
include("../dbconnection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1="SELECT * FROM `answer_by` WHERE `form_id`='$id'";
    $run1=mysqli_query($con,$query1);
}

function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

// Excel file name for download 
$fileName = "Lecture_Shedule_" . date('Y-m-d') . ".xls"; 
 
$fields = array();
$fields[]="Name";
$fields[]="Email";
  $query5="SELECT * FROM `questions` WHERE `form_id`='$id'";
  $run5=mysqli_query($con,$query5); 
     if ($run5==TRUE)
       {
     while($data5=mysqli_fetch_array($run5))
     { 
      $fields[]= $data5['question'];
     }
   }
  $fields[]="Date";
 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 

if($run1==TRUE){ 
    while($data=mysqli_fetch_array($run1))
       { 
       	$lineData[]=$data['name'];
       	$lineData[]=$data['email'];
               $answer_by_id = $data['id'];
                  $query3="SELECT * FROM `answers` WHERE `answer_by_id`='$answer_by_id' AND `form_id`='$id'";
                  $run3=mysqli_query($con,$query3); 
                     if ($run3==TRUE)
                       {
                     while($data3=mysqli_fetch_array($run3))
                     {  
                     	$lineData[]=$data3['answer'];
                     }
                   }
                   $lineData[]=$data['date'];
                   array_walk($lineData, 'filterData'); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n";
                     
       }


}
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>