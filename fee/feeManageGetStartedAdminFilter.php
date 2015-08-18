   
    <!-- this page is for dept and center but not for duiet-->
<script type="text/javascript">
$(document).ready(function(){ 
$("#sc").fadeOut(10000);

}); 
 </script>
     <?php $dptcode=$_SESSION['deptcode'];
 
		  $bt="dept"; 
      $bts="center";

			 $query1=mysql_query("select * from fee_structure where type='dept' order by fee_id desc");
			    $query2=mysql_query("select * from fee_structure where type='center' order by fee_id desc");
       
			 ?><?php 
function getDepartment($dcode){

$q=mysql_query("select dept_name,sf_code from  department where dept_code='$dcode'");
$t=mysql_fetch_array($q);
return $t['sf_code'];

}


function getCenter($dcode){

$q1=mysql_query("select center_name, sf_code from  center where center_code='$dcode'");
$t1=mysql_fetch_array($q1);
return $t1['sf_code'];

}

       ?>
			 <br/>
			 <br/>
<div class="cl-mcont" style="width:1400px">

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
<div class="page-head">
      <h3 title="Student Entry Panel" class="label label-success" style="font-size:19px">
        <i class="fa  fa-random"></i> Fee Structure Legend &raquo; <small style="color:black;font-size:12px">
        Use the below panel to get the detailed Fee Structure across various Departments and Centers in Dibrugarh University</small></h3>
    
      <br/>
 
</div>  
<br/>
 <a  href="<?php echo $base;?>dashboard.php"><span class="btn btn sm btn btn-primary pull-left" title="Back to Dashboard">Dashboard</span>
</a>
<?php 
$sql="SELECT * from  fee_structure"; $rs=mysql_query($sql);
$n=mysql_num_rows($rs) ; //overall
 if($n>=1) {?> 


             <span class="btn btn sm btn btn-success pull-left" id="" onclick="window.location.href='<?php echo $base;?>downloadFeeStructureOverall.php'" title="Download Complete Fee Structure Format under Dibrugarh University"  class="label label-success pull-right" href=""><i class="fa fa-download"></i>Download Overall Fee Structure</span>
        

            <span class="btn btn sm btn btn-danger pull-left" id="" onclick="window.print();" title="Print"  class="label label-success pull-right" href=""><i class="fa fa-print"></i></span>
        

        <?php } else { ?>




             <span class="btn btn sm btn btn-default pull-left"  title="You cannot download fee structure  as fee structure has not yet been prepared"  class="label label-default pull-right" href=""><i class="fa fa-warning"></i>Download Overall Fee Structure</span>
     

        <?php } ?>



 

<?php  include("functionall.php");?>
<?php

