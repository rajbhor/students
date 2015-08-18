<?php error_reporting(0);session_start();
require("auto_connect.php");
$dptcode=$_SESSION['deptcode'];
$course=$_GET['course'];
$sem=$_GET['fsem'];
$session=$_GET['fsession'];
$fcategory=$_GET['fcategory']; 
$query=mysql_query("select * from fee_structure where center_dept_code=$dptcode AND course_code=$course AND session=$session AND sem_year=$sem AND fee_category_id=$fcategory");
$result=@mysql_num_rows($query);
if($result==1) {
$r=mysql_fetch_array($query);
$adm_fee=$r['admission_fee'];
$course_fee=$r['course_fee_year_sem'];
$library_fee=$r['library_fee'];
$union_magazine=$r['union_magazine'];
$saf_fee=$r['saf_fee'];
$development_fee=$r['development_fee'];
$interent_fee=$r['interent_fee'];
$hostel_fee=$r['hostel_fee'];
$laboratory_fee=$r['laboratory_fee'];
$student_safety=$r['student_safety'];
$sports_fee=$r['sports_fee'];
$total=$r['total_fee'];
$procedure=$r['course_fee_parameter'];
$type_fee=$r['type_fee'];
 
$type=$r['fee_category_id']; //type can be 1=sponsored 2=endowment 3=general 4=lateral entry
switch ($type) {
    case 1:
      if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="";
      }
      else {
	  $fee=$type_fee;
	 
      }
      break;
    case 2:
       if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="";
      }
      else {
	  $fee=$type_fee;
	 
      }
      break;
   
   case 3:
       $fee="";
      break;
    case 4:
      if($type_fee==NULL || $type_fee=="NULL" || empty($type_fee) || $type_fee==''){
       $fee="";
      }
      else {
	  $fee=$type_fee;
	 
      }
      break;
    default: 
       $fee="0";
       
  }
 }

 ?>
 <div class="col-md-6 form-group">
	 <label for="title">Course Fee Procedure:</label>
<br/>

<label onclick="check_semester_year()" id="p_year" for="per_year" class="label  label-success"><input onclick="check_semester_year()" title="You need to select atleast one of these choices to save fee structure" required <?php if($procedure=='per_year'){ echo "checked";} ?> type="radio" name="param" value="per_year" id="per_year"> Per Year</label>
    <label onclick="check_semester_year()" id="p_sem" for="per_semester" class="label  label-primary"> <input onclick="check_semester_year()" title="You need to select atleast one of these choices to save fee structure" required <?php if($procedure=='per_semester'){ echo "checked";} ?> type="radio" name="param" value="per_semester" id="per_semester"> Per Semester</label>

</div>
  <div class="col-md-6 form-group">
     <label for="title">Admission Fee:</label>
   <input maxlength="5" value="<?php echo $adm_fee;?>"   id="fadmission" title="Admission Fee" autocomplete="off" type="text" 
   name="fadmission" class="form-control input_no" placeholder="Admission Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>


 <div class="col-md-6 form-group">
     <label for="title">Course Fee:</label> 
   <input maxlength="5" value="<?php echo $course_fee;?>"   id="fcourse" title="Course Fee" autocomplete="off" type="text" 
   name="fcourse" class="form-control input_no" placeholder="Course Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>

<div class="col-md-6 form-group">
     <label for="title">Library Fee:</label>
   <input maxlength="5" value="<?php echo $library_fee;?>"   id="flibrary" title="Library Fee" autocomplete="off" type="text" 
   name="flibrary" class="form-control input_no" placeholder="Library Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>

<div class="col-md-6 form-group">
     <label for="title">Union and Magazine Fee:</label>
   <input maxlength="5"  value="<?php echo $union_magazine;?>"   id="funion" title="Union and Magazine Fee" autocomplete="off" type="text" 
   name="funioun" class="form-control input_no" placeholder="Union and Magazine Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>


<div class="col-md-6 form-group">
     <label for="title">SAF Fee:</label>
   <input  maxlength="5" value="<?php echo $saf_fee;?>"   id="fstudentaidfund" title="Student Aid Fund" autocomplete="off" type="text" 
   name="fstudentaidfund" class="form-control input_no" placeholder="Student Aid Fund" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>


