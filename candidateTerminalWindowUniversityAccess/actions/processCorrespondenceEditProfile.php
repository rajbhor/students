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
	
		
		$correspondenceAddress = stripcslashes(mysql_real_escape_string(trim($_POST['correspondenceAddress']))) ;
		$correspondencepin = stripcslashes(mysql_real_escape_string(trim($_POST['correspondencepin']))) ;
		$correspondencephone = stripcslashes(mysql_real_escape_string(trim($_POST['correspondencephone']))) ;
		
		
		// echo "UPDATE student_details SET corr_address = '$correspondenceAddress', corr_pincode = '$correspondencepin', corr_phone_no = '$correspondencephone' WHERE student_id='$myname'";
		// exit();
		$query1 = mysql_query("UPDATE student_details SET corr_address = '$correspondenceAddress', corr_pincode = '$correspondencepin', corr_phone_no = '$correspondencephone' WHERE student_id='$myname'");
		header("Location:".$bases."actions/processEditprofileDone.php");	
			 
}
catch(Exception $e)
  {
  echo "error";
  }