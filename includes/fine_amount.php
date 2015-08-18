<?php $rs=$this->db->query("select * from  fine_amount_master_per_day");  

foreach($rs->result() as $rws){

	$fine=$rws->fine_amount_slab;



}

?>