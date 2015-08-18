<?php ob_start(); 
//session_set_cookie_params(1200);
session_start();  
require("../includes/configLogin.php");
require("../includes/auto_connect.php");
$myname = $_SESSION['username'];
$student_name = $_SESSION['student_name'];
$department_center=$_SESSION['department_center'] ;
$department_center_course = $_SESSION['department_center_course'];
 function getPicture($str){

$q=mysql_query("select profile_pic_name from student_details where student_id='$str'");
if(mysql_num_rows($q)){
while($row=mysql_fetch_array($q)){

    $picture=$row['profile_pic_name'];
    if($picture==NULL || $picture=='' || empty($picture) || $picture=="NULL"){

        $path=$bases."actions/no_image/no_image.jpg";
    }
    else {

      $path=$bases."actions/".$picture;
    }
}
}
else {

   $path=$bases."actions/no_image/no_image.jpg";
}
return $path;

}

//convert nos to words
include("convToWords.php");
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
    
    <?php require("header.php");?>
    
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
        
         
        
        
           
        
        
    </div>
        
    <div class="content">
 
        
        <?php
            include("breadline.php");
        ?>
        
        
        
    
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>FAQ </h1>
                    </div>
                    <?php

                    $query1=mysql_query("SELECT * FROM `student_details` s, fee_structure f where s.`belongs_to_center_dept` = f.`type` and s.`dept_center_code` = f.`center_dept_code` and s.`dept_center_course_code` = f.`course_code` and s.`semester_code` = f.`sem_year`and s.`student_id` ='".$myname."' group by s.`dept_center_code`");
                    while($rows = mysql_fetch_array($query1))
                    {
                        $fee_id = $rows['fee_id'];
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
 $_SESSION['feeid']=$fee_id;
                       
                    ?>
                    <div class="block-fluid">
                        <div style="height: 400px; width: 99%;margin: 0 auto; font-size: 14px; ">
                             
                              FAQ Coming Soon.
                        </div>
                     </div>
                </div>
                
            </div>
            
            <div class="dr"><span></span></div>
                  
            
        </div>
        
    </div>   
    
</body>
</html>
