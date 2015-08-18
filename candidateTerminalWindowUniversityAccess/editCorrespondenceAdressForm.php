<?php ob_start(); 
//session_set_cookie_params(1200);
session_start(); //require("configLogin.php");
require("../includes/auto_connect.php");
require("../includes/config.php");
$myname = $_SESSION['username'];

try{ 
        if($_SESSION['logged_in']){
            
            $query1 = mysql_query("select * from student_details where student_id = '$myname'");
           
            while($rows = mysql_fetch_array($query1))
            {

                
                $guardianname = $rows['guardian_name'];
                
                $guardian_occupation = $rows['guardian_occupation'];
                $guardian_address =$rows['guardian_address'];
                $guardian_pincode = $rows['guardian_pincode'];
                $corr_address = $rows['corr_address'];
                $corr_pincode = $rows['corr_pincode'];
                $corr_phone_no = $rows['corr_phone_no'];
                $corr_nationality = $rows['corr_nationality'];
                $marital_status = $rows['marital_status'];
                $blood_group = $rows['blood_group'];
                $category = $rows['category'];
                $reside = $rows['reside'];
                $employment_status = $rows['employment_status'];
                $depution_status = $rows['depution_status'];
                $depution_org = $rows['depution_org'];
                $last_uni_name = $rows['last_uni_name'];
                $last_uni_regno = $rows['last_uni_regno'];
                $board_10 = $rows['board_10'];
                $board_10_roll = $rows['board_10_roll'] ;
                $board_10_yop = $rows['board_10_yop'];
                $board_10_div = $rows['board_10_div'];
                $board_10_percent = $rows['board_10_percent'];
                $board_10_sub  = $rows['board_10_sub'];
                $board10_2 = $rows['board10_2'];
                $board10_2_roll = $rows['board10_2_roll'];
                $board10_2_yop = $rows['board10_2_yop'];
                $board10_2_div = $rows['board10_2_div'];
                $board10_2_percent = $rows['board10_2_percent'];
                $board10_2_sub = $rows['board10_2_sub'];
                $board10_2_3 = $rows['board10_2_3'];
                $board10_2_3_roll = $rows['board10_2_3_roll'];
                $board10_2_3_yop = $rows['board10_2_3_yop'];
                $board10_2_3_div = $rows['board10_2_3_div'];
                $board10_2_3_percent = $rows['board10_2_3_percent'];
                $board10_2_3_sub = $rows['board10_2_3_sub'];
                $examextra = $rows['examextra'];
                $boardexamextra = $rows['boardexamextra'];
                $rollexamextra = $rows['rollexamextra'];
                $yopexamextra = $rows['yopexamextra'];
                $divexamextra = $rows['divexamextra'];
                $percentexamextra = $rows['percentexamextra'];
                $subexamextra = $rows['subexamextra'];
                $distinction_medals_prize = $rows['distinction_medals_prize'];
                $extra_curricular = $rows['extra_curricular'];
                $physically_handicapped = $rows['physically_handicapped'];
                $undergoing_course = $rows['undergoing_course'];
                $undergoing_course_details = $rows['undergoing_course_details'];
    

}
}
}
catch(Exception $e)
  {
  echo "error";
  }
?>
<script type="text/javascript"> 
    function validateCorrespondenceEditform()
    {
        
        var correspondenceAddress,correspondencepin,correspondencephone = true;
        correspondenceAddress = $("#correspondenceAddress").val();

        correspondencepin = $("#correspondencepin").val();
      
        correspondencephone = $("#correspondencephone").val();
        
        if(($.trim(correspondenceAddress) == '')||($.trim(correspondenceAddress) == 'Not Available'))
        {
            $("#correspondenceAddress").focus();
            $("#correspondenceAddresserror").show();
           
        }
        else
        {
            if(($.trim(correspondencepin) == '')||($.trim(correspondencepin) == 'Not Available'))
            {
                $("#correspondencepin").focus();
                $("#correspondencepinerror").show();
                $("#correspondenceAddresserror").hide();
            }
            else
            {
                if(($.trim(correspondencephone) == '')||($.trim(correspondencephone) == 'Not Available'))
                {
                    $("#correspondencephone").focus();
                    $("#correspondencephoneerror").show();
                    $("#correspondencepinerror").hide();
                     $("#correspondenceAddresserror").hide();
                }
                else
                {
                   
                       $("#editcorrespondenceform").submit();
                }
            }
        }
    }
