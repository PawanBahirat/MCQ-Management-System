<?php
$con = mysqli_connect('localhost','root', '', 'exam');
session_start();
//$email=$_SESSION['email'];



//add quiz

if(@$_GET['q']== 'addquiz') {
    $tid = $_GET['tid'];
$faculty = $_POST['faculty'];
$stream = $_POST['stream'];
$sem = $_POST['sem'];
$subject = $_POST['subject'];
$totalq = $_POST['totalq'];
$qmark = $_POST['qmark'];
$date = $_POST['date'];
$s_time = $_POST['stime'];
$dur = $_POST['dur'];
$e_time = $_POST['etime'];
    
$uid=uniqid();
    
    $arr=explode(":",$s_time);
                $h=(int)$arr[0];
                $h+=$dur;
                $end_time=$h.":".$arr[1];
    
    $sql4="INSERT INTO `subject`(`faculty`, `stream`, `sem`, `sub`, `totalQ`, `q_mark`, `date`, `s_time`, `end_time`, `exam_time`, `teach_id`, `uid`) VALUES ('$faculty' , '$stream' , '$sem','$subject','$totalq' ,'$qmark','$date','$s_time','$end_time','$e_time','$tid','$uid')";
    
    $q4=mysqli_query($con,$sql4);
    
    $query1= "select * from `subject` where uid = '$uid' && sub = '$subject'";



                        $run1=mysqli_query($con,$query1);



                        if($run1==true){


                               
                            while($data1 = mysqli_fetch_array($run1))
                            {


                            $id=$data1['id'];
                            }
                            
                            }else{
                                echo "Error.. ";
                            }

header("location:quiz.php?q=4&step=2&eid=$id&n=$totalq");

}


//add question

if(@$_GET['q']== 'addqns') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];


for($i=1;$i<=$n;$i++)
 {
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
    $e=$_POST['ans'.$i];
$qid=uniqid();
 $qns=$_POST['qns'.$i];
    
    $sql5="INSERT INTO `que_paper`(`id`, `subId`, `qnum`, `que`, `a`, `b`, `c`, `d`, `ans`) VALUES ('$qid','$eid', '$i', '$qns', '$a', '$b', '$c', '$d', '$e')";
    $run=mysqli_query($con, $sql5);
   
if($run==true){
   header("location:quiz.php?q=0");
 }else{echo "add que sql error..";}

}

}



//Update question for admin

if(@$_GET['q']== 'upqns') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];

$qns=$_POST['qns'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['ans'];
 
    $sql6="UPDATE `que_paper` SET `que`='$qns',`a`='$a',`b`='$b',`c`='$c',`d`='$d',`ans`='$e' WHERE subId=$eid && qnum=$n";
    
    $run6=mysqli_query($con, $sql6);
   
if($run6==true){
    
     header("location:examDetail.php?q=1&id=$eid");
                    
 }else{echo "add que sql error..";}

}

//Update question for Teacher

if(@$_GET['q']== 'upqnst') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];

$qns=$_POST['qns'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['ans'];
 
    $sql6="UPDATE `que_paper` SET `que`='$qns',`a`='$a',`b`='$b',`c`='$c',`d`='$d',`ans`='$e' WHERE subId=$eid && qnum=$n";
    
    $run6=mysqli_query($con, $sql6);
   
if($run6==true){
    
     header("location:quiz.php?q=1&id=$eid");
                    
 }else{echo "add que sql error..";}

}



?>
