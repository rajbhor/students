<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$opid=$_GET['opid'];
 
 
 
 
$q=mysql_query("delete from g_users  where user_id=$opid");
if($q)
  {
    $m= base64_encode("Operator has been successfully truncated from university database."); 
     header("Location:".$base."userGetStarted.php?response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."userGetStarted.php?errorResponse=$m");
 	
   
 
  }
  
 

 
