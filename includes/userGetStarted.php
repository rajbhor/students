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
             
          <form name="course" class="form-horizontal" action="<?php echo $base;?>actions/saveUser.php" method="post">
       
                                    <fieldset>
                                     <legend> <i class="fa fa-plus"></i> New User &raquo;
                                         <small style="color:darkgrey; font-weight:bold; font-size:11px"> 
                                          Use the below panel to add a new department operator</small></legend>

                                         <div class="form-group" id="assign">
                                            <label class="col-lg-2 control-label" style="color:red; font-weight:bold" for="select02">Assign User to</label>
<script type="text/javascript" charset="utf-8">
     function check(){
 
      
           
           var ln= $('[name="assignee"]:checked').length;
          // alert(ln);
            if(ln==0){
 
alert("You need to choose atleast one assignee type to proceed");

 return false;


            }
          }

       
    </script>
    <script type="text/javascript">

$(document).ready(function(){

 $("#deptAssignee").click(function()
{

$("#department").show();
$("select#dept").prop('disabled',false);
$("#dflag").prop('disabled',false);
$("#cflag").prop('disabled',true);
 
$("select#center").prop('disabled',true);
$("#centers").hide();

});

 $("#centerAssignee").click(function()
{

$("#centers").show();
$("select#center").prop('disabled',false);
$("#cflag").prop('disabled',false);
$("#dflag").prop('disabled',true);
 
$("select#dept").prop('disabled',true);
$("#department").hide();

});

});

function resetForm(){


$("#department").hide();
$("#centers").hide();

$("#dept").prop('disabled',true);
$("#dflag").prop('disabled',true);
$("#cflag").prop('disabled',true);
$("#center").prop('disabled',true);
$("#center").prop('disabled',true);
$("#cflag").prop('disabled',true);
$("#dflag").prop('disabled',true);
$("#dept").prop('disabled',true);
 
}
    </script>


<script>
$(document).ready(function()
 {
    
   
  $("#uname").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var uname=$.trim($("#uname").val());
   if(uname.length<5 && uname!=''){

$("#errorlength").show();
$("#uname").val('');
 
          $("#errorlength").fadeOut(3000);
   }
   else {
    
     if(uname!='') {
  var dataString = {'uname':uname};
    $.ajax({
            url: '<?php echo $base;?>includes/check_user_name.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
          $("#error").show();
          $("#error").fadeOut(3000);
          $("#uname").val('');
          
         
          }
           
                 

          }
           });

  }

}
    
    
    
});
 
});
</script>



<script>
$(document).ready(function()
 {
    
   
  $("#pwd").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var pwd=$.trim($("#pwd").val());
   if(pwd.length<5 && pwd!=''){

$("#errorlengthpwd").show();
$("#pwd").val('');
 $("#errorlengthpwd").fadeOut(3000);
   }
   
});
 
});
</script>


                                            <div class="col-lg-10" >
                                              <label title="Assign user to a center" for="centerAssignee">
