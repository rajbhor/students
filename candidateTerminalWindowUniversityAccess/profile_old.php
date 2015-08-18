<?php ob_start(); 
session_start();
require("../includes/config.php");
 
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
    $phn_no = $_SESSION['phn_no'];
    $email_id = $_SESSION['email_id'];
    $fathername = $_SESSION['fathers_name'];
    $mothername = $_SESSION['mothers_name'];
    $sex = $_SESSION['sex'];
    $dob = $_SESSION['dob'];
    $yoa = $_SESSION['yoa'];
    $roll_no = $_SESSION['roll_no'];

    $query1 = mysql_query("select * from semester where id = '$semester_code'");
           
    while($rows = mysql_fetch_array($query1))
    {
        $sem_yearval = $rows['semester'];
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
    
    <script type="text/javascript">
         function showTextbox1() {
           var elem = document.getElementById("s2_8");
           
           if(elem.value == "yes") {
              $("#texthide1").show(); 
           } else {
             $("#texthide1").hide();
           }
         }
</script>
    <script type="text/javascript">
         function showTextbox() {
           var elem = document.getElementById("s2_6");
           
           if(elem.value == "yes") {
              $("#texthide").show(); 
           } else {
             $("#texthide").hide();
           }
         }
</script>
    <script type="text/javascript">
         function showguardianhide() {
           
             $("#guardianhide").show();
             $("#personalhide").hide();
             $("#academichide").hide();
             $("#correspondencehide").hide();
          
         }
</script>
    <script type="text/javascript">
         function closeguardianhide() {
           
             $("#guardianhide").hide();
             $("#personalhide").hide();
             $("#academichide").hide();
             $("#correspondencehide").hide();
          
         }
</script>
<script type="text/javascript">
         function showCorrespondence() {
           
             $("#guardianhide").hide();
             $("#personalhide").hide();
             $("#academichide").hide();
             $("#correspondencehide").show();
          
         }
</script>
<script type="text/javascript">
         function closeCorrespondence() {
           
             $("#guardianhide").hide();
             $("#personalhide").hide();
             $("#academichide").hide();
             $("#correspondencehide").hide();
          
         }
</script>
<script type="text/javascript">
         function showPersonal() {
           
             $("#guardianhide").hide();
             $("#personalhide").show();
             $("#academichide").hide();
             $("#correspondencehide").hide();
          
         }
</script>
<script type="text/javascript">
         function closePersonal() {
           
             $("#guardianhide").hide();
             $("#personalhide").hide();
             $("#academichide").hide();
             $("#correspondencehide").hide();
          
         }
</script>

<script type="text/javascript">
         function showAcademic() {
           
             $("#guardianhide").hide();
             $("#personalhide").hide();
             $("#academichide").show();
             $("#correspondencehide").hide();
          
         }
</script>
<script type="text/javascript">
         function closeAcademic() {
           
             $("#guardianhide").hide();
             $("#personalhide").hide();
             $("#academichide").hide();
             $("#correspondencehide").hide();
          
         }
</script>
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

            $token = base64_decode($_GET['loginRedirect']);
            if(isset($token))
            {
                echo $token;
            }
        ?>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span6">                    
                    
                    <div class="block-fluid ucard clearfix">
                        
                            <div class="left">
                                <h4><?php echo $myname;?></h4>
                                <!-- image upload -->
                                <div class="image">
                            <?php 
                                 $imagepath=getPicture($myname);?>
                                 <a href="#">   <img src="<?php echo $imagepath;?>" class="img-polaroid" style="width:110px;height:110px" > </a>                           
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
                            <div class="text"><?php echo $sem_yearval;?></div>
                        </li>
                        
                                                             
                    </ul> 

                </div>  
                
                    
                
                    
            </div> 
            <div style="position:relative; left:9%">             
            <?php
                        include("viewAcademicForm.php");
                    ?>
                <?php
                        include("viewguardianForm.php");
                    ?>

                <?php
                    include("viewCorrespondenceAdressForm.php");
                ?>   
                <?php
                    include("viewPersonalForm.php");
                ?>
                      
            </div>
            <div class="dr"><span></span></div>           
            

                    
            
        </div>
        
    </div>   
    
</body>
</html>
