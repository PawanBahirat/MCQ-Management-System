<?php 

$name=$_POST['name'];
$faculty=$_POST['faculty'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];




$con = mysqli_connect('localhost','root', '', 'exam');


 $query1 = "SELECT * FROM `teachers` WHERE email_id='$email'";
    $result1 = mysqli_query($con, $query1);
    
    if(mysqli_num_rows($result1) > 0)
    { 
        $msg="PRN Exists";
         header("location:teacherDetail.php?q=1&msg=$ms");
    }else{


    $query="INSERT INTO `teachers`(`teacher-name`, `faculty`, `gender`, `mobile`, `email_id`, `pass`) VALUES ('$name','$faculty','$gender','$mobile','$email','$pass')";
    
    $run=mysqli_query($con, $query);

    if($run==TRUE){
            $suc="success";
            header("location:teacherDetail.php?q=1&suc=$suc");
        
            
        }else{
            echo "Error.. ";
        }
    }
?>