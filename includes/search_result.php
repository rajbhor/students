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
$acc=$_POST['acc'];
$btitle=$_POST['btitle'];
$author=$_POST['author'];
$publication=$_POST['publication'];
$pyear=$_POST['pyear'];
$isbn=$_POST['isbn'];
$volume=$_POST['volume'];
$lang=$_POST['lang'];
$category=$_POST['category'];
$availability=$_POST['availability'];
$circulation=$_POST['circulation'];
$sql="select * from book_base where ";
if($acc!='' || !empty($acc)){

	$sql.=" accession_no LIKE '$acc' and ";
}

if($btitle!='' || !empty($btitle)){

$sql.=" book_title LIKE '$btitle' and ";
}
 
 if($author!='' || !empty($author)){

$sql.=" author_name LIKE '$author' and ";
}

 
 if($publication!='' || !empty($publication)){

$sql.=" publication_name LIKE '$publication' and ";
}

 
 if($pyear!='' || !empty($pyear)){

$sql.=" publish_year LIKE '$pyear' and ";
}

 
 if($isbn!='' || !empty($isbn)){

$sql.=" ISBN LIKE '$isbn' and";
}

 
 if($volume!='' || !empty($volume)){

$sql.=" book_volume LIKE '$volume' and";
}

 
 if($lang!='' || !empty($lang)){

$sql.=" language_id LIKE $lang and ";
}


 
 if($category!='' || !empty($category)){

$sql.=" category_id LIKE $category and";
}


if($availability!='' || !empty($availability)){

$sql.=" availability LIKE '$availability' and";
}


if($circulation!='' || !empty($circulation)){

$sql.=" status LIKE '$circulation' and";
}
$sql.=" dump_status IN('0')";
$run=mysql_query($sql) or die(mysql_error()) ;

if(mysql_num_rows($run)>=1){?>
<style type="text/css">

th{
	text-align:center;
	}</style> <script type="text/javascript" charset="utf-8">
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
style="font-family:Segoe UI; font-weight:bold; font-size:11px">
	<thead>
		<tr>
			<th style="color:green;font-size:11px">#</th>
			<th style="color:green;font-size:11px">Accession #</th>
			<th style="color:green;font-size:11px">Title</th>
			<th style="color:green;font-size:11px">Author</th>
			<th style="color:green;font-size:11px">Publication</th>
			<th style="color:green;font-size:11px">Publish Year</th>
			<th style="color:green;font-size:11px">ISBN</th>
			<th style="color:green;font-size:11px">Vol.</th>
			<th style="color:green;font-size:11px">Language</th>
			<th style="color:green;font-size:11px">Category</th>
			<th style="color:green;font-size:11px">Status</th>


		</tr>
	</thead>
<?php  $i=1; while($fetch=mysql_fetch_array($run)){  ;?>

<tr>
<td style="color:#3b5999" align="center"><?php echo $i;?></td>
 
<td style="color:#3b5999;font-size:11px;" align="center"><?php echo $fetch['accession_no'];?><br/><a target="_blank" href="<?php echo $site;?>/book/viewBook/<?php echo base64_encode($fetch['accession_no']);?>"><span title="View Book Details" class="label label-primary"><i class="fa fa-search"></i> </span></a></td>
 
<td style="color:green; font-size:11px; width:150px"><?php echo $fetch['book_title'];?></td>
 <td style="color:darkblue;font-size:11px; width:180px" align=""> 
<?php  if($fetch['author_name']=='Not Available'){
	echo "<span title='This information is not available' style='' class='label label-danger'>Not Available</span></td>";} 
else {  echo $fetch['author_name']; }?>
</td>
 
<td style="color:#FF8C00;font-size:11px; width:150px" align="center"><?php  if($fetch['publication_name']=='Not Available'){ 
	echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo $fetch['publication_name']; }?></td>
 
<td style="color:#8B0000;font-size:11px; width:120px" align="center">

<?php  if($fetch['publish_year']=='Not Available'){ echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo $fetch['publish_year']; }?>
	 </td>
<td  style="color:#4B088A;;font-size:11px; width:120px" align="center">

<?php  if($fetch['ISBN']=='Not Available' || $fetch['ISBN']=='Not available' || $fetch['ISBN']=='NOT AVAILABLE' ){ echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo $fetch['ISBN']; }?>
	 </td>
<td  style="color:#4B088A;font-size:11px; width:120px" align="center">

<?php  if($fetch['book_volume']=='Not Available'){ echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo $fetch['book_volume']; }?>
	 </td>
<td  style="color:#4B088A" align="center">
<?php  if($fetch['language_id']=='Not Available'){ echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo getlanguage($fetch['language_id']); }?>
</td>
<td  style="color:#4B088A" align="center">
<?php  if($fetch['category_id']=='0' || $fetch['category_id']==0){ 
	echo "<span title='This category information is unknown' class='label label-danger'>Unknown</span>";} 
else { echo getCategory($fetch['category_id']); }?>
</td>
<td  style="color:#4B088A" align="center"><?php if($fetch['availability']=='available'){ 
	echo "<span title='This book is currently available and can be issued' class='label label-success'>Available</span>"; } 
else { //issued
echo "<span title='This book is currently unavailable and cannot be issued' class='label label-danger'>Unavailable</span>";

}
	 ?>

<?php if($fetch['status']=='circulate'){?><small title="This book is meant for circulation and issue" style="font-size:10px; color:orange">
<?php echo "Circulation";?>
</small>
<?php }  else { ?>

<small title="This book cannot be circulated and its issue is restricted" style="font-size:10px; color:orange">
<?php echo "Restricted";?>
</small>

<?php } ?>
</td>


</tr>



<?php $i++; } ?>
</table>
<?php 


}


else {

	echo "<span id='nope' class='label label-danger'>No records found. Please refine your search and try again with a different search criterion!!</span>";
}

