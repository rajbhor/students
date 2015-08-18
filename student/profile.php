<?php ob_start(); 
session_start();
require("configs.php");
require("auto_connect.php");


   if(!isset($_SESSION['logged_in']))
    {
        header("Location: index.php");
    }
    $myname = $_SESSION['username'];
    $_SESSION['username'] = $myname;
    $dept_center_code = $_SESSION['dept_center_code'];
    $dept_center_course_code = $_SESSION['dept_center_course_code'];
    $semester_code = $_SESSION['semester_code'];
    $belongs_to = $_SESSION['belongs_to'];
    $student_name = $_SESSION['student_name'];
    $department_center = $_SESSION['department_center'];
    $department_center_course = $_SESSION['department_center_course'];
    $phn_no = $_SESSION['phn_no'];
    $email_id = $_SESSION['email_id'];
    $sex = $_SESSION['sex'];
    $dob = $_SESSION['dob'];
    $yoa = $_SESSION['yoa'];
    $roll_no = $_SESSION['roll_no'];


?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>User profile - Aquarius - responsive admin panel</title>

    <?php 
        include("incljs.php");
    ?>
    
</head>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, <?php echo $myname; ?>
            </div>
        </div>
        
        <?php
            include("photo_dept_logout.php");
        ?>
        
        <?php
            include("leftMenu.php");
        ?>
        
               
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
        <div class="dr"><span></span></div> 
        
        <div class="widget">

            <div class="input-append">
                <input id="appendedInputButton" style="width: 118px;" type="text"><button class="btn" type="button">Search</button>
            </div>            
            
        </div>
        
        <div class="dr"><span></span></div>        

        <div class="widget-fluid">
            
            <div class="wBlock clearfix">
                <div class="dSpace">
                    <h3>Last visits</h3>
                    <span class="number">6,302</span>                    
                    <span>5,774 <b>unique</b></span>
                    <span>3,512 <b>returning</b></span>
                </div>
                <div class="rSpace">
                    <h3>Today</h3>
                    <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>                                                                                
                    <span>&nbsp;</span>
                    <span>65% <b>New</b></span>
                    <span>35% <b>Returning</b></span>
                </div>
            </div>
            
        </div>        
        
    </div>
        
    <div class="content">
        
        
       <?php
            include("breadline.php");
        ?>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span6">                    
                    
                    <div class="block-fluid ucard clearfix">
                        
                            <div class="left">
                                <h4><?php echo $myname;?></h4>
                                <div class="image">
                                    <a href="#"><img src="img/users/user_profile.jpg" class="img-polaroid"></a>                            
                                </div>
                                <ul class="control">                
                                    <li><span class="icon-pencil"></span> <a href="edit.php">Edit</a></li>
                                    
                                </ul>                               
                            </div>
                            <div class="info">                                                                
                                <ul class="rows">
                                    <li class="heading">User info</li>
                                    <li>
                                        <div class="title">Name:</div>
                                        <div class="text"><?php echo $student_name; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Phone no:</div>
                                        <div class="text"><?php echo $phn_no; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        <div class="text"><?php echo $email_id;   ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Gender:</div>
                                        <div class="text"><?php echo $sex;?></div>
                                    </li>
                                    <li>
                                        <div class="title">Date of Birth:</div>
                                        <div class="text"><?php echo $dob; ?></div>
                                    </li>
                                                                         
                                </ul>                                                      
                            </div>                        
                            
                    </div>
                </div>                                
                 
                <div class="span6">        
                    <ul class="rows">
                        <li class="heading">Academic Details</li>
                        <li>
                            <div class="title">Roll No:</div>
                            <div class="text"><?php echo $roll_no; ?></div>
                        </li>
                        <li>
                            <div class="title">year of Admission:</div>
                            <div class="text"><?php echo $yoa; ?></div>
                        </li>
                        <li>
                            <div class="title">Department/Center:</div>
                            <div class="text"><?php echo $department_center; ?></div>
                        </li>
                        <li>
                            <div class="title">Course:</div>
                            <div class="text"><?php echo $department_center_course;   ?></div>
                        </li>
                        <li>
                            <div class="title">Year/Semester:</div>
                            <div class="text"><?php echo $semester_code;?></div>
                        </li>
                        
                                                             
                    </ul> 
                    
                </div>                 
                
            </div>            
            
                      
            
            <div class="dr"><span></span></div>           
            
            
        </div>
        
    </div>   
    
</body>
</html>
