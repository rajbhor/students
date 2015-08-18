<?php require("auto_connect.php");
 
$unm=$_POST['unm'];
$id=$_POST['id'];
 
$q=mysql_query("select * from g_users where user_name='$unm' and user_id<>'$id'");
if(mysql_num_rows($q)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


