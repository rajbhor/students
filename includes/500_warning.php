   <?php //require('includes/crm_cron.php');

//require("includes/server.php");?>
<?php //if($this->session->userdata('uid')=='')header('welcome/');?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require("includes/config.php");
//require("includes/userinfo.php");
//require("includes/crm.php");?>
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base;?>images/warn.jpg" />
 
<title>Fatal Warning!!</title>
 
<?php
//require("includes/javascript.php");
//require("includes/styles.php");
 ?>
</head>

<body onLoad="show5();">
<div id="container">
<?php //require("includes/header.php");?>
 <div id="clock">
 <?php //require("includes/subhead.php");?>

 </div>
<div id="menu">
 
  
 </div>

<?php  //require("includes/partner.php");?>
  

 
<?php //require("includes/social.php");?>

<div id="body">
  <br/><br/><br/>
  <div id="recent_activity">
  <center>
  <img width="40%" src="<?php echo base_url();?>images/warn.jpg">
  <br/>
  <small style="font-family:Segoe UI">It seems that you are trying to access the system from a computer whose time is set in the past or future. Please make sure the system time on your machine is fine and ok!!</small>

  <br/>
  <small style="color:darkgrey; font-size:10px; font-weight:bold; font-family:Segoe UI"> If you are not sure about this or want to learn more, contact software provider</small>
  
  </center>
   <?php 
   
   
   //require("includes/user_account.php");?>
  
  </div>

</div>
 
<div id="footer">
<?php //require("includes/footer.php");
?></div>
</div>
</body>
</html>

