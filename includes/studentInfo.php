<?php error_reporting(E_ALL ^ E_NOTICE);
$sl=base64_decode($_GET['sl']);
$stu=mysql_query("select * from student_details where sl=$sl");
$std=mysql_fetch_array($stu);
$dept_center_code=$std['dept_center_code'];
$dept_center_course_code=$std['dept_center_course_code'];
$semester_code=$std['semester_code'];
$year_of_admission=$std['year_of_admission'];
$student_name=$std['student_name'];
$registration_no=$std['registration_no'];
$roll_no=$std['roll_no'];
$fathers_name=$std['fathers_name'];
$mothers_name=$std['mothers_name'];
$dob=$std['dob'];
$sex=$std['sex'];
$reside=$std['reside'];
$community=$std['community'];
$region=$std['region'];
$fee_category=$std['fee_category'];
$mb_no=$std['mb_no'];
$fee_paid_upto_semester_code=$std['fee_paid_upto_semester_code'];
$email_id=$std['email_id'];
$student_id=$std['student_id'];
$password=$std['password'];
$belongs_to_center_dept=$std['belongs_to_center_dept'];
$created_by_id=$std['created_by_id'];
function getDepartmentCenter($depcode,$btype){
if($btype=='center'){
$q=mysql_query("select * from center where center_code=$depcode");
$c=mysql_fetch_array($q);
return $c['center_name'];

}
else {  //dept

$q=mysql_query("select * from department where dept_code=$depcode");
$d=mysql_fetch_array($q);
return $d['dept_name'];

}

}


function getDepartmentCenterCourse($dccode,$btype){
if($btype=='center'){
$q1=mysql_query("select * from center_course where cc_code=$dccode");
$cc_name=mysql_fetch_array($q1);
return $cc_name['cc_name'];

}
else {  //dept

$q1=mysql_query("select * from course where course_id=$dccode");
$dcc_name=mysql_fetch_array($q1);
return $dcc_name['course_name'];

}

}



function getSemester($semcode){
 
$q12=mysql_query("select * from semester where id=$semcode");
$sem_name=mysql_fetch_array($q12);
return $sem_name['semester'];

 

}


function getFeeCategory($fee_category){
 
$q121=mysql_query("select * from fee_category where fee_id=$fee_category");
$fc=mysql_fetch_array($q121);
return $fc['category_name'];

 

}



function getCreator($creator){
 
$q123=mysql_query("select * from g_users where user_id=$creator");
$u_name=mysql_fetch_array($q123);
if($u_name['op_name']!=''){
return $u_name['op_name'];
}
else {
return $u_name['user_name'];

}

 

}


