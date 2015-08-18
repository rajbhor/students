<?php ob_start(); 
//session_set_cookie_params(1200);
session_start();  
//require("configLogin.php");
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
<script type="text/javascript"> 
    function validatePersonalEditform()
    {
        
        var nationality, s2_3, s2_2, bgrp, s2_4, s2_5, s2_6, deputationinstitute, s2_7 = true;
        nationality = $("#nationality").val();

        s2_3 = $("#s2_3").val();
      
        s2_2 = $("#s2_2").val();
         bgrp = $("#bgrp").val();

        s2_4 = $("#s2_4").val();
      
        s2_5 = $("#s2_5").val();
         s2_6 = $("#s2_6").val();

        deputationinstitute = $("#deputationinstitute").val();
      
        s2_7 = $("#s2_7").val();
      
        if(($.trim(nationality) == '')||($.trim(nationality) == 'Not Available'))
        {
            $("#nationality").focus();
            $("#nationalityerror").show();
           
        }
        else
        {
            if(s2_3 == 0)
            {
                $("#s2_3").focus();
                $("#casteerror").show();
                $("#nationalityerror").hide();
            }
            else
            {
                if(s2_2 == 0)
                {
                    $("#s2_2").focus();
                    $("#maritalerror").show();
                    
                    $("#casteerror").hide();
                     $("#nationalityerror").hide();
                }
                else
                {
                    if(($.trim(bgrp) == '')||($.trim(bgrp) == 'Not Available'))    
                    {
                        $("#bgrp").focus();
                        $("#bgrperror").show();
                        $("#maritalerror").hide();
                        $("#casteerror").hide();
                        $("#nationalityerror").hide();
                    }     
                    else
                    {
                            if(s2_4 == 0)
                            {
                                $("#s2_4").focus();
                                $("#resideerror").show();
                                $("#bgrperror").hide();
                                $("#maritalerror").hide();
                                $("#casteerror").hide();
                                 $("#nationalityerror").hide();
                            } 
                            else
                            {
                                if(s2_5 == 0)
                                {
                                    $("#s2_5").focus();
                                    $("#employederror").show();
                                    $("#resideerror").hide();
                                    $("#bgrp").hide();
                                    $("#maritalerror").hide();
                                    $("#casteerror").hide();
                                    $("#nationalityerror").hide();
                                }
                                else
                                {
                                    if(s2_6 == 0)
                                    {
                                        $("#s2_6").focus();
                                        $("#deputationerror").show();
                                        $("#employederror").hide();
                                        $("#resideerror").hide();
                                        $("#bgrp").hide();
                                        $("#maritalerror").hide();
                                        $("#casteerror").hide();
                                        $("#nationalityerror").hide(); 
                                    }
                                    else
                                    {
                                        
                                           
                                            if(s2_7 == 0)
                                            {
                                                $("#s2_7").focus();
                                                $("#handicapperror").show();
                                                $("#deputationinstituteerror").hide();
                                                $("#deputationerror").hide();
                                                $("#employederror").hide();
                                                $("#resideerror").hide();
                                                $("#bgrp").hide();
                                                $("#maritalerror").hide();
                                                $("#casteerror").hide();
                                                $("#nationalityerror").hide();
                                            }  
                                            else
                                            {
                                                $("#editPersonalform").submit();
                                            }
                                    }
                                }
                            }
                        
                    }          
                 }      
               } 
            }
        }
</script>
<form method="post" action="<?php echo $bases;?>actions/processPersonalEditProfile.php" id="editPersonalform" name="editPersonalform">
<div class="span9">                                        
<div class="block-fluid without-head">                        
<div class="toolbar clearfix">  
<div class="toolbar clear clearfix">
<div class="centre">                                
    <button type="button" class="btn btn-small btn-warning tip" onclick="showPersonal()">Edit Personal details<span class="icon-ok icon-white"></span></button>                                
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
        <div class="span9"><input type="text" id="nationality" name="nationality" value="<?php echo $defaultstr; ?>" readonly="true"/>
        <span style="display:none" id="nationalityerror" class="required">This is required</span></div>
    </div>
