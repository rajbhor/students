<?php
require("../includes/config.php");
require("../includes/auto_connect.php");
$lib=mysql_real_escape_string((trim(ucwords($_POST['lib']))));
$short=mysql_real_escape_string((trim(strtoupper($_POST['short']))));


 if(empty($lib) || $lib==''){

 	$lib="Dibrugarh University";
 }

 if(empty($short) || $short==''){

 	$short="DUCP";
 }
 
 
	$q2=mysql_query("update g_settings set company_name='$lib' ,short_form='$short'");
	 

header("Location:".$base.'dashboard.php?msg='.base64_encode('System Title has been successfully modified'));

 