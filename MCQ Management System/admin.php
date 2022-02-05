<?php 

session_start();
    if(!isset($_SESSION['user'])){
    header('location:index.php');
}

?>

<?php
$con = mysqli_connect('localhost','root','','exam');

    $username = $_SESSION['user'];
    $password = $_SESSION['pass'];
global $admin_id;
global $admin_name;  
global $admin_email;
global $admin_mobile;
global $admin_password;
global $admin_department;

    $query1= "select * from `admin` where id = '$username' && pass = '$password'";

                        $run1=mysqli_query($con,$query1);

                        if($run1==true){                               
                            while($data1 = mysqli_fetch_array($run1))
                            {
                                $admin_id=$data1['id'];
                                $admin_name=$data1['name'];
                                $admin_email=$data1['email'];
                                $admin_mobile=$data1['phone'];
                                $admin_password=$data1['pass'];
                                $admin_department=$data1['department'];                                
                            }
                            
                            }else{
                                echo "Error.. ";
                            }




function showdata(){

    global $con;
    
    $query = "SELECT * FROM `subject`";
    $run = mysqli_query($con,$query);
    
   
    
    if($run==TRUE){
        
        ?>


        <form action="#" method="post" class="col-md-12">
        <table id="datatableid" class="table-hover dable-dark" width="100%" height="auto" padding="20px" class="text-center col-md-12">
            <tr style="background: transparent; border-bottom: 2px inset silver; box-shadow: 0 -8px 8px inset #154360;"  height="50" class="col-md-12">
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Faculty/Stream-Sem</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Subject Name</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Date & Time</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Status</font></th>

            </tr>

        <?php
           $id=1;
        while($data = mysqli_fetch_assoc($run))
        {
            
            
            ?>

        <tr style="background:transparent; box-shadow: 0 -3px 8px inset grey;" height="50" class="col-md-12" height="40" class="col-md-12" >          
           
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data['faculty']."/".$data['stream']."-".$data['sem']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data['sub']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo date('d/m/Y', strtotime($data['date']))."\t&nbsp;&nbsp;".date('h:i A', strtotime($data['s_time']))."\t-\t".date('h:i A', strtotime($data['end_time'])); ?></font></td>

           
            <?php 
            date_default_timezone_set('Asia/Kolkata');
            $s=$data['s_time'];
            $e=$data['end_time'];
            $start_t=strtotime($s);
            $end_t=strtotime($e);
            $c_time=strtotime(date('H:i:s', strtotime(date('H:i:s'))));
            $cdate=strtotime(date('Y-m-d'));
            $edate=strtotime(date($data['date']));
            ?>

            <td  style="border-right: 2px solid #154360;" align="center" class="col-md-1">
            <?php if($edate ==  $cdate){ if($start_t <=  $c_time){ if($c_time<=$end_t){echo '<div class="text-white">Processing</div>';}else{echo'<div class="text-white">Complate</div>';}}else{echo '<div class="text-white">Pending</div>';}}else{if($edate >  $cdate){echo '<div class="text-white">Pending</div>';}else{echo '<div class="text-white">Complate</div>';}}?> </td> 
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Home Page</title>
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
    
   <style type="text/css">
       .main{
           margin-top: 10%;
        
       }
       @media (max-width: 750px) {
  .profile-pic {
    margin-left: 100px;
  }
}   img {
        opacity: 0.9;
        filter: alpha(opacity=40);
    }
    
    img:hover {
        opacity: 1.0;
        filter: alpha(opacity=100);

    }
  @media (max-width: 575px) {
  .section01 {
   display: none;
  }
}
@media (min-width: 1525px){.data{max-height: 215px}}
@media (max-width: 992px){.data{max-height: 400px}}




.z:hover {
  margin: 5px inset grey;
}
#parent:hover i{
  display: inline-block;
  animation: swing ease-in-out 0.5s 1 alternate;
  color: #00e64d;
}
i:hover {
  display: inline-block;
  animation: swing ease-in-out 0.5s 1 alternate;
}
@keyframes swing {
  0% {
    transform: rotate(0deg);
  }
  10% {
    transform: rotate(10deg);
  }
  30% {
    transform: rotate(0deg);
  }
  40% {
    transform: rotate(-10deg);
  }
  50% {
    transform: rotate(0deg);
  }
  60% {
    transform: rotate(5deg);
  }
  70% {
    transform: rotate(0deg);
  }
  80% {
    transform: rotate(-5deg);
  }
  100% {
    transform: rotate(0deg);
  }
}

    </style>
</head>
<body>
    <header  id="myDIV" style="background-image: url(img/i6.jpg); background-size: cover;">
    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo">
       <a class="navbar-brand" href="index.php">
          <i class="fas fa-book-reader fa-lg mx-3 text-secondary"></i><span style="background: linear-gradient(to right,#f4524d  10%,#55a3ff  100%) !important;-webkit-background-clip: text !important;-webkit-text-fill-color: transparent !important; font-family: georgia;">MCQ-MANAGEMENT SYSTEM</span></a>
   
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
  <li class="text-white"><h4> <marquee> <strong class="text-secondary"> Hello  <?php echo $_SESSION['user']; ?></strong></marquee></h4> </li>
         
      </ul>
    </div>
  </nav>
      
        
       <script>
    const body = document.querySelector("body");
    const navbar = document.querySelector(".navbar");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    window.onscroll = ()=>{
      this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
    }



function f1() {document.getElementById("myDIV").style.backgroundImage = "url(img/i1.jpg)";}
function f2() {document.getElementById("myDIV").style.backgroundImage = "url(img/i2.jpg)";}
function f3() {document.getElementById("myDIV").style.backgroundImage = "url(img/i3.jpg)";}
function f4() {document.getElementById("myDIV").style.backgroundImage = "url(img/i4.jpg)";}
function f5() {document.getElementById("myDIV").style.backgroundImage = "url(img/i5.jpg)";}
function f6() {document.getElementById("myDIV").style.backgroundImage = "url(img/i6.jpg)";}
function f7() {document.getElementById("myDIV").style.backgroundImage = "url(img/i7.jpg)";}
function f8() {document.getElementById("myDIV").style.backgroundImage = "url(img/i8.jpg)";}
function f9() {document.getElementById("myDIV").style.backgroundImage = "url(img/i9.jpg)";}
function f10() {document.getElementById("myDIV").style.backgroundImage = "url(img/i10.jpg)";}
function f11() {document.getElementById("myDIV").style.backgroundImage = "url(img/i11.jpg)";}
function f12() {document.getElementById("myDIV").style.backgroundImage = "url(img/bg24.jpg)";}
  </script>
    </div>
  
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-8 col-md-12  text-white">
         
            
            
 
<!------------------------Main End-------------------------------->

         
         <br>
        </div>
        </div>
        </div>
        
    <br><br><br><br><br><br>


<div class="container col-md-12">
    <div class="row">
    <div class="col-lg-6 col-md-12 rounded-pill" style="background-image:url('img/i2.jpg'); background-size:cover;  background-size:cover; box-shadow:0 0 5px 8px inset rgba(0, 0, 0, 0.4);">
         <div class="float-lef col-md-4">
        <div class="col-md-12 profile-pic">
        <img src="assets/UI-face-2.jpg" class="rounded-circle float-left" alt="image not found" width="212"height="212" style="box-shadow: 10px 5px 8px nset grey;">
    </div>
    </div>
<br><br><br>
        <div class=" col-lg-8 col-md-8 float-right rounded-pill profile-data text-white" style="box-shadow:-40px -1px 40px inset grey; background-color:rgba(0, 0, 0, 0.5);">
          <br>
            <h6 align="left" class="pl-5 ml-3">Admin Id<pre class="d-inline">     </pre>:<pre class="d-inline">   </pre><?php echo $admin_id; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Name<pre class="d-inline">        </pre>:<pre class="d-inline">    </pre><?php echo $admin_name; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Department<pre class="d-inline">   </pre>:<pre class="d-inline">   </pre><?php echo $admin_department; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Email<pre class="d-inline">         </pre>:<pre class="d-inline">    </pre><?php echo $admin_email; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Phone<pre class="d-inline">        </pre>:<pre class="d-inline">   </pre><?php echo $admin_mobile; ?></h6>  
            <h6 align="left" class="pl-5 ml-3"> Password<pre class="d-inline">     </pre>:<pre class="d-inline">   </pre><?php echo $admin_password; ?></h6>
            <br>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 rounded text-white overflow-auto data" style="background-color: rgba(20, 20, 20, 0.8); box-shadow: 2px 35px 10px inset grey; ">
      <h4 align="center">Exam Details</h4>

    <div style="background:transparent;" class="rounded">

    <?php if(@$_GET['q']==0) {
      showdata(); ?> 
        
         <br>
        <?php
          }
        ?>
        
        
    </div>
</div>
</div>
        <br><br><br>
        
<div class="container text-center col-lg-12 col-md-12 bg-dark rounded-circle" style="box-shadow:0 0 10px 40px inset black;">
  <div class="row g-2">

    <div class="col-lg-2 col-md-4 col-sm-12 h-5 rounded">
        <a href="admin.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon;"><br><br> <i class="fas fa-home fa-lg px-2"></i>Home Page </p></div></a>
    </div>

    <div class="col-lg-2 col-md-4 col-sm-12 rounded">
        <a href="teacherDetail.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon;"><br><br><i class="fas fa-chalkboard-teacher fa-lg px-2"></i>Teacher Detail</p></div></a>
    </div>
    
    <div class="col-lg-2 col-md-4 col-sm-12 rounded">
        <a href="studentDetail.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon;"><br><br><i class='fas fa-book-reader fa-lg px-2'></i>Student Detail</p></div></a>
    </div>
    <br>
    <div class="col-lg-2 col-md-4 col-sm-12 rounded">
        <a href="examDetail.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon";><br><br><i class="fas fa-book fa-lg px-2"></i>Exam Detail</p></div></a>
    </div>
      <div class="col-lg-2 col-md-4 col-sm-12 rounded">
        <a href="announcement.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon;"><br><br><i class="fas fa-bullhorn fa-lg px-2"></i>Announcement</p></div></a>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-12 rounded">
        <a href="logout.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon;"><br><br><i class='fas fa-sign-out-alt fa-lg px-2'></i>Logout</p></div></a>
    </div>
  </div>
</div>  
<br><br>
  </header>
    <div class="col-md-12 section01">
      <div class="row">
<div class="col-md-12">
<div class="row">
<button class="col-lg- col-md-1 col-sm-1 py-2 z" onclick="f1()" style="background-image: url('img/i1.jpg'); background-size:cover;"></button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f2()" style="background-image: url('img/i2.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f3()" style="background-image: url('img/i3.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f4()" style="background-image: url('img/i4.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f5()" style="background-image: url('img/i5.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f6()" style="background-image: url('img/i6.jpg'); background-size:cover;"></button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f7()" style="background-image: url('img/i7.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f8()" style="background-image: url('img/i8.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f9()" style="background-image: url('img/i9.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f10()" style="background-image: url('img/i10.jpg'); background-size:cover;"></button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f11()" style="background-image: url('img/i11.jpg'); background-size:cover;"> </button>
<button class="col-lg-1 col-md-1 col-sm-1 z" onclick="f12()" style="background-image: url('img/bg24.jpg'); background-size:cover;"></button>
</div>
</div>




      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>
    </div>
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
