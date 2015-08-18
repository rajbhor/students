<?php ob_start(); 
//session_set_cookie_params(1200);
session_start();
//require("configLogin.php");
require("auto_connect.php");
require("configs.php");
$myname = $_SESSION['username'];
	 
$exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
$hostname = trim($exec); //remove any spaces before and after
$ip = gethostbyname($hostname);  
try{ 
	
		if($_SESSION['logged_in']){

		
		$query1=mysql_query("SELECT * FROM `student_details` WHERE `student_id` = '$myname'"); 
		
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
					
		       		 
		       		header("Location:".$bases."profile.php");	
					
						
 			}
	   		else
			{
					$error="Wrong Attempt. Try Again";
					header("Location:".$bases."index.php?loginRedirect=".base64_encode($error));
		    }
		}
    
		 
}
catch(Exception $e)
  {
  echo "error";
  }