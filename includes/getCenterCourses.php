<?php require("auto_connect.php");
function getName($cd){

	$sql2=mysql_query("select * FROM center WHERE center_code=$cd");
	$res=mysql_fetch_array($sql2);
	return $res['center_name'];
}
$cenid=$_POST['cenid'];
$sel=$_POST['sel'];
 $sql=mysql_query("select * FROM center_course WHERE center_code=$cenid");
if(mysql_num_rows($sql)>=1){?>
   <option title="View Students from all courses under <?php echo getName($cenid);?>" value="0" selected >ALL COURSES</option>
                                    
<?php 	
while($row=mysql_fetch_assoc($sql))
{
$centercourseid=$row['cc_code'];
$centercoursename=$row['cc_name'];?>

<option title='View Students from <?php echo $centercoursename;?> under <?php echo getName($cenid);?>' 
	value="<?php echo $centercourseid;?>"><?php echo $centercoursename;?></option>
<?php 
}
}
else {?>


  <option value="-1" selected >No Courses added yet</option>

<?php } ?>