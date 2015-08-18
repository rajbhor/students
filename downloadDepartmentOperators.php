<?php ob_start(); require("includes/config.php");?>
<?php require("includes/auto_connect.php");
ob_clean(); 
ob_start();//include('protect.php');
ini_set('max_execution_time',-1);
ini_set('memory_limit',-1);
require_once 'Classes/PHPExcel.php';//change if necessary
$objPHPExcel = new PHPExcel();
$F=$objPHPExcel->getActiveSheet();
$Line=2;
$objPHPExcel->getActiveSheet()->getStyle('A1:DH1')->getFont()->setBold(true);
foreach (range('A1','E1') as $col) {
	$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}
	$F->setCellValue('A1', 'ID');
    $F->setCellValue('B1', 'NAME');
	$F->setCellValue('C1', 'USERID');
	$F->setCellValue('D1', 'PASSWORD');
	$F->setCellValue('E1', 'DEPARTMENT/CENTER');
	 $sql="SELECT * from g_users  where user_type='operator' order by dept_code desc";	
$rs=mysql_query($sql); 
$i=1;

while($r=mysql_fetch_array($rs))
{   
    
	$F->setCellValue('A'.$Line,$i);
	$F->setCellValue('B'.$Line,$r['op_name']);
	$F->setCellValue('C'.$Line,$r['user_name']);
	$F->setCellValue('D'.$Line,$r['password']);
	$F->setCellValue('E'.$Line,getDepartmentCenter($r['dept_code'],$r['branch_type']));
	

	$i=$i+1;
	$Line=$Line+1;
}
header('Content-Type: application/vnd.ms-excel');
$filename='DU Department Operators Excel Report-'.time().".xls";
header("Content-Disposition: attachment;filename=".$filename);
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace('.php', '.xls', __FILE__));
$objWriter->save('php://output');
exit;

function getDepartmentCenter($dccode,$btype){
if($btype=='center'){
$q14=mysql_query("select * from center where center_code=$dccode");
$c_name=mysql_fetch_array($q14);
return $c_name['center_name'];

}
else {  //dept

$q14=mysql_query("select * from department where dept_code=$dccode");
$dc_name=mysql_fetch_array($q14);
return $dc_name['dept_name'];

}

}
?>
 
