<?php ob_start();  
 
//session_set_cookie_params(1200);
session_start();
$myname = $_SESSION['username'];
try{ 
        if($_SESSION['logged_in']){
            

            $query1 = mysql_query("select * from student_details where student_id = '$myname'");
           
            while($rows = mysql_fetch_array($query1))
            {

                
                $sex  = $rows['sex'];
                $student_name = $rows['student_name'];
                $phn_no = $rows['mb_no'];
                $dob = $rows['dob'];
                $father_name = $rows['fathers_name'];
                $mother_name = $rows['mothers_name'];


}
}
}
catch(Exception $e)
  {
  echo "error";
  }
?>
<script type="text/javascript"> 
    function validateEditform()
    {
        var name,phn_no,sex,marital,fathername,mothername,phn_no,email = true;
        name = $("#name").val();
        sex = $("#s2_1").val();
        dob = $("#dob").val();
        fathername = $("#fathername").val();
        mothername = $("#mothername").val();
        phn_no = $("#phn_no").val();
        email = $("#email").val();

        if($.trim(name) == '')
        {
            $("#name").focus();
            $("#nameerror").show();
            $("#phn_noerror").hide();
            $("#email_error").hide();
        }
        else
        {
            if($.trim(phn_no) == '')
            {
                $("#phn_no").focus();
                $("#phn_noerror").show();
                $("#nameerror").hide();
            }
            else
            {
                if(email == '')
                {
                    $("#email").focus();
                    $("#email_error").show();
                    $("#phn_noerror").hide();
                    $("#nameerror").hide();
                }
                else
                {
                    if(sex==0)
                    {
                        $("#s2_1").focus();
                        $("#sexerror").show();
                        $("#email_error").hide();
                        $("#phn_noerror").hide();
                        $("#nameerror").hide();
                    }
                    else
                    {
                        if(dob == '0000-00-00')
                        {
                            $("#dob").focus();
                            $("#doberror").show();
                            $("#sexerror").hide();
                            $("#email_error").hide();
                            $("#phn_noerror").hide();
                            $("#nameerror").hide();
                        }
                        else
                        {
                            if($.trim(fathername)=='')
                            {
                                $("#fathername").focus();
                                $("#fathernameerror").show();
                                $("#doberror").hide();
                                $("#sexerror").hide();
                                $("#email_error").hide();
                                $("#phn_noerror").hide();
                                $("#nameerror").hide();
                            }
                            else
                            {
                                if($.trim(mothername)=='')
                                {
                                    $("#mothername").focus();
                                    $("#mothernameerror").show();
                                    $("#doberror").hide();
                                    $("#sexerror").hide();
                                    $("#email_error").hide();
                                    $("#phn_noerror").hide();
                                    $("#nameerror").hide();
                                    $("#fathernameerror").hide();
                                }
                                else
                                {
                                    $("#editform").submit();
                                }
                                
                            }  
                        }
                        
                    }  
                }
            }
            
              
        }
        
    }
    </script>
<form method="post" action="<?php echo $bases;?>actions/processBasicEditProfile.php" id="editform" name="editform">
                <div class="span9">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">
                            <div class="left">
                                                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                        <button type="button" class="btn btn-small btn-warning tip" title="Quick save" onclick="return validateEditform()">Save</button>
                                    
                                    
                                </div>
                            </div>
                        </div>  
                        <div id="basichide" style="display:block">                      
                        
                        <div class="row-form clearfix">
                            <div class="span3">Name</div>
                            <div class="span9"><input type="text" name="name" id="name" value="<?php echo $student_name; ?>"/><span style="display:none" id="nameerror" class="required">This is required</span></div>
                            
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Phone no:</div>
                            <div class="span9"><input type="text" name="phn_no" id="phn_no" value="<?php echo $phn_no; ?>"/>
                            <span style="display:none" id="phn_noerror" class="required">This is required</span></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?php echo $email_id;   ?>"/>
                            <span style="display:none" id="email_error" class="required">This is required</span>
                            </div>
                        </div>                                                
                        <?php
                        if ($sex == 'Male') { ?>
                            <div class="row-form clearfix">
                                    <div class="span3">Gender:</div>
                                    <div class="span9">
                                        <select name="select" id="s2_1" style="width: 100%;">
                                        <option value="0">choose a option...</option>
                                         <option value="Male" selected="selected">Male</option>
                                          <option value="Female">Female</option>
                                        </select>   
                                    <span style="display:none" id="sexerror" class="required">This is required</span> 
                                </div>
                            </div>
                            
                        <?php }
                        elseif ($sex == 'Female') { ?>
                            <div class="row-form clearfix">
                                    <div class="span3">Gender:</div>
                                    <div class="span9">
                                        <select name="select" id="s2_1" style="width: 100%;">
                                        <option value="0">choose a option...</option>
                                         <option value="Male">Male</option>
                                          <option value="Female" selected="selected">Female</option>
                                        </select>   
                                    <span style="display:none" id="sexerror" class="required">This is required</span> 
                                </div>
                            </div>
                        <?php }
                        else
                        {  ?>
                            <div class="row-form clearfix">
                                <div class="span3">Gender:</div>
                                <div class="span9">
                                    <select name="select" id="s2_1" style="width: 100%;">
                                    <option value="0">choose a option...</option>
                                     <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>   
                                <span style="display:none" id="sexerror" class="required">This is required</span> 
                            </div>
                        </div>

                        <?php } ?>
                                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">Date of Birth</div>
                            <div class="span9"><input type="text" id="dob" name="dob" value="<?php echo $dob; ?>"/><span style="display:none" id="doberror" class="required">This is required</span></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Father's Name</div>
                            <div class="span9"><input type="text" name="fathername" id="fathername" value="<?php echo $father_name; ?>"/>
                            <span style="display:none" id="fathernameerror" class="required">This is required</span></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Mother's Name</div>
                            <div class="span9"><input type="text" name="mothername" id="mothername" value="<?php echo $mother_name; ?>"/>
                            <span style="display:none" id="mothernameerror" class="required">This is required</span></div>
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                        <button type="button" class="btn btn-small btn-warning tip" title="Quick save" onclick="return validateEditform()">Save</button>
                                    
                                    
                                </div>
                            </div>
                        </div>  
                        </div>  
                    </div>
                    </div>
                    </form>