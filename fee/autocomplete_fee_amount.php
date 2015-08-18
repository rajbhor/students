 <?php
	
	require("auto_connect.php");
	$q=stripslashes(mysql_real_escape_string($_GET['q']));
	$my_data=$q;
	//$q="select * from applications where disease_serious_illness like '%$my_data%' order by application_id";
	//$res=mysql_query($q,$mysqli) or die(mysql_error()); 
	$sql="SELECT * FROM    amount_dump WHERE amount LIKE '%$my_data%' ORDER BY id";
	$result = mysql_query($sql,$mysqli) or die(mysql_error()); 
	 
	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['amount']."\n";
			//echo "<small>".$row['allergy_description_pop_up_with_title']."</small>";
		}
	}
	
?>
 
 
 
 
