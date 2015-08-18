<?php ob_start();	
	session_set_cookie_params(1200); 
	 
	session_start();
	
	//require("configLogin.php");
	require("../../includes/auto_connect.php");
	require("../../includes/config.php");
	if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"])) {


  header("Location:".$bases."Logout.php");
  

} 
	$myname = $_SESSION['username'];
		 
	$exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
	$hostname = trim($exec); //remove any spaces before and after
	$ip = gethostbyname($hostname);  

	
	$pname = trim($_POST['file1']);
	

	$destination = "uploads/profile_Pic/";
	$wrapper=base64_decode($_GET['wrapper']);


	//echo $destination;
	
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file1"]["name"]);
	$extension = end($temp);
	




	if ((($_FILES["file1"]["type"] == "image/gif")
	|| ($_FILES["file1"]["type"] == "image/jpeg")
	|| ($_FILES["file1"]["type"] == "image/jpg")
	|| ($_FILES["file1"]["type"] == "image/pjpeg")
	|| ($_FILES["file1"]["type"] == "image/x-png")
	|| ($_FILES["file1"]["type"] == "image/png"))
	&& ($_FILES["file1"]["size"] < 3000000)
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["file1"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file1"]["error"] . "<br>";
		}
	  else
		{
				// echo "Upload: " . $_FILES["file1"]["name"] . "<br>";
				// echo "Type: " . $_FILES["file1"]["type"] . "<br>";
				// echo "Size: " . ($_FILES["file1"]["size"] / 1024) . " kB<br>";
				// echo "Temp file: " . $_FILES["file1"]["tmp_name"] . "<br>";

$image_name = $destination.time().$_FILES["file1"]["name"];

				move_uploaded_file($_FILES["file1"]["tmp_name"],
				$image_name);
				//echo "Stored in: " . $destination . $_FILES["file1"]["name"];
				
				if($wrapper!='' && $wrapper!=NULL && !empty($wrapper)){
$unlink_path="uploads/profile_Pic/";
@unlink($unlink_path.$wrapper);

				}
				$qry = "UPDATE student_details SET profile_pic_name = '$image_name' where student_id='$myname'";
				
				mysql_query($qry) or die(mysql_error());

				header('Location:'.$bases.'profile.php');
		
		}
		
	  }
	else
	  {
	  	echo "Invalid file";
	  }

?>
