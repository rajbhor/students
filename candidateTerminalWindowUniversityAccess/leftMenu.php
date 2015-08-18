<?php if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
     
 ?>
 
 <ul class="navigation" style="">            
            <li>
                <a href="<?php echo $bases;?>terminalLanding.php">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a title="Pay and manage your university fees online through this panel" rel="tooltip" href="<?php echo $bases;?>actions/processfees.php">
                    <span class="isw-archive"></span><span class="text">Fees Management</span>                 
                </a>
            </li>                        
            
            <li>
                <a title="Manage and update your academic and personal information through this panel" href="<?php echo $bases;?>actions/processShowProfile.php">
                    <span class="isw-user" ></span><span class="text">Profile Management</span>
                </a>                  
            </li>  
           <li>
                <a title="Clear all your confusions regarding the system with this Frequently Asked Questions and Answers Panel" href="<?php echo $bases;?>faqPanel.php">
                    <span class="isw-settings" ></span><span class="text">FAQs</span>
                </a>                  
            </li> 
                                    
        </ul> 
   
      <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
         <div class="dr"><span></span></div>    