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
    $sex = $_SESSION['sex'];
    $dob = $_SESSION['dob'];
    $yoa = $_SESSION['yoa'];
    $roll_no = $_SESSION['roll_no'];
    $password = $_SESSION['password'];
    $father_name= $_SESSION['fathername'];
    $mother_name= $_SESSION['mothername'];

    
// $password = 'mypassword01';
// if(valid_pass($password))
//     echo "$password is a valid password<br />";
// else echo "$password is NOT a valid password<br />";

// $password = 'myP@ssword01';
// if(valid_pass($password))
//     echo "$password is a valid password<br />";
// else echo "$password is NOT a valid password<br />";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>Edit profile</title>

    <?php 
        include("incljs.php");
    ?>
    
    <script type="text/javascript">

        function PreviewImage(inputFile) {
        var maximum =  1048576; // 1MB

         
     var filename=inputFile.value;
     var valid_extensions = /(\.jpg|\.jpeg|\.png)$/i;   
if(!valid_extensions.test(filename))
{ 
   alert('Please upload a image in .jpeg .jpg or .png formats');
   inputFile.value = null;
   $("#selected").hide();
            $("#current").show();
   return false;
   
}
        
        
  else if (inputFile.files && inputFile.files[0].size > maximum) {
    alert("Photo size exceeded 1MB. Please choose a photo that is less than or equal to 1MB"); // Do your thing to handle the error.
    inputFile.value = null; // Clear the field.
    $("#selected").hide();
            $("#current").show();
             
    return false;
   }
   else { 

         var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
            $("#selected").show();
            $("#current").hide();
             
        }
   }
    }
    </script>
<!--
    <SCRIPT language="javascript">
        function addRow(tableID) {
            
            var table = document.getElementById(tableID);
     
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "text";
            element1.name = "txtbox[]";
            cell1.appendChild(element1);
    
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "txtbox[]";
            cell2.appendChild(element2);
 
            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "txtbox[]";
            cell3.appendChild(element3);

            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "txtbox[]";
            cell4.appendChild(element4);
    
            var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
            element5.name = "txtbox[]";
            cell5.appendChild(element5);
 
            var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
            element6.name = "txtbox[]";
            cell6.appendChild(element6);

            var cell7 = row.insertCell(6);
            var element7 = document.createElement("input");
            element7.type = "text";
            element7.name = "txtbox[]";
            cell7.appendChild(element7);
 
 
        }
        </script>
-->

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
    <script type="text/javascript"> 
    function validateEditform()
    {
        var guardianname,guardianoccupation,sex,marital = true;
        guardianname = $("#guardianname").val();
        sex = $("#s2_1").val();
        dob = $("#dob").val();
        if(sex==0)
        {
            $("#s2_1").focus();
            $("#sexerror").show();
        }
        else
        {
            if(dob == '0000-00-00')
            {
                $("#dob").focus();
                $("#doberror").show();
            }
            else
            {
                if($.trim(guardianname)=='')
                {
                    $("#guardianname").focus();
                    $("#error6").show();
                }
                else
                {
                    $("#editform").submit();
                }  
            }
            
        }
        
    }
    </script>


   <script type="text/javascript"> 
    function validatePassword() 
    {

    var currentPassword,newPassword,confirmPassword,output = true;

    
    newPassword = $("#newPassword").val();
    confirmPassword = $("#confirmPassword").val();
    if($.trim(newPassword)==''){
        $("#newPassword").focus();
        $("#error").show();

    }
    else
    {
        
        //var passwordStrengthRegex = /((?=.*d)(?=.*[a-z])(?=.*[A-Z]).{8,15})/gm;
        var errors = []; 
        if (newPassword.length < 8)
        {
            
            $("#newPassword").focus();
            $("#error").hide();
            $("#error3").show();
            $("#error1").hide();
            $("#error2").hide();
            $("#error4").hide();
            $("#error5").hide();
        }    
        else
        {
                    if( $.trim(confirmPassword)=='')
                    {
                        $("#confirmPassword").focus();
                        $("#error1").show();
                        $("#error").hide();
                        $("#error4").hide();
                        $("#error2").hide();    
                        $("#error3").hide();
                        $("#error5").hide();
                    }
                    else
                    {
                        if($.trim(newPassword) != $.trim(confirmPassword))
                        {
                            $("#confirmPassword").focus();
                            $("#error2").show();
                            $("#error1").hide();
                            $("#error").hide();
                            $("#error4").hide();
                            
                            $("#error3").hide();
                            $("#error5").hide();
                        }
                        else
                        {
                            $("#passwordForm").submit();
                        }
                    }
                }

    }
    

    }
 

    </script>
    <script>
  $(function() {
    $( "#dob" ).datepicker();
  });
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
        
        
        
        
               
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
        <div class="dr"><span></span></div> 
       
    </div>
        
    <div class="content">
        
        
        <div class="breadLine">
              
           <?php
                include("breadline.php");
            ?>
            
        </div>

        <div class="workplace">
            
            <div class="row-fluid">   
                <!-- image uploads -->
                <?php 
                                 $imagepath=getPicture($myname);
                                 $imagepathbase=basename($imagepath);
                                 ?>      
                <div class="span3">
                <form method="post" action="actions/processUploadProfilePic.php?wrapper=<?php echo base64_encode($imagepathbase);?>" enctype='multipart/form-data'>
                <div class="block-fluid without-head"> 
                    <div class="ushort clearfix">
                        <?php echo $myname ; ?>

                       
                                 <a id="current" href="#">   <img src="<?php echo $imagepath;?>" class="img-polaroid" style="width:110px;height:110px" > </a>                           
                                   
                        
                        <a id="selected" href="#" style="display:none"><img style="width:120px;height:120px" id="uploadPreview" class="img-polaroid"></a>


                        <input onchange="PreviewImage(this)" id="photo" type="file" name="file1"/>
                    </div>
                    <div class="toolbar clear clearfix">
                            <div class="right">                                
                                <button type="submit" class="btn btn-small btn-warning tip" >save   </button>                                
                            </div>
                    </div>   
                </div>
                </form>  
                <?php
                    include("editPasswordForm.php");
                ?>
                  
                </div>
        <?php
        include("editBasicForm.php");
        ?>

        <?php
            include("editguardianForm.php");
        ?>
        <div style="position:relative; left:23%">     
        <?php
        include("editCorrespondenceAdressForm.php");
        ?>   
        <?php
        include("editPersonalForm.php");
        ?>
        <?php
            include("editAcademicForm.php");
        ?>
        </div>
                
                                
            </div>            
        <div style="position:relative; left:9%">       

        </div>    
            
        </div>
        
       
    </div>   
        
</body>
</html>
