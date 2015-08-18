<?php require("auto_connect.php");
$courseid=$_POST['courseid'];
$depcode=$_POST['depcode'];
$q=mysql_query("delete from center_course where cc_code=$courseid");
$q1=mysql_query("select * from center_course where center_code=$depcode");
if($q){
$json=array('message'=>'Done','num'=>mysql_num_rows($q1));
echo json_encode($json); } ?>