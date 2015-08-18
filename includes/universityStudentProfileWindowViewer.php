 <script type="text/javascript">
$(document).ready(function(){

$("#sc").fadeOut(10000);

});

 </script>
  <div class="cl-mcont">
    
       <?php if(@$_GET['response']!=''){ ?>
  <center>
  <div id="sc" class="label label-success" style="width:700px; font-family:Segoe UI">  
  <a  onclick="$('#sc').hide()" class="close" data-dismiss="alert" style="float:right; cursor:pointer">
    <span id="success" class="glyphicon glyphicon-remove"></span></a>  
  <strong>Success!</strong> <?php echo base64_decode(@$_GET['response']);?>.
</div>
  </center>
<?php } ?>


 <?php if(@$_GET['errorResponse']!=''){ ?>
  <center>
  <div id="sc" class="label label-warning" style="width:700px; font-family:Segoe UI">  
  <a  onclick="$('#sc').hide()" class="close" data-dismiss="alert" style="float:right; cursor:pointer">
    <span id="success" class="glyphicon glyphicon-remove"></span></a>  
  <strong>Error!</strong> <?php echo base64_decode(@$_GET['errorResponse']);?>.
</div>
  </center>
<?php } 
?>

<div class="page-head">
      <h3 title="<?php echo $student_name;?>" class="label label-primary" style="font-size:19px">
        <i class="fa  fa-user"></i> <?php echo $student_name; ?> &raquo; 
        <small style="font-size:12px; font-weight:bold; color:white"><?php echo getDepartmentCenter($dept_center_code,$belongs_to_center_dept);?> &raquo; <?php echo getDepartmentCenterCourse($dept_center_course_code,$belongs_to_center_dept);?>   </small></h3>
     
<br/><br/>
<small style="font-weight:bold; font-size:12px" class="label label-default pull-right"><i class="fa fa-info"></i> Student Profile created by <?php echo getCreator($created_by_id);?></small>
      </div>

<br/>
<legend><i class="fa fa-book"></i> Academic Information &raquo; <a href="#editacademics"  
  title="Edit Academic information" data-toggle="modal" class="btn btn-primary btn-sm pull-right">
  <i class="fa fa-pencil"></i> Edit Academics</a>
</legend> 

<div   id="editacademics"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title">

                                                    Edit Academic Information &raquo; <?php echo $student_name;?> &raquo;
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> Change academic information here</small></h5>
                                                

                                                </div>
                                                  
                                                <div class="modal-body">
<form action="<?php echo $base;?>actions/editAcademics.php?sl=<?php echo $sl;?>" method="post">
 <div class="col-md-6 form-group">
     <?php if($belongs_to_center_dept=='dept'){?>
    <label for="title" style="color:red">Department Course:</label> 
                <select title="Change department course" name="scourse" class="form-control" id="designation"  required="true">
                <option selected value="<?php echo $dept_center_course_code;?>"><?php echo getDepartmentCenterCourse($dept_center_course_code,$belongs_to_center_dept);?></option>
                

                <?php
                 
                $query=mysql_query("select * from course where course_id<>'$dept_center_course_code' and dept_code=$dept_center_code");
                 
                 while($rowd=mysql_fetch_array($query))
               {
               ?>
                <option value="<?php echo $rowd['course_id']; ?>">
                <?php  echo $rowd['course_name'];?>
                </option>
                <?php 
               } 
                ?>
                </select> 
             
            <?php } ?>

             <?php if($belongs_to_center_dept=='center'){?>
              
            <div >
              <label for="title" style="color:red">Center Course:</label>
        
             </div>
            <div > 

                <select title="Change center course" name="scourse" class="form-control" id="designation"  required="true">
                <option selected value="<?php echo $dept_center_course_code;?>"><?php echo getDepartmentCenterCourse($dept_center_course_code,$belongs_to_center_dept);?></option>
                
                <?php
                
                $query1=mysql_query("select * from center_course where cc_code<>'$dept_center_course_code' and center_code=$dept_center_code");
                 
                 while($rowdd=mysql_fetch_array($query1))
               {
               ?>
                <option value="<?php echo $rowdd['cc_code']; ?>">
                <?php  echo $rowdd['cc_name'];?>
                </option>
                <?php 
               } 
                ?>
                </select> 

            </div>
<?php } ?>
           
