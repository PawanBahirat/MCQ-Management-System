<?php 

session_start();
    if(!isset($_SESSION['prn'])){
    header('location:index.php');
}
?>


<?php 
function showdata(){
$prn = $_SESSION['prn'];


$con = mysqli_connect('localhost','root', '', 'exam');
$sid=$_GET['subid'];


$query = "SELECT * FROM `result` WHERE stud_prn = '$prn' && sub_id = '$sid'";
 $run = mysqli_query($con,$query);


    if($run==true){                                    
        while($data = mysqli_fetch_array($run)){
           
        
        ?>
        <form action="#" method="post">
        <table cellspacing="20" border="1" width="100%" height="auto" padding="20px">
            <th bgcolor="black"  height="50">RESULT</th>
            <tr bgcolor="#2a5f6f" height="40">
                <td align="center"><font color="white">PRN No.</font></td>
                <td align="center"><font color="white"><?php echo $data['stud_prn']; ?></font></td>
            </tr>
            <tr bgcolor="#2a5f6f" height="40">
                <td align="center"><font color="white">Student Name</font></td>
                <td align="center"><font color="white"><?php echo $data['stud_name']; ?></font></td>
            </tr>
            <tr bgcolor="#2a5f6f" height="40">
                <td align="center"><font color="white">Faculty</font></td>
                <td align="center"><font color="white"><?php echo $data['faculty']; ?></font></td>
            </tr>
            <tr bgcolor="#2a5f6f" height="40">
                <td align="center"><font color="white">Stream</font></td>
                <td align="center"><font color="white"><?php echo $data['stream']; ?></font></td>
            </tr>
            <tr bgcolor="#2a5f6f" height="40">
                <td align="center"><font color="white">Subject</font></td>
                <td align="center"><font color="white"><?php echo $data['sub']; ?></font></td>                
            </tr>
            <tr bgcolor="#2a5f6f" height="40">
                 <td align="center"><font color="white">Total Marks</font></td>
                 <td align="center"><font color="white"><?php echo $data['total_marks']; ?></font></td>
            </tr>
            <tr bgcolor="#2a5f6f" height="40">
                 <td align="center"><font color="white">Obtained Marks</font></td>
                <td align="center"><font color="white"><?php echo $data['obt_marks']; ?></font></td>
            </tr>
            <tr bgcolor="#2a5f6f" height="40">
                <td align="center"><font color="white">Percentage</font></td>
                <td align="center"><font color="white"><?php echo $data['percentage']."%"; ?></font></td>
            </tr>

       
        
       </table></form>  <?php
            
        }
}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Books</title>
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
    <header>
    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo">
       <a class="navbar-brand" href="#">
          <i class="fas fa-book-reader fa-2x mx-3"></i>MCQ-MANAGEMENT SYSTEM</a>
   
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="#">Home</a></li>
          <li><a href="#">Student</a></li>
          
          <li><a href="logout.php"><input type='button' value="Logout" class="btn btn-danger"></a></li>
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
  
    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
         
         
         <br />
          <br><br>
            <?php showdata(); ?>
            <br> <p align="right"><a href="student.php?q=0" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>
        </div>
        <div class="col-md-5 col-sm-12  h-25">
          <img src="assets/header-img.png" alt="Book" />
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

</body>
</html>
