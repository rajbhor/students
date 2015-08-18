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
        
         
        
        
           
        
        
    </div>
        
    <div class="content">
 
        
        <?php
            include("breadline.php");
        ?>
        
        
        
        
        <div class="wd-head">
                <div class="wizard-steps">
                <div class="active-step"><a href="#step-one"><span>1</span> Fee Info</a></div>
                <div class="completed-step"><a href="#step-two"><span>2</span> Payment Mode</a></div>
                <div class="completed-step"><a href="#"><span>3</span> Payments</a></div>
                 
                </div>
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
                        <div style="height: 100%; width: 50%;margin: 0 auto; font-size: 14px; border: 1px solid #ccc;border-bottom-left-radius: 3px;border-bottom-right-radius: 3px;">
                             <div style="height: 50px; color: #CC3333; font-weight: bold; width: 100%; font-size: 26px; ">
                               <div style="height: 10px; "> </div>
                               <div style="text-align: center;"> DIBRUGARH UNIVERSITY</div>
                               <div style="text-align: center;font-size: 16px;"> DIBRUGARH - 786004</div>
                             </div>
                             <table class="table">
                            <tr>
                                <td> 
                                    Admission Fees:
                                </td>
                                <td>
                                    
                                     <?php echo sprintf('%0.2f', $fee_id); ?>  
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
                                      Amount:  <?php echo  $wrd=convert_number_to_words($total_fee)." Only"; ?>
                                </td>    
                            </tr>
                                    
                             <tr>
                         
                             <td colspan="2">
                                <center>
    
                               <a href="<?php echo $bases;?>paymode.php?pay=<?php echo base64_encode($total_fee);?>"    
                                <button class="btn btn-primary"  type="button" > Make payment</button>
                                </a> 
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