<input type="radio" class="checker" name="assignee" id="centerAssignee"> Center</label> &nbsp; &middot; &nbsp;
<label title="Assign user to a department" for="deptAssignee">
<input type="radio" class="checker" name="assignee" id="deptAssignee"> Department</label>


                                             </div>

                                             </div> 
                                         <div class="form-group" id="department" style="display:none">
                                            <label class="col-lg-2 control-label" for="select02" style="color:red; font-weight:bold">Department</label>

                                            <div class="col-lg-5" >
                                               <input type="hidden" value="dept" name="flag" id="dflag" disabled>
                                                    <select disabled title="Select a department to assign" required name="dept" id ="dept" class="form-control" >
                                        <option value="">---Select Department---</option>
                                        <?php 
										
										$select= mysql_query("select * from department order by dept_code desc");
										if(mysql_num_rows($select)>0)
										{
										   while($rows=mysql_fetch_array($select))
											  {	
											  		
										?>
                                      <option value="<?php echo $rows['dept_code']; ?>"><?php echo $rows['dept_name']; ?></option>
                                      <?php 
									  		   }
										}
									  ?>
                                        </select>
                                            </div>
                                        </div>

 <div class="form-group" id="centers" style="display:none">
                                            <label style="color:red; font-weight:bold" class="col-lg-2 control-label" for="select02">Center</label>

                                            <div class="col-lg-5" >
                                              <input type="hidden" value="center" name="flag" id="cflag" disabled>  
                                                    <select disabled title="Select a center to assign" style="color:black" required name="dept" id ="center" 
                                                    class="form-control" >
                                        <option value="">---Select Center---</option>
                                        <?php 
                    
                    $selects= mysql_query("select * from center order by center_code desc");
                    if(mysql_num_rows($selects)>0)
                    {
                       while($rowss=mysql_fetch_array($selects))
                        { 
                            
                    ?>
                                      <option value="<?php echo $rowss['center_code']; ?>"><?php echo $rowss['center_name']; ?></option>
                                      <?php 
                           }
                    }
                    ?>
                                        </select>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:red; font-weight:bold" for="focusedInput">Operator Name</label>
                                            <div class="col-lg-5">
                                                <input maxlength="50" autocomplete="off"
                                                       title="Please provide a operator name"
                                                       required class="form-control" 
                                                id="opname" type="text" name="opname" >
                                            </div>
                                              <span id="error" class="label label-danger" style="display:none"> Username already exists. Please try another.</span>
                                       

                                        <span id="errorlength" class="label label-warning" style="display:none"> 
                                          Username must be atleast 5 characters in length.</span>
                                       
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:red; font-weight:bold" for="focusedInput">Username</label>
                                            <div class="col-lg-5">
                                                <input maxlength="20" autocomplete="off" title="Please provide a username" required class="form-control" 
                                                id="uname" type="text" name="uname" >
                                            </div>
                                              <span id="error" class="label label-danger" style="display:none"> Username already exists. Please try another.</span>
                                       

                                        <span id="errorlength" class="label label-warning" style="display:none"> 
                                          Username must be atleast 5 characters in length.</span>
                                       
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:red; font-weight:bold" for="focusedInput">Password</label>
                                            <div class="col-lg-5">
                                                <input maxlength="20" autocomplete="off" title="Please provide a password" required type="password" class="form-control" id="pwd"   name="pwd" >
                                            </div>

                                            <span id="errorlengthpwd" class="label label-warning" style="display:none"> 
                                              Password must be atleast 5 characters in length.</span>
                                       
                                        </div>
                                        
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label" for="focusedInput"></label>
                                            <div class="col-lg-10">
                                   <button onclick="return check()" type="submit" class="btn btn-primary">Add User </button>
                                        <button onclick="resetForm()" type="reset" class="btn btn-default">Cancel</button>

                                         <small style="color:darkgrey; font-weight:bold; font-size:11px">
           <?php echo $learn;?></small>
         </form>
                                      
                                        </div>
                                        </div>
                                    </fieldset>
                                  


  <br/>
<?php  

