<?php
    
$con = mysqli_connect('localhost', 'root', '', 'exam');

$page = $_GET['p'];

if($page=="teach"){
    $id = $_GET['id'];

    $query = " DELETE FROM `teachers` WHERE id = $id ";

    $r = mysqli_query($con,$query);
    if($r==true){
        echo "success";
        header('location:teacherDetail.php?q=1');    //     ******Teacher delete***
    }else{echo "error";}
}

if($page=="stud"){
    $id= $_GET['id'];
   
    $query = " DELETE FROM `student` WHERE prn = $id ";   //     ******Student delete***
    $run=mysqli_query($con, $query);
    if($run==true){
        echo "success...";
        header('location:studentDetail.php');
    }else{echo"error";};

}

if($page=="announcement"){
    $id= $_GET['id'];
   
    $query = " DELETE FROM `announcement` WHERE id = $id ";   //     ******Announcement delete***
    $run=mysqli_query($con, $query);
    if($run==true){
        echo "success...";
        header('location:announcement.php');
    }else{echo"error";};

}

if($page=="exam"){
    $id= $_GET['id'];
    $c= $_GET['c'];
   
    $query = " DELETE FROM `subject` WHERE id = $id ";   //     ******Exam delete***
    $run=mysqli_query($con, $query);
    if($run==true){
        $query1 = " DELETE FROM `que_paper` WHERE subId = $id ";  
        $run1=mysqli_query($con, $query1);
        if($run1==true){
            echo "success...";
            switch ($c) {
                  case "teach":
                    header('location:quiz.php?q=0');
                    break;
                  case "admin":
                    header('location:examDetail.php?q=0');
                    break;
                  
                  default:
                    echo "Case Error!";
                }
            
        }else{echo"error";};
    }else{echo"error";};

}

?>