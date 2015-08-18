<?php ob_start(); 
session_start();
require("../includes/config.php");
 
require("../includes/auto_connect.php");

$my_id = $_SESSION['username'];

//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

$path = "actions/uploads/profile_Pic/";

$database_save_path = "uploads/profile_Pic/";

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{	
	$imagename = $_FILES['photoimg']['name'];
	$size = $_FILES['photoimg']['size'];
	if(strlen($imagename))
	{
		$image_path = $_FILES['photoimg']['name'];
		$ext = pathinfo($image_path, PATHINFO_EXTENSION);

		$filename = pathinfo($image_path, PATHINFO_FILENAME);
	
		if(in_array($ext,$valid_formats))
		{
			if($size<(1024*1024)) // Image size max 1 MB
			{
				$random_file_name = md5($filename.time()).".".$ext;
				$actual_image_name = $path.$random_file_name;
				$database_save_image_name = $database_save_path.$random_file_name;
				$uploadedfile = $_FILES['photoimg']['tmp_name'];

				//Re-sizing image. 
				include 'compressImage.php';
				$widthArray = array(200,100,50); //required custom dimension here.
				foreach($widthArray as $newwidth)
				{
					$filename = compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth);
					//echo "<img src='".$filename."' class='img'/>";
				}

				//Original Image
				if(move_uploaded_file($uploadedfile, $actual_image_name))
				{
					//Insert upload image files names into user_uploads table
					$student_id = trim($_POST['student_id']);

					if($my_id == $student_id) {
						$qry = "UPDATE student_details SET profile_pic_name = '$database_save_image_name' where student_id='$student_id'";
				
						mysql_query($qry) or die(mysql_error());
						$msg .= "";
					}else{
						$msg .= "Unfair attemp :( ";
					}
					
					$_SESSION['upload_image_msg'] = $msg;
					header("Location:profile.php");
					exit;

					//echo "<img src='uploads/".$actual_image_name."' class='preview'>";
				}else
					$msg .= "Upload failed ".$uploadedfile.' '.$actual_image_name;
					$_SESSION['upload_image_msg'] = $msg;
					header("Location:profile.php");
					exit;
			}
			else
			$msg .= "Image file size max 1 MB";
			$_SESSION['upload_image_msg'] = $msg;
			header("Location:profile.php");
			exit;
		}
	else
		$msg .= "Invalid file format..";
		$_SESSION['upload_image_msg'] = $msg;
		header("Location:profile.php");
		exit;
	}
else
	$msg .= "Please select image..!";
	$_SESSION['upload_image_msg'] = $msg;
	header("Location:profile.php");
	exit;
}

?>