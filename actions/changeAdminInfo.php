<?php ob_start();require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$unm=mysql_real_escape_string((trim($_POST['unm'])));
$pwd=mysql_real_escape_string((trim($_POST['pwd'])));
$nm=mysql_real_escape_string((ucwords(trim($_POST['nm']))));
if($nm=='' || empty($nm)){
       
       $nm='';
}
$uid=$_GET['id'];


 if(empty($unm) || $unm==''){

 	$unm="admin";
 }

 if(empty($pwd) || $pwd==''){

 	$pwd="admin";
 }
 
 
	$q2=mysql_query("update g_users set user_name='$unm' ,password='$pwd',op_name='$nm' where user_id=$uid");
	 

header("Location:".$base.'account.php?msg='.base64_encode('Administrator account has been successfully modified'));

 