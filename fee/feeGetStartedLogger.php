    <script type="text/javascript">
$(document).ready(function(){

$("#sc").fadeOut(100000);

});

 </script>
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
      <h3   class="label label-success" style="font-size:19px">
        <i class="fa  fa-random"></i> Fee Structure Slab Management &raquo; <small style="color:black;font-size:11px">Use the below panel to Create, Save and Modify Fee Structure Slabs under <?php echo $loggername;?></small></h3>
     
<div id="display"></div>
      </div> 

     

<form name="student" id="student" action="<?php echo $base;?>actions/saveFee.php" method="post">

 
<?php  if($_SESSION['branch_type']=='dept'){
$q=mysql_query("select * from department where dept_code=$deptcode");
$dep=mysql_fetch_array($q);
 
}
else {

$q=mysql_query("select * from center where center_code=$deptcode");
$dep=mysql_fetch_array($q);

}
?>
<script type="text/javascript">

function toggleState(){

	var fcategory=$('#fcategory').val();
	if(fcategory!=''){
	  
	     
		
	  
	  
		$('#course').prop('disabled',false);
		$('#fsem').prop('disabled',false);
		$('#fsession').prop('disabled',false);
		// $('#fsession').prop('readonly',true);
		// $('#fsem').prop('readonly',true);
		// $('#course').prop('readonly',true);
		$('#proceed').prop('disabled',false);

		 
		$('#proceed').prop('title',"Proceed to Fee Structure");


	}
	else {

		$('#course').prop('disabled',true);
		  
		$('#fsem').prop('disabled',true);
		 
		 $('#fsem').prop('disabled',true);
		$('#fsession').prop('disabled',true);
		$('#proceed').prop('disabled',true);

		// 	$('#fsession').prop('readonly',false);
		// $('#fsem').prop('readonly',false);
		// $('#course').prop('readonly',false);

	 
		$('#proceed').prop('title',"You need to select atleast one field above to proceed");

	}
}

function toggleState1(){

	 
}

function resetVal(){


	$('#displayed').hide();
	
$('#proceed').show(); 
	$('#course').prop('disabled',true);
		  
		$('#fsem').prop('disabled',true);
		 
		 $('#fsem').prop('disabled',true);
		 $('input#per_year').prop('checked',false);
		 $('input#per_semester').prop('checked',false);
		 $('#proceed').show();
						            	$('#saveFees').hide();
		$('#fsession').prop('disabled',true);
		$('#proceed').prop('disabled',true);

		$('option:not(:selected)').prop('disabled', false);
		$('#proceed').prop('title',"You need to select atleast one field above to proceed");
	 $(".input_no").each(function(){

		var no = 0;
		total+=parseInt(no);

	});
		$('#total').val('');

}
</script>
      <input type="hidden" class="oki" name="status" id="status" value="1">  <!--for us-->
   <input type="hidden" name="stype" id="stype" value="Old"><!--for us-->
    <input type="hidden" name="creator" id="creator" value="<?php echo $uids;?>"><!--for us-->				    
 <input autocomplete="off" type="hidden" name="depcode" class="form-control" value="<?php echo $deptcode;?>" />
<div class="col-md-6 form-group">
	  <label for="title" >Fee Category :</label> 
						    <select onchange="toggleState()" title="Select a Fee Category" name="fcategory" class="form-control" id="fcategory"  required="true">
						     <option selected value=""> -Select Fee Category-</option>
						     <?php $queryfee=mysql_query("select * from fee_category");
						     while($rowfe=mysql_fetch_array($queryfee)){
						     ?>
						    <option value="<?php echo $rowfe['fee_id']; ?>">
						 <?php echo $rowfe['category_name']; ?>
						    </option>
						   <?php
						     }
						     ?>
	  </select>  
     
