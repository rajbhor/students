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

 
  