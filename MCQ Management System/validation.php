<?php
session_start();
$con = mysqli_connect('localhost','root', '', 'exam');

if(isset($_POST['s_prn']))
{
    if(!preg_match("/^[0-9]\d{9}$/",$_POST['s_prn'])){
        
        $_SESSION['prn_exists']="yes";
        echo '<span class="text-danger"><b>Invalid PRN No.</b></span>';
    }
    else
    {
        $query = "SELECT * FROM `student` WHERE prn='".$_POST['s_prn']."'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['prn_exists']="yes";
            echo '<span class="text-danger"><b>PRN No. is already exists</b></span>';
        }
        else
        {
            $_SESSION['prn_exists']="no";
            echo '<span class="text-success"><b>PRN No. is available</b></span>';
        }
    }
}

if(isset($_POST['t_email']))
{
    
        $query = "SELECT * FROM `teachers` WHERE email_id='".$_POST['t_email']."'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['prn_exists']="yes";
            echo '<span class="text-danger"><b>Email is already exists</b></span>';
        }
        else
        {
            $_SESSION['prn_exists']="no";
            echo '<span class="text-success"><b>Email is available</b></span>';
        }
    
}

?>