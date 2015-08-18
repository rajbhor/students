<?php include("pgconfig.php"); ?>
<?php
session_start(); 
require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$student_id = $_SESSION['student_id'];
$semester_code = $_SESSION['semester_code'];
$transactionTypeCode=$_POST["transaction_type_code"];
$installments=$_POST["installments"];
$transactionId=$_POST["transaction_id"];

$amount=$_POST["amount"];
$exponent=$_POST["exponent"];
$currencyCode=$_POST["currency_code"];
$merchantReferenceNo=$_POST["merchant_reference_no"];

$status=$_POST["status"];
$eci=$_POST["3ds_eci"];
$pgErrorCode=$_POST["pg_error_code"];

$pgErrorDetail=$_POST["pg_error_detail"];
$pgErrorMsg=$_POST["pg_error_msg"];

$messageHash=$_POST["message_hash"];


$messageHashBuf=$pgInstanceId."|".$merchantId."|".$transactionTypeCode."|".$installments."|".$transactionId."|".$amount."|".$exponent."|".$currencyCode."|".$merchantReferenceNo."|".$status."|".$eci."|".$pgErrorCode."|".$hashKey."|";

$messageHashClient = "13:".base64_encode(sha1($messageHashBuf, true));

$hashMatch=false;

if ($messageHash==$messageHashClient){
  $hashMatch=true;
} else {
  $hashMatch=false;
} 
 function getPicture($str){

$q=mysql_query("select profile_pic_name from student_details where student_id='$str'");
if(mysql_num_rows($q)){
while($row=mysql_fetch_array($q)){

    $picture=$row['profile_pic_name'];
    if($picture==NULL || $picture=='' || empty($picture) || $picture=="NULL"){

        $path=$bases."actions/no_image/no_image.jpg";
    }
    else {

      $path=$bases."actions/".$picture;
    }
}
}
else {

   $path=$bases."actions/no_image/no_image.jpg";
}
return $path;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->

    <title>Fee Details</title>

    <?php 
        include("incljs.php");
    ?>
    
</head>
<body topmargin="0" leftmargin="0">
<div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
</div>
    
<div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, <?php echo $student_id; ?>
            </div>
        </div>
        
        <?php
            include("photo_dept_logout.php");
        ?>
        
        <?php
            include("leftMenu.php");
        ?>
        
        
</div>
<div class="content">
 
        
        <?php
            include("breadline.php");
        ?>
        <div class="workplace">
        <form name="pgtest" method="post" action="pgrequest.php">    
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Payment Details</h1>
                    </div>
                    <div class="block-fluid"  id="divID">
                        <div style="height: 100%; width: 50%;margin: 0 auto; font-size: 14px; border: 1px solid #ccc;border-bottom-left-radius: 3px;border-bottom-right-radius: 3px;">
                       
                             <div style="height: 50px; color: #CC3333; font-weight: bold; width: 100%; font-size: 26px; ">
                               <div style="height: 10px; "> </div>
                               <div style="text-align: center;"> DIBRUGARH UNIVERSITY</div>
                               <div style="text-align: center;font-size: 16px;"> DIBRUGARH - 786004</div>
                             </div>
                             <?php  
	$qryPaid = mysql_query("INSERT INTO `online_pay` (`student_id`,	`sem_year`, `fee_paid`, `payment_mode`, `transaction_id`, `status`) VALUES('$student_id','$semester_code','$amount','card payment','$transactionId','$pgErrorMsg')") or die();
?>
 <label class="success"> Your Payment is Successfull. Your Transaction Id is <?php echo $transactionId;?> </label>
 <table class="table">
 <tr>
 	<td>Student Id</td>
 	<td><?php  echo $student_id; ?></td>
 </tr>
 	<tr>
 		<td>
 			Fee Paid:
 		</td>
 		<td>
 		<?php
 			$length = strlen($amount);
 			$intvalue = substr($amount,0,-2);
 			$strtIndex = $length-2;
 			$decimalValue = substr($amount,$strtIndex,$length); 
 			
 			$fee_paid = $intvalue.".".$decimalValue;
 			echo $fee_paid; ?>
 		</td>
 	</tr>
 	<tr>
 		<td> Semester </td>
 		<td> <?php echo $semester_code; ?></td>
 	</tr>
 	
    <tr id="hiddenRow">
		<td colspan="2">
	    <center>
	        <a href="#" onclick="javascript:printDiv('divID')"><button class="btn btn-primary"  type="button"> Print</button></a>
				
	    </center>
		</td>
    </tr>
                            
    </table>
<script language="javascript" type="text/javascript">

    function printDiv(divID) {
   
        var divElements,entryBox;
        //Get the HTML of div

      //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
       document.getElementById("hiddenRow").style.display = 'none';
        //preparing page for printing
        
        // page is prepared :)

        
        //Reset the page's HTML with div's HTML only
     divElements= document.getElementById(divID).innerHTML;
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;
       
        
    }
</script>
    </div>
    </div>
   </div>                 
</div>
</form>
        </div>
        
    </div>


</body>

</html>