<?php }
else
{ ?>
     <div class="row-form clearfix">
        <div class="span3">Nationality</div>
        <div class="span9"><input type="text" id="nationality" name="nationality" value="<?php echo $corr_nationality; ?>"/>
        <span style="display:none" id="nationalityerror" class="required">This is required</span></div>
    </div>

<?php }
if(($category == '')||(empty($category))|| (is_null($category))||($category == '0') ||($category == 0) ||($category == '0.00')||($category == 'Not Available'))
{ 
    $sql = "SELECT id, caste_name FROM caste";
     $rs = mysql_query($sql);
?>
 <div class="row-form clearfix">
    <div class="span3">Caste:</div>
    <div class="span9">
        <select name="select3" id="s2_3" style="width: 100%;">

            <option value="0">choose a option...</option>
            <?php while ($data = mysql_fetch_array($rs,MYSQL_ASSOC)) { 
            echo '<option value="'.$data['id'].'">'.$data['caste_name'].'</option>';
            } ?>
        </select>  
         <span style="display:none" id="casteerror" class="required">Select one</span> 
    </div>
</div>
<?php }
else
{ ?>
    <div class="row-form clearfix">
    <div class="span3">Caste:</div>
    <div class="span9">
        <select name="select3" id="s2_3" style="width: 100%;">

            <option value="0">choose a option...</option>
            <?php 
            $sql = "SELECT id, caste_name FROM caste";
            $rs = mysql_query($sql);
            while ($data = mysql_fetch_array($rs,MYSQL_ASSOC)) {
                if($category == $data['id'])
                {
                    echo '<option value="'.$data['id'].'" selected = "selected">'.$data['caste_name'].'</option>';  
                }
                else
                {
                     echo '<option value="'.$data['id'].'">'.$data['caste_name'].'</option>';   
                }
           
            } ?>
        </select>  
         <span style="display:none" id="casteerror" class="required">Select one</span> 
    </div>
</div>
<?php }  
if(($marital_status == '')||(empty($marital_status))|| (is_null($marital_status))||($marital_status == '0')||($marital_status == '0.00')||($marital_status == 'Not Available'))
{?>
<div class="row-form clearfix">
    <div class="span3">Marital Status:</div>
    <div class="span9">
        <select name="select2" id="s2_2" style="width: 100%;">
            <option value="0">choose a option...</option>
            
            <option value="Married">Married</option>
            <option value="Unmarried">Unmarried</option>
            
        </select>  
         <span style="display:none" id="maritalerror" class="required">Select one</span> 
    </div>
</div> 
<?php }
else
{ ?>
    <div class="row-form clearfix">
        <div class="span3">Marital Status:</div>
        <div class="span9">
            <select name="select2" id="s2_2" style="width: 100%;">
                <option value="0">choose a option...</option>
               <?php if($marital_status === 'Married')
               { ?>
                    <option value="Married" selected = "selected">Married</option>
                    <option value="Unmarried">Unmarried</option>
               <?php }
               else
               { ?>
                    <option value="Married">Married</option>
                    <option value="Unmarried" selected="selected">Unmarried</option>

                <?php } ?> 
                
                
            </select>  
             <span style="display:none" id="maritalerror" class="required">Select one</span> 
        </div>
    </div>
<?php } 
if(($blood_group == '')||(empty($blood_group))|| (is_null($blood_group))||($blood_group == '0')||($blood_group == '0.00')||($blood_group == 'Not Available'))
{ ?>
    <div class="row-form clearfix">
        <div class="span3">Blood Group</div>
        <div class="span9"><input type="text" id="bgrp" name="bgrp" value="<?php echo $defaultstr; ?>"/>
        <span style="display:none" id="bgrperror" class="required">This is required</span></div>
    </div> 
<?php }
else
{ ?>
   <div class="row-form clearfix">
        <div class="span3">Blood Group</div>
        <div class="span9"><input type="text" id="bgrp" name="bgrp" value="<?php echo $blood_group; ?>"/>
        <span style="display:none" id="bgrperror" class="required">This is required</span></div>
    </div>  
<?php }
if(($reside == '')||(empty($reside))|| (is_null($reside))||($reside == '0')||($reside == '0.00')||($reside == 'Not Available'))
{ ?>
<div class="row-form clearfix">
    <div class="span3">Where to Reside?:</div>
    <div class="span9">
        <select name="select4" id="s2_4" style="width: 100%;">
            <option value="0">choose a option...</option>
            
            <option value="home">At home</option>
            <option value="hostel">University Hostel</option>
            <option value="outSide">Out side</option>
        </select>  
         <span style="display:none" id="resideerror" class="required">Select one</span> 
    </div>
</div>
<?php 
}
elseif($reside === 'home')
{ ?>
    <div class="row-form clearfix">
    <div class="span3">Where to Reside?:</div>
        <div class="span9">
            <select name="select4" id="s2_4" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="home" selected="selected">At home</option>
                <option value="hostel">University Hostel</option>
                <option value="outSide">Out side</option>
            </select>  
             <span style="display:none" id="resideerror" class="required">Select one</span> 
        </div>
    </div>

<?php }
elseif ($reside === 'hostel') { ?>
    <div class="row-form clearfix">
    <div class="span3">Where to Reside?:</div>
        <div class="span9">
            <select name="select4" id="s2_4" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="home">At home</option>
                <option value="hostel" selected="selected">University Hostel</option>
                <option value="outSide">Out side</option>
            </select>  
             <span style="display:none" id="resideerror" class="required">Select one</span> 
        </div>
    </div>

<?php }
elseif ($reside === 'outSide') { ?>
    <div class="row-form clearfix">
    <div class="span3">Where to Reside?:</div>
        <div class="span9">
            <select name="select4" id="s2_4" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="home">At home</option>
                <option value="hostel">University Hostel</option>
                <option value="outSide" selected="selected">Out side</option>
            </select>  
             <span style="display:none" id="resideerror" class="required">Select one</span> 
        </div>
    </div>
<?php }
if ($employment_status == 'yes') { ?>
    <div class="row-form clearfix">
        <div class="span3">Are you employeed?:</div>
        <div class="span9">
            <select name="select5" id="s2_5" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="yes" selected="selected">Yes</option>
                <option value="no">No</option>
                
            </select>  
             <span style="display:none" id="employederror" class="required">Select one</span> 
        </div>
    </div>

<?php }
elseif ($employment_status == 'no') { ?>
    <div class="row-form clearfix">
        <div class="span3">Are you employeed?:</div>
        <div class="span9">
            <select name="select5" id="s2_5" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="yes" >Yes</option>
                <option value="no" selected="selected">No</option>
                
            </select>  
             <span style="display:none" id="employederror" class="required">Select one</span> 
        </div>
    </div>
<?php } 
elseif ($employment_status == 0) { ?>
    <div class="row-form clearfix">
        <div class="span3">Are you employeed?:</div>
        <div class="span9">
            <select name="select5" id="s2_5" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="yes">Yes</option>
                <option value="no">No</option>
                
            </select>  
             <span style="display:none" id="employederror" class="required">Select one</span> 
        </div>
    </div>
<?php }

