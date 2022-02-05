<?php
session_start();

$con = mysqli_connect('localhost','root', '', 'exam');
$subid=$_GET['sub-id'];
$_SESSION['sub-id']=$_GET['sub-id'];
$duration="";
$res=mysqli_query($con,"SELECT * FROM `subject` WHERE id=$subid");

while($row=mysqli_fetch_array($res))
{
    $duration=$row['exam_time'];
    $endtime=$row['end_time'];
}

$_SESSION['duration']=$duration;
$_SESSION['examend']=$endtime;
$_SESSION['start_time']=date("Y-m-d H:i:s");

$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION['duration'].'minutes', strtotime($_SESSION['start_time'])));

$_SESSION['end_time']=$end_time;

?>
<script type="text/javascript">
    window.location="exam.php?sub-id=<?php echo $subid;?>&qn=1";
</script>