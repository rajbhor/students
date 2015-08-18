<?php ob_start(); 
//session_set_cookie_params(1200);
session_start();
//require("configLogin.php");
 
require("../includes/auto_connect.php");
require("../includes/config.php");
if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
     
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
<form method="post" action="<?php echo $bases;?>actions/processEditProfile.php" id="editform" name="editform">
                    <div class="span10">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">
                        <div class="toolbar clear clearfix">
                            <div class="centre">                                
                                <button type="button" class="btn btn-small btn-warning tip"  onclick="showguardianhide()">View Guardian Details<span class="icon-ok icon-white"></span></button>                                
                            </div>
                    </div> 
                     
                    <div id="guardianhide" style="display:none">
                    <div class="toolbar clear clearfix">
                            <div class="right">                                
                                <button type="button" class="btn btn-small btn-warning tip"  onclick="closeguardianhide()">Close<span class="icon-ok icon-white"></span></button>                                
                            </div>
                    </div>
                        <div class="toolbar clearfix">
                                <div class="left">
                                  <pre>Edit Father's/Guardian's(if father is deceased/Expired) Name, Occupation and Address</pre>                         
                                </div>
                                
                        </div>
                        <?php
                        
                        $defaultstr = "Not Available";
                        if(($guardianname == '')||(empty($guardianname))|| (is_null($guardianname))||($guardianname == '0')||($guardianname == '0.00')||($guardianname == 'Not Available'))
                            {?>
                                     <div class="row-form clearfix">
                                    <div class="span3">Name</div>
                                    <div class="span9"><input type="text" id="guardianname" name="guardianname" value="<?php echo $defaultstr;?>" readonly="true"/><span style="display:none" id="error6" class="required">This is required</span></div>
                                    </div>
                        <?php
                            }
                            else
                            {?>
                                <div class="row-form clearfix">
                                    <div class="span3">Name</div>
                                    <div class="span9"><input type="text" id="guardianname" name="guardianname" value="<?php echo $guardianname;?>" readonly="true"/><span style="display:none" id="error6" class="required">This is required</span></div>
                                </div>

                            <?php }
                            if(($guardian_address == '')||(empty($guardian_address))|| (is_null($guardian_address))||($guardian_address == '0')||($guardian_address == '0.00')||($guardian_address == 'Not Available'))
                            {
                                ?>
                                <div class="row-form clearfix"> 
                                 
                                    <div class="span3">Guardian's Address</div>
                                    <div class="span9"><textarea id="gurdainAddress" name="gurdainAddress" readonly="true"><?php echo $defaultstr;?></textarea><span style="display:none" id="error8" class="required">This is required</span></div>
                                </div>
                             <?php } else {?>
                            <div class="row-form clearfix"> 
                                 
                                <div class="span3">Guardian's Address</div>
                                <div class="span9"><textarea id="gurdainAddress" name="gurdainAddress" readonly="true"><?php echo $guardian_address;?></textarea><span style="display:none" id="error8" class="required"></span></div>
                            </div>
                       <?php }
                       if(($guardian_occupation == '')||(empty($guardian_occupation))|| (is_null($guardian_occupation))||($guardian_occupation == '0')||($guardian_occupation == '0.00')||($guardian_occupation == 'Not Available'))
                       {?>
                            <div class="row-form clearfix"> 
                                <div class="span3">Occupation</div>
                                <div class="span9"><input type="text" id="guardianoccupation" name="guardianoccupation" value="<?php echo $defaultstr;?>" readonly="true"/><span style="display:none" id="error7" class="required">This is required</span></div>
                            </div>
                       <?php } else {?>

                            <div class="row-form clearfix">
                                <div class="span3">Occupation</div>
                                <div class="span9"><input type="text" id="guardianoccupation" name="guardianoccupation" value="<?php echo $guardian_occupation;?>" readonly="true"/><span style="display:none" id="error7" class="required">This is required</span></div>
                            </div>

                       <?php } 
                       // elseif(($guardian_occupation != '')&&(!empty($guardian_occupation))&& (!is_null($guardian_occupation))&&($guardian_occupation != '0')&&($guardian_occupation != '0.00')&&($guardian_occupation != 'Not Available'))
                       // {
                       ?>
                          <!--   <div class="row-form clearfix">
                                <div class="span3">Occupation</div>
                                <div class="span9"><input type="text" id="guardianoccupation" name="guardianoccupation" value="<?php echo $guardian_occupation;?>" readonly="true"/><span style="display:none" id="error7" class="required">This is required</span></div>
                            </div> -->
                       <?php // }
                        if(($guardian_pincode == '')||(empty($guardian_pincode))|| (is_null($guardian_pincode))||($guardian_pincode == '0')||($guardian_pincode == '0.00')||($guardian_pincode == 'Not Available')) 
                        {?>
                            <div class="row-form clearfix">
                                <div class="span3">Pin</div>
                                <div class="span9"><input type="text" id="guardianpin" name="guardianpin" value="<?php echo $defaultstr;?>" readonly="true"/><span style="display:none" id="error9" class="required">This is required</span></div>
                            </div>
                        <?php }
                        else
                        {?>
                            <div class="row-form clearfix">
                                <div class="span3">Pin</div>
                                <div class="span9"><input type="text" id="guardianpin" name="guardianpin" value="<?php echo $guardian_pincode;?>" readonly="true"/><span style="display:none" id="error9" class="required">This is required</span></div>
                            </div>
                        <?php } ?>                               
                            
                           
                       
                        <!-- <div class="toolbar clearfix">
                            <div class="left">
                                                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                        <button type="button" class="btn btn-small btn-warning tip" title="Quick save" onclick="return validateEditform()">Save</button>
                                    
                                    
                                </div>
                            </div>
                        </div>        
 -->
                    </div> 
                    </div>
                    </div>
                    </div>
                </form>