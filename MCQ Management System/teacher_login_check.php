<?php 

session_start();
$con = mysqli_connect('localhost','root', '', 'exam');


    $email=$_POST['email'];
    $password=$_POST['pass'];
    
   

     $sql = "select * from teachers where email_id = '$email' AND pass='$password'";
    $query = mysqli_query($con, $sql);

   
    if(mysqli_num_rows($query)===1){
        echo "success";
         $_SESSION['email'] = $email;
         $_SESSION['pass'] = $password;
        header('location:teacher.php');
        
    }else{
        echo"error";
        header('location:index.php?msg=');
       
         }

?>


