<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$courseid=$_GET['id'];
$deptname=$_POST['dept_'.$courseid];
$course=ucwords(trim($_POST['course_'.$courseid]));
  
$q=mysql_query("update center_course set cc_name='$course' , center_code=$deptname where cc_code=$courseid");
if($q)
  {
    $m= base64_encode("Course name  has been successfully modified."); 
     header("Location:".$base."courseLoggerGetStarted.php?response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."courseLoggerGetStarted.php?errorResponse=$m");
 	
   
 
  }
  
 

 
