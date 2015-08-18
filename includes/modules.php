<div class="row dash-cols">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="block">
            <div class="header" style="background:#5cb85c">
              <h2 style="font-size:23px;color:white"><i class="fa fa-tasks"></i>Department Manager</h2>
            </div>
            
<div class="content no-padding" style="">
              <div class="fact-data text-center">
                
                     <a   href="<?php echo $base;?>departmentGetStarted.php/"> <button data-popover="popover" type="button" class="btn btn-success" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's departments management panel and start exploring the system!" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 

                
              </div>
              <div class="fact-data text-center">
                <a target="_blank" href="<?php echo $base;?>addDepartment.php"><button  title="Add Department" type="button" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a>
                <a target="_blank" href="<?php echo $base;?>searchDepartment.php"> <button title="Search and view Departments" type="button" class="btn btn-default btn-xs"><i class="fa fa-search"></i></button></a>
                

              </div>
            </div>
          </div>
<div class="block">
            <div class="header" style="background:#4D90FD">
              <h2 style="font-size:23px; color:white"><i class="fa fa-random"></i>Center Manager</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
               <a   href="<?php echo $base;?>centerGetStarted.php">
                   <button data-popover="popover" type="button" class="btn btn-primary" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's Center management panel and start exploring the system!" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 

              </div>
              <div class="fact-data text-center">
              <a target="_blank" href="<?php echo $base;?>addCenter.php"><button  title="Add Center" type="button" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a>
                  <a target="_blank" href="<?php echo $base;?>searchCenter.php"> <button title="Search and view centres" type="button" class="btn btn-default btn-xs">
                    <i class="fa fa-search"></i></button></a>
                    
                   
              </div>
            </div>
          </div>
            
            <div class="block">
            <div class="header" style="background:#BB7F62">
              <h2 style="font-size:23px; color:white"><i class="fa fa-search"></i>Center-Students</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
               <a data-toggle="modal"   href="#centerStudents">
                   <button data-popover="popover" type="button" class="btn btn-primary"  style="background:#BB7F62"
                data-original-title="Get Started Here" 
                data-content="Click here to search,view and manage students across University Centers with respect to various courses associated with the centers" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 

              </div>
              <div class="fact-data text-center">
          <a title="Click here to search, view and manage students across various centers in the University" data-toggle="modal"   href="#centerStudents">   <span class="label label-success" style="background:#BB7F62">Search Center Students</span>
          </a>         
              </div>
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


        </div>  

        <div class="col-sm-6 col-md-6 col-lg-4" >
          <div class="block" >
            <div class="header" style="background:#06A54C" >
              <h2 style="font-size:23px; color:white"><i class="fa fa-book"></i>Dept-Course Manager</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
                 <a href="<?php echo $base;?>courseGetStarted.php">
                   <button data-popover="popover" type="button" style="background:#06A54C" class="btn btn-warning" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's department-course management panel and start exploring the system!" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 

              </div>
              <div class="fact-data text-center">
               <a target="_blank" href="<?php echo $base;?>addDepartmentCourse.php"><button  title="Add Course" type="button" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a>
                 <a target="_blank" href="<?php echo $base;?>searchDepartmentCourse.php"> <button title="Search and view courses" type="button" class="btn btn-default btn-xs"><i class="fa fa-search"></i></button></a>
                    
                   
                 
              </div>
            </div>
          </div>
          <div class="block">
            <div class="header" style="background:rgb(20, 150, 190);">
              <h2 style="font-size:23px;color:white"><i class="fa fa-sitemap"></i>Center-Course Manager</h2>
            </div>
            
