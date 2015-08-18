    <script type="text/javascript">
$(document).ready(function(){

$("#sc").fadeOut(100000);

});

 </script>
    <?php $fid=base64_decode($_GET['feeid']);
   $queryfee=mysql_query("select * from fee_structure where fee_id=$fid");
   $rowfee=mysql_fetch_array($queryfee);
   $type_fee=$rowfee['type_fee'];
 
$type=$rowfee['fee_category_id']; //type can be 1=sponsored 2=endowment 3=general 4=lateral entry
switch ($type) {
    case 1:
      if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="0";
      }
      else {
	  $fee=$type_fee;
      }
      
       $changing_label='Sponsored Fee';
       $changing_name='spon';
       $changing_placeholder='Sponsored Fee';
      break;
    case 2:
       if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="0";
      }
      else {
	  $fee=$type_fee;
	 
      }
       $changing_label='Endowment Fee';
       $changing_name='endo';
       $changing_placeholder='Endowment Fee';
      
      break;
   
   case 3:
       $fee="";
       $changing_display="none";
       $changing_label='';
       $changing_name='';
       $changing_placeholder='';
      break;
    
    case 4:
      if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="0";
      }
      else {
	  $fee=$type_fee;
	  
	 
      }
      $changing_label='Lateral Entry Fee';
       $changing_name='lat';
       $changing_placeholder='Lateral Entry Fee';
      break;
    default: 
       $fee="0";
       
  }
 

   
    ?>
  <div class="cl-mcont">
    
       <?php if(@$_GET['response']!=''){ ?>
  <center>
  <div id="sc" class="label label-success" style="width:700px; font-family:Segoe UI">  
  <a  onclick="$('#sc').hide()" class="close" data-dismiss="alert" style="float:right; cursor:pointer">
    <span id="success" class="glyphicon glyphicon-remove"></span></a>  
  <strong></strong> <?php echo base64_decode(@$_GET['response']);?>.
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

<div class="cl-mcont">

<div class="page-head">
      <h3 title="" class="label label-success" style="font-size:19px">
        <i class="fa  fa-plus"></i> Fee Slab Update Panel &raquo; <small style="color:black;font-size:12px">Use the below panel to Edit Fee Structure Slab for <?php echo $loggername;?></small></h3>
    <br/><br/>  
  
<div id="display"></div>
      </div> 

     

<form name="student" id="student" action="<?php echo $base;?>actions/updateFee.php" method="post">

 

<?php  if($_SESSION['branch_type']=='dept'){
$q=mysql_query("select * from department where dept_code=$deptcode");
$dep=mysql_fetch_array($q);
 
}
else {

$q=mysql_query("select * from center where center_code=$deptcode");
$dep=mysql_fetch_array($q);

}
?>
 <input type="hidden" name="feeid" id="feeid" value="<?php echo $fid; ?>"><!--for us-->
   <input type="hidden" name="stype" id="stype" value="Old"><!--for us-->
    <input type="hidden" name="creator" id="creator" value="<?php echo $uids;?>"><!--for us-->				    
 <input autocomplete="off" type="hidden" name="depcode" class="form-control input_no" value="<?php echo $deptcode;?>" />
<div class="col-md-6 form-group">
	  <label for="title" >Fee Category :</label> 
						    <select readonly title="Select a Fee Category" name="fcategory" class="form-control input_no" id="fcategory"  required="true">
						      
						     <?php $queryfee=mysql_query("select * from fee_category");
						     while($rowfe=mysql_fetch_array($queryfee)){
						     ?>
						      <?php if($rowfee['fee_category_id']==$rowfe['fee_id']){ ?>
						    <option value="<?php echo $rowfe['fee_id']; ?>">
						 <?php echo $rowfe['category_name']; ?>
						    </option>
						   <?php
						     }
						     ?>
						     <?php
						     }
						     ?>
	  </select>  
     
</div>
<div class="col-md-6 form-group">
     <?php if($_SESSION['branch_type']=='dept'){?>
    <label for="title" >Department Course:</label> 
						    <select readonly title="Select a department course" name="course" class="form-control input_no" id="course"  required="true">
						    <?php
						    $d_code=$deptcode;
						    $query=mysql_query("select * from course where dept_code='$d_code'");
						     
						     while($rowd=mysql_fetch_array($query))
							 {
							 ?>
							 <?php if($rowfee['course_code']==$rowd['course_id']){ ?>
						    <option value="<?php echo $rowd['course_id']; ?>">
						    <?php  echo $rowd['course_name'];?>
						    </option>
						    <?php } ?>
						    <?php 
							 } 
						    ?>
						    </select> 
						 
						<?php } ?>

						 <?php if($_SESSION['branch_type']=='center'){?>
						  
						<div >
						  <label for="title" style="color:red">Center Course:</label>
				
						 </div>
						<div > 

						    <select readonly title="Select a center course" name="course" class="form-control input_no" id="course"  required="true">
						    <?php
						   $dps=$deptcode;
						    $query1=mysql_query("select * from center_course where center_code='$dps'");
						     
						     while($rowdd=mysql_fetch_array($query1))
							 {
							 ?>
							 <?php if($rowfee['course_code']==$rowdd['cc_code']){ ?>
						    <option value="<?php echo $rowdd['cc_code']; ?>">
						    <?php  echo $rowdd['cc_name'];?>
						    </option>
						   <?php } ?>
						   
						    <?php 
							 } 
						    ?>
						    </select> 

						</div>
<?php } ?>
					 
</div>
 <div class="col-md-6 form-group">
    <label for="author">Semester/Year:</label>
   <select readonly title="Select semester or year whichever is applicable" name="fsem" class="form-control input_no" id="fsem"  required="true">
						    <?php
						   
						    $query11=mysql_query("select * from semester where id !=15");
						     
						     while($rowdd1=mysql_fetch_array($query11))
							 {
							 ?>
						      <?php if($rowfee['sem_year']==$rowdd1['id']){ ?>
						    <option value="<?php echo $rowdd1['id']; ?>">
						    <?php  echo $rowdd1['semester'];?>
						    </option>
						     <?php } ?>
						    <?php 
							 } 
						    ?>
						    </select> 

</div>  
  

 
<span class="clearfix">
     <div class="col-md-6 form-group">
    <label for="title" >Session:</label>
    <select readonly title="Select year of admission" name="fsession" class="form-control" id="fsession"  required="true">
      
       <?php $sess=mysql_query("select * from session");
       
      while($rowse=mysql_fetch_array($sess)){
       ?>
       <?php if($rowfee['session']==$rowse['session_id']){ ?>
		    <option value="<?php echo $rowse['session_id']; ?>">
		   <?php echo $rowse['session']; ?>
		   </option>
		  <?php } ?>
		    <?php } ?>
     </select>
    

</div>

<div class="col-md-6 form-group">
	 <label for="title">Fee Structure Status:</label>
<br/>

<label for="stat1" class="label  label-success"><input title="" required <?php if($rowfee['status']==1){ echo "checked";} ?> type="radio" name="stat" value="1" id="stat1"> Active</label>
    <label for="stat2" class="label  label-danger"> <input title="" required <?php if($rowfee['status']==2){ echo "checked";} ?> type="radio" name="stat" value="0" id="stat2"> Inactive</label>

</div>
<div class="col-md-6 form-group">
     <label for="title">Admission Fee:</label>
   <input id="fadmission" value="<?php echo $rowfee["admission_fee"]; ?>" title="Admission Fee" autocomplete="off" type="text" name="fadmission" class="form-control input_no" placeholder="Admission Fee" onkeypress="return isno(event)" maxlength="5" onkeyup="sum();"/>

    
</div>

<div class="col-md-6 form-group">
	 <label for="title">Course Fee Procedure:</label>
<br/>

<label onclick="check_semester_year()"  for="per_year" class="label  label-success"><input onclick="check_semester_year()"  title="You need to select atleast one of these choices to save fee structure" required <?php if($rowfee['course_fee_parameter']=='per_year'){ echo "checked";} ?> type="radio" name="param" value="per_year" id="per_year"> Per Year</label>
    <label onclick="check_semester_year()"  for="per_semester" class="label  label-primary"> <input onclick="check_semester_year()"  title="You need to select atleast one of these choices to save fee structure" required <?php if($rowfee['course_fee_parameter']=='per_semester'){ echo "checked";} ?> type="radio" name="param" value="per_semester" id="per_semester"> Per Semester</label>

</div>




<span class="clearfix">
        <div class="col-md-6 form-group">
	  <label   for="author">Course Fee:</label>
    <input id="fcourse" value="<?php echo $rowfee["course_fee_year_sem"]; ?>" title="Course Fee" autocomplete="off" type="text" name="fcourse" class="form-control input_no" placeholder="Course Fee" maxlength="5" required="required" onkeypress="return isno(event)" onkeyup="sum();"/>
    
    </div>
<div class="col-md-6 form-group">
    <label  for="author">Library Fee:</label>
    <input id="flibrary" value="<?php echo $rowfee["library_fee"]; ?>" title="Library Fee" autocomplete="off" type="text" name="flibrary" class="form-control input_no" maxlength="5" placeholder="Library Fee" onkeypress="return isno(event)"  onkeyup="sum();" />
    
</div>
<span class="clearfix">
     <div class="col-md-6 form-group">
    <label   for="author">Union/Magazine Fee:</label>
    <input id="funion" value="<?php echo $rowfee["union_magazine"]; ?>" title="Provide father's name" autocomplete="off" type="text" name="funioun" class="form-control input_no" maxlength="5"  placeholder="Union/Magazine Fee" required="required" onkeypress="return isno(event)" onkeyup="sum();"/>
    
</div>
             <div class="col-md-6 form-group">
    <label for="title"  >Student Aid Fund fee:</label>
   <input id="fstudentaidfund" value="<?php echo $rowfee["saf_fee"]; ?>" title="Student Aid Fund fee" autocomplete="off" type="text" name="fstudentaidfund" class="form-control input_no" maxlength="5" placeholder="Student Aid Fund fee" required="required" onkeypress="return isno(event)" onkeyup="sum();"/>
</div>
 <span class="clearfix">

     <div class="col-md-6 form-group">
    <label for="author">Development Fee:</label>
    <input id="fdevelopment" value="<?php echo $rowfee["development_fee"]; ?>" title="Development Fee" onkeypress="return isno(event)" autocomplete="off" type="text" name="fdevelopment" class="form-control input_no"  maxlength="5" placeholder="Development Fee."  onkeyup="sum();"/>
</div>
	        <div class="col-md-6 form-group">
    <label for="title" >Internet Fee:</label>
  <input id="finternet" value="<?php echo $rowfee["interent_fee"]; ?>" autocomplete="off" type="text" title="Provide a valid email ID if available" name="finternet" class="form-control input_no" maxlength="5" placeholder="Internet Fee" onkeypress="return isno(event)" onkeyup="sum();"/>
</div>


<span class="clearfix">
     <div class="col-md-6 form-group">
    <label   for="author">Laboratory fee:</label>
 <input id="flaboratory" value="<?php echo $rowfee["laboratory_fee"]; ?>"  autocomplete="off" type="text" title="Laboratory fee" name="flaboratory" class="form-control input_no" maxlength="5" placeholder="Laboratory fee" onkeypress="return isno(event)" onkeyup="sum();"/>
</div>
                  <div class="col-md-6 form-group">
    <label for="title"  >Safety Insurance Policy fee:</label>
   
	  <input id="fsafetyip" value="<?php echo $rowfee["student_safety"]; ?>"  autocomplete="off" type="text" title="Safety Insurance Policy fee" name="fsafetyip" class="form-control input_no" maxlength="5" placeholder="Safety Insurance Policy fee" onkeypress="return isno(event)" onkeyup="sum();" />
</div>

<span class="clearfix">
             <div class="col-md-6 form-group">
    <label for="title"  >Sports Board fee:</label>
 
	<input id="fsportsfee" value="<?php echo $rowfee["sports_fee"]; ?>" autocomplete="off" type="text" title="Sports Board fee" name="fsportsfee" class="form-control input_no" maxlength="5" placeholder="Sports Board fee" onkeypress="return isno(event)"  onkeyup="sum();"/>
	      
</div>
	     
	     <div id="randomDiv" class="col-md-6 form-group" style="display: <?php echo $changing_display;?>">
   <label id="randomlabel" for="unit"><?php echo $changing_label;?></label>
      
   <input maxlength="5" value="<?php echo $fee;?>"  id="fcatfee" title="<?php echo $changing_placeholder;?>" autocomplete="off" type="text" 
   name="<?php echo $changing_name;?>" class="form-control input_no" placeholder="<?php echo $changing_placeholder;?>" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>
	     
 
<span class="clearfix">


              <div class="col-md-6 form-group" >
    <label for="title" >Total:</label>
    <input id="total" value="<?php echo $rowfee["total_fee"]; ?>" readonly="readonly" autocomplete="off" type="text" title="" name="ftotal" class="form-control" placeholder="Total fee"  />
	 
</div>
 
     
<br/><br/><br/><br/><br/><br/>
 
		 <button type="submit" class="btn btn-success">Save Changes </button> 

                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <small style="color:darkgrey;font-weight:bold;font-size:12px"><?php echo $learn;?></small>

                                     

				    </form>     
 

<hr/> 
</div> 
  
  </div>  
  </div> 
 
 
 
 <script>
       function sum() {
            var admission = document.getElementById('fadmission').value ||  0;
            var course = document.getElementById('fcourse').value ||  0;
	    var library = document.getElementById('flibrary').value ||  0;
	    var union = document.getElementById('funion').value ||  0;
	       var studentaidfund = document.getElementById('fstudentaidfund').value ||  0;
	       var development = document.getElementById('fdevelopment').value ||  0;
	       var internet = document.getElementById('finternet').value ||  0;
	       var laboratory = document.getElementById('flaboratory').value ||  0;
	       var safetyip = document.getElementById('fsafetyip').value ||  0;
	        var sportsfee = document.getElementById('fsportsfee').value ||  0;
		  var fcatfee = document.getElementById('fcatfee').value ||  0;
            var result = parseInt(admission) + parseInt(course) + parseInt(library)
	    + parseInt(union) + parseInt(studentaidfund) + parseInt(development) +
	    parseInt(internet) + parseInt(laboratory) + parseInt(safetyip) + parseInt(sportsfee) + parseInt(fcatfee) ;
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            }
        }

	  function isno(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true; 
} 
 
