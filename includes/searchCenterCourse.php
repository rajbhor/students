 <script type="text/javascript">
$(document).ready(function(){

$("#sc").fadeOut(10000);

});

 </script>
  <div class="cl-mcont">
      <div class="page-head">
      <h3 title="Search Center Course" class="label label-success" style="font-size:19px">
        <i class="fa  fa-sitemap"></i> Search Center Courses</h3>
      </div> 

      <br/><br/> 
    
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
  <strong>Success!</strong> <?php echo base64_decode(@$_GET['errorResponse']);?>.
</div>
  </center>
<?php } ?>

      <form style="display:none" name="course" class="form-horizontal" action="<?php echo $base;?>actions/saveCenterCourse.php" method="post">
         
                                    <fieldset>
                                        <legend><i class="fa fa-plus"></i> New Center-Course &raquo;
                                         <small style="color:darkgrey; font-weight:bold; font-size:11px"> 
                                          Use the below panel to add a new course to a center</small></legend>
                                         <div class="form-group">
                                            <label style="color:red" class="col-lg-2 control-label" for="select02">Center*</label>
                                            <div class="col-lg-5">
                                               
                                                    <select title="Select Center" name="dept" id ="dept" class="form-control" required="true" >
                                        <option value="">Select Center or Institute</option>
                                        <?php 
										
										$select= mysql_query("select * from center order by center_code desc");
										if(mysql_num_rows($select)>0)
										{
										   while($rows=mysql_fetch_array($select))
											  {	
											  		
										?>
                                      <option value="<?php echo $rows['center_code']; ?>"><?php echo $rows['center_name']; ?></option>
                                      <?php 
									  		   }
										}
									  ?>
                                        </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:red" class="col-lg-2 control-label" for="focusedInput">Course*</label>
                                            <div class="col-lg-5">
                                                <input   autocomplete="off" class="form-control" id="course" type="text" 
                                                title="Please enter a course name" placeholder="Please enter a course name" name="course" required="true" >
                                            </div>
                                            <span id="error" class="label label-danger" style="display:none">Course name already exists under this department</span>
                                        </div>
                                       
                                        
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label" for="focusedInput"></label>
                                            <div class="col-lg-10">
                                   <button type="submit"  class="btn btn-success">Add Course </button>
                                     <button type="reset"  class="btn btn-default">Cancel </button>
				     
				   <small style="color:darkgrey; font-weight:bold; font-size:11px">
				   <?php echo $learn;?></small>
                                      
                                        </div>
                                        </div>
                                    </fieldset>
                                      </form>  <!--end of form-->






 <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demopage.css">
     <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demotable.css"> 
     
    <script type="text/javascript" language="javascript" src="<?php echo $base;?>js/dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
          var oTable=$('#example').dataTable({ "aLengthMenu": [
            [10, 50, 100, 200, -1],
            [10, 50, 100, 200, "All"]
        ], 


"iDisplayLength" : 10 });
         
    
  oTable.fnSort( [ [0,'asc'] ] );
      } );
    </script>
   
        <?php  $sql="select * from center order by center_code desc";                     
        $run=mysql_query($sql) or die(mysql_error()) ;
