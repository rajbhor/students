<?php require("auto_connect.php");
 
$unm=$_POST['unm'];
 
$q=mysql_query("select * from g_users where username='$unm'");
if(mysql_num_rows($q)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


