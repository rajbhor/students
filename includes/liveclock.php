 <script type="text/javascript">

var mydate= new Date()
var theyear=mydate.getFullYear()
var themonth=mydate.getMonth()+1
var thetoday=mydate.getDate()
//document.write("<br/>");
//var mytime="<font style='float:right' size='1' face='Segoe UI' ><b>Date : "thetoday+"/"+themonth+"/"+theyear+"</b></font>";

//document.getElementById("liveclock").innerHTML=mytime;
 
</script> 

<span class="label label-success" id="liveclock" style="position:; float:right;font-size:12px; font-weight:bold">
	
</span>

<span class="label label-warning"  style="position:; float:right; font-size:14px; font-weight:bold">

<?php date_default_timezone_set("Asia/Kolkata");
	$msg_time =date("jS F Y");; // current time;
	echo $msg_time;?>
</span> 

<script type="text/javascript">
function show5(){


	  

 if (!document.layers&&!document.all&&!document.getElementById)
 return
 var Digital=new Date()
 var hours=Digital.getHours()
 var minutes=Digital.getMinutes()
 var seconds=Digital.getSeconds()
 var dn="AM" 
 if (hours>12){
 dn="PM"
 hours=hours-12
 }
 if (hours==0)
 hours=12
 if (minutes<=9)
 minutes="0"+minutes
 if (seconds<=9)
 seconds="0"+seconds
//change font size here to your desire
myclock="<font size='2' face='Segoe UI' ><b><font size='2'>Time</font>: "+hours+":"+minutes+":"+seconds+" "+dn+"</b></font>"

if (document.layers){
document.layers.liveclock.document.write(myclock)
document.layers.liveclock.document.close()
}
else if (document.all)
liveclock.innerHTML=myclock
else if (document.getElementById)
document.getElementById("liveclock").innerHTML=myclock
setTimeout("show5()",1000)
 }


 
</script>

