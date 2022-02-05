<?php 

session_start();
    if(!isset($_SESSION['email'])){
    header('location:index.php');
}
?>
<?php
$con = mysqli_connect('localhost','root','','exam');

    $username = $_SESSION['email'];
    $password = $_SESSION['pass'];
global $teacher_name;  
global $teacher_faculty;
global $teacher_email;
global $teacher_mobile;
global $teacher_password;  

    $query1= "select * from `teachers` where email_id = '$username' && pass = '$password'";

                        $run1=mysqli_query($con,$query1);

                        if($run1==true){                               
                            while($data1 = mysqli_fetch_array($run1))
                            {
                                $teacher_name=$data1['teacher-name'];
                                $teacher_faculty=$data1['faculty'];
                                $teacher_email=$data1['email_id'];
                                $teacher_mobile=$data1['mobile'];
                                $teacher_password=$data1['pass'];
                            }
                            
                            }else{
                                echo "Error.. ";
                            }
    
    ?>
<!--------student table--------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Teacher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css" />
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
    <header id="myDIV" style="background-image: url(img/i6.jpg); background-size: cover;">
    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo">
       <a class="navbar-brand" href="index.php">
          <i class="fas fa-book-reader fa-lg mx-3"></i>MCQ-MANAGEMENT SYSTEM</a>
   
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
          <li class="text-white"><h4> <marquee> <strong> Hello <?php echo $teacher_name; ?></strong></marquee></h4> </li>
         
         
      </ul>
      <div class="icon menu-btn"> 
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

    <br><br><br><br><br><br>



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
            <h6 align="left" class="pl-5 ml-3"> Name<pre class="d-inline">     </pre>:<pre class="d-inline">   </pre><?php echo $teacher_name; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Faculty<pre class="d-inline">    </pre>:<pre class="d-inline">   </pre><?php echo $teacher_faculty; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Email<pre class="d-inline">      </pre>:<pre class="d-inline">   </pre><?php echo $teacher_email; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Phone<pre class="d-inline">     </pre>:<pre class="d-inline">   </pre><?php echo $teacher_mobile; ?></h6>
            <h6 align="left" class="pl-5 ml-3"> Password<pre class="d-inline">  </pre>:<pre class="d-inline">   </pre><?php echo $teacher_password; ?></h6>
            <br>
        </div>
    </div>
    <div class="col-md-6 rounded text-white" style="background-color: rgba(20, 20, 20, 0.8); box-shadow: 2px 35px 10px inset grey;">
      
          <?php
            $con = mysqli_connect('localhost','root','','exam');
            $query2 = "SELECT * FROM `announcement`";
            $run2 = mysqli_query($con,$query2);
          
          
            if($run2==TRUE){
                while($data2 = mysqli_fetch_array($run2))
                {
                   
                        if((($data2['faculty']=="All")&&($data2['seen']=="Teacher"))||(($data2['faculty']==$teacher_faculty)&&($data2['seen']=="Both"))||(($data2['faculty']==$teacher_faculty)&&($data2['seen']=="Teacher")))
                        {
                            echo '<h4 align="center" >Admin Announcements</h4><br> <marquee behavior=""><strong style="color:rgba(255,255,255,0.9);">Announcement :- '.$data2['data'].'</strong></marquee><br><br>';
                        }
                    
                }
            }
        ?>
        
    </div>
</div>
</div>
        <br><br><br>
<div class="container text-center col-lg-12 col-md-12 bg-dark rounded-circle" style="box-shadow:0 0 10px 40px inset black;">
  <div class="row g-2 ">

    <div class="col-lg-3 col-md-4 col-sm-12 h-5 rounded">
        <a href="teacher.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon;"><br><br> <i class="fas fa-home fa-lg px-2"></i>Home Page </p></div></a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-12 rounded">
        <a href="quiz.php" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon";><br><br><i class="fas fa-book fa-lg px-2"></i>Exam Detail</p></div></a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-12 rounded">
        <a href="stud_detail_tech.php?q=0" class="text-decoration-none">
      <div class="rounded-pill dashboard-option" id="parent" style="min-height:135px; cursor: pointer; background-color: transparent; background-color:rgba(255,255,255,0.5); box-shadow: 0 0 8px 8px black;"><p class="p-2 rounded h5" style="color:maroon;"><br><br><i class='fas fa-book-reader fa-lg px-2'></i>Student Detail</p></div></a>
    </div>
  

    <div class="col-lg-3 col-md-4 col-sm-12 rounded">
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
