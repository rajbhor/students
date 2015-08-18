<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
include ('class/MainFunction.php');
$deptname=$_POST['dept'];
$course=ucwords(trim($_POST['course']));
$val= new MainFunction;

$no= $val->check("SELECT * from course where course_name='$course' and dept_code='$deptname'");
if($no>0)
{
	$m=base64_encode("<img src='images/error.png'/>"." Record already exists");
}
else
{
$query = "insert into  course (course_name,dept_code) values('$course','$deptname') ";
$result = mysql_query($query) or die ("ERROR: $query. " . mysql_error());
 if($result)
  {
    $m= base64_encode("Course added successfully"); 	
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
  }
  }
 header("Location:".$base."courseLoggerGetStarted.php?response=$m");
 ?>
