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
	
		
		$lastuniname = stripcslashes(mysql_real_escape_string(trim($_POST['lastuniname']))) ;
		$lastunireg = stripcslashes(mysql_real_escape_string(trim($_POST['lastunireg']))) ;
		$board10 = stripcslashes(mysql_real_escape_string(trim($_POST['board10']))) ;
		$roll10 = stripcslashes(mysql_real_escape_string(trim($_POST['roll10']))) ;
		$yop10 = stripcslashes(mysql_real_escape_string(trim($_POST['yop10']))) ;
		$div10 = stripcslashes(mysql_real_escape_string(trim($_POST['div10']))) ;
		$percent10 = stripcslashes(mysql_real_escape_string(trim($_POST['percent10']))) ;
		$sub10 = stripcslashes(mysql_real_escape_string(trim($_POST['sub10']))) ;
		$board10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['board10_2']))) ;
		$roll10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['roll10_2']))) ;
		$yop10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['yop10_2']))) ;
		$div10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['div10_2']))) ;
		$percent10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['percent10_2']))) ;
		$sub10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['sub10_2']))) ;
		$board10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['board10_2_3']))) ;
		$roll10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['roll10_2_3']))) ;
		$yop10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['yop10_2_3']))) ;
		$div10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['div10_2_3']))) ;
		$percent10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['percent10_2_3']))) ;
		$sub10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['sub10_2_3']))) ;
		$examextra = stripcslashes(mysql_real_escape_string(trim($_POST['examextra']))) ;
		$boardexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['boardexamextra']))) ;
		$rollexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['rollexamextra']))) ;
		$yopexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['yopexamextra']))) ;
		$divexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['divexamextra']))) ;
		$percentexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['percentexamextra']))) ;
		$subexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['subexamextra']))) ;
		$medals = stripcslashes(mysql_real_escape_string(trim($_POST['medals']))) ;
		$curricular = stripcslashes(mysql_real_escape_string(trim($_POST['curricular']))) ;
		
		$course_undergoing = $_POST['select8'];
		
		$undergoing_course_details = stripcslashes(mysql_real_escape_string(trim($_POST['texthide1']))) ;
		
		// echo "UPDATE student_details SET last_uni_name = '$lastuniname', last_uni_regno = '$lastunireg', board_10 = '$board10', board_10_roll = '$roll10', board_10_yop = '$yop10', board_10_div = '$div10', board_10_percent = '$percent10', board_10_sub = '$sub10', board10_2 = '$board10_2', board10_2_roll = '$roll10_2', board10_2_yop = '$yop10_2', board10_2_div = '$div10_2', board10_2_percent  = '$percent10_2', board10_2_sub = '$sub10_2', board10_2_3 = '$board10_2_3', board10_2_3_roll = '$roll10_2_3', board10_2_3_yop = '$yop10_2_3', board10_2_3_div = '$div10_2_3', board10_2_3_percent = '$percent10_2_3', board10_2_3_sub = '$sub10_2_3', examextra = '$examextra', boardexamextra = '$boardexamextra', rollexamextra = '$rollexamextra', yopexamextra = '$yopexamextra', divexamextra = '$divexamextra', percentexamextra = '$percentexamextra', subexamextra = '$subexamextra', distinction_medals_prize = '$medals', extra_curricular = '$curricular',  undergoing_course = '$course_undergoing', undergoing_course_details = '$undergoing_course_details'  WHERE student_id='$myname'";
		// exit();
		$query1 = mysql_query("UPDATE student_details SET last_uni_name = '$lastuniname', last_uni_regno = '$lastunireg', board_10 = '$board10', board_10_roll = '$roll10', board_10_yop = '$yop10', board_10_div = '$div10', board_10_percent = '$percent10', board_10_sub = '$sub10', board10_2 = '$board10_2', board10_2_roll = '$roll10_2', board10_2_yop = '$yop10_2', board10_2_div = '$div10_2', board10_2_percent  = '$percent10_2', board10_2_sub = '$sub10_2', board10_2_3 = '$board10_2_3', board10_2_3_roll = '$roll10_2_3', board10_2_3_yop = '$yop10_2_3', board10_2_3_div = '$div10_2_3', board10_2_3_percent = '$percent10_2_3', board10_2_3_sub = '$sub10_2_3', examextra = '$examextra', boardexamextra = '$boardexamextra', rollexamextra = '$rollexamextra', yopexamextra = '$yopexamextra', divexamextra = '$divexamextra', percentexamextra = '$percentexamextra', subexamextra = '$subexamextra', distinction_medals_prize = '$medals', extra_curricular = '$curricular',  undergoing_course = '$course_undergoing', undergoing_course_details = '$undergoing_course_details'  WHERE student_id='$myname'");
		header("Location:".$bases."actions/processEditprofileDone.php");	
		
		 
}
catch(Exception $e)
  {
  echo "error";
  }