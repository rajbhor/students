<div id="cl-wrapper" >
    <div class="cl-sidebar" >
      <div class="cl-toggle"><i class="fa fa-bars"></i></div>
      <div class="cl-navblock">
        <ul class="cl-vnavigation">
           <li><a href="<?php echo $base;?>dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
           
        <?php if($type=='admin'){?>
        
         
          <li><a title="Get Started with Department Management" 
            href="<?php echo $base;?>departmentGetStarted.php"><i class="fa fa-tasks"></i>Department Manager</a></li>
          <li>
            <a title="Get Started with Department-Course Management" 
            href="<?php echo $base;?>courseGetStarted.php"><i class="fa fa-book"></i>Dept-Course Manager</a>

          </li>
          <li>
            <a title="Get Started with Center Management" href="<?php echo $base;?>centerGetStarted.php/"><i class="fa fa-random"></i>Center Manager</a>


          </li>

           <li>
            <a title="Get Started with Center-Course Management" href="<?php echo $base;?>centerCourseGetStarted.php/"><i class="fa fa-sitemap"></i>Center-Course Manager</a>


          </li>


            
 <?php if($type=='admin'){?><li><a title="Get Started with University Department Operator Management" href="<?php echo $base;?>/userGetStarted.php/"><i class="fa fa-users"></i>Operator Management</a></li>
<?php } ?>


   <li>
            <a data-toggle="modal"
            title="Click here to add a new student in a particular center of the University" 
            href="<?php echo $base;?>administratorCenterStudentEntry.php"><i class="fa fa-plus"></i>Center Student Entry</a>


          </li>



             <li>
            <a data-toggle="modal"
            title="Click here to add a new student in a particular department of the University" 
            href="<?php echo $base;?>administratorDeptStudentEntry.php"><i class="fa fa-plus"></i>Dept Student Entry</a>


          </li>







  <li>
            <a  title="Download various information in Excel Format by choosing from a list of available choices" href="<?php echo $base;?>downloadWindow.php/"><i class="fa fa-download"></i>Excel Downloads Manager</a>


          </li>
          
          <?php } else {  ?>



          <li><a title="Get Started with Student Entry in <?php echo $loggername;?>" 
            href="<?php echo $base;?>studentEntryGetStarted.php"><i class="fa fa-plus"></i>Student Entry Manager</a></li>
          <li>
            <a title="Get Started with Student Management in <?php echo $loggername;?>" 
            href="<?php echo $base;?>studentManager.php"><i class="fa fa-users"></i>Student Management</a>

          </li>
         <li>
            <a title="Download various information in Excel Format from <?php echo $loggername;?>  by choosing from a list of available choices" href="<?php echo $base;?>downloadWindowDepartment.php/"><i class="fa fa-download"></i>Excel Downloads Manager</a>


          </li>




          <?php } ?>
        
         <!--  <li><a href="#"><i class="fa fa-file"></i>Pages</a>
            <ul class="sub-menu">
              <li><a href="pages-blank.html">Blank Page</a></li>
              <li><a href="pages-blank-header.html">Blank Page Header</a></li>
              <li><a href="pages-login.html">Login</a></li>
              <li><a href="pages-404.html">404 Page</a></li>
              <li><a href="pages-500.html">500 Page</a></li>
            </ul>
          </li> -->  
      </div>


    </div>

      