<?php require("auto_connect.php"); $r=mysql_query("select * from  fee_dump_du order by dump_name asc"); if(mysql_num_rows($r)>=1) {
      while($row=mysql_fetch_array($r)){ 
                
             $json=array('id'=>$row['id'],'textual'=>$row['dump_name']); 
             echo json_encode($json);
                    
                 } } ?>