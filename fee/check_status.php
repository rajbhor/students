<?php session_start();
require("auto_connect.php");
$dptcode=$_SESSION['deptcode'];
$course=$_GET['course'];
$sem=$_GET['fsem'];
$session=$_GET['fsession'];
$fcategory=$_GET['fcategory']; 
$query=mysql_query("select * from fee_structure where center_dept_code=$dptcode AND course_code=$course AND session=$session AND sem_year=$sem AND fee_category_id=$fcategory");
$result=@mysql_num_rows($query);
if($result>=1)
{
   ?>
    <div class="alert alert-danger">
      <i class="fa fa-info"></i> Error! You have already enetred Fee for particular course, semester and session.
    </div>
<?php
    
}
else if($result==0){
   
    
}
 
?>