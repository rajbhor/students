<?php ob_start(); 
session_start();
require("../includes/config.php");
 
require("../includes/auto_connect.php");

$my_id = $_SESSION['username'];


$student_name 		= trim($_POST['student_name']);

$student_phn_no 	= trim($_POST['student_phn_no']);

$student_email_id 	= trim($_POST['student_email_id']);

$qry = "UPDATE student_details SET student_name = '$student_name',mb_no = '$student_phn_no',email_id = '$student_email_id'WHERE student_id = '$my_id'";
$msg = '';
if(mysql_query($qry)) {
	$msg .= "Successfully edited.";
	$_SESSION['edit_profile_success'] = $msg;
}else{
	$msg .= "Unable to edit.";
	$_SESSION['edit_profile_error'] = $msg;
}
header('Location:profile.php');
