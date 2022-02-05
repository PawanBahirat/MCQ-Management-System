<?php 

session_start();
$con = mysqli_connect('localhost','root');
if($con){
    echo "Conection successful";
}else{
    echo "No Conection";
}

$db = mysqli_select_db($con, 'exam');


    $username = $_POST['user'];
    $password = $_POST['pass'];
    
    
    $sql = "select * from admin where id = '$username' && pass = '$password'";
    $query = mysqli_query($con, $sql);
    
    $row = mysqli_num_rows($query);
    
        if($row==1){
            echo "Login Successfull";
            $_SESSION['user'] = $username;
            $_SESSION['pass'] = $password;
            header('location:admin.php');
        }else{
            echo "Login failed";
             header('location:index.php?msg=');
        }

?>