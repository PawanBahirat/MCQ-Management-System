<?php 

session_start();
    if(!isset($_SESSION['prn'])){
    header('location:student.php');
}
if(isset($_SESSION['submit'])){
    header('location:student.php');
}

/*if(isset($_SESSION['time_out'])){
   echo '<script type="text/javascript">
        setInterval(function()
    {
            document.getElementById("form1").submit();
        },0);   
    </script>';
    }*/
?>  
 
<?php
$con = mysqli_connect('localhost','root','','exam');


    global $prn;
     $prn = $_SESSION['prn'];
    $password = $_SESSION['pass'];
global $stud_name;
    
   

    $query1= "select * from `student` where prn = '$prn' && pass = '$password'";



                        $run1=mysqli_query($con,$query1);



                        if($run1==true){


                               
                            while($data1 = mysqli_fetch_array($run1))
                            {


                            $stud_name=$data1['fname'];
                            
                            }
                            
                            }else{
                                echo "Error.. ";
                            }
    
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Online Exam</title>
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
        .section-1{
         
            text-align: left;
        }
        @media only screen and (max-width: 768px) {
        .main{
            margin-top: 15%;
        }
        }
        .main{
            margin-top: 10%;
        }
    
    </style>
   
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
        <li><a href="student.php">Home</a></li>
          <li><a href="#">Student</a></li>
          <li><a href="">Hello' <?php echo $stud_name; ?></a></li>
          
        
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
  <div class="main">
      
    <div class="container">
               
            
        <!--------start exam model------>
            
            
        <div class="exam" id="carouselExampleIndicators" class="carousel slide">
         
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="jumbotron">
                  
                
                  
                   <?php 
                  
                  $con = mysqli_connect('localhost','root', '', 'exam');
                 
                  function fatch_tq($subid){
                      global $con;
                      global $sub_name;
                     
    
                        $query = "SELECT * FROM `subject` where id = '$subid'";
                        $run = mysqli_query($con,$query);
                        
                        global $totalq;
                        while($data1 = mysqli_fetch_assoc($run))
                        {
                           
                            $totalq=$data1['totalQ'];
                            $sub_name=$data1['sub'];
                            $_SESSION['faculty']=$data1['faculty'];
                            $_SESSION['stream']=$data1['stream'];
                            $_SESSION['sem']=$data1['sem'];
                        }
                      $_SESSION['sub']=$sub_name;
                      return $totalq;
                  }
                  
                  
                  function QPaper($tq,$subid){                      
                      global $con;
                      global $sub_name;
                      global $prn;
                      global $subid;
                      $value= $_GET['qn'];
                         
                        if(($value<=$tq)&&($value>=1)){
                            
                        $query = "SELECT * FROM `que_paper` where subId = '$subid' && qnum = '$value'";
                        $run = mysqli_query($con,$query);

                             if($run==true){
                                    
                                            while($data = mysqli_fetch_array($run))
                                            {
                                                ?>
                                                <p align="right"><b>Remaning Time - <label id="timer">00:00:00</label></b></p><br>
                                                
                                                 <h5>Subject : <?php echo $sub_name; ?></h5>  
                                                <h4>Q.<?php echo $data['qnum']; ?></h4>
                                                    
                                                  <p class="lead"><b><?php echo $data['que']; ?></b></p>
                                                  
                  
                                                      
                                                  <!--<form action="#" method="post">-->
                                                    <?php
                                                        $sql3 = "select * from ans_paper where stud_prn = '$prn' AND sub_id='$subid' AND qnum='$value'";
                                                        $query3 = mysqli_query($con, $sql3);
                                                        $ans1="none";
                                                        if($query3==true){                               
                                                            while($data3 = mysqli_fetch_array($query3))
                                                            {
                                                                $ans1=$data3['ans'];
                                                             }

                                                        }else{
                                                                 echo "Error.. ";
                                                        }

                                                    ?>
                                                <form id='form1' method='post' action='exam_check.php'>
                                                    <p><input  name="ans" value="unanswered" type="hidden"></p>
                                                    <p><b>A</b> <input id="a" name="ans" value="a" type="radio" <?php if($ans1=='a'){echo "checked";}?>>   <?php echo $data['a']; ?></p>
                                                    <p><b>B</b> <input id="b" name="ans" value="b" type="radio" <?php if($ans1=='b'){echo "checked";}?>>   <?php echo $data['b']; ?></p>
                                                    <p><b>C</b> <input id="c" name="ans" value="c" type="radio" <?php if($ans1=='c'){echo "checked";}?>>   <?php echo $data['c']; ?></p>
                                                    <p><b>D</b> <input id="d" name="ans" value="d" type="radio" <?php if($ans1=='d'){echo "checked";}?>>   <?php echo $data['d']; ?></p>
                                                    <p><b></b> <input type="hidden" id="qn" name="qn" value="<?php echo $data['qnum']; ?>"></p>  <p><b></b> <input type="hidden" name="value" value="<?php echo $value; ?>"></p>   
                                                    <div class="row"><div class="col-sm-2">
                                                    <?php
                                                           $qn = $data['qnum']-1;
                                                           if($qn>0){

                                                            echo '<p align="left"><input type="submit" class="btn btn-md btn-primary" name="prev" value="Previous"></p>';
                                                               
                                                          
                                                          }else{
                                                            echo '<p align="left"><a href="#"><button class="btn btn-md btn-primary" type="button">Previous</button></a></p>';
                                                          }
                                                        ?></div><div class="col-md-2">
                                                        <?php
                                                       
                                                        $next=mysqli_query($con,"SELECT * FROM `que_paper` where subId = '$subid' && qnum>$value order by qnum ASC");
                                                         if($que=mysqli_fetch_array($next))
                                                         {
                                                           echo '<p align="left"><input type="submit" class="btn btn-md btn-primary" name="next" value="Next"></p>';
                                                         }else{
                                                             
                                                         } 
                                                        ?>
                                                        
                                                        </div>
                                                        <div class="col-sm-5"></div>
                                                        <div class="col-sm-3">
                                                        <?php
                                                        echo '<p align="right"><input type="submit" class="btn btn-md btn-success" name="submit" value="Submit"></p>';
                                                    ?>
                                                        </div>
                                                    </div>
                                                 </form>
                                                     

                                                </div>
                                            </div>
                 
                                          <?php     
                                            }

                                            }else{
                                                echo "Error.. ";
                                            }
                                    }
                                }

                            ?>                  
                 
                  
                        
                   <?php
                      global $subid;
                      
                      $subid=$_GET['sub-id'];
                      $totalq=fatch_tq($_GET['sub-id']);
                     
                      QPaper($totalq,$_GET['sub-id']); 



                  ?>
                  <?php



                  ?>
            
          </div>

        </div>
            
            <br>
            
            <!--------end-exam model--->
        
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
    
   <script type="text/javascript">
    setInterval(function()
    {
       var xml=new XMLHttpRequest();
        xml.open("GET","response2.php",false);
        xml.send(null);
        
        
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","response.php",false);
        xmlhttp.send(null);
        if((xmlhttp.responseText=="00:00:00")||(xml.responseText=="00:00:00"))
            {
                var que =document.getElementById('qn').value;
                var answer;
                
                if (document.getElementById('a').checked) {
                  answer = document.getElementById('a').value;
                }
                if (document.getElementById('b').checked) {
                  answer = document.getElementById('b').value;
                }
                if (document.getElementById('c').checked) {
                  answer = document.getElementById('c').value;
                }
                if (document.getElementById('d').checked) {
                  answer = document.getElementById('d').value;
                }
                
               window.location = "exam_check.php?qn="+que+"&ans="+answer+"&timeout=1";
                
               
            }else{
                if(xmlhttp.responseText < xml.responseText){
                document.getElementById("timer").innerHTML=xmlhttp.responseText;
                }
                else
                    {
                        document.getElementById("timer").innerHTML=xml.responseText;
                    }
            }
    },100);
    
    </script>

</body>
</html>
