<?php ob_start(); session_start();
require("../includes/configLogin.php");
require("../includes/auto_connect.php");
include ('class/MainFunction.php');
$stype=$_POST['stype'];
$creatorid=$_POST['creator'];
if($_SESSION['branch_type']=='dept'){
$q=mysql_query("select sf_code from department where dept_code=".$_SESSION['deptcode']);
$dep=mysql_fetch_array($q);
}
else {

$q=mysql_query("select sf_code from center where center_code=".$_SESSION['deptcode']);
$dep=mysql_fetch_array($q);

}
 

$depcode=$dep['sf_code']; //shortcode
 
//$dcode=mysql_query('select ');
 
$dp=$_SESSION['deptcode'];
 
$prime=mysql_query("select max(sl) as maxsls from  student_details    order by sl");

$rs=mysql_fetch_array($prime);
if($rs['maxsls']!=NULL || $rs['maxsls']!="NULL"){
 
$primary=$rs['maxsls']+1;

}
else {
$primary="1";
 
}
 
$bt=$_SESSION['branch_type'];


$scourse=trim($_POST['scourse']);

 
$syear=trim($_POST['syear']);
$syoa=trim($_POST['syoa']);
$sname=strtoupper($_POST['sname']);
$sdureg=trim($_POST['sdureg']);

if($sdureg=='' || $sdureg=='NULL' || $sdureg==NULL || empty($sdureg)){

	$sdureg="Not Available";
}
 
$sroll=trim($_POST['sroll']);
if($sroll=='' || $sroll=='NULL' || $sroll==NULL || empty($sroll)){

	$sroll="Not Available";
}

  $sfaname=ucwords(trim($_POST['sfaname']));
$smoname=ucwords(trim($_POST['smoname']));
$dobd=$_POST['dd'];
$dobm=$_POST['mm'];
$doby=$_POST['yy'];

if($dobd!="" && $dobm!="" && $doby!=""){
$sdob=trim("$doby"."-"."$dobm"."-"."$dobd");
}
else{
	$sdob="";
}
$ssex=trim($_POST['ssex']);
$scommunity=trim($_POST['scmmunity']);
$sregion=trim($_POST['sregion']);
$sfeecat=trim($_POST['sfeecat']);
$reside=$_POST['reside'];
 
$smob=trim($_POST['smob']);

if($smob==''  || empty($smob)){

	$smob="Not Available";
}
$sfee=trim($_POST['sfee']);
$semail=trim($_POST['semail']);
if($semail=='' || empty($semail)){

	$semail="Not Available";
}

 
if($sfbid=='' || empty($sfbid)) {

	$sfbid="Not Available";
}
$remarks=trim($_POST['remarks']);


//-----feepaid get data-----

$feeamount=trim($_POST['samountpaid']);
$feerecptno=trim($_POST['sfeercpno']);

// ---close feepaid data-----
 

$check=mysql_query("select max(sl) as maxsl from  student_details where dept_center_code='$dp' order by sl");
$r=mysql_fetch_array($check);
if($r['maxsl']!=NULL || $r['maxsl']!="NULL"){
$lastcode=$r['maxsl'];
$latestcode=$r['maxsl']+1;
$codelen=strlen($latestcode);



}
else {
$latestcode="1";
$codelen=strlen($latestcode);

}
 
if($bt=='dept'){
switch ($codelen) {
	case '1':
		$studentcode=trim($depcode."-00000".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	case '2':
		$studentcode=trim($depcode."-0000".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;

	case '3':
		$studentcode=trim($depcode."-000".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	case '4':
		$studentcode=trim($depcode."-00".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	case '5':
		$studentcode=trim($depcode."-0".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	
	default:
		$studentcode=trim($depcode."-".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
}

}
else {
switch ($codelen) {
	case '1':
		$studentcode=trim($depcode."-00000".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	case '2':
		$studentcode=trim($depcode."-0000".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;

	case '3':
		$studentcode=trim($depcode."-000".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	case '4':
		$studentcode=trim($depcode."-00".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	case '5':
		$studentcode=trim($depcode."-0".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
	
	default:
		$studentcode=trim($depcode."-".$latestcode);
		$passcode=$depcode.rand(1000,10000).$dobd;
		break;
}

}

if($scourse!="" && $syear!="" && $syoa!="" && $sname!="" && $sfaname!="" && $smoname!="" && $sdob!="" &&  $ssex!="" && $scommunity!="" && $sfeecat!="" && $sfee!="" ){
	  
 
$sql1="INSERT into fee_paid(student_detail_id,fee_paid,recept_no) VALUES($primary,'$feeamount','$feerecptno')";
$result1=mysql_query($sql1) or die ("ERROR: $sql1. " .mysql_error());

$sql="insert into student_details(sl,dept_center_code,dept_center_course_code,semester_code,year_of_admission,student_name,registration_no,
	roll_no,fathers_name,mothers_name,dob,sex,community,region,fee_category,mb_no,fee_paid_upto_semester_code,email_id,student_id, stype,password,belongs_to_center_dept,created_by_id,remarks,reside)
values($primary,'$dp','$scourse','$syear','$syoa','$sname','$sdureg','$sroll','$sfaname','$smoname','$sdob','$ssex','$scommunity','$sregion','$sfeecat','$smob','$sfee','$semail',
	'$studentcode', '$stype','$passcode','$bt','$creatorid','$remarks','$reside')";
$result=mysql_query($sql) or die ("ERROR: $sql. " .mysql_error());

}
 if($result && $result1)
      {
        $msg1=base64_encode("Records Saved Successfully");
	header("Location:".$base."studentEntryGetStarted.php?response=$msg1");
      }
      else
      {
            $msg=base64_encode("Records Not Save some important fields are empty!");
	    header("Location:".$base."studentEntryGetStarted.php?errorResponse=$msg");
      } 
  
?>