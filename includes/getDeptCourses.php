<?php require("auto_connect.php");
function getName($cd){

	$sql2=mysql_query("select * FROM department WHERE dept_code=$cd");
	$res=mysql_fetch_array($sql2);
	return $res['dept_name'];
}
$cenid=$_POST['depid'];
$sel=$_POST['sel1'];
 $sql=mysql_query("select * FROM course WHERE dept_code=$cenid");
if(mysql_num_rows($sql)>=1){?>
   <option title="View Students from all courses under <?php echo getName($cenid);?>" value="0" selected >ALL COURSES</option>
                                    
<?php 	
while($row=mysql_fetch_assoc($sql))
{
$centercourseid=$row['course_id'];
$centercoursename=$row['course_name'];?>

<option title='View Students from <?php echo $centercoursename;?> under <?php echo getName($cenid);?>' 
	value="<?php echo $centercourseid;?>"><?php echo $centercoursename;?></option>
<?php 
}
}
else {?>


  <option value="-1" selected >No Courses added yet</option>

<?php } ?>