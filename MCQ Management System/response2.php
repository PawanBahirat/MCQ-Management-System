<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

$e=$_SESSION['examend'];
$c_time=strtotime(date('H:i:s', strtotime(date('H:i:s'))));
$end_t=strtotime($e);

$r_time=$_SESSION['duration'];

/*$d=mktime(00, 01, 00);
$last_time=strtotime(date('H:i:s',$d));*/

$differenceinseconds=$end_t-$c_time;
    
if($c_time > $end_t){
    echo "00:00:00";
}
else{
    
        echo gmdate("H:i:s",$differenceinseconds);
}
?>
