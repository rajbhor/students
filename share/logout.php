<?php session_start();
require("includes/config.php");
$_SESSION['username']='';
$_SESSION['deptnames']='';
$_SESSION['deptcode']='';
$_SESSION['logged-in']=false;
$_SESSION['user_type']='';
 session_unset($_SESSION['username']);
 header("Location:index.php");
 ?>