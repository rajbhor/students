<?php require("auto_connect.php");
$mid=$_POST['mid'];
$q=mysql_query("delete from members where id='$mid'");
if($q){
$json=array('message'=>'Done');
echo json_encode($json); } ?>