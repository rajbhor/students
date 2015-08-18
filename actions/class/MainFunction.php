<?php
class  MainFunction
{
   
	function slno($str)
	{
	
	 $rowSQL = mysql_query($str);
	 $row = mysql_fetch_array( $rowSQL );
	 $largestNumber = $row['max'];
	 if($largestNumber=='')
	 {
	   $largestNumber=1;
	 }
      return $largestNumber;
	}
	function retrive($str)
	{
	 $rowSQL = mysql_query($str);
	 $row = mysql_fetch_array( $rowSQL );
	 $value=$row['val'];
	 if($value=='')
	 {
	   $value="0";
	 }
	 return $value;
	}
	function check($str)
	{
	 $rowSQL = mysql_query($str);
	 $row = mysql_num_rows($rowSQL);
	 if($row>0)
	 {
	   $value="1";
	 }
	 else
	 {
	 $value="0";
	 }
	 return $value;
	}
	
}