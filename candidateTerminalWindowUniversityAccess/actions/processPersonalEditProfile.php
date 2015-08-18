<?php ob_start(); 
//session_set_cookie_params(1200);
session_start();

//require("configLogin.php");
require("../../includes/auto_connect.php");
require("../../includes/config.php");
if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
$myname = $_SESSION['username'];
	 
$exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
$hostname = trim($exec); //remove any spaces before and after
$ip = gethostbyname($hostname);  
try{ 
	
		
		
		$nationality = stripcslashes(mysql_real_escape_string(trim($_POST['nationality']))) ;
		$marital_status = $_POST['select2'];
		$bgrp = stripcslashes(mysql_real_escape_string(trim($_POST['bgrp']))) ;
		$category = $_POST['select3'];
		$reside = $_POST['select4'];
		$emploment_status = $_POST['select5'];
		$depution_status = $_POST['select6'];
		$deputationinstitute = stripcslashes(mysql_real_escape_string(trim($_POST['deputationinstitute']))) ;
		
		$handicapped = $_POST['select7'];
		
		// echo "UPDATE student_details SET  corr_nationality = '$nationality', marital_status = '$marital_status', blood_group = '$bgrp', category = '$category', reside = '$reside', employment_status = '$emploment_status', depution_status = '$depution_status', depution_org = '$deputationinstitute', physically_handicapped = '$handicapped'  WHERE student_id='$myname'";
		// exit();
		$query1 = mysql_query("UPDATE student_details SET  corr_nationality = '$nationality', marital_status = '$marital_status', blood_group = '$bgrp', category = '$category', reside = '$reside', employment_status = '$emploment_status', depution_status = '$depution_status', depution_org = '$deputationinstitute', physically_handicapped = '$handicapped'  WHERE student_id='$myname'");
		header("Location:".$bases."actions/processEditprofileDone.php");	
		
	   
		
    
		 
}
catch(Exception $e)
  {
  echo "error";
  }