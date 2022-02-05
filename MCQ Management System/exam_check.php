<?php
    session_start();
 $con = mysqli_connect('localhost','root', '', 'exam');
if((isset($_POST['prev']))||(isset($_POST['next']))||(isset($_POST['submit']))){
 $que= $_POST['qn'];
 $prn= $_SESSION['prn'];

 $value= $_POST['value'];
 $si=$_SESSION['sub-id'];
 $ans= $_POST['ans'];
echo $ans;
$query1= "select * from `que_paper` where subid = '$si' && qnum = '$que'";

    $run1=mysqli_query($con,$query1);

    if($run1==true){
                               
        while($data1 = mysqli_fetch_array($run1))
        {
            $main_ans=$data1['ans'];
         }
                            
    }else{
             echo "Error.. ";
    }

//------------- Check answer-------------------
if($ans==$main_ans)
{
    $status="Right";
}else{$status="Wrong";}


$sql = "select * from ans_paper where stud_prn = '$prn' AND sub_id='$si' AND qnum='$que'";
    $query = mysqli_query($con, $sql);

   
    if(mysqli_num_rows($query)===1){
              
        $updat="UPDATE `ans_paper` SET `stud_prn`='$prn',`sub_id`='$si',`qnum`='$que',`ans`='$ans',`status`='$status' WHERE stud_prn = '$prn' AND sub_id='$si' AND qnum='$que'";
        $query2 = mysqli_query($con, $updat);
        if($query2==true){
            echo "update success..";
        }else{echo "update fail..";}
        
    }else{
        
        $insert="INSERT INTO `ans_paper`(`stud_prn`, `sub_id`, `qnum`, `ans`, `status`) VALUES ('$prn', '$si', '$que', '$ans', '$status')";
        $query3 = mysqli_query($con, $insert);
        if($query3==true){
            echo "Insert success..";
        }else{echo "Insert fail..";}
    }
}
// Next Prev Buttons



if(isset($_POST['prev']))
{
    $qn = $_POST['qn']-1;
    
    
    header("location:exam.php?sub-id=$si&qn=$qn");

}
else if(isset($_POST['next']))
{



    $next=mysqli_query($con,"SELECT * FROM `que_paper` where subId = '$si' && qnum>$value order by qnum ASC");
     if($que=mysqli_fetch_array($next))
      {
        $q=$que['qnum'];
         
        header("location:exam.php?sub-id=$si&qn=$q");
      } 
    

}

else if(isset($_POST['submit']))
{
    $_SESSION['submit']="submit";
    $right="Right";
    $marks=0;
    
    $query4=mysqli_query($con,"SELECT * FROM `subject` where id = '$si'");
     if($query4==true)
      {
          while($e_marks=mysqli_fetch_array($query4))
        {
            $q_marks=$e_marks['q_mark'];
            $total_q=$e_marks['totalQ'];
         }
    
    $submit=mysqli_query($con,"SELECT * FROM `ans_paper` where stud_prn = '$prn' && sub_id = '$si'");
     if($submit==true)
      {
          while($s_marks=mysqli_fetch_array($submit))
        {
            if($right==$s_marks['status'])
            {
                $marks=$marks+1;
            }
         }      
       
            
         $obt_marks = $q_marks*$marks;
         $total_marks = $q_marks*$total_q;
         $per = ($obt_marks/$total_marks)*100;
         
         $fname = $_SESSION['stud_fname'];
         $mname = $_SESSION['stud_mname'];
         $lname = $_SESSION['stud_lname'];
         
         $name = $lname." ".$fname." ".$mname;
         
         $faculty = $_SESSION['faculty'];
         $stream = $_SESSION['stream'];
         $sem = $_SESSION['sem'];
         $sub = $_SESSION['sub'];
         
         $insert_result="INSERT INTO `result`(`stud_prn`, `stud_name`, `faculty`, `stream`, `sem`, `sub_id`, `sub`, `total_marks`, `obt_marks`, `percentage`) VALUES ('$prn','$name','$faculty','$stream','$sem', '$si','$sub', '$total_marks', '$obt_marks', '$per')";
        $query5 = mysqli_query($con, $insert_result);
        if($query5==true){
            echo "Insert success..";
            header("location:result.php?subid=$si");
        }else{echo "Insert fail..";}
         
        
        
     }else{echo"submit query error";}
     }else{echo"query4 error";}
}