</script>
   <div id="ser-load" style="display:none">
     <img src="images/ajax-loader.gif">
	  
     </div>
 <script type="text/javascript">
				$(document).ready(function(){
					$("#fsession,#course,#fsem").change(function()
					{
					     var course=$("#course").val(); 
					     var fsem=$("#fsem").val();
					     var fsession=$("#fsession").val();
					     var ser=$("#ser-load");
     						$.ajax({
						            
							     url:"fee/check_status.php?course="+course+"&fsem="+fsem+"&fsession="+fsession,
						            type: 'POST',
						            dataType: 'html',
						            beforeSend: function() {
								        ser.show();
								      },
						            success: function(data)
						            {
										$("#display").html(data);
										ser.hide();
						            }
						        });
					});
				})
     </script>

     <script type="text/javascript">


function check_semester_year(){

var fsem=$.trim($('#fsem').val());
if($("#fsem").val()==1 || $("#fsem").val()==2 ||  $("#fsem").val()==3 || $("#fsem").val()==4 || $("#fsem").val()==5 || 

$("#fsem").val()==6 ||  

$("#fsem").val()==7 ||


$("#fsem").val()==8 ||
 
$("#fsem").val()==9 || 

$("#fsem").val()==10

  ){

//alert("Since the course is offered in semesters. So you need to select Per-Semester as the course fee procedure!!");
   $('input#per_semester').prop('checked',true);
  $('input#per_year').prop('checked',false);
         
 }

 else {
//alert("Since the course is offered year wise. So you need to select Per-Year as the course fee procedure!!");
 $('input#per_year').prop('checked',true);
 $('input#per_semester').prop('checked',false);

 }

}

     </script>
 
<style>
      input{
	    font-size: 16px;
      }
</style>