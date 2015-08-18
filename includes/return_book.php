<?php require("auto_connect.php");
$acc=$_POST['acc'];
$mid=$_POST['mid'];
$q=mysql_query("delete from  book_issue_storage_handler where book_acc_no='$acc' and issued_to_member_id='$mid'");
$q1=mysql_query("update book_base set availability='available' where accession_no='$acc' ");
$q2=mysql_query("select book_acc_no  from book_issue_storage_handler where  issued_to_member_id='$mid' ");
$count=mysql_num_rows($q2);
if($q){
$json=array('message'=>'Done','num'=>$count);
echo json_encode($json); } ?>