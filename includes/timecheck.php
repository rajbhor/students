<?php date_default_timezone_set("Asia/Kolkata") ;
$date=date('Y');

$datelist=array($date,'2015','2016','2017','2018','2019','2020');
if(!in_array($date, $datelist)) {
	require("500_warning.php");
	exit();
}