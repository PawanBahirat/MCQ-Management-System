<?php 

session_start();
$con = mysqli_connect('localhost','root', '', 'exam');


    $prn=$_POST['prn'];
    $password=$_POST['pass'];
    
   

     $sql = "select * from student where prn = '$prn' AND pass='$password'";
    $query = mysqli_query($con, $sql);

   
    if(mysqli_num_rows($query)===1){
        echo "success";
         $_SESSION['prn'] = $prn;
         $_SESSION['pass'] = $password;
        header('location:student.php');
        
    }else{
        echo"error";
        header('location:index.php?msg=');
       
         }

?>


