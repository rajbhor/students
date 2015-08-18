<?php ob_start(); require("auto_connect.php");
require("configLogin.php");
$id=$_GET['id'];
$branch=$_GET['branch'];
$usertype=$_GET['usertype'];
 
$q=mysql_query("delete from student_details where sl=$id");
 
if($usertype=='operator'){

header("Location:".$base."studentManager.php?response=".base64_encode('Student has been truncated successfully from university database!!'));

}
 

?>