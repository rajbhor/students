<?php ob_start(); session_start();
require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$btype=$_SESSION['branch_type']; //dept center
$center_dept_code=$_SESSION['deptcode'];
 
 
$flabel=stripslashes(trim($_POST['flabel']));
if($flabel!=''){
			$q=mysql_query("select * from fee_dump_du  where dump_name='$flabel'");
			if(mysql_num_rows($q)>=1){}
			else{
            $insert=mysql_query("insert into fee_dump_du(dump_name) values('$flabel')");
			}
		}






date_default_timezone_set("Asia/Kolkata");
$added_on=date('d-m-Y');
$creator=$_SESSION['uids'];

$query=mysql_query("insert into  fee_structure_master_du(fee_label,fee_for_dept_center,center_dept_code,added_on,created_by_id) values('$flabel','$btype','$center_dept_code','$added_on',$creator)") or die(mysql_error());

header("Location:".$base."feeMaster.php?response=".base64_encode("Fee Structure has been created and saved successfully under the selected criteria"));



 