?>   
<br/>
<div class="table-responsive"> 
	<?php  if($n>=1) {

  if(mysql_num_rows($query1)>=1){ //department?>

	 
     <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demotable.css"> 
     <script type="text/javascript" src="<?php echo $base;?>js/dt.js"></script>
      
        
      
    <style type="text/css">

th{
  text-align:center;
  font-size:small;
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
    margin-top: 2.5em;
  } 
  .dataTables_info {
    margin-top: 2.5em;
  } 
  </style> 
    <script type="text/javascript">

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input title="Search by '+title+'" type="text" placeholder="Search.." />' );
    } );
 
    // DataTable
      var table   = $('#example').DataTable();

 
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
  <hr/>
    <h2 style="font-size:15px" class="label label-success"><i class="fa fa-tasks"></i> DEPARTMENTS-FEE STRUCTURE &raquo; </h2>
     <span class="btn btn sm btn btn-warning" id="" onclick="window.location.href='<?php echo $base;?>downloadFeeStructureDepartmentLegend.php?branch_type=dept'" title="Download Fee Structure of the various Departments under DU"  
      href=""><i class="fa fa-download"></i></span>
        
    <br/>
    <small style="font-size:11px; font-weight:bold; color:darkgrey">The below list contains fee structure slab records for the various departments in the Dibrugarh University</small>
    <br/> 
         <table cellpadding="2" cellspacing="0" border="0" class="display" id="example" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:15px; margin:-28px">
	   
	      

		      <thead>
    <tr>
       
      <th style="color:green;font-size:12px">Dept & Course</th>
    
     
      <th style="color:green;font-size:12px">Sem/Year</th>
 
      <th style="color:green;font-size:12px">Session</th>
      <th style="color:green;font-size:12px">Category</th>
      <th title="Admission Fee" style="color:green;font-size:12px">Admission</th>
      <th title="Course Fee" style="color:green;font-size:12px">Course</th>
      <th title="Library Fee" style="color:green;font-size:12px">Library</th>
      <th title="Library Fee" style="color:green;font-size:12px">Hostel</th>
      <th title="Union Magazine/Gymkhana Fee" style="color:green;font-size:12px">Union Magazine</th>
      <th title= "Student Aid Fund" style="color:green;font-size:12px">SAF</th>
      <th title="Development Fee" style="color:green;font-size:12px">Dev Fee</th>
      <th title="Internet Fee" style="color:green;font-size:12px">Internet</th>
      <th title="Laboratory Fee" style="color:green;font-size:12px">Lab</th>
      <th  title= "Student Safety Insurance" style="color:green;font-size:12px">SSI</th>
      <th title="Sports Fee" style="color:green;font-size:12px">Sports</th>
      <th title="Grand Total" style="color:#3b5999;font-size:12px">Total</th>
      <!-- <th style="color:green;font-size:12px">Language</th> -->
      
      

    </tr>
  </thead>

  <tfoot>
            <tr>
 <th>#</th>
      
     <th>Sem/Year</th>  

      <th>Session</th>
      <th >Category</th>
      <th>Admission-Fee</th>
      <th>Course-Fee</th>
      <th >Library-Fee</th>
      <th >Hostel-Fee</th>
      <th >Union-Magazine-Fee</th>
      <th >SAF-Fee</th>
      <th >Development-Fee</th>
      <th >Internet-Fee</th>
      <th >Lab-Fee</th>
      <th >Student-Safety-Insurance</th>
      <th >Sports-Fee</th>
      <th >Total</th>
                
      


            </tr>
        </tfoot>
              <?php $i=1;
			 while($row=mysql_fetch_array($query1))
			 {
			      $dccode=$row['course_code'];
			      $semcode=$row['sem_year'];
            $c=$row['center_dept_code'];
			       $sess=$row['session'];
			       $feeid=$row['fee_id'];  
			       $status=$row['status'];
			       $feecat=$row['fee_category_id'];
             $proc=$row['course_fee_parameter'];
             if($proc=='per_semester') {

              $procedure="Per Sem";

             }
             else {

                            $procedure="Per Year";
             }
			  ?> 
                      <tr>
		       <td style="font-size: 11px;"><?php  echo getDepartmentCenter($c,$bt);?><br/><br/><span class="label label-success"><?php  echo getDepartmentCenterCourse($dccode,$bt);?></span></td>
		 
			<td style=""><span class="label label-default"><?php echo getSemester($semcode); ?></span></td>
			 <td style="font-size:"><span class="label label-default"><?php echo getSession($sess);?></span></td>
			 <td style="font-size:"><span class="label label-default"><?php echo getFeeCat($feecat);?></span></td>
			 <?php if($row['admission_fee']!=0 && $row['admission_fee']!="0" && $row['admission_fee']!=''&& !empty($row['admission_fee'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['admission_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The admission fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>
			 	 <?php if($row['course_fee_year_sem']!=0 && $row['course_fee_year_sem']!="0" && $row['course_fee_year_sem']!=''
			 	 && !empty($row['course_fee_year_sem'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['course_fee_year_sem'];?>.00</span>
  <br/><br/><span title="Course Fee is raised on a <?php echo $procedure;?> basis" class="label label-success"><i style='font-size:10px' class="fa fa-random"></i> <?php echo $procedure;?></span>

       </td>
			 	<?php } else {?>

 <td>


			 	<span title="The course fee is yet not fixed" class="label label-danger">0.00</span>


<br/><br/><span title="Course Fee is raised on a <?php echo $procedure;?> basis" class="label label-success"><i style='font-size:10px' class="fa fa-random"></i> <?php echo $procedure;?></span>

       </td>

			 	<?php } ?>
			 
			  <?php if($row['library_fee']!=0 && $row['library_fee']!="0" && $row['library_fee']!=''
			 	 && !empty($row['library_fee'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['library_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The library fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>

        <?php if($row['hostel_fee']!=0 && $row['hostel_fee']!="0" && $row['hostel_fee']!=''
         && !empty($row['hostel_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['hostel_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The hostel fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

			 	 <?php if($row['union_magazine']!=0 && $row['union_magazine']!="0" && $row['union_magazine']!=''
			 	 && !empty($row['union_magazine'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['union_magazine'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The Union Magazine/Gymkhana fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>

			 	 <?php if($row['saf_fee']!=0 && $row['saf_fee']!="0" && $row['saf_fee']!=''
			 	 && !empty($row['saf_fee'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['saf_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The student aid fund is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>

			 
			 	 <?php if($row['development_fee']!=0 && $row['development_fee']!="0" && $row['development_fee']!=''
			 	 && !empty($row['development_fee'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['development_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The development fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>

			 
			  	 <?php if($row['interent_fee']!=0 && $row['interent_fee']!="0" && $row['interent_fee']!=''
			 	 && !empty($row['interent_fee'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['interent_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The internet fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>

			 
			  	 <?php if($row['laboratory_fee']!=0 && $row['laboratory_fee']!="0" && $row['laboratory_fee']!=''
			 	 && !empty($row['laboratory_fee'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['laboratory_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The laboratory fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>

			   	 <?php if($row['student_safety']!=0 && $row['student_safety']!="0" && $row['student_safety']!=''
			 	 && !empty($row['student_safety'])){?>
			 <td>


			 	<span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['student_safety'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The Student Safety Insurance fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>

			 
			 	 

			 	 <?php if($row['sports_fee']!=0 && $row['sports_fee']!="0" && $row['sports_fee']!=''
			 	 && !empty($row['sports_fee'])){?>
			 <td>


			 <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['sports_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The sports fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>
			  
			 
			 
			 
			  <?php if($row['total_fee']!=0 && $row['total_fee']!="0" && $row['total_fee']!=''
			 	 && !empty($row['total_fee'])){?>
			 <td>


			 	<span class="label label-success"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['total_fee'];?>.00</span></td>
			 	<?php } else {?>

 <td>


			 	<span title="The total fee is yet not fixed" class="label label-danger">0.00</span></td>

			 	<?php } ?>
			  
			 
			 
			 
			 
			  
			 
			 
	       	 
			  
                      </tr>
                       
	        <?php $i++; }?>
	  
            </table>

            <?php } 
  if(mysql_num_rows($query2)>=1){ //center?>

   
     <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demotable.css"> 
     <script type="text/javascript" src="<?php echo $base;?>js/dt.js"></script>
      
        
      
    <style type="text/css">

th{
  text-align:center;
  font-size:small;
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
    margin-top: 2.5em;
  } 
  .dataTables_info {
    margin-top: 2.5em;
  } 
  </style> 
    <script type="text/javascript">

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#exampleCenter tfoot th').each( function () {
        var title = $('#exampleCenter thead th').eq( $(this).index() ).text();
        $(this).html( '<input title="Search by '+title+'" type="text" placeholder="Search.." />' );
    } );
 
    // DataTable
      var table   = $('#exampleCenter').DataTable();

 
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
<hr/>
    <h2 style="font-size:15px" class="label label-primary"><i class="fa fa-sitemap"></i> CENTERS-FEE STRUCTURE</h2>
 <span class="btn btn sm btn btn-warning" id="" onclick="window.location.href='<?php echo $base;?>downloadFeeStructureDepartmentLegend.php?branch_type=center'" title="Download Fee Structure of the various Centers under DU"  
      href=""><i class="fa fa-download"></i></span>
        
    <br/>
    <small style="font-size:11px; font-weight:bold; color:darkgrey">The below list contains fee structure slab records 
      for the various centers in the Dibrugarh University</small>



    <br/>  
  
         <table cellpadding="2" cellspacing="0" border="0" class="display" id="exampleCenter" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:15px; margin:-28px;">
     
        

          <thead>
    <tr>
       
      <th style="color:green;font-size:12px">Center & Course</th>
    
     
      <th style="color:green;font-size:12px">Sem/Year</th>
 
      <th style="color:green;font-size:12px">Session</th>
      <th style="color:green;font-size:12px">Category</th>
      <th title="Admission Fee" style="color:green;font-size:12px">Admission</th>
      <th title="Course Fee" style="color:green;font-size:12px">Course</th>
      <th title="Library Fee" style="color:green;font-size:12px">Library</th>
      <th title="Hostel Fee" style="color:green;font-size:12px">Hostel</th>
      <th title="Union Magazine/Gymkhana Fee" style="color:green;font-size:12px">Union Magazine</th>
      <th title= "Student Aid Fund" style="color:green;font-size:12px">SAF</th>
      <th title="Development Fee" style="color:green;font-size:12px">Dev Fee</th>
      <th title="Internet Fee" style="color:green;font-size:12px">Internet</th>
      <th title="Laboratory Fee" style="color:green;font-size:12px">Lab</th>
      <th  title= "Student Safety Insurance" style="color:green;font-size:12px">SSI</th>
      <th title="Sports Fee" style="color:green;font-size:12px">Sports</th>
      <th title="Grand Total" style="color:#3b5999;font-size:12px">Total</th>
      <!-- <th style="color:green;font-size:12px">Language</th> -->
      
      

    </tr>
  </thead>

  <tfoot>
            <tr>
 <th>#</th>
      
     <th>Sem/Year</th>  

      <th>Session</th>
      <th >Category</th>
      <th>Admission-Fee</th>
      <th>Course-Fee</th>
      <th >Library-Fee</th>
      <th >Hostel-Fee</th>
       <th >Union-Magazine-Fee</th>
        <th >SAF-Fee</th>
         <th >Development-Fee</th>
          <th >Internet-Fee</th>
           <th >Lab-Fee</th>
            <th >Student-Safety-Insurance</th>
             <th >Sports-Fee</th>
              <th >Total</th>
                
      


            </tr>
        </tfoot>
              <?php $i=1;
       while($rowx=mysql_fetch_array($query2))
       {
            $dccode=$rowx['course_code'];
            $semcode=$rowx['sem_year'];
            $cx=$rowx['center_dept_code'];

             $sess=$rowx['session'];
             $feeid=$rowx['fee_id'];  
             $status=$rowx['status'];
             $feecat=$rowx['fee_category_id'];
             $proc=$rowx['course_fee_parameter'];
             if($proc=='per_semester') {

              $procedure="Per Sem";

             }
             else {

                            $procedure="Per Year";
             }
        ?> 
                      <tr>
           <td style="font-size: 11px;"><?php  echo getDepartmentCenter($cx,$bts);?><br/><br/><span class="label label-primary"><?php  echo getDepartmentCenterCourse($dccode,$bts);?></span></td>
     
      <td style=""><span class="label label-default"><?php echo getSemester($semcode); ?></span></td>
       <td style="font-size:"><span class="label label-default"><?php echo getSession($sess);?></span></td>
       <td style="font-size:"><span class="label label-default"><?php echo getFeeCat($feecat);?></span></td>
       <?php if($rowx['admission_fee']!=0 && $rowx['admission_fee']!="0" && $rowx['admission_fee']!=''&& !empty($rowx['admission_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['admission_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The admission fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>
         <?php if($rowx['course_fee_year_sem']!=0 && $rowx['course_fee_year_sem']!="0" && $rowx['course_fee_year_sem']!=''
         && !empty($rowx['course_fee_year_sem'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['course_fee_year_sem'];?>.00</span>
  <br/><br/><span title="Course Fee is raised on a <?php echo $procedure;?> basis" class="label label-success"><i style='font-size:10px' class="fa fa-random"></i> <?php echo $procedure;?></span>

       </td>
        <?php } else {?>

 <td>


        <span title="The course fee is yet not fixed" class="label label-danger">0.00</span>


<br/><br/><span title="Course Fee is raised on a <?php echo $procedure;?> basis" class="label label-success"><i style='font-size:10px' class="fa fa-random"></i> <?php echo $procedure;?></span>

       </td>

        <?php } ?>
       
        <?php if($rowx['library_fee']!=0 && $rowx['library_fee']!="0" && $rowx['library_fee']!=''
         && !empty($rowx['library_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['library_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The library fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

        <?php if($rowx['hostel_fee']!=0 && $rowx['hostel_fee']!="0" && $rowx['hostel_fee']!=''
         && !empty($rowx['hostel_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['hostel_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The hostel fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

         <?php if($rowx['union_magazine']!=0 && $rowx['union_magazine']!="0" && $rowx['union_magazine']!=''
         && !empty($rowx['union_magazine'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['union_magazine'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The Union Magazine/Gymkhana fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

         <?php if($rowx['saf_fee']!=0 && $rowx['saf_fee']!="0" && $rowx['saf_fee']!=''
         && !empty($rowx['saf_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['saf_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The student aid fund is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

       
         <?php if($rowx['development_fee']!=0 && $rowx['development_fee']!="0" && $rowx['development_fee']!=''
         && !empty($rowx['development_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['development_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The development fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

       
           <?php if($rowx['interent_fee']!=0 && $rowx['interent_fee']!="0" && $rowx['interent_fee']!=''
         && !empty($rowx['interent_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['interent_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The internet fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

       
           <?php if($rowx['laboratory_fee']!=0 && $rowx['laboratory_fee']!="0" && $rowx['laboratory_fee']!=''
         && !empty($rowx['laboratory_fee'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['laboratory_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The laboratory fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

           <?php if($rowx['student_safety']!=0 && $rowx['student_safety']!="0" && $rowx['student_safety']!=''
         && !empty($rowx['student_safety'])){?>
       <td>


        <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['student_safety'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The Student Safety Insurance fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>

       
         

         <?php if($rowx['sports_fee']!=0 && $rowx['sports_fee']!="0" && $rowx['sports_fee']!=''
         && !empty($rowx['sports_fee'])){?>
       <td>


       <span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['sports_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The sports fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>
        
       
       
       
        <?php if($rowx['total_fee']!=0 && $rowx['total_fee']!="0" && $rowx['total_fee']!=''
         && !empty($rowx['total_fee'])){?>
       <td>


        <span class="label label-success"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $rowx['total_fee'];?>.00</span></td>
        <?php } else {?>

 <td>


        <span title="The total fee is yet not fixed" class="label label-danger">0.00</span></td>

        <?php } ?>
        
       
       
       
       
        
       
       
           
        
                      </tr>
                       
          <?php $i++; }?>
    
            </table>

            <?php } 






              }  //main if

            else {
echo "<br/>";

echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> 
Fee Structure Slab has not been prepared as of now. Please try again!!</span>";

 
} ?>
      
</div>
</div> 
  
     <div id="ser-load" style="display:none">
     <img src="images/ajax-loader.gif">
	  
     </div>
  
 
 <script type="text/javascript">
     $(document).ready(function() { 
      $('input[type="checkbox"]').bootstrapSwitch();

  // $("[name='deliver']").bootstrapSwitch();

 } );</script>  <style type="text/css">.bootstrap-switch-container span { white-space: nowrap; }</style>