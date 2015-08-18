<?php $members=$this->db->query("select * from members where id='$mid'");

foreach($members->result() as $brow){

$name=$brow->member_name;
$contact=$brow->member_contact_no;
 
$desc=$brow->member_description;
  
 


}