<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$depid=$_GET['id'];
 
$deptname=ucwords(trim($_POST['dept_'.$depid]));
$shortform=strtoupper(trim($_POST['scode_'.$depid]));
 
 
$q=mysql_query("update department set dept_name='$deptname' , sf_code='$shortform' where dept_code=$depid");
if($q)
  {
    $m= base64_encode("Department details has been successfully modified."); 
     header("Location:".$base."departmentGetStarted.php?response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."departmentGetStarted.php?errorResponse=$m");
 	
   
 
  }
  
 

 