</div>
<div class="col-md-6 form-group">
    <label style="color:red" for="author">Semester:</label>
   <select title="Change semester" name="syear" class="form-control" id="designation"  required="true">
     <option value="<?php echo $semester_code;?>"><?php echo getSemester($semester_code);?></option>
               
                <?php
               
                $query11=mysql_query("select * from semester where id<>$semester_code");
                 
                 while($rowdd1=mysql_fetch_array($query11))
               {
               ?>
                <option value="<?php echo $rowdd1['id']; ?>">
                <?php  echo $rowdd1['semester'];?>
                </option>
                <?php 
               } 
                ?>
                </select> 

</div>

<div class="col-md-6 form-group">
     <label for="title">D.U.Registration No:</label>
   <input value="<?php if($registration_no!='Not Available'){ echo $registration_no;}?>" id="dureg" title="DU Registration" autocomplete="off" type="text" name="sdureg" class="form-control" placeholder="D.U.Registration No (if avaiable)" />

    
</div>
<div class="col-md-6 form-group">
    <label  for="author">Roll No:</label>
    <input value="<?php if($roll_no!='Not Available'){ echo $roll_no;}?>" id="roll" title="Roll number if available" autocomplete="off" type="text" name="sroll" class="form-control" placeholder="Roll No"  />
    
</div>




  <input type="submit" class="btn btn-success" value="Save Changes">
<input type="reset" class="btn btn-danger" value="Cancel">
 
</div>
   </form>

 
<div class="modal-footer" style="display:">
                                                    

                                                    <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo $learn;?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<table class="no-border">
                <thead class="no-border">
                  <tr>
                    <th style="width:50%; color:green"><strong>Department</strong><strong></th>
                    <th style="  color:green"><strong>Course</strong></th>
                    <th style="  color:green"><strong>Semester</strong></th>
                    
                    <th style=" color:green"><strong>Roll#</strong></th>
                    <th style=" color:green"><strong>Regn#</strong></th>
                  </tr>
                </thead>
                <tbody class="no-border-x no-border-y">
                  <tr>
                    <td style="width:30%;"><?php echo getDepartmentCenter($dept_center_code,$belongs_to_center_dept);?></td>
                    <td><?php echo getDepartmentCenterCourse($dept_center_course_code,$belongs_to_center_dept);?></td>
                    <td><?php echo getSemester($semester_code);?></td>
                    <td><?php if($roll_no!='Not Available'){?>
      <span class="label label-success"><?php echo $roll_no;?></span>
<?php } else {?>

<span title="This information is currently not available" class="label label-danger">N/A</span>
<?php } ?></td>
                    <td><?php if($registration_no!='Not Available'){?>
      <span class="label label-success"><?php echo $registration_no;?></span>
<?php } else {?>

<span title="This information is currently not available" class="label label-danger">N/A</span>
<?php } ?></td>
                  </tr>
                  
                </tbody>
              </table>






<br/>
<legend><i class="fa fa-user"></i> Personal Information &raquo; <a href="#editpersonal"  
  title="Edit Personal information" data-toggle="modal" class="btn btn-success btn-sm pull-right">
  <i class="fa fa-pencil"></i> Edit Personal</a></legend>



<div   id="editpersonal"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title">

                                                    Edit Personal Information &raquo; <?php echo $student_name;?> &raquo;
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Change personal information here</small></h5>
                                                

                                                </div>
                                                  
                                                <div class="modal-body">
<form action="<?php echo $base;?>actions/editPersonal.php?sl=<?php echo $sl;?>" method="post">
         <div class="col-md-6 form-group">
    <label style="color:red" for="author">Name of the Student:</label>
    <input value="<?php echo $student_name;?>" title="Name of student" style="text-transform: uppercase" autocomplete="off" type="text" name="sname" class="form-control" placeholder="Name of the Student / Research Scholars" required="required"/>
    
    </div>
     <div class="col-md-6 form-group">
    <label style="color:red" for="author">Father's Name:</label>
    <input value="<?php echo $fathers_name;?>" title="Father's name" autocomplete="off" type="text" name="sfaname" class="form-control" id="sfaname" placeholder="Father's Name" required="required"/>
    
</div>
             <div class="col-md-6 form-group">
    <label for="title" style="color:red">Mother's Name:</label>
   <input value="<?php echo $mothers_name;?>" title="Mother's name" autocomplete="off" type="text" name="smoname" class="form-control" placeholder="Mother's Name" required="required"/>


