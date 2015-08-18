<?php $base="http://localhost/LMS/";
$site="http://localhost/LMS/index.php";?>
  
<?php require("auto_connect.php");
require('fine_amount_sql.php');
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
  
 
$mid=$_POST['mid'];
$first=mysql_query("select * from members where id='$mid'");
if(mysql_num_rows($first)==1) { //else wrong user
	$frow=mysql_fetch_array($first);
	$mname=$frow['member_name'];
$run=mysql_query("select * from book_base a, book_issue_storage_handler b,members c where a.accession_no=b.book_acc_no 
	and a.status='circulate' and a.availability='issued' and b.issued_to_member_id='$mid' and c.id=b.issued_to_member_id and c.id='$mid'");
if(mysql_num_rows($run)>=1){
?>

 <span id="lister" class="label label-success"><i class="glyphicon glyphicon-book"></i> 
  List of books issued to <a style="font-weight:bold; color:#3B5999" href="<?php echo $site;?>/member/viewMember/<?php echo base64_encode($mid);?>" target="_blank" title="View member"><?php echo $mname;?></a></span>

<style type="text/css">

th{
	text-align:center;
	}

	table tbody td {
padding: 7px 25px;
font-size: 12px;
}

	
	</style> 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="80%" 
style="font-family:Segoe UI; font-weight:bold; font-size:15px; min-width:750px">
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
<script type="text/javascript">
  $(document).ready(function(){
    
    $("#return_<?php echo $fetch['accession_no'];?>").click(function(){
       
       $("#view_<?php echo $fetch['accession_no'];?>").hide();
        $("#return_<?php echo $fetch['accession_no'];?>").hide();
      var acc="<?php echo $fetch['accession_no'];?>";
      var mid="<?php echo $mid;?>"
     if(acc!='' && mid!=''){
      var dataString = {'acc':acc, 'mid':mid};
      $.ajax({
        url: '<?php echo $base;?>includes/return_book.php',
          type: 'POST',
          dataType: 'json',
           data: dataString,
   beforeSend: function() {
              $("#img_<?php echo $fetch['accession_no'];?>").show();
              $("#message_<?php echo $fetch['accession_no'];?>").show();
        },
          success: function(data) {
          	if(data.message=='Done' && data.num>=1){
              $("#img_<?php echo $fetch['accession_no'];?>").hide();
               $("#message_<?php echo $fetch['accession_no'];?>").hide();

               $("#row_<?php echo $fetch['accession_no'];?>").hide();

           }
           else if(data.message=='Done' && data.num==0){

  $("#img_<?php echo $fetch['accession_no'];?>").hide();
               $("#message_<?php echo $fetch['accession_no'];?>").hide();

               $("#row_<?php echo $fetch['accession_no'];?>").hide();

               $("#genericmsg").show();

               $("table#example").hide();
                $("span#lister").hide();

           }

              
              


          }
      });
    }
    else {
   
     // alert("Please enter accession number and member code to proceed!!");
      //$("#mid").focus();
    }
    });
  });
</script>


<tr id="row_<?php echo $fetch['accession_no'];?>">
 
<td style="color:#3b5999" align="center"><?php echo $fetch['accession_no'];?>

<a id="view_<?php echo $fetch['accession_no'];?>" target="_blank" href="<?php echo $site;?>/book/viewBook/<?php echo base64_encode($fetch['accession_no']);?>"><span title="View Book Details" class="label label-primary"><i class="fa fa-search"></i> </span></a>


<a title="Return Book | Withdraw issue against this book (<?php echo $fetch['accession_no'];?>) from <?php echo $mname;?>" href="#" id="return_<?php echo $fetch['accession_no'];?>"><span title="Return Book | Withdraw issue against this book (<?php echo $fetch['accession_no'];?>) from <?php echo $mname;?>" class="label label-success"><i class="fa fa-share-square-o"></i> Return </span></a>
<?php  $return_date=$fetch['expected_return_date']; 
$date1 = date('d-m-Y');
$date2 = $return_date;

$sysdate=strtotime($date1);
$returndate=strtotime($date2);
  if($sysdate>$returndate) {
    echo "<br/>";
$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

//printf("%d years, %d months, %d days\n", $years, $months, $days);
$total_days=$years*365+$months*30+$days;
$md=$mid;
$mn=$fetch['member_name'];
$b=$fetch['accession_no'];

$fa=$total_days*$fine;
$fas=sprintf("%0.2f",$fa);
$finemsg="Since the expected return date for this book has exceeded, so a fine amount of Rs. $fas has been charged on this member 
based on a per day fine of Rs. $fine";?>
<style type="text/css">

.popover{

  text-align: justify;
}
</style>

<a title="Fine Details. Click to See" href="#fineshow" data-toggle="modal"><span  style="text-align:justify" 
data-popover='popover' data-original-title="Total Fine Amount: Rs. <?php echo $fas;?> only.                    
Return Date: <?php echo $fetch['expected_return_date'];?>  " 
data-content="<?php echo $finemsg;?>"
data-placement='bottom' data-trigger='hover' 
class='label label-danger'>Fine:<i class='fa fa-inr'></i><?php echo sprintf("%0.2f",$total_days*$fine);?> 
</span>
</a>

 <div   id="fineshow"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title" style="text-align:left">Fine Details  &raquo; 
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> 
                                                        for <?php echo $fetch['member_name'];?></small></h5>
                                                </div>
                                                  
                                                <div class="modal-body">
                                           
<p style="text-align:left; color:red">
<?php  $accs=$fetch['accession_no'];

$finemsg="Since the expected return date for this book bearing accession number $accs  has exceeded, 
so a fine amount of Rs. $fas has been charged on this member 
based on a per day fine of Rs. $fine";
echo $finemsg;?>
</p>

  
                                                </div>
                                                


                                                <div class="modal-footer" style="display:">
                                                    

                  <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo "Fine amount on a book may subject to change under the jurisdication of the library authorised official, whenever necessary!!";?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>











 
<?php ?>   
<?php 
}   



else {// do nothing


}


?>
<span style="display:none;" id="message_<?php echo $fetch['accession_no'];?>" style="" class="label label-default">
<img title="Loading.." alt="Loading.."  style="display:none;width:12%" id="img_<?php echo $fetch['accession_no'];?>" src="<?php echo $base;?>images/ajax_loader_blue_512.gif">
Processing..</span>
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
echo "<span title='This book is currently issued to $mname' class='label label-danger'><i class='glyphicon glyphicon-ok'></i> Issued</span>";

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



<?php $i++; } // endwhile ?>
</table>






<?php } // end of 2nd if 

else {
echo "<br/>";

echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> 
Sorry,no books are issued against this member code yet. Please check and try again 
with a legal member code!!</span>";


}


} //end of 1st if

else {

echo "<br/>";

echo "<span id='nope' class='label label-danger' style='float:left'><i class='fa fa-warning'></i> 
Sorry,the member code is invalid. Please check and try again 
with a different member code!!</span>";


}

 ?>
 <span style="display:none;" id="genericmsg" style="" class="label label-warning">

<i class="glyphicon glyphicon-ok"></i> All books that were issued against this member have been received back successfully. You may now refine your query with another member code!!
</span>
 
