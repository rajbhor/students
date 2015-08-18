<?php require("auto_connect.php");
 
$revokeid=$_POST['revokeid'];
$id=$_POST['id'];
 $q1=mysql_query("select * from  g_operator_access_modules where 
operator_id='$id' and module_id=$revokeid");
 if(mysql_num_rows($q1)>=1){
$q=mysql_query("delete from  g_operator_access_modules where operator_id='$id' and module_id=$revokeid");
if($q){

$json=array('message'=>'Success');
echo json_encode($json);

}
else {

	//do nothing
}

}
else {


	
}


