<?php require("auto_connect.php");
$category=$_POST['category'];
$catid=$_POST['catid'];
$q=mysql_query("select *  from categories where catname='$category' and id<>$catid");
if(mysql_num_rows($q)>=1){
$json=array('message'=>'Problem');
echo json_encode($json); } ?>