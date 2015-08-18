<div id="cl-wrapper" class="login-container"> 
  <div class="middle-login">
    <div class="block-flat">
      <div class="header">              
        <h3 class="text-center"><img  style="width:70px" class="logo-img" src="<?php echo $base;?><?php echo $crmlogo;?>" alt="logo"/><?php echo $cname;?></h3>
      </div>
      <div>
         
          <div class="content">
            <h4 class="title">Login Access &raquo; <small style="font-size:11px; font-weight:bold; color:darkgrey"><br/>Please provide a username and password to login</small></h4>
               
             <form method="post" action="<?php echo $base;?>actions/processLogin.php"  style="margin-bottom: 0px !important;" class="form-horizontal" >
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="label label-success" style="font-weight:bold;">Login ID</label>
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input title="Please enter a login ID" type="text" placeholder="Username" id="username"
                    onKeyPress="return no(event);" autocomplete="off" name="uname" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="label label-success" style="font-weight:bold">Password</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input title="Please provide a login password" type="password" placeholder="Password" onKeyPress="return no(event);" name="pwd" id="password" class="form-control">
                  </div>
                </div>
              </div>
              
          </div>
           <div style="padding-left: 30px;padding-top: 5px;">
              <?php $error=$_GET['loginRedirect'];?>
             <?php if(@$error!=''){?>
                                   <span class='label label-danger' style='font-size:12px; font-weight:bold; float:left'><i class="fa fa-warning"></i> <?php echo @base64_decode($error);?></span>
                                   <?php } ?>
                </div>
          <div class="foot">
            <!-- <button class="btn btn-default" data-dismiss="modal" type="button">Register</button> -->
            <button class="btn btn-primary"   type="submit"><i class="fa fa-sign-in"></i> Enter System</button> 
             
              </div>
              </form>
            
          </div>
        </form>
      </div>
    </div>