

              <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in"  >
             
          <form name="course" class="form-horizontal" action="saveUser.php" method="post">
         
                                    <fieldset>
                                        <legend>New User</legend>

                                         <div class="form-group" id="assign">
                                            <label class="col-lg-2 control-label" for="select02">Assign User to</label>
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
$("#dept").prop('disabled',false);
$("#dflag").prop('disabled',false);
$("#cflag").prop('disabled',true);
$("#center").prop('disabled',true);
$("#centers").hide();

});

 $("#centerAssignee").click(function()
{

$("#centers").show();
$("#center").prop('disabled',false);
$("#cflag").prop('disabled',false);
$("#dflag").prop('disabled',true);
$("#dept").prop('disabled',true);
$("#department").hide();

});

});
    </script>
                                            <div class="col-lg-10" >
<input type="radio" class="checker" name="assignee" id="centerAssignee"> Center &nbsp; &middot; &nbsp;
<input type="radio" class="checker" name="assignee" id="deptAssignee"> Department


                                             </div>

                                             </div> 
                                         <div class="form-group" id="department" style="display:none">
                                            <label class="col-lg-2 control-label" for="select02">Department</label>

                                            <div class="col-lg-10" >
                                               <input type="hidden" value="dept" name="flag" id="dflag" disabled>
                                                    <select disabled required name="dept" id ="dept" class="selectize-input" >
                                        <option value="">---Select---</option>
                                        <?php 
										
										$select= mysql_query("select * from department");
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
                                            <label class="col-lg-2 control-label" for="select02">Center</label>

                                            <div class="col-lg-10" >
                                              <input type="hidden" value="center" name="flag" id="cflag" disabled>  
                                                    <select style="color:black" disabled required name="dept" id ="center" class="selectize-input" >
                                        <option value="">---Select---</option>
                                        <?php 
                    
                    $selects= mysql_query("select * from center");
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
                                            <label class="col-lg-2 control-label" for="focusedInput">User Name</label>
                                            <div class="col-lg-5">
                                                <input required class="form-control" id="uname" type="text" name="uname" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="focusedInput">Password</label>
                                            <div class="col-lg-5">
                                                <input required type="password" class="form-control" id="pwd"   name="pwd" >
                                            </div>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label" for="focusedInput"></label>
                                            <div class="col-lg-10">
                                   <button onclick="return check()" type="submit" class="btn btn-primary">Save </button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        </div>
                                        </div>
                                    </fieldset>
                                    
                                     <div class="form-group">
                                            <label class="col-lg-2 control-label" for="focusedInput"></label>
                                            <div class="col-lg-10">
                                                                                      
                                                <!--table     --> 
                                                
                                                
                                                 <div class="row">
                            <div class="bootstrap-admin-panel-content">
                                <table class="table table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                             <th>Department</th>
                                           <th>User Name</th>
                                           
                                        </tr>
                                    </thead>
                                     <?php  
									 $select="select * from users inner join department on users.dept_code=department.dept_code";
								$query=mysql_query($select);
									if(mysql_num_rows($query)>0)
									{
									?>
									  <tbody role="alert" aria-live="polite" aria-relevant="all">
									  <?php
									
									 while($rows=mysql_fetch_array($query))
									  {
									  $i=$i+1;
									   ?>
                          
                          			<tr class="odd">
									<td class="  sorting_1"><?php  echo $i;?></td>
									
									<td class=" "><?php echo $rows['dept_name']; ?></td>
                                    <td class=" "><?php  echo $rows['user_name']; ?></td>
                                     
									</tr>
                                <?php }?></tbody>
                                <?php }?>
                                </table>
                            </div>
                        </div>            
                                                
                                                
                                            </div>
                                        </div>
         
                    </form> 
                    </div> 
       