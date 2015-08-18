<?php ob_start(); 
session_start();
require("../includes/config.php");
 
require("../includes/auto_connect.php");
$total_fee=$_GET['pay'];
  $total_amount=base64_decode($total_fee); 
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
   
    $phn_no = $_SESSION['phn_no'];
    $email_id = $_SESSION['email_id'];
    $sex = $_SESSION['sex'];
    $dob = $_SESSION['dob'];
    $yoa = $_SESSION['yoa'];
    $roll_no = $_SESSION['roll_no'];

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
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>User profile</title>

    <?php 
        include("incljs.php");
    ?>
    
</head>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" /></a>
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
        
            

        <div class="widget-fluid">
            
         
            
        </div>        
        
    </div>
        
    <div class="content">
        
        
       <?php
            include("breadline.php");

            $token = base64_decode($_GET['loginRedirect']);
            if(isset($token))
            {
                echo $token;
            
        ?>
            <div class="wd-head">
                <div class="wizard-steps">
                <div class="completed-step"><a href="#step-one"><span>1</span> Fee Info</a></div>
                <div class="active-step"><a href="#step-two"><span>2</span> Payment Mode</a></div>
                <div><a href="#"><span>3</span> Payments</a></div>
                 
                </div>
            </div>
        <div class="workplace">
            
            <div class="row-fluid"> 
                     
                        <div class="pay-option">
                            <div style="font-size: 20px;" class="heading">
                                Total payment to be made Rs.<?php echo sprintf('%0.2f', $total_fee); ?>
                                <div style="margin: -37px 0px 0px 466px;height: 50px; width: 330px; float: right;position: absolute;">
                                  <div id="navlist" style="float: left;height: 50px; width: 80px;">
                                    
                                        <div id="home"><a href="#"></a></div>
                                         
                                </div>
                                   <div id="navlist" style="float: left;height: 50px; width: 80px;">
                                    
                                        <div id="prev"><a href="#"></a></div>
                                         
                                </div>
                                    <div id="navlist" style="float: left;height: 50px; width: 80px;">
                                    
                                        <div id="next"><a href="#"></a></div>
                                         
                                </div>
                                     <div id="navlist" style="float: left;height: 50px; width: 70px;">
                                    
                                        <div id="last"><a href="#"></a></div>
                                         
                                </div>
                            </div>
                        <hr/>
                        <div class="pay-left"> 
 
                        <div class="tab-set">
                            <div id="debit">Debit Card</div>
                            <div id="credit">Credit Card</div>
                            <div id="net">Net Banking</div> 
                            <!--<div id="clallan">Challan Payment</div>-->
                            
                        </div>
                     <div id="gradian" style="height: 73px; width: 180px; background-color: #ddd;z-index: 999"></div>
                    </div>
                         <div id="debit-pay" class="select-pay"> 
                             <div class="challan">
                               Payment Amount is Rs <?php echo sprintf('%0.2f', $total_fee); ?>
                             </div>
                             <div class="button-pro">
                              
                              <form name="pgtest" method="post" action="pgrequest.php">  
                              <input type="hidden" name="amount" value="<?php echo $total_fee."00"; ?>">
		            <input type="hidden" name="currency_code" value="356"/>
		             <input type="hidden" name="merchant_reference_no" value="AX143565">
		             <INPUT TYPE="hidden" name="order_desc" value="<?php echo $myname; ?>">
		             <input type="hidden" name="perform" value="initiatePaymentCapture#sale"> 
                                <button style="font-size: 14px !important; height: 35px;" class="btn btn-primary" type="submit">Proceed to Make payment</button>
                                
                               </form>
                            
                             </div>
                             </div>
                        <div id="credit-pay" class="select-pay"> 
                             <div class="challan">
                              Payment Amount is Rs <?php echo sprintf('%0.2f', $total_fee); ?>
                             </div>
                             <div class="button-pro">
                                 <a href="<?php echo $bases;?>payment.php?tpay=<?php echo base64_encode($total_fee);?>"
                                <button style="font-size: 18px !important; height: 35px;" class="btn btn-primary" type="button">Proceed to Make payment</button>
                             </a>
                             </div>
                             </div>
                           <div id="net-pay" class="select-pay"> 
                             <div class="challan">
                               Payment Amount is Rs <?php echo sprintf('%0.2f', $total_fee); ?>
                             </div>
                             <div class="button-pro">
                                 <a href="<?php echo $bases;?>payment.php?tpay=<?php echo base64_encode($total_fee);?>"
                                <button style="font-size: 18px !important; height: 35px;" class="btn btn-primary" type="button">Proceed to Make payment</button>
                             </a>
                             </div>
                             </div>
                          
                             <div id="challan-pay" class="select-pay"> 
                             <div class="challan">
                               Challan Payment Amount is Rs <?php echo sprintf('%0.2f', $total_fee); ?>
                             </div>
                             <div class="button-pro">
                                 <a href="<?php echo $bases;?>makeChallan.php?tpay=<?php echo base64_encode($total_fee);?>"
                                <button style="font-size: 16px !important; height: 25px;" class="btn btn-primary" type="button">Proceed to make challan</button>
                             </a>
                             </div>
                             </div>
                        
                      </div> 
            </div>            
             
            <div class="dr"><span></span></div>      
             
            
        </div>
        
    </div>
    </div>
    <?php } else {


        if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
     
    }?>
    
</body>
</html>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
<script> 
    
    $(document).ready(function() {

    $("div.tab-set div").click(function() {
        $(this).addClass("selected").siblings().removeClass("selected");
    });
    
    $("div.tab-set div").hover(function() {
        $(this).addClass("selected-aqua").siblings().removeClass("selected-aqua");
    }, function () {
        $(this).removeClass("selected-aqua");
    });


});
     
    
    $(document).ready(function(){
  $("#clallan").click(function(){
    $('#challan-pay').css("display","block")
    $('#atm-pay').css("display","none")
    $('#net-pay').css("display","none")
     $('#credit-pay').css("display","none")
      $('#debit-pay').css("display","none")
     
  });
  $("#atm").click(function(){
    $('#atm-pay').css("display","block")
    $('#challan-pay').css("display","none")
    $('#net-pay').css("display","none")
     $('#credit-pay').css("display","none")
      $('#debit-pay').css("display","none")
  });
   $("#net").click(function(){
    $('#net-pay').css("display","block")
    $('#atm-pay').css("display","none")
    $('#challan-pay').css("display","none")
     $('#credit-pay').css("display","none")
      $('#debit-pay').css("display","none")
  });
    $("#credit").click(function(){
    $('#credit-pay').css("display","block")
    $('#net-pay').css("display","none")
    $('#atm-pay').css("display","none")
    $('#challan-pay').css("display","none")
     $('#debit-pay').css("display","none")
  });
     $("#debit").click(function(){
    $('#debit-pay').css("display","block")
    $('#credit-pay').css("display","none")
    $('#net-pay').css("display","none")
    $('#atm-pay').css("display","none")
    $('#challan-pay').css("display","none")
  });
});
</script>