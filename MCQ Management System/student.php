<?php 

session_start();
    if(!isset($_SESSION['prn'])){
    header('location:index.php');
}
if(isset($_SESSION['submit'])){
     unset($_SESSION['sub-id']);
     unset($_SESSION['submit']);
}

 if(isset($_SESSION['sub-id'])){
     $sub=$_SESSION['sub-id'];
    header("location:exam.php?sub-id=$sub&qn=1");
}
?>
<?php
$con = mysqli_connect('localhost','root','','exam');



    $prn = $_SESSION['prn'];
    global $prn;
    global $email;
    global $mobile;
    global $stream;
    $password = $_SESSION['pass'];

    
   

    $query1= "select * from `student` where prn = '$prn' && pass = '$password'";



                        $run1=mysqli_query($con,$query1);



                        if($run1==true){


                               
                            while($data1 = mysqli_fetch_array($run1))
                            {


                            $_SESSION['stud_fname']=$data1['fname'];
                            $_SESSION['stud_mname']=$data1['mname'];
                            $_SESSION['stud_lname']=$data1['lname'];
                            $email=$data1['email'];
                            $mobile=$data1['mobile'];
                            $stream=$data1['stream'];
                            }
                            
                            }else{
                                echo "Error.. ";
                            }
    
    ?>

<!-------------------Exam table--------->

<?php 

$con = mysqli_connect('localhost','root', '', 'exam');

$query = "SELECT * FROM `student` where prn = '$prn' && pass = '$password'";
 $run = mysqli_query($con,$query);

global $stud_faculty;
global $stud_stream;

    if($run==true){                                    
        while($data = mysqli_fetch_array($run)){
            $stud_faculty=$data['faculty'];
            $stud_stream=$data['stream'];
            
        }
    }                        

function showdata(){
    global $stud_faculty;
    global $stud_stream;
    global $con;
    global $prn;
    
    $query = "SELECT * FROM `subject` where faculty = '$stud_faculty' && stream = '$stud_stream'";
    $run = mysqli_query($con,$query);
    
    
    if($run==TRUE){
        
        ?>
        <form action="#" method="post" class="col-md-12">
        <table cellspacing="20" border="1" width="100%" height="auto" padding="20px" class="col-md-12">
            <tr style="background: transparent; border-bottom: 2px inset silver; box-shadow: 0 -8px 8px inset #154360;"  height="50" class="col-md-12">
                <td align="center"><font color="white" class="col-md-1">Sr.No.</font></td>
                <td align="center"><font color="white"class="col-md-2">Faculty/ Stream - Sem</font></td>
                 <td align="center"><font color="white"class="col-md-3">Subject</font></td>
                 <td align="center"><font color="white"class="col-md-3">Date and Time</font></td>
                 <td align="center"><font color="white"class="col-md-2">Exam Time</font></td>
                
                
                <td align="center"><font color="white"class="col-md-1">Start Exam</font></td>
            </tr>

        <?php
           $id=1;
            $qn=1;
        while($data = mysqli_fetch_assoc($run))
        {
            
            
            ?>

        <tr style="background:transparent; box-shadow: 0 -3px 8px inset grey;" height="40" class="col-md-12">
            <td align="center"><font color="white"class="col-md-1"><?php echo $id; ?></font></td>
            <td align="center"><font color="white"class="col-md-2"><?php echo $data['faculty']."/\t".$data['stream']."\t-\t".$data['sem']; ?></font></td>
            <td align="center"><font color="white"class="col-md-3"><?php echo $data['sub']; ?></font></td>
            <td align="center"><font color="white"class="col-md-3"><?php echo date('d/m/Y', strtotime($data['date']))."\t&nbsp;&nbsp;".date('h:i A', strtotime($data['s_time']))."\t-\t".date('h:i A', strtotime($data['end_time'])); ?></font></td>
            <td align="center"><font color="white"class="col-md-2"><?php switch ($data['exam_time']) {
                                                                                                                          case 30:
                                                                                                                            echo "30 Minutes";
                                                                                                                            break;
                                                                                                                          case 60:
                                                                                                                            echo "1 Hour";
                                                                                                                            break;
                                                                                                                          case 90:
                                                                                                                            echo "1:30 Hours";
                                                                                                                            break;
                                                                                                                          case 120:
                                                                                                                            echo "2 Hours";
                                                                                                                            break;
                                                                                                                          case 150:
                                                                                                                            echo "2:30 Hours";
                                                                                                                            break;
                                                                                                                          case 180:
                                                                                                                            echo "3 Hours";
                                                                                                                            break;
                                                                                                                          default:
                                                                                                                           
                                                                                                                        } ?></font></td>
           
            <?php $query4 = "SELECT * FROM `result` WHERE stud_prn='$prn' AND sub_id='".$data['id']."'"; $result4 = mysqli_query($con, $query4);
            date_default_timezone_set('Asia/Kolkata');
            $s=$data['s_time'];
            $e=$data['end_time'];
            $start_t=strtotime($s);
            $end_t=strtotime($e);
            $c_time=strtotime(date('H:i:s', strtotime(date('H:i:s'))));
            $cdate=strtotime(date('Y-m-d'));
            $edate=strtotime(date($data['date']));
            ?>

            <td align="center" class="col-md-2"><button class="btn btn-primary btn-sm" 
              <?php if($edate ==  $cdate){ if($start_t <=  $c_time){ if($c_time<=$end_t){ if(mysqli_num_rows($result4) > 0){echo "disabled";}}else{echo "disabled";}}else{echo "disabled";}}else{echo "disabled";}?>><a href="<?php if($edate ==  $cdate){ if($start_t <=  $c_time){ if($c_time<=$end_t){ if(mysqli_num_rows($result4) > 0){echo "#";}
            else{echo 'time.php?sub-id='.$data['id'].'&qn='.$qn;}}else{echo "#";}}else{echo "#";}}else{echo "#";}?>" class="text-white">
            <?php if($edate ==  $cdate){ if($start_t <=  $c_time){ if($c_time<=$end_t){ if(mysqli_num_rows($result4) > 0){echo "Submited";}else{echo "Start Exam";}}else{if(mysqli_num_rows($result4) > 0){echo "Submited";}else{echo "Time Out";}}}else{echo "Wait";}}else{if($edate >  $cdate){echo "Coming Soon";}else{if(mysqli_num_rows($result4) > 0){echo "Submited";}else{echo "Exam Ended";}}}?></a></button> </td>  
            
            
        </tr>
            
            <?php
           $id++; 
        }
        
       ?></table></form>  <?php
            
        }else{
            echo "Error.. ";
        }
}

