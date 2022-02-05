<?php
session_start();

if(isset($_GET['suc'])){
    unset($_GET['msg']);
}
if(isset($_GET['msg'])){
    unset($_GET['suc']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheet.css"/>
    <link rel="stylesheet" href="./mobile-style01.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        
        .heading{
            width: 60;
            line-height: 50px;
            font-size: 1.4rem;
             background: -webkit-linear-gradient(left, #FE6705, #FABE4F);
            font-family: 'Staatliches', cursive;

        }
        .main{
            margin-top: 8%;
        }
        .main1{
            margin-top: 6%;
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
.label p{ -webkit-transform: translateY(+20px);transform: translateY(+20px);}

input:not([value=""]):not(:focus):invalid + .label{-webkit-transform: translateY(0);transform: translateY(0);} 
.student-form .label {position: absolute;left: 20px;bottom: 2px;font-size: 18px;line-height: 26px;font-weight: 400;color:rgba(255,255,255,0.7);cursor: text;transition: -webkit-transform .2s ease-in-out;transition: transform .2s ease-in-out;transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;}
.student-form .submit-btn {display: inline-block;background-color: #000;background-image: linear-gradient(125deg,#a72879,#064497);color: rgba(255,255,255,0.8);text-transform: uppercase;letter-spacing: 2px;font-size: 16px; padding: 8px 16px;border: none;width:200px;cursor: pointer; box-shadow: 0 0 4px 4px inset grey;}
.student-form .submit-btn:hover { background-image: linear-gradient(to left, #1df5df, #743ad5, #5a8cf5);}


/*------------------------------------Student Registration Popup Start---------------------------------*/    

        
@media only screen and (max-width: 320px) {
  .section-4 .carousel-inner {
    margin-left: -4vmin;
  }
    .content{
        font-size: 1vm;
    }
    
}
    </style>
    
   
</head>
<body>
    <header style="background-image: url('img/i10.jpg'); background-size:cover;">
    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo">
       <a class="navbar-brand" href="#">
           <i class="fas fa-book-reader fa-lg mx-3"></i>MCQ Management System</a>
   
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="index.php">Home</a></li>
         
        <li><a style="color: skyblue" class="rounded" data-toggle="modal" data-target="#exampleModal"> Register </a></li>
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
        

<div class="row">
    <div class="col-md-1"><div class="main"></div></div>
        <!------------------------Student Registration Model Start-------------------------------->

<div class="col-md-10 ">
<div class="main1">
<div class="container">
        <div class="modal-dialog modal-xl modal-dialog-centered bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title rounded" id="exampleModalLabel">MCQ Management system</h5> 
                    <a href="index.php" class="btn btn-outline-danger btn-lg"><span><b>&times;</b></span></a> 
                </div>
                <div class="modal-body ">
                    <section class="student-registration rounded">
                        <h1 class="title"> Student Registration </h1>
                        <form action="student_reg_check.php" method="post" onsubmit="return val()" class="student-form row">  
                            <div class="form-field col-lg-4">
                                <input id="fname" name="fname" class="input-text js-input rounded" type="text" required>
                                <label class="label" id="fname1" for="name">First Name</label>
                            </div>
                            <div class="form-field col-lg-4">
                                <input id="mname" name="mname" class="input-text js-input rounded" type="text" required>
                                <label class="label" id="mname1" for="name">Middle Name</label>
                            </div>
                            <div class="form-field col-lg-4">
                                <input id="lname" name="lname" class="input-text js-input rounded" type="text" required>
                                <label class="label" id="lname1" for="name">Last Name</label>
                            </div>
                            <div class="form-field col-lg-4">
                                <input id="prn" name="prn" class="input-text js-input rounded" type="text" required>                                                               
                               <label class="label" id="prn1" for="email">PRN No.</label>                           
                                
                            </div>
                            <div class="form-field col-lg-4">
                                <select name="faculty" id="slct" class="input-text js-input rounded" required>
                                     <option selected disabled style="display: none;"></option>
                                     <option value="BCS"><li>BCS</li></option>
                                     <option value="BCA">BCA</option>
                                     <option value="BBA">BBA</option>
                                </select>
                                <label class="label" for="name">Faculty</label>
                            </div>
                            <div class="form-field col-lg-4">
                                <select name="stream" id="slct" class="input-text js-input rounded" required>
                                    <option selected disabled style="display: none;"></option>
                                    <option value="FY"><li>FY</li></option>
                                    <option value="SY">SY</option>
                                    <option value="TY">TY</option>
                                </select>       
                                <label class="label" for="name">Stream</label>
                            </div>
                            <div class="form-field col-lg-4">
                                <select name="gender" id="slct" class="input-text js-input rounded" required>
                                    <option selected disabled style="display: none;"></option>
                                    <option value="Male"><li>Male</li></option>
                                    <option value="Female">Female</option>
                                    <option value="Othet">Other</option>
                                </select>       
                                <label class="label" for="name">Gender</label>
                            </div>                            
                            <div class="form-field col-lg-4 ">
                                <input id="mobile" name="mobile" class="input-text js-input rounded" type="phone" required>
                                <label class="label" id="mobile1" for="phone">Contact Number</label>
                            </div>
                            <div class="form-field col-lg-4 ">
                                <input id="email" name="email" class="input-text js-input rounded" type="text" required>
                                <label class="label" id="email1" for="phone">E-Mail</label>
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="pass" name="pass" class="input-text js-input rounded" type="password" required>
                                <label class="label" id="pass1" for="phone">Password</label>
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="cpass" name="cpass" class="input-text js-input rounded" type="password" required>
                                 <label class="label" id="cpass1" for="phone">Confirm Passsword</label>
                            </div>
                           
                            <div class="form-field col-lg-12">
                                <input class="submit-btn rounded" name="submit" type="submit" value="Register">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
<!------------------------Student Registration Model End-------------------------------->
    <div class="col-md-1"></div></div>
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
    
    <script type="text/javascript">
    
       $(document).ready(function(){
           
           $("#prn").blur(function(){
               
               var prn = $(this).val();
               
               $.ajax({
                   
                   url:"validation.php",
                   method: "POST",
                   data:{s_prn:prn},
                   datatype: "text",
                   success:function(html)
                   {
                       $('#prn1').html(html);
                   }
                   
               });
           });
           
       });
    </script>
    <script type="text/javascript">
        function val(){
            
            var fname = document.getElementById('fname').value;
            var mname = document.getElementById('mname').value;
            var lname = document.getElementById('lname').value;
            var prn = document.getElementById('prn').value;
            var mobile = document.getElementById('mobile').value;
            var email = document.getElementById('email').value;
            var pass = document.getElementById('pass').value;
            var cpass = document.getElementById('cpass').value;
            
            if(!isNaN(fname)){
               document.getElementById('fname1').innerHTML="<p style='color:red'><b>Only characters are allowed.</b></p>";
                return false;
            }
            if(!isNaN(mname)){
               document.getElementById('mname1').innerHTML="<p style='color:red'><b>Only characters are allowed.</b></p>";
                return false;
            }
            if(!isNaN(lname)){
               document.getElementById('lname1').innerHTML="<p style='color:red'><b>Only characters are allowed.</b></p>";
                return false;
            }
            if(isNaN(prn)){
               document.getElementById('prn1').innerHTML="<p style='color:red'><b>Only numbers are allowed.</b></p>";
                return false;
            }
            if(prn.length < 10){
               document.getElementById('prn1').innerHTML="<p style='color:red'><b>PRN no. must be 10 digits.</b></p>";
                return false;
            }
            if(prn.length > 10){
               document.getElementById('prn1').innerHTML="<p style='color:red'><b>PRN no. must be 10 digits.</b></p>";
                return false;
            }
            if(isNaN(mobile)){
               document.getElementById('mobile1').innerHTML="<p style='color:red'><b>Only numbers are allowed.</b></p>";
                return false;
            }
            if(mobile.length > 10){
               document.getElementById('mobile1').innerHTML="<p style='color:red'><b>Mobile no.must be 10 digits.</b></p>";
                return false;
            }
            if(mobile.length < 10){
               document.getElementById('mobile1').innerHTML="<p style='color:red'><b>Mobile no.must be 10 digits.</b></p>";
                return false;
            }
            if((mobile.charAt(0) != 9) && (mobile.charAt(0) != 8) && (mobile.charAt(0) != 7)){
               document.getElementById('mobile1').innerHTML="<p style='color:red'><b>Invalid mobile no.</b></p>";
                return false;
            }
            if((email.charAt(email.length-4) != '.') && (email.charAt(email.length-3) != '.')){
               document.getElementById('email1').innerHTML="<p style='color:red'><b>Invalid '.' Position.</b></p>";
                return false;
            }
            if(email.indexOf('@')<=0){
               document.getElementById('email1').innerHTML="<p style='color:red'><b>Invalid '@' Position.</b></p>";
                return false;
            }
            if((pass.length > 10) || (pass.length < 5)){
               document.getElementById('pass1').innerHTML="<p style='color:red'><b>Password length must be b/w 5-10 char.</b></p>";
                return false;
            }
            if(pass!=cpass){
               document.getElementById('cpass1').innerHTML="<p style='color:red'><b>Password are not same.</b></p>";
                return false;
            }
            
        }
    </script>
    

</body>
</html>
<?php
if(isset($_GET['msg'])){
    echo '<script type="text/javascript">
    swal("PRN No. already exists!", "Try another PRN", "error").then(function() {
    window.location = "stud_reg.php";});
     </script>';
}

if(isset($_GET['suc'])){
    echo '<script type="text/javascript">
    swal("Registration Successfull!", "", "success").then(function() {
    window.location = "index.php";});
     </script>';
}

?>

