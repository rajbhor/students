<?php $base="http://localhost/LMS/";
$site="http://localhost/LMS/index.php";?>
<link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demopage.css">
     <link rel="stylesheet" type="text/css" href="<?php echo $base;?>js/demotable.css"> 
     <script type="text/javascript" language="javascript" src="<?php echo $base;?>js/datatables.js"></script>
   
<?php require("auto_connect.php");
function getLanguage($lid){

	$l=mysql_query("select * from languages where id=$lid");
	$lr=mysql_fetch_array($l);
	$lang=$lr['lang_name'];
	return $lang;
}

function getCategory($cid){

$c=mysql_query("select * from categories where id=$cid");
	$cr=mysql_fetch_array($c);
	$catname=$cr['catname'];
	return $catname;

}
$bid=$_POST['bid'];
$name=$_POST['name'];
$contact=$_POST['contact'];
 
$sql="select * from  members where ";
if($bid!='' || !empty($bid)){

	$sql.=" id LIKE '$bid' and ";
}

if($name!='' || !empty($name)){

$sql.=" member_name LIKE '$name' and ";
}
 
 if($contact!='' || !empty($contact)){

$sql.=" member_contact_no LIKE '$contact' and ";
}

 
 
$sql.=" 1=1";
$run=mysql_query($sql) or die(mysql_error()) ;

if(mysql_num_rows($run)>=1){?>
<style type="text/css">

th{
	text-align:center;
	}</style>
	 <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
          var oTable=$('#example').dataTable({ "aLengthMenu": [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ], 


"iDisplayLength" : 25 });
         
    
  oTable.fnSort( [ [0,'asc'] ] );
      } );
    </script>
 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:13px">
	<thead>
		<tr>
			<th style="color:green;font-size:11px">#</th>
			<th style="color:green;font-size:11px">Borrower ID</th>
			<th style="color:green;font-size:11px">Name</th>
			<th style="color:green;font-size:11px">Contact #</th>
			 

		</tr>
	</thead>
<?php  $i=1; while($fetch=mysql_fetch_array($run)){  ;?>

<tr>
<td style="color:#3b5999" align="center"><?php echo $i;?></td>
 
<td style="color:#3b5999;font-size:11px;" align="center"><?php echo $fetch['id'];?> &raquo; <a target="_blank" 
	href="<?php echo $site;?>/member/viewMember/<?php echo base64_encode($fetch['id']);?>"><span title="View Member Details" class="label label-primary"><i class="fa fa-search"></i> </span></a></td>
 
<td style="color:green; font-size:11px; width:150px"><?php echo $fetch['member_name'];?></td>
 <td style="color:darkblue;font-size:11px; width:180px" align="center"> 
<?php  if($fetch['member_contact_no']=='Not Available'){
	echo "<span title='This information is not available' style='' class='label label-danger'>Not Available</span></td>";} 
else {  echo $fetch['member_contact_no']; }?>
  
 


</tr>



<?php $i++; } ?>
</table>
<?php 


}


else {

	echo "<span id='nope' class='label label-danger'>No records found. Please refine your search and try again with a different search criterion!!</span>";
}

