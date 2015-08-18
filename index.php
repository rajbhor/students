<?php require("includes/configLogin.php");?>
<?php require("includes/auto_connect.php");?>
<!DOCTYPE html>

<html lang="en">
<head>
  
   
  
    <?php require("includes/libraryinfo.php");?>
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base;?><?php echo $crmlogo;?>"/>
  <title>DU | Login</title>
  <!-- Bootstrap core CSS -->
<?php require("includes/style.php");?>
<?php require("includes/javascript.php");?>
<?php require("includes/meta.php");?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
  <![endif]-->

  <!-- Custom styles for this template -->
 
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

<body class="texture" onload="changeHashOnLoad(); ">
<?php require("includes/login.php");?>

   <?php require("includes/footer.php");?>
  </div> 
  
</div>


</body>
</html>
