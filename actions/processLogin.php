<?php ob_start(); 
require("../includes/configLogin.php");
require("../includes/auto_connect.php");
	 
    $exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
$hostname = trim($exec); //remove any spaces before and after
$ip = gethostbyname($hostname);  
try{ 
		if($_SESSION['uids']==''){ 
		$uname=mysql_real_escape_string(trim($_POST['uname']));
		$pwd=mysql_real_escape_string(trim($_POST['pwd']));
		
		$query1=mysql_query("select * from g_users where user_name='$uname' and password='$pwd' and status='A'"); 
		if(mysql_num_rows($query1)==1){ //access 
      
				 $rows=mysql_fetch_array($query1);
   
				$deptcode=$rows['dept_code'];
 
						if($rows['user_type']=="admin" && $rows['branch_type']=='admin' )
						 {
						 $sessdeptname="Administrator";
					
						 }
				 else
						{
						if($rows['branch_type']=='center')
						{
					    
								$q=mysql_query("select * from center where center_code=$deptcode");
								while($center=mysql_fetch_array($q))
								{
								 $sessdeptname=$center['center_name'];
						       
								}
						}
				       
						elseif($rows['branch_type']=='dept')
						{
								$q1=mysql_query("select * from department where dept_code=$deptcode");
								while($department=mysql_fetch_array($q1))
								{
										$sessdeptname=$department['dept_name'];
								}
						}
						  
					       }

 
	   
		date_default_timezone_set('Asia/Kolkata');
		$logtime=date("l jS F Y g.iA");

	 
		$update=mysql_query("Update g_users set login_time='$logtime',user_login_ip='$ip',user_logged_in='yes' where user_id=".$rows['user_id']); 
		session_start();
		$_SESSION['password']=$rows['password'];
		$_SESSION['username']=$rows['user_name'];
		$_SESSION['uids']=$rows['user_id'];
		$_SESSION['user_type']=$rows['user_type'];
		$_SESSION['deptcode']=$deptcode;
		 
		$_SESSION['branch_type']=$rows['branch_type'];
		
		$_SESSION['logged_in']=TRUE;
		$_SESSION['key']=time();
		$_SESSION['sessdeptname']=$sessdeptname;
      		
		 header("Location:".$base."dashboard.php");
		}
		else {
		$error="Wrong Attempt. Try Again";
		header("Location:".$base."index.php?loginRedirect=".base64_encode($error));
		     }
			
		      }
		else {
			 header("Location:".$base."dashboard.php");
			 }
			
		      }  
		
		catch(Exception $e)
  {
  echo "error";
  }