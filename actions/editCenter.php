<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$cenid=$_GET['id'];
$deptname=mysql_real_escape_string(ucwords(trim($_POST['dept_'.$cenid])));
$shortform=strtoupper(trim($_POST['scode_'.$cenid]));
$q=mysql_query("update center set center_name='$deptname' , sf_code='$shortform' where center_code=$cenid");
if($q)
  {
    $m= base64_encode("Center details has been successfully modified."); 
     header("Location:".$base."centerGetStarted.php?response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."centerGetStarted.php?errorResponse=$m");
 	
   
 
  }
  
 

 
