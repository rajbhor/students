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
  <title>DU | Dashboard</title>
  <?php } else {?>
  <title>Dashboard | <?php echo $_SESSION['sessdeptname'];?></title>
  <?php } ?>
  <!-- Bootstrap core CSS -->
<?php require("includes/style.php");?>
<?php require("includes/javascript.php");?>
<?php require("includes/meta.php");?>
<script type = "text/javascript" >
function changeHashOnLoad() {
     window.location.href += "#";
     setTimeout("changeHashAgain()", "50"); 
}

function changeHashAgain() {
  window.location.href += "1";
}

var storedHash = window.location.hash;
window.setInterval(function () {
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);


</script> 
</head>

<body onload="changeHashOnLoad(); ">

  <!-- Fixed navbar -->
  
  
 <?php require("includes/head.php");?>
 <?php require("includes/sidebar.php"); ?>
  
  <div class="container-fluid" id="pcont">

<?php if($type=='admin'){ require("includes/useless.php"); } else {

  require("includes/uselessOperator.php");
}?>
</div>
 
</body>
</html>