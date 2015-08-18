<?php $base="http://localhost/LMS/";
$site="http://localhost/LMS/index.php";?>
  
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
 require("auto_connect.php");
$acc=$_POST['acc'];
$mid=$_POST['mid'];
$first=mysql_query("select * from book_base where accession_no='$acc'");
if(mysql_num_rows($first)==1) { //else wrong accession number
$run=mysql_query("select * from book_base where accession_no='$acc' and status='circulate' and availability='available'");
if(mysql_num_rows($run)==1){
?>

 <span class="label label-success"><i class="glyphicon glyphicon-ok"></i> Book is available for issue</span>

<style type="text/css">

th{
	text-align:center;
	}

	table tbody td {
padding: 7px 28px;
font-size: 12px;
}

	
	</style> 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" 
style="font-family:Segoe UI; font-weight:bold; font-size:15px;min-width:307%">
	<thead>
		<tr>
			 
			<th style="color:green;">Accession #</th>
			<th style="color:green;">Title</th>
			<th style="color:green;">Author</th>
			<th style="color:green;">Publication</th>
			<th style="color:green;">Year</th>
			<th style="color:green;">ISBN</th>
			<th style="color:green;">Vol.</th>
			<th style="color:green;">Language</th>
			<th style="color:green;">Category</th>
			<th style="color:green;">Status</th>


		</tr>
	</thead>
<?php  $i=1; while($fetch=mysql_fetch_array($run)){  ;?>

<tr>
 
<td style="color:#3b5999" align="center"><?php echo $fetch['accession_no'];?>

<br/><a id="view_<?php echo $fetch['accession_no'];?>" target="_blank" href="<?php echo $site;?>/book/viewBook/<?php echo base64_encode($fetch['accession_no']);?>"><span title="View Book Details" class="label label-primary"><i class="fa fa-search"></i> </span></a>
</td>
 
<td style="color:green;" ><?php echo $fetch['book_title'];?></td>
 <td style="color:darkblue;" align=""> 
<?php  if($fetch['author_name']=='Not Available'){
	echo "<span title='This information is not available' style='' class='label label-danger'>Not Available</span></td>";} 
else {  echo $fetch['author_name']; }?>
</td>
 
<td style="color:#FF8C00;" align="center"><?php  if($fetch['publication_name']=='Not Available'){ 
	echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo $fetch['publication_name']; }?></td>
 
<td style="color:#8B0000;" align="center">

<?php  if($fetch['publish_year']=='Not Available'){ echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo $fetch['publish_year']; }?>
	 </td>
<td  style="color:#4B088A;" align="center">

<?php  if($fetch['ISBN']=='Not Available' || $fetch['ISBN']=='Not available' || $fetch['ISBN']=='NOT AVAILABLE' ){ echo "<span title='This information is not available' class='label label-danger'>N/A</span>";} 
else { echo $fetch['ISBN']; }?>
	 </td>
<td  style="color:#4B088A;" align="center">

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
echo "<span title='This book is currently issued to $name' class='label label-danger'><i class='glyphicon glyphicon-ok'></i> Issued</span>";

}
	 ?>

<?php if($fetch['status']=='circulate'){?><small title="This book is meant for circulation and issue" style=" color:orange">
<?php echo "Circulation";?>
</small>
<?php }  else { ?>

<small title="This book cannot be circulated and its issue is restricted" style=" color:orange">
<?php echo "Restricted";?>
</small>

<?php } ?>
</td>


</tr>



<?php $i++; } ?>
</table>

 

<?php $mem=mysql_query("select * from members where id='$mid'");
if(mysql_num_rows($mem)) {
$m=mysql_fetch_array($mem); ?>
<div class="col-md-6 form-group">
    <label for="title" style="color:"><small style class="label label-primary">
    	Member Code</small></label>
 <strong><?php echo $m['id'];?></strong>
  
 
  

          
  </div>
 <div class="col-md-6 form-group">
    <label for="title" style="color:"><small style class="label label-primary">
    	Member Name</small></label>
    	<br/>
    	<a target="_blank" title="View details: <?php echo $m['member_name'];?>" 
    		href="<?php echo $site;?>/member/viewMember/<?php echo base64_encode($m['id']);?>">
    		 <strong><i class="fa fa-search"></i> <?php echo $m['member_name'];?></strong></a>
  
 
  

          
  </div>







 <?php $qa=mysql_query("select * from  book_acquisition_limit");
 $ca=mysql_fetch_array($qa);
	$limit=$ca['a_limit']; //book maximum limit
 

$acq=mysql_query("select count(id) as cnts from  book_issue_storage_handler where issued_to_member_id='$mid'");
$c=mysql_fetch_array($acq);
$count=$c['cnts']; //user book taken count

if($count<$limit) { //book can be issued (if book is available) and display the books with the user if any ?>
 
<br/><a href="<?php echo $site;?>/issue/issueBookProfile/<?php echo $acc;?>/<?php echo $mid;?>"><span title="Issue this book to <?php echo $m['member_name'];?>(<?php echo $m['id'];?>)" id='iss' class='btn btn-success' style='float:left'><i class="fa fa-mail-reply-all"></i> ISSUE BOOK</span></a>

<?php $info=mysql_query("select * from  book_issue_storage_handler a, book_base b where a.issued_to_member_id='$mid' and 
	b.accession_no=a.book_acc_no and b.status='circulate' and b.availability='issued'");?>
	 &nbsp;<small style="color:darkgrey; font-weight:bold; font-size:9px">To learn more,contact software provider.</small>
	 <br/><br/><br/>
	
	<h2 style="font-size:18px" class="label label-warning"><i class='fa fa-book'></i> Book Acquisition Info &raquo; <?php echo $m['member_name'];?></h2>
<br/>
<br/>
	<?php 
if(mysql_num_rows($info)>=1){ //it may contain rows or may not?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="exampledd" 
style="font-family:Segoe UI; font-weight:bold; font-size:12px;min-width:307%">
	<thead>
		<tr>
			
			<th style="color:green;">Accession #</th>
			<th style="color:green;">Title</th>
			 
			<th style="color:green;">Issued On</th>
			<th style="color:green;">Category</th>
			<th style="color:green;">Status</th>



		</tr>
	</thead>
	<?php 

	while($infor=mysql_fetch_array($info)){ ?>

<tr>
 
<td style="color:#3b5999" align="center"><?php echo $infor['accession_no'];?>

<br/>

<a id="view_<?php echo $infor['accession_no'];?>" target="_blank" href="<?php echo $site;?>/book/viewBook/<?php echo base64_encode($infor['accession_no']);?>"><span title="View Book Details" class="label label-primary"><i class="fa fa-search"></i> </span></a>

</td>
 
<td style="color:green;" ><?php echo $infor['book_title'];?></td>
 
<td style="color:#FF8C00;" align="center"><?php 

 echo $infor['issued_on_date']; ?></td>
 
 
 
<td  style="color:#4B088A" align="center">
<?php  if($infor['category_id']=='0' || $infor['category_id']==0){ 
	echo "<span title='This category information is unknown' class='label label-danger'>Unknown</span>";} 
else { echo getCategory($infor['category_id']); }?>
</td>
<td  style="color:#4B088A" align="center"><?php if($infor['availability']=='available'){ 
	echo "<span title='This book is currently available and can be issued' class='label label-success'>Available</span>"; } 
else { //issued<?php echo 
	$names=$m['member_name'];
echo "<span title='This book is currently issued to $names' class='label label-danger'><i class='glyphicon glyphicon-ok'></i> Issued</span>";

}
	 ?>

<?php if($infor['status']=='circulate'){?><small title="This book is meant for circulation and issue" style=" color:orange">
<?php echo "Circulation";?>
</small>
<?php }  else { ?>

<small title="This book cannot be circulated and its issue is restricted" style=" color:orange">
<?php echo "Restricted";?>
</small>

<?php } ?>
</td>


</tr>



<?php   } ?>
</table>
<?php 
}
else { //book no acquisition

 

echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i>
No books are issued to this member yet!!</span>";
echo "<br/>";
}
 

  }

else { //cannot issue but display the books with the user

echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> 
Sorry, this book cannot be issued since the member has reached the maximum acqusition limit of $count books </span>";
echo "<br/>";


$info=mysql_query("select * from  book_issue_storage_handler a, book_base b where a.issued_to_member_id='$mid' and 
	b.accession_no=a.book_acc_no and b.status='circulate' and b.availability='issued'");
if(mysql_num_rows($info)>=1){ //trivial it will be there some rows coz maximum limit?>
<br/>
<br/><br/>
 <br/><hr/>
<h2 style="font-size:18px" class="label label-warning"><i class='fa fa-book'></i> Book Acquisition Info &raquo; 
	<?php echo $m['member_name'];?></h2>
 
<br/>
<br/>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="exampled"  
style="font-family:Segoe UI; font-weight:bold; font-size:12px;min-width:307%">
	<thead>
		<tr>
			 
			<th style="color:green;">Accession #</th>
			<th style="color:green;">Title</th>
			 
			<th style="color:green;">Issued On</th>
			<th style="color:green;">Category</th>
			<th style="color:green;">Status</th>



		</tr>
	</thead>


<?php 

	while($infor=mysql_fetch_array($info)){

 ?>

<tr>
 
<td style="color:#3b5999" align="center"><?php echo $infor['accession_no'];?>

	<br/>

<a id="view_<?php echo $infor['accession_no'];?>" target="_blank" href="<?php echo $site;?>/book/viewBook/<?php echo base64_encode($infor['accession_no']);?>"><span title="View Book Details" class="label label-primary"><i class="fa fa-search"></i> </span></a>

</td>
 
<td style="color:green;" ><?php echo $infor['book_title'];?></td>
  
 
<td style="color:#FF8C00;" align="center"><?php 
 echo $infor['issued_on_date']; ?></td>
 
 
 
<td  style="color:#4B088A" align="center">
<?php  if($infor['category_id']=='0' || $infor['category_id']==0){ 
	echo "<span title='This category information is unknown' class='label label-danger'>Unknown</span>";} 
else { echo getCategory($infor['category_id']); }?>
</td>
<td  style="color:#4B088A" align="center"><?php if($infor['availability']=='available'){ 
	echo "<span title='This book is currently available and can be issued' class='label label-success'>Available</span>"; } 
else { //issued
	$names=$m['member_name'];
echo "<span title='This book is currently issued to $names' class='label label-danger'><i class='glyphicon glyphicon-ok'></i> Issued</span>";

}
	 ?>

<?php if($infor['status']=='circulate'){?><small title="This book is meant for circulation and issue" style=" color:orange">
<?php echo "Circulation";?>
</small>
<?php }  else { ?>

<small title="This book cannot be circulated and its issue is restricted" style=" color:orange">
<?php echo "Restricted";?>
</small>

<?php } ?>
</td>


</tr>



<?php   } ?>
</table>

<?php }


}


}
else { //not a valid member
echo "<br/>";

echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> Sorry,but the member code is invalid. Please check and try again 
with a different member code!!</span>";


}

} 









 else {

echo "<br/>";
	echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> Sorry, this book is currently unavailable. Please try again with a different accession number!!</span>";


}


}


else {

echo "<br/>";
	echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> Sorry, but the accession number that you provided is invalid. Please check and try again with a different accession number!!</span>";



}
