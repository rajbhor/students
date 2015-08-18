<?php require("auto_connect.php");
 
$course=$_POST['course'];
$deptid=$_POST['deptid'];
$courseid=$_POST['courseid'];
 
 
$q1=mysql_query("select * from center_course where cc_name='$course' and center_code=$deptid and cc_code<>$courseid");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

}


