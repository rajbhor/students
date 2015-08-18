<div id="cl-wrapper" >
    <div class="cl-sidebar" >
      <div class="cl-toggle"><i class="fa fa-bars"></i></div>
      <div class="cl-navblock">
        <ul class="cl-vnavigation">
           <li><a href="<?php echo $base;?>dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
           
        <?php if($type=='admin'){?>
        
         
          <li><a title="Get Started with Department Management" 
            href="<?php echo $base;?>departmentGetStarted.php"><i class="fa fa-tasks"></i>Department Manager</a></li>
          <li>
            <a title="Get Started with Department-Course Management" 
            href="<?php echo $base;?>courseGetStarted.php"><i class="fa fa-book"></i>Dept-Course Manager</a>

          </li>
          <li>
            <a title="Get Started with Center Management" href="<?php echo $base;?>centerGetStarted.php/"><i class="fa fa-random"></i>Center Manager</a>


          </li>

           <li>
            <a title="Get Started with Center-Course Management" href="<?php echo $base;?>centerCourseGetStarted.php/"><i class="fa fa-sitemap"></i>Center-Course Manager</a>


          </li>


            
 <?php if($type=='admin'){?><li><a title="Get Started with University Department Operator Management" href="<?php echo $base;?>/userGetStarted.php/"><i class="fa fa-users"></i>Operator Management</a></li>
<?php } ?>


   <li>
            <a data-toggle="modal"
            title="Click here to add a new student in a particular center of the University" 
            href="<?php echo $base;?>administratorCenterStudentEntry.php"><i class="fa fa-plus"></i>Center Student Entry</a>


          </li>



             <li>
            <a data-toggle="modal"
            title="Click here to add a new student in a particular department of the University" 
            href="<?php echo $base;?>administratorDeptStudentEntry.php"><i class="fa fa-plus"></i>Dept Student Entry</a>


          </li>


<li>
            <a data-toggle="modal"
            title="Click here to search, view and manage students across various centers in the University" 
            href="#centerStudents"><i class="fa fa-search"></i>Search Center Students</a>


          </li>


          <li>
            <a data-toggle="modal"
            title="Click here to search, view and manage students across various departments in the University" 
            href="#deptStudents"><i class="fa fa-search"></i>Search Dept Students</a>


          </li>


    <li><a title="Get a full view of fee structure legend across various centers and departments across the university" 
      href="<?php echo $base;?>overallFeeStructure.php"><i class="fa fa-file"></i>Fee Structure Legend</a>
            
          </li> 


          <li>
            <a  title="Download various information in Excel Format by choosing from a list of available choices" href="<?php echo $base;?>downloadWindow.php/"><i class="fa fa-download"></i>Excel Downloads Manager</a>


          </li>
          <li><a title="Details of Fee Paid <?php echo $loggername;?>" 
            href="<?php echo $base;?>fee_paid_details.php"><i class="fa fa-plus"></i>Details of fee paid</a></li>
          <li>
          
          <?php } else {  ?>



          <li><a title="Get Started with Student Entry in <?php echo $loggername;?>" 
            href="<?php echo $base;?>studentEntryGetStarted.php"><i class="fa fa-plus"></i>Student Entry Manager</a></li>
          <li>
            <a title="Get Started with Student Management in <?php echo $loggername;?>" 
            href="<?php echo $base;?>studentManager.php"><i class="fa fa-users"></i>Student Management</a>
          </li>
          
           <li><a title="Fee Management | <?php echo $loggername;?>" href="#"><i class="fa fa-file"></i>Fee Management</a>
            <ul class="sub-menu">
              <li><a href="<?php echo $base;?>feeEntryGetStarted.php">Create and Manage Fee Structure</a></li>
              <li><a href="<?php echo $base;?>feeManageGetStarted.php">Fee Structure Legend</a></li>
            
            </ul>
          </li> 
           
           
         <li>
            <a title="Download various information in Excel Format from <?php echo $loggername;?>  by choosing from a list of available choices" href="<?php echo $base;?>downloadWindowDepartment.php/"><i class="fa fa-download"></i>Excel Downloads Manager</a>


          </li>
          <li><a title="Details of Fee Paid <?php echo $loggername;?>" 
            href="<?php echo $base;?>fee_paid_details.php"><i class="fa fa-plus"></i>Details of fee paid</a></li>
          <li>
 



          <?php } ?>
        
       
      </div>


    </div>

      <div id="centerStudents"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:900px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 style="text-align:left" id="myModalLabel" class="modal-title">
                                                      Select Center Course &raquo; 
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Select a center-course to view students</small></h5>
                                                </div>
            <form id="centerSearch" action="<?php echo $base;?>centerStudentsFilter.php" method="post">



              <script type="text/javascript">
