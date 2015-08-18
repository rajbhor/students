 <style type="text/css">

.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next{

  cursor:pointer; 
  
 
}
.ui-datepicker .ui-datepicker-prev span:after, .ui-datepicker .ui-datepicker-next span:after{

  content:">";
  font-weight:bold;
  
}

.ui-datepicker .ui-datepicker-prev span:after, .ui-datepicker .ui-datepicker-prev span:after{

  content:"<";
   font-weight:bold;
   cursor:pointer;
}
 </style>
<div class="row dash-cols">
        <div class="col-sm-6 col-md-6">
          <div class="widget-block  white-box calendar-box">
            <div class="col-md-6 blue-box calendar no-padding">
              <div class="padding ui-datepicker"></div>
            </div>
            <div class="col-md-6">
              <div class="padding">
                <h2 class="text-center"><?php echo date('l');?></h2>
                <h1 class="day"><?php echo date('d');?></h1>
              </div>
            </div>
          </div>