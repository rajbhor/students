<?php require("auto_connect.php");
$bookacc=$_POST['bookacc'];
$q=mysql_query("delete from book_base where accession_no='$bookacc'");
if($q){
$json=array('message'=>'Done');
echo json_encode($json); } ?>