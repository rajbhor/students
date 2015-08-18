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
	
		// $student_name=stripcslashes(mysql_real_escape_string(trim($_POST['name']))) ;
		// $phn_no= stripcslashes(mysql_real_escape_string(trim($_POST['phn_no'])));
		// $email_id = stripcslashes(mysql_real_escape_string(trim($_POST['email']))); 
		// $sex = $_POST['select'];
		// $dob = stripcslashes(mysql_real_escape_string(trim($_POST['dob']))); 
		// list($month, $day, $year) = split('[/.-]', $dob);
		// $result  =  join("-", array($year,$month,$day));
		// $fathername = stripcslashes(mysql_real_escape_string(trim($_POST['fathername']))) ;
		// $mothername = stripcslashes(mysql_real_escape_string(trim($_POST['mothername']))) ;
		$guardianname = stripcslashes(mysql_real_escape_string(trim($_POST['guardianname']))) ;
		$guardianoccupation = stripcslashes(mysql_real_escape_string(trim($_POST['guardianoccupation']))) ;
		$gurdainAddress = stripcslashes(mysql_real_escape_string(trim($_POST['gurdainAddress']))) ;
		$guardianpin = stripcslashes(mysql_real_escape_string(trim($_POST['guardianpin']))) ;
		// $correspondenceAddress = stripcslashes(mysql_real_escape_string(trim($_POST['correspondenceAddress']))) ;
		// $correspondencepin = stripcslashes(mysql_real_escape_string(trim($_POST['correspondencepin']))) ;
		// $correspondencephone = stripcslashes(mysql_real_escape_string(trim($_POST['correspondencephone']))) ;
		// $nationality = stripcslashes(mysql_real_escape_string(trim($_POST['nationality']))) ;
		// $marital_status = $_POST['select2'];
		// $bgrp = stripcslashes(mysql_real_escape_string(trim($_POST['bgrp']))) ;
		// $category = $_POST['select3'];
		// $reside = $_POST['select4'];
		// $emploment_status = $_POST['select5'];
		// $depution_status = $_POST['select6'];
		// $deputationinstitute = stripcslashes(mysql_real_escape_string(trim($_POST['deputationinstitute']))) ;
		// $lastuniname = stripcslashes(mysql_real_escape_string(trim($_POST['lastuniname']))) ;
		// $lastunireg = stripcslashes(mysql_real_escape_string(trim($_POST['lastunireg']))) ;
		// $board10 = stripcslashes(mysql_real_escape_string(trim($_POST['board10']))) ;
		// $roll10 = stripcslashes(mysql_real_escape_string(trim($_POST['roll10']))) ;
		// $yop10 = stripcslashes(mysql_real_escape_string(trim($_POST['yop10']))) ;
		// $div10 = stripcslashes(mysql_real_escape_string(trim($_POST['div10']))) ;
		// $percent10 = stripcslashes(mysql_real_escape_string(trim($_POST['percent10']))) ;
		// $sub10 = stripcslashes(mysql_real_escape_string(trim($_POST['sub10']))) ;
		// $board10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['board10_2']))) ;
		// $roll10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['roll10_2']))) ;
		// $yop10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['yop10_2']))) ;
		// $div10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['div10_2']))) ;
		// $percent10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['percent10_2']))) ;
		// $sub10_2 = stripcslashes(mysql_real_escape_string(trim($_POST['sub10_2']))) ;
		// $board10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['board10_2_3']))) ;
		// $roll10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['roll10_2_3']))) ;
		// $yop10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['yop10_2_3']))) ;
		// $div10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['div10_2_3']))) ;
		// $percent10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['percent10_2_3']))) ;
		// $sub10_2_3 = stripcslashes(mysql_real_escape_string(trim($_POST['sub10_2_3']))) ;
		// $examextra = stripcslashes(mysql_real_escape_string(trim($_POST['examextra']))) ;
		// $boardexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['boardexamextra']))) ;
		// $rollexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['rollexamextra']))) ;
		// $yopexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['yopexamextra']))) ;
		// $divexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['divexamextra']))) ;
		// $percentexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['percentexamextra']))) ;
		// $subexamextra = stripcslashes(mysql_real_escape_string(trim($_POST['subexamextra']))) ;
		// $medals = stripcslashes(mysql_real_escape_string(trim($_POST['medals']))) ;
		// $curricular = stripcslashes(mysql_real_escape_string(trim($_POST['curricular']))) ;
		// $handicapped = $_POST['select7'];
		// $course_undergoing = $_POST['select8'];
		
		// $undergoing_course_details = stripcslashes(mysql_real_escape_string(trim($_POST['texthide1']))) ;
		
		// echo "UPDATE student_details SET guardian_name = '$guardianname', guardian_occupation = '$guardianoccupation', guardian_address = '$gurdainAddress', guardian_pincode = '$guardianpin'  WHERE student_id='$myname'";
		// exit();
		$query1 = mysql_query("UPDATE student_details SET guardian_name = '$guardianname', guardian_occupation = '$guardianoccupation', guardian_address = '$gurdainAddress', guardian_pincode = '$guardianpin'  WHERE student_id='$myname'");
		header("Location:".$bases."actions/processEditprofileDone.php");	
		/*$query1=mysql_query("SELECT * FROM `student_details` WHERE `student_id` = '$uname'"); 
		if(mysql_num_rows($query1)==1){ //access 
      
				 $rows=mysql_fetch_array($query1);
   
				$passwd=$rows['password'];
				$username=$rows['student_id'];
				$dept_center_code = $rows['dept_center_code'];
				$dept_center_course_code = $rows['dept_center_course_code'];
				$semester_code = $rows['semester_code'];
				$belongs_to = $rows['belongs_to_center_dept'];
				$student_name = $rows['student_name'];
				$phn_no = $rows['mb_no'];
				$email_id = $rows['email_id'];
				$sex = $rows['sex'];
				$dob = $rows['dob'];
				$yoa = $rows['year_of_admission'];
				$roll_no = $rows['roll_no'];
				
	           
	           
 
						if($rows['password']==$pwd )
						 {
						 		if($belongs_to == 'dept')
					            {
					                 $query2=mysql_query("SELECT dept_name FROM `department` WHERE `dept_code` = '$dept_center_code'"); 
					                $rows=mysql_fetch_array($query2);
					                $department_center = $rows['dept_name'];
					                echo $department_center;


					                $query4 = mysql_query("select course_name from course where dept_code = '$dept_center_course_code'");
					                $rows=mysql_fetch_array($query4);
					                $department_center_course = $rows['course_name'];
					                

					            }
					            else

					            {
					                 $query3 = mysql_query("select center_name from center where cenetr_code ='$dept_center_code'") ;
					                 $rows=mysql_fetch_array($query3);
					                 $department_center= $rows['center_name'];
					                 $query5 = mysql_query("select cc_name from center_course where center_code = '$dept_center_course_code'");
					                $rows=mysql_fetch_array($query5);
					                $department_center_course = $rows['cc_name'];

					            }
						 		
							 	$_SESSION['password']=$passwd;
								$_SESSION['username']=$username;
								$_SESSION['dept_center_code']= $dept_center_code;
								$_SESSION['dept_center_course_code'] = $dept_center_course_code;
								$_SESSION['semester_code'] = $semester_code;
								$_SESSION['belongs_to'] = $belongs_to;
								$_SESSION['student_name'] = $student_name;
								$_SESSION['department_center'] = $department_center;
	           					$_SESSION['department_center_course'] = $department_center_course;
	           					$_SESSION['phn_no'] = $phn_no;
	           					$_SESSION['email_id'] = $email_id;
	           					$_SESSION['sex'] = $sex;
	           					$_SESSION['dob'] = $dob;
	           					$_SESSION['yoa'] = $yoa;
	           					$_SESSION['roll_no'] = $roll_no;
								$_SESSION['logged_in']=TRUE;
					       		 
					       		header("Location:".$bases."student_index.php");	
					
						 }
				 		else
						{
								$error="Wrong Attempt. Try Again";
								header("Location:".$bases."index.php?loginRedirect=".base64_encode($error));
					    }

 			}*/
	   
		
    
		 
}
catch(Exception $e)
  {
  echo "error";
  }