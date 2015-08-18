 <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/jquery.autocomplete.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery.autocomplete.js"></script> 
 <script>
$(document).ready(function(){

   
$("#flabel").autocomplete("<?php echo $base;?>fee/autocomplete_fee_name.php", {
    selectFirst: false
  });

  
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
<div class="page-head">
      <h3 title="Fee Entry Panel" class="label label-default" style="font-size:19px">
        <i class="fa  fa-plus"></i> Fee Master Panel &raquo; <small style="color:black;font-size:12px">Create and save a specific fee-head under <?php echo $loggername;?></small></h3>
     
   
  </div>

     

<form name="student" id="feeFormat" action="<?php echo $base;?>actions/saveFeeMasterParametric.php" method="post">

 

<?php  if($_SESSION['branch_type']=='dept'){
$q=mysql_query("select * from department where dept_code=$deptcode");
$dep=mysql_fetch_array($q);
 
}
else {

$q=mysql_query("select * from center where center_code=$deptcode");
$dep=mysql_fetch_array($q);

}
?>
     <input type="hidden" name="status" id="status" value="1"><!--for us-->
   <input type="hidden" name="stype" id="stype" value="Old"><!--for us-->
    <input type="hidden" name="creator" id="creator" value="<?php echo $uids;?>"><!--for us-->				    
 <input autocomplete="off" type="hidden" name="depcode" class="form-control" value="<?php echo $deptcode;?>" />

 

<script>
$(document).ready(function()
 {
    
   
  $("#flabel").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var flabel=$.trim($("#flabel").val());
    
    if(flabel!=''){
     
  var dataString = {'flabel':flabel};
    $.ajax({
            url: '<?php echo $base;?>fee/check_fee_label.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error").show();
          $("#error").fadeOut(3000);
          $("#flabel").val('');
           $("#flabel").focus();

            
         
          }
           
                 

          }
           });

  }
    
    
    
});
 
});
</script>



<script>
$(document).ready(function()
 {
    
   
  $("#btnSubmit").click(function(e)
{
  
  
  e.preventDefault(); 
  
   var flabel=$.trim($("#flabel").val());
    
    if(flabel!=''){
     
  var dataString = {'flabel':flabel};
    $.ajax({
            url: '<?php echo $base;?>fee/check_fee_label.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error").show();
          $("#error").fadeOut(3000);
          $("#flabel").val('');
           $("#flabel").focus();

            
         
          } else {

            $('#feeFormat').submit();
          }
           
                 

          }

           });

  }
  else {
     $("#flabel").focus();
  }
    
    
    
});
 
});
</script>


 

  
   <br/> 
  <label style="color:red"><strong>Fee Label</strong></label>
    <input style="width:300px" class="form-control" type="text" name="flabel" id="flabel" title="Please enter a desired fee label name here" required>
     
<span style="display:none" class="label label-danger" id="error">Wait!! It seems that this fee label already exists. Please try again with another label name!!</span>
<br/> 
                  
        <button onclick="" id="btnSubmit" title="Create Fee Label and Save" type="button" class="btn btn-primary">Create Fee Label </button>

  <small style="color:darkgrey;font-weight:bold;font-size:12px"><?php echo $learn;?></small>



 

				    </form>     
 

<hr/> 
</div> 
  
  </div>  
  </div> 
 
 
 
