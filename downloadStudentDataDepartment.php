<?php ob_start(); require("includes/config.php");?>
<?php require("includes/auto_connect.php");
ob_clean(); 
ob_start();//include('protect.php');
ini_set('max_execution_time',-1);
ini_set('memory_limit',-1);
require_once 'Classes/PHPExcel.php';//change if necessary
$deptidcenterid=$_GET['deptid'];
$courseid=$_GET['courseid'];
$objPHPExcel = new PHPExcel();
$F=$objPHPExcel->getActiveSheet();
$Line=2;

$objPHPExcel->getActiveSheet()->getStyle('A1:V1')->getFont()->setBold(true);
foreach (range('A1','V1') as $col) {
	$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}
	$F->setCellValue('A1', 'ID');
    $F->setCellValue('B1', 'NAME');
	$F->setCellValue('C1', 'CENTER');
	$F->setCellValue('D1', 'COURSE');	
	$F->setCellValue('E1', 'SEMESTER/YEAR');
	$F->setCellValue('F1', 'YEAR OF ADMISSION');
	$F->setCellValue('G1', 'REGISTRATION#');
	$F->setCellValue('H1', 'ROLL#');
	$F->setCellValue('I1', 'FATHER NAME');
	$F->setCellValue('J1', 'MOTHER NAME');
	$F->setCellValue('K1', 'DOB');
	$F->setCellValue('L1', 'GENDER');
	$F->setCellValue('M1', 'COMMUNITY');
	$F->setCellValue('N1', 'REGION');
	$F->setCellValue('O1', 'FEE-CATEGORY');
	$F->setCellValue('P1', 'MOBILE-NO');
	$F->setCellValue('Q1', 'EMAIL');
	$F->setCellValue('R1', 'FEE PAID UPTO');
	$F->setCellValue('S1', 'RESIDE IN');
	$F->setCellValue('T1', 'LOGIN-ID');
	$F->setCellValue('U1', 'PASSWORD(OTP)');	
	$F->setCellValue('V1', 'CREATOR');
 
	$sql="SELECT * from student_details where dept_center_code=$deptidcenterid and dept_center_course_code=$courseid";	
  
$rs=mysql_query($sql); 

while($r=mysql_fetch_array($rs))
{   
    $hostel=$r['reside'];
    if($hostel==1){
    	$reside="HOSTEL";
    }
    else{
    	$reside="OUTSIDE";
    }

	$F->setCellValue('A'.$Line, $r['student_id']);
	$F->setCellValue('B'.$Line, $r['student_name']);
	$F->setCellValue('C'.$Line, getDepartmentCenter($r['dept_center_code'],'dept'));
	$F->setCellValue('D'.$Line, getDepartmentCenterCourse($r['dept_center_course_code'],'dept'));
	$F->setCellValue('E'.$Line, getSemester($r['semester_code']));
	$F->setCellValue('F'.$Line,$r['year_of_admission']);
	$F->setCellValue('G'.$Line,$r['registration_no']);
	$F->setCellValue('H'.$Line,$r['roll_no']);
	$F->setCellValue('I'.$Line,$r['fathers_name']);
	$F->setCellValue('J'.$Line,$r['mothers_name']);
	$F->setCellValue('K'.$Line,$r['dob']);
	$F->setCellValue('L'.$Line,$r['sex']);
	$F->setCellValue('M'.$Line,$r['community']);
	$F->setCellValue('N'.$Line,$r['region']);
	$F->setCellValue('O'.$Line,getFeeCategory($r['fee_category']));
	$F->setCellValue('P'.$Line,$r['mb_no']);
	$F->setCellValue('Q'.$Line,$r['email_id']);
	$F->setCellValue('R'.$Line,getSemester($r['fee_paid_upto_semester_code']));
	$F->setCellValue('S'.$Line,$reside);
	$F->setCellValue('T'.$Line,$r['student_id']);
	$F->setCellValue('U'.$Line,$r['password']);
	$F->setCellValue('V'.$Line,getCreator($r['created_by_id']));
	 


	$Line=$Line+1;
}
header('Content-Type: application/vnd.ms-excel');
$resolve=getDepartmentCenter($deptidcenterid,'dept');
$resolvecourse=getDepartmentCenterCourse($courseid,'dept');
$filename='DU Student Data- '.$resolve."-".$resolvecourse."-".time().".xls";
header("Content-Disposition: attachment;filename=".$filename);
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace('.php', '.xls', __FILE__));
$objWriter->save('php://output');
exit;
?>
<?php

function getDepartmentCenter($dccode,$btype){
if($btype=='center'){
$q14=mysql_query("select * from center where center_code=$dccode");
$c_name=mysql_fetch_array($q14);
return $c_name['center_name'];

}
else {  //dept

$q14=mysql_query("select * from department where dept_code=$dccode");
$dc_name=mysql_fetch_array($q14);
return $dc_name['dept_name'];

}

}



function getDepartmentCenterCourse($dccode,$btype){
if($btype=='center'){
$q1=mysql_query("select * from center_course where cc_code=$dccode");
$cc_name=mysql_fetch_array($q1);
return $cc_name['cc_name'];

}
else {  //dept

$q1=mysql_query("select * from course where course_id=$dccode");
$dcc_name=mysql_fetch_array($q1);
return $dcc_name['course_name'];

}

}



function getSemester($semcode){
 
$q12=mysql_query("select * from semester where id=$semcode");
$sem_name=mysql_fetch_array($q12);
return $sem_name['semester'];

 

}


function getFeeCategory($fee_category){
 
$q121=mysql_query("select * from fee_category where fee_id=$fee_category");
$fc=mysql_fetch_array($q121);
return $fc['category_name'];

 

}



function getCreator($creator){
 
$q123=mysql_query("select * from g_users where user_id=$creator");
$u_name=mysql_fetch_array($q123);
if($u_name['op_name']!=''){
return $u_name['op_name'];
}
else {
return $u_name['user_name'];

}

 

}
?>
