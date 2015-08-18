<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$sl=$_GET['sl'];

$course=mysql_real_escape_string($_POST['scourse']);
$syear=mysql_real_escape_string($_POST['syear']);
$sdureg=trim($_POST['sdureg']);
if($sdureg=='' || $sdureg=='NULL' || $sdureg==NULL || empty($sdureg)){

	$sdureg="Not Available";
}
$sroll=trim($_POST['sroll']);
if($sroll=='' || $sroll=='NULL' || $sroll==NULL || empty($sroll)){

	$sroll="Not Available";
}


 
$q=mysql_query("update student_details set dept_center_course_code=$course , semester_code=$syear,registration_no='$sdureg',roll_no='$sroll' where sl=$sl");
if($q)
  {
    $m= base64_encode("Student academic details has been successfully modified."); 
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&errorResponse=$m");
 	
   
 
  }
  
 

 
