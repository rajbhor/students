<?php $qa=$this->db->query("select * from  book_acquisition_limit");
foreach($qa->result() as $l){

	$limit=$l->a_limit;
}