if(mysql_num_rows($run)>=1){?>

<span class="label label-primary"><i class="fa fa-info"></i> The following table shows center names with courses listed under 
  each center</span>
<br/><br/> 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:11px">
  <thead>
    <tr>
      <th style="color:green;font-size:11px">#</th>
      <th style="color:green;font-size:11px">Center</th>
      <th style="color:green;font-size:11px" align="center">Center Code</th>
       
    </tr>
  </thead>
  <?php  $i=1; while($fetch=mysql_fetch_array($run)){  ;?>

<tr>
<td style="color:#3b5999" align="center"><?php echo $i;?></td>
 
<td style="color:#3b5999;font-size:14px;" align=""><?php echo $fetch['center_name'];?>


<br/>
<?php 
 $coursesql="select * from center_course where center_code=".$fetch['center_code']." order by cc_code desc";                     
        $runcourse=mysql_query($coursesql) or die(mysql_error()) ; 
        if(mysql_num_rows($runcourse)>=1){
        while($fetchcourse=mysql_fetch_array($runcourse)){?>
<li id="lirow_<?php echo $fetchcourse['cc_code'];?>" style="font-size:11px; color:#4185F4; font-weight:bolder; padding-left:20px; list-style:none" class=''>
  <?php echo $fetchcourse['cc_name']; $cd=$fetchcourse['cc_code'];?> 
<?php $check=mysql_query("select count(dept_center_course_code) as cnt from student_details where dept_center_course_code= $cd and belongs_to_center_dept='center'");

$fetchcount=mysql_fetch_array($check);
$counter=$fetchcount['cnt'];
if($counter==0){ //deletable
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#del_<?php echo $fetchcourse['cc_code'];?>").click(function(){
   
      //$("#editc_<?php echo $crow->id;?>").hide();
      // $("#details").hide();

      var courseid="<?php echo $fetchcourse['cc_code'];?>";
      var depcode="<?php echo $fetchcourse['center_code'];?>";
      
           $("#del_<?php echo $fetchcourse['cc_code'];?>").hide();
      $("#edit_<?php echo $fetchcourse['cc_code'];?>").hide(); 
     if(courseid!='' && depcode!=''){
      var dataString = {'courseid':courseid,'depcode':depcode};
      $.ajax({
        url: '<?php echo $base;?>includes/remove_center_course.php',
          type: 'POST',
          dataType: 'json',
           data: dataString,
   beforeSend: function() {
              $("#img_<?php echo $fetchcourse['cc_code'];?>").show();
               $("#message_<?php echo $fetchcourse['cc_code'];?>").show();
               
        },
          success: function(data) {
            if(data.message=='Done' && data.num>=1){
              $("#img_<?php echo $fetchcourse['cc_code'];?>").hide();
               $("#message_<?php echo $fetchcourse['cc_code'];?>").hide();
               $("#lirow_<?php echo $fetchcourse['cc_code'];?>").hide();
             }

              else if(data.message=='Done' && data.num==0){

             window.location.href="<?php echo $base;?>centerCourseGetStarted.php";

             }

               
          }
      });
    }
  
     
    });
  });
</script>
       

<i id="del_<?php echo $fetchcourse['cc_code'];?>" title="Remove <?php echo $fetchcourse['cc_name'];?> from <?php echo $fetch['center_name'];?>  " class="fa fa-trash-o pull-right"></i>
<img class="pull-right" title="Removing.." alt="Removing.."  style="display:none;width:2%" id="img_<?php echo $fetchcourse['cc_code'];?>" src="<?php echo $base;?>images/ajax_loader_blue_512.gif"><span style="display:none;" id="message_<?php echo $fetchcourse['cc_code'];?>" style="" class="label label-warning pull-right">Removing..</span>

<a disabled>
 <i  id="cannotviewer_<?php echo $fetchcourse['course_id'];?>" 
  title="You cannot view or manage students in <?php echo $fetchcourse['cc_name'];?> as this course contains no students
    " class="fa fa-info pull-right"></i></a> 


<?php } else { ?>

<i title="You cannot remove <?php echo $fetchcourse['cc_name'];?> from <?php echo $fetch['center_name'];?> as this course contains students under its scaffold " class="fa fa-warning pull-right"></i>


<a href="<?php echo $base;?>studentCenterCoursePanel.php?centerid=<?php echo base64_encode($fetch['center_code']);?>&courseid=<?php echo base64_encode($fetchcourse['cc_code']);?>">
 <i  id="viewer_<?php echo $fetchcourse['cc_code'];?>" title="Search and manage students in <?php echo $fetchcourse['cc_name'];?> under <?php echo $fetch['center_name'];?> 
    " class="fa fa-users pull-right"></i></a> 
 

<?php }  ?>

