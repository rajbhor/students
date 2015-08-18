<?php $q2=mysql_query("select * from g_settings where crm_status=0");
while($r=mysql_fetch_array($q2)){
	
	$cname=$r['company_name'];
	 
	$crmemail=$r['crm_helpdesk_email'];
	$crmlastmodified=$r['crm_settings_last_modified'];
	$crmdesc=$r['crm_description'];
	$crmlogo=$r['crm_logo'];
	$crmhelpline=$r['crm_helpline_number'];
	$crmhelpline_second=$r['crm_helpline_number_second'];
	if($crmhelpline_second==NULL || empty($crmhelpline_second) || $crmhelpline_second==''){
		
		$crmhelpline_second="";
		
		}
	
	$crmcity=$r['city'];
	$crmcountry=$r['country'];
	
	$crmstate=$r['state'];
	
	if($crmstate==NULL || empty($crmstate) || $crmstate==''){
		
		$crmstate="N/A";
		
		}
	
	
	$crmpocode=$r['pocode'];
	if($crmpocode==NULL || empty($crmpocode) || $crmpocode==''){
		
		$crmpocode="N/A";
		
		}
	
	$crmaddr=$r['address'];
	if($crmaddr==NULL || empty($crmaddr) || $crmaddr==''){
		
		$crmaddr="N/A";
		
		}
		
		
		 
	
	$crmweb=$r['web'];
	 
	$estd=$r['company_estd_on'];
	 
	
	$lastmod=$r['crm_settings_last_modified'];
	$short=$r['short_form'];
}

 

?>