</div>
<script>
$(function(){
var pickerOpts = {
showOtherMonths: true,
                         
changeMonth:true,
                        
changeYear:true,
                        
yearRange:"1975:2013",

dateFormat:"yy-mm-dd",
                        
showOtherYears:true
    };  
    
$("#dob").datepicker(pickerOpts);

 
  });
</script>
<style type="text/css">

.ui-datepicker{

  background: #3b5999;
  color:white;
}
</style>

 <span class="clearfix">
<div class="col-md-6 form-group">
    <label style="color:red" for="author">Date of Birth:</label>
  <input value="<?php echo $dob;?>" title="DOB" autocomplete="off" type="text" name="sdob" class="form-control" id="dob" placeholder="Date of Birth" required="required"/>

</div>

    <div class="col-md-6 form-group">
    <label for="title" style="color:red">Sex:</label>
   
                <select  title="Select gender" name="ssex" class="form-control" id="sbgroup"  required="true">
                 
                <?php if($sex=='Male'){?>
                 <option selected value="Male">Male</option>
                  <option value="Female">Female</option>
                  <?php } else {?>

 <option  value="Male">Male</option>
                  <option selected value="Female">Female</option>


                  <?php 
               } ?>
                </select> 
</div>

<span class="clearfix">
             <div class="col-md-6 form-group">
    <label for="title" style="color:red">Category:</label>

      <select title="Select Category" name="scmmunity" class="form-control" id="scmmunity"  required="true">
        <option value="<?php echo $community; ?>"><?php echo $community; ?></option>
                <?php
               
                $query111=mysql_query("select * from caste where caste_name<>'$community'");
                 
                 while($rowdd11=mysql_fetch_array($query111))
               {
               ?>
                <option value="<?php echo $rowdd11['caste_name']; ?>">
                <?php  echo $rowdd11['caste_name'];?>
                </option>
                <?php 
               } 
                ?>
                </select>
        
</div>
 
<span class="clearfix">
              <div class="col-md-6 form-group" style="display:none">
    <label for="title" style="color:red">Region:</label>
       <select title="Select region" name="sregion" class="form-control" id="sregion"  required="true">
        <?php if($region=='Rural'){?>
                <option selected value="Rural">
                Rural
                </option>
                 <option value="Urban">
                Urban
                </option>
                <?php } else {?>

 <option  value="Rural">
                Rural
                </option>
                 <option selected value="Urban">
                Urban
                </option>


                <?php } ?>
                </select> 
</div>
<br/>
<br/>
  <input type="submit" class="btn btn-success" value="Save Changes">
<input type="reset" class="btn btn-danger" value="Cancel">
 
</div>
   </form>

 
<div class="modal-footer" style="display:">
                                                    

                                                    <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo $learn;?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<table class="no-border">
                <thead class="no-border">
                  <tr>
                    <th style="width:20%; color:green"><strong>Father's Name</strong><strong></th>
                    <th style="  color:green"><strong>Mother's Name</strong></th>
                    <th style="  color:green"><strong>DOB</strong></th>
                    
                    <th style=" color:green"><strong>Gender</strong></th>
                    <th style=" color:green"><strong>Category</strong></th>
                    <th style=" color:green;display:none"><strong>Region</strong></th>
                  </tr>
                </thead>
                <tbody class="no-border-x no-border-y">
                  <tr>
                    <td style="width:10%;"><?php echo $fathers_name;?></td>
                    <td><?php echo $mothers_name;?></td>
                    <td><?php echo $dob;?></td>
                    <td><?php echo $sex;?></td>
                    <td><?php echo $community;?></td>
                     <td style="display:none"><?php echo $region;?></td>
                  </tr>
                  
                </tbody>
              </table>
<br/>
<legend><i class="fa fa-mobile-phone"></i> Contact Information &raquo; <a href="#editcontact"  
  title="Edit Contact information" data-toggle="modal" class="btn btn-warning btn-sm pull-right">
  <i class="fa fa-pencil"></i> Edit Contact</a></legend>




<div   id="editcontact"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title">

                                                    Edit Contact Information &raquo; <?php echo $student_name;?> &raquo;
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Change contact information here</small></h5>
                                                

                                                </div>
                                                  
                                                <div class="modal-body">
<form action="<?php echo $base;?>actions/editContact.php?sl=<?php echo $sl;?>" method="post">
       
   <div class="col-md-6 form-group">
    <label for="author">Mobile No.:</label>
    <input value="<?php if($mb_no!='Not Available'){ echo $mb_no;}?>"  id="phone" pattern=".{10,}" title="Mobile number if available" onkeypress="return isno(event)" autocomplete="off" type="text" name="smob" class="form-control"  maxlength="14" placeholder="Mobile No."  />
