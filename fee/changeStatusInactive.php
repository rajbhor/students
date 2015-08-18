<?php ob_start(); require("configLogin.php");
require("auto_connect.php");
$id=base64_decode($_GET['feeid']);
$q=mysql_query("update  fee_structure set status=0 where fee_id=$id");
if($q)
  {
    $m= base64_encode("Fee Slab Status has been succesfully changed."); 
     header("Location:".$base."feeManageGetStarted.php?response=$m");
  
  }
  else
  {
    $m=base64_encode("Transaction Failed. Please try again");
       header("Location:".$base."feeManageGetStarted.php?errorResponse=$m");
   
 
  }
 
?>

 