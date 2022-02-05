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
global $tid;  
  

    $query1= "select * from `teachers` where email_id = '$username' && pass = '$password'";

                        $run1=mysqli_query($con,$query1);

                        if($run1==true){                               
                            while($data1 = mysqli_fetch_array($run1))
                            {
                                $teacher_name=$data1['teacher-name'];
                                $teacher_faculty=$data1['faculty'];
                                $tid=$data1['id'];
                            }
                            
                            }else{
                                echo "Error.. ";
                            }
    
    ?>
<?php 

$con = mysqli_connect('localhost','root', '', 'exam');
function showdata(){
    global $tid;
    global $con;
    
    $query = "SELECT * FROM `subject` WHERE teach_id = $tid";
    $run = mysqli_query($con,$query);
    
   
    
    if($run==TRUE){
        
        ?>


        <form action="#" method="post" class="col-md-12">
        <table id="datatableid" class="table-hover dable-dark" width="100%" height="auto" padding="20px" class="text-center col-md-12">
            <tr style="background: transparent; border-bottom: 2px inset silver; box-shadow: 0 -8px 8px inset #154360;"  height="50" class="col-md-12">
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Sr.No.</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Faculty/ Stream - Sem</font></th>
               
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Subject Name</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-3"><font color="white">Date And Time</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Exam Time</font></th>
                
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Detail</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Result</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Delete</font></th>
                
            </tr>

        <?php
           $id=1;
        while($data = mysqli_fetch_assoc($run))
        {
            
            
            ?>

        <tr style="background:transparent; box-shadow: 0 -3px 8px inset grey;" height="50" class="col-md-12" height="40" class="col-md-12" >
            
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $id; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data['faculty']."/\t".$data['stream']."\t-\t".$data['sem']; ?></font></td>
           
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $data['sub']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-3"><font color="white"><?php echo date('d/m/Y', strtotime($data['date']))."\t&nbsp;&nbsp;".date('h:i A', strtotime($data['s_time']))."\t-\t".date('h:i A', strtotime($data['end_time'])); ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php switch ($data['exam_time']) {
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
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><button class="btn btn-primary btn-sm font"><a href="quiz.php?id=<?php echo $data['id']; ?>&q=1" class="text-white">View</a></button> </td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><button class="btn btn-primary btn-sm font"><a href="quiz.php?id=<?php echo $data['id']; ?>&q=2" class="text-white">Result</a></button> </td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><button class="btn btn-danger btn-sm font"><a href="delete.php?id=<?php echo $data['id']; ?>&p=exam&c=teach" class="text-white">Delete</a></button> </td>
            
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
    
   $query = "SELECT * FROM `result` WHERE sub_id = $p";
    $run = mysqli_query($con,$query);   
   
    
    if($run==TRUE){
        
        $query1 = "SELECT * FROM `subject` WHERE id = $p";
        $run1 = mysqli_query($con,$query1);   
    
    if($run==TRUE){
        
        while($data1 = mysqli_fetch_array($run1))
        {
            $faculty=$data1['faculty'];
            $stream=$data1['stream'];
            $sem=$data1['sem'];
            $sub=$data1['sub'];
        }
    }
                
       ?><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><h6 align="left">   Faculty : <?php echo $faculty;?></h6></div>
            <div class="col-md-1"><h6 align="left">Stream : <?php echo $stream;?></h6></div>
            <div class="col-md-1"><h6 align="left">Sem : <?php echo $sem;?></h6></div>
            <div class="col-md-6"><h6 align="left">Subject : <?php echo $sub;?></h6></div>
           
        </div><br>
        <form action="#" method="post" class="col-md-12">
        <table id="datatableid" class="table-hover dable-dark" width="100%" height="auto" padding="20px" class="text-center col-md-12">
            <tr style="background: transparent; border-bottom: 2px inset silver; box-shadow: 0 -8px 8px inset #154360;"  height="50" class="col-md-12">
                <th style="border-right: 2px solid #154360; border-left: 2px solid grey;" align="center" class="col-md-1"><font color="white">Sr.No.</font></th>
                
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">PRN</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Student Name</font></th>                
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
            
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $data1['stud_prn']; ?></font></td>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white"><?php echo $data1['stud_name']; ?></font></td>            
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
       
       
        /*------------------------------------Add Quiz Popup Start---------------------------------*/    
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
.label p { -webkit-transform: translateY(-30px);transform: translateY(15px);}

input:not([value=""]):not(:focus):invalid + .label{-webkit-transform: translateY(0);transform: translateY(0);} 
.student-form .label {position: absolute;left: 20px;bottom: 2px;font-size: 18px;line-height: 26px;font-weight: 400;color:rgba(255,255,255,0.7);cursor: text;transition: -webkit-transform .2s ease-in-out;transition: transform .2s ease-in-out;transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;}
.student-form .submit-btn {display: inline-block;background-color: #000;background-image: linear-gradient(125deg,#a72879,#064497);color: rgba(255,255,255,0.8);text-transform: uppercase;letter-spacing: 2px;font-size: 16px; padding: 8px 16px;border: none;width:200px;cursor: pointer; box-shadow: 0 0 4px 4px inset grey;}
.student-form .submit-btn:hover { background-image: linear-gradient(to left, #1df5df, #743ad5, #5a8cf5);}


/*------------------------------------Popup end---------------------------------*/    

       
       
       
       
    </style>
</head>
<body>
    <header style="background-image: url(img/i9.jpg); background-size: cover;">
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
          <li class="text-white">Hello <?php echo $teacher_name; ?> </li>
         
         
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
  </script>
    </div>
  
    <div class="container text-center col-lg-12 col-md-12">
      <div class="row">
        <div class="col-lg-12 col-md-12 text-white">
         
            
                    
              <br><br><div class="main">

          <div class="admin-section-1">
            <!--------------------teacher------------------>
            <?php if(@$_GET['q']==0) {
           

               
              //<!-------------------Add Quiz------------------------------------>
      
                //  <!------------------------Add Quiz Model Start-------------------------------->



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
                                    <h1 class="title">Enter Quiz Details</h1>
                                    <form class="student-form row" action="update.php?q=addquiz&tid='.$tid.'" method="post">  
                                        <div class="form-field col-lg-4 ">
                                            <input id="faculty" value="'.$teacher_faculty.'" class="input-text js-input rounded" name="faculty" type="text" readonly>
                                            <label class="label" for="subject">Faculty</label>
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
                                            <select name="sem" id="slct" class="input-text js-input rounded" required>
                                                <option value="0" selected disabled style="display: none;"></option>
                                                <option value="I"><li>I</li></option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                            </select>       
                                            <label class="label" for="name">Semester</label>
                                        </div>                                          
                                        <div class="form-field col-lg-4 ">
                                            <input id="subject" class="input-text js-input rounded" name="subject" type="text" required>
                                            <label class="label" for="subject">Subject Name</label>
                                        </div>
                                        <div class="form-field col-lg-4 ">
                                            <input id="totalq" class="input-text js-input rounded" name="totalq" type="number" required>
                                            <label class="label" for="totalq">Total Question</label>
                                        </div>
                                        <div class="form-field col-lg-4 ">
                                            <input id="qmark" class="input-text js-input rounded" name="qmark" type="number" required>
                                            <label class="label" for="qmark">Right que. Marks</label>
                                        </div>
                                        <div class="form-field col-lg-4 ">
                                        <label class="label" for="date"><p>Exam Date</p></label>
                                            <input id="date" class="input-text js-input rounded" name="date" type="date" required>
                                             
                                        </div> 
                                        <div class="form-field col-lg-4 ">
                                            <label class="label" for="phtimeone"><p>Exam Start Time</p></label>
                                            <input id="time" class="input-text js-input rounded" name="stime" type="time" required>
                                             
                                        </div> 
                                        <div class="form-field col-lg-4">
                                            <select name="dur" id="slct" class="input-text js-input rounded" required>
                                                <option value="0" selected disabled style="display: none;"></option>
                                                <option value="1"><li>01:00 Hour</li></option>
                                                <option value="2">02:00 Hour</option>
                                                <option value="3">03:00 Hour</option>
                                                <option value="4">04:00 Hour</option>                                                
                                            </select>       
                                            <label class="label" for="name">Exam Duration</label>
                                        </div>
                                        <div class="form-field col-lg-4">
                                            <select name="etime" id="slct" class="input-text js-input rounded" required>
                                                <option value="0" selected disabled style="display: none;"></option>
                                                <option value="30"><li>00:30 Minutes</li></option>
                                                <option value="60"><li>01:00 Hour</li></option>
                                                <option value="90">01:30 Hours</option>
                                                <option value="120">02:00 Hours</option>
                                                <option value="150">02:30 Hours</option>
                                                <option value="180">03:00 Hours</option>                                                                                               
                                            </select>       
                                            <label class="label" for="name">Exam Time</label>
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


           // <!------------------------Add quiz Model End-------------------------------->


         
              
            
                 
              }
              ?>
              <!-------------------------------------------end teacher--------->
             
           
          </div>
      </div>
                        


    <div style="background:transparent;" class="rounded">

    <?php if(@$_GET['q']==0) {
      showdata(); ?> 
        
         <br>
            <p align="right"><a class="btn btn-md btn-primary" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal"> Add Quiz </a></p>
              <p align="right"><a href="teacher.php" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>
        <?php
          }
        ?>
        
    <?php if(@$_GET['q']==2) {
    $sid=$_GET['id'];
      showresult($sid); ?> 
        
         <br>
            
              <p align="right"><a href="quiz.php?q=0" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>
        <?php
          }
     ?>
        
        
        
    <?php if(@$_GET['q']==1) {
        $id=$_GET['id'];
        $query1 = " SELECT * FROM `subject` WHERE id=$id";
         $run1 = mysqli_query($con, $query1);

             if(mysqli_num_rows($run1) > 0)
             {
                while($row = mysqli_fetch_array($run1))
                {
            
        ?>
        <div class="container">
            <h3 align="center"><?php echo $row['sub']; ?></h3>
            <h5 align="center">Faculty : <?php echo $row['faculty']."\t\t\t Stream : ".$row['stream']."\t\t Sem : ".$row['sem']; ?></h5><br><br>
            <div class="row"><div class="col-md-2"></div><div class="col-md-8">
        
        <?php
                }
             }
        ?>
        <?php
            $query2 = "SELECT * FROM `que_paper` WHERE subid=$id";
            $run2 = mysqli_query($con,$query2);
    
            if($run2==TRUE){
                while($data2 = mysqli_fetch_assoc($run2))
                {
        ?> 
            
            <p align="justify"><b><?php echo $data2['qnum'].".\t".$data2['que']; ?> </b></p>
            <p align="justify" style="color:<?php if($data2['ans']=='a'){echo "green";} ?>"><?php if($data2['ans']=='a'){echo "<b>A.\t".$data2['a']."</b>";}else{echo"A.\t".$data2['a'];} ?></p>
            <p align="justify" style="color:<?php if($data2['ans']=='b'){echo "green";} ?>"><?php if($data2['ans']=='b'){echo "<b>B.\t".$data2['b']."</b>";}else{echo"B.\t".$data2['b'];} ?></p>
            <p align="justify" style="color:<?php if($data2['ans']=='c'){echo "green";} ?>"><?php if($data2['ans']=='c'){echo "<b>C.\t".$data2['c']."</b>";}else{echo"C.\t".$data2['c'];} ?></p>
            <p align="justify" style="color:<?php if($data2['ans']=='d'){echo "green";} ?>"><?php if($data2['ans']=='d'){echo "<b>D.\t".$data2['d']."</b>";}else{echo"D.\t".$data2['d'];} ?></p>
            <p align="left"><a href="quiz.php?q=3&id=<?php echo $id; ?>&n=<?php echo $data2['qnum']; ?>" class="btn btn-sm btn-primary" style="cursor: pointer;"> Edit </a></p>
           
        <?php
                }
            }
        ?>
        
         <br>
              <p align="right"><a href="quiz.php?q=0" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>
                </div><div class="col-md-2"></div> </div>
            </div>
        <?php
          }
        ?>
        
        
        
        <!--update que start-->
    <?php
    if(@$_GET['q']==3) {
    echo ' 
     <span class="title1" style="margin-left:0%;font-size:30px;"><b>Enter Question Details</b></span><br /><br>
    <div class="row">
   
    <div class="col-md-3"></div>
    
    <div class="col-md-6">
    <form class="form-horizontal title1" name="form" action="update.php?q=upqnst&n='.@$_GET['n'].'&eid='.@$_GET['id'].' "  method="POST">
    <fieldset>
    ';


    $subid=@$_GET['id'];
    $qnum=@$_GET['n'];
     $query1= "select * from `que_paper` where subId = '$subid' && qnum = '$qnum'";

                        $run1=mysqli_query($con,$query1);

                        if($run1==true){                               
                            while($data1 = mysqli_fetch_array($run1))
                            {
                                $que=$data1['que'];
                                $a=$data1['a'];
                                $b=$data1['b'];
                                $c=$data1['c'];
                                $d=$data1['d'];
                                $ans=$data1['ans'];
                                
                            }
                            
                            }else{
                                echo "Error.. ";
                            }



    echo '<p align="left"><b>Question number&nbsp;'.@$_GET['n'].'&nbsp;:</></p><!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="qns"></label>  
      <div class="col-md-12">
      <textarea rows="3" cols="5" name="qns" value="'.$que.'" class="form-control" placeholder="Write question number '.@$_GET['n'].' here...">'.$que.'</textarea>  
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="a"></label>  
      <div class="col-md-12">
      <input id="a" name="a" value="'.$a.'" placeholder="Enter option a" class="form-control input-md" type="text">

      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="b"></label>  
      <div class="col-md-12">
      <input id="b" name="b" value="'.$b.'" placeholder="Enter option b" class="form-control input-md" type="text">

      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="c"></label>  
      <div class="col-md-12">
      <input id="c" name="c" value="'.$c.'" placeholder="Enter option c" class="form-control input-md" type="text">

      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="d"></label>  
      <div class="col-md-12">
      <input id="d" name="d" value="'.$d.'" placeholder="Enter option d" class="form-control input-md" type="text">

      </div>
    </div>
    
    <b>Correct answer</b>:<br />
    <select id="ans" name="ans" placeholder="Choose correct answer " class="form-control input-md" >
       <option>Select answer for question '.$qnum.'</option>
      <option value="a"';  if($ans=='a'){echo "selected";} echo '>option a</option>
      <option value="b"'; if($ans=='b'){echo "selected";} echo '>option b</option>
      <option value="c"'; if($ans=='c'){echo "selected";} echo '>option c</option>
      <option value="d"'; if($ans=='d'){echo "selected";} echo '>option d</option> </select>';


    echo '<div class="form-group">
      <label class="col-md-12 control-label" for=""></label>
      <div class="col-md-12"> 
      <tr>
        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>        
      </div>
      <p align="right"><a href="quiz.php?q=1&id='.$subid.'" class="btn btn-md btn-primary" style="cursor: pointer;"> Cancel </a></p>
    </div>

    </fieldset>
    </form><div class="col-md-3"></div></div></div>';



    }
    ?>
        <!------------update que end-------------------------------------->
        
        




           
<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br /></div><div class="row">
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div><div class="col-md-3"></div></div>';



}
?><!--add quiz step 2 end-->


 
        
    </div>
                        
                        

                
            
            
            
        </div>
      
         <br>
        </div>
         <div class="container my-5 rounded">
  
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
