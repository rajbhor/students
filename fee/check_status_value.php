<?php session_start();
require("auto_connect.php");
$dptcode=$_SESSION['deptcode'];
$feeid=$_GET['feeid'];
$status=$_GET['status']; 
 
if($status==0)
{
  $del = "UPDATE fee_structure SET status='1' where fee_id = '$feeid'";
$result = mysql_query($del);
}
else{
   $del = "UPDATE fee_structure SET status='0' where fee_id = '$feeid'";
$result = mysql_query($del);
 
}
?>