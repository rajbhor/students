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
  <strong>Failed!</strong> <?php echo base64_decode(@$_GET['errorResponse']);?>.
</div>
  </center>
<?php } ?>

<div class="cl-mcont">

<div class="page-head">
      <h3 title="Student Entry Panel" class="label label-success" style="font-size:19px">
        <i class="fa  fa-plus"></i> Student Entry Panel &raquo; <small style="color:black;font-size:12px">Use the below panel to make a student entry in <?php echo $loggername;?></small></h3>
    <br/><br/>  
  <span class="label label-info pull-left"><i class="fa fa-info"></i> Please note that the fields marked in red are mandatory to be entered</span>
   

      </div> 

     

<form name="student" id="student" action="<?php echo $base;?>actions/saveStudent.php" method="post">

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

<?php  if($_SESSION['branch_type']=='dept'){
$q=mysql_query("select * from department where dept_code=$deptcode");
$dep=mysql_fetch_array($q);
 
}
else {

$q=mysql_query("select * from center where center_code=$deptcode");
$dep=mysql_fetch_array($q);

}
?>
   <input type="hidden" name="stype" id="stype" value="Old"><!--for us-->
    <input type="hidden" name="creator" id="creator" value="<?php echo $uids;?>"><!--for us-->				    
 <input autocomplete="off" type="hidden" name="depcode" class="form-control" value="<?php echo $deptcode;?>" />

