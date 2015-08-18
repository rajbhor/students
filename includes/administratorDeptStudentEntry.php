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

<div class="cl-mcont">

<div class="page-head">
      <h3 title="Student Entry Panel" class="label label-success" style="font-size:19px">
        <i class="fa  fa-plus"></i> Department Student Entry Panel &raquo; <small style="color:black;font-size:12px">Use the below panel to make a student entry as <?php echo $loggername;?></small></h3>
    <br/><br/>  
  <span class="label label-info pull-left"><i class="fa fa-info"></i> Please note that the fields marked in red are mandatory to be entered</span>
   

      </div> 

     

<form name="student" id="student" action="<?php echo $base;?>actions/saveStudentAdministratorDepartment.php" method="post">

<div   id="savedialogwindow"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title">

                                                    Confirmation Dialog &raquo;
						    <small style="color:darkgrey; font-weight:bold; font-size:12px">
						       Are you sure you want to save the entered student data</small></h5>
                                                

                                                </div>
                                                  
                                                <div class="modal-body">
 
  <input onclick="$('#student').submit();" title="Click on Save Now to save entered data" type="submit" class="btn btn-success" value="Yes, Save Now">
<input title="Click on Not Now to continue data entry" data-dismiss="modal" type="button" class="btn btn-danger" value="Not Now">
 
</div>
   
 
<div class="modal-footer" style="display:">
                                                    

                                                    <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo $learn;?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

 
   <input type="hidden" name="stype" id="stype" value="Old"><!--for us-->
    <input type="hidden" name="creator" id="creator" value="<?php echo $uids;?>"><!--for us-->				    
 
 
<div class="col-md-6 form-group">
   
						  
						<div >
						  <label for="title" style="color:red">Department:</label>
				
						 </div>
						<div > 

						    <select title="Select a center" name="depcode" class="form-control" id="depcode"  required="true">
						   <option value="" selected>--Select Center--</option>
						   <?php
						   
						    $c=mysql_query("select * from department order by dept_name desc");
						     
						     while($rc=mysql_fetch_array($c))
							 {
							 ?>
						    <option value="<?php echo $rc['dept_code']; ?>">
						    <?php  echo $rc['dept_name'];?>
						    </option>
						    <?php 
							 } 
						    ?>
						    </select> 

						</div>


 
					 
</div>


<div class="col-md-6 form-group" style="display:none" id="scoursediv">
   
						  
						<div >
						  <label for="title" style="color:red">Department Course:</label>
				
						 </div>
						<div > 

						    <select title="Select a center" name="scourse" class="form-control" id="scourse"  required="true">
						   
						    </select> 

						</div>



 
					 
</div>

              <script type="text/javascript">
$(document).ready(function()
{
$("#depcode").change(function()
{
   
var depid=$(this).val();
var sel1=$.trim($("#scourse").val());
var dataString = {'depid': depid,'sel1':sel1};
if(depid!=''){
$.ajax
({
type: "POST",
url: "<?php echo $base;?>includes/getDeptCoursesAdministrator.php",
data: dataString,
 cache: false,

success: function(html)
{
$('#scoursediv').show(); 
 
$("#scourse").html(html);


//$('.smalltextss').val(html.roll); 
 

}
});
}


});

});
</script>
<script type="text/javascript">

function resetCenter(){

$('#scoursediv').fadeOut(); 
$('#depcode').val('').trigger('change');
 
}
</script>
<div class="col-md-6 form-group">
    <label style="color:red" for="author">Semester/Year:</label>
   <select title="Select semester or year whichever is applicable" name="syear" class="form-control" id="designation"  required="true">
						    <?php
						   
						    $query11=mysql_query("select * from semester");
						     
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
<span class="clearfix">
     <div class="col-md-6 form-group">
    <label for="title" style="color:red">Year of Admission:</label>
    <select title="Select year of admission" name="syoa" class="form-control" id="syoa"  required="true">
       
						     <option value="">
						    -Select-
						    </option>
						    <?php
						   
						   
						     for ($y=2005; $y<=2025; $y++) {
						     
 						 ?>
 						
						    <option value="<?php echo $y; ?>">
						    <?php  echo $y;?>
						    </option>
						    <?php 
							 } 
						    ?>
						    </select>
</div>
<div class="col-md-6 form-group">
     <label for="title">D.U.Registration No:</label>
   <input id="dureg" title="Provide DU Registration" autocomplete="off" type="text" name="sdureg" class="form-control" placeholder="D.U.Registration No (if avaiable)" />

    
</div>
<span class="clearfix">
        <div class="col-md-6 form-group">
	  <label style="color:red" for="author">Name of the Student:</label>
    <input title="Provide Name of student" style="text-transform: uppercase" autocomplete="off" type="text" name="sname" class="form-control" placeholder="Name of the Student / Research Scholars" required="required"/>
    
    </div>
<div class="col-md-6 form-group">
    <label  for="author">Roll No:</label>
    <input id="roll" title="Provide roll number if available" autocomplete="off" type="text" name="sroll" class="form-control" placeholder="Roll No"  />
    
</div>
<span class="clearfix">
     <div class="col-md-6 form-group">
    <label style="color:red" for="author">Father's Name:</label>
    <input title="Provide father's name" autocomplete="off" type="text" name="sfaname" class="form-control" id="sfaname" placeholder="Father's Name" required="required"/>
    
</div>
             <div class="col-md-6 form-group">
    <label for="title" style="color:red">Mother's Name:</label>
   <input title="Provide mother's name" autocomplete="off" type="text" name="smoname" class="form-control" placeholder="Mother's Name" required="required"/>
