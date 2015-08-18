<?php require("auto_connect.php");
 
 
$dept=$_POST['dept'];
 
$q1=mysql_query("select * from center where center_name='$dept'");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