<a href="#editer_<?php echo $fetchcourse['cc_code'];?>" data-toggle="modal">
  <i  id="edit_<?php echo $fetchcourse['cc_code'];?>" title="Edit  <?php echo $fetchcourse['cc_name'];?> 
    under <?php echo $fetch['center_name'];?>" class="fa fa-pencil pull-right"></i></a></li>


 <div id="editer_<?php echo $fetchcourse['cc_code'];?>"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:900px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 style="text-align:left" id="myModalLabel" class="modal-title">
                                                      Edit Course &raquo; 
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Change or edit course under <?php echo $fetch['center_name'];?></small></h5>
                                                </div>
                                                  <form action="<?php echo $base;?>actions/editCenterCourse.php
                                                    ?id=<?php echo $fetchcourse['cc_code'];?>" method="post">
                                                <div class="modal-body">
                                                  <div>
    <label for="department" style="float:left;color:red">Center*</label>  



<script>
$(document).ready(function()
 {
    
   
  $("#course_<?php echo $fetchcourse['cc_code'];?>").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var course=$.trim($("#course_<?php echo $fetchcourse['cc_code'];?>").val()); //coursename
   var deptid=$.trim($("#dept_<?php echo $fetchcourse['center_code'];?>").val()); //centercode
   var courseid=<?php echo $fetchcourse['cc_code'];?>;

    
    
     if(course!='' && deptid!='' && courseid!='')
  var dataString = {'course':course,'deptid':deptid,'courseid':courseid};
    $.ajax({
            url: '<?php echo $base;?>includes/check_cc_name_update.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error_<?php echo $fetchcourse['cc_code'];?>").show();
          $("#error_<?php echo $fetchcourse['cc_code'];?>").fadeOut(3000);
          $("#course_<?php echo $fetchcourse['cc_code'];?>").val('<?php echo $fetchcourse['cc_name'];?>');
          $('#dept_<?php echo $fetchcourse['cc_code'];?>').val(deptid).trigger('change');

            
         
          }
           
                 

          }
           });
    
    
    
});
 
});
</script>


                                    <select title="Center" name="dept_<?php echo $fetchcourse['cc_code'];?>" 
                                      id ="dept_<?php echo $fetch['center_code'];?>" class="form-control" required="true" >
                  <option selected value="<?php echo $fetch['center_code'];?>"><?php echo $fetch['center_name'];?></option>
                                         
                    
                     

                                        </select>
                                      </div>

                                                     <div>
    <label for="course" style="float:left;color:red">Course*</label>
    <input onkeypress="" value="<?php echo $fetchcourse['cc_name'];?>" required placeholder="Please enter course here" class="form-control"  
    name="course_<?php echo $fetchcourse['cc_code'];?>" title="Change or edit course here" autocomplete="off" 
    id="course_<?php echo $fetchcourse['cc_code'];?>" type="text"/>
    <span class="label label-danger" id="error_<?php echo $fetchcourse['cc_code'];?>" style="display:none;float:left">
      Course Name already exists. Please try another one!!</span>
</div>
                                                </div>
                                                <div class="modal-footer">
                                                    <small style="color:darkgrey; font-weight:bold; font-size:12px">
<?php echo $learn;?>
</small>
                                                    
                                                    <button  type="submit" class="btn btn-primary">Save Changes</button>
                                                     <button  type="reset" class="btn btn-danger">Cancel</button>
                                                    

                                                   </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






<?php } } else {  
 


 echo "<span id='nocourse' class='label label-danger'><i class='fa fa-info'></i> No course exist under this centre. 
 </span>";
   


} ?>
 
  </td>
 

<td style="color:#3b5999;font-size:11px;font-size:14px;" align="center"><?php echo $fetch['sf_code'];?>
  </td>
 












</tr>
<?php 
$i++; } ?>
</table>
  <?php }  //end of if 

  else { 


  echo "<span id='nope' class='label label-danger'>No records exist. Please add a new course using the above panel to reflect changes!!</span>";
   


   }?> 







                            </div>
                     


  
  </div> 



  <script>
$(document).ready(function()
 {
    
   
  $("#course").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var course=$.trim($("#course").val());
   var deptid=$.trim($("#dept").val());
    
    
     if(course!='' && deptid!='')
  var dataString = {'course':course,'deptid':deptid};
    $.ajax({
            url: '<?php echo $base;?>includes/check_cc_name.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error").show();
          $("#error").fadeOut(3000);
          $("#course").val('');
          $('#dept').val('').trigger('change');

            
         
          }
           
                 

          }
           });
    
    
    
});
 
});
</script>
 
  