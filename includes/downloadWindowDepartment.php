<?php  

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

}?>

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
             
        <div class="page-head">
      <h3 title="Download Manager" class="label label-primary" style="font-size:19px">
        <i class="fa  fa-download"></i> Download Manager &raquo; <small style="font-size:12px" class="label label-primary"> Use the below panel to download Student Data in Excel Format from <?php echo $loggername;?></small></h3> 
              </div>
<br/>
<div id="downloadwindow" style="font-size:15px; line-height:40px">
 

<?php $bt=$_SESSION['branch_type'];
if($bt=='dept'){?>
  <li   style="list-style:none"><i class="fa fa-users"></i> Department Students &raquo; <small style="font-weight:bold; font-size:12px; color:darkgrey">Choose a specific course below to download student data from <?php echo $loggername;?></small>
       <span id="starthere" onclick="$('#deptdlsss').toggle();$('#centdlsss').hide();" title="Start downloading Students from various courses in <?php echo $loggername;?>"  class="label label-success pull-right" href=""><i class="fa fa-download"></i> Start Download</span>
            </li>
            <?php } else {?>
           

           <li style="list-style:none"><i class="fa fa-users"></i> Center Students &raquo; <small style="font-weight:bold; font-size:12px; color:darkgrey">Choose a specific course below to download student data from <?php echo $loggername;?></small>
             <span id="startherecenter" onclick="$('#deptdlsss').hide();$('#centdlsss').toggle();" title="Start downloading Students from various courses in <?php echo $loggername;?>"  class="label label-success pull-right" href=""><i class="fa fa-download"></i> Start Download</span>
            

          </li>
          <?php }  $dc=$_SESSION['deptcode'];
$bts=$_SESSION['branch_type'];$sql="SELECT * from  fee_structure where center_dept_code=$dc"; $rs=mysql_query($sql);
$n=mysql_num_rows($rs) ;
 if($n>=1) {?> 

 <li style="list-style:none"><i class="fa fa-random"></i> Fee Structure &raquo; <small style="font-weight:bold; font-size:12px; color:darkgrey">Download Fee Structure Legend under <?php echo $loggername;?></small>
             <span id="" onclick="window.location.href='<?php echo $base;?>downloadFeeStructureDepartment.php?deptcode=<?php echo $dc;?>&branch_type=<?php echo $bts;?>'" title="Download Complete Fee Structure Format under <?php echo $loggername;?>"  class="label label-success pull-right" href=""><i class="fa fa-download"></i>Download</span>
        

        <?php } else { ?>



<li style="list-style:none"><i class="fa fa-random"></i> Fee Structure &raquo; <small style="font-weight:bold; font-size:12px; color:darkgrey">You cannot download fee structure legend under <?php echo $loggername;?></small>
             <span  title="You cannot download fee structure under <?php echo $loggername;?> as fee structure under this criteria has not yet been prepared"  class="label label-default pull-right" href=""><i class="fa fa-warning"></i>Download</span>
     

        <?php } ?>


        </div>



        <div id="centdlsss" style="display:none">  



   
        <?php  $sql="select * from center where center_code=$deptcode order by center_code desc";                     
        $run=mysql_query($sql) or die(mysql_error()) ;
if(mysql_num_rows($run)>=1){?>
<link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demopage.css">
     <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demotable.css"> 
     
    <script type="text/javascript" language="javascript" src="<?php echo $base;?>js/dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
          var oTable=$('#examples').dataTable({ "aLengthMenu": [
            [10, 50, 100, 200, -1],
            [10, 50, 100, 200, "All"]
        ], 


"iDisplayLength" : 10 });
         
    
  oTable.fnSort( [ [0,'asc'] ] );
      } );
    </script>

 
  
<table cellpadding="0" cellspacing="0" border="0" class="display" id="examples" width="100%" 
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


