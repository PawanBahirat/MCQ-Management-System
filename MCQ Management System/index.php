<?php
session_start();
if(isset($_SESSION['sub-id'])){
     $sub=$_SESSION['sub-id'];
    header("location:exam.php?sub-id=$sub&qn=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Online MCQ Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css"/>
    <link rel="stylesheet" href="./mobile-style01.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        
        .heading{
            width: 60;
            line-height: 50px;
            font-size: 1.4rem;
             background: -webkit-linear-gradient(left, #FE6705, #FABE4F);
            font-family: 'Staatliches', cursive;

        }  @media (max-width: 1000px) {
  .eyes {
   display: none;
  }
}
    </style>
    <style>
    
/*-------------------------Login Popup Start------------------------------------*/

.effect-1{width: 300px;border:transparent;border-top:0;border-right:0;border-left:0;border-bottom: 2px solid #D3D3D3;outline: 0; box-shadow: 0px 2px 2px #aaaaaa;}
.close{float: right;}
.lgn{background-color: rgb(116 119 131 / 43%);}
.form-control:focus {color: #495057;background-color: #fff;border-color: #80bdff;outline: 0;box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25)}
.btn-secondary:focus {box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)}    
.close:focus {box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)}
.mt-200 {margin-top: 200px}

/*-------------------------Login Popup End------------------------------------*/


/*------------------------------------Student Registration Popup Start---------------------------------*/    


.close {  -webkit-background-clip: text;-webkit-text-fill-color: transparent;}
.close:hover {box-shadow: 0 0 5px 5px inset white;}
.modal-header {background-image: url(img/bg11.jpg); background-size: cover; box-shadow: 0 0 5px 5px inset white;}
.modal-body {background-image: url(img/bg10.jpg); background-size:cover; box-shadow: 0 0 5px 5px inset white;}
.modal-title { box-shadow: 0 0 40px 2px outset white; border: none; background: transparent; color:rgba(0,255,255,0.8); font-family: georgia; font-weight: bold;background-image: radial-gradient(farthest-corner at 40px 40px,#f35 0%, #43e 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;}
.student-registration {max-width: 800px;margin: 50px auto;position: relative; border: 1px solid; padding: 10px; background-color:rgba(0,0,0,0.5); box-shadow: 0 0 8px 8px black;}
.student-registration .title {text-align: center;text-transform: uppercase;letter-spacing: 3px;font-size: 2.2em;line-height: 60px;padding-bottom: 10px;color: #55a3ff;background: #55a3ff;background: -moz-linear-gradient(left,#f4524d  10%,#55a3ff 100%) !important;background: -webkit-linear-gradient(left,#f4524d  10%,#55a3ff 100%) !important;background: linear-gradient(to right,#f4524d  10%,#55a3ff  100%) !important;-webkit-background-clip: text !important;-webkit-text-fill-color: transparent !important; box-shadow: 0 0 5px 5px inset grey; font-family: georgia;}
.student-form .form-field {position: relative;margin: 32px 0; }
.student-form .input-text {display: block;width: 100%;height: 36px;border-width: 0 0 3px 0;border-image-slice: 1; box-shadow: 0 0 5px 3px inset black;border-image-source: linear-gradient(to left, #743ad5, #d53a9d);font-size: 18px;line-height: 26px;font-weight: 400; color: rgba(255,255,255,0.8); background-color:rgba(0,0,0,0.5);}
.student-form .input-text:hover {border-image-source: linear-gradient(to left, #5df5df, #5a8cf5);}
.student-form .input-text:focus {outline: none;}
.label { -webkit-transform: translateY(-30px);transform: translateY(-30px);}
input:not([value=""]):not(:focus):invalid + .label{-webkit-transform: translateY(0);transform: translateY(0);} 
.student-form .label {position: absolute;left: 20px;bottom: 2px;font-size: 18px;line-height: 26px;font-weight: 400;color:rgba(255,255,255,0.7);cursor: text;transition: -webkit-transform .2s ease-in-out;transition: transform .2s ease-in-out;transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;}
.student-form .submit-btn {display: inline-block;background-color: #000;background-image: linear-gradient(125deg,#a72879,#064497);color: rgba(255,255,255,0.8);text-transform: uppercase;letter-spacing: 2px;font-size: 16px; padding: 8px 16px;border: none;width:200px;cursor: pointer; box-shadow: 0 0 4px 4px inset grey;}
.student-form .submit-btn:hover { background-image: linear-gradient(to left, #1df5df, #743ad5, #5a8cf5);}


/*------------------------------------Student Registration Popup Start---------------------------------*/    

    </style>
    
   
</head>
<body style="background-image: url('img/bg23.jpg'); background-size:cover;">
    <header style="background-image: url(img/bg.jpg); background-size: cover;">
    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo">
       <a class="navbar-brand" href="#">
           <i class="fas fa-book-reader fa-lg mx-3"></i>MCQ-MANAGEMENT SYSTEM</a>
   
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="#">Home</a></li>
          <li><a href="#" class="a rounded" data-toggle="modal" data-target="#student">Student</a></li>
          <li><a href="#" class="a rounded" data-toggle="modal" data-target="#teacher">Teacher</a></li>
          <li><a href="#" class="a rounded" data-toggle="modal" data-target="#admin">Admin</a></li>
        <li><a href="Stud_reg.php" class="a"  > Register </a></li>
         <li><a href="#aboutus" class="about">About Us</a></li>
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

        function myFunction1() {
      var x = document.getElementById("myInput1");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    function myFunction3() {
  var x = document.getElementById("myInput3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
    </div>
        
        
                
<!-------------------------Student login-------------------------------------->
            

    <div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-image: url(img/bg24.jpg);">
                    <h5 class="modal-title rounded" id="exampleModalLabel">MCQ Management System</h5> <button type="button" class="close student-modal-close rounded" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body rounded" style="background-image: url(img/bg23.jpg);">
                    <section class="student-registration rounded px-2 mx-5">
                        <h1 class="title">Student Login</h1>
                        <form action="student_login_check.php" method="post" class="student-form row">  
                            <div class="col-lg-3 col-sm-4 col-md-4"></div>
                            <div class="form-field col-lg-6">
                                <i class="far fa-user fa-2x position-absolute top-50 start-100 translate-middle pr-5" style="color:black; transform: translateX(-50px);"></i>
                                <input id="email" name="prn" class="input-text js-input rounded" type="username" required>
                                <label class="label" for="name">Student PRN</label>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3"></div>
                            <div class="form-field col-lg-6">
                                <i class="fas fa-lock fa-2x position-absolute top-50 start-100 translate-middle pr-5" style="color:black; transform: translateX(-50px);"></i>
                                <input id="myInput1" name="pass" class="input-text js-input rounded" type="password" required>
                                <label class="label" for="phone">Password</label>
                            </div>
                            <i class="fas fa-eye fa-2x eyes" style="cursor: pointer; transform: translateY(35px);" onclick="myFunction1()"></i>
                            <div class="form-field col-lg-8">
                                <input class="submit-btn rounded float-right" type="submit" value="Login">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>





      <!----------------------close student login--------------------------------->



      <!-------------------Teacher login start------------------------------------>
            

    <div class="modal fade" id="teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-image: url(img/bg24.jpg);">
                    <h5 class="modal-title rounded" id="exampleModalLabel">MCQ Management System</h5> <button type="button" class="close student-modal-close rounded" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body rounded" style="background-image: url(img/bg23.jpg);">
                    <section class="student-registration rounded px-2 mx-5">
                        <h1 class="title">Teacher Login</h1>
                        <form action="teacher_login_check.php" method="post" class="student-form row">  
                            <div class="col-lg-3 col-sm-4 col-md-4"></div>
                            <div class="form-field col-lg-6">
                                <i class="far fa-user fa-2x position-absolute top-50 start-100 translate-middle pr-5" style="color:black; transform: translateX(-50px);"></i>
                                <input id="email" name="email" class="input-text js-input rounded" type="username" required>
                                <label class="label" for="name">E-mail Id</label>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3"></div>
                            <div class="form-field col-lg-6">
                                <i class="fas fa-lock fa-2x position-absolute top-50 start-100 translate-middle pr-5" style="color:black; transform: translateX(-50px);"></i>
                                <input id="myInput2" name="pass" class="input-text js-input rounded" type="password" required>
                                <label class="label" for="phone">Password</label>
                            </div>
                            <i class="fas fa-eye fa-2x eyes" style="cursor: pointer; transform: translateY(35px);" onclick="myFunction2()"></i>
                            <div class="form-field col-lg-8">
                                <input class="submit-btn rounded float-right" type="submit" value="Login">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

      
      
      <!----------------close teacher login---------------------------------> 


        
      <!--------------------------Admin Login-------------------------------->
      

    <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-image: url(img/bg24.jpg);">
                    <h5 class="modal-title rounded" id="exampleModalLabel">MCQ Management System</h5> <button type="button" class="close student-modal-close rounded" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body rounded" style="background-image: url(img/bg23.jpg);">
                    <section class="student-registration rounded px-2 mx-5">
                        <h1 class="title">Admin Login</h1>
                        <form action="admin_login_check.php" method="post" class="student-form row">  
                            <div class="col-lg-3 col-sm-4 col-md-4"></div>
                            <div class="form-field col-lg-6">
                                <i class="far fa-user fa-2x position-absolute top-50 start-100 translate-middle pr-5" style="color:black; transform: translateX(-50px);"></i>
                                <input id="name" name="user" class="input-text js-input rounded" type="username" required>
                                <label class="label" for="name">Username</label>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3"></div>
                            <div class="form-field col-lg-6">
                                <i class="fas fa-lock fa-2x position-absolute top-50 start-100 translate-middle pr-5" style="color:black; transform: translateX(-50px);"></i>
                                <input id="myInput3" name="pass" class="input-text js-input rounded" type="password" required>
                                <label class="label" for="phone">Password</label>
                            </div>
                                <i class="fas fa-eye fa-2x eyes" style="cursor: pointer; transform: translateY(35px);" onclick="myFunction3()"></i>
                            <div class="form-field col-lg-8">
                                <input class="submit-btn rounded float-right" type="submit" value="Login">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
      
      
      <!---------------------close Admin login-------------------------->


        
        
        
  
    <div class="container text-center">
        <br><br><br><br><br><br>
      <div class="row">
        <div class="col-md-12 col-sm-12" style="color:rgba(19, 0, 0, 1.0); font-family: georgia;">
         
          <h1 class="rounded" style="">MCQ MANAGEMENT SYSTEM</h1>
          <br>
           <h6 class="rounded" style="">ONLINE TEST PLATFORM</h6>
          <br><br>
        </div>
     <div class="col-md-12 col-sm-12" style="color:rgba(19, 0, 0, 1.0); font-family: georgia;"> <h4 align="center">Announcements </h4></div>
     <br>
     <br>
    <div class="col-md-12 col-sm-12 rounded-pill text-white" style="background-color: rgba(0, 0, 0, 0.1);  max-height: 570px; font-family: georgia;">
            <?php
            $con = mysqli_connect('localhost','root','','exam');
            $query2 = "SELECT * FROM `announcement`";
            $run2 = mysqli_query($con,$query2);
          
          
            if($run2==TRUE){
                while($data2 = mysqli_fetch_array($run2))
                {
                    if($data2['faculty']=="All")
                    {
                        if($data2['seen']=="Both")
                        {
                            echo ' <marquee behavior="alternate"><strong>* '.$data2['data'].'</strong></marquee><br>';
                        }
                    }
                }
            }
        ?>
    </div>

      </div>
    </div>
  </header>
    <main>
  <br />
  <br />
    <section class="section-1">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="pray">
              <img src="assets/img1.jpg" alt="Pray" class=""/>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="panel text-left">
              <h1>OUR ESTABLISHMENT!</h1>
              <p class="pt-4">
                           Online Examination Management System is best designed for the
                            examination board to deliver at
                            mass scale electronic
                            examinations and provide them at the national level and International level.

                              <h6> <strong>Question Palette</strong></h6>

                            Students can browse questions via the questions navigation panel. This allows the user to
                            skip the current question and
                            view answered or unanswered questions.

                            Exam Timer

                            Exam timer is synchronized with the server, this prevents the timer from reset when a
                            student accidentally refreshes or
                            close up the browser. Students can see the time remaining to complete the exam.

                            Randomize Question

                            Each student will be given a different set of exam questions if the random question is being
                            turned on. This can be
                            easily configured by the admin.

                            Automated Marking System
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br />
    <br />
    <section class="section-2 container-fluid p-0">
      <div class="cover">
        <div class="overlay"></div>
        <div class="content text-center">
         
        <h1>
         " SUCCESS IS NEVER FINAL.<br />FAILURE IS NEVER FATAL.<br />IT'S COURAGE THAT COUNTS."
          </h1>
        </div>
      </div>



     
    </section>
    <section class="section-3 container-fluid p-0 text-center" id="aboutus">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1><strong>ABOUT US</strong></h1>
          <p>
                       Online Exam Management System has no limitation regarding subjects or topics, our Exam
                            Builder is designed to handle any
                            number of questions within the exam. Any number of examinations can set with a mixture
                            of topics, for instance, science
                            examination physics, Chemistry, Biology, Nuclear Science and Live Science can be added.
                            This gives the examination board
                            a total facility to develop and enhance any kind of examination required.
          </p>
        </div>
      </div>

      <div class="platform row">
        <div class="col-md-6 col-sm-6 col-6 text-right">
          <div class="desktop shadow-lg">
            <div class="d-flex flex-row justify-content-center">
              <i class="fas fa-desktop fa-3x py-2 pr-3"></i>
              <div class="text text-left">
                <h3 class="pt-1 m-0">Desktop</h3>
                <p class="p-0 m-0">SUPPORT</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-6 text-left">
          <div class="desktop shadow-lg">
            <div class="d-flex flex-row justify-content-center">
              <i class="fas fa-mobile-alt fa-3x py-2 pr-3"></i>
              <div class="text text-left">
                <h3 class="pt-1 m-0">On Mobile</h3>
                <p class="p-0 m-0">SUPPORT</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
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
      
        <marquee style="color:#A9A9A9;" behavior=""><strong> |*|~Credit~|*| :- ~*~  BAHIRAT PAWAN PRABHAKAR ~*~ |*|</strong></marquee>
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

<?php
if(isset($_GET['msg'])){
    echo '<script type="text/javascript">
    swal("Wrong Id And Password", "Try again!", "error").then(function() {
    window.location = "index.php";});
     </script>';
}
?>