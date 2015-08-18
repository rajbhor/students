<?php ob_start(); require("includes/config.php");?>
<?php require("includes/auto_connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
 
 <?php require("includes/logincheck.php");?>

    <?php require("includes/libraryinfo.php");?>
      <?php require("includes/loginfo.php");?>


      <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base;?><?php echo $crmlogo;?>"/>
  <?php if($type=='admin'){?>
  <title>DU | Fee Structure Entry</title>
  <?php } else {?>
  <title>Fee Structure Entry | <?php echo $_SESSION['sessdeptname'];?></title>
  <?php } ?>
  <!-- Bootstrap core CSS -->
<?php require("includes/style.php");?>
<?php require("includes/javascript.php");?>
<?php require("includes/meta.php");?>
 
</head>

<body>

  <!-- Fixed navbar -->
  
  
 <?php require("includes/head.php");?>
  <?php require("includes/sidebar.php"); ?>
  <div class="container-fluid" id="pcont">

<?php if($type=='admin'){ require("fee/feeGetStartedLogger.php"); } else {


if($_SESSION['branch_type']=='dept'){require("fee/feeGetStartedLogger.php");}

  else {
require("fee/feeGetStartedLogger.php");

  }
  
}?>
</div>
 
</body>
</html>
