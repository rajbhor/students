<?php require("auto_connect.php");
 
 
$scode=$_POST['scode'];
$cenid=$_POST['cenid'];
 
$q1=mysql_query("select * from center where sf_code='$scode' and center_code<>$cenid");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


