<?php require("auto_connect.php");
 
 
$deptid=$_POST['deptid'];
$depname=$_POST['depname'];
 
$q1=mysql_query("select * from department where dept_name='$depname' and dept_code<>$deptid");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


