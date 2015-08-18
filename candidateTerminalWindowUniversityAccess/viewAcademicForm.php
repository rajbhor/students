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
<form method="post" action="<?php echo $bases;?>actions/processAcademicEditProfile.php" id="editform" name="editform">
                    <div class="span10">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">
                        <div class="toolbar clear clearfix">
                        <div class="centre">                                
                            <button type="button" class="btn btn-small btn-warning tip" onclick="showAcademic()">View Academic details<span class="icon-ok icon-white"></span></button>                                
                        </div>
                        </div>
                        <div id="academichide" style="display:none">

                        <div class="toolbar clear clearfix">
                        <div class="right">                                
                            <button type="button" class="btn btn-small btn-warning tip" onclick="closeAcademic()">Close<span class="icon-ok icon-white"></span></button>                                
                        </div>
                        </div>
                        <?php
                        
                        $defaultstr = "Not Available";
                        $defstr = "NA";
                        if(($last_uni_name == '')||(empty($last_uni_name))|| (is_null($last_uni_name))||($last_uni_name == '0')||($last_uni_name == '0.00')||($last_uni_name == 'Not Available'))
                        { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Last registered University</div>
                                <div class="span9"><input type="text"  id="lastuniname" name="lastuniname" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="lastunierror" class="required">This is required</span></div>
                            </div>

                        <?php }
                        else
                        { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Last registered University</div>
                                <div class="span9"><input type="text"  id="lastuniname" name="lastuniname" value="<?php echo $last_uni_name; ?>"/><span style="display:none" id="lastunierror" class="required">This is required</span></div>
                            </div> 
                        <?php }
                        if(($last_uni_regno == '')||(empty($last_uni_regno))|| (is_null($last_uni_regno))||($last_uni_regno == '0')||($last_uni_regno == '0.00')||($last_uni_regno == 'Not Available'))
                        { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Last registered University Registration No</div>
                                <div class="span9"><input type="text"  id="lastunireg" name="lastunireg" value="<?php echo $defaultstr; ?>"/><span style="display:none" id="lastuniregerror" class="required">This is required</span></div>
                            </div>
                        <?php }
                        else
                        { ?>
                            <div class="row-form clearfix">
                                <div class="span3">Last registered University Registration No</div>
                                <div class="span9"><input type="text"  id="lastunireg" name="lastunireg" value="<?php echo $last_uni_regno; ?>"/><span style="display:none" id="lastuniregerror" class="required">This is required</span></div>
                            </div>
                        <?php }
                        ?>
                         
                        <div class="toolbar clearfix">
                                <div class="left">
                                  <pre>Educational Qualification starting from H.S.L.C or equivalent:
                                  (Attach attested copies of marksheets and certificates of all examinations)</pre>
                                </div>
                                
                        </div>
                        <div class="row-form clearfix">
                            <table border="1px" width="100%" id="dataTable">
                                <tr>
                                <td>
                                    Examination Passed
                                </td>
                                <td>
                                    Board/Council/University
                                </td>
                                <td>
                                    Roll No
                                </td>
                                <td>
                                    year of passing
                                </td>
                                <td>
                                    Div./Class
                                </td>
                                <td>
                                    Percentage of marks
                                </td>
                                <td>
                                    Subjects taken
                                </td>
                                </tr>

                                <tr>
                                <td>
                                    10th standard
                                </td>
                                <td>
                                    <?php 
                                    if(($board_10 == '')||(empty($board_10))|| (is_null($board_10))||($board_10 == '0')||($board_10 == '0.00')||($board_10 == 'Not Available'))
                                    { ?>
                                        <input type="text" name="board10" id="board10" value="<?php echo $defstr; ?>" readonly="true">
                                    <?php }
                                    else
                                    { ?>
                                        <input type="text" name="board10" id="board10" value="<?php echo $board_10;?>" readonly = "true">
                                    <?php } ?>
                                    
                                </td>
                                <td>
                                <?php 
                                if(($board_10_roll == '')||(empty($board_10_roll))|| (is_null($board_10_roll))||($board_10_roll == '0')||($board_10_roll == '0.00')||($board_10_roll == 'Not Available'))
                                { ?>

                                    <input type="text" name="roll10" id="roll10" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="roll10" id="roll10" value="<?php echo $board_10_roll; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                    <?php 
                                    if(($board_10_yop == '')||(empty($board_10_yop))|| (is_null($board_10_yop))||($board_10_yop == '0')||($board_10_yop == '0.00')||($board_10_yop == 'Not Available'))
                                    { ?>
                                        <input type="text" name="yop10" id="yop10" value="<?php echo $defstr; ?>" readonly = "true">
                                    <?php }
                                    else
                                    { ?>
                                        <input type="text" name="yop10" id="yop10" value="<?php echo $board_10_yop; ?>" readonly = "true">
                                    <?php } ?>
                                    
                                </td>
                                <td>
                                <?php 
                                if(($board_10_div == '')||(empty($board_10_div))|| (is_null($board_10_div))||($board_10_div == '0')||($board_10_div == '0.00')||($board_10_div == 'Not Available'))
                                { ?>

                                    <input type="text" name="div10" id="div10" value="<?php echo $defstr; ?>" readonly="true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="div10" id="div10" value="<?php echo $board_10_div; ?>" readonly="true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board_10_percent == '')||(empty($board_10_percent))|| (is_null($board_10_percent))||($board_10_percent == '0')||($board_10_percent == '0.00')||($board_10_percent == 'Not Available'))
                                { ?>

                                    <input type="text" name="percent10" id="percent10" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="percent10" id="percent10" value="<?php echo $board_10_percent; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board_10_sub == '')||(empty($board_10_sub))|| (is_null($board_10_sub))||($board_10_sub == '0')||($board_10_sub == '0.00')||($board_10_sub == 'Not Available'))
                                { ?>

                                    <input type="text" name="sub10" id="sub10" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="sub10" id="sub10" value="<?php echo $board_10_sub; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    10+2
                                </td>
                                <td>
                                <?php 
                                if(($board10_2 == '')||(empty($board10_2))|| (is_null($board10_2))||($board10_2 == '0')||($board10_2 == '0.00')||($board10_2 == 'Not Available'))
                                { ?>

                                    <input type="text" name="board10_2" id="board10_2" value="<?php echo $defstr; ?>" readonly="true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="board10_2" id="board10_2" value="<?php echo $board10_2; ?>" readonly="true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_roll == '')||(empty($board10_2_roll))|| (is_null($board10_2_roll))||($board10_2_roll == '0')||($board10_2_roll == '0.00')||($board10_2_roll == 'Not Available'))
                                { ?>

                                    <input type="text" name="roll10_2" id="roll10_2" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="roll10_2" id="roll10_2" value="<?php echo $board10_2_roll; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_yop == '')||(empty($board10_2_yop))|| (is_null($board10_2_yop))||($board10_2_yop == '0')||($board10_2_yop == '0.00')||($board10_2_yop == 'Not Available'))
                                { ?>

                                    <input type="text" name="yop10_2" id="yop10_2" value="<?php echo $defstr; ?>" readonly = "TRUE">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="yop10_2" id="yop10_2" value="<?php echo $board10_2_yop; ?>" readonly = "TRUE">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_div == '')||(empty($board10_2_div))|| (is_null($board10_2_div))||($board10_2_div == '0')||($board10_2_div == '0.00')||($board10_2_div == 'Not Available'))
                                { ?>

                                    <input type="text" name="div10_2" id="div10_2" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="div10_2" id="div10_2" value="<?php echo $board10_2_div; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                    <?php 
                                    if(($board10_2_percent == '')||(empty($board10_2_percent))|| (is_null($board10_2_percent))||($board10_2_percent == '0')||($board10_2_percent == '0.00')||($board10_2_percent == 'Not Available'))
                                    { ?>
                                        <input type="text" name="percent10_2" id="percent10_2" value="<?php echo $defstr; ?>" readonly = "true">
                                    <?php }
                                    else
                                    { ?>
                                        <input type="text" name="percent10_2" id="percent10_2" value="<?php echo $board10_2_percent; ?>" readonly = "true">
                                    <?php } ?>
                                    
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_sub == '')||(empty($board10_2_sub))|| (is_null($board10_2_sub))||($board10_2_sub == '0')||($board10_2_sub == '0.00')||($board10_2_sub == 'Not Available'))
                                { ?>

                                    <input type="text" name="sub10_2" id="sub10_2" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="sub10_2" id="sub10_2" value="<?php echo $board10_2_sub; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    10+2+3
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_3 == '')||(empty($board10_2_3))|| (is_null($board10_2_3))||($board10_2_3 == '0')||($board10_2_3 == '0.00')||($board10_2_3 == 'Not Available'))
                                { ?>
                                    <input type="text" name="board10_2_3" id="board10_2_3" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="board10_2_3" id="board10_2_3" value="<?php echo $board10_2_3; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_3_roll == '')||(empty($board10_2_3_roll))|| (is_null($board10_2_3_roll))||($board10_2_3_roll == '0')||($board10_2_3_roll == '0.00')||($board10_2_3_roll == 'Not Available'))
                                { ?>

                                    <input type="text" name="roll10_2_3" id="roll10_2_3" value="<?php echo $defstr; ?> "readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="roll10_2_3" id="roll10_2_3" value="<?php echo $board10_2_3_roll; ?> "readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_3_yop == '')||(empty($board10_2_3_yop))|| (is_null($board10_2_3_yop))||($board10_2_3_yop == '0')||($board10_2_3_yop == '0.00')||($board10_2_3_yop == 'Not Available'))
                                { ?>

                                    <input type="text" name="yop10_2_3" id="yop10_2_3" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="yop10_2_3" id="yop10_2_3" value="<?php echo $board10_2_3_yop; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_3_div == '')||(empty($board10_2_3_div))|| (is_null($board10_2_3_div))||($board10_2_3_div == '0')||($board10_2_3_div == '0.00')||($board10_2_3_div == 'Not Available'))
                                { ?>

                                    <input type="text" name="div10_2_3" id="div10_2_3" value="<?php echo $defstr; ?>" redaonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="div10_2_3" id="div10_2_3" value="<?php echo $board10_2_3_div; ?>" redaonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_3_percent == '')||(empty($board10_2_3_percent))|| (is_null($board10_2_3_percent))||($board10_2_3_percent == '0')||($board10_2_3_percent == '0.00')||($board10_2_3_percent == 'Not Available'))
                                { ?>

                                    <input type="text" name="percent10_2_3" id="percent10_2_3" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php } 
                                else
                                { ?>
                                    <input type="text" name="percent10_2_3" id="percent10_2_3" value="<?php echo $board10_2_3_percent; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($board10_2_3_sub == '')||(empty($board10_2_3_sub))|| (is_null($board10_2_3_sub))||($board10_2_3_sub == '0')||($board10_2_3_sub == '0.00')||($board10_2_3_sub == 'Not Available'))
                                { ?>

                                    <input type="text" name="sub10_2_3" id="sub10_2_3" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="sub10_2_3" id="sub10_2_3" value="<?php echo $board10_2_3_sub; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                </tr>
                                <!--<tr>
                                    <INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />
                                </tr>-->
                                <tr>
                                <td>
                                <?php 
                                if(($examextra == '')||(empty($examextra))|| (is_null($examextra))||($examextra == '0')||($examextra == '0.00')||($examextra == 'Not Available'))
                                { ?>

                                    <input type="text" name="examextra" id="examextra" value="<?php echo $defstr ; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="examextra" id="examextra" value="<?php echo $examextra ; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($boardexamextra == '')||(empty($boardexamextra))|| (is_null($boardexamextra))||($boardexamextra == '0')||($boardexamextra == '0.00')||($boardexamextra == 'Not Available'))
                                { ?>

                                    <input type="text" name="boardexamextra" id="boardexamextra" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php } 
                                else
                                { ?>
                                    <input type="text" name="boardexamextra" id="boardexamextra" value="<?php echo $boardexamextra; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($rollexamextra == '')||(empty($rollexamextra))|| (is_null($rollexamextra))||($rollexamextra == '0')||($rollexamextra == '0.00')||($rollexamextra == 'Not Available'))
                                { ?>

                                    <input type="text" name="rollexamextra" id="rollexamextra" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="rollexamextra" id="rollexamextra" value="<?php echo $rollexamextra; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($yopexamextra == '')||(empty($yopexamextra))|| (is_null($yopexamextra))||($yopexamextra == '0')||($yopexamextra == '0.00')||($yopexamextra == 'Not Available'))
                                { ?>

                                    <input type="text" name="yopexamextra" id="yopexamextra" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="yopexamextra" id="yopexamextra" value="<?php echo $yopexamextra; ?>" readonly = "true">
                                 <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($divexamextra == '')||(empty($divexamextra))|| (is_null($divexamextra))||($divexamextra == '0')||($divexamextra == '0.00')||($divexamextra == 'Not Available'))
                                { ?>

                                    <input type="text" name="divexamextra" id="divexamextra" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="divexamextra" id="divexamextra" value="<?php echo $divexamextra; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($percentexamextra == '')||(empty($percentexamextra))|| (is_null($percentexamextra))||($percentexamextra == '0')||($percentexamextra == '0.00')||($percentexamextra == 'Not Available'))
                                { ?>

                                    <input type="text" name="percentexamextra" id="percentexamextra" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="percentexamextra" id="percentexamextra" value="<?php echo $percentexamextra; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                <td>
                                <?php 
                                if(($subexamextra == '')||(empty($subexamextra))|| (is_null($subexamextra))||($subexamextra == '0')||($subexamextra == '0.00')||($subexamextra == 'Not Available'))
                                { ?>

                                    <input type="text" name="subexamextra" id="subexamextra" value="<?php echo $defstr; ?>" readonly = "true">
                                <?php }
                                else
                                { ?>
                                    <input type="text" name="subexamextra" id="subexamextra" value="<?php echo $subexamextra; ?>" readonly = "true">
                                <?php } ?>
                                </td>
                                </tr>
                            </table>
                        </div>
                          
                        <div class="row-form clearfix"> 
                                 
                            <div class="span3"><pre>Academic distinction/Medals/Prizes/Scholarships,if any </pre></div>
                            <div class="span9">
                            <?php 
                            if(($distinction_medals_prize == '')||(empty($distinction_medals_prize))|| (is_null($distinction_medals_prize))||($distinction_medals_prize == '0')||($distinction_medals_prize == '0.00')||($distinction_medals_prize == 'Not Available'))
                                { ?>
                                    <textarea id="medals" name="medals"><?php echo $defaultstr; ?></textarea><span style="display:none" id="error10" class="required">This is required</span>
                                <?php }
                                else{ ?>
                                        <textarea id="medals" name="medals"><?php echo $distinction_medals_prize ?></textarea><span style="display:none" id="error10" class="required">This is required</span>         
                                    <?php } ?>
                                </div>
                        </div>
                        <div class="row-form clearfix"> 
                                 
                            <div class="span3">Any extracurricular Activities</div>
                            <div class="span9">
                            <?php 
                            if(($extra_curricular == '')||(empty($extra_curricular))|| (is_null($extra_curricular))||($extra_curricular == '0')||($extra_curricular == '0.00')||($extra_curricular == 'Not Available'))
                                { ?>
                                    <textarea id="curricular" name="curricular"><?php echo $defaultstr; ?></textarea><span style="display:none" id="error10" class="required">This is required</span>
                                <?php }
                                else{ ?>
                                        <textarea id="curricular" name="curricular"><?php echo $extra_curricular; ?></textarea><span style="display:none" id="error10" class="required">This is required</span>
                                <?php } ?></div>
                        </div> 

                        <?php
                        if($undergoing_course == 'yes')
                        {?>
                             <div class="row-form clearfix">
                                <div class="span3">Are you undergoing any course of study at present?:</div>
                                <div class="span9"><input type="text"  id="undergoingcourse" name="undergoingcourse" value="<?php echo $undergoing_course; ?>" readonly="true"/><span style="display:none" id="lastunierror" class="required">This is required</span></div>
                            </div> 
                            <div class="row-form clearfix">
                                <div class="span3">Give Details:</div>
                                <div class="span9"><input type="text"  id="undergoingcoursedetails" name="undergoingcoursedetails" value="<?php echo $undergoing_course_details; ?>" readonly="true"/><span style="display:none" id="lastunierror" class="required">This is required</span></div>
                            </div> 

                        <?php } 
                         elseif($undergoing_course == 'no'){ ?> 
                            <div class="row-form clearfix">
                                <div class="span3">Are you undergoing any course of study at present?:</div>
                                <div class="span9"><input type="text"  id="undergoingcourse" name="undergoingcourse" value="<?php echo 'NO'; ?>" readonly="true"/><span style="display:none" id="lastunierror" class="required">This is required</span></div>
                            </div> 
                         <?php }  
                        elseif($undergoing_course == 0)
                            { ?>
                                <div class="row-form clearfix">
                                <div class="span3">Are you undergoing any course of study at present?:</div>
                                <div class="span9"><input type="text"  id="undergoingcourse" name="undergoingcourse" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="lastunierror" class="required">This is required</span></div>
                            </div> 
                            
                           
                            <?php }
                            else
                            { ?>
                               <div class="row-form clearfix">
                                    <div class="span3">Are you undergoing any course of study at present?:</div>
                                    <div class="span9"><input type="text"  id="undergoingcourse" name="undergoingcourse" value="<?php echo $defaultstr; ?>" readonly="true"/><span style="display:none" id="lastunierror" class="required">This is required</span></div>
                                </div> 
                            <?php } ?>

                        
                        </div>
                    </div>   
                    
                </div>
                </div>
                </form>