<div class="col-md-6 form-group">
     <label for="title">Development Fee:</label>
   <input maxlength="5" value="<?php echo $development_fee;?>"   id="fdevelopment" title="Development Fee" autocomplete="off" type="text" 
   name="fdevelopment" class="form-control input_no" placeholder="Development Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>


<div class="col-md-6 form-group">
     <label for="title">Internet Fee:</label>
   <input maxlength="5" value="<?php echo $interent_fee;?>"   id="finternet" title="Internet Fee" autocomplete="off" type="text" 
   name="finternet" class="form-control input_no" placeholder="Internet Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>

<div class="col-md-6 form-group">
     <label for="title">Hostel Fee:</label>
   <input maxlength="5" value="<?php echo $hostel_fee;?>"   id="fhostel" title="Hostel Fee" autocomplete="off" type="text" 
   name="fhostel" class="form-control input_no" placeholder="Hostel Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>


<div class="col-md-6 form-group">
     <label for="title">Laboratory Fee:</label>
   <input maxlength="5" value="<?php echo $laboratory_fee;?>"   id="flaboratory" title="Laboratory Fee" autocomplete="off" type="text" 
   name="flaboratory" class="form-control input_no" placeholder="Laboratory Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>


<div class="col-md-6 form-group">
     <label for="title">Student Safety Insurance:</label>
   <input maxlength="5" value="<?php echo $student_safety;?>"    id="fsafetyip" title="Student Safety Insurance" autocomplete="off" type="text" 
   name="fsafetyip" class="form-control input_no" placeholder="Student Safety Insurance" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>


<div class="col-md-6 form-group">
     <label for="title">Sports Board Fee:</label>
   <input maxlength="5" value="<?php echo $sports_fee;?>"  id="fsportsfee" title="Sports Board Fee" autocomplete="off" type="text" 
   name="fsportsfee" class="form-control input_no" placeholder="Sports Board Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>

<div id="randomDiv" class="col-md-6 form-group">
   <label id="randomlabel" for="unit">Changing Label</label>
      
   <input maxlength="5" value="<?php echo $fee;?>"  id="fcatfee" title="Some Fee" autocomplete="off" type="text" 
   name="somefee" class="form-control input_no" placeholder="Some Fee" 
   onkeypress="return isno(event)" onkeyup="sum();"/>

    
</div>
 
 <div  class="col-md-6 form-group">
     <label for="title">Total:</label>
   <input   value="<?php echo $total;?>"  id="total" title="Total Fee" autocomplete="off" type="text" 
   name="ftotal" class="form-control" readonly placeholder="Total Fee" />

    
</div>





   <script type="text/javascript">

// function sum(){

//   var totals = 0;
  
//   $(".input_no").each(function(){

//     var no = $(this).val() || 0;
//     totals+=parseInt(no);
 
//   });


//   $('#total').val(totals-1);

// }

  function sum() {
            var admission = document.getElementById('fadmission').value ||  0;
            var course = document.getElementById('fcourse').value ||  0;
	    var library = document.getElementById('flibrary').value ||  0;
	    var union = document.getElementById('funion').value ||  0;
	       var studentaidfund = document.getElementById('fstudentaidfund').value ||  0;
	       var development = document.getElementById('fdevelopment').value ||  0;
	       var internet = document.getElementById('finternet').value ||  0;
         var hostel = document.getElementById('fhostel').value ||  0;
	       var laboratory = document.getElementById('flaboratory').value ||  0;
	       var safetyip = document.getElementById('fsafetyip').value ||  0;
	        var sportsfee = document.getElementById('fsportsfee').value ||  0;
		  var fcatfee = document.getElementById('fcatfee').value ||  0;
            var result = parseInt(admission) + parseInt(course) + parseInt(library)
	    + parseInt(union) + parseInt(studentaidfund) + parseInt(development) +
	    parseInt(internet) +parseInt(hostel)+ parseInt(laboratory) + parseInt(safetyip) + parseInt(sportsfee) + parseInt(fcatfee) ;
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
 
 