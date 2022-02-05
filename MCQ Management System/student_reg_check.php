<?php 
session_start();
$con = mysqli_connect('localhost','root', '', 'exam');

if((isset($_POST['submit']))){
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$prn=$_POST['prn'];
$faculty=$_POST['faculty'];
$stream=$_POST['stream'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];

     $query1 = "SELECT * FROM `student` WHERE prn='$prn'";
    $result1 = mysqli_query($con, $query1);
    
    if(mysqli_num_rows($result1) > 0)
    { 
        $msg="PRN Exists";
         header("location:stud_reg.php?msg=$ms");
    }else{ 
          $query="INSERT INTO `student`(`fname`, `mname`, `lname`, `prn`, `faculty`, `stream`, `gender`, `mobile`, `email`, `pass`) VALUES ('$fname','$mname','$lname','$prn','$faculty','$stream','$gender','$mobile','$email','$pass')";

            $run=mysqli_query($con, $query);

            if($run==TRUE){
                    $suc="success";
                    header("location:stud_reg.php?suc=$suc");

                }else{
                    echo "Error.. ";
                }
       
    }
    }else{
        header('location:stud_reg.php');
    }
 


?>