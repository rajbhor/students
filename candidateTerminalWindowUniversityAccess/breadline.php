<?php if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
	 
 ?><div class="breadLine">
            
            <ul class="breadcrumb">
                <li><font style="color:green; font-weight:bold; font-size:13px">Porgramme <?php echo $_SESSION['department_center_course']; ?></font><span class="divider">></span></li>                
            </ul>
                        
            
            
        </div>