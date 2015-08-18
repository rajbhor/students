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
  <strong>Success!</strong> <?php echo base64_decode(@$_GET['errorResponse']);?>.
</div>
  </center>
<?php } ?>

      <form name="course" class="form-horizontal" action="<?php echo $base;?>actions/saveCourse.php" method="post">
         
                                    <fieldset>
                                        <legend><i class="fa fa-plus"></i> New Course &raquo; <small style="color:darkgrey; font-weight:bold; font-size:11px"> Use the below panel to add a new course</small></legend>
                                         <div class="form-group">
                                            <label style="color:red" class="col-lg-2 control-label" for="select02">Department*</label>
                                            <div class="col-lg-5">
                                               
                                                    <select title="Select Department" name="dept" id ="dept" class="form-control" required="true" >
                                        <option value="">Select Department</option>
                                        <?php 
										
										$select= mysql_query("select * from department");
										if(mysql_num_rows($select)>0)
										{
										   while($rows=mysql_fetch_array($select))
											  {	
											  		
										?>
                                      <option value="<?php echo $rows['dept_code']; ?>"><?php echo $rows['dept_name']; ?></option>
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
                                                <input   autocomplete="off" class="form-control" id="course" type="text" title="Please enter a course name" name="course" required="true" >
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
   
        <?php  $sql="select * from department order by dept_code";                     
        $run=mysql_query($sql) or die(mysql_error()) ;
if(mysql_num_rows($run)>=1){?>

<span class="label label-success"> The following table shows department names with courses listed under each department</span>
<br/><br/> 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:11px">
  <thead>
    <tr>
      <th style="color:green;font-size:11px">#</th>
      <th style="color:green;font-size:11px">Department</th>
      <th style="color:green;font-size:11px" align="center">Department Code</th>
       
    </tr>
  </thead>
  <?php  $i=1; while($fetch=mysql_fetch_array($run)){  ;?>

<tr>
<td style="color:#3b5999" align="center"><?php echo $i;?></td>
 
<td style="color:#3b5999;font-size:14px;" align=""><?php echo $fetch['dept_name'];?>


<br/>
<?php 
 $coursesql="select * from course where dept_code=".$fetch['dept_code']." order by course_id";                     
        $runcourse=mysql_query($coursesql) or die(mysql_error()) ; 
        if(mysql_num_rows($runcourse)>=1){
        while($fetchcourse=mysql_fetch_array($runcourse)){?>
<li id="lirow_<?php echo $fetchcourse['course_id'];?>" style="font-size:11px; color:#4185F4; font-weight:bolder; padding-left:20px; list-style:none" class=''>
  <?php echo $fetchcourse['course_name']; $cd=$fetchcourse['course_id'];?> 
<?php $check=mysql_query("select count(dept_center_course_code) as cnt from student_details where dept_center_course_code= $cd and belongs_to_center_dept='dept'");

$fetchcount=mysql_fetch_array($check);
$counter=$fetchcount['cnt'];
if($counter==0){ //deletable
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#del_<?php echo $fetchcourse['course_id'];?>").click(function(){
   
      //$("#editc_<?php echo $crow->id;?>").hide();
      // $("#details").hide();

      var courseid="<?php echo $fetchcourse['course_id'];?>";
       if (window.confirm ('Are you sure to remove this course?')) {
           $("#del_<?php echo $fetchcourse['course_id'];?>").hide();
      $("#edit_<?php echo $fetchcourse['course_id'];?>").hide(); 
     if(courseid!=''){
      var dataString = {'courseid':courseid};
      $.ajax({
        url: '<?php echo $base;?>includes/remove_department_course.php',
          type: 'POST',
          dataType: 'json',
           data: dataString,
   beforeSend: function() {
              $("#img_<?php echo $fetchcourse['course_id'];?>").show();
               $("#message_<?php echo $fetchcourse['course_id'];?>").show();
               
        },
          success: function(data) {
            if(data.message=='Done'){
              $("#img_<?php echo $fetchcourse['course_id'];?>").hide();
               $("#message_<?php echo $fetchcourse['course_id'];?>").hide();
               $("#lirow_<?php echo $fetchcourse['course_id'];?>").hide();
             }

               
          }
      });
    }
  }
  else {

// do nothing

  }
     
    });
  });
</script>
       

<i id="del_<?php echo $fetchcourse['course_id'];?>" title="Remove <?php echo $fetchcourse['course_name'];?> from <?php echo $fetch['dept_name'];?>  " class="fa fa-trash-o pull-right"></i>
<img class="pull-right" title="Removing.." alt="Removing.."  style="display:none;width:2%" id="img_<?php echo $fetchcourse['course_id'];?>" src="<?php echo $base;?>images/ajax_loader_blue_512.gif"><span style="display:none;" id="message_<?php echo $fetchcourse['course_id'];?>" style="" class="label label-warning pull-right">Removing..</span>

<?php } else { ?>

<i title="You cannot remove <?php echo $fetchcourse['course_name'];?> from <?php echo $fetch['dept_name'];?> as this course contains students under its scaffold " class="fa fa-warning pull-right"></i>


<?php }  ?>

<a href="#editer_<?php echo $fetchcourse['course_id'];?>" data-toggle="modal">
  <i  id="edit_<?php echo $fetchcourse['course_id'];?>" title="Edit  <?php echo $fetchcourse['course_name'];?> 
    under <?php echo $fetch['dept_name'];?>" class="fa fa-pencil pull-right"></i></a></li>


 <div id="editer_<?php echo $fetchcourse['course_id'];?>"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:900px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 style="text-align:left" id="myModalLabel" class="modal-title">
                                                      Edit Course &raquo; 
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Change or edit course under <?php echo $fetch['dept_name'];?></small></h5>
                                                </div>
                                                  <form action="<?php echo $base;?>actions/editCourse.php?id=<?php echo $fetchcourse['course_id'];?>" method="post">
                                                <div class="modal-body">
                                                  <div>
    <label for="department" style="float:left;color:red">Department*</label>  



<script>
$(document).ready(function()
 {
    
   
  $("#course_<?php echo $fetchcourse['course_id'];?>").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var course=$.trim($("#course_<?php echo $fetchcourse['course_id'];?>").val());
   var deptid=$.trim($("#dept_<?php echo $fetchcourse['course_id'];?>").val());
   var courseid=<?php echo $fetchcourse['course_id'];?>;
    
    
     if(course!='' && deptid!='' && courseid!='')
  var dataString = {'course':course,'deptid':deptid,'courseid':courseid};
    $.ajax({
            url: '<?php echo $base;?>includes/check_course_name_update.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error_<?php echo $fetchcourse['course_id'];?>").show();
          $("#error_<?php echo $fetchcourse['course_id'];?>").fadeOut(3000);
          $("#course_<?php echo $fetchcourse['course_id'];?>").val('');
          $('#dept_<?php echo $fetchcourse['course_id'];?>').val(deptid).trigger('change');

            
         
          }
           
                 

          }
           });
    
    
    
});
 
});
</script>


                                    <select title="Department" name="dept_<?php echo $fetchcourse['course_id'];?>" 
                                      id ="dept_<?php echo $fetchcourse['course_id'];?>" class="form-control" required="true" >
                                        <option selected value="<?php echo $fetch['dept_code'];?>"><?php echo $fetch['dept_name'];?></option>
                                         
                    
                     

                                        </select>
                                      </div>

                                                     <div>
    <label for="course" style="float:left;color:red">Course*</label>
    <input onkeypress="" value="<?php echo $fetchcourse['course_name'];?>" required placeholder="Please enter course here" class="form-control"  
    name="course_<?php echo $fetchcourse['course_id'];?>" title="Change or edit course here" autocomplete="off" 
    id="course_<?php echo $fetchcourse['course_id'];?>" type="text"/>
    <span class="label label-danger" id="error_<?php echo $fetchcourse['course_id'];?>" style="display:none;float:left">
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
 


 echo "<span id='nocourse' class='label label-danger'>No course exist under this department. 
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
            url: '<?php echo $base;?>includes/check_course_name.php',
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
 
  