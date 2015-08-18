<?php require("auto_connect.php");
 
 
$cenid=$_POST['cenid'];
$cenname=$_POST['cenname'];
 
$q1=mysql_query("select * from center where center_name='$cenname' and center_code<>$cenid");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


