<?php ob_start(); @session_start();
 
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
<?php }  
  $center_code=$_POST['center']; //center code

  $center_course_code=$_POST['center_course']; //center code


  
$bt="center";if($center_course_code!=0){?>

    
                                        <legend><i class="fa fa-users"></i> <?php echo getDepartmentCenter($center_code,$bt) ; ?> &raquo; <small style="font-size:12px; font-weight:bold; color:darkgrey"><?php echo getDepartmentCenterCourse($center_course_code,$bt);?></small></legend>
                                     
                          <?php } else {?>



<legend><i class="fa fa-users"></i> <?php echo getDepartmentCenter($center_code,$bt) ; ?>&raquo; <small style="font-size:12px; font-weight:bold; color:darkgrey"> All Students
</small></legend>






  
   
      <?php  }
if($center_course_code!=0){
	  
	  
	  $sql="SELECT *
FROM student_details s
WHERE s.dept_center_code =$center_code and s.dept_center_course_code=$center_course_code 
and s.belongs_to_center_dept='center'
ORDER BY s.sl DESC ";
	}
  else {

  $sql="SELECT *
FROM student_details s
WHERE s.dept_center_code =$center_code
and s.belongs_to_center_dept='center'
ORDER BY s.sl DESC ";

  }
	
	
	
	                 
        $run=mysql_query($sql) or die(mysql_error()) ;
?>


 <div class="col-md-6 form-group pull-right">
    <form id="centerSearch" action="<?php echo $base;?>centerStudentsFilter.php" method="post">

  <input type="hidden" name="center" id="center" value="<?php echo $center_code;?>">
    <label style="color:red" for="author"><i class="fa fa-search"></i> Course Filter:</label>
   <select onchange="$('#centerSearch').submit();" title="Filter by course" name="center_course" class="form-control" id="center_course"  required="true">
                <?php
               
                $query11=mysql_query("select * from center_course where center_code=$center_code");?>
                <?php if($center_course_code==0){?>

<option value="0" selected>ALL COURSE</option>



                <?php } 
                 
                 while($rowdd1=mysql_fetch_array($query11))
               {
               ?>
                <option <?php if($center_course_code==$rowdd1['cc_code']){echo "selected";} ?> value="<?php echo $rowdd1['cc_code']; ?>">
                <?php  echo $rowdd1['cc_name'];?>
                </option>
                <?php 
               } 
                ?>

                 <?php if($center_course_code!=0){?>

<option value="0">ALL COURSE</option>



                <?php }  ?>
                 
                </select> 

              </form>

</div>
<?php 


if(mysql_num_rows($run)>=1){ $i=1;?>
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
      <th style="color:green;font-size:11px">Student-Name</th>
        
     
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
 
  
  
 </td>
  <td style="color:#3b5999" align="center"><?php echo getDepartmentCenterCourse($row['dept_center_course_code'],$bt);?>
  
 </td>
 <td style="color:#3b5999" align="center"><?php echo getSemester($row['semester_code']);?></td>
 <td style="color:#3b5999" align="center"><?php echo $row['year_of_admission'];?></td>
 <td align="center">
    <a  id="viewer_<?php echo $row['sl'];?>" target="_blank" title="View and manage complete student profile" class="label label-success" href="<?php echo $base;?>universityStudentProfileWindowViewer.php?sl=<?php echo base64_encode($row['sl']);?>"><i title="View and manage complete student profile"  class="fa fa-search "></i></a>
 
   <script type="text/javascript">
  $(document).ready(function(){
    $("a#deletes_<?php echo $row['sl'];?>").click(function(){
   
       

      var id="<?php echo $row['sl'];?>"; //studentid
      var courseid="<?php echo $center_course_code;?>";
      var dept_center_id="<?php echo $center_code;?>"; 
       
       
       
           $("a#deletes_<?php echo $row['sl'];?>").hide();
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
   </script>

     <script language="javascript">
   $(document).ready(function(){
    $("[rel='tooltip']").tooltip();
    });
</script>   
  <a data-placement='bottom' rel="tooltip" href="#" title="You cannot directly delete this student from the admin panel. You need to log in to the specific center to delete this student!!"><i  class="fa fa-warning"></i></a>


 <img class="pull-right" title="Removing.." alt="Removing.."  style="display:none;width:12%" id="img_<?php echo $row['sl'];?>" src="<?php echo $base;?>images/ajax_loader_blue_512.gif"><span style="display:none;" id="message_<?php echo $row['sl'];?>" style="" class="label label-warning pull-right">Removing..</span>
 
 
 

 </td>
 




</tr>
<?php 
$i++; } ?>
</table>
  <?php }  //end of if 

  else { 


  echo "<span id='nope' class='label label-danger'>No records exist as of now.</span>";
   


   }?> 







                            </div>
                     


  
  </div> 



  