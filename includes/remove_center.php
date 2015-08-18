<?php require("auto_connect.php");
$cenid=$_POST['cenid'];
$q=mysql_query("delete from center where center_code=$cenid");
$q1=mysql_query("select * from center");
if($q){
$json=array('message'=>'Done','num'=>mysql_num_rows($q1));
echo json_encode($json); } ?>