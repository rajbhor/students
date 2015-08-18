<?php session_start();
require("auto_connect.php");
$dptcode=$_SESSION['deptcode'];
$type=$_SESSION['branch_type'];

$flabel=mysql_real_escape_string($_POST['flabel']);
$query=mysql_query("select * from fee_structure_master_du where center_dept_code='$dptcode'  and fee_for_dept_center='$type'  AND  fee_label='$flabel'");
$result=@mysql_num_rows($query);
if($result>=1)
{
  $json=array('message'=>'Problem'); 
  echo json_encode($json); 
  
 }
else if($result==0){
$json=array('message'=>'OK'); 
  echo json_encode($json); 
 // $json=array('message'=>'Problem'); 
 //  echo json_encode($json); 
 }
 
?>

 