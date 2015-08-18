<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$sl=$_GET['sl'];

$sfaname=ucwords(trim($_POST['sfaname']));
$smoname=ucwords(trim($_POST['smoname']));
$sdob=trim($_POST['sdob']);
$sname=strtoupper($_POST['sname']);
$ssex=trim($_POST['ssex']);
$scommunity=trim($_POST['scmmunity']);
$sregion=trim($_POST['sregion']);
 
$q=mysql_query("update student_details set student_name='$sname' , fathers_name='$sfaname',
  mothers_name='$smoname', dob='$sdob',sex='$ssex', community='$scommunity', region='$sregion' where sl=$sl");
if($q)
  {
    $m= base64_encode("Student personal details has been successfully modified."); 
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&errorResponse=$m");
 	
   
 
  }
  
 

 
