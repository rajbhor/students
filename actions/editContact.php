<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$sl=$_GET['sl'];

$smob=trim($_POST['smob']);
 

if($smob=='' || empty($smob)){

  $smob="Not Available";
}

$semail=mysql_real_escape_string(trim($_POST['semail']));
 
if($semail=='' || empty($semail)){

  $semail="Not Available";
}
$q=mysql_query("update student_details set mb_no='$smob' , email_id='$semail' where sl=$sl");
 
if($q)
  {
    $m= base64_encode("Student contact details has been successfully modified."); 
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&errorResponse=$m");
 	
   
 
  }
  
 

 