</script>
<form method="post" action="<?php echo $bases;?>actions/processCorrespondenceEditProfile.php" id="editcorrespondenceform" name="editcorrespondenceform">
                <div class="span9">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">    
                        <div class="toolbar clear clearfix">
                            <div class="centre">                                
                                <button type="button" class="btn btn-small btn-warning tip" onclick="showCorrespondence()">Edit Address for correspondence<span class="icon-ok icon-white"></span></button>                                
                            </div>
                        </div>

                    <div id="correspondencehide" style="display:none">
                    <div class="toolbar clear clearfix">
                            <div class="right">                                
                                <button type="button" class="btn btn-small btn-warning tip" onclick="closeCorrespondence()">Close<span class="icon-ok icon-white"></span></button>                                
                            </div>
                        </div>
                        <div class="toolbar clearfix">
                                <div class="left">
                                  <pre>Address for correspondence</pre>
                                </div>
                                
                        </div>  


                        <?php
                        
                        $defaultstr = "Not Available";
                        if(($corr_address == '')||(empty($corr_address))|| (is_null($corr_address))||($corr_address == '0')||($corr_address == '0.00')||($corr_address == 'Not Available'))
                        { ?>
                            <div class="row-form clearfix"> 
                                 
                                <div class="span3">Address</div>
                                <div class="span9"><textarea id="correspondenceAddress" name="correspondenceAddress"   ><?php echo $defaultstr;?></textarea><span style="display:none" id="correspondenceAddresserror" class="required">This is required</span></div>
                            </div> 
                        <?php }
                        else
                        { ?>
                             <div class="row-form clearfix"> 
                                 
                                <div class="span3">Address</div>
                                <div class="span9"><textarea id="correspondenceAddress" name="correspondenceAddress"   ><?php echo $corr_address; ?></textarea><span style="display:none" id="correspondenceAddresserror" class="required">This is required</span></div>
                            </div>
                        <?php }
                        if(($corr_pincode == '')||(empty($corr_pincode))|| (is_null($corr_pincode))||($corr_pincode == '0')||($corr_pincode == '0.00')||($corr_pincode == 'Not Available'))
                        { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Pin</div>
                                <div class="span9"><input type="text" id="correspondencepin" name="correspondencepin" value="<?php echo $defaultstr; ?>"  /><span style="display:none" id="correspondencepinerror" class="required">This is required</span></div>
                            </div>   
                        <?php }
                        else
                        { ?>

                             <div class="row-form clearfix">
                                <div class="span3">Pin</div>
                                <div class="span9"><input type="text" id="correspondencepin" name="correspondencepin" value="<?php echo $corr_pincode; ?>"  /><span style="display:none" id="correspondencepinerror" class="required">This is required</span></div>
                            </div>  
                        <?php }
                        if(($corr_phone_no == '')||(empty($corr_phone_no))|| (is_null($corr_phone_no))||($corr_phone_no == '0')||($corr_phone_no == '0.00')||($corr_phone_no == 'Not Available'))
                        {?>
                            <div class="row-form clearfix">
                                <div class="span3">Phone no</div>
                                <div class="span9"><input type="text" id="correspondencephone" name="correspondencephone" value="<?php echo $defaultstr; ?>" /><span style="display:none" id="correspondencephoneerror" class="required">This is required</span></div>
                            </div>
                        <?php }
                        else
                        { ?>

                            <div class="row-form clearfix">
                                <div class="span3">Phone no</div>
                                <div class="span9"><input type="text" id="correspondencephone" name="correspondencephone" value="<?php echo $corr_phone_no; ?>" /><span style="display:none" id="correspondencephoneerror" class="required">This is required</span></div>
                            </div>
                        <?php }
                        ?>
                        <div class="toolbar clearfix">
                            <div class="left">
                                                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                        <button type="button" class="btn btn-small btn-warning tip" title="Quick save" onclick="return validateCorrespondenceEditform()">Save</button>
                                    
                                    
                                </div>
                            </div>
                        </div>   

                    </div> 
                    </div>
                    </div>
                    </div>
                </form> 