// *******************Time Out Exam Check****************

if(isset($_GET['timeout']))
{
$que= $_GET['qn'];
 $prn= $_SESSION['prn'];

 
 $si=$_SESSION['sub-id'];
 $ans= $_GET['ans'];
echo $ans;
echo "<br>".$que;
echo "<br>".$prn;
echo "<br>".$si;

$query1= "select * from `que_paper` where subid = '$si' && qnum = '$que'";

    $run1=mysqli_query($con,$query1);

    if($run1==true){
                               
        while($data1 = mysqli_fetch_array($run1))
        {
            $main_ans=$data1['ans'];
         }
                            
    }else{
             echo "Error.. ";
    }

//------------- Check answer-------------------
if($ans==$main_ans)
{
    $status="Right";
}else{$status="Wrong";}


$sql = "select * from ans_paper where stud_prn = '$prn' AND sub_id='$si' AND qnum='$que'";
    $query = mysqli_query($con, $sql);

   
    if(mysqli_num_rows($query)===1){
              
        $updat="UPDATE `ans_paper` SET `stud_prn`='$prn',`sub_id`='$si',`qnum`='$que',`ans`='$ans',`status`='$status' WHERE stud_prn = '$prn' AND sub_id='$si' AND qnum='$que'";
        $query2 = mysqli_query($con, $updat);
        if($query2==true){
            echo "update success..";
        }else{echo "update fail..";}
        
    }else{
        
        $insert="INSERT INTO `ans_paper`(`stud_prn`, `sub_id`, `qnum`, `ans`, `status`) VALUES ('$prn', '$si', '$que', '$ans', '$status')";
        $query3 = mysqli_query($con, $insert);
        if($query3==true){
            echo "Insert success..";
        }else{echo "Insert fail..";}
    }



    $_SESSION['submit']="submit";
    $right="Right";
    $marks=0;
    
    $query4=mysqli_query($con,"SELECT * FROM `subject` where id = '$si'");
     if($query4==true)
      {
          while($e_marks=mysqli_fetch_array($query4))
        {
            $q_marks=$e_marks['q_mark'];
            $total_q=$e_marks['totalQ'];
         }
    
    $submit=mysqli_query($con,"SELECT * FROM `ans_paper` where stud_prn = '$prn' && sub_id = '$si'");
     if($submit==true)
      {
          while($s_marks=mysqli_fetch_array($submit))
        {
            if($right==$s_marks['status'])
            {
                $marks=$marks+1;
            }
         }      
       
            
         $obt_marks = $q_marks*$marks;
         $total_marks = $q_marks*$total_q;
         $per = ($obt_marks/$total_marks)*100;
         
         $fname = $_SESSION['stud_fname'];
         $mname = $_SESSION['stud_mname'];
         $lname = $_SESSION['stud_lname'];
         
         $name = $lname." ".$fname." ".$mname;
         
         $faculty = $_SESSION['faculty'];
         $stream = $_SESSION['stream'];
         $sem = $_SESSION['sem'];
         $sub = $_SESSION['sub'];
         
         $insert_result="INSERT INTO `result`(`stud_prn`, `stud_name`, `faculty`, `stream`, `sem`, `sub_id`, `sub`, `total_marks`, `obt_marks`, `percentage`) VALUES ('$prn','$name','$faculty','$stream','$sem', '$si','$sub', '$total_marks', '$obt_marks', '$per')";
        $query5 = mysqli_query($con, $insert_result);
        if($query5==true){
            echo "Insert success..";
            header("location:result.php?subid=$si");
        }else{echo "Insert fail..";}
         
        
        
     }else{echo"submit query error";}
     }else{echo"query4 error";}
}


?>




