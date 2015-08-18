<?php require("auto_connect.php");
 
$course=$_POST['course'];
$deptid=$_POST['deptid'];
$courseid=$_POST['courseid'];
 
$q1=mysql_query("select * from course where course_name='$course' and dept_code=$deptid and course_id<>$courseid");
  if(mysql_num_rows($q1)>=1){

$json=array('message'=>'Problem');
echo json_encode($json);

}
else {

	//do nothing
}