if ($depution_status === 'yes') { ?>
    <div class="row-form clearfix">
        <div class="span3">Are you on deputation?:</div>
        <div class="span9">
            <select name="select6" id="s2_6" style="width: 100%;" onchange="showTextbox()">
                <option value="0">choose a option...</option>
                
                <option value="yes" selected="seleted">Yes</option>
                <option value="no">No</option>
                
            </select>  
             <span style="display:none" id="deputationerror" class="required">Select one</span> 
        </div>
    </div>

    <div class="row-form clearfix" id="texthide" style="display:none">
        <div class="span3">Name of the School/College/Department/Organization</div>
        <div class="span9"><input type="text" id="deputationinstitute" name="deputationinstitute" value="<?php echo $depution_org; ?>"/><span style="display:none" id="deputationinstituteerror" class="required">This is required</span></div>
    </div>
<?php }
elseif ($depution_status === 'no') { ?>
    <div class="row-form clearfix">
        <div class="span3">Are you on deputation?:</div>
        <div class="span9">
            <select name="select6" id="s2_6" style="width: 100%;" onchange="showTextbox()">
                <option value="0">choose a option...</option>
                
                <option value="yes">Yes</option>
                <option value="no" selected="seleted">No</option>
                
            </select>  
             <span style="display:none" id="deputationerror" class="required">Select one</span> 
        </div>
    </div>
    <div class="row-form clearfix" id="texthide" style="display:none">
        <div class="span3">Name of the School/College/Department/Organization</div>
        <div class="span9"><input type="text" id="deputationinstitute" name="deputationinstitute" value=""/><span style="display:none" id="deputationinstituteerror" class="required">This is required</span></div>
    </div>
    
<?php }
elseif (($depution_status == 0)) { ?>
     <div class="row-form clearfix">
        <div class="span3">Are you on deputation?:</div>
        <div class="span9">
            <select name="select6" id="s2_6" style="width: 100%;" onchange="showTextbox()">
                <option value="0">choose a option...</option>
                
                <option value="yes">Yes</option>
                <option value="no">No</option>
                
            </select>  
             <span style="display:none" id="deputationerror" class="required">Select one</span> 
        </div>
         <div class="row-form clearfix" id="texthide" style="display:none">
        <div class="span3">Name of the School/College/Department/Organization</div>
        <div class="span9"><input type="text" id="deputationinstitute" name="deputationinstitute" value=""/><span style="display:none" id="deputationinstituteerror" class="required">This is required</span></div>
    </div>
 <?php } 
