<?php ob_start(); @session_start();
 
$dp=$_SESSION['deptcode'];
$bt=$_SESSION['branch_type'];
function getDepartmentCenter($depcode,$bt){
if($bt=='center'){
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
function getDepartmentCenterCourse($dccode,$bt){
if($bt=='center'){
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
function getSession($sess){
    $q3=mysql_query("select * from session where session_id=$sess");
    $sesyr=mysql_fetch_array($q3);
    return $sesyr['session'];
}
function getFeeCat($feecat){
    $q4=mysql_query("select * from fee_category where fee_id=$feecat");
    $sesyrr=mysql_fetch_array($q4);
    return $sesyrr['category_name'];
}
?>