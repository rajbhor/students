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

      <form name="department" class="form-horizontal" action="<?php echo $base;?>actions/saveDepartment.php" method="post">
         
                                    <fieldset>
                                        <legend><i class="fa fa-plus"></i> New Department &raquo; 
                                          <small style="color:darkgrey; font-weight:bold; font-size:11px"> Use the below panel to 
                                            add a new department</small></legend>
                                         
                                        
                                        <div class="form-group">
                                            <label style="color:red" class="col-lg-2 control-label" for="focusedInput">Department*</label>
                                            <div class="col-lg-5">
                                                <input   autocomplete="off" class="form-control" 
                                                id="dept" type="text" 
                                                title="Please enter a department name" placeholder="Please enter a department name" 
                                                name="dept" required="true" >
                                            </div>
                                            <span id="error" class="label label-danger" style="display:none">Department name already exists. Please try another.</span>
                                        </div>
                                       
                             



<div class="form-group">
                                            <label style="color:red" class="col-lg-2 control-label" for="focusedInput">Code*</label>
                                            <div class="col-lg-5">
                                                <input maxlength="15"   autocomplete="off" class="form-control" 
                                                id="scode" type="text"  placeholder="Department Short Code"
                                                title="Please enter a short code for this department" name="scode" required="true" >
                                            </div>
                                            <span id="errorcode" class="label label-danger" style="display:none">Department Code already exists. Please try another.</span>
                                        

                                        </div>




                                          <div class="form-group">
                                            <label class="col-lg-2 control-label" for="focusedInput"></label>
                                            <div class="col-lg-10">
                                   <button type="submit"  class="btn btn-success">Add Department </button>
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
   
        <?php  $sql="select * from department order by dept_code desc";                     
        $run=mysql_query($sql) or die(mysql_error()) ;
if(mysql_num_rows($run)>=1){?>

<span class="label label-primary"><i class="fa fa-info"></i> The following table shows all the departments under the university</span>
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

<tr id="trrow_<?php echo $fetch['dept_code'];?>">
<td style="color:#3b5999" align="center"><?php echo $i;?></td>
 
<td style="color:#3b5999;font-size:14px;" align=""><?php echo $fetch['dept_name'];?>



<?php //}  
   


//} ?>
 
  </td>
 

<td style="color:#3b5999;font-size:11px;font-size:14px;" align="center"><?php echo $fetch['sf_code'];?>
  
 
   
<?php $cd=$fetch['dept_code'];

 $check=mysql_query("select count(dept_center_code) as cnt from student_details where dept_center_code= $cd and 
  belongs_to_center_dept='dept'");

$fetchcount=mysql_fetch_array($check);
$counter=$fetchcount['cnt'];
if($counter==0){ //deletable
?>


<script type="text/javascript">
  $(document).ready(function(){
    $("#del_<?php echo $fetch['dept_code'];?>").click(function(){
   
       

      var depid="<?php echo $fetch['dept_code'];?>";
        
      $("#del_<?php echo $fetch['dept_code'];?>").hide();
      $("#edit_<?php echo $fetch['dept_code'];?>").hide(); 
      $("#viewer_<?php echo $fetch['dept_code'];?>").hide();
      $("#cannotviewer_<?php echo $fetch['dept_code'];?>").hide();
     if(depid!=''){
      var dataString = {'depid':depid};
      $.ajax({
        url: '<?php echo $base;?>includes/remove_department.php',
          type: 'POST',
          dataType: 'json',
           data: dataString,
   beforeSend: function() {
              $("#img_<?php echo $fetch['dept_code'];?>").show();
               $("#message_<?php echo $fetch['dept_code'];?>").show();
               
        },
          success: function(data) {
            if(data.message=='Done' && data.num>=1){
              $("#img_<?php echo $fetch['dept_code'];?>").hide();
               $("#message_<?php echo $fetch['dept_code'];?>").hide();

               $("#viewer_<?php echo $fetch['dept_code'];?>").hide();

               $("#cannotviewer_<?php echo $fetch['dept_code'];?>").hide();
               $("#trrow_<?php echo $fetch['dept_code'];?>").hide();
             }

             else if(data.message=='Done' && data.num==0){

             window.location.href="<?php echo $base;?>departmentGetStarted.php";

             }

               
          }
      });
    }
  
     
    });
  });
</script>





  
<i id="del_<?php echo $fetch['dept_code'];?>" title="Remove <?php echo $fetch['dept_name'];?>  " class="fa fa-trash-o pull-right"></i>
<img class="pull-right" title="Removing.." alt="Removing.."  style="display:none;width:5%" id="img_<?php echo $fetch['dept_code'];?>" src="<?php echo $base;?>images/ajax_loader_blue_512.gif"><span style="display:none;" id="message_<?php echo $fetch['dept_code'];?>" style="" class="label label-warning pull-right">Removing..</span>

 <?php } else {?>



<i title="You cannot remove <?php echo $fetch['dept_name'];?> as this department contains students under its scaffold " class="fa fa-warning pull-right"></i>


 <?php } ?>

<?php //edit everytime?>
<a href="#editer_<?php echo $fetch['dept_code'];?>" data-toggle="modal">
  <i  id="edit_<?php echo $fetch['dept_code'];?>" title="Edit <?php echo $fetch['dept_name'];?> 
    " class="fa fa-pencil pull-right"></i></a> 
    <!-- !-->


    <script>
$(document).ready(function()
 {
    
   
  $("#dept_<?php echo $fetch['dept_code'];?>").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var depname=$.trim($("#dept_<?php echo $fetch['dept_code'];?>").val());
   
   var deptid=<?php echo $fetch['dept_code'];?>;
    
    
     if(depname!='' && deptid!='')
  var dataString = {'depname':depname,'deptid':deptid};
    $.ajax({
            url: '<?php echo $base;?>includes/check_dept_name_update.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error_<?php echo $fetch['dept_code'];?>").show();
          $("#error_<?php echo $fetch['dept_code'];?>").fadeOut(3000);
          $("#dept_<?php echo $fetch['dept_code'];?>").val('<?php echo $fetch['dept_name'];?>');
        
            
         
          }
           
                 

          }
           });
    
    
    
});
 
});
</script>








 <div id="editer_<?php echo $fetch['dept_code'];?>"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:900px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 style="text-align:left" id="myModalLabel" class="modal-title">
                                                      Edit Department &raquo; 
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        Change department name here</small></h5>
                                                </div>
                                                  <form action="<?php echo $base;?>actions/editDepartment.php?id=<?php echo $fetch['dept_code'];?>" method="post">
                                                <div class="modal-body">
                                                


                                                     <div>
    <label for="department" style="float:left;color:red">Department*</label>
    <input onkeypress="" value="<?php echo $fetch['dept_name'];?>" required placeholder="Please enter department here" class="form-control"  
    name="dept_<?php echo $fetch['dept_code'];?>" title="Change or edit department here" autocomplete="off" 
    id="dept_<?php echo $fetch['dept_code'];?>" type="text"/>
    <span class="label label-danger" id="error_<?php echo $fetch['dept_code'];?>" style="display:none;float:left">
      Department Name already exists. Please try another one!!</span>
