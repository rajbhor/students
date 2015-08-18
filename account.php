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
  <title>DU | Administrator Account</title>
  <?php } else {?>
  <title>User Account | <?php echo $_SESSION['sessdeptname'];?></title>
  <?php } ?>
  <!-- Bootstrap core CSS -->
<?php require("includes/style.php");?>
<?php require("includes/javascript.php");?>
<?php require("includes/meta.php");?>
<?php require("includes/accountInfo.php");?>

 
</head>

<body>

  <!-- Fixed navbar -->
  
  
 <?php require("includes/head.php");?>
  <?php require("includes/sidebar.php"); ?>
  <div class="container-fluid" id="pcont">

<?php if($type=='admin'){ require("includes/adminAccount.php"); } else {

  require("includes/adminAccount.php");
}?>
</div>
 
</body>
</html>