<?php 
$cds=$fetch['center_code'];
$checker=mysql_query("select count(dept_center_code) as cnts from student_details where dept_center_code= $cds and belongs_to_center_dept='center'");
$fetchcounter=mysql_fetch_array($checker);
$counterDept=$fetchcounter['cnts']; 
if($counterDept==0){ //undownloadable?>


 <a title="You cannot Download Student Data in Excel Format from <?php echo $fetch['center_name'];?> as this center contains no students" class="label label-default pull-right" disabled><i class="fa fa-warning"></i> Not Allowed</a>


<?php } else {?>



 <a title="Download All Student Data in Excel Format from <?php echo $fetch['center_name'];?> " class="label label-success pull-right" href="<?php echo $base;?>downloadStudentDataCenterAll.php?deptid=<?php echo $fetch['center_code'];?>"><i class="fa fa-download"></i> Download</a>
 


<?php }
?>
<br/>
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
if($counter==0){ //undownloadable
?>
 
       
<a title="You cannot Download Student Data in Excel Format from <?php echo $fetchcourse['cc_name'];?> under  <?php echo $fetch['center_name'];?> as this course contains no students" class="label label-default pull-right" disabled><i class="fa fa-warning"></i> Not Allowed</a>
 
 

<?php } else { ?>

  <a title="Download Student Data in Excel Format from <?php echo $fetchcourse['cc_name'];?> under  <?php echo $fetch['center_name'];?> " class="label label-warning pull-right" href="<?php echo $base;?>downloadStudentDataCenter.php?deptid=<?php echo $fetch['center_code'];?>&courseid=<?php echo $fetchcourse['cc_code'];?>"><i class="fa fa-download"></i> Download</a>
 
 

<?php }  ?>

 

 




<?php } } else {  
 


 echo "<span id='nocourse' class='label label-danger'><i class='fa fa-info'></i> No course exist under this center. 
 </span>";
   


}?>
 
  </td>
 

<td style="color:#3b5999;font-size:11px;font-size:14px;" align="center"><?php echo $fetch['sf_code'];?>
  </td>
 </tr>

<?php 
$i++; } ?>
</table>
  <?php }  //end of if 

  else { 
echo "<span id='nope' class='label label-danger'>No records exist. Please add a new course to download student data!!</span>";
   }?> 

</div>
<div id="deptdlsss" style="display:none">  
         <?php  $sql="select * from department where dept_code=$deptcode order by dept_code desc";                     
        $run=mysql_query($sql) or die(mysql_error()) ;
if(mysql_num_rows($run)>=1){?>

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
 
 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:11px; display:">
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
<?php 
$cds=$fetch['dept_code'];
$checker=mysql_query("select count(dept_center_code) as cnts from student_details where dept_center_code= $cds and belongs_to_center_dept='dept'");
$fetchcounter=mysql_fetch_array($checker);
$counterDept=$fetchcounter['cnts']; 
if($counterDept==0){ //undownloadable?>


 <a title="You cannot Download Student Data in Excel Format from <?php echo $fetch['dept_name'];?> as this department contains no students" class="label label-default pull-right" disabled><i class="fa fa-warning"></i> Not Allowed</a>


<?php } else {?>



 <a title="Download All Student Data in Excel Format from <?php echo $fetch['dept_name'];?> " class="label label-success pull-right" href="<?php echo $base;?>downloadStudentDataDepartmentAll.php?deptid=<?php echo $fetch['dept_code'];?>"><i class="fa fa-download"></i> Download</a>
 


<?php }
?>
<br/>
<br/>
<?php 
 $coursesql="select * from course where dept_code=".$fetch['dept_code']." order by course_id desc";                     
        $runcourse=mysql_query($coursesql) or die(mysql_error()) ; 
        if(mysql_num_rows($runcourse)>=1){
        while($fetchcourse=mysql_fetch_array($runcourse)){?>
<li id="lirow_<?php echo $fetchcourse['course_id'];?>" style="font-size:11px; color:#4185F4; font-weight:bolder; padding-left:20px; list-style:none" class=''>
  <?php echo $fetchcourse['course_name']; $cd=$fetchcourse['course_id']; 

$check=mysql_query("select count(dept_center_course_code) as cnt from student_details where dept_center_course_code= $cd and belongs_to_center_dept='dept'");

$fetchcount=mysql_fetch_array($check);
$counter=$fetchcount['cnt'];
if($counter==0){ //undownloadable
?>
 
 <a title="You cannot Download Student Data in Excel Format from <?php echo $fetchcourse['course_name'];?> under  <?php echo $fetch['dept_name'];?> as this course contains no students" class="label label-default pull-right" disabled><i class="fa fa-warning"></i> Not Allowed</a>
 

<?php } else { ?>

 
    <a title="Download Student Data in Excel Format from <?php echo $fetchcourse['course_name'];?> under  <?php echo $fetch['dept_name'];?> " class="label label-warning pull-right" href="<?php echo $base;?>downloadStudentDataDepartment.php?deptid=<?php echo $fetch['dept_code'];?>&courseid=<?php echo $fetchcourse['course_id'];?>"><i class="fa fa-download"></i> Download</a>
 
<?php }  ?>

  
 
 


<?php } } else {  
 


 echo "<span id='nocourse' class='label label-danger'><i class='fa fa-info'></i> No course exist under this department. 
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
echo "<span id='nope' class='label label-danger'>No records exist. Please add a new course to download student data!!</span>";
   }?> 
 </div>














</div>
                     




  


        
      

                                     