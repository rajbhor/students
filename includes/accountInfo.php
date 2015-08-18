<?php $r=mysql_query("select * from g_users where  status='A' and user_id=$uids");  

while($rw=mysql_fetch_array($r)){

	$adid=$rw['user_id'];

 
$adunm=$rw['user_name'];
$adpwd=$rw['password'];
$adip=$rw['user_login_ip'];
$adtime=$rw['login_time'];
$adlogged=$rw['user_logged_in'];
$adname=$rw['op_name'];
$adnames=$rw['op_name'];
if($adname=="NULL" || $adname==NULL || empty($adname)){
	
	$adname="Not Available";
}

}

?>