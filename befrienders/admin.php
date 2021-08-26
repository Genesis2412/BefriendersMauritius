<?php 

header("Location: newadmin.php"); //Forwarding to new page

session_start();
require("connection.php");
if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome| User <?php echo $_SESSION['Username']; ?> to Admin Panel</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>

        $(document).ready(function(){

          $("#changePWD").click(function(){
            $('#changingPassKey').fadeIn();

          });

          $("#changePWDMob").click(function(){
            $('#changingPassKey').fadeIn();

          });
          

          $("#HidePWD").click(function(){
            $('#changingPassKey').fadeOut();

          });

        });
      </script>
  
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Befrienders</h3>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <!-- <img src="jose.jpeg" class="mobile_profile_image" alt=""> -->

        <?php
        
        if($_SESSION['Position'] == "Pos1"){
          echo "<img src='img//adm0.png' class='mobile_profile_image' alt='Admin Main'>";
        }
        else if($_SESSION['Position'] == "Pos2"){
          echo "<img src='img//adm1.png' class='mobile_profile_image' alt='Admin 1'>";
        }
        else if($_SESSION['Position'] == "Pos3"){
          echo "<img src='img//adm2.jpg' class='mobile_profile_image' alt='Admin 2'>";
        }
        else{
          echo "<img src='img//error.jpeg' class='mobile_profile_image' alt='Undefined'>";

        }
      ?>


        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">


        <?php  

      //Pos1 is highest in hierarchy whilst Pos3 is lowest

      if($_SESSION['Position']=="Pos1"){
        echo '<a href="#" onclick="managestaff();return false;"><i class="fa fa-users" aria-hidden="true"></i><span>Staff</span></a>
        <a href="#" onclick="managearticle();"><i class="fas fa-file-alt" aria-hidden="true"></i><span>Manage Articles and Events</span></a>
        <a href="swapsec.php" target="_blank"><i class="fas fa-clipboard" aria-hidden="true"></i><span>Manage Home Page</span></a>
        ';
        

      }else if($_SESSION['Position']=="Pos2"){
        echo '<a href="#" onclick="managestaff();return false;"><i class="fa fa-users" aria-hidden="true"></i><span>Staff</span></a>
        <a href="#" onclick="managearticle();"><i class="fas fa-file-alt" aria-hidden="true"></i><span>Manage Articles and Events</span></a>
        ';
      } 
      else if($_SESSION['Position']=="Pos3"){
        echo '<a href="#" onclick="managestaff();return false;"><i class="fa fa-users" aria-hidden="true"></i><span>Staff</span></a>
        ';
      } 

      ?>
       <div style="padding-top:25px;"> <button id="changePWDMob" class="logout_btn "> Change Password </button> </div>
        
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">

      <?php
        
        if($_SESSION['Position'] == "Pos1"){
          echo "<img src='img//adm0.png' class='profile_image' alt='Admin Main'>";
        }
        else if($_SESSION['Position'] == "Pos2"){
          echo "<img src='img//adm1.png' class='profile_image' alt='Admin 1'>";
        }
        else if($_SESSION['Position'] == "Pos3"){
          echo "<img src='img//adm2.jpg' class='profile_image' alt='Admin 2'>";
        }
        else{
          echo "<img src='img//error.jpeg' class='profile_image' alt='Undefined'>";

        }
      ?>
        
        <h4> <?php echo $_SESSION['Username']; ?> </h4>
        <h4> Admin Level: <?php echo $_SESSION['Position']; ?> </h4>
      </div>

      <?php  

      //Pos1 is highest in hierarchy whilst Pos3 is lowest

      if($_SESSION['Position']=="Pos1"){
        echo '<a href="#" onclick="managestaff();return false;"><i class="fa fa-users" aria-hidden="true"></i><span>Staff</span></a>
        <a href="#" onclick="managearticle();"><i class="fas fa-file-alt" aria-hidden="true"></i><span>Manage Articles and Events</span></a>
        <a href="swapsec.php" target="_blank"><i class="fas fa-clipboard" aria-hidden="true"></i><span>Manage Home Page</span></a>
        ';
        

      }else if($_SESSION['Position']=="Pos2"){
        echo '<a href="#" onclick="managestaff();return false;"><i class="fa fa-users" aria-hidden="true"></i><span>Staff</span></a>
        <a href="#" onclick="managearticle();"><i class="fas fa-file-alt" aria-hidden="true"></i><span>Manage Articles and Events</span></a>
        ';
      } 
      else if($_SESSION['Position']=="Pos3"){
        echo '<a href="#" onclick="managestaff();return false;"><i class="fa fa-users" aria-hidden="true"></i><span>Staff</span></a>
        ';
      } 

      ?>
        <!-- <a href="#" onclick="managestaff();return false;"><i class="fa fa-users" aria-hidden="true"></i><span>Staff</span></a>
        <a href="#" onclick="managearticle();"><i class="fas fa-file-alt" aria-hidden="true"></i><span>Manage Articles and Events</span></a>
        <a href="swapsec.php"><i class="fas fa-clipboard" aria-hidden="true"></i><span>Manage Home Page</span></a>
        -->
        <div style="padding-top:40px;"> 
        <button id="changePWD" class="logout_btn "> Change Password </button>
       </div>
    </div>
    <!--sidebar end-->

    <div class="content">
      <div class="card">
        <strong><h7>Welcome <?php echo $_SESSION['name']; ?> !</h7>
        <p>Here you will be able to manage the Befrienders Website !</p></strong>

        <div id="warnings">

        <script>
        $(document).ready(function(){

          $("#closeWarn").click(function(){
              $("#warnings").fadeOut();

          });
        });
        </script>
          <?php 

         
          if(isset($_SESSION['adminWarn'])){

            echo "<div style='background-color:yellow;color:black;padding:10px;'> ".$_SESSION['adminWarn']."
            
            <button id='closeWarn'> X </button> 
            </div>";
            unset($_SESSION['adminWarn']);
          }

          ?>


        <div id="changingPassKey" style="display:none;">
          <br/>
         <h1> Change Your Password </h1>

         <form method="POST">
          <input type="password" name="curPwd" placeholder="Enter Current password"> <br/> <br/>
          <input type="password" name="newPwd" id="new" onkeyup="checkPwd();" placeholder="Enter New password"> &nbsp; <input type="password" name="conPWD" id="conf" onkeyup="checkPwd();" placeholder="Retype New password"> <br/>
          <br/><input type="submit" id="ChangePwd" name="SubmitButton" value="Change Password" disabled/>

        </form>

        <div style="padding-top:40px;"> 
        <button id="HidePWD" class="logout_btn "> Hide This setting </button>
       </div>

        </div>
        <script>
           function checkPwd(){

             var p1 = document.getElementById("new").value;
             var p2 = document.getElementById("conf").value;
             if(p1!=p2){
               document.getElementById("SHOW").innerHTML= "Password does not match!";
               document.getElementById("ChangePwd").disabled = true;
             }
             else{

              if(p1.length <6 ){
                document.getElementById("ChangePwd").disabled = true;
              document.getElementById("SHOW").innerHTML= "Password is too short. it should be at least of 6 characters"; 

              }else{
               document.getElementById("ChangePwd").disabled = false;
              document.getElementById("SHOW").innerHTML= ""; 
              }
              
             }

             
             
            
           }
           </script>