$(document).ready(function()
{
$("#center").change(function()
{
   
var cenid=$(this).val();
var sel=$.trim($("#center_course").val());
var dataString = {'cenid': cenid,'sel':sel};
if(cenid!=''){
$.ajax
({
type: "POST",
url: "<?php echo $base;?>includes/getCenterCourses.php",
data: dataString,
 cache: false,

success: function(html)
{
$('#c_course').show(); 
 
$("#center_course").html(html);


//$('.smalltextss').val(html.roll); 
 

}
});
}


});

});
</script>
<script type="text/javascript">

function resetCenter(){

$('#c_course').fadeOut(); 
$('#center').val('').trigger('change');
 
}
</script>
                                                <div class="modal-body">
                                                  <div>
    <label for="department" style="float:left;color:red">Center*</label>  



 <?php $c=mysql_query("select * from center order by center_code desc");?>
                                    <select title="Select a center to view students" 
                                    name="center" 
                                      id ="center" class="form-control" required="true" >
                                      <option value="" selected >--Select Center--</option>
                                      <?php while($cen=mysql_fetch_array($c)){?>
                                    <option   value="<?php echo $cen['center_code'];?>"><?php echo $cen['center_name'];?></option>
                                         
                    <?php } ?>
                     

                                        </select>
                                      </div>

                                                     <div id="c_course" style="display:none">
    <label   for="course" style="float:left;color:red">Center Course*</label>
<select title="Select a center course to view students" 
                                    name="center_course" 
                                      id ="center_course" class="form-control" required="true" >
                                    

                                        </select>
    
</div>
                                                </div>
                                                <div class="modal-footer">
                                                    <small style="color:darkgrey; font-weight:bold; font-size:12px">
<?php echo $learn;?>
</small>
                                                    
                                                    <button id="searchButtonCenter"  type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search Students</button>
                                                     <button  id="resetCenter()" type="reset" class="btn btn-danger">Cancel</button>
                                                    

                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



       <div id="deptStudents"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:900px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 style="text-align:left" id="myModalLabel" class="modal-title">
                                                      Select Department Course &raquo; 
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Select a department-course to view students</small></h5>
                                                </div>
            <form id="deptSearch" action="<?php echo $base;?>deptStudentsFilter.php" method="post">



              <script type="text/javascript">
$(document).ready(function()
{
$("#dept").change(function()
{
   
var depid=$(this).val();
var sel1=$.trim($("#dept_course").val());
var dataString = {'depid': depid,'sel1':sel1};
if(depid!=''){
$.ajax
({
type: "POST",
url: "<?php echo $base;?>includes/getDeptCourses.php",
data: dataString,
 cache: false,

success: function(html)
{
$('#d_course').show(); 
 
$("#dept_course").html(html);


//$('.smalltextss').val(html.roll); 
 

}
});
}


});

});
</script>
<script type="text/javascript">

function resetDept(){

$('#d_course').fadeOut(); 
$('#dept').val('').trigger('change');
 
}
</script>
                                                <div class="modal-body">
                                                  <div>
    <label for="department" style="float:left;color:red">Department*</label>  



 <?php $d=mysql_query("select * from department order by dept_code desc");?>
                                    <select title="Select a department to view students" 
                                    name="dept" 
                                      id ="dept" class="form-control" required="true" >
                                      <option value="" selected >--Select Department--</option>
                                      <?php while($dep=mysql_fetch_array($d)){?>
                                    <option   value="<?php echo $dep['dept_code'];?>"><?php echo $dep['dept_name'];?></option>
                                         
                    <?php } ?>
                     

                                        </select>
                                      </div>

                                                     <div id="d_course" style="display:none">
    <label   for="course" style="float:left;color:red">Department Course*</label>
<select title="Select a department course to view students" 
                                    name="dept_course" 
                                      id ="dept_course" class="form-control" required="true" >
                                    

                                        </select>
    
</div>
                                                </div>
                                                <div class="modal-footer">
                                                    <small style="color:darkgrey; font-weight:bold; font-size:12px">
<?php echo $learn;?>
</small>
                                                    
                                                    <button id="searchButtonDept"  type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search Students</button>
                                                     <button  id="resetDept()" type="reset" class="btn btn-danger">Cancel</button>
                                                    

                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
