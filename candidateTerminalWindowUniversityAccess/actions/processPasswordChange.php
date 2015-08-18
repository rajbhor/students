<?php 
ob_start(); 

session_start();

$myname = $_SESSION['username'];

require("../../includes/auto_connect.php");
require("../../includes/config.php");
if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 

try
{
	if($_SESSION['logged_in'])
	{
		$pwd=mysql_real_escape_string(trim($_POST['newPassword']));
		$query1=mysql_query("UPDATE `student_details` SET password = '$pwd' WHERE `student_id` = '$myname'"); 
		$success = "Password Changed Successfully!! ";
		header("Location:".$bases."actions/processEditprofileDone.php?loginRedirect=".base64_encode($success));
	}
	else
	{
			$error="Something went wrong!!! Try Again";
			header("Location:".$bases."index.php?loginRedirect=".base64_encode($error));
    }
	
}
catch(Exception $e)
{
	echo "error";
}