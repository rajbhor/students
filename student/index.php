<?php require("configs.php");?>
<?php require("auto_connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>Login - Student Login Panel</title>

     <?php
            include("incljs.php");
        ?>
        
    
</head>
<body>
    
    <div class="loginBox">        
        <div class="loginHead">
            <img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/>
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
            <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox"> Remember me</label>                                                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        </form>        
        
    </div>    
    
</body>
</html>
