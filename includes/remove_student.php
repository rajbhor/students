<?php require("auto_connect.php");
$id=$_POST['id'];
$courseid=$_POST['courseid']; //not needed
$dept_center_id=$_POST['dept_center_id'];
$q=mysql_query("delete from student_details where sl=$id");
$q1=mysql_query("select * from student_details where dept_center_code=$dept_center_id");
 
if($q1){
$json=array('message'=>'Done','num'=>mysql_num_rows($q1));
echo json_encode($json); } ?>