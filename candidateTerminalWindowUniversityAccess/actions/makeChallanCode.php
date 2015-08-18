<?php ob_start();
session_start();
require("../../includes/auto_connect.php");
require("../../includes/config.php");

$amount=$_GET["amount"];
$date=date("Y-m-d");
$semester=$_SESSION['semester_code'];
$userid=$_SESSION['username'];
$total_amount = $_POST["totalamount"];
$challanno1=$_POST["challanno01"];
$challanno2=$_POST["challanno02"];
$fees_id=$_SESSION['feeid'];
//echo "name:".$userid;
//echo "date:".$date;
//echo "sem:".$semester;
//echo "amount:".$total_amount;
//echo "feeid:".$fees_id;

$prime=mysql_query("select max(paid_fee_id) as maxsls from  payment order by paid_fee_id");
$rs=mysql_fetch_array($prime);
if($rs['maxsls']!=NULL || $rs['maxsls']!="NULL"){
 
$primary=$rs['maxsls']+1;
 
}
else {
$primary="1";
 
}






$sql="insert into payment(paid_fee_id,fee_id,student_id_fee,sem_year_fee,challan_no,amount,payment_mode,date,challan_status)
values($primary,'$fees_id','$userid','$semester','$challanno2','$total_amount','challan','$date','pending')";
$result=mysql_query($sql) or die ("ERROR: $sql. " .mysql_error());
 if($result)
      {
        $msg=base64_encode("Records Saved Successfully");     
      }
      else
      {
            $msg=base64_encode("Error on Page");
      } 


 header("Location:".$bases."makeChallan.php?response=$msg");
?>