<html>
<?php
ob_start();
session_start(); 
include("pgconfig.php");
require("../includes/auto_connect.php"); 

if(!isset($_SESSION['logged_in']))
    {
        header("Location: index.php");
    }
$department = $_SESSION['department_center'];

if($department=="Dibrugarh University Institute Of Engineering And Technology (DUIET)")
{
    $Account="DUIET";
}
else
{
    $Account="GENERAL";
}

$course = $_SESSION['department_center_course'];

$user_id=$_POST['user_id'];

$q=mysql_query("SELECT * FROM `student_details` s, fee_structure f where s.`belongs_to_center_dept` = f.`type` and s.`dept_center_code` = f.`center_dept_code` and s.`dept_center_course_code` = f.`course_code` and s.`semester_code` = f.`sem_year`and s.`student_id` ='".$user_id."' group by s.`dept_center_code`");

while($rows = mysql_fetch_array($q))
{

    $admission_fee = $rows['admission_fee'];

    $course_fee = $rows['course_fee_year_sem'];

    $Library_fee = $rows['library_fee'];

    $union_magazine_fee = $rows['union_magazine'];

    $safety_insurance_fee = $rows['saf_fee'];

    $Development_fee  =$rows['development_fee'];

    $Laboratory_fee= $rows['laboratory_fee'];
    
    $interent_fee = $rows['interent_fee'];
                        
    $hostel_fee = $rows['hostel_fee'];
                        
    $student_aid_fee = $rows['student_safety'];
                        
    $sports_fee = $rows['sports_fee'];
                       
    $total_fee = $rows['total_fee'];

    $hostel_required = $rows['reside'];

    $sl_no=$rows['sl'];

    $Semester_code=$rows['semester_code'];

   $student_name=$rows['student_name'];

}

if($hostel_required==1){sprintf('%0.2f', $total_fee=$total_fee + $hostel_fee);}else{sprintf('%0.2f', $total_fee=$total_fee);}

//payment gateway start
$TxnAmount=sprintf('%0.2f',$total_fee);

$CustomerID=strtoupper($sl_no.'-'.uniqid());

$Customer_email=$_POST['email_id'];

$Customer_phone=$_POST['moblie_no'];

$str=$MerchantID."|".$CustomerID."|"."NA"."|".$TxnAmount."|"."NA"."|"."NA"."|"."NA"."|".$CurrencyType."|"."NA"."|".$TypeField1."|".$SecurityID."|"."NA"."|"."NA"."|".$TypeField2."|".$Customer_email."|".$Customer_phone."|".$Account."|".$Semester_code."|"."NA"."|"."NA"."|"."NA"."|".$RU;

$newDataWithChecksumKey = $str."|".$checkSumKey;
 
$checksum = strtoupper(hash_hmac('sha256',$newDataWithChecksumKey, false));

$dataWithCheckSumValue = $str."|".$checksum;
              
$msg = $dataWithCheckSumValue;
	
//data insertion
$result = mysql_query("INSERT INTO `order` (`customer_id`, `student_name`, `Customer_email`, `Customer_phone`,`order_id`,`total_amount`, `status`, `semester`, `department`, `course`, `account`) VALUES('$user_id', '$student_name', '$Customer_email', '$Customer_phone','$CustomerID','$TxnAmount','PENDING', $Semester_code, '$department', '$course', '$Account')") or die();

?>
<head><title>Processing..</title>
<script language="javascript">
function onLoadSubmit() {
	document.merchantForm.submit();
}
</script>
</head>

<body onload="onLoadSubmit();">
	<br />&nbsp;<br />
	<center><font size="5" color="#3b4455">Transaction is being processed,<br/>Please wait ...</font></center>

	<form name="merchantForm" method="post" action="pgresponse.php">

	<input type="hidden" name="msg" value="<?php echo $msg;?>" />

	<noscript>
		<br />&nbsp;<br />
		<center>
		<font size="3" color="#3b4455">
		JavaScript is currently disabled or is not supported by your browser.<br />
		Please click Submit to continue the processing of your transaction.<br />&nbsp;<br />
		<input type="submit" />
		</font>
		</center>
	</noscript>
	</form>
</body>
</html>
