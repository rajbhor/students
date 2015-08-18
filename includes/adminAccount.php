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

<link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demopage.css">
     <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demotable.css"> 
     
    <script type="text/javascript" language="javascript" src="<?php echo $base;?>js/dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
          var oTable=$('#example').dataTable({ "aLengthMenu": [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ], 


"iDisplayLength" : -1 });
         
    
  oTable.fnSort( [ [0,'asc'] ] );
      } );
    </script>


    <div class="page-head">
      <h3 title="Manage Administrator Account" class="label label-success" style="font-size:19px">
        <?php if($type=='admin'){?><i class="fa  fa-lock"></i> Administrator Account</h3>
        <?php } else {?>
<i class="fa  fa-lock"></i> Department User Account</h3>
<?php } ?>
      </div> 

      <br/><br/> 

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" style="font-family:Segoe UI; font-weight:bold">
  <thead>
    <tr>
     <th align="center" style="color:green">Name</th>
      
      <th align="center" style="color:green">Username</th>
      <th align="center" style="color:green">Password</th>
      <th align="center" style="color:green">Last Login IP and Time</th>
      <th align="center" style="color:green">Current Status</th>
      <th align="center" style="color:green">Action</th>

    </tr>
  </thead>

 
  <tr>
<td style="color:darkblue" align="center"><?php echo $adname;?></td>
 
<td style="color:darkblue" align="center"><?php echo $adunm;?></td>
 
<td style="color:#FF8C00" align="center"><?php echo $adpwd;?></td>
 
<td style="color:#8B0000" align="center"><?php echo $adip;?> <small style='font-size:10px'><?php echo $adtime;?></td>

 
<?php if($adlogged=='yes'){?>
<td  style="color:green" align="center"><?php echo "Available";?></td>
<?php } else {?>

<td  style="color:red" align="center"><?php echo "Offline";?></td>

<?php } ?>



<td>
   <a href="#editers" data-toggle="modal" title="Change Account Info"><i class="fa fa-pencil"></i> Change</a>
</td>

  </tr>
</table>
<hr/>
 
</div>
</div>


   
</body>
</html>
<div   id="editers"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                   

<?php if($type=='admin'){?>
                                                    <h5 id="myModalLabel" class="modal-title">Change Administrator Account </h5>
                                               
<?php } else {?>
   <h5 id="myModalLabel" class="modal-title">Change User Account </h5>
                                               
                                               <?php } ?>
                                                </div>
                                                  

                                                <div class="modal-body">

 
<form action="<?php echo $base;?>actions/changeAdminInfo.php?id=<?php echo $adid;?>" method="post">

 <script>
$(document).ready(function()
 {
    
   
  $("#unm").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var unm=$("#unm").val();
   var id="<?php echo $adid;?>";
    
    
  if($.trim(unm)!=''){  
  var dataString = {'unm':$.trim(unm),'id':id};
    $.ajax({
            url: '<?php echo $base;?>includes/check_admin_username_update.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
           
          $("#unm").val('<?php echo $adunm;?>');

 $("#error").show();
  $("#error").fadeOut(3000);




            
         
          }
           
                 

          }
           });
    
    
    }
});
 
});
</script>
 

    

<div class="col-md-6 form-group">
    <label><strong>Username</strong></label>
         <input required maxlength="20" pattern=".{5,}" value="<?php echo $adunm;?>" placeholder="Username" title="Enter username(5 characters minimum)" id="unm"  
         onkeypress="return no(event);"   autocomplete="off"  type="text" class="form-control"  name="unm"   
         onBlur="this.trim()" style="width:">
     <span id="error" class="label label-danger" style='display:none; color:white'>Username already exists. Please try another.</span>
</div>
<span class="clearfix">


<div class="col-md-6 form-group">
    <label style="margin-left:-5px"><strong>Password</strong></label>
 <input required   pattern=".{5,}" value="<?php echo $adpwd;?>" placeholder="Password" title="Enter Password(5 characters minimum)" 
 id="pwd"  onkeypress="return no(event);"  autocomplete="off" class="form-control"  type="text" name="pwd"   onBlur="this.trim()" style="width:">
</div>

<span class="clearfix">

      <div class="col-md-6 form-group">
    <label><strong>Name</strong></label>
         <input   maxlength="70"   value="<?php echo $adnames;?>" placeholder="Your name" title="Enter name" id="nm"  
            autocomplete="off"  type="text" class="form-control"  name="nm"   
         onBlur="this.trim()" style="width:">
     
</div>
      
 
   <div class="col-md-6 form-group">
     
     
</div>
    
                
    

   
     <?php  function br($no){

      for($i=1;$i<=$no;$i++){

        echo "<br/>";
      }
     }

     echo br(5);?>
  <input type="submit" class="btn btn-success" value="Save Changes">
<input type="reset" class="btn btn-danger" value="Cancel">
 

 
  </form>


                                                </div>
  <div class="modal-footer" style="display:">
  <small style="color:darkgrey; font-weight:bold; font-size:11px">
        <?php echo $learn;?></small> 
      </div>
                                            </div>
                                        </div>
                                    </div>

















</div>