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

function getCategoryName($str){

$q=mysql_query("select caste_name from caste where id='$str'");
if(mysql_num_rows($q)){
while($rows=mysql_fetch_array($q)){
    $caste_name = $rows['caste_name'];
}
}

return $caste_name;

}
?>
<form method="post" action="<?php echo $bases;?>actions/processPersonalEditProfile.php" id="editform" name="editform">
                    <div class="span10">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">  
                        <div class="toolbar clear clearfix">
                        <div class="centre">                                
                            <button type="button" class="btn btn-small btn-warning tip" onclick="showPersonal()">View Personal details<span class="icon-ok icon-white"></span></button>                                
                        </div>
                        </div>
                        <div id="personalhide" style="display:none">

                        <div class="toolbar clear clearfix">
                        <div class="right">                                
                            <button type="button" class="btn btn-small btn-warning tip" onclick="closePersonal()">Close<span class="icon-ok icon-white"></span></button>                                
                        </div>
                        </div>
                        <?php
                        
                        $defaultstr = "Not Available";
                        if(($corr_nationality == '')||(empty($corr_nationality))|| (is_null($corr_nationality))||($corr_nationality == '0')||($corr_nationality == '0.00')||($corr_nationality == 'Not Available'))
                        { ?>
                             <div class="row-form clearfix">
                                <div class="span3">Nationality</div>
                                <div class="span9"><input type="text" id="nationality" name="nationality" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>
                        <?php }
                        else
                        { ?>
                             <div class="row-form clearfix">
                                <div class="span3">Nationality</div>
                                <div class="span9"><input type="text" id="nationality" name="nationality" value="<?php echo $corr_nationality; ?>"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>

                        <?php }
                        if(($category == '')||(empty($category))|| (is_null($category))||($category == '0') ||($category == 0) ||($category == '0.00')||($category == 'Not Available'))
                        { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Category</div>
                                <div class="span9"><input type="text" id="caste" name="caste" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>
                        <?php }
                        else
                        { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Category</div>
                                <div class="span9"><input type="text" id="caste" name="caste" value="<?php echo getCategoryName($category); ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>

                       <?php } 
                       if(($blood_group == '')||(empty($blood_group))|| (is_null($blood_group))||($blood_group == '0')||($blood_group == '0.00')||($blood_group == 'Not Available'))
                       { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Blood Group</div>
                                <div class="span9"><input type="text" id="bgrp" name="bgrp" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div> 
                       <?php }
                       else
                       { ?>
                           <div class="row-form clearfix">
                                <div class="span3">Blood Group</div>
                                <div class="span9"><input type="text" id="bgrp" name="bgrp" value="<?php echo $blood_group; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>  
                       <?php }
                       if(($marital_status == '')||(empty($marital_status))|| (is_null($marital_status))||($marital_status == '0')||($marital_status == '0.00')||($marital_status == 'Not Available'))
                        {?>
                            <div class="row-form clearfix">
                                <div class="span3">Marital Status</div>
                                <div class="span9"><input type="text" id="marital" name="marital" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>
                    <?php }
                    else
                    { ?>
                        <div class="row-form clearfix">
                                <div class="span3">Marital Status</div>
                                <div class="span9"><input type="text" id="marital" name="marital" value="<?php echo $marital_status; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div> 

                    <?php }
                    if(($reside == '')||(empty($reside))|| (is_null($reside))||($reside == '0')||($reside == '0.00')||($reside == 'Not Available'))
                    { ?>

                        <div class="row-form clearfix">
                                <div class="span3">Where to reside?</div>
                                <div class="span9"><input type="text" id="reside" name="reside" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div> 
                    <?php }
                    else
                    { ?>
                        <div class="row-form clearfix">
                                <div class="span3">Where to reside?</div>
                                <div class="span9"><input type="text" id="reside" name="reside" value="<?php echo $reside; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div> 

                    <?php }
                    if(($employment_status == '')||(empty($employment_status))|| (is_null($employment_status))||($employment_status == '0')||($employment_status == '0.00')||($employment_status == 'Not Available'))
                    { ?>
                        <div class="row-form clearfix">
                                <div class="span3">Are you employed?</div>
                                <div class="span9"><input type="text" id="employment" name="employment" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div> 

                    <?php }
                    else
                    { ?>

                        <div class="row-form clearfix">
                                <div class="span3">Are you employed?</div>
                                <div class="span9"><input type="text" id="employment" name="employment" value="<?php echo $employment_status; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>
                    <?php }
                    if( $depution_status == 'yes')
                    { ?>
                        <div class="row-form clearfix">
                                <div class="span3">Are you on depution?</div>
                                <div class="span9"><input type="text" id="depution" name="depution" value="<?php echo $depution_status; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div> 
                            <div class="row-form clearfix">
                                <div class="span3">Depution Institute</div>
                                <div class="span9"><input type="text" id="depution_inst" name="depution_inst" value="<?php echo $depution_org; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>
                    <?php }
                    else
                   
                    { ?>
                        <div class="row-form clearfix">
                                <div class="span3">Are you on depution?</div>
                                <div class="span9"><input type="text" id="depution" name="depution" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div> 
                            
                    <?php }
                
                    if(($physically_handicapped == '')||(empty($physically_handicapped))|| (is_null($physically_handicapped))||($physically_handicapped == '0')||($physically_handicapped == '0.00')||($physically_handicapped == 'Not Available'))
                    { ?>
                        <div class="row-form clearfix">
                                <div class="span3">Physically handicapped?</div>
                                <div class="span9"><input type="text" id="handicap" name="handicap" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>
                    <?php }
                    else
                        {
                            if ($physically_handicapped == 0) { ?>
                        <div class="row-form clearfix">
                                <div class="span3">Physically handicapped?</div>
                                <div class="span9"><input type="text" id="handicap" name="handicap" value="<?php echo 'No'; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                            </div>
                   <?php }

                           else { ?>
                               <div class="row-form clearfix">
                                        <div class="span3">Physically handicapped?</div>
                                        <div class="span9"><input type="text" id="handicap" name="handicap" value="<?php echo $physically_handicapped; ?>" readonly="true"/><span style="display:none" id="error13" class="required">This is required</span></div>
                                    </div>
                           <?php } 
                        } ?>
                    
                        
                        
                        
                       
                        </div>
                        </div>
                        </div>
                    </form>