<div class="content no-padding" style="">
              <div class="fact-data text-center">
                
                     <a  href="<?php echo $base;?>centerCourseGetStarted.php"> <button data-popover="popover" type="button" class="btn btn-success" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's center-course management panel and start exploring the system!" 
                data-placement="bottom" data-trigger="hover" style="background:rgb(20, 150, 190);">Get Started</button></a> 

                
              </div>
              <div class="fact-data text-center">
                <a target="_blank" href="<?php echo $base;?>addCenterCourse.php"><button  title="Add Center Course" type="button" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a>
                 <a target="_blank" href="<?php echo $base;?>searchCenterCourse.php"> <button title="Search and view Center Courses" type="button" class="btn btn-default btn-xs"><i class="fa fa-search"></i></button></a>
                     
              </div>
                
            </div>
          </div>

 
        
           <div class="block">
            <div class="header" style="background:#D66E3D">
              <h2 style="font-size:23px; color:white"><i class="fa fa-search"></i>Department-Students</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
               <a  data-toggle="modal"  href="#deptStudents">
                   <button data-popover="popover" type="button" style="background:#D66E3D" class="btn btn-primary" 
                data-original-title="Get Started Here" 
                data-content="Click here to search,view and manage students across University Departments with respect to various courses associated with the departments" 
                data-placement="bottom" data-trigger="hover">Get Started</button></a> 
             </div>
              <div class="fact-data text-center">
           <a title="Click here to search, view and manage students across various departments in the University" data-toggle="modal"   href="#deptStudents">      <span class="label label-success" style="background:#D66E3D">Search Dept. Students</span>
</a>
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



<div class="col-sm-6 col-md-6 col-lg-4">
                 <div class="block">
            <div class="header" style="background:#6D81AD">
              <h2 style="font-size:23px; color:white"><i class="fa fa-user"></i>User Manager</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
               <a   href="<?php echo $base;?>userGetStarted.php">
                   <button data-popover="popover" type="button" class="btn btn-primary" 
                data-original-title="Get Started Here" 
                data-content="Click here to enter the university's department operator management panel and start exploring the system!" 
                data-placement="bottom" data-trigger="hover" style="background:#6D81AD">Get Started</button></a> 

              </div>
              <div class="fact-data text-center">
              <a target="_blank" href="<?php echo $base;?>addOperator.php"><button  title="Add Department Operator" type="button" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a>
                  
                    <a target="_blank" href="<?php echo $base;?>searchOperator.php"> <button title="Search and view department operators" type="button" class="btn btn-default btn-xs"><i class="fa  fa-search"></i></button></a>
                 
              </div>
            </div>
          </div>
          
         
 <div class="block" >
            <div class="header" style="background:#FF9900" >
              <h2 style="font-size:23px; color:white"><i class="fa  fa-gear"></i>System Manager</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
                 <a  href="<?php echo $base;?>factoryBackup.php">
                   <button data-popover="popover" type="button" class="btn btn-warning" 
                data-original-title="Get Started Here" 
                data-content="Click on the Database Backup button to download a latest image of the database in compressed .gz format " 
                data-placement="bottom" data-trigger="hover" style="background:#FF9900"><i class="fa fa-download"></i> Database Backup</button></a> 

              </div>
              <div class="fact-data text-center">
               <a data-toggle="modal" href="#openchange"> <button  title="Change Title" type="button" class="btn btn-default btn-xs"><i class="fa fa-text-height"></i></button></a>
                 <a   href="<?php echo $base;?>account.php"> <button title="Manage Administrator Account" type="button" class="btn btn-default btn-xs"><i class="fa fa-lock"></i></button></a>
                    
                    
                 
              </div>
            </div>
          </div>

   <div class="block">
            <div class="header" style="background:#4D90FD">
              <h2 style="font-size:23px; color:white"><i class="fa fa-download"></i>Excel Downloads Manager</h2>
            </div>
            <div class="content no-padding">
              <div class="fact-data text-center">
               <a   href="<?php echo $base;?>downloadWindow.php">
                   <button data-popover="popover" type="button" class="btn btn-primary" 
                data-original-title="Enter Download Panel" 
                data-content="Click here to enter the download manager so as to download University data in excel format from a varied list of download choices" 
                data-placement="bottom" data-trigger="hover"><i class="fa  fa-sign-in"></i>Enter Download Panel</button></a> 

              </div>
              <div class="fact-data text-center">
            
                    
                   
              </div>
            </div>
          </div>

        </div>
