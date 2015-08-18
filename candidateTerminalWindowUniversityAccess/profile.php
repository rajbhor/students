<?php ob_start(); 
session_start();
require("../includes/config.php");
 
require("../includes/auto_connect.php");
 function getPicture($str){

$q = mysql_query("select profile_pic_name from student_details where student_id='$str'");
if(mysql_num_rows($q)){
while($row = mysql_fetch_array($q)){

    $picture=$row['profile_pic_name'];
    if($picture == NULL || $picture == '' || empty($picture) || $picture == "NULL"){

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

    /**
    * get student details and update  SESSION variables
    */
    //check if the profile or academic has been updated
    if( (isset($_SESSION['edit_profile_success']) && $_SESSION['edit_profile_success'] != '') || (isset($_SESSION['edit_academic_success']) && $_SESSION['edit_academic_success'] != '') ) {
        $qry = "select student_details.*, department.* from student_details,department where student_details.student_id = '$myname' and department.dept_code = student_details.dept_center_code";
        $q = mysql_query($qry);
        if(mysql_num_rows($q)){ 
            while($row = mysql_fetch_array($q)){
                $_SESSION['student_name']   = $updated_student_name   = $row['student_name'];
                $_SESSION['phn_no']         = $updated_phone_number   = $row['mb_no'];
                $_SESSION['email_id']       = $updated_email_id       = $row['email_id'];

                $_SESSION['department_center'] = $updated_department_center = $row['dept_name'];
            }
        }
    }


    $_SESSION['username']   = $myname;
    $dept_center_code       = $_SESSION['dept_center_code'];
    $dept_center_course_code = $_SESSION['dept_center_course_code'];
    $semester_code  = $_SESSION['semester_code'];
    $belongs_to     = $_SESSION['belongs_to'];
    $student_name   = $_SESSION['student_name'];
     
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
        <a class="logo" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/logo.png" width="70" height="70" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <h2><b><font color="#fff">&nbsp;&nbsp;DU CANDIDATE PANEL <?php echo $date=Date('Y');?></font></b></h2>  
    </div>
    <br/><br/>
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
        <div class="row">
            
            <?php if(isset($_SESSION['upload_image_msg']) && $_SESSION['upload_image_msg'] != '') { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_SESSION['upload_image_msg']; 
                  unset($_SESSION['upload_image_msg']);
                  ?>

                </div>    
            <?php } ?> 

            <?php if(isset($_SESSION['edit_profile_success']) && $_SESSION['edit_profile_success'] != '') { ?>
                <div class="alert alert-success fade in" role="alert">
                  <?php echo $_SESSION['edit_profile_success']; 
                  unset($_SESSION['edit_profile_success']);
                  ?>

                </div>    
            <?php } ?> 

            <?php if(isset($_SESSION['edit_profile_error']) && $_SESSION['edit_profile_error'] != '') { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_SESSION['edit_profile_error']; 
                  unset($_SESSION['edit_profile_error']);
                  ?>

                </div>    
            <?php } ?> 


            <?php if(isset($_SESSION['edit_academic_success']) && $_SESSION['edit_academic_success'] != '') { ?>
                <div class="alert alert-success fade in" role="alert">
                  <?php echo $_SESSION['edit_academic_success']; 
                  unset($_SESSION['edit_academic_success']);
                  ?>

                </div>    
            <?php } ?>

            <?php if(isset($_SESSION['edit_academic_error']) && $_SESSION['edit_academic_error'] != '') { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_SESSION['edit_academic_error']; 
                  unset($_SESSION['edit_academic_error']);
                  ?>

                </div>    
            <?php } ?> 


            <?php 
            $student_semester_code = $student_department_center_code = "";
            $qry = mysql_query("select * from student_details where student_id='$myname'");
                while($rows = mysql_fetch_array($qry))
                {
                    $student_semester_code          = $rows['semester_code'];
                    $student_department_center_code = $rows['dept_center_code'];
                }
            ?>

        </div>
        <div class="workplace">
            
            <div class="row-fluid">



                
                <div class="span6">  

                    
                    <div class="block-fluid ucard clearfix">
                        
                            <div class="left">
                                <h4><?php echo $myname;?></h4>
                                <!-- image upload -->
                                <div class="image">
                                    <?php $imagepath = getPicture($myname);?>  
                                     <a id="profile_image" href="#uploadImage" role="button" data-toggle="modal">
                                        <img src="<?php echo $imagepath;?>" class="img-polaroid" style="width:110px;height:110px" > 
                                    </a>  
                                     <!-- Modal -->
                                        <div id="uploadImage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="uploadImagelLabel" aria-hidden="true" style="text-align:center">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="modal-title">Change Profile Image</h4>
                                                        <form id="imageform" method="post" enctype="multipart/form-data" action='api_upload_profile_image.php'>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div id='imageloadbutton'>
                                                                        <input type="file" id="upload_profile_pic" name="photoimg" />
                                                                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $myname; ?>"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label" for="singlebutton"></label>
                                                                        <div class="col-md-4">
                                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                                            <input type="submit" id="upld" value="Upload" class="btn btn-primary">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </form>

                                                        <Script>
                                                        $('#upld').click(function(e) {
                                                            var upload_profile_pic = $('#upload_profile_pic').val();
                                                            if(upload_profile_pic == '') {
                                                                e.preventDefault();
                                                                alert('Please select an image');
                                                            }
                                                        });
                                                        </script>
                                                        
                                                    </div><!-- End of Modal body -->
                                                </div><!-- End of Modal content -->
                                            </div><!-- End of Modal dialog -->
                                        </div><!-- End of Modal --> 


                                </div>

                                <a id="profile_image_2" href="#uploadImage" role="button" data-toggle="modal" style="float:left">
                                    Change photo
                                </a>
                                <!--
                                <ul class="control">                
                                    <li><span class="icon-pencil"></span> <a href="edit.php">Edit</a></li>
                                    
                                </ul> 
                                -->                              
                            </div>
                            <div class="info">                                                                
                                <ul class="rows" id="userinfo">
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
                                       


                                <ul class="rows" id="edituserinfo" style="display:none">
                                    <li class="heading">Edit user info</li>

                                        <form class="form-horizontal" action="api_update_student_info.php" method="post">
                                        <style>
                                            form label {
                                                width:80px !important;
                                            }
                                            .controls input{
                                                width:180px;
                                            }
                                        </style>
                                            <fieldset>
                                                <div class="control-group">
                                                  <label class="control-label" class="col-sm-3" for="textinput">Name</label>
                                                  <div class="col-sm-10">
                                                    <input type="text" value="<?php echo $student_name; ?>" name="student_name">
                                                    
                                                  </div>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label" for="textinput">Phone no</label>
                                                  <div class="col-sm-10">
                                                    <input type="text" value="<?php echo $phn_no; ?>" maxlength="10" name="student_phn_no">
                                                    
                                                  </div>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label" for="textinput">Email ID</label>
                                                  <div class="col-sm-10">
                                                    <input type="email" value="<?php echo $email_id; ?>" name="student_email_id">
                                                    
                                                  </div>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label" for="textinput"></label>
                                                  <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary" value="Save">Save</button>
                                                    
                                                  </div>
                                                </div>

                                               

                                            </fieldset>
                                        </form>                                
                                </ul>  

                                <a href="#" id="edituserinfobtn">Edit user info</a>
                                
                                <a href="#" id="canceledituserinfobtn" class="btn btn-warning" style="display:none">Cancel</a>                                        
                            </div>   

                            <script>
                            $('#edituserinfobtn').click(function(e) {
                                e.preventDefault();
                                $('#userinfo').hide();
                                $('#edituserinfobtn').hide();

                                $('#edituserinfo').fadeIn();
                                $('#canceledituserinfobtn').show();
                                $('#saveedituserinfobtn').show();
                            });

                            //cancel button click
                            $('#canceledituserinfobtn').click(function(e) {
                                e.preventDefault();
                                $('#userinfo').fadeIn();
                                $('#edituserinfobtn').show();

                                $('#edituserinfo').hide();
                                $('#canceledituserinfobtn').hide();
                                $('#saveedituserinfobtn').hide();
                            });
                            </script>

                            

                            
                    </div>
                </div>                                
                 
                <div class="span6">        
                    <ul class="rows" id="academic_details">
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

                    <ul class="rows" id="edit_academic_details" style="display:none">
                        <li class="heading">Edit academic details</li>

                            <form class="form-horizontal" action="api_update_student_academic_info.php" method="post">
                            <style>
                                form label {
                                    width:80px !important;
                                }
                                .controls input{
                                    width:180px;
                                }
                            </style>
                            <fieldset>
                                <div class="control-group">
                                  <label class="control-label" class="col-sm-3" for="textinput">Department</label>
                                  <div class="col-sm-10">
                                    <select title="Select a center" name="dept_center_code" class="form-control" id="dept_center_code"  required="required">
                                       <option value="" selected>--Select Department--</option>
                                       <?php
                                       
                                        $c=mysql_query("select * from department order by dept_name desc");
                                         
                                         while($rc=mysql_fetch_array($c))
                                         {
                                         ?> 
                                         
                                        <option value="<?php echo $rc['dept_code']; ?>" <?php if($student_department_center_code == $rc['dept_code']): ?>selected="selected" <?php endif; ?>>
                                        <?php  echo $rc['dept_name'];?>
                                        </option>
                                        <?php 
                                         } 
                                        ?>
                                    </select> 
                                    
                                  </div>
                                </div>

                                <div class="control-group">
                                  <label class="control-label" for="textinput">Year/Semester</label>
                                  <div class="col-sm-10">
                                    <select title="Select semester or year whichever is applicable" name="semester_code" class="form-control" id="semester_code"  required="required">
                                    <?php
                                   
                                        $query11 = mysql_query("select * from semester");
                                         
                                         while($rowdd1=mysql_fetch_array($query11))
                                         {
                                         ?>
                                        <option value="<?php echo $rowdd1['id']; ?>" <?php if($student_semester_code == $rowdd1['id']): ?>selected="selected" <?php endif; ?>>
                                        <?php  echo $rowdd1['semester'];?>
                                        </option>
                                        <?php 
                                         } ?>
                                    
                                    </select>
                                  </div>
                                </div>

                                <div class="control-group">
                                  <label class="control-label" for="textinput"></label>
                                  <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" value="Save">Save</button>
                                    
                                  </div>
                                </div>
                            </fieldset>
                        </form>                                
                    </ul> 

                    <a href="#" id="editacademicinfobtn">Edit Academic Details</a>
                                
                    <a href="#" id="canceleditacademicinfobtn" class="btn btn-warning" style="display:none">Cancel</a>                                        

                </div>  

                
                <script>
                    $('#editacademicinfobtn').click(function(e) {
                        e.preventDefault();
                        $('#academic_details').hide();
                        $('#editacademicinfobtn').hide();

                        $('#edit_academic_details').fadeIn();
                        $('#canceleditacademicinfobtn').show();
                       
                    });

                    //cancel button click
                    $('#canceleditacademicinfobtn').click(function(e) {
                        e.preventDefault();
                        $('#academic_details').fadeIn();
                        $('#editacademicinfobtn').show();

                        $('#edit_academic_details').hide();
                        $('#canceleditacademicinfobtn').hide();
                        
                    });
                </script>
                
                    
                
                    
            </div>

            <div class="row-form clearfix">
                            
            </div> 

            



            <div style="position:relative;">             
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