?>


<!---result table.....---->

<?php 


function showresult($p){

    global $con;
    
   $query = "SELECT * FROM `result` WHERE stud_prn = $p";
    $run = mysqli_query($con,$query);   
   
    
    if($run==TRUE){
        
        $query1 = "SELECT * FROM `student` WHERE prn = $p";
        $run1 = mysqli_query($con,$query1);   
    
    if($run==TRUE){
        
        while($data1 = mysqli_fetch_array($run1))
        {
            $fname=$data1['fname'];
            $mname=$data1['mname'];
            $lname=$data1['lname'];
            $prn=$data1['prn'];
        }
    }
                
       ?><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3"><h6 align="left">   Student Name : <?php echo $lname."\t".$fname."\t".$mname;?></h6></div>
            <div class="col-md-3"><h6 align="left">Student Prn : <?php echo $prn;?></h6></div>
            <div class="col-md-5"></div>
        </div>
        <form action="#" method="post" class="col-md-12">
        <table id="datatableid" class="table-hover dable-dark" width="100%" height="auto" padding="20px" class="text-center col-md-12">
            <tr style="background: transparent; border-bottom: 2px inset silver; box-shadow: 0 -8px 8px inset #154360;"  height="50" class="col-md-12">
                <th style="border-right: 2px solid #154360; border-left: 2px solid grey;" align="center" class="col-md-1"><font color="white">Sr.No.</font></th>
                
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Faculty/Stream-Sem</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Subject</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white" >Maximum Marks</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white" >Obtained Marks</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white" >Percentege</font></th>
                
            </tr>

        <?php
           $id1=1;
        while($data1 = mysqli_fetch_assoc($run))
        {
            
            ?>

        <tr style="background:transparent; box-shadow: 0 -3px 8px inset grey;" height="50" class="col-md-12" height="40" class="col-md-12" >
            <td style="border-right: 2px solid #154360; border-left: 2px solid grey;" class="col-md-1"><font color="white"><?php echo $id1; ?></font></td>
            
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data1['faculty']."/".$data1['stream']."-".$data1['sem']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data1['sub']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $data1['total_marks']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $data1['obt_marks']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $data1['percentage'],"%"; ?></font></td>
                    
        </tr>
            
            <?php
           $id1++; 
        }
        
       ?></table></form>  <?php
            
        }else{
            echo "Error.. ";
        }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Student Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheet.css" />
    <link rel="stylesheet" href="./mobile-style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
</head>
<body>
    <header style="background-image: url(img/i1.jpg); background-size: cover;">
    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo">
       <a class="navbar-brand" href="index.php">
          <i class="fas fa-book-reader fa-2x mx-3"></i>MCQ-MANAGEMENT SYSTEM</a>
   
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="student.php">Home</a></li>
          <li><a href="student.php?q=1">Result</a></li>
          <li><a href=""><marquee> Hello' <?php echo $_SESSION['stud_fname']; ?></marquee></a></li>
          <li><a href="logout.php"><input type='button' value="Logout" class="btn btn-danger"></a></li>
                 
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
      
        
       <script>
    const body = document.querySelector("body");
    const navbar = document.querySelector(".navbar");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    menuBtn.onclick = ()=>{
      navbar.classList.add("show");
      menuBtn.classList.add("hide");
      body.classList.add("disabled");
    }
    cancelBtn.onclick = ()=>{
      body.classList.remove("disabled");
      navbar.classList.remove("show");
      menuBtn.classList.remove("hide");
    }
    window.onscroll = ()=>{
      this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
    }
  </script>
    </div>
  <br><br><br><br><br>






<div class="container col-md-12">
    <div class="row">
    <div class="col-md-6 rounded-pill" style="background-image:url('img/i2.jpg'); background-size:cover; box-shadow:0 0 5px 8px inset rgba(0, 0, 0, 0.4);">
         <div class="float-lef col-md-4">
        <div class="col-md-12 profile-pic">
        <img src="assets/UI-face-1.jpg" class="rounded-circle float-left" alt="image not found" width="188"height="188" style="box-shadow: 10px 5px 8px inset grey;">
    </div>
    </div>

        <div class=" col-lg-8 col-md-8 float-right rounded-pill profile-data text-white" style="box-shadow:-40px -1px 40px inset grey; background-color:rgba(0, 0, 0, 0.5);">
            <br>
            <h6 align="left" class="pl-5 ml-3"> PRN<pre class="d-inline">      </pre>:<pre class="d-inline">   </pre><?php echo $_SESSION['prn']; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Name <pre class="d-inline">    </pre>:<pre class="d-inline">   </pre><?php echo $_SESSION['stud_fname']." ".$_SESSION['stud_mname']." ".$_SESSION['stud_lname'] ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Faculty  <pre class="d-inline">   </pre>:<pre class="d-inline">   </pre><?php echo $stud_faculty; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Stream  <pre class="d-inline">   </pre>:<pre class="d-inline">   </pre><?php echo $stream; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Email<pre class="d-inline">     </pre>:<pre class="d-inline">   </pre><?php echo $email; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Phone<pre class="d-inline">    </pre>:<pre class="d-inline">   </pre><?php echo $mobile; ?></h6>
            
            <br>
        </div>
    </div>
    <div class="col-md-6">
      
          <div class="col-md-12 col-sm-12" style="color:rgba(255 , 255, 255, 1.0); font-family: georgia;"> <h4 align="center">Announcements </h4></div>
    <div class="col-md-12 col-sm-12 rounded-pill text-white" style="background-color: rgba(0, 0, 0, 0.1);  max-height: 570px; font-family: georgia;">
            <?php
            $con = mysqli_connect('localhost','root','','exam');
            $query2 = "SELECT * FROM `announcement`";
            $run2 = mysqli_query($con,$query2);
          
          
            if($run2==TRUE){
                while($data2 = mysqli_fetch_array($run2))
                {
                   if((($data2['faculty']=="All")&&($data2['seen']=="Student"))||(($data2['faculty']==$stud_faculty)&&($data2['seen']=="Both"))||(($data2['faculty']==$stud_faculty)&&($data2['seen']=="Student")))
                        {
                            echo ' <marquee behavior="alternate"><strong>* '.$data2['data'].'</strong></marquee><br>';
                        }
                    
                }
            }
        ?>
    </div>
        
    </div>
</div>
</div>



          
          
      </div>
    </div>

        <!----- result------>
          
          <?php if(@$_GET['q']==1) { 
          
            $prn=$_SESSION['prn'];
          ?>
          <div class="container text-center col-sm-12 col-lg-12 col-md-12">
          <div style="background:transparent;" class="rounded">
                <br />
          <br><br>
            <?php showresult($prn);
            echo ' <br> <p align="right"><a href="student.php?q=0" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>';
              ?></div></div><?php
                
            }
          ?>

    <div class="container text-center col-md-12">
      <div class="row col-md-12">
        <?php if(@$_GET['q']==0) { ?>
        <div class="col-md-12 col-sm-12 text-white">
            <div class="exam">

           
         
         <br />
          <br><br>
                <?php showdata(); ?>
                
                <br><br>
            </div>
        </div>
        <div class="col-md-1 col-sm-12  ">
          
        </div>
          <?php } ?>
        <br><br><br><br>
  </header>
    
    <footer>
    <div class="container-fluid p-0">
      <div class="row text-left">
        <div class="col-md-5 col-sm-5">
          <h4 class="text-light">About us</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum maxime ea similique illum corrupti</p>
          <p class="pt-4 text-muted">Copyright ©2021 All rights reserved | 
           
          </p>
        </div>
        <div class="col-md-5 col-sm-12">
          <h4 class="text-light">Newsletter</h4>
          <p class="text-muted">Stay Updated</p>
          <form class="form-inline">
            <div class="col pl-0">
              <div class="input-group pr-5">
                <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-arrow-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2 col-sm-12">
          <h4 class="text-light">Follow Us</h4>
          <p class="text-muted">Let us be social</p>
          <div class="column text-light">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-youtube"></i>
          </div>
        </div>
      </div>
        <marquee style="color:#A9A9A9;" behavior=""><strong> |*|~Credit~|*| :- ~*~ BAHIRAT PAWAN PRABHAKAR ~*~ |*|</strong></marquee>
    </div>
  </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="./main.js"></script>

</body>
</html>