if ($physically_handicapped == 'yes') { ?>
    <div class="row-form clearfix">
        <div class="span3">Are you physically handicapped?:</div>
        <div class="span9">
            <select name="select7" id="s2_7" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="yes" selected="selected">Yes</option>
                <option value="no">No</option>
                
            </select>   
            <span style="display:none" id="handicapperror" class="required">This is required</span>
        </div>
    </div>
<?php }
elseif ($physically_handicapped == 'no') { ?>
    <div class="row-form clearfix">
        <div class="span3">Are you physically handicapped?:</div>
        <div class="span9">
            <select name="select7" id="s2_7" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="yes" >Yes</option>
                <option value="no" selected="selected">No</option>
                
            </select>   
            <span style="display:none" id="handicapperror" class="required">This is required</span>
        </div>
    </div>
<?php } 
elseif ($physically_handicapped == 0) { echo 'no value'; ?>
<div class="row-form clearfix">
        <div class="span3">Are you physically handicapped?:</div>
        <div class="span9">
            <select name="select7" id="s2_7" style="width: 100%;">
                <option value="0">choose a option...</option>
                
                <option value="yes">Yes</option>
                <option value="no">No</option>
                
            </select>   
            <span style="display:none" id="handicapperror" class="required">This is required</span> 
        </div>
    </div> 
<?php } ?>

<!-- <div class="row-form clearfix" id="texthide" style="display:none">
    <div class="span3">Name of the School/College/Department/Organization</div>
    <div class="span9"><input type="text" id="deputationinstitute" name="deputationinstitute" value=""/><span style="display:none" id="deputationinstituteerror" class="required">This is required</span></div>
</div> -->

<div class="toolbar clearfix">
    <div class="left">
                                        
    </div>
    <div class="right">
        <div class="btn-group">
                <button type="button" class="btn btn-small btn-warning tip" title="Quick save" onclick="return validatePersonalEditform()">Save</button>
            
            
        </div>
    </div>
</div>     
</div>

</div>
</div>
</div>
</form>