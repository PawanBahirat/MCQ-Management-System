<?php 
session_start();
$a=session_destroy();

 header('location:index.php');
?>