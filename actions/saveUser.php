<?php 
session_start();
ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
include ('class/MainFunction.php');
$deptname=$_POST['dept'];
$uname=mysql_real_escape_string(trim($_POST['uname']));
$opname=mysql_real_escape_string(trim(ucwords($_POST['opname'])));
$pwd=mysql_real_escape_string(trim($_POST['pwd']));
$flag=$_POST['flag'];

 
 
$query = "insert into  g_users (user_name,password,op_name,dept_code, user_type,status,branch_type) values('$uname','$pwd','$opname','$deptname','operator','A','$flag') ";
$result = mysql_query($query) or die ("ERROR: $query. " . mysql_error());
 if($result)
  {
    $m= "User added successfully to operate as department operator"; 
    header("Location:".$base."userGetStarted.php?response=".base64_encode($m));	
  }
  else
  {
    $m="Transaction Failed. Please try again.";
    header("Location:".$base."userGetStarted.php?errorResponse=".base64_encode($m));	
  }
  

 
 
 ?>

?>