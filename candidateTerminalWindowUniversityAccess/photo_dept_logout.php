<?php 
if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} ?>
 <?php 
             $imagepath=getPicture($myname);?><style type="text/css">

.img-circular{
 width: 100px;

 height: 100px;
 background-image: url('<?php echo $imagepath;?>');
 background-size: cover;
 display: block;
 border-radius: 100px;
 -webkit-border-radius: 100px;
 -moz-border-radius: 100px;
}
</style>
<div class="admin">
            <div align="center" class="img-circular">
               
               <!-- <img src="<?php //echo $imagepath;?>" class="img-circular" style="width:110px;height:110px" > </a>    -->             
            </div>
            <ul class="control">                
                <li><?php echo $_SESSION['department_center']; ?></li>
                
                <li><span class="icon-share-alt"></span> <a href="<?php echo $bases;?>Logout.php">Logout</a>&nbsp;&middot;&nbsp;</li>
                  
            </ul>
            
        </div>