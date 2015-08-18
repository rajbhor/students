<?php require("auto_connect.php");
$depid=$_POST['depid'];
$q=mysql_query("delete from department where dept_code=$depid");
$q1=mysql_query("select * from department");
if($q){
$json=array('message'=>'Done','num'=>mysql_num_rows($q1));
echo json_encode($json); } ?>