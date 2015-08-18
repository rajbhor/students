<div class="row dash-cols">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="block">
            <div class="header" style="background:#5cb85c">
              <h2 style="font-size:23px;color:white"><i class="fa fa-plus"></i>Student Entry</h2>
            </div>
            
<div class="content no-padding" style="">
              <div class="fact-data text-center">
                
                     <a   href="<?php echo $base;?>studentEntryGetStarted.php"> <button data-popover="popover" type="button" class="btn btn-success" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's departments management panel and start exploring the system!" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 

                
              </div>
              <div class="fact-data text-center">
              <span class="label label-success">Click on Get Started</span>

              </div> 
            </div>
          </div>
             
            
            
        </div>  
        <div class="col-sm-6 col-md-6 col-lg-4" >
          <div class="block" >
            <div class="header" style="background:#FF9900" >
              <h2 style="font-size:23px; color:white"><i class="fa fa-users"></i>Student Manager</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
                 <a href="<?php echo $base;?>studentManager.php">
                   <button data-popover="popover" type="button" class="btn btn-warning" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's course management panel and start exploring the system!" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 

              </div>
              <div class="fact-data text-center">
                 <span class="label label-warning">Click on Get Started</span>
    
                   
                 
              </div> 
            </div>
          </div>
             
        </div>  
        <div class="col-sm-6 col-md-6 col-lg-4" style="display:">
          <div class="block">
            <div class="header" style="background:#4D90FD">
              <h2 style="font-size:23px; color:white"><?php if($_SESSION['branch_type']=='dept'){?><i class="fa fa-book"></i><?php } else {?>
               <i class="fa fa-sitemap"></i> <?php } ?>Course Manager</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
               <a target="_blank" href="<?php echo $base;?>courseLoggerGetStarted.php">
                   <button data-popover="popover" type="button" class="btn btn-primary" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's Course management panel under <?php echo $loggername;?> and start exploring the system!" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 

              </div>
              <div class="fact-data text-center">
             
           <span class="label label-primary">Click on Get Started</span>
    
                             
              </div>
            </div>
          </div>
           
        </div>