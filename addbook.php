<!DOCTYPE html>
<html lang="en">
<head>

   <?php require("includes/config.php");?>
    <?php require("includes/libraryinfo.php");?>
      <?php require("includes/loginfo.php");?>
<?php require("includes/logincheck.php");?>

      <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?><?php echo $crmlogo;?>"/>
  
  <!-- Bootstrap core CSS -->
<?php require("includes/style.php");?>
<?php require("includes/javascript.php");?>
<?php require("includes/meta.php");?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/jquery.autocomplete.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.autocomplete.js"></script> 
 <script>
$(document).ready(function(){

   
$("#author").autocomplete("<?php echo base_url();?>includes/autocomplete_author_name.php", {
    selectFirst: false
  });

  
});
</script>
<script>
$(document).ready(function(){
   
$("#publication").autocomplete("<?php echo base_url();?>includes/autocomplete_publication_name.php", {
    selectFirst: false
  });

  
});
</script>
 
</head>
<body>

  <!-- Fixed navbar -->
  <?php require("includes/head.php");?>
  <?php require("includes/sidebar.php");?>
  <div class="container-fluid" id="pcont">

    <div class="page-head">
      <h3 class="label label-success" style="font-size:19px"><i class="fa fa-plus"></i> <?php echo $title;?></h3>
      
    </div> 

    <div class="cl-mcont">
       <?php if(@$_GET['msg']!=''){ ?>
  <center>
  <div id="sc" class="alert alert-success" style="width:700px; font-family:Segoe UI">  
  <a  onclick="$('#sc').hide()" class="close" data-dismiss="alert" style="float:right; cursor:pointer">
    <span id="success" class="glyphicon glyphicon-remove"></span></a>  
  <strong>Success!</strong> <?php echo base64_decode(@$_GET['msg']);?>.
</div>
  </center>
<?php } ?>
      <?php echo form_open("book/addbook");?>
      <div class="col-md-6 form-group">
    <label for="title" style="color:red">Book Title</label>
    <input placeholder="Please enter book title here" class="form-control" required name="title" title="Please enter book title here" autocomplete="off" id="title" type="text"/>
</div>
<div class="col-md-6 form-group">
    <label for="author">Author Name</label>
    <input placeholder="You may enter author's name here" title="You may enter author's name" class="form-control" id="author" 
    name="author"  type="text"/>
</div>
<span class="clearfix">


    <div class="col-md-6 form-group">
    <label for="volume">Volume/Edition</label>
    <input placeholder="You may enter book edition or volume here" class="form-control"  name="volume" title="You may enter book edition or volume here" autocomplete="off" id="volume" type="text"/>
</div>
<div class="col-md-6 form-group">
    <label for="pyear">Publication Year</label>
    <input onkeypress="return isno(this);" maxlength="4" placeholder="You may enter publication year here" 
    title="You may enter publication year here" class="form-control" id="pyear" autocomplete="off" name="pyear" type="text"/>
</div>
<span class="clearfix">




    <div class="col-md-6 form-group">
    <label for="publication">Publication Name</label>
    <input placeholder="You may enter book publisher name here" class="form-control"  
    name="publication" title="You may enter book publisher name here" autocomplete="" id="publication" type="text"/>
</div>
<div class="col-md-6 form-group" style="display:none">
    <label for="isbn">ISBN</label>
    <input  maxlength="14" placeholder="You may enter ISBN here" title="You may enter ISBN here" class="form-control" 
    id="isbn" autocomplete="off" name="isbn" type="text"/>
</div>

<div class="col-md-6 form-group" style="display:">
    <label for="isbn">Price</label>
    <input  maxlength="4" parsley-type="number"    onkeypress="return isno(this);" 
    placeholder="You may enter cost price of the book here" title="You may enter cost price of the book here" 
    class="form-control" 
    id="price" autocomplete="off" name="price" type="text"/>
</div>
<span class="clearfix">



 <div class="col-md-6 form-group">
    <label for="lang" style="color:red">Language</label>
   <?php $l=$this->db->query("select * from languages order by id");?>
   <select title="Choose book language" class="form-control" name="lang" id="lang">

<?php foreach($l->result() as $r){?>
<option value="<?php echo $r->id;?>"><?php echo $r->lang_name;?></option>

<?php } ?>

</select>


</div>
<div class="col-md-6 form-group">
   <label for="category" style="color:red">Category</label>
   <?php $l1=$this->db->query("select * from categories order by catname");?>
   <select required title="Choose a book category" class="form-control" name="category" id="category">
<option value="0">Unknown</option>
<?php foreach($l1->result() as $r1){?>
<option value="<?php echo $r1->id;?>"><?php echo $r1->catname;?></option>

<?php } ?>

</select>
</div>
<span class="clearfix">

<div class="col-md-6 form-group">
    <label for="number" style="color:red">Quantity</label>
    <input parsley-type="number"  required onkeypress="return isno(this);" maxlength="3" 
    placeholder="You must enter the number of books in this entry that you want to add to library" class="form-control" 
    required name="qty" title="Please enter the number of books to be added" autocomplete="off" id="number" value="1" type="text"/>
</div>
<div class="col-md-6 form-group">
    <label for="desc">Description</label>
    <textarea  placeholder="You may enter some description here" title="You may enter some description here" 
    class="form-control" id="desc" autocomplete="off" name="desc" style="resize:none"></textarea>
</div>
<span class="clearfix">

    <script type="text/javascript">

function autofill(){

  
 $("#author").val('Not available');
 $("#volume").val('Not available');
 $("#pyear").val('Not available');
 $("#publication").val('Not available');

 $("#isbn").val('Not available');
  $("#price").val('Not available');
 $("#desc").val('Not available');
 



}

</script>
              
                <button type="submit" class="btn btn-success">Add Book(s)</button>
                 <button title="Click here to auto fill some less important fields" type="button" onclick="autofill()" class="btn btn-warning">Autofill</button>
                <button type="reset" class="btn btn-default">Cancel</button>&nbsp;

                <small style="color:darkgrey; font-weight:bold"><?php echo $learn;?></small>
              
    </div>

  </div> 
 
</body>
</html>
