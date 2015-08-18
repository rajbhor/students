<?php ob_start(); 
session_start();
require("../includes/config.php");

require("../includes/auto_connect.php");

$total_fee=$_GET['tpay'];
  $total_amount=base64_decode($total_fee);
 $msg=base64_decode($_GET['response']); 
  
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

$query01=mysql_query("select * from payment where student_id_fee='$myname'");
$num=mysql_num_rows($query01);
while($fetch=mysql_fetch_array($query01))
{
    $chano=$fetch["challan_no"];
    $status=$fetch["challan_status"];
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
    
    <style type="text/css">
body,th,th {
	font-size: 15px; 
	font-family:arial;
	margin:0px;
	padding:0px;
	text-decoration:none;
	font-weight: normal;
}
th{
	border:1px solid black;
	text-decoration:none;
	
}
.wrpzan{
	height:680px;
	width:1258px; 
	margin-left:auto;
	margin-right:auto;
}
.wrpzan .containerzan{
	height:680px;
	float:left;
	width:300px;
	margin:0 7px; 
}
</style>
    
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
            }
        ?>
            <div class="wd-head">
                <div class="wizard-steps">
                <div class="completed-step"><a href="#step-one"><span>1</span> Fee Info</a></div>
                <div class="completed-step"><a href="#step-two"><span>2</span> Payment Mode</a></div>
                <div class="active-step"><a href="#"><span>3</span> Payments</a></div>
                 
                </div>
            </div>
            
        <div class="workplace"> 
            <div class="row-fluid">
              
            <div class="pay-option">
                            <div style="font-size: 20px;" class="heading">
                                Total payment to be made Rs.<?php echo sprintf('%0.2f', $total_amount); ?></br>
                              <div style="color: #315680"> <?php echo $msg ?></div> 
                        <hr/>
                          <?php if($num<=0) {?>
    <!--------------------->
                        <div class="challan-head">
                            <div style="float: left;color: #365B85;font-size: 24px;">Print Your Challan</div>
                             <a  href="#" onclick="printDiv()" >
                            <div class="print-img" style="float: left; height: 24px; width: 60px;margin: 0px 0px 0px 10px; ">                             
                                </div>
                            </a> 
                        </div>
                        <form id="challan" action="actions/makeChallanCode.php" method="post">
                         <input type="hidden" name="totalamount" id="totalamount" value="<?php echo $total_amount ?>"/>
                          <div class="challan-head01">
                            <div style="float: left;color: #365B85;font-size: 14px;">Enter Your Challan Number:&nbsp&nbsp&nbsp</div>
                            <div style="float: left; " > 
                                <input type="text" name="challanno01" id="challanno01" required="true"/>
                            </div> 
                            <div style="float: left;color: #365B85;font-size: 14px;">Confirm Your Challan Number:</div>
                            <div style="float: left; " > 
                                <input type="text" name="challanno02" id="challanno02" required="true"/>
                            </div>
                            <div style="height: 50px; width: 200px;  float: left;"> </div>
                             <div style="height: 50px; width: 200px;  float: left;">
                                <button id="csubmit" class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </div>
                          </form>
                      </div> 
            </div>
            <?php } elseif($num>=1) { ?>
         
             <div class="challan-head">
                            <div style="float: left;color: #365B85;font-size: 14px;">You have Successfully Uploaded Your Challan. </br>
                            Your Challan Number is:<span style="color: #6600FF;font-size: 18px;"> <?php echo $chano ?></span></br>
                             Your Current Status is: <?php
                             if($status=='pending'){ ?>
                            <span style="color: #990033;font-size: 18px;">  Pending</span>
                          <?php    } elseif($status=='approve') {?>
                          
                           <span style="color: #6600FF;font-size: 18px;">  Approved</span>
                          <?php } ?>
             <?php } ?>
             </br></br></br></br>
             </div>
                            
            </div>
           
            
            <!------------------->
             
            <div class="dr"><span></span></div>      
        </div>
        
    </div>
    </div>
    
    <!--Challan start here-->
    <div id="pchal" style="display: none;">
     <?php include('challan.php'); ?>
    </div>
    <!--Challan End here-->
    
    
    
    
    
    
    
</body>
</html>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>


    <script>
function printDiv() {
	var printContents = document.getElementById('pchal').innerHTML;     
	var originalContents = document.body.innerHTML;
	//var c = document.getElementById('remove').innerHTML;
	//printContents.remove(c);
	document.body.innerHTML = printContents;      
	window.print();      
	document.body.innerHTML = originalContents;

   }
   
   $('#csubmit').click(function() {
    if ($('#challanno01').attr('value') == $('#challanno02').attr('value')) {
      return true;
    } else { alert('Challan Number Mismatch!'); return false; }
});
</script>
 