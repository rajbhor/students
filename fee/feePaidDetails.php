<style type="text/css">
  .fixed_headers {
  width: @table_width;
  table-layout: fixed;
  border-collapse: collapse;
  
  th { text-decoration: underline; }
  th, td {
    padding: 5px;
    text-align: left;
  }
</style>    
    <script type="text/javascript">
$(document).ready(function(){

$("#sc").fadeOut(100000);

});

$(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

 </script>
  <div class="cl-mcont">
    
       <?php if(@$_GET['response']!=''){ ?>
  <center>
  <div id="sc" class="label label-success" style="width:700px; font-family:Segoe UI">  
  <a  onclick="$('#sc').hide()" class="close" data-dismiss="alert" style="float:right; cursor:pointer">
    <span id="success" class="glyphicon glyphicon-remove"></span></a>  
  <strong></strong> <?php echo base64_decode(@$_GET['response']);?>.
</div>
  </center>
<?php } ?>


 <?php if(@$_GET['errorResponse']!=''){ ?>
  <center>
  <div id="sc" class="label label-warning" style="width:700px; font-family:Segoe UI">  
  <a  onclick="$('#sc').hide()" class="close" data-dismiss="alert" style="float:right; cursor:pointer">
    <span id="success" class="glyphicon glyphicon-remove"></span></a>  
  <strong>Success!</strong> <?php echo base64_decode(@$_GET['errorResponse']);?>.
</div>
  </center>
<?php } ?>

<div class="cl-mcont">

<div class="page-head">
      <h3   class="label label-success" style="font-size:19px">
        <i class="icon-list"></i> Details of fee paid &raquo; </h3>
     
<div id="display"></div>
      </div> 

     

<form name="student" id="student" action="<?php echo $base;?>actions/saveFee.php" method="post">

 
<?php  if($_SESSION['branch_type']=='dept'){
$q=mysql_query("select * from department where dept_code=$deptcode");
$dep=mysql_fetch_array($q);
 
}
?>
<style>

</style>
						    
<div id="displayed">
<div class="row">
     <div STYLE=" height: 600px; width: auto; font-size: 12px; overflow: auto;">
     	<table class="fixed-header pure-table pure-table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student ID</th><th>Student Name</th><th>Order ID</th><th>Payment Mode</th><th>Semester </th><th>Email </th><th>Phone </th><th >Department </th><th >Course </th><th>Total amount</th><th>Status</th><th>Transaction id</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php $order=mysql_query("SELECT * FROM `order`");
                    while($rows = mysql_fetch_array($order))
                    {
                       
                       echo "<tr>"."<td>".$rows['customer_id']."</td><td>".$rows['student_name']."</td><td>".$rows['order_id']."</td><td>".$rows['payment_mode']."</td><td>".$rows['semester']."</td><td>".$rows['Customer_email']."</td><td>".$rows['Customer_phone']."</td><td>".$rows['department']."</td><td>".$rows['course']."</td><td>".$rows['total_amount']."</td><td>".$rows['status']."</td><td>".$rows['trans_id']."</td>"."</tr>";
                       
                    }              

                    ?>
                                    
                                </tbody>
                                
                            </table>  
		
     </div>
</div>
</div>