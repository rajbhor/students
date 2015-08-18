<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$sl=$_GET['sl'];

$syoa=trim($_POST['syoa']);
$sfeecat=trim($_POST['sfeecat']);
$sfee=trim($_POST['sfee']);
$sfamount=trim($_POST['samountpaid']);
$sfrecpt=trim($_POST['sfeercpno']);
$reside=$_POST['reside'];


$stud_id = array();
$query = mysql_query("select * from fee_paid");
while($fetch = mysql_fetch_assoc($query)) {
  array_push($stud_id, $fetch['student_detail_id']);
}
//print_r($stud_id);
//echo "Serial No. ".$sl."<br/>";

if(in_array($sl, $stud_id)) { 
 $qq1=mysql_query("update fee_paid set fee_paid=$sfamount , recept_no='$sfrecpt' where student_detail_id=$sl");
} else {
   
  $qq12=mysql_query("INSERT into fee_paid (student_detail_id,fee_paid,recept_no) values ($sl,'$sfamount','$sfrecpt')");
 
}




//$qq1=mysql_query("update fee_paid set fee_paid=$sfamount , recept_no='$sfrecpt' where student_detail_id=$sl");
//echo "update fee_paid set fee_paid='$sfamount' , recept_no='$sfrecpt', where student_detail_id=$sl".$qq1;

//exit();

$q=mysql_query("update student_details set year_of_admission='$syoa' , fee_paid_upto_semester_code=$sfee,
 fee_category=$sfeecat, reside=$reside where sl=$sl");
 
if($q && $qq1)
  {
    $m= base64_encode("Student fee and admission details has been successfully modified."); 
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."universityStudentProfileWindowViewer.php?sl=".base64_encode($sl)."&errorResponse=$m");
 	
   
 
  }
  
 

 
