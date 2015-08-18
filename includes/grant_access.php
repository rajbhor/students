<?php require("auto_connect.php");
 
$grantid=$_POST['grantid'];
$id=$_POST['id'];
 $q1=mysql_query("select * from  g_operator_access_modules where 
operator_id='$id' and module_id=$grantid");
 if(mysql_num_rows($q1)==0){
$q=mysql_query("insert into  g_operator_access_modules (operator_id,module_id) values('$id',$grantid)");
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


