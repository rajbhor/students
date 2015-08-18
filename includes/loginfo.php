<?php 
$uids=$_SESSION['uids'];
 $q=mysql_query("select * from g_users where user_id=$uids");
 

while($name=mysql_fetch_array($q)){
	$deptcode=$name['dept_code'];
if($_SESSION['sessdeptname']=='Administrator'){
$loggername="Administrator";
$type="admin";
$oppname=$name['op_name'];
 
}
else {

 if($_SESSION['branch_type']=='dept'){
       $q1=mysql_query("select * from department where dept_code=$deptcode");
        while($department=mysql_fetch_array($q1))  {
         $loggername=$department['dept_name'];
         $type="operator";
         $oppname=$name['op_name'];
                                                   }
                                            }

  elseif($_SESSION['branch_type']=='center'){

  $q=mysql_query("select * from center where center_code=$deptcode");
       while($center=mysql_fetch_array($q))  {
         $loggername=$center['center_name'];
         $type="operator";
         $oppname=$name['op_name'];

                                            } 
  }




}
}

	?>