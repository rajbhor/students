<?php ob_start(); 
//session_set_cookie_params(1200);
session_start();
include('r2w.php');
require("configLogin.php");
require("auto_connect.php");
$myname = $_SESSION['username'];
$student_name = $_SESSION['student_name'];
$department_center=$_SESSION['department_center'] ;
$department_center_course = $_SESSION['department_center_course'];

?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->

    <title>Fee Details</title>

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
        
        <div class="admin">
            <div class="image">
                <img src="img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><?php echo $department_center; ?></li>
                <li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>
            </ul>
            
        </div>
        
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
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><?php echo $department_center_course; ?><span class="divider">></span></li>                
                <li class="active"><?php echo $student_name;?></li>
            </ul>
                        
            
            
        </div>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Fee Details</h1>
                    </div>
                    <?php


                    

                        $query1=mysql_query("SELECT * FROM `student_details` s, fee_structure f where s.`belongs_to_center_dept` = f.`type` and s.`dept_center_code` = f.`center_dept_code` and s.`dept_center_course_code` = f.`course_code` and s.`semester_code` = f.`sem_year`and s.`student_id` ='".$myname."' group by s.`dept_center_code`");
                        while($rows = mysql_fetch_array($query1))
                        {

                            $admission_fee = $rows['admission_fee'];
                            $course_fee = $rows['course_fee_year_sem'];
                            $Library_fee = $rows['library_fee'];
                            $union_magazine_fee = $rows['union_magazine'];
                            $safety_insurance_fee = $rows['saf_fee'];
                            $Development_fee  =$rows['development_fee'];
                            $Laboratory_fee= $rows['laboratory_fee'];
                            $interent_fee = $rows['interent_fee'];
                            $student_aid_fee = $rows['student_safety'];
                            $sports_fee = $rows['sports_fee'];
                            $total_fee = $rows['total_fee'];

                        }
                       
                   

                       
                    ?>
                     <div class="block-fluid">
                        <div style="height: 100%; width: 50%;margin: 0 auto; font-size: 14px; border: 1px solid #ccc;border-bottom-left-radius: 3px;border-bottom-right-radius: 3px;">
                             <div style="height: 50px; color: #CC3333; font-weight: bold; width: 100%; font-size: 26px; ">
                               <div style="height: 10px; "> </div>
                               <div style="text-align: center;"> DIBRUGARH UNIVERSITY</div>
                               <div style="text-align: center;font-size: 16px;"> DIBRUGARH - 786004</div>
                             </div>
                             <table class="table" >
                            <tr>
                                <td> 
                                    Admission Fees:
                                </td>
                                <td>
                                    
                                     <?php echo sprintf('%0.2f', $admission_fee); ?>  
                                </td> 
                            </tr>
                            <tr> 
                                <td>
                                    Course Fees:
                                </td>
                                <td>
                                      <?php echo sprintf('%0.2f', $course_fee); ?>  
                                </td>
                            </tr>
                            <tr>                                
                            <td>
                                Laboratory Fees:
                            </td>
                             <td>
                                <?php echo sprintf('%0.2f', $Laboratory_fee); ?>  
                            </td>
                             </tr>
                            <tr> 
                            <td>
                                 Development Fees:   
                            </td>
                            <td>
                               <?php echo sprintf('%0.2f', $Development_fee); ?>
                            </td>
                            </tr>
                            
                            <tr>
                            <td>
                                Magazine/Union Fees:
                            </td>
                            <td>
                                 <?php echo sprintf('%0.2f', $union_magazine_fee); ?>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Library Fees:
                            </td>
                            <td>
                               <?php echo sprintf('%0.2f', $Library_fee); ?>
                            </td>
                            </tr>
                             <tr>
                            <td>
                                Interent Fees:
                            </td>
                            <td>
                                 <?php echo sprintf('%0.2f', $interent_fee); ?>
                            </td> 
                                </tr>
                              <tr>
                            <td>
                                Student Aid Fund Fees:
                            </td>
                            <td>
                                 <?php echo sprintf('%0.2f', $student_aid_fee); ?>
                            </td>
                            </tr>
                                   <tr>
                                <td>
                                        Safety Insurance Policy Fees:
                                </td>
                                <td>
                                         <?php echo sprintf('%0.2f', $safety_insurance_fee); ?>
                                </td>
                                 </tr>
                                     <tr>
                                <td>
                                        Sports Board Fees:
                                </td>
                                <td>
                                        <?php echo sprintf('%0.2f', $sports_fee); ?>
                                </td>    
                            </tr>
                                     <tr>
                                <td >
                                        Total Fees:
                                </td>
                                <td >
                                        <?php echo sprintf('%0.2f', $total_fee); ?>
                                </td>    
                            </tr>
                            <tr>
                               
                                <td >
                                      Amount:  <?php echo  $wrd=convert_number($total_fee)." Only"; ?>
                                </td>    
                            </tr>
                                    
                                     </tr>
                                     <tr>
                                 
                                     <td colspan="2">
                                        <center>
                                        <button class="btn btn-primary"  type="button"> Make payment</button>
                                     </center>
                                     </td>
                                       
                            </tr>
                                    
                             </table>
                        </div>
                     </div>
                    
                </div>
                
            </div>
            
            <div class="dr"><span></span></div>
                  
            
        </div>
        
    </div>   
    
</body>
</html>
