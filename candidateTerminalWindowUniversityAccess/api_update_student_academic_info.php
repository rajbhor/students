<?php ob_start(); 
session_start();
require("../includes/config.php");
 
require("../includes/auto_connect.php");
 
$my_id = $_SESSION['username'];

$student_details_qry = mysql_query("select * from student_details where student_id = '$my_id'");

//get the students department code
while($row = mysql_fetch_array($student_details_qry)) {
	 $student_department_code = 	$row['dept_center_code'];
}
$semester_code	  = trim($_POST['semester_code']);
 $dept_center_code = $_POST['dept_center_code'];

//default student code is student username. If the user has changed the departnment, create a new 
//student id for the student
$studentcode = $my_id;
//check if the student changed departmnt
if( $_POST['dept_center_code'] != $student_department_code) {
	$q 	 = mysql_query("select * from department where dept_code=".$_POST['dept_center_code']);
	$dep = mysql_fetch_array($q);

	$dept_center_code = $dep['dept_code']; //shortcode

	$depcode = $dep['sf_code']; //shortcode

	$bt = "dept";

	$check 	= mysql_query("select max(sl) as maxsl from  student_details where dept_center_code='$dept_center_code' order by sl");
	$r 		= mysql_fetch_array($check);
	if($r['maxsl']!=NULL || $r['maxsl']!="NULL"){
		$lastcode 	= $r['maxsl'];
		$latestcode = $r['maxsl']+1;
		$codelen 	= strlen($latestcode);
	}
	else {
		$latestcode="1";
		$codelen=strlen($latestcode);
	}
	 
	if($bt == 'dept'){
		switch ($codelen) {
			case '1':
				$studentcode=trim($depcode."-00000".$latestcode);
				
				break;
			case '2':
				$studentcode=trim($depcode."-0000".$latestcode);
				
				break;

			case '3':
				$studentcode=trim($depcode."-000".$latestcode);
				
				break;
			case '4':
				$studentcode=trim($depcode."-00".$latestcode);
				
				break;
			case '5':
				$studentcode=trim($depcode."-0".$latestcode);
				
				break;
			
			default:
				$studentcode=trim($depcode."-".$latestcode);
			
				break;
		}
	}

}
$dept_center_code = $_POST['dept_center_code'];

$semester_code	  = trim($_POST['semester_code']);


$qry = "UPDATE student_details SET dept_center_code = '$dept_center_code',semester_code = '$semester_code', student_id = '$studentcode' WHERE student_id = '$my_id'";
$msg = '';
if(mysql_query($qry)) {
	$_SESSION['username']=$studentcode;
	$_SESSION['semester_code']=$semester_code;
	$msg .= "Successfully edited.Your id has been changed and your new id is '$studentcode' .Please use this id for future login";
	$_SESSION['edit_academic_success'] = $msg;
}else{
	$msg .= "Unable to edit.";
	$_SESSION['edit_academic_error'] = $msg;
}
header('Location:profile.php');