$cl=mysql_query("select * from g_users where user_type<>'admin' order by user_id desc");


 $num=mysql_num_rows($cl); //echo $num;?>

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
<?php if($num>=1){ $i=1;?>

    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" style="font-family:Segoe UI; font-weight:bold">
  <thead>
    <tr>
      <th style="color:green">#</th>
      <th style="color:green">Department/Center</th>
      <th style="color:green;">Name</th>
      <th style="color:green">Username</th>
      <th style="color:green">Password</th>
      <th style="color:green">Last Login IP and Time</th>
      <th style="color:green">Status</th>
      <th style="color:green">Action</th>

    </tr>
  </thead>

<?php while($r=mysql_fetch_array($cl)){?>
  <tr>

<td style="color:#3b5999" align="center"><?php echo $i;?></td>
<td style="color:#3b5999"  ><?php echo getDepartmentCenter($r['dept_code'],$r['branch_type']);?></td>

<?php  

if($r['status']=='N'){?>
<td  style="color:red;" align="center"><?php if($r['op_name']!='' || !empty($r['op_name'])) { echo $r['op_name']; } else {?> <span title="This information is currently not available" class="label label-danger">N/A</span><?php } ?></td>

<td style="color:red" align="center"><?php echo $r['user_name'];?></td>

<?php } else {?>
<td style="color:green" align="center" ><?php if($r['op_name']!='' || !empty($r['op_name'])) { echo $r['op_name']; } else {?> <span title="This information is currently not available" class="label label-success">N/A</span><?php } ?></td>
<td style="color:green" align="center"><?php echo $r['user_name'];?></td>

<?php } ?>
 
<td style="color:#FF8C00" align="center"><?php echo $r['password'];?></td>
<?php if($r['user_login_ip']!=NULL && ($r['login_time']!=NULL || $r['login_time']!='') ){?>
<td style="color:#8B0000" align="center"><?php echo $r['user_login_ip'];?> 
  <br/>
  <small style='font-size:10px' class="label label-primary"><?php echo $r['login_time'];?></td>
<?php } else { ?>
<td style="color:#3b5999" align="center"><span class="label label-warning">Never Logged In</span></td>
<?php } ?>
<?php if($r['user_logged_in']=='yes'){?>
<td  style="color:green" align="center"><?php echo "Available";?></td>
<?php } else {?>
<td  style="color:red" align="center"><?php echo "Offline";?></td>
<?php } ?>
<td>

  <?php $ud=$r['user_id'];

  $ck=mysql_query("select created_by_id from student_details where created_by_id=$ud");
  //echo "select created_by_id from student_details where user_id=$ud";

  if(($r['user_logged_in']=='no' || $r['user_logged_in']==NULL) && $r['status']=="A" && mysql_num_rows($ck)==0){ //offline and enabled?>
<a onClick = "javascript: if (!window.confirm ('Are You Sure to disable this operator?')) return false;" style='color:red' 
title="Disable operator"   href="<?php echo $base;?>/actions/operatorDeactivate.php?opid=<?php echo $r['user_id'];?>">Disable</a> 

 <br/>
<a onClick = "javascript: if (!window.confirm ('Are You Sure to delete this operator permanently?')) return false;" 
title="Delete operator"   href="<?php echo $base;?>actions/operatorTrash.php?opid=<?php echo $r['user_id'];?>">
<i class=" fa fa-trash-o"></i></a> 
 
 

 

 <div   id="edit_<?php echo $r['user_id'];?>"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title">

                                                    Edit Operator &raquo; <?php echo $r['user_name'];?> &raquo;
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> Change operator information here</small></h5>
                                                

                                                </div>
                                                  
                                                <div class="modal-body">
<form action="<?php echo $base;?>actions/editOperator.php?opid=<?php echo base64_encode($r['user_id']);?>" method="post">
 <script>
$(document).ready(function()
 {
    
   
  $("#unm_<?php echo $r['user_id'];?>").blur(function(e)
{
  
  
  e.preventDefault(); 
  
   var unm=$("#unm_<?php echo $r['user_id'];?>").val();
   var id="<?php echo $r['user_id'];?>";
    
    
  if($.trim(unm)!=''){  
  var dataString = {'unm':$.trim(unm),'id':id};
    $.ajax({
            url: '<?php echo $base;?>includes/check_operator_username_update.php',
            type: 'POST',
            dataType: 'json',
            data: dataString,
            success: function(data)
            {
            if(data.message=="Problem"){ //succ
          
           
          $("#unm_<?php echo $r['user_id'];?>").val("<?php echo $r['user_name'];?>");

$("#error_<?php echo $r['user_id'];?>").show();
$("#error_<?php echo $r['user_id'];?>").fadeOut(3000);


            
         
          }
           
                 

          }
           });
    
    
    }
});
 
});
</script>
 

      
  
<span class="clearfix"> 
      
 
        <div class="col-md-6 form-group">
    <label style="color:red" for="author"><strong>Username:</strong></label>
  <input class="form-control" maxlength="20" value="<?php echo $r['user_name'];?>" 
  placeholder="Username" title="Enter username (5 characters minimum)" id="unm_<?php echo $r['user_id'];?>"  
  onkeypress="return no(event);" pattern=".{5,}"  autocomplete="off"  type="text"  name="unm_<?php echo $r['user_id'];?>"   
  onBlur="this.trim()">
  <span class="label label-danger" id="error_<?php echo $r['user_id'];?>" style="display:none">Username already exist. Please try another</span>
     
    </div>
    
<div class="col-md-6 form-group">
    <label  style="color:red" for="author"><strong>Password:</strong></label>
  <input class="form-control" pattern=".{5,}" maxlength="20"  value="<?php echo $r['password'];?>" 
  placeholder="Password" title="Enter Password (5 characters minimum)" 
 id="pwd_<?php echo $r['user_id'];?>"  onkeypress="return no(event);"  autocomplete="off"  type="text" 
 name="pwd_<?php echo $r['user_id'];?>"   onBlur="this.trim()" style="width:">
</div>

<span class="clearfix"> 


<div class="col-md-6 form-group">
    <label  style="color:red" for="author"><strong>Operator Name:</strong></label>
  <input class="form-control"  maxlength="70"  value="<?php echo $r['op_name'];?>" 
  placeholder="Logger Name" title="Enter name" 
 id="opname_<?php echo $r['user_id'];?>"     autocomplete="off"  type="text" 
 name="opname_<?php echo $r['user_id'];?>"   onBlur="this.trim()" style="width:">
</div>


<div class="col-md-6 form-group">
     
</div>

<span class="clearfix"> 

<br/><br/>

 
           

  
     
      <br/>
  <input type="submit" class="btn btn-success" value="Save Changes">
<input type="reset" class="btn btn-danger" value="Cancel">
 
</div>
   </form>

 
<div class="modal-footer" style="display:">
                                                    

                                                    <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo $learn;?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

 
<a data-toggle="modal" title="Edit operator"   href="#edit_<?php echo $r['user_id'];?>"><i class=" fa fa-pencil"></i></a>&nbsp;
 

<?php } elseif(($r['user_logged_in']=='no' || $r['user_logged_in']==NULL) && $r['status']=="N" ){ //offline and disabled  ?>

 

<a onClick = "javascript: if (!window.confirm ('Are You Sure to enable this operator?')) return false;" style='color:green' 
title="Enable operator"   href="<?php echo $base;?>actions/operatorActivate.php?opid=<?php echo $r['user_id'];?>">Enable</a> 
 
<a  title="You cannot delete this operator as it is disabled now"><i class="fa fa-warning"></i></a> 

 <a title="You cannot edit this operator as it is now disabled"><i class="fa fa-warning"></i></a> 
  
 <?php } elseif(($r['user_logged_in']=='yes' || $r['user_logged_in']!=NULL) && $r['status']=="A" ){ //online and enabled?>


<a  style='color:black' title="You cannot disable this operator now as it is currently online">Disable</a> 
<br/>
 
<a title="You cannot delete this operator now as it is currently online"  title="Delete operator"><i class=" fa fa-warning"></i></a>&nbsp;
 



<a  title="You cannot edit this operator now as it is currently online"><i class="fa fa-warning"></i></a>&nbsp;



 <?php } ?>
</td>

  </tr>

   
  <?php $i++; } ?>
</table>
<hr/>
<ul>
  <li style="list-style:none">
<strong style="color:green"> GREEN </strong><i>means operator is enabled</i></li>
<li style="list-style:none"><strong style="color:red"> RED </strong><i>means operator is disabled</i></li>
</ul>
<?php }  else { ?>


<div class="alert alert-success" style=""> 
 

  <strong>Oops!!</strong> No results to Display.  
</div>

<?php } ?>

                                  </div>
                                     