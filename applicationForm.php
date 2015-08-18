<?php ob_start(); require("includes/config.php");?>
<?php require("includes/auto_connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
 
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base;?><?php echo $crmlogo;?>"/>
 
  <!-- Bootstrap core CSS -->
<?php require("includes/style.php");?>
<?php require("includes/javascript.php");?>
<?php require("includes/meta.php");?>
 
</head>

<body>

  <!-- Fixed navbar -->
  <?php require("application/admissionForm.php");?>

  
  <div class="container-fluid" id="pcont">
 
</div>
 
</body>
</html>
