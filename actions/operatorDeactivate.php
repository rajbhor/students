<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$opid=$_GET['opid'];
 
 
 
 
$q=mysql_query("update g_users set status='N' where user_id=$opid");
if($q)
  {
    $m= base64_encode("Operator has been successfully deactivated."); 
     header("Location:".$base."userGetStarted.php?response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."userGetStarted.php?errorResponse=$m");
 	
   
 
  }
  
 

 
