<?php 
session_start();
require("includes/protect.php");
 require("includes/config.php");
require("includes/auto_connect.php");
include ('class/MainFunction.php');
$deptname=$_POST['dept'];
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$flag=$_POST['flag'];

$val= new MainFunction;

$no= $val->check("SELECT * from users where  user_name='$uname'");
if($no>0)
{
	$m=base64_encode("<img src='images/error.png'/>"." Record already exists");
}
else
{
$query = "insert into  users (user_name,password,dept_code, user_type,status,branch_type) values('$uname','$pwd','$deptname','operator','A','$flag') ";
$result = mysql_query($query) or die ("ERROR: $query. " . mysql_error());
 if($result)
  {
    $m= base64_encode("<img src='images/ok.png'/>"." Record Saved Successfully"); 	
  }
  else
  {
    $m=base64_encode("<img src='images/error.png'/>"." Error on Pgae");
  }
  }
 header("location:usermasterentries.php?m=$m");
 ?>

?>