</div>
 <span class="clearfix">
     <script>
	  function isno(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	
	
} 
     </script>
     <div class="col-md-6 form-group">
    <label for="author">Mobile No.:</label>
    <input id="phone" pattern=".{10,}" title="Provide a mobile number if available" onkeypress="return isno(event)" autocomplete="off" type="text" name="smob" class="form-control"  maxlength="14" placeholder="Mobile No."  />
</div>
	        <div class="col-md-6 form-group">
    <label for="title" >Email:</label>
  <input id="email" autocomplete="off" type="email" title="Provide a valid email ID if available" name="semail" class="form-control" placeholder="Email ID."  />
</div>


<span class="clearfix">
     <div class="col-md-6 form-group">
    <label style="color:red" for="author">Date of Birth:</label>
 
						<div style="border: 1px solid #CCC;" > 
						       <select title="Please select date" name="dd" class="" id="designation"  required="true" style="height:30px">
						    <option value="">
						   Day
						    </option>
						    <?php
						     for ($x=01; $x<=31; $x++) {
						     
 						 ?>
 						
						    <option value="<?php echo $x; ?>">
						    <?php  echo $x;?>
						    </option>
						    <?php 
							 } 
						    ?>
						    </select> 
						      <select title="Please select month" name="mm" class="" id="designation"  required="true" style="height:30px;width:70px;">
						       <option value="">
						    Month
						    </option>
						   <?php
						   
						    $query111=mysql_query("select * from month_codes");
						     
						     while($rowdd11=mysql_fetch_array($query111))
							 {
							 ?>
						    <option value="<?php echo $rowdd11['month_id']; ?>">
						    <?php  echo $rowdd11['month_name'];?>
						    </option>
						    <?php 
							 } 
						    ?>
						    </select> 
						     <select title="Please select year" name="yy" class="" id="designation"  required="true" style="height:30px;width:90px;">
						    
						     <option value="">
						    Year
						    </option>
						    <?php
						   
						   
						     for ($y=1970; $y<=2030; $y++) {
						     
 						 ?>
 						
						    <option value="<?php echo $y; ?>">
						    <?php  echo $y;?>
						    </option>
						    <?php 
							 } 
						    ?>
						    </select> 
						    <span class="label label-warning">Please select DOB here</span>
						</div>

</div>
                  <div class="col-md-6 form-group">
    <label for="title" style="color:red">Sex:</label>
   
						    <select  title="Please select gender" name="ssex" class="form-control" id="sbgroup"  required="true">
						     
						    <option value="">-Select-</option>
						     <option value="Male">Male</option>
						      <option value="Female">Female</option>
						   
						    </select> 
</div>

<span class="clearfix">
             <div class="col-md-6 form-group">
    <label for="title" style="color:red">Category:</label>

	    <select title="Please select Category" name="scmmunity" class="form-control" id="scmmunity"  required="true">
	    	<option value="">--Select Category--</option>
						    <?php
						   
						    $query111=mysql_query("select * from caste");
						     
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
<div class="col-md-6 form-group">
    <label for="title" style="color:red">Where to reside?</label>
 
	    <select title="Please select Category" name="reside" class="form-control" id="scmmunity"  required="true">
	    	<option value="">--Select--</option>
	    	<option value="1">HOSTEL</option>
	    	<option value="0">OUTSIDE</option>						    
	    </select>
	      
</div>  
<span class="clearfix">
              <div class="col-md-6 form-group" style="display:none">
    <label for="title" style="color:red">Region:</label>
       <select title="Please select region" name="sregion" class="form-control" id="sregion"  required="true">
				   
						    <option selected value="Rural">
						    Rural
						    </option>
						     <option value="Urban">
						    Urban
						    </option>
						    </select> 
</div>
<div class="col-md-6 form-group">
    <label style="color:red" for="author">Fee Category:</label>
               <select title="Please select fee category" name="sfeecat" class="form-control" id="sfeecat"  required="true">
	  <option value="">-Select-</option>
						    <?php
						   
						    $query111=mysql_query("select * from fee_category order by fee_id desc");
						     
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
<span class="clearfix">
             <div class="col-md-6 form-group">
    <label for="title" style="color:red">Fees paid upto Semester/Year:</label>
     <select title="Fees paid upto" name="sfee" class="form-control" id="sfeeuptopay"  required="true">
     	<option value="">--Select Fees Paid Upto--</option>		   
						    <?php
						   
						    $query111=mysql_query("select * from semester");
						     
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
<br/><br/>
<br/>
<br/><br/>					  <a href="#savedialogwindow" data-toggle="modal"><button type="button" class="btn btn-success">Save Student </button></a>
 <button onclick="autofill();" title="Automatically fill in some non important fields" type="button" class="btn btn-primary">Auto-Fill </button>


                                        <button onclick="resetCenter()" type="reset" class="btn btn-default">Cancel</button>
                                        <small style="color:darkgrey;font-weight:bold;font-size:12px"><?php echo $learn;?></small>

                                        <br/>
                                        <span class="label label-info"><i class="fa fa-info"></i> Please note that the fields marked in red are mandatory to be entered</span>
				    

				    </form>     
  </div> 

   <script type="text/javascript">

function autofill(){

  
 $("#phone").val('Not Available');
 $("#dureg").val('Not Available');
 $("#roll").val('Not Available');
 $("#email").prop('type','text');
 $("#email").val('Not Available');

  


}

</script>
