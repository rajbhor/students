<?php ob_start(); 
//session_set_cookie_params(1200);
session_start();

require("../../includes/config.php");
if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
require("auto_connect.php");
	 
$exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
$hostname = trim($exec); //remove any spaces before and after
$ip = gethostbyname($hostname);
$myname = $_SESSION['username'];
$student_name = $_SESSION['student_name'];
$department_center=$_SESSION['department_center'] ;
$department_center_course = $_SESSION['department_center_course'];

try{ 
		if($_SESSION['logged_in']){

			$query1=mysql_query("SELECT * FROM `student_details` s, fee_structure f where s.`belongs_to_center_dept` = f.`type` and s.`dept_center_code` = f.`center_dept_code` and s.`dept_center_course_code` = f.`course_code` and s.`semester_code` = f.`sem_year`and s.`student_id` ='".$myname."' group by s.`dept_center_code`");
            while($rows = mysql_fetch_array($query1))
            {

                $admission_fee = $rows['admission_fee'];
                $course_fee = $rows['course_fee_year_sem'];
                $Library_fee = $rows['library_fee'];
                $union_magazine_fee = $rows['union_magazine'];
                $safety_insurance_fee = $rows['saf_fee'];
                $Development_fee  =$rows['development_fee'];
                $Laboratory_fee= $rows['laboratory_fee'];
                $interent_fee = $rows['interent_fee'];
                $student_aid_fee = $rows['student_safety'];
                $sports_fee = $rows['sports_fee'];
                $total_fee = $rows['total_fee'];

            }
            $_SESSION['admission_fee'] = $admission_fee;
            $_SESSION['course_fee_year_sem'] = $course_fee;
            $_SESSION['library_fee'] = $Library_fee;
            $_SESSION['union_magazine'] = $union_magazine_fee;
            $_SESSION['saf_fee'] = $safety_insurance_fee;
            $_SESSION['development_fee'] = $Development_fee ;
            $_SESSION['laboratory_fee'] = $Laboratory_fee;
            $_SESSION['interent_fee'] = $interent_fee;
            $_SESSION['student_safety'] = $student_aid_fee;
            $_SESSION['sports_fee'] = $sports_fee;
            $_SESSION['total_fee'] = $total_fee;

            header("Location:".$bases."forms.php");
	
      }
		 
}
catch(Exception $e)
  {
  echo "error";
  }