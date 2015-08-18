<?php 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dibrugarh University </title>
<style type="text/css">
body,th,th {
	font-size: 15px; 
	font-family:arial;
	margin:0px;
	padding:0px;
	text-decoration:none;
	font-weight: normal;
}
th{
	border:1px solid black;
	text-decoration:none;
	
}
.wrpzan{
	height:780px;
	width:1235px; 
	margin-left:auto;
	margin-right:auto; 
}
.wrpzan .containerzan{
	height:680px;
	float:left;
	width:395px;
	margin:0 7px; 
}
</style>

</head>

<body>
<div class="wrpzan">
		<div class="containerzan">
			<table width="380"  style="border:1px solid black;border-collapse:collapse;">
			  <tr>
			    <th colspan="3" align="center"><strong>PNB Fee Account</strong></th>
			  </tr>
			  
			  <tr>
			    <th colspan="3"  align="center"><em>STUDENT'S COPY</em></th>
			  </tr>
			  <tr>
			    <th width="100" height="39" align="center"><img src="images/logo.JPG" width="33" height="35"/></th>
			    <th colspan="2">Dibrugarh University, Dibrugarh 784028</th>
			  </tr>
			  <tr>
			    <th colspan="3" align="center">Fee Payment Challan</th>
			  </tr>
			  <tr> 
			    <th colspan="3" align="center">Dibrugarh University Fee Collection Account Number</th>
			  </tr>
			  <tr>
			    <th><strong>PUNJAB NATIONAL BANK</strong></th>
			    <th colspan="2" align="center"><strong>0909090909</strong></th>
			  </tr>
			  <tr>
			    <th><div align="center">Branch Name</div></th>
			    <th width="98"><div align="center">Branch Code</div></th>
			    <th width="103"><div align="center">Date</div></th>
			  </tr>
			  <tr>
			    <th height="20">&nbsp;</th>
			    <th height="20">&nbsp;</th>
			    <th height="20">&nbsp;</th>
			  </tr>
              <tr>
			    <th height="28">Student ID</th>
			    <th colspan="2"><b> <?php echo $fno;?></b></th>
			  </tr>
			  <tr>
			    <th height="28">Student Name</th>
			    <th colspan="2"><b> <?php echo $s1['name'];?></b></th>
			  </tr>
			   <tr>
			    <th height="28">Father's Name</th>
			    <th colspan="2"><b><?php echo $fname;?></b></th>
			  </tr>
			  <tr>
			    <th height="28">Phone Number</th>
			    <th colspan="2"><b><?php echo $s2['phone'];?></b></th>
			  </tr>
			  <tr>
			    <th height="30">Email</th>
			    <th colspan="2"><b><?php echo $s2['email'];?></b></th>
			  </tr>
			  <tr>
			    <th height="30">Progm./Dept./Sem</th>
			    <th colspan="2"><?php echo $pname.'('.$pcode.')' ?></th>
			  </tr>
			  <tr>
			    <th height="20"><div align="center">Fee Code</div></th>
			    <th height="20">Fee Particulars</th>
			    <th height="20">Rs.</th>
			  </tr>
			  <tr>
			    <th height="20"><div align="center">A</div></th>
			    <th height="20">Form Fee</th>
			    <th height="20"><?php echo $mprice;?></th>
			  </tr>
			  <tr>
			    <th height="20"><div align="center">B</div></th>
			    <th>Bank Charge</th>
			    <th>30</th>
			  </tr>
			  <tr>
			    <th height="20">&nbsp;</th>
			    <th><div align="center">Total</div></th>
			    <th colspan="2"><?php
			    				echo $mprice+30;
			     ?>			    </th>
			  </tr>
			  <tr>
			     <th height="20" colspan="3"> <div  style="margin: 0 0 28px;">
			       <div align="left">Amount in words:</div>
			       <div style="text-align:right">
			       	<b><?php echo $wrd ?></b>			       </div>
			    </div>			    </th>
			  </tr>
			  <tr>
			    <th height="20">Nature of payment</th>
			    <th colspan="2">&nbsp;</th>
			  </tr>
			  <tr>
			    <th height="43" colspan="3"><div align="right" style="margin: 24px 0 0;">Signature of the candidate/Remitter</div></th>
			  </tr>
			  <tr>
			    <th colspan="3" height="20"><div align="left">For Bank use only &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.</div></th>
			  </tr>
			  <tr>
			    <th colspan="3" height="20"><div align="left"><strong>Journal No:</strong></div></th>
			  </tr>
			  <tr>
			    <th height="53" colspan="3"><div  style="margin: 34px 0 0;">
			      <div align="left" style="float:left; width:190px;">Seal/Date</div>
			      <div align="right" style="float:left">Authorizad Signatory</div>
			    </div></th>
			  </tr>
			  <tr>
			    <th colspan="3">Keep this copy with you<br/>&nbsp; </th>
			  </tr>
			</table>
		</div>
		<div class="containerzan">
          <table width="380"  style="border:1px solid black;border-collapse:collapse;">
            <tr>
              <th colspan="3" align="center"><strong>PNB Fee Account</strong></th>
            </tr>
            <tr>
              <th colspan="3"  align="center"><em>DUBRUGARH UNIVERSITY COPY</em></th>
            </tr>
            <tr>
              <th width="100" height="39" align="center"><img src="images/logo.JPG" width="33" height="35"/></th>
              <th colspan="2">Dibrugarh University, Dibrugarh 784028</th>
            </tr>
            <tr>
              <th colspan="3" align="center">Fee Payment Challan</th>
            </tr>
            <tr>
              <th colspan="3" align="center">Dibrugarh University Fee Collection Account Number</th>
            </tr>
            <tr>
              <th><strong>PUNJAB NATIONAL BANK</strong></th>
              <th colspan="2" align="center"><strong>0909090909</strong></th>
            </tr>
            <tr>
              <th><div align="center">Branch Name</div></th>
              <th width="98"><div align="center">Branch Code</div></th>
              <th width="103"><div align="center">Date</div></th>
            </tr>
            <tr>
              <th height="20">&nbsp;</th>
              <th height="20">&nbsp;</th>
              <th height="20">&nbsp;</th>
            </tr>
            <tr>
			    <th height="28">Student ID</th>
			    <th colspan="2"><b> <?php echo $fno;?></b></th>
			  </tr>
            <tr>
              <th height="28">Student Name</th>
              <th colspan="2"><b> <?php echo $s1['name'];?></b></th>
            </tr>
            <tr>
              <th height="28">Father's Name</th>
              <th colspan="2"><b><?php echo $fname;?></b></th>
            </tr>
            <tr>
              <th height="28">Phone Number</th>
              <th colspan="2"><b><?php echo $s2['phone'];?></b></th>
            </tr>
            <tr>
              <th height="30">Email</th>
              <th colspan="2"><b><?php echo $s2['email'];?></b></th>
            </tr>
            <tr>
              <th height="30">Progm./Dept./Sem</th>
              <th colspan="2"><?php echo $pname.'('.$pcode.')' ?></th>
            </tr>
            <tr>
              <th height="20"><div align="center">Fee Code</div></th>
              <th height="20">Fee Particulars</th>
              <th height="20">Rs.</th>
            </tr>
            <tr>
              <th height="20"><div align="center">A</div></th>
              <th height="20">Form Fee</th>
              <th height="20"><?php echo $mprice;?></th>
            </tr>
            <tr>
              <th height="20"><div align="center">B</div></th>
              <th>Bank Charge</th>
              <th>30</th>
            </tr>
            <tr>
              <th height="20">&nbsp;</th>
              <th><div align="center">Total</div></th>
              <th colspan="2"><?php echo $mprice;?></th>
            </tr>
            <tr>
              <th height="20" colspan="3"> <div  style="margin: 0 0 28px;">
                  <div align="left">Amount in words:</div>
                <div style="text-align:right"> <b><?php echo $wrd ?></b> </div>
              </div></th>
            </tr>
            <tr>
              <th height="20">Nature of payment</th>
              <th colspan="2">&nbsp;</th>
            </tr>
            <tr>
              <th height="43" colspan="3"><div align="right" style="margin: 24px 0 0;">Signature of the candidate/Remitter</div></th>
            </tr>
            <tr>
              <th colspan="3" height="20"><div align="left">For Bank use only &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.</div></th>
            </tr>
            <tr>
              <th colspan="3" height="20"><div align="left"><strong>Journal No:</strong></div></th>
            </tr>
            <tr>
              <th height="53" colspan="3"><div  style="margin: 34px 0 0;">
                  <div align="left" style="float:left; width:190px;">Seal/Date</div>
                <div align="right" style="float:left">Authorizad Signatory</div>
              </div></th>
            </tr>
            <tr>
              <th colspan="3">Attach this copy with the printed application form <br/>&nbsp;</th>
            </tr>
          </table>
	  </div>
		<div class="containerzan">
          <table width="380"  style="border:1px solid black;border-collapse:collapse;">
            <tr>
              <th colspan="3" align="center"><strong>PNB Fee Account</strong></th>
            </tr>
            <tr>
              <th colspan="3"  align="center"><em>BANK'S COPY</em></th>
            </tr>
            <tr>
              <th width="100" height="39" align="center"><img src="images/logo.JPG" width="33" height="35"/></th>
              <th colspan="2">Dibrugarh University, Dibrugarh 784028</th>
            </tr>
            <tr>
              <th colspan="3" align="center">Fee Payment Challan</th>
            </tr>
            <tr>
              <th colspan="3" align="center">Dibrugarh University Fee Collection Account Number</th>
            </tr>
            <tr>
              <th><strong>PUNJAB NATIONAL BANK</strong></th>
              <th colspan="2" align="center"><strong>0909090909</strong></th>
            </tr>
            <tr>
              <th><div align="center">Branch Name</div></th>
              <th width="98"><div align="center">Branch Code</div></th>
              <th width="103"><div align="center">Date</div></th>
            </tr>
            <tr>
              <th height="20">&nbsp;</th>
              <th height="20">&nbsp;</th>
              <th height="20">&nbsp;</th>
            </tr>
            <tr>
			    <th height="28">Student ID</th>
			    <th colspan="2"><b> <?php echo $fno;?></b></th>
			  </tr>
            <tr>
              <th height="28">Student Name</th>
              <th colspan="2"><b> <?php echo $s1['name'];?></b></th>
            </tr>
            <tr>
              <th height="28">Father's Name</th>
              <th colspan="2"><b><?php echo $fname;?></b></th>
            </tr>
            <tr>
              <th height="28">Phone Number</th>
              <th colspan="2"><b><?php echo $s2['phone'];?></b></th>
            </tr>
            <tr>
              <th height="30">Email</th>
              <th colspan="2"><b><?php echo $s2['email'];?></b></th>
            </tr>
            <tr>
              <th height="30">Progm./Dept./Sem</th>
              <th colspan="2"><?php echo $pname.'('.$pcode.')' ?></th>
            </tr>
            <tr>
              <th height="20"><div align="center">Fee Code</div></th>
              <th height="20">Fee Particulars</th>
              <th height="20">Rs.</th>
            </tr>
            <tr>
              <th height="20"><div align="center">A</div></th>
              <th height="20">Form Fee</th>
              <th height="20"><?php echo $mprice;?></th>
            </tr>
            <tr>
              <th height="20"><div align="center">B</div></th>
              <th>Bank Charge</th>
              <th>30</th>
            </tr>
            <tr>
              <th height="20">&nbsp;</th>
              <th><div align="center">Total</div></th>
              <th colspan="2"><?php echo $mprice;?></th>
            </tr>
            <tr>
              <th height="20" colspan="3"> <div  style="margin: 0 0 28px;">
                  <div align="left">Amount in words:</div>
                <div style="text-align:right"> <b><?php echo $wrd ?></b> </div>
              </div></th>
            </tr>
            <tr>
              <th height="20">Nature of payment</th>
              <th colspan="2">&nbsp;</th>
            </tr>
            <tr>
              <th height="43" colspan="3"><div align="right" style="margin: 24px 0 0;">Signature of the candidate/Remitter</div></th>
            </tr>
            <tr>
              <th colspan="3" height="20"><div align="left">For Bank use only &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.</div></th>
            </tr>
            <tr>
              <th colspan="3" height="20"><div align="left"><strong>Journal No:</strong></div></th>
            </tr>
            <tr>
              <th height="53" colspan="3"><div  style="margin: 34px 0 0;">
                  <div align="left" style="float:left; width:190px;">Seal/Date</div>
                <div align="right" style="float:left">Authorizad Signatory</div>
              </div></th>
            </tr>
            <tr>
              <th colspan="3">Bank will retain this copy <br/>&nbsp;
</th>
            </tr>
          </table>
  </div>
	</div>
 
</body>
</html>