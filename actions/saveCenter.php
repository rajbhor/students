<?php ob_start(); require("../includes/configLogin.php");
require("../includes/auto_connect.php");
include ('class/MainFunction.php');
$deptname=ucwords(trim($_POST['dept']));
$scode=strtoupper(trim($_POST['scode']));

$query = "insert into  center (center_name,sf_code) values('$deptname','$scode') ";
$result = mysql_query($query) or die ("ERROR: $query. " . mysql_error());
 if($result)
  {
    $m= base64_encode("Center added successfully"); 
     header("Location:".$base."centerGetStarted.php?response=$m");	
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
     header("Location:".$base."centerGetStarted.php?errorResponse=$m");
  }
   

 ?>
