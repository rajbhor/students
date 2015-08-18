   
    <!-- this page is for dept and center but not for duiet-->
<script type="text/javascript">
$(document).ready(function(){ 
$("#sc").fadeOut(10000);

}); 
 </script>
     <?php $dptcode=$_SESSION['deptcode'];
 
      $bt=$_SESSION['branch_type']; 
       $query1=mysql_query("select * from fee_structure where center_dept_code=$dptcode");
       
       
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
<div class="page-head">
      <h3 title="Student Entry Panel" class="label label-success" style="font-size:19px">
        <i class="fa  fa-random"></i> Fee Structure Legend &raquo; <small style="color:black;font-size:12px">
        Use the below panel to get the detailed Fee Structure view under <?php echo $loggername;?></small></h3>
    
      <br/>
 
</div>  
 <a  href="<?php echo $base;?>dashboard.php"><span class="btn btn sm btn btn-primary pull-right" title="Back to Dashboard">Dashboard</span>
</a>

<a target="_blank"  href="<?php echo $base;?>feeEntryGetStarted.php"><span class="btn btn sm btn btn-warning pull-right" title="Create Fee Structure"><i class="fa fa-plus"></i> New Fee Structure</span>
</a>

<?php  include("functionall.php");?>
<?php

?>   
<br/>
<div class="table-responsive"> 
  <?php if(mysql_num_rows($query1)>=1){?>

   
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
  }.dataTables_info{
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
  
         <table cellpadding="2" cellspacing="0" border="0" class="display" id="example" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:15px; margin:-25px">
     
        

          <thead>
    <tr>
       
      <th style="color:green;font-size:12px">#</th>
    
     
      <th style="color:green;font-size:12px">Sem/Year</th>
 
      <th style="color:green;font-size:12px">Session</th>
      <th style="color:green;font-size:12px">Category</th>
      <th title="Admission Fee" style="color:green;font-size:12px">Admission</th>
      <th title="Course Fee" style="color:green;font-size:12px">Course</th>
      <th title="Library Fee" style="color:green;font-size:12px">Library</th>
       <th title="Union Magazine/Gymkhana Fee" style="color:green;font-size:12px">Union Magazine</th>
        <th title= "Student Aid Fund" style="color:green;font-size:12px">SAF</th>
         <th title="Development Fee" style="color:green;font-size:12px">Dev Fee</th>
          <th title="Internet Fee" style="color:green;font-size:12px">Internet</th>
          <th title="Hostel Fee" style="color:green;font-size:12px">Hostel</th>
           <th title="Laboratory Fee" style="color:green;font-size:12px">Lab</th>
            <th  title= "Student Safety Insurance" style="color:green;font-size:12px">SSI</th>
             <th title="Sports Fee" style="color:green;font-size:12px">Sports</th>
              <th title="Grand Total" style="color:#3b5999;font-size:12px">Total</th>
      <!-- <th style="color:green;font-size:12px">Language</th> -->
      
      <th style="color:green;font-size:12px">Action</th>


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
       <th >Union-Magazine-Fee</th>
        <th >SAF-Fee</th>
         <th >Development-Fee</th>
          <th >Internet-Fee</th>
          <th >Hostel-Fee</th>
           <th >Lab-Fee</th>
            <th >Student-Safety-Insurance</th>
             <th >Sports-Fee</th>
              <th >Total</th>
                <th >Action</th>
 
      


            </tr>
        </tfoot>
              <?php $i=1;
       while($row=mysql_fetch_array($query1))
       {
            $dccode=$row['course_code'];
            $semcode=$row['sem_year'];
             $sess=$row['session'];
             $feeid=$row['fee_id'];  
             $status=$row['status'];
             $type_fee=$row['type_fee'];
             $feecat=$row['fee_category_id'];
            $proc=$row['course_fee_parameter'];
             if($proc=='per_semester') {

              $procedure="Per Sem";

             }
             else {

                            $procedure="Per Year";
             }
       
       
       
       switch($feecat){
           
     case 1:
      if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="N/A";
      }
      else {
    $fee=$type_fee;
   
      }
      break;
    case 2:
       if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="N/A";
      }
      else {
    $fee=$type_fee;
   
      }
      break;
   
   case 3:
       $fee="N/A";
      break;
   case 4:
      if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="N/A";
      }
      else {
    $fee=$type_fee;
   
      }
      break;
    default: 
       $fee="0";
       
  }
       
       
       
        ?> 
                      <tr>
           <td style="font-size: 11px;"><?php  echo $i;?>. <?php  echo getDepartmentCenterCourse($dccode,$bt);?></td>
     
      <td style=""><span class="label label-default"><?php echo getSemester($semcode); ?></span></td>
       <td><span class="label label-default"><?php echo getSession($sess);?></span></td>
       <td><span class="label label-default"><?php echo getFeeCat($feecat);?></span>
            <?php if($fee!="N/A"){?>
       <br/><br/>
       <?php if($fee!=0 && $fee!="0"){?>
       <span title="<?php echo getFeeCat($feecat);?> Fee is Rs. <?php echo $fee;?>.00" class="label label-primary"><i class="fa fa-inr"></i><?php echo $fee;?>.00</span>
        <?php } else {?>
        
       <span title="<?php echo getFeeCat($feecat);?> Fee is not fixed yet" class="label label-danger"><?php echo $fee;?>.00</span>  
       
       
        <?php } 
            
       } else { if($feecat!=3 && $feecat!="3"){ ?>
       <br/><br/>
       <span title="<?php echo getFeeCat($feecat);?> Fee is not fixed yet" class="label label-danger"><?php echo $fee;?></span>  
       
       
       
       <?php } } ?>
            
       </td>
        <?php if($row['admission_fee']!=0 && $row['admission_fee']!="0" && $row['admission_fee']!=''&& !empty($row['admission_fee'])){?>
       <td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['admission_fee'];?>.00</span></td>
        <?php } else {?><td>
<span title="The admission fee is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?>
<?php if($row['course_fee_year_sem']!=0 && $row['course_fee_year_sem']!="0" && $row['course_fee_year_sem']!=''
         && !empty($row['course_fee_year_sem'])){?>
       <td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['course_fee_year_sem'];?>.00</span>
 <br/><br/> <span title="Course Fee is raised on a <?php echo $procedure;?> basis" class="label label-success"><i style='font-size:10px' class="fa fa-random"></i> <?php echo $procedure;?></span>
</td>
        <?php } else {?>
<td><span title="The course fee is yet not fixed" class="label label-danger">0.00</span>
<br/><br/><span title="Course Fee is raised on a <?php echo $procedure;?> basis" class="label label-success"><i style='font-size:10px' class="fa fa-random"></i> <?php echo $procedure;?></span>
</td>
<?php } ?><?php if($row['library_fee']!=0 && $row['library_fee']!="0" && $row['library_fee']!='' && !empty($row['library_fee'])){?>
       <td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['library_fee'];?>.00</span></td>
        <?php } else {?>
<td><span title="The library fee is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?><?php if($row['union_magazine']!=0 && $row['union_magazine']!="0" && $row['union_magazine']!='' && !empty($row['union_magazine'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['union_magazine'];?>.00</span></td>
        <?php } else {?>
<td><span title="The Union Magazine/Gymkhana fee is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?><?php if($row['saf_fee']!=0 && $row['saf_fee']!="0" && $row['saf_fee']!='' && !empty($row['saf_fee'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['saf_fee'];?>.00</span></td>
        <?php } else {?>
<td><span title="The student aid fund is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?><?php if($row['development_fee']!=0 && $row['development_fee']!="0" && $row['development_fee']!='' && !empty($row['development_fee'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['development_fee'];?>.00</span></td>
        <?php } else {?>
<td><span title="The development fee is yet not fixed" class="label label-danger">0.00</span></td><?php } ?>

<?php if($row['interent_fee']!=0 && $row['interent_fee']!="0" && $row['interent_fee']!='' && !empty($row['interent_fee'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['interent_fee'];?>.00</span></td>
        <?php } else {?>
<td><span title="The internet fee is yet not fixed" class="label label-danger">0.00</span></td><?php } ?>

<?php if($row['hostel_fee']!=0 && $row['hostel_fee']!="0" && $row['hostel_fee']!='' && !empty($row['hostel_fee'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['hostel_fee'];?>.00</span></td>
        <?php } else {?>
<td><span title="The hostel fee is yet not fixed" class="label label-danger">0.00</span></td><?php } ?>


<?php if($row['laboratory_fee']!=0 && $row['laboratory_fee']!="0" && $row['laboratory_fee']!='' && !empty($row['laboratory_fee'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['laboratory_fee'];?>.00</span></td>
        <?php } else {?>
<td><span title="The laboratory fee is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?>
<?php if($row['student_safety']!=0 && $row['student_safety']!="0" && $row['student_safety']!='' && !empty($row['student_safety'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['student_safety'];?>.00</span></td>
        <?php } else {?>
<td><span title="The Student Safety Insurance fee is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?><?php if($row['sports_fee']!=0 && $row['sports_fee']!="0" && $row['sports_fee']!='' && !empty($row['sports_fee'])){?>
<td><span class="label label-primary"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['sports_fee'];?>.00</span></td>
        <?php } else {?>
<td><span title="The sports fee is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?><?php if($row['total_fee']!=0 && $row['total_fee']!="0" && $row['total_fee']!='' && !empty($row['total_fee'])){?>
<td><span class="label label-success"><i style='font-size:10px' class="fa fa-inr"></i><?php  echo $row['total_fee'];?>.00</span></td>
        <?php } else {?><td><span title="The total fee is yet not fixed" class="label label-danger">0.00</span></td>
<?php } ?>
<td><span class="field-tip">
<?php if($status==1){?>
<div id="activate" title="This fee slab is currently active">
<span class="label label-success">Activated</span>
</div>
 <?php } else {?>
<div id="inactivate" title="This fee slab is currently inactive">
<span class="label label-danger">Inactive</span>
</div>
 <?php } ?><br/>
<?php if($status==1){ //activated we will check payments table
  $p=mysql_query("select * from payment where fee_id=$feeid");?>
  <?php  
             if(mysql_num_rows($p)==0) { ?>
            <a title="Edit the various fee head amounts under this slab" target="_blank"   class="fa fa-pencil" href="feeManageGetEdited.php?feeid=<?php echo base64_encode($feeid);?>">
         <?php } else {?>
<a style="color:darkgrey" title="You cannot Edit this fee structure as this fee slab currently contains payment records within its scaffold"   class="fa fa-pencil" >
<?php } ?>
          &nbsp; 
          <?php  if(mysql_num_rows($p)==0) { ?> 
             <a onClick = "javascript: if (!window.confirm ('Are you sure to remove this fee slab permanently?')) return false;" title="Remove this fee structure"   class="fa fa-trash-o" href="fee/removeFeeStructure.php?feeid=<?php echo base64_encode($feeid);?>">
          </a><?php } else { ?>
<a title="You cannot Remove this fee structure as this fee slab currently contains payment records within its scaffold"   class="fa fa-trash-o" ></a>
<?php } ?>
           &nbsp; 
           <?php  
             if(mysql_num_rows($p)==0) { ?>
           <a style="color:red" title="Change status from activated to inactive"  class="fa fa-refresh" href="fee/changeStatusInactive.php?feeid=<?php echo base64_encode($feeid);?>">
           </a>
           <?php } else {?>
<a title="You cannot Change status from activated to inactive as this fee slab currently contains payment records within its scaffold"  class="fa fa-refresh"  style="color:darkgrey">
           </a>
<?php } ?>
           <?php } else { //from inactive to active any time?><a title="You cannot edit this fee structure as it is currently inactive" style="color:darkgrey"   class="fa fa-pencil">
            </a>&nbsp;  
             <a style="color:darkgrey" title="You cannot remove this fee structure as it is currently inactive"   
             class="fa fa-trash-o">
            </a>&nbsp;  
 <a style="color:green" title="Change status from inactive to activated "  class="fa fa-refresh" href="fee/changeStatusActivated.php?feeid=<?php echo base64_encode($feeid);?>">
          </a>
<?php } ?>
</span></td></tr>
<?php $i++; }?>
</table>
<?php } else {
echo "<br/>";echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> 
Fee Structure Slab has not been prepared as of now. Please try again!!</span>";
} ?></div>
</div> 
<div id="ser-load" style="display:none">
     <img src="images/ajax-loader.gif">
</div><style type="text/css">.bootstrap-switch-container span { white-space: nowrap; }</style>