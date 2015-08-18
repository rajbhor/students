<?php ob_start();?>
<?php require("includes/auto_connect.php");
ini_set('max_execution_time',-1);
ini_set('memory_limit',-1);
require_once 'Classes/PHPExcel.php';//change if necessary
$deptidcenterid=mysql_real_escape_string($_GET['deptcode']);
$bt=mysql_real_escape_string($_GET['branch_type']);
$objPHPExcel = new PHPExcel();
$F=$objPHPExcel->getActiveSheet();
$Line=2;

$objPHPExcel->getActiveSheet()->getStyle('A1:U1')->getFont()->setBold(true);
foreach (range('A1','U1') as $col) {
	$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}
	$F->setCellValue('A1', 'ID');
	if($bt=='center') {

$F->setCellValue('B1', 'CENTER');
	} else {
$F->setCellValue('B1', 'DEPARTMENT');

	}
	
    $F->setCellValue('C1', 'COURSE');
	$F->setCellValue('D1', 'SESSION');	
	$F->setCellValue('E1', 'SEMESTER/YEAR');
	$F->setCellValue('F1', 'ADMISSION-FEE');
	$F->setCellValue('G1', 'COURSE-FEE');
	$F->setCellValue('H1', 'COURSE_FEE_PROCEDURE');
	$F->setCellValue('I1', 'LIBRARY-FEE');
	$F->setCellValue('J1', 'UNION MAGAZINE FEE');
	$F->setCellValue('K1', 'SAF');
	$F->setCellValue('L1', 'DEVELOPMENT FEE');
	$F->setCellValue('M1', 'INTERNET FEE');
	$F->setCellValue('N1', 'LABORATORY FEE');
	$F->setCellValue('O1', 'STUDENT SAFETY INSURANCE');
	$F->setCellValue('P1', 'SPORTS FEE');
	$F->setCellValue('Q1', 'HOSTEL FEE');
	$F->setCellValue('R1', 'GRAND TOTAL');
	$F->setCellValue('S1', 'FEE CATEGORY');
	$F->setCellValue('T1', 'FEE STATUS');
    $F->setCellValue('U1', 'CREATOR');
	 
 
	$sql="SELECT * from  fee_structure where center_dept_code=$deptidcenterid";	

	 
	 

  
$rs=mysql_query($sql); 
 


while($r=mysql_fetch_array($rs))

{    
    
	$F->setCellValue('A'.$Line, $r['fee_id']);
	$F->setCellValue('B'.$Line, getDepartmentCenter($r['center_dept_code'],'$bt'));
	$F->setCellValue('C'.$Line, getDepartmentCenterCourse($r['course_code'],'$bt'));
	$F->setCellValue('D'.$Line, getSession($r['session']));
	$F->setCellValue('E'.$Line, getSemester($r['sem_year']));
	$F->setCellValue('F'.$Line,$r['admission_fee']);
	$F->setCellValue('G'.$Line,$r['course_fee_year_sem']);
	$F->setCellValue('H'.$Line,$r['course_fee_parameter']);
	$F->setCellValue('I'.$Line,$r['library_fee']);
	$F->setCellValue('J'.$Line,$r['union_magazine']);
	$F->setCellValue('K'.$Line,$r['saf_fee']);
	$F->setCellValue('L'.$Line,$r['development_fee']);
	$F->setCellValue('M'.$Line,$r['interent_fee']);
	$F->setCellValue('N'.$Line,$r['laboratory_fee']);
	$F->setCellValue('O'.$Line,$r['student_safety']);
	$F->setCellValue('P'.$Line,$r['sports_fee']);
	$F->setCellValue('Q'.$Line,$r['hostel_fee']);
	$F->setCellValue('R'.$Line,$r['total_fee']);
	$F->setCellValue('S'.$Line,getFeeCategory($r['fee_category_id']));
	 if($r['status']==1){
	$F->setCellValue('T'.$Line,"Active");
                         }

else {
$F->setCellValue('T'.$Line,"Inactive");
      }
           

	
	$F->setCellValue('U'.$Line,getCreator($r['created_by_id']));
	
	 


	$Line=$Line+1;
	 
}
header('Content-Type: application/vnd.ms-excel');
$resolve=getDepartmentCenter($deptidcenterid,$bt);
$filename='DU Fee Structure Information- '.$resolve."-".time().".xls";
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


function getSession($sescode){
 
$q1234=mysql_query("select * from session  where session_id=$sescode");
$ses_name=mysql_fetch_array($q1234);
return $ses_name['session'];

 

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
