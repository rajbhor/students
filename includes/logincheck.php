<?php  
session_start();
$logged=$_SESSION['logged_in'];

if($logged==FALSE){

	 header("Location:".$base."index.php");


}
else {
//do nothing

}