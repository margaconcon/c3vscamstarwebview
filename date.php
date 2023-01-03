<?php

$con = connection();

$getDate = "SELECT CAST(DATETIME_EVENT AS DATE) FROM c3_sample_data JOIN camstar_sample_data ON c3_sample_data.HANDLER_TYPE = camstar_sample_data.HANDLER_TYPE
GROUP BY CAST(DATETIME_EVENT AS DATE)";
$resultDate = mysqli_query($con, $getDate);

if (mysqli_num_rows($resultDate)>0){
    while ($row = mysqli_fetch_assoc($resultDate)){
    }
}
?>