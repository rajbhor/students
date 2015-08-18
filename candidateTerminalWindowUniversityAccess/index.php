<?php require("../includes/config.php");?>
<?php require("../includes/auto_connect.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>        
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>Login - Student Login Panel</title>

     <?php
            include("incljs.php");
        ?>
        
    <style type="text/css">
	.footer{
		position:absolute;
		bottom:0px;
		height:10%;
		width:100%;
		background:black;
		
	}
</style>  
</head>
<body onload="changeHashOnLoad(); ">
    
    <div class="loginBox"> 
    <?php
        $token = base64_decode($_GET['loginRedirect']);
        if(isset($token))
        {
            echo "<span  class='label label-danger'>".$token."</span>";
        }
    ?>       
        <div class="loginHead">
            <a href="#"><img src="img/logo.png" width="60" height="60" alt="" title="Log In"/>&nbsp;&nbsp;&nbsp;<font color="#fff">Candidate Login Panel</font>
        </div>
        <form class="form-horizontal" action="actions/processLogin.php" method="POST">            
            <div class="control-group">
                <label for="inputEmail">Login ID</label>                
                <input type="text" id="uname" name="uname"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" id="pwd" name="pwd"/>                
            </div>
           <!--  <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox"> Remember me</label>                                                
            </div> -->
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Log in</button>
            </div>
        </form>        
        
    </div>    
    <div id="footer" class="footer">
			<font  style="float:right;"><a href="privacyStatement.php" target="_blank">Privacy Statement</a>  &nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;<a href="refundPolicy.php" target="_blank">Refund Policy</a>  &nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;<a href="termsandconditions.php" target="_blank">Terms & Conditions</a></font>
	</div>
</body>
</html>