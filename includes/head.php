<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-gear"></span>
        </button>
        <a   class="navbar-brand" ><?php echo $cname;?></a>
        
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class=""><a onclick="javascript:location.reload()"  href="#"><i class="fa fa-refresh"></i> Refresh</a></li>
          
      </ul>
           
    <ul class="nav navbar-nav navbar-right user-nav">
      <li class="dropdown profile_menu">
        <?php   if($type=='admin'){?>
        <a href="#" class="dropdown-toggle" title="Administrator" data-toggle="dropdown"><img style="width:20px" title="Administrator" alt="Avatar" src="<?php echo $base;?>images/ko.jpg" /><?php  echo $loggername;?> <b class="caret"></b></a>
        
<?php } else {?>

<a title="Department Operator" href="#" class="dropdown-toggle" data-toggle="dropdown"><img style="width:20px" title="Department Operator" alt="Avatar" src="<?php echo $base;?>images/prik.jpg" /><?php echo $loggername;?> <b class="caret"></b></a>
        
        <?php } ?>
         <?php if($type=='admin'){ ?>
        <ul class="dropdown-menu">
       <?php if($oppname!='' || !empty($oppname)){?>
         <li><a href="<?php echo $base;?>account.php"><i class="fa fa-user"></i> <?php echo  $oppname; ?></a></li>
         <?php } else { ?>

  <li><a href="<?php echo $base;?>account.php"><i class="fa fa-user"></i> <?php echo  "Account"; ?></a></li>
     <?php     }?>
         
           <li><a data-toggle="modal" href="#openchange"><i class="fa fa-text-height"></i> Change Title</a></li>
           <li><a href="<?php echo $base;?>actions/logout.php"><i class="fa fa-sign-out"></i> Sign Out</a></li>
        </ul>

      </li>
    </ul> 
    <?php } else {?>

  <ul class="dropdown-menu">
          <?php if($oppname!='' || !empty($oppname)){?>
            <li><a href="<?php echo $base;?>account.php"><i class="fa fa-user"></i> <?php echo  $oppname; ?></a></li>
         <?php } else { ?>

  <li><a href="<?php echo $base;?>account.php"><i class="fa fa-user"></i> <?php echo  "Account"; ?></a></li>
       <?php   }?>
         
          
          <li><a href="<?php echo $base;?>actions/logout.php"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            
        </ul>

      </li>
    </ul> 



    <?php } ?>    
     

      </div><!--/.nav-collapse -->
    </div>
  </div>

  <div   id="openchange"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style='width:750px; height:450px;'>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h5 id="myModalLabel" class="modal-title">System Title &raquo; 
                                                      <small style="color:darkgrey; font-weight:bold; font-size:12px"> Change system title here</small></h5>
                                                </div>
                                                  
                                                <div class="modal-body">
                                           
<?php //echo form_open("book/editTitle");?>
 <form action="<?php echo $base;?>actions/changeTitle.php" method="post">       
       
    <label for="title" style="color:red">Library Title</label>
    <input value="<?php echo $cname;?>" maxlength="40" readonly="true" value="" style="border:none" placeholder="Library Title" class="form-control" required name="lib" title="Library Title" autocomplete="off" id="lim" type="text"/>
 
<script type="text/javascript">

 
</script>

  <label for="title" style="color:red">Library Short Title</label>
    <input onkeyup="javascript:this.toUpperCase();" value="<?php echo $short;?>" maxlength="6" readonly="true" value="" style="border:none" placeholder="Library Short Title" class="form-control" required name="short" title="Library Short Title" autocomplete="off" id="short" type="text"/>
 
 
              <script type="text/javascript">

function editables(){
$("#lim").focus();
  
 $("#lim").prop('readonly',false);
 $("#short").prop('readonly',false);

 $("#lim").prop('title','Please enter a Library Title');
 
 $("#short").prop('title','Please enter a Library Short Title');
 
 $("#saves").show();
  $("#cancelss").show();
 $("#edits").hide();

 



}

</script>

    <script type="text/javascript">

function noneditables(){

  
 $("#lim").prop('readonly',true);
  $("#short").prop('readonly',true);

 $("#lim").prop('title','Library Title');
  $("#short").prop('title','Library Short Title');
 
 
$("#saves").hide();
$("#cancelss").hide();
$("#edits").show();
   }

</script>

 
          <br/><br/>    
                <button id="saves" style="display:none" type="submit" class="btn btn-success">Save Changes</button>
                 <button id="edits" title="Click here to edit library title" type="button" onclick="editables()" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit Title</button>
                
                <button title="Cancel Editing Now" onclick="noneditables()" id="cancelss" style="display:none" type="reset" class="btn btn-default">Cancel</button>&nbsp;

                 
                <?php //echo form_close();?>

  
                                                </div>
                                                


                                                <div class="modal-footer" style="display:">
                                                    

                                                    <small style="color:darkgrey; font-weight:bold; font-size:11px"><?php echo $learn;?></small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </form>