</div>
          <div class="col-md-6 form-group">
    <label for="title" >Email:</label>
  <input value="<?php if($email_id!='Not Available'){ echo $email_id;}?>" id="email" autocomplete="off" type="email" title="Valid email ID if available" name="semail" class="form-control" placeholder="Email ID."  />
</div>


<span class="clearfix">



<br/>
<br/>
  <input type="submit" class="btn btn-success" value="Save Changes">
<input type="reset" class="btn btn-danger" value="Cancel">
 
</div>
   </form>

 
<div class="modal-footer" style="display:">
                                                    

                                                    <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo $learn;?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>




<table class="no-border">
                <thead class="no-border">
                  <tr>
                    <th style="width:20%; color:green"><strong>Contact Number</strong><strong></th>
                    <th style="  color:green"><strong>Email ID</strong></th>
                    
                  </tr>
                </thead>
                <tbody class="no-border-x no-border-y">
                  <tr>
                    <td style="width:10%;"><?php if($mb_no!='Not Available'){?>
      <span class="label label-success"><?php echo $mb_no;?></span>
<?php } else {?>

<span title="This information is currently not available" class="label label-danger">N/A</span>
<?php } ?></td>
                    <td><?php if($email_id!='Not Available'){?>
      <span class="label label-success"><?php echo $email_id;?></span>
<?php } else {?>

<span title="This information is currently not available" class="label label-danger">N/A</span>
<?php } ?></td>
                    
                  </tr>
                  
                </tbody>
              </table>

<br/>
<legend><i class="fa fa-random"></i> Fee and Admission Information &raquo; <a href="#editfee"  
  title="Edit Fees and Admission information" data-toggle="modal" class="btn btn-default btn-sm pull-right">
  <i class="fa fa-pencil"></i> Edit Fees and Admission</a></legend>



<div   id="editfee"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title">

                                                    Edit Fees and Admission Information &raquo; <?php echo $student_name;?> &raquo;
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Change fee and admission information here</small></h5>
                                                

                                                </div>
                                                  
                                                <div class="modal-body">
<form action="<?php echo $base;?>actions/editAdmissionFee.php?sl=<?php echo $sl;?>" method="post">
       
   

   <div class="col-md-6 form-group">
    <label style="color:red" for="author">Fee Category:</label>
               <select title="Fee category" name="sfeecat" class="form-control" id="sfeecat"  required="true">
    <option selected value="<?php echo $fee_category;?>"><?php echo getFeeCategory($fee_category);?></option>
                <?php
               
                $query111=mysql_query("select * from fee_category where fee_id<>$fee_category order by fee_id desc");
                 
                 while($rowdd11=mysql_fetch_array($query111))
               {
               ?>
                <option value="<?php echo $rowdd11['fee_id']; ?>">
                <?php  echo $rowdd11['category_name'];?>
                </option>
                <?php 
               } 
                ?>
                </select> 
</div>
<div class="col-md-6 form-group">
    <label style="color:red" for="author">Where to reside?</label>
               <select title="Fee category" name="reside" class="form-control" id="sfeecat"  required="true">
    <option selected value="<?php echo $reside;?>"><?php if($reside==1){echo "HOSTEL";}else{echo "OUTSIDE";}?></option>
    <option value="1">HOSTEL</option>            
    <option value="0">OUTSIDE</option>            
    </select> 
</div>
<span class="clearfix">
             <div class="col-md-6 form-group">
    <label for="title" style="color:red">Fees paid upto Semester/Year:</label>
     <select title="Fees paid upto" name="sfee" class="form-control" id="sfeeuptopay"  required="true">
      <option selected value="<?php echo $fee_paid_upto_semester_code;?>"><?php echo getSemester($fee_paid_upto_semester_code);?></option>      
                <?php
               
                $query111=mysql_query("select * from semester where id<>$fee_paid_upto_semester_code");
                 
                 while($rowdd11=mysql_fetch_array($query111))
               {
               ?>
                <option value="<?php echo $rowdd11['id']; ?>">
                <?php  echo $rowdd11['semester'];?>
                </option>
                <?php 
               } 
                ?>
                </select> 
