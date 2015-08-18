<?php
	
	ob_start();
	session_set_cookie_params(1200); 
	session_start();
	
	require("configs.php");
	if(isset($_SESSION['logged_in']))
	{
	session_destroy();
	header("Location:".$bases."index.php");
	}
	
	
	
?>
