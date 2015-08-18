<?php 
ob_start();
session_start();

include("pgconfig.php");
require("../includes/auto_connect.php"); 

$student_name=$_SESSION['student_name'];

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
if(!isset($_SESSION['logged_in']))
    {
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Fee Details</title>
    <link rel="stylesheet" type="text/css" href="css/table.css">

    <?php 
        include("incljs.php");
    ?>
    
</head>
<style type="text/css">
    .table1{
        border: 1px solid;
        width:400px;
        height: 200px;
    }
</style>
<body topmargin="0" leftmargin="0" onLoad="disableClick()">
<br/>
<div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" width="50" height="50" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
</div>
</br>
    
<div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, <?php echo $student_name; ?>
            </div>
        </div>
        
        <?php
            include("photo_dept_logout.php");
            include("leftMenu.php");
        ?>
        
        
</div>
<div class="content">
 
        
        <?php
            include("breadline.php");
        ?>
<div id="print-me">
<center>        
<h3><font color="#0000FF">Payment Details</font></h3>     
<?php

$msg=$_POST["msg"];

//$msg="MYSITE|2038-55D1C7458BCB0|TRNI0412001668|NA|00005656.00|CIT|33388907|NA|INR|DIRECT|NA|NA|NA|1 -12-2011 17:08:16|0300|NA|NB|NB|NA|NA|NA|NA|NA|NA|NA|3EE50165D1B53D0D9F48A59D6003B1E8AB4045EBAA18C1E15B9ABF4B737E6ABF";

$splitdata = explode('|', $msg);


if($msg!="")
{

$response_checksum = substr(strrchr($msg, "|"), 1); //Last check sum value

$string_new = str_replace("|".$response_checksum,"",$msg);//string replace : with empy space

$checksum = strtoupper(hash_hmac('sha256',$string_new,$checkSumKey, false));// calculated  check sum

$order_id=$splitdata[1];

$transaction_id=$splitdata[2];

if($checksum==$response_checksum && $splitdata[14]=="0300") // success trans condition

{

// Here success txn data base save code
echo "<h4>"."<font color='green'>"."Your Payment is Successful"."</font>"."</h4>";
$result = mysql_query("UPDATE `ORDER` set status='SUCCESS',trans_id='$transaction_id' where order_id='$order_id'") or die();

}else{

echo "<h4>"."<font color='red'>"."Your Payment is Failed"."</font>"."</h4>";
$result = mysql_query("UPDATE `ORDER` set status='FAILURE',trans_id='NA' where order_id='$order_id'") or die();

}


$query=mysql_query("SELECT * FROM `order` where order_id='$order_id'");
while($rows=mysql_fetch_array($query))
{
	$order=$rows['order_id'];
	$student_id=$rows['customer_id'];
	$transaction=$rows['trans_id'];
	$status=$rows['status'];
	$total_amount=$rows['total_amount'];
	$student_name=$rows['student_name'];
	$semester=$rows['semester'];
	
}

}
 ?>
 
 <table class="CSSTableGenerator">
 <th></th><th></th>
<tr>
	<td>Order Id</td><td><?php echo $order ?></td>
</tr>

<tr>
	<td>Transaction Id</td><td><?php echo $transaction ?></td>
</tr>
<tr>
	<td>Student Id</td><td><?php echo  $student_id ?></td>
</tr>
<tr>
	<td>Semester</td><td><?php echo $semester ?></td>
</tr>
<tr>
	<td>Amount</td><td><?php echo $total_amount ?></td>
</tr>
<tr>
	<td>Status</td><td><?php echo $status ?></td>
</tr>	
</table>
</div>
<br><br><br>
<center>
    <div>
        NB:Pease Note the order id for future reference  related to payment.
        <a href="#" onclick="printContent('print-me')"><button class="btn btn-primary"  type="button"> Print</button></a>
    </div>
</center>       
</div>    
<script language="javascript" type="text/javascript">

    function printContent(el){

    var restorepage = document.body.innerHTML;

    var printcontent = document.getElementById(el).innerHTML;

    document.body.innerHTML = printcontent; window.print(); 

    document.body.innerHTML = restorepage; }
</script>
   


</body>

</html>
