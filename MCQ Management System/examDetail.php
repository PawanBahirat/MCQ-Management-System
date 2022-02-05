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
    
    $query = "SELECT * FROM `subject`";
    $run = mysqli_query($con,$query);
    
   
    
    if($run==TRUE){
        
        ?>


        <form action="#" method="post" class="col-md-12">
        <table id="datatableid" class="table-hover dable-dark" width="100%" height="auto" padding="20px" class="text-center col-md-12">
            <tr style="background: transparent; border-bottom: 2px inset silver; box-shadow: 0 -8px 8px inset #154360;"  height="50" class="col-md-12">
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Sr.No.</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Faculty/ Stream - Sem</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white">Subject Name</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-3"><font color="white">Date and Time</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Exam Time</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Teacher</font></th>
                <th style="border-right: 2px solid #154360;" align="center" class="col-md-1"><font color="white">Status</font></th>
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
                                                                                                                           
            <?php 
            $tid=$data['teach_id'];                                                                                                       
            $query1 = "SELECT * FROM `teachers` WHERE id=$tid";
            $run1 = mysqli_query($con,$query1);
            while($data1 = mysqli_fetch_assoc($run1))
            {
                $teach_name=$data1['teacher-name'];
            }
            ?>
            <td style="border-right: 2px solid #154360;" align="center" class="col-md-2"><font color="white"><?php echo $teach_name; ?></font></td>
            
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <style type="text/css">
       .main{
           margin-top: 10%;
        
       }
       

    </style>
</head>
<body>
    <header style="background-image: url(img/bg24.jpg); background-size: cover;">

    <div class="container-fluid p-0">
     <nav class="navbar">
    <div class="content">
      <div class="logo ">
     <h1 class="text-white"> Exam Detail </h1>
   
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
            
           
               
              
                </div>
            </div>


    <div style="background:transparent;" class="rounded">

    <?php if(@$_GET['q']==0) {
      showdata(); ?> 
        
         <br>
              <p align="right"><a href="admin.php" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>
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
            <p align="left"><a href="examDetail.php?q=3&id=<?php echo $id; ?>&n=<?php echo $data2['qnum']; ?>" class="btn btn-sm btn-primary" style="cursor: pointer;"> Edit </a></p>
           
        <?php
                }
            }
        ?>
        
         <br>
              <p align="right"><a href="examDetail.php?q=0" class="btn btn-md btn-primary" style="cursor: pointer;"> Back </a></p><br>
           </div><div class="col-md-2"></div></div>
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
    <form class="form-horizontal title1" name="form" action="update.php?q=upqns&n='.@$_GET['n'].'&eid='.@$_GET['id'].' "  method="POST">
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
      <p align="right"><a href="examDetail.php?q=1&id='.$subid.'" class="btn btn-md btn-primary" style="cursor: pointer;"> Cancel </a></p>
    </div>

    </fieldset>
    </form><div class="col-md-3"></div></div></div>';



    }
    ?>
        <!------------update que end-------------------------------------->

 
        
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
        $(document).ready(function() {

            $('#datatableid').DataTable();

        } );
    </script>

</body>
</html>
