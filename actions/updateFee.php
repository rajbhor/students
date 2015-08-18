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
$course=trim($_POST['course']);
$deptcode=$_SESSION['deptcode'];
$fsem=trim($_POST['fsem']);
$fsession=trim($_POST['fsession']);
$param=trim($_POST['param']);
$feeid=$_POST['feeid'];
$fadmission=trim($_POST['fadmission']);
if($fadmission==null || empty($fadmission) || $fadmission=="")
{
	$fadmission=0;
}
 
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

$status=trim($_POST['stat']);

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
 



$grandtotal=$fadmission+$fcourse+$flibrary+$funioun+$fstudentaidfund+$fdevelopment+$finternet+$flaboratory+$fsafetyip+$fsportsfee+$typefee;
$ftotal=trim($_POST['ftotal']);

 

 
	$update="UPDATE fee_structure SET admission_fee=$fadmission,course_fee_year_sem=$fcourse, type_fee='$typefee',  course_fee_parameter='$param',  library_fee=$flibrary,
	union_magazine=$funioun,saf_fee=$fstudentaidfund,development_fee=$fdevelopment,interent_fee=$finternet,
	laboratory_fee=$flaboratory,student_safety=$fsafetyip,sports_fee=$fsportsfee,total_fee=$grandtotal, status='$status' WHERE fee_id=$feeid";

$result=mysql_query($update) or die ("ERROR: $update. " .mysql_error());

 if($result)
      {
        $coursename=getCourse($course,$btype);
 
	$msg=base64_encode("Success! Fee Structure Slab has been modified successfully for " . $coursename);
       // $msg=base64_encode("Success! Fee Structure Slab ");     
      }
      else
      {
        $msg=base64_encode("ERROR: on Page");
      } 
 
 
 	
 header("Location:".$base."feeManageGetStarted.php?response=$msg");

?>