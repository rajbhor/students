<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$opid=base64_decode($_GET['opid']);
 
$uname=trim($_POST['unm_'.$opid]);
$pwd=trim($_POST['pwd_'.$opid]);
$opname=mysql_real_escape_string(trim(ucwords($_POST['opname_'.$opid])));
 
 
$q=mysql_query("update g_users set user_name='$uname' , password='$pwd',op_name='$opname' where user_id=$opid");
if($q)
  {
    $m= base64_encode("Operator details has been successfully modified."); 
     header("Location:".$base."userGetStarted.php?response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."userGetStarted.php?errorResponse=$m");
 	
   
 
  }
  
 

 