<div id="SHOW" style="color:Red;"> </div>
        <?php

          if(isset($_POST['SubmitButton'])){ //check if form was submitted
            $pwd = $_POST['curPwd'];
            $newPwd = $_POST['newPwd'];
            $pwdModif = md5($pwd);

            $username = $_SESSION["Username"];
            $sql = "SELECT * from staff where Username = '$username' AND Password = '$pwdModif' ;";
            $Res = mysqli_query($connection,$sql);

            if(mysqli_num_rows($Res)>0){
              $newPass = md5($newPwd);
              //Valid account. Apply new pwd

              $UpdateSql="UPDATE `staff` SET `Password`='$newPass' WHERE Username = '$username'";
              if(mysqli_query($connection,$UpdateSql)){
                echo '<script> document.getElementById("SHOW").innerHTML= "Password Changed Successfully!"; </script> ';

              }
              else{
                echo '<script> document.getElementById("SHOW").innerHTML= "Password Could not be Changed !"; </script> ';
                
              }
            }
            else{
              echo '<script> document.getElementById("SHOW").innerHTML= "Could not verify the authenticity of the request"; </script> ';
            }
          }    

      ?>
        
        


        </div>
        
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

            <script type="text/javascript">
            function managestaff()
            {
                $.ajax({
                    type:"POST",
                    url:"addstaff.php",
                    success: function(value){
                        $(".content").html(value);
                    }
                });
            }
        </script>


                <script type="text/javascript">
            function managearticle()
            {
                $.ajax({
                    type:"POST",
                    url:"AddArticleAjax.php",
                    success: function(value){
                        $(".content").html(value);
                    }
                });
            }
        </script>

                <script type="text/javascript">
            function managehome()
            {
                $.ajax({
                    type:"POST",
                    url:"swapsec.php",
                    success: function(value){
                        $(".content").html(value);
                    }
                });
            }
        </script>


  </body>
</html>