</div>
<div class="col-md-6 form-group">
     <?php if($_SESSION['branch_type']=='dept'){?>
    <label for="title" >Department Course:</label> 
						    <select onchange="toggleState1()" disabled  title="Select a department course" name="course" class="form-control" id="course"  required="true">
						    <option value="" selected>--Select Course--</option>
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

						    <select onchange="toggleState1()" disabled title="Select a center course" name="course" class="form-control" id="course"  required="true">
						     <option value="" selected>--Select Course--</option><?php
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
<div style="" class="col-md-6 form-group">
    <label for="author">Semester/Year:</label>
    
 <select   disabled  title="Select semester or year whichever is applicable" name="fsem" class="form-control input_no" id="fsem"  required="true">
						    <?php
						   
						    $query11=mysql_query("select * from semester where id !=15");
						     
						     while($rowdd1=mysql_fetch_array($query11))
							 {
							 ?>
						      
						    <option <?php if($rowdd1['id']==1){ echo "selected";}?> value="<?php echo $rowdd1['id']; ?>">
						    <?php  echo $rowdd1['semester'];?>
						    </option>
						     
						    <?php 
							 } 
						    ?>
						    </select> 



</div>
<span class="clearfix">
     <div class="col-md-6 form-group">
    <label for="title" >Session:</label>
    <select disabled title="Select session" name="fsession" class="form-control" id="fsession"  required="true">
        
       <?php $b=date('Y');
       $c=$b+1;
       $d=$b."-".$c;

       $sess=mysql_query("select * from session");
       
      while($rowse=mysql_fetch_array($sess)){
       ?>
		    <option <?php if($rowse['session']===$d) { echo "selected";}  ?> value="<?php echo $rowse['session_id']; ?>">
		   <?php echo $rowse['session']; ?>
		   </option>
		  
		    <?php } ?>
     </select>
    

</div>
<div id="displayed">
     
     
</div>

 
     <div class="col-md-6 form-group">
   	<br/>
	       <button disabled title="You need to select atleast one field above to proceed" id="proceed" type="button" class="btn btn-success">Proceed</button>
	       <input style="display:none" id="saveFees" class="btn btn-primary" type="submit" value="Save Fee Structure">
	       <button onclick="resetVal()" type="reset" class="btn btn-default">Cancel</button>
	       <span style="display:none" id="ser-load" class="label label-warning"><img style="width:4%;" src="<?php echo $base;?>images/ajax_loader_blue_512.gif"> Loading Fee Structure..Please Wait..</span>
 
     </div>
           
          <small class="pull-left" style="font-size:11px; font-weight:bold; color:darkgrey">If you are not sure about this or want to learn more, contact software provider</small>                               
</div>
				    </form>     
 

<hr/> 
</div> 
  
  </div>  
  </div> 

 
   <div id="ser-load" style="display:none">
     <img src="images/ajax-loader.gif">
	  
     </div>
 <script type="text/javascript">
				$(document).ready(function(){

					$("#proceed").click(function()
					{
					     
			      $('#course').prop('readonly',true);
		                $('#fsem').prop('readonly',true);
		                 $('#fsession').prop('readonly',true);
		                  $('#proceed').prop('readonly',true); 
					     $('#saveFees').hide();
					     var course=$("#course").val(); 
					     var fsem=$("#fsem").val();
					     var fsession=$("#fsession").val();
					     var fcategory=$("#fcategory").val(); 
					     var ser=$("#ser-load");
					     if(course!='' && fsem!='' && fsession!='' && fcategory!=''){
					     	 
					    
     						$.ajax({
						            
							     url:"fee/fetch_status.php?course="+course+"&fsem="+fsem+"&fsession="+fsession+"&fcategory="+fcategory,
						            type: 'POST',
						            dataType: 'html',
						            beforeSend: function() {
								        ser.show();
								      },
						            success: function(data)
						            {
						            
		// 				            $('#fsession').prop('readonly',true);
		// $('#fsem').prop('readonly',true);
		// $('#course').prop('readonly',true);

		$('option:not(:selected)').prop('disabled', true);
						            	$('#saveFees').show();
						            	$('#proceed').hide(); 
						            	$('#displayed').show();
										$("#displayed").html(data);
										ser.hide();
										 


 if($("#fsem").val()==1 || $("#fsem").val()==2 ||  $("#fsem").val()==3 || $("#fsem").val()==4 || $("#fsem").val()==5 || 

$("#fsem").val()==6 ||  

$("#fsem").val()==7 ||


$("#fsem").val()==8 ||
 
$("#fsem").val()==9 || 

$("#fsem").val()==10

 	){

 	 $('input#per_semester').prop('checked',true);
 	$('input#per_year').prop('checked',false);
         
 }

 else {

 $('input#per_year').prop('checked',true);
 $('input#per_semester').prop('checked',false);

 }
 
 	if(fcategory == 1)
		{
		    
		  
		    $("label#randomlabel").text("Sponsored Fee");
	       $('#fcatfee').prop('name', 'spon');
	       $('#fcatfee').prop('title', 'Sponsored Fee');
	       $('#fcatfee').prop('placeholder', 'Sponsored Fee');
		    //alert('Sponsored');
		}
		else if(fcategory == 2)
		{
		     $("label#randomlabel").text("Endowment Fee");
		    $('#fcatfee').prop('name', 'endo');
		     $('#fcatfee').prop('title', 'Endowment Fee');
		      $('#fcatfee').prop('placeholder', 'Endowment Fee');
		    // alert('Endowment');
		}
		else if(fcategory == 4) {
		  $("label#randomlabel").text("Lateral Entry Fee");
		    $('#fcatfee').prop('name', 'lat');
		     $('#fcatfee').prop('title', 'Lateral Entry Fee');
		      $('#fcatfee').prop('placeholder', 'Lateral Entry Fee');   
		}
		
		else {
		     $("div#randomDiv").hide();
		    $('#fcatfee').prop('disabled', true);
		   
		}
 
 
 					            }
						        });
     					}
     					else {

     						alert("Please select all the fields to proceed");
     						$("#course").focus();
     					}
					});
				})
     </script>

     

     