<?php 

session_start();
    if(!isset($_SESSION['user'])){
    header('location:index.php');
}

?>

<?php 

$con = mysqli_connect('localhost','root', '', 'exam');
function showdata(){

    global $con;
    
    $query = "SELECT * FROM `teachers`";
    $run = mysqli_query($con,$query);
    
   
    
    if($run==TRUE){
        
        ?>


        <form action="#" method="post" class="col-md-12">
        <table id="datatableid" class="table-hover dable-dark" width="100%" height="auto" padding="20px" class="text-center col-md-12">
            <tr style="background: transparent; border-bottom: 2px inset silver; box-shadow: 0 -8px 8px inset #154360;"  height="50" class="col-md-12">
                <th style="border-right: 2px solid #154360; border-left: 2px solid grey;" align="center" class="col-md-2"><font color="white">Teacher Name</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Faculty</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Gender</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Mobile Number</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white" >Email</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-2"><font color="white" >Password</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Delete</font></th>

            </tr>

        <?php
           $id=1;
        while($data = mysqli_fetch_assoc($run))
        {
            
            
            ?>

        <tr style="background:transparent; box-shadow: 0 -3px 8px inset grey;" height="50" class="col-md-12" height="40" class="col-md-12" >
            <td style="border-right: 2px solid #154360; border-left: 2px solid grey;" class="col-md-2"><font color="white"><?php echo $data['teacher-name']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $data['faculty']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $data['gender']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data['mobile']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data['email_id']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data['pass']; ?></font></td> 
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><button class="btn btn-danger btn-sm font"><a href="delete.php?id=<?php echo $data['id']; ?>& p=teach" class="text-white">Delete</a></button> </td>
            
            
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
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheet.css" />
    <link rel="stylesheet" href="./mobile-style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    
        <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
   <style type="text/css">
       .main{
           margin-top: 10%;
        
       }
       
       /*------------------------------------Teacher Registration Popup Start---------------------------------*/    
@media (max-width: 800px){
    table{

        font-size: 10px;
    }
    .font{
        font-size: 10px;
    }
}

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


/*------------------------------------teacher Registration Popup Start---------------------------------*/    

    </style>
</head>
<body>
    <header style="background-image: url(img/bg24.jpg); background-size: cover;">

    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo ">
     <h1 class="text-white"> Teacher Detail </h1>
   
      </div>
      <ul class="menu-list float-left">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
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
  
    <div class="container text-center col-sm-12 col-lg-12 col-md-12">

      <div class="row">

        <div class="col-lg-12 col-md-12  text-white">
            
            
            <div class="main">

          <div class="admin-section-1">
            <!--------------------teacher------------------>
            <?php if(@$_GET['q']==1) {
               
              //<!-------------------Teacher registration------------------------------------>
      
                //  <!------------------------Teacher Registration Model Start-------------------------------->



            echo '<div class="container">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered bg-dark" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title rounded" id="exampleModalLabel">MCQ Management system</h5> <button type="button" class="close student-modal-close rounded" data-dismiss="modal" aria-label="Close"> 
                                    <span aria-hidden="true"    >&times;</span> </button>
                            </div>
                            <div class="modal-body">
                                <section class="student-registration rounded">
                                    <h1 class="title">Teacher Registration</h1>
                                    <form class="student-form row" action="teacher_reg_check.php" method="post" onsubmit="return val()">  
                                        <div class="form-field col-lg-4">
                                            <input id="name" class="input-text js-input rounded" name="name" type="text" required>
                                            <label class="label" id="name1" for="name1">Teacher Name</label>
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
                                            <select name="gender" id="slct" class="input-text js-input rounded" required>
                                                <option value="0" selected disabled style="display: none;"></option>
                                                <option value="Male"><li>Male</li></option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>       
                                            <label class="label" for="name">Gender</label>
                                        </div>                                          
                                        <div class="form-field col-lg-4 ">
                                            <input id="mobile" class="input-text js-input rounded" name="mobile" type="phone" required>
                                            <label class="label" id="mobile1" for="mobile1">Mobile Number</label>
                                        </div>
                                        <div class="form-field col-lg-4 ">
                                            <input id="email" class="input-text js-input rounded" name="email" type="text" required>
                                            <label class="label" id="email1" for="email1">E-Mail</label>
                                        </div>
                                        <div class="form-field col-lg-6 ">
                                            <input id="pass" class="input-text js-input rounded" name="pass" type="password" required>
                                            <label class="label" id="pass1" for="phone">Password</label>
                                        </div>
                                        <div class="form-field col-lg-6 ">
                                            <input id="cpass" class="input-text js-input rounded" name="cpass" type="password" required>
                                             <label class="label" id="cpass1" for="phone">Confirm Passsword</label>
                                        </div>                                        
                                        <div class="form-field col-lg-12">
                                            <input class="submit-btn rounded" type="submit" value="Register">
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


           // <!------------------------Teacher Registration Model End-------------------------------->


         
              
            
                 
              }
              ?>
              <!-------------------------------------------end teacher--------->
             
           
          </div>
      </div>

<!------------------------Main End-------------------------------->
<div style="background:transparent;" class="rounded">

      <?php showdata(); ?> 
      <br>
              <p align="right"><a class="btn btn-md btn-primary" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal"> Add Teacher </a></p>
            <p align="right"><a href="admin.php" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>
    </div>
  </div>

        </div>
        </div>

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
    
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
      /*  $(document).ready(function() {

            $('#datatableid').DataTable();

        } );*/
    </script>
    
    <script type="text/javascript">
    
       $(document).ready(function(){
           
           $("#email").blur(function(){
               
               var email = $(this).val();
               
               $.ajax({
                   
                   url:"validation.php",
                   method: "POST",
                   data:{t_email:email},
                   datatype: "text",
                   success:function(html)
                   {
                       $('#email1').html(html);
                   }
                   
               });
           });
           
       });
    </script>
    <script type="text/javascript">
        function val(){
            
            var name = document.getElementById('name').value;
           
            var mobile = document.getElementById('mobile').value;
            var email = document.getElementById('email').value;
            var pass = document.getElementById('pass').value;
            var cpass = document.getElementById('cpass').value;
            
            if(!isNaN(name)){
               document.getElementById('name1').innerHTML="<p style='color:red'><b>Only characters are allowed.</b></p>";
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
    swal("Email-Id already exists!", "Try another Email-Id", "error").then(function() {
    window.location = "teacherDetail.php?q=1";});
     </script>';
}

if(isset($_GET['suc'])){
    echo '<script type="text/javascript">
    swal("Registration Successfull!", "", "success").then(function() {
    window.location = "teacherDetail.php?q=1";});
     </script>';
}

?>