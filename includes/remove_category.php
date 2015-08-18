<?php require("auto_connect.php");
$catid=$_POST['catid'];
$q=mysql_query("delete from categories where id=$catid");
if($q){
$json=array('message'=>'Done');
echo json_encode($json); } ?>