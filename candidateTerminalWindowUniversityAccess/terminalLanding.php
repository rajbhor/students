<?php ob_start(); 
session_start();
 
require("../includes/configLogin.php");
require("../includes/auto_connect.php");
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
    
    
       $query1=mysql_query("SELECT * FROM `student_details` s, fee_structure f
                           where s.`belongs_to_center_dept` = f.`type`
                           and s.`dept_center_code` = f.`center_dept_code`
                           and s.`dept_center_course_code` = f.`course_code`
                           and s.`semester_code` = f.`sem_year`
                           and s.`student_id` ='".$myname."'
                           group by s.`dept_center_code`");
                    while($rows = mysql_fetch_array($query1))
                    {
                       
                        $total_fee = $rows['total_fee'];
                        $semester_code=$rows['semester_code'];
                    }

      
?>
<!DOCTYPE html>
<html lang="en">
<head>   
<script type = "text/javascript" >
function changeHashOnLoad() {
     window.location.href += "#";
     setTimeout("changeHashAgain()", "50"); 
}

function changeHashAgain() {
  window.location.href += "1";
}

var storedHash = window.location.hash;
window.setInterval(function () {
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);

setTimeout(function(){
    $('#hidediv').fadeOut('slow');
}, 10000);

</script>      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>DU | Student Panel</title>

    <?php 
        include("incljs.php");
    ?>
    
</head>
<body onload="changeHashOnLoad(); ">
    
   <?php require("header.php");?>
    
    <div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active" style="position:fixed;">
            
                
                   
                <span class='label label-success'>Welcome <?php echo $_SESSION['student_name'];?></span>
                
                 
               
            </div>
        </div>

        <?php

            

        ?><div    >

        <?php
            include("photo_dept_logout.php");
        ?>
        
        <?php
            include("leftMenu.php");
        ?>

      
    </div>
        
        
 
        
        
        
        
        
    </div>
        
    <div class="content">
        
        
        <div    style="position:fixed;z-index:1900; float:right">

        <?php
            include("breadline.php");
        ?>
    </div>
        
        <div class="workplace">
        <br/>
        <?php $getid=$_GET['id'];
        ?>
        <?php if($getid=='success'){ ?>
            <div id="hidediv1" style="height: 40px; width: 800px; margin: 0 auto; border: 3px solid #993333; border-radius: 5px; font-size: 16px;color:#330066;padding: 14px 0 0 0px;">
              You Fee payment Transaction is Success. <a href="#" ><button class="btn btn-small">Print Recept</button> </a>
            </div>
            <?php } ?>
        <div class="row-fluid">
                 <div>
                <div class="widget-fluid">
                 <div class="head clearfix">
                        <div class="isw-archive"></div>
                        <h1>Payment Due</h1>
                                        
                    </div>
                    <div class="block-fluid" style="height: 170px;">  
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th>Fee type</th><th>Sem/Year </th><th>Amount </th><th >Due date </th><th > </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <span class="date">Semester Fee</span></td>
                                         <td> <span class="date"><?php echo $semester_code; ?></span></td>
                                         <td> <span class="price"><?php echo sprintf('%0.2f', $total_fee); ?></span> </td>
                                        <td><span class="date">30/08/2015</span></td>
                                       <td > <a href="forms.php" ><button class="btn btn-small">Pay Now</button> </a></td>
                                    </tr>
                                    
                                  
                                </tbody>
                                
                            </table>  
                    </div>
                     <div class="dr"><span></span></div>      
                    <div class="head clearfix">
                        <div class="isw-archive"></div>
                        <h1>Payment History</h1>
                                        
                    </div>
                    <div>  
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th>Student ID</th><th>Student Name</th><th>Order ID</th><th>Payment Mode</th><th>Semester </th><th>Email </th><th>Phone </th><th >Department </th><th >Course </th><th>Total amount</th><th>Status</th><th>Transaction id</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php $order=mysql_query("SELECT * FROM `order` where customer_id='".$myname."'");
                    while($rows = mysql_fetch_array($order))
                    {
                       
                        echo "<tr>"."<td>".$rows['order_id']."</td><td>".$rows['payment_mode']."</td><td>".$rows['semester']."</td><td>".$rows['Customer_email']."</td><td>".$rows['Customer_phone']."</td><td>".$rows['department']."</td><td>".$rows['course']."</td><td>".$rows['total_amount']."</td><td>".$rows['status']."</td><td>".$rows['trans_id']."</td>"."</tr>";
                       
                    }              

                    ?>
                                    
                                </tbody>
                                
                            </table>  
                    </div>
                    
                    
                    
            </div>
            </div>
 <div>
                

 

<!-- Feedzilla Widget END -->

     
    </div> 



    
</body>
</html>
