<?php ob_start(); 
session_start();
require("configLogin.php");
require("auto_connect.php");


   if(!isset($_SESSION['logged_in']))
    {
        header("Location: index.php");
    }
    $myname = $_SESSION['username'];
    $_SESSION['username'] = $myname;
    $dept_center_code = $_SESSION['dept_center_code'];
    $dept_center_course_code = $_SESSION['dept_center_course_code'];
    $semester_code = $_SESSION['semester_code'];
    $belongs_to = $_SESSION['belongs_to'];
    $student_name = $_SESSION['student_name'];
    $department_center = $_SESSION['department_center'];
    $department_center_course = $_SESSION['department_center_course'];


?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>Student Home</title>

    <?php 
        include("incljs.php");
    ?>
    
</head>
<body onload="changeHashOnLoad(); ">
    
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
            <?php
                
                   
                    echo 'Welcome  '.$myname; 
                
                ?>
               
            </div>
        </div>
        <?php

            

        ?>
        <div class="admin">
            <div class="image">
                <img src="img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><?php echo $department_center; ?></li>
                
                <li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>
            </ul>
            
        </div>
        
        <?php
            include("leftMenu.php");
        ?>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget">

            <div class="input-append">
                <input id="appendedInputButton" style="width: 118px;" type="text"><button class="btn" type="button">Search</button>
            </div>            
            
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            
            <div class="wBlock clearfix">
                <div class="dSpace">
                    <h3>Last visits</h3>
                    <span class="number">6,302</span>                    
                    <span>5,774 <b>unique</b></span>
                    <span>3,512 <b>returning</b></span>
                </div>
                <div class="rSpace">
                    <h3>Today</h3>
                    <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>                                                                                
                    <span>&nbsp;</span>
                    <span>65% <b>New</b></span>
                    <span>35% <b>Returning</b></span>
                </div>
            </div>
            
        </div>
        
    </div>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><?php echo $department_center_course; ?> <span class="divider">></span></li>                
                <li class="active"><?php echo $student_name;?></li>
            </ul>
                        
            
            
        </div>
        
        <div class="workplace">
                                    
            
            
            <div class="row-fluid">

                <div class="span4">                    

                    <div class="wBlock red clearfix">                        
                        <div class="dSpace">
                            <h3>Invoices statistics</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--130,190,260,230,290,400,340,360,390--></span>
                            <span class="number">60%</span>                    
                        </div>
                        <div class="rSpace">
                            <span>$1,530 <b>amount paid</b></span>
                            <span>$2,102 <b>in queue</b></span>
                            <span>$11,100 <b>total taxes</b></span>
                        </div>                          
                    </div>                     
                    
                </div>                
                
                <div class="span4">                    

                    <div class="wBlock green clearfix">                        
                        <div class="dSpace">
                            <h3>Users</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--5,10,15,20,23,21,25,20,15,10,25,20,10--></span>
                            <span class="number">2,513</span>                    
                        </div>
                        <div class="rSpace">
                            <span>351 <b>active</b></span>
                            <span>2102 <b>passive</b></span>
                            <span>100 <b>removed</b></span>
                        </div>                          
                    </div>                                                            
                    
                </div>

                <div class="span4">                    

                    <div class="wBlock blue clearfix">
                        <div class="dSpace">
                            <h3>Last visits</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                            <span class="number">6,302</span>
                        </div>
                        <div class="rSpace">                                                                           
                            <span>65% <b>New</b></span>
                            <span>35% <b>Returning</b></span>
                            <span>00:05:12 <b>Average time on site</b></span>                                                        
                        </div>
                    </div>                      
                    
                </div>                
            </div>            
            
            <div class="dr"><span></span></div> 
            
            <div class="row-fluid">
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-archive"></div>
                        <h1>Orders</h1>
                        <ul class="buttons">                            
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-list"></span> Show all</a></li>
                                    <li><a href="#"><span class="isw-ok"></span> Approved</a></li>
                                    <li><a href="#"><span class="isw-minus"></span> Unapproved</a></li>
                                    <li><a href="#"><span class="isw-refresh"></span> Refresh</a></li>
                                </ul>
                            </li>
                        </ul>                         
                    </div>
                    <div class="block-fluid accordion">
                        
                        <h3>November 2012</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Date</th><th>User</th><th width="60">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="date">Nov 6</span><span class="time">12:35</span></td>
                                        <td><a href="#">Aqvatarius</a></td>
                                        <td><span class="price">$1366.12</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="date">Nov 8</span><span class="time">18:42</span></td>
                                        <td><a href="#">Olga</a></td>
                                        <td><span class="price">$146.00</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="date">Nov 15</span><span class="time">8:21</span></td>
                                        <td><a href="#">Alex</a></td>
                                        <td><span class="price">$879.24</span></td>
                                    </tr>                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                        

                        <h3>October 2012</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Date</th><th>User</th><th width="60">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="date">Oct 6</span><span class="time">12:35</span></td>
                                        <td><a href="#">Aqvatarius</a></td>
                                        <td><span class="price">$1366.12</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="date">Oct 8</span><span class="time">18:42</span></td>
                                        <td><a href="#">Olga</a></td>
                                        <td><span class="price">$146.00</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="date">Oct 15</span><span class="time">8:21</span></td>
                                        <td><a href="#">Alex</a></td>
                                        <td><span class="price">$879.24</span></td>
                                    </tr>                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>                                
                            </table>                           
                        </div>
                        
                        <h3>September 2012</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Date</th><th>User</th><th width="60">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="date">Sep 6</span><span class="time">12:35</span></td>
                                        <td><a href="#">Aqvatarius</a></td>
                                        <td><span class="price">$1366.12</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="date">Sep 8</span><span class="time">18:42</span></td>
                                        <td><a href="#">Olga</a></td>
                                        <td><span class="price">$146.00</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="date">Sep 15</span><span class="time">8:21</span></td>
                                        <td><a href="#">Alex</a></td>
                                        <td><span class="price">$879.24</span></td>
                                    </tr>                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>                                
                            </table>                              
                        </div>                        
                        
                    </div>
                </div>
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-edit"></div>
                        <h1>Latest news</h1>
                        <ul class="buttons">                            
                            <li>
                                <a href="#" class="isw-text_document"></a>
                            </li>                            
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-list"></span> Show all</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Add new</a></li>
                                    <li><a href="#"><span class="isw-refresh"></span> Refresh</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>
                    <div class="block news scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                            
                            <div class="item">
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                <p>Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis. Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                <span class="date">02.11.2012 14:23</span>
                                <div class="controls">                                    
                                    <a href="#" class="icon-pencil tip" title="Edit"></a>
                                    <a href="#" class="icon-trash tip" title="Remove"></a>
                                </div>
                            </div>

                            <div class="item">
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                <p>Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis. Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                <span class="date">02.11.2012 14:23</span>
                                <div class="controls">                                    
                                    <a href="#" class="icon-pencil tip" title="Edit"></a>
                                    <a href="#" class="icon-trash tip" title="Remove"></a>
                                </div>                                
                            </div>

                            <div class="item">
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                <p>Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis. Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                <span class="date">02.11.2012 14:23</span>
                                <div class="controls">                                    
                                    <a href="#" class="icon-pencil tip" title="Edit"></a>
                                    <a href="#" class="icon-trash tip" title="Remove"></a>
                                </div>                                
                            </div>                            
                            
                            <div class="item">
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                <p>Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis. Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                <span class="date">02.11.2012 14:23</span>
                                <div class="controls">                                    
                                    <a href="#" class="icon-pencil tip" title="Edit"></a>
                                    <a href="#" class="icon-trash tip" title="Remove"></a>
                                </div>                                
                            </div>
                            
                            <div class="item">
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                <p>Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis. Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                <span class="date">02.11.2012 14:23</span>
                                <div class="controls">                                    
                                    <a href="#" class="icon-pencil tip" title="Edit"></a>
                                    <a href="#" class="icon-trash tip" title="Remove"></a>
                                </div>                                
                            </div>
                            
                            <div class="item">
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                <p>Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis. Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                <span class="date">02.11.2012 14:23</span>
                                <div class="controls">                                    
                                    <a href="#" class="icon-pencil tip" title="Edit"></a>
                                    <a href="#" class="icon-trash tip" title="Remove"></a>
                                </div>                                
                            </div>                            
                            
                        </div>
                        
                    </div>
                </div>                               

                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-cloud"></div>
                        <h1>Registrations</h1>
                        <ul class="buttons">        
                            <li>
                                <a href="#" class="isw-users"></a>
                            </li>
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-list"></span> Show all</a></li>
                                    <li><a href="#"><span class="isw-mail"></span> Send mail</a></li>
                                    <li><a href="#"><span class="isw-refresh"></span> Refresh</a></li>
                                </ul>
                            </li>
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block users scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                            
                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/aqvatarius_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Aqvatarius</a>                                                                    
                                    <div class="controls">                                    
                                        <a href="#" class="icon-ok"></a>
                                        <a href="#" class="icon-remove"></a>
                                    </div>                                                                    
                                </div>
                            </div>

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/olga_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Olga</a>                                                                
                                    <div class="controls">                                    
                                        <a href="#" class="icon-ok"></a>
                                        <a href="#" class="icon-remove"></a>
                                    </div>                                                            
                                </div>
                            </div>                        

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/alexey_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Alexey</a>    
                                    <div class="controls">                                    
                                        <a href="#" class="icon-ok"></a>
                                        <a href="#" class="icon-remove"></a>
                                    </div>                                                            
                                </div>
                            </div>                              

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/dmitry_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Dmitry</a>                                    
                                    <span>approved</span>
                                </div>
                            </div>                         

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/helen_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Helen</a>                                                                        
                                    <span>approved</span>
                                </div>                          
                            </div>                                  

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/alexander_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Alexander</a>                                                                        
                                    <span>approved</span>
                                </div>
                            </div>                        

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/aqvatarius_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Aqvatarius</a>                                                                    
                                    <span>approved</span>
                                </div>
                            </div>

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/olga_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Olga</a>                                                                
                                    <span>approved</span>
                                </div>
                            </div>                        

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/alexey_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Alexey</a>
                                    <span>approved</span>
                                </div>
                            </div>                              

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/dmitry_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Dmitry</a>                                    
                                    <span>approved</span>
                                </div>
                            </div>                         

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/helen_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Helen</a>                                                                        
                                    <span>approved</span>
                                </div>
                            </div>                                  

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="img/users/alexander_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Alexander</a>                                                                        
                                    <span>approved</span>
                                </div>
                            </div>                        
                            
                        </div>
                        
                    </div>
                </div>                
                
                
            </div>

            <div class="dr"><span></span></div>            
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-graph"></div>
                        <h1>Chart</h1>
                    </div>
                    <div class="block">
                        <div id="chart-1" style="height: 300px; margin-top: 10px;">
                            
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="dr"><span></span></div>
            
            <div class="row-fluid">
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-chats"></div>
                        <h1>Messaging</h1>
                        <ul class="buttons">
                            <li>
                                <a href="#" class="isw-attachment"></a>                            
                            </li>                            
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block messaging">
                        
                        <div class="itemIn">
                            <a href="#" class="image"><img src="img/users/olga.jpg" class="img-polaroid"/></a>
                            <div class="text">
                                <div class="info clearfix">
                                    <span class="name">Olga</span>
                                    <span class="date">10 min ago</span>
                                </div>  
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut diam quis dolor mollis tristique. Suspendisse vestibulum convallis felis vitae facilisis. Praesent eu nisi vestibulum erat lacinia sollicitudin. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus. Maecenas nulla felis, commodo et adipiscing vel, accumsan eget augue. Morbi volutpat iaculis molestie.
                            </div>
                        </div>
                        
                        <div class="itemOut">
                            <a href="#" class="image"><img src="img/users/aqvatarius.jpg" class="img-polaroid"/></a>
                            <div class="text">
                                <div class="info clearfix">
                                    <span class="name">Aqvatarius</span>
                                    <span class="date">7 min ago</span>
                                </div>                                
                                In id adipiscing diam. Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim.
                            </div>
                        </div>
                        
                        <div class="itemIn">
                            <a href="#" class="image"><img src="img/users/olga.jpg" class="img-polaroid"/></a>
                            <div class="text">
                                <div class="info clearfix">
                                    <span class="name">Olga</span>
                                    <span class="date">15 sec ago</span>
                                </div>  
                                Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus. Maecenas nulla felis, commodo et adipiscing vel, accumsan eget augue morbi volutpat.
                            </div>
                        </div>                                                                        
                        
                        <div class="controls">
                            <div class="control">
                                <textarea name="textarea" placeholder="Your message..." style="height: 70px; width: 100%;"></textarea>
                            </div>
                            <button class="btn">Send message</button>
                        </div>                        
                    </div>
                </div>                
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-calendar"></div>
                        <h1>Calendar</h1>
                    </div>
                    <div class="block-fluid">
                        <div id="calendar" class="fc"></div>
                    </div>
                </div>
                
            </div>            
                        
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Simple table</h1>      
                        <ul class="buttons">
                            <li><a href="#" class="isw-download"></a></li>                                                        
                            <li><a href="#" class="isw-attachment"></a></li>
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkall"/></th>
                                    <th width="25%">ID</th>
                                    <th width="25%">Name</th>
                                    <th width="25%">E-mail</th>
                                    <th width="25%">Phone</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>101</td>
                                    <td>Dmitry</td>
                                    <td>dmitry@domain.com</td>
                                    <td>+98(765)432-10-98</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>102</td>
                                    <td>Alex</td>
                                    <td>alex@domain.com</td>
                                    <td>+98(765)432-10-99</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>103</td>
                                    <td>John</td>
                                    <td>john@domain.com</td>
                                    <td>+98(765)432-10-97</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>104</td>
                                    <td>Angelina</td>
                                    <td>angelina@domain.com</td>
                                    <td>+98(765)432-10-90</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>105</td>
                                    <td>Tom</td>
                                    <td>tom@domain.com</td>
                                    <td>+98(765)432-10-92</td>                                    
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>                                
                
            </div>
            
            
            <div class="dr"><span></span></div>
        
        </div>
        
    </div>   
    
</body>
</html>
 <script type = "text/javascript" >
function changeHashOnLoad() {
     window.location.href += "#";
     setTimeout("changeHashAgain()", "50"); 
}

function changeHashAgain() {
  window.location.href += "1";
}

var storedHash = window.location.hash;
window.setInterval(function () {
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);


</script> 