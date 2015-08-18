<?php $books=$this->db->query("select * from book_base where accession_no='$bid'");

foreach($books->result() as $brow){

$btitle=$brow->book_title;
$bvol=$brow->book_volume;
$pyear=$brow->publish_year;
$pub=$brow->publication_name;
$author=$brow->author_name;
$isbn=$brow->ISBN;
$lang=$brow->language_id;
$desc=$brow->book_description;
$price=$brow->price;
$cat=$brow->category_id;
 
$stat=$brow->status;
$availability=$brow->availability;

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

}