</div> 



     <div class="col-md-6 form-group">
    <label for="title" style="color:red">Year of Admission:</label>
    <select title="Year of admission" name="syoa" class="form-control" id="syoa"  required="true">
       
                 <option selected value="<?php echo $year_of_admission;?>">
                <?php echo $year_of_admission;?>
                </option>
                <?php
               
               
                 for ($y=2005; $y<=2020; $y++) {
               if($y!=$year_of_admission){ 
             ?>
            
                <option value="<?php echo $y; ?>">
                <?php  echo $y;?>
                </option>
                <?php 
            }   } 
                ?>
                </select>
</div>

          <div class="col-md-6 form-group">
             <label for="title" style="color:red">Amount Paid:</label>
             <?php 
                $query1111=mysql_query("select * from fee_paid where student_detail_id=$sl");
               $rowdd111=mysql_fetch_array($query1111)
             ?>
             
             <input value="<?php echo $rowdd111['fee_paid'];?>"  title="Provide Fee Amount Paid" autocomplete="off" type="text" name="samountpaid" class="form-control" id="sfaname" placeholder="Paid Amount" />
                                                                                                     
          
         </div>
            <div class="col-md-6 form-group">
             <label for="title" style="color:red">Fee Recept No.:</label>
             <?php 
                $query1111=mysql_query("select * from fee_paid where student_detail_id=$sl");
               $rowdd111=mysql_fetch_array($query1111)
             ?>
             
             <input value="<?php echo $rowdd111['recept_no'];?>"  title="Provide Paid Fee Recept No." autocomplete="off" type="text" name="sfeercpno" class="form-control" id="sfaname" placeholder="Recept Number" /> 
						                                                                                             
          
         </div>



<br/>
<br/><br/>
<br/><br/>
<br/>
  <input type="submit" class="btn btn-success" value="Save Changes">
<input type="reset" class="btn btn-danger" value="Cancel">
 
</div>
   </form>

 
<div class="modal-footer" style="display:">
                                                    

                                                    <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo $learn;?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>



<table class="no-border">
                <thead class="no-border">
                  <tr>
                    <th style="width:20%; color:green"><strong>Year of Admission</strong><strong></th>
                    <th style="  color:green"><strong>Fees Paid Upto</strong></th>
                     <th style="  color:green"><strong>Fees Category</strong></th>
                      <th style="  color:green"><strong>Where to reside?</strong></th>
                      <th style="  color:green"><strong>Amount Paid:</strong></th>
                       <th style="  color:green"><strong>Fee Recept No.:</strong></th>
                    
                    
                  </tr>
                </thead>
                <tbody class="no-border-x no-border-y">
                  <tr>
                    <td style="width:10%;"><?php echo $year_of_admission;?></td>
                    <td><?php echo getSemester($fee_paid_upto_semester_code);?></td>
                     <td><?php echo getFeeCategory($fee_category);?></td>
                     <td><?php if($reside==1){echo "HOSTEL";}else{echo "OUTSIDE";}?></td>
                     
                     <td ><?php if($rowdd111['fee_paid']!=''){?>
                              <span class="label label-success"><?php echo $rowdd111['fee_paid'];?></span>
                        <?php } else {?>
                        
                        <span title="This information is currently not available" class="label label-danger">N/A</span>
                        <?php } ?>
                    </td>
                     <td ><?php if($rowdd111['recept_no']!=''){?>
                         <span class="label label-success"><?php echo $rowdd111['recept_no'];?></span>
                    <?php } else {?>
                    
                    <span title="This information is currently not available" class="label label-danger">N/A</span>
                    <?php } ?>
                   </td>
                    
                    
                    
                  </tr>
                  
                </tbody>
              </table>



<br/>
<legend><i class="fa fa-lock"></i> Login Credentials</legend> <span class="label label-default"><i class="fa fa-warning"></i> Login Credentials cannot be edited or modified since Login ID and OTP are autogenerated by the system. <?php echo $learn;?></span>


<table class="no-border">
                <thead class="no-border">
                  <tr>
                    <th style="width:20%; color:green"><strong>Login ID</strong><strong></th>
                    <th style="  color:green"><strong>One Time Password(OTP)</strong></th>
                    
                  </tr>
                </thead>
                <tbody class="no-border-x no-border-y">
                  <tr>
                    <td style="width:10%;"><?php echo $student_id;?></td>
                    <td><?php echo $password;?></td>
                    
                  </tr>
                  
                </tbody>
              </table>



      </div>
 
  