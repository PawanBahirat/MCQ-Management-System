<?php
session_start();

$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION['end_time'];
$si=$_SESSION['sub-id'];

$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);


$differenceinseconds=$timesecond-$timefirst;
if($timefirst > $timesecond){
    echo "00:00:00";
}
else{
echo gmdate("H:i:s",$differenceinseconds);
}
?>