<div class="col-md-6 form-group">
     <?php if($_SESSION['branch_type']=='dept'){?>
    <label for="title" style="color:red">Department Course:</label> 
						    <select title="Select a department course" name="scourse" class="form-control" id="designation"  required="true">
						      <option value="">
						    --Select--
						    </option>
						    
						    <?php
						    $d_code=$deptcode;
						    $query=mysql_query("select * from course where dept_code='$d_code'");
						     
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

						 <?php if($_SESSION['branch_type']=='center'){?>
						  
						<div >
						  <label for="title" style="color:red">Center Course:</label>
				
						 </div>
						<div > 

						    <select title="Select a center course" name="scourse" class="form-control" id="designation"  required="true">
						      <option value="">
						    --Select--
						    </option>
						    
						    <?php
						   $dps=$deptcode;
						    $query1=mysql_query("select * from center_course where center_code='$dps'");
						     
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
    <label style="color:red" for="author">Semester/Year:</label>
    <select title="Select semester or year whichever is applicable" name="syear" class="form-control" id="designation"  required="true">
						    <option value="">
						    --Select--
						    </option> 
						    
						    
						    <?php
						   
						    $query11=mysql_query("select * from semester where id !=15");
						      
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
						   
						   
						     for ($y=1950; $y<=2025; $y++) {
						     
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
					<span class="clearfix">
					<div class="col-md-6 form-group">
						    <label  for="author">Amount Paid:</label>
						    <input  title="Provide Fee Amount Paid" autocomplete="off" type="text" name="samountpaid" class="form-control" id="sfaname" placeholder="Amount Paid" />
						    
					 </div>
					<span class="clearfix">
					<div class="col-md-6 form-group">
						    <label  for="author">Fee Recept No.:</label>
						    <input  title="Provide Paid Fee Recept No." autocomplete="off" type="text" name="sfeercpno" class="form-control" id="sfaname" placeholder="Fee Recept No" /> 
						    
					 </div>	
	
	<span class="clearfix">
             <div class="col-md-6 form-group">
    <label for="title" >Remarks:</label>
<textarea style="resize:none" id="remarks" autocomplete="off" type="text" title="Provide a Remarks if available" name="remarks" class="form-control" placeholder="Remarks." >
</textarea >
</div>
    <a href="#savedialogwindow" data-toggle="modal"><button type="button" class="btn btn-success">Save Student </button></a>
 <button onclick="autofill();" title="Automatically fill in some non important fields" type="button" class="btn btn-primary">Auto-Fill </button>


                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <small style="color:darkgrey;font-weight:bold;font-size:12px"><?php echo $learn;?></small>

                                        <br/>
                                        <span class="label label-info"><i class="fa fa-info"></i> Please note that the fields marked in red are mandatory to be entered</span>
				    

				    </form>     


<hr/>
<?php  
 
$dp=$_SESSION['deptcode'];
$bt=$_SESSION['branch_type'];
function getDepartmentCenter($depcode,$btype){
if($btype=='center'){
$q=mysql_query("select * from center where center_code=$depcode");
$c=mysql_fetch_array($q);
return $c['center_name'];

}
else {  //dept

$q=mysql_query("select * from department where dept_code=$depcode");
$d=mysql_fetch_array($q);
return $d['dept_name'];

}

}


function getDepartmentCenterCourse($dccode,$btype){
if($btype=='center'){
$q1=mysql_query("select * from center_course where cc_code=$dccode");
$cc_name=mysql_fetch_array($q1);
return $cc_name['cc_name'];

}
else {  //dept

$q1=mysql_query("select * from course where course_id=$dccode");
$dcc_name=mysql_fetch_array($q1);
return $dcc_name['course_name'];

}

}



function getSemester($semcode){
 
$q12=mysql_query("select * from semester where id=$semcode");
$sem_name=mysql_fetch_array($q12);
return $sem_name['semester'];

 

}
?>
 <script type="text/javascript">
$(document).ready(function(){

$("#sc").fadeOut(10000);

});

 </script>
  
 <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demotable.css"> 
     <script type="text/javascript" src="<?php echo $base;?>js/dt.js"></script>
   
  <div class="cl-mconts">
    
     

    
                                              
                                             






  
   
        <?php
$dp=$_SESSION['deptcode'];
$bt=$_SESSION['branch_type'];
 
 
                                 


 
	if($bt=='dept'){
	  
	  
	  $sql="SELECT *
FROM student_details s
WHERE s.dept_center_code =$dp and belongs_to_center_dept='dept'
ORDER BY s.sl  DESC  limit 0,3 ";
	}
	elseif($bt=='center'){
	  
	  
	  $sql="SELECT *
FROM student_details s
WHERE s.dept_center_code =$dp and belongs_to_center_dept='center'
ORDER BY s.sl  DESC limit 0,3";
	}

$run=mysql_query($sql) or die(mysql_error()) ;?>
      
<?php 
if(mysql_num_rows($run)>=1){ $i=1;?>
<span class="label label-success"> The following table contains list of recently added last 3 records</span>
<script type="text/javascript">

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#examples tfoot th').each( function () {
        var title = $('#examples thead th').eq( $(this).index() ).text();
        $(this).html( '<input title="Search by '+title+'" type="text" placeholder="Search.." />' );
    } );
 
    // DataTable
      var table   = $('#examples').DataTable();

 
    // Apply the filter
    table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );


    </script>
  
<style type="text/css">

th{
  text-align:center;
  }

  table tbody td {
padding: 7px 28px;
font-size: 12px;
}

.dataTables_wrapper .dataTables_paginate {
  float: right;
  text-align: right;
  padding-top: 0.25em;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
  box-sizing: border-box;
  display: inline-block;
  min-width: 1.5em;
  padding: 0.5em 1em;
  margin-left: 2px;
  text-align: center;
  text-decoration: none !important;
  cursor: pointer;
  *cursor: hand;
  color: #333333 !important;
  border: 1px solid transparent;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
  color: #333333 !important;
  border: 1px solid #cacaca;
  background-color: white;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, gainsboro));
  /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, white 0%, gainsboro 100%);
  /* Chrome10+,Safari5.1+ */
  background: -moz-linear-gradient(top, white 0%, gainsboro 100%);
  /* FF3.6+ */
  background: -ms-linear-gradient(top, white 0%, gainsboro 100%);
  /* IE10+ */
  background: -o-linear-gradient(top, white 0%, gainsboro 100%);
  /* Opera 11.10+ */
  background: linear-gradient(to bottom, white 0%, gainsboro 100%);
  /* W3C */
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
  cursor: default;
  color: #666 !important;
  border: 1px solid transparent;
  background: transparent;
  box-shadow: none;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  color: white !important;
  border: 1px solid #111111;
  background-color: #585858;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111111));
  /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #585858 0%, #111111 100%);
  /* Chrome10+,Safari5.1+ */
  background: -moz-linear-gradient(top, #585858 0%, #111111 100%);
  /* FF3.6+ */
  background: -ms-linear-gradient(top, #585858 0%, #111111 100%);
  /* IE10+ */
  background: -o-linear-gradient(top, #585858 0%, #111111 100%);
  /* Opera 11.10+ */
  background: linear-gradient(to bottom, #585858 0%, #111111 100%);
  /* W3C */
}
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  outline: none;
  background-color: #2b2b2b;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c));
  /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  /* Chrome10+,Safari5.1+ */
  background: -moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  /* FF3.6+ */
  background: -ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  /* IE10+ */
  background: -o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  /* Opera 11.10+ */
  background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%);
  /* W3C */
  box-shadow: inset 0 0 3px #111;
} 
.dataTables_wrapper .dataTables_processing {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 40px;
  margin-left: -50%;
  margin-top: -25px;
  padding-top: 20px;
  text-align: center;
  font-size: 1.2em;
  background-color: white;
  background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(25%, rgba(255, 255, 255, 0.9)), color-stop(75%, rgba(255, 255, 255, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
  /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  /* Chrome10+,Safari5.1+ */
  background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  /* FF3.6+ */
  background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  /* IE10+ */
  background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  /* Opera 11.10+ */
  background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  /* W3C */
}
.dataTables_wrapper .dataTables_paginate {
  color: #333333;
}
 .dataTables_wrapper .dataTables_paginate {
    float: none;
    text-align: center;
  }
  .dataTables_wrapper .dataTables_paginate {
    margin-top: 0.5em;
  }
  
  </style> 
 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="examples" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:11px">
  <thead>
    <tr>
     <th style="color:green;font-size:11px" align="center">Student ID</th>
      <th style="color:green;font-size:11px" align="center">Regn#</th>
       <th style="color:green;font-size:11px" align="center">Roll#</th>
      <th style="color:green;font-size:11px">Name</th>
      	
       
      <th style="color:green;font-size:11px" align="center">Course</th>
       <th style="color:green;font-size:11px" align="center">Semester</th>
        <th style="color:green;font-size:11px" align="center">Admission-Year</th>
 <th style="color:green;font-size:11px" align="center">Action</th>
       
    </tr>
  </thead>
  <tfoot>
            <tr>
                <th>Student ID</th>
                 <th>Reg#</th>
                 <th>Roll#</th>
                <th>Student Name</th>
               
                <th>Course</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Action</th>
                
            </tr>
        </tfoot>
  <?php while($row=mysql_fetch_array($run)){  ;?>

<tr id="row_<?php echo $row['sl'];?>">
     <td style="color:#3b5999" align="center"><?php echo $row['student_id'];?></td>
     <td style="color:#3b5999" align="center">
<?php if($row['registration_no']!='Not Available'){?>
      <span class="label label-success"><?php echo $row['registration_no'];?></span>
<?php } else {?>

<span title="This information is currently not available" class="label label-danger">N/A</span>
<?php } ?>
    </td>

     <td style="color:#3b5999" align="center">
<?php if($row['roll_no']!='Not Available'){?>
      <span class="label label-success"><?php echo $row['roll_no'];?></span>
<?php } else {?>

<span title="This information is currently not available" class="label label-danger">N/A</span>
<?php } ?>
    </td>
<td style="color:#3b5999" align="center"><?php echo $row['student_name'];?></td>
 
  
  
  
  <td style="color:#3b5999" align="center"><?php echo getDepartmentCenterCourse($row['dept_center_course_code'],$bt);?>
  
 </td>
 <td style="color:#3b5999" align="center"><?php echo getSemester($row['semester_code']);?></td>
 <td style="color:#3b5999" align="center"><?php echo $row['year_of_admission'];?></td>
 <td align="center">
    <a id="viewer_<?php echo $row['sl'];?>"   target="_blank" title="View and manage complete student profile" class="label label-success" href="<?php echo $base;?>universityStudentProfileWindowViewer.php?sl=<?php echo base64_encode($row['sl']);?>"><i title="View and manage complete student profile"  class="fa fa-search "></i></a>
 
<script type="text/javascript">
  $(document).ready(function(){
    $("#del_<?php echo $row['sl'];?>").click(function(){
   
       

      var id="<?php echo $row['sl'];?>"; //studentid
      var courseid="";
      var dept_center_id="<?php echo $dp;?>"; 
       
       
       
           $("#del_<?php echo $row['sl'];?>").hide();
           $("#viewer_<?php echo $row['sl'];?>").hide(); 
        
     if(id!=''){
      var dataString = {'id':id,'courseid':courseid,'dept_center_id':dept_center_id};
      $.ajax({
        url: '<?php echo $base;?>includes/remove_student.php',
          type: 'POST',
          dataType: 'json',
           data: dataString,
   beforeSend: function() {
              $("#img_<?php echo $row['sl'];?>").show();
               $("#message_<?php echo $row['sl'];?>").show();
               
        },
          success: function(data) {
            if(data.message=='Done' && data.num>=1){
              $("#img_<?php echo $row['sl'];?>").hide();
               $("#message_<?php echo $row['sl'];?>").hide();
               $("#row_<?php echo $row['sl'];?>").hide();
             }

              else if(data.message=='Done' && data.num==0){

             window.location.href="<?php echo $base;?>dashboard.php";


             }

               
          }
      });
    }
  
     
    });
  });
</script>





    <a   title="Delete Student" class="label label-danger" id="del_<?php echo $row['sl'];?>"><span title="Delete student"><i   class="fa fa-trash-o"></i></span></a>
    
 <img class="pull-right" title="Removing.." alt="Removing.."  style="display:none;width:12%" id="img_<?php echo $row['sl'];?>" src="<?php echo $base;?>images/ajax_loader_blue_512.gif"><span style="display:none;" id="message_<?php echo $row['sl'];?>" style="" class="label label-warning pull-right">Removing..</span>


 
 

 </td>
 
 












</tr>
<?php 
$i++; } ?>
</table>
  <?php }  //end of if 

  else { 


 // echo "<span id='nope' class='label label-danger'>No records exist as of now.</span>";
   


   }?> 







                            </div>
                     


  
  </div> 




















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
