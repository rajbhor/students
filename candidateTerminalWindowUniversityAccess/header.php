<?php  if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
	 
 ?> <div class="header" style="position:fixed;height:80px;z-index:5000">
        <a target="_blank"  class="logo" href="http://www.dibru.ac.in" style="color:white;text-decoration:none"><img style="margin-top:-8px; padding-left:10px" width="45%" src="<?php echo $bases;?>img/dibru.png" alt="Dibrugarh University" title="DU-Logo"/></a>
        <div align="center"><h3><font color="#fff">DU CANDIDATE PANEL <?PHP echo $date=Date('Y'); ?></font></h3></div>		
        <div align="right"><h5><a href="<?php echo $bases;?>Logout.php"><font color="#fff">Logout</font></a>&nbsp;&nbsp;&nbsp;</h5></div>	
    </div>

    
    <br/>
    <br/>