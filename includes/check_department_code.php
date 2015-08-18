<?php require("auto_connect.php");
 
 
$scode=$_POST['scode'];
 
$q1=mysql_query("select * from department where sf_code='$scode'");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


