<?php require("auto_connect.php");
 
$uname=$_POST['uname'];
 
$q1=mysql_query("select * from g_users where user_name='$uname'");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


