<?php
	
	ob_start();
	session_set_cookie_params(1200); 
	session_start();
	
	require("../includes/config.php");
	if(isset($_SESSION['logged_in']))
	{
			$_SESSION['password']="";
								$_SESSION['username']="";
								$_SESSION['dept_center_code']= "";
								$_SESSION['dept_center_course_code'] = "";
								$_SESSION['semester_code'] = "";
								$_SESSION['belongs_to'] = "";
								$_SESSION['student_name'] = "";
								$_SESSION['department_center'] = "";
	           					$_SESSION['department_center_course'] = "";
	           					$_SESSION['phn_no'] = "";
	           					$_SESSION['email_id'] = "";
	           					$_SESSION['sex'] = "";
	           					$_SESSION['dob'] = "";
	           					$_SESSION['yoa'] = "";
	           					$_SESSION['roll_no'] = "";
								$_SESSION['logged_in']=FALSE;
					       		 
	session_destroy();
	header("Location:".$bases."index.php");
	}
	
	
	
?>
