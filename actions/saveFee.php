<?php ob_start(); session_start();
require("../includes/configLogin.php");
require("../includes/auto_connect.php");
include ('class/MainFunction.php'); 
function getCourse($cd,$bt){

	 if($bt=='dept') {
	$q=mysql_query("select * from course where course_id=$cd");
	$t=mysql_fetch_array($q);
	$coursenm=$t['course_name'];
	return $coursenm;
}
else {

	$q=mysql_query("select * from center_course where cc_code=$cd");
	$t=mysql_fetch_array($q);
	$coursenm=$t['cc_name'];
	return $coursenm;
}
	


}
$btype=$_SESSION['branch_type'];
$uids=$_SESSION['uids'];
$course=trim($_POST['course']);

$deptcode=$_SESSION['deptcode'];
$fsem=trim($_POST['fsem']);
$fsession=trim($_POST['fsession']);
$status=$_POST['status'];
 

$fadmission=trim($_POST['fadmission']);
if($fadmission==null || empty($fadmission) || $fadmission=="")
{
	$fadmission=0;
}
 $param=trim($_POST['param']);
$fcourse=trim($_POST['fcourse']);
if($fcourse==null || empty($fcourse) || $fcourse=="")
{
	$fcourse=0;
}
$flibrary=trim($_POST['flibrary']);
if($flibrary==null || empty($flibrary) || $flibrary=="")
{
	$flibrary=0;
}
$funioun=trim($_POST['funioun']);
if($funioun==null || empty($funioun) || $funioun=="")
{
	$funioun=0;
}
$fstudentaidfund=trim($_POST['fstudentaidfund']);
if($fstudentaidfund==null || empty($fstudentaidfund) || $fstudentaidfund=="")
{
	$fstudentaidfund=0;
}
$fdevelopment=trim($_POST['fdevelopment']);
if($fdevelopment==null || empty($fdevelopment) || $fdevelopment=="")
{
	$fdevelopment=0;	
}
$finternet=trim($_POST['finternet']);
if($finternet==null || empty($finternet) || $finternet=="")
{
	$finternet=0;
}

$fhostel=trim($_POST['fhostel']);
if($fhostel==null || empty($fhostel) || $fhostel=="")
{
	$fhostel=0;
}
$flaboratory=trim($_POST['flaboratory']);
if($flaboratory==null || empty($flaboratory) || $flaboratory=="")
{
	$flaboratory=0;
}
$fsafetyip=trim($_POST['fsafetyip']);
if($fsafetyip==null || empty($fsafetyip) || $fsafetyip=="")
{
	$fsafetyip=0;
}
$fsportsfee=trim($_POST['fsportsfee']);
if($fsportsfee==null || $fsportsfee=="" || empty($fsportsfee))
{
	$fsportsfee=0;
}

if(isset($_POST['spon'])){
	
	if(!empty($_POST['spon']) && $_POST['spon']!=''){
	$typefee=mysql_real_escape_string(trim($_POST['spon']));
	}
	else {
		
		$typefee=0;
	}
}


elseif(isset($_POST['endo'])){
	if(!empty($_POST['endo']) && $_POST['endo']!=''){
	$typefee=mysql_real_escape_string(trim($_POST['endo']));
	}
	else {
		
		$typefee=0;
	}
}

elseif(isset($_POST['lat'])){
	if(!empty($_POST['lat']) && $_POST['lat']!=''){
	$typefee=mysql_real_escape_string(trim($_POST['lat']));
	}
	else {
	$typefee=0;	
	}
}

else {
	
	$typefee=0;
	
}
 

$grandtotal=$fadmission+$fcourse+$flibrary+$funioun+$fstudentaidfund+$fdevelopment+$finternet+$fhostel+$flaboratory+$fsafetyip+$fsportsfee+$typefee;
$ftotal=trim($_POST['ftotal']);

$fcategory=trim($_POST['fcategory']);




 
$query11=mysql_query("select * from fee_structure where center_dept_code=$deptcode AND course_code=$course AND session=$fsession AND sem_year=$fsem AND fee_category_id=$fcategory");
$result11=mysql_num_rows($query11);
 
if($result11==0) //insert for the first time
{
 $prime=mysql_query("select max(fee_id) as maxsls from  fee_structure order by fee_id");

$rs=mysql_fetch_array($prime);
if($rs['maxsls']!=NULL || $rs['maxsls']!="NULL"){
$primary=$rs['maxsls']+1;
}
else {
$primary="1";
 
}
  

if($grandtotal==$ftotal)
{
$sql="insert into fee_structure(fee_id,	center_dept_code,course_code,type, type_fee, session,sem_year,admission_fee,
	course_fee_year_sem, course_fee_parameter ,library_fee,union_magazine,saf_fee,development_fee,
	interent_fee,hostel_fee,laboratory_fee,student_safety,sports_fee,total_fee,status,fee_category_id,created_by_id)
values($primary,'$deptcode','$course','$btype', '$typefee' ,'$fsession','$fsem','$fadmission','$fcourse', '$param','$flibrary','$funioun',
'$fstudentaidfund','$fdevelopment','$finternet', '$fhostel','$flaboratory','$fsafetyip','$fsportsfee','$grandtotal','$status','$fcategory',$uids)";

$result=mysql_query($sql) or die ("ERROR: $sql. " .mysql_error());

 if($result)
      {
$coursename=getCourse($course,$btype);
        $msg=base64_encode("Success! Fee Structure Slab has been created and saved successfully for ". $coursename);   
      }
      else
      {
        $msg=base64_encode("ERROR: on Page");
      } 
}
else
{
	$msg=base64_encode("ERROR: on Total count");
}
}
else
{ //if num rows==1
	$coursename=getCourse($course,$btype);
 
	$msg=base64_encode("Success! Fee Structure Slab has been modified successfully for " . $coursename);     
	$rt=mysql_fetch_array($query11);
	$pm=$rt['fee_id'];

	$sql="update fee_structure set admission_fee='$fadmission', type_fee='$typefee',
	course_fee_year_sem='$fcourse', course_fee_parameter='$param',library_fee='$flibrary',union_magazine='$funioun',saf_fee='$fstudentaidfund',development_fee='$fdevelopment',
	interent_fee='$finternet', hostel_fee='$fhostel',laboratory_fee='$flaboratory',student_safety='$fsafetyip',sports_fee='$fsportsfee',total_fee='$grandtotal'
	where fee_id=$pm";

$result=mysql_query($sql) or die ("ERROR: $sql. " .mysql_error()); 
}

 header("Location:".$base."feeManageGetStarted.php?response=$msg");

?>