<?php 


$faculty=$_POST['faculty'];
$seen=$_POST['seen'];
$announcement=$_POST['announcement'];





$con = mysqli_connect('localhost','root', '', 'exam');



    $query="INSERT INTO `announcement`(`faculty`, `seen`, `data`) VALUES ('$faculty','$seen','$announcement')";
    
    $run=mysqli_query($con, $query);

    if($run==TRUE){
            header('location:announcement.php');
        
            
        }else{
            echo "Error.. ";
        }
?>