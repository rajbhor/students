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
foreach (range('A1','C1') as $col) {
	$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}
	$F->setCellValue('A1', 'ID');
    $F->setCellValue('B1', 'COURSE');
	$F->setCellValue('C1', 'CENTER');
	 

	


$sql="SELECT * from center_course a,center b where b.center_code=a.center_code order by b.center_name desc";	
 

// echo $sql;
// exit();
$rs=mysql_query($sql); 
$i=1;

while($r=mysql_fetch_array($rs))
{   
    
	$F->setCellValue('A'.$Line, $i);
	$F->setCellValue('B'.$Line, $r['cc_name']);
	$F->setCellValue('C'.$Line,$r['center_name']);
	 $i=$i+1;
	$Line=$Line+1;
}
header('Content-Type: application/vnd.ms-excel');
$filename='DU Center-Course Excel Report-'.time().".xls";
header("Content-Disposition: attachment;filename=".$filename);
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace('.php', '.xls', __FILE__));
$objWriter->save('php://output');
exit;
?>
 
