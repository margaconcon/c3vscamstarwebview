<?php


include_once("db\connection.php");

$con = connection();

$setSql = "SELECT * FROM c3_sample_data INNER JOIN camstar_sample_data ON c3_sample_data.HANDLER_ID = camstar_sample_data.HANDLER_ID WHERE HANDLER_ID LIKE %searchKey%";

$setRec = mysqli_query($con, $setSql);

$columnHeader = '';  
$columnHeader = "HANDLER ID" . "\t" . "DATE" . "\t" . "CAMSTAR" . "\t" . "C3" . "\t" . "DIFFERENCE" . "PERCENTAGE";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Handler_Report.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>  