</div>




        <div>
          <br/>

  <script>
$(document).ready(function()
 {
    
   
  $("#scode_<?php echo $fetch['dept_code'];?>").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var scode=$.trim($("#scode_<?php echo $fetch['dept_code'];?>").val());
   
   var deptid=<?php echo $fetch['dept_code'];?>;
    
    
     if(scode!='' && deptid!='')
  var dataString = {'scode':scode,'deptid':deptid};
    $.ajax({
            url: '<?php echo $base;?>includes/check_dept_code_update.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#errorcode_<?php echo $fetch['dept_code'];?>").show();
          $("#errorcode_<?php echo $fetch['dept_code'];?>").fadeOut(3000);
          $("#scode_<?php echo $fetch['dept_code'];?>").val('<?php echo $fetch['sf_code'];?>');
        
            
         
          }
           
                 

          }
           });
    
    
    
});
 
});
</script>



    <label for="department" style="float:left;color:red">Code*</label>
       <input maxlength="15" value="<?php echo $fetch['sf_code'];?>"   autocomplete="off" class="form-control" 
                                                id="scode_<?php echo $fetch['dept_code'];?>" type="text"  
                                                placeholder="Department Short Code"
                                                title="Edit short code for this department" 
                                                name="scode_<?php echo $fetch['dept_code'];?>" required="true" >
                                             
                                            <span id="errorcode_<?php echo $fetch['dept_code'];?>" class="label label-danger" 
                                              style="display:none; float:left">Department Code already exists. Please try another.</span>
                                        
    
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







  </td>
 












</tr>
<?php 
$i++; } ?>
</table>
  <?php }  //end of if 

  else { 


  echo "<span id='nope' class='label label-danger'>No records exist. Please add a new department using the above panel to reflect changes!!</span>";
   


   }?> 







                            </div>
                     


  
  </div> 



  <script>
$(document).ready(function()
 {
    
   
  $("#dept").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var dept=$.trim($("#dept").val());
    
    
     if(dept!='')
  var dataString = {'dept':dept};
    $.ajax({
            url: '<?php echo $base;?>includes/check_department_name.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error").show();
          $("#error").fadeOut(3000);
          $("#dept").val('');
          
            
         
          }
           
                 

          }
           });
    
    
    
});
 
});
</script>



 <script>
$(document).ready(function()
 {
    
   
  $("#scode").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var scode=$.trim($("#scode").val());
    
    
     if(dept!='')
  var dataString = {'scode':scode};
    $.ajax({
            url: '<?php echo $base;?>includes/check_department_code.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#errorcode").show();
          $("#errorcode").fadeOut(3000);
          $("#scode").val('');
         
            
         
          }
           
                 

          }
           });
    
    
    
});
 
});
</script>

 
  