
<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<html>

<head>



    <link rel='stylesheet' href="css//newAdmin.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="index.js"> </script>
    <title>Welcome| User <?php echo $_SESSION['Username']; ?> to Admin Panel</title>



    <script>
      $(document).ready(function(){
        $('#closeBannerWarns').click(function(){
          $("#banWarnsAdmin").fadeOut();
        });
      })
      </script>
 






</head>
<body onload="loadOffTestis();">

    
<svg style="display:none;">
    <symbol id="down" viewBox="0 0 16 16">
      <polygon points="3.81 4.38 8 8.57 12.19 4.38 13.71 5.91 8 11.62 2.29 5.91 3.81 4.38" />
    </symbol>
    <symbol id="users" viewBox="0 0 16 16">
      <path d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,15a7,7,0,0,1-5.19-2.32,2.71,2.71,0,0,1,1.7-1,13.11,13.11,0,0,0,1.29-.28,2.32,2.32,0,0,0,.94-.34,1.17,1.17,0,0,0-.27-.7h0A3.61,3.61,0,0,1,5.15,7.49,3.18,3.18,0,0,1,8,4.07a3.18,3.18,0,0,1,2.86,3.42,3.6,3.6,0,0,1-1.32,2.88h0a1.13,1.13,0,0,0-.27.69,2.68,2.68,0,0,0,.93.31,10.81,10.81,0,0,0,1.28.23,2.63,2.63,0,0,1,1.78,1A7,7,0,0,1,8,15Z" />
    </symbol>
    <symbol id="collection" viewBox="0 0 16 16">
      <rect width="7" height="7" />
      <rect y="9" width="7" height="7" />
      <rect x="9" width="7" height="7" />
      <rect x="9" y="9" width="7" height="7" />
    </symbol>
    <symbol id="charts" viewBox="0 0 16 16">
      <polygon points="0.64 7.38 -0.02 6.63 2.55 4.38 4.57 5.93 9.25 0.78 12.97 4.37 15.37 2.31 16.02 3.07 12.94 5.72 9.29 2.21 4.69 7.29 2.59 5.67 0.64 7.38" />
      <rect y="9" width="2" height="7" />
      <rect x="12" y="8" width="2" height="8" />
      <rect x="8" y="6" width="2" height="10" />
      <rect x="4" y="11" width="2" height="5" />
    </symbol>
    <symbol id="comments" viewBox="0 0 16 16">
        <path d="M0,16.13V2H15V13H5.24ZM1,3V14.37L5,12h9V3Z"/><rect x="3" y="5" width="9" height="1"/><rect x="3" y="7" width="7" height="1"/><rect x="3" y="9" width="5" height="1"/>
      </symbol>
    <symbol id="pages" viewBox="0 0 16 16">
      <rect x="4" width="12" height="12" transform="translate(20 12) rotate(-180)"/><polygon points="2 14 2 2 0 2 0 14 0 16 2 16 14 16 14 14 2 14"/>
      </symbol>
    <symbol id="appearance" viewBox="0 0 16 16">
      <path d="M3,0V7A2,2,0,0,0,5,9H6v5a2,2,0,0,0,4,0V9h1a2,2,0,0,0,2-2V0Zm9,7a1,1,0,0,1-1,1H9v6a1,1,0,0,1-2,0V8H5A1,1,0,0,1,4,7V6h8ZM4,5V1H6V4H7V1H9V4h1V1h2V5Z"/>
    </symbol>
    <symbol id="trends" viewBox="0 0 16 16">
      <polygon points="0.64 11.85 -0.02 11.1 2.55 8.85 4.57 10.4 9.25 5.25 12.97 8.84 15.37 6.79 16.02 7.54 12.94 10.2 9.29 6.68 4.69 11.76 2.59 10.14 0.64 11.85"/>
    </symbol>
    <symbol id="settings" viewBox="0 0 16 16">
      <rect x="9.78" y="5.34" width="1" height="7.97"/><polygon points="7.79 6.07 10.28 1.75 12.77 6.07 7.79 6.07"/><rect x="4.16" y="1.75" width="1" height="7.97"/><polygon points="7.15 8.99 4.66 13.31 2.16 8.99 7.15 8.99"/><rect x="1.28" width="1" height="4.97"/><polygon points="3.28 4.53 1.78 7.13 0.28 4.53 3.28 4.53"/><rect x="12.84" y="11.03" width="1" height="4.97"/><polygon points="11.85 11.47 13.34 8.88 14.84 11.47 11.85 11.47"/>
      </symbol>
    <symbol id="options" viewBox="0 0 16 16">
      <path d="M8,11a3,3,0,1,1,3-3A3,3,0,0,1,8,11ZM8,6a2,2,0,1,0,2,2A2,2,0,0,0,8,6Z"/><path d="M8.5,16h-1A1.5,1.5,0,0,1,6,14.5v-.85a5.91,5.91,0,0,1-.58-.24l-.6.6A1.54,1.54,0,0,1,2.7,14L2,13.3a1.5,1.5,0,0,1,0-2.12l.6-.6A5.91,5.91,0,0,1,2.35,10H1.5A1.5,1.5,0,0,1,0,8.5v-1A1.5,1.5,0,0,1,1.5,6h.85a5.91,5.91,0,0,1,.24-.58L2,4.82A1.5,1.5,0,0,1,2,2.7L2.7,2A1.54,1.54,0,0,1,4.82,2l.6.6A5.91,5.91,0,0,1,6,2.35V1.5A1.5,1.5,0,0,1,7.5,0h1A1.5,1.5,0,0,1,10,1.5v.85a5.91,5.91,0,0,1,.58.24l.6-.6A1.54,1.54,0,0,1,13.3,2L14,2.7a1.5,1.5,0,0,1,0,2.12l-.6.6a5.91,5.91,0,0,1,.24.58h.85A1.5,1.5,0,0,1,16,7.5v1A1.5,1.5,0,0,1,14.5,10h-.85a5.91,5.91,0,0,1-.24.58l.6.6a1.5,1.5,0,0,1,0,2.12L13.3,14a1.54,1.54,0,0,1-2.12,0l-.6-.6a5.91,5.91,0,0,1-.58.24v.85A1.5,1.5,0,0,1,8.5,16ZM5.23,12.18l.33.18a4.94,4.94,0,0,0,1.07.44l.36.1V14.5a.5.5,0,0,0,.5.5h1a.5.5,0,0,0,.5-.5V12.91l.36-.1a4.94,4.94,0,0,0,1.07-.44l.33-.18,1.12,1.12a.51.51,0,0,0,.71,0l.71-.71a.5.5,0,0,0,0-.71l-1.12-1.12.18-.33a4.94,4.94,0,0,0,.44-1.07l.1-.36H14.5a.5.5,0,0,0,.5-.5v-1a.5.5,0,0,0-.5-.5H12.91l-.1-.36a4.94,4.94,0,0,0-.44-1.07l-.18-.33L13.3,4.11a.5.5,0,0,0,0-.71L12.6,2.7a.51.51,0,0,0-.71,0L10.77,3.82l-.33-.18a4.94,4.94,0,0,0-1.07-.44L9,3.09V1.5A.5.5,0,0,0,8.5,1h-1a.5.5,0,0,0-.5.5V3.09l-.36.1a4.94,4.94,0,0,0-1.07.44l-.33.18L4.11,2.7a.51.51,0,0,0-.71,0L2.7,3.4a.5.5,0,0,0,0,.71L3.82,5.23l-.18.33a4.94,4.94,0,0,0-.44,1.07L3.09,7H1.5a.5.5,0,0,0-.5.5v1a.5.5,0,0,0,.5.5H3.09l.1.36a4.94,4.94,0,0,0,.44,1.07l.18.33L2.7,11.89a.5.5,0,0,0,0,.71l.71.71a.51.51,0,0,0,.71,0Z"/>
      </symbol>
    <symbol id="collapse" viewBox="0 0 16 16">
      <polygon points="11.62 3.81 7.43 8 11.62 12.19 10.09 13.71 4.38 8 10.09 2.29 11.62 3.81"/>
    </symbol>
    <symbol id="search" viewBox="0 0 16 16">
      <path d="M6.57,1A5.57,5.57,0,1,1,1,6.57,5.57,5.57,0,0,1,6.57,1m0-1a6.57,6.57,0,1,0,6.57,6.57A6.57,6.57,0,0,0,6.57,0Z"/><rect x="11.84" y="9.87" width="2" height="5.93" transform="translate(-5.32 12.84) rotate(-45)"/>
    </symbol>
  </svg>
  <header style="right:-100px;" class="page-header">            <!-- remove disp none    style="display:none;"   -->
    <nav>
      <a href="./">
        <img class="logo" src="img//logo.png" alt="befrienders logo">
      </a>
      
      <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
        <svg width="20" height="20" aria-hidden="true">
          <use xlink:href="#down"></use>
        </svg>
      </button>
      <ul class="admin-menu">
        <li class="menu-heading">
          <h3>Admin</h3>
        </li>
        <li>
           <a href="#0" onclick="managestaff();return false;"> 
          <!--<a href="#0" >-->
            <svg>
              <use xlink:href="#users"></use>
            </svg>
            <span style="color:white;">   Staff  </a> </span>
          </a>
        </li>
        <li>
          <a href="#0" onclick="managearticle();"> 
          <!-- <a href="#0" >-->
            <svg>
              <use xlink:href="#pages"></use>
            </svg>
            <span style="color:white;">Articles</span>
          </a>
        </li>

        <li>
           <a href="#0" onclick="manageevent();"> 
          <!-- <a href="#0" >-->
              <svg>
                <use xlink:href="#trends"></use>
              </svg>
              <span style="color:white;">Events</span>
            </a>
        </li>
        
        <li class="menu-heading">
          <h3>Settings</h3>
        </li>
        <?php

          if($_SESSION['Position']=="Pos1"){
            echo '
              <li>
              <a href="swapsec.php" target="_blank">
              <svg>
                <use xlink:href="#settings"></use>
              </svg>
              <span style="color:white;">Update Website</span>
              </a>
              </li>';

              echo '
              <li>
                <a href="#0" onclick="configureChatbot();">                 
                  <svg>
                    <use xlink:href="#pages"></use>
                  </svg>
                  <span style="color:white;">Configure Chatbot</span>
                </a>
              </li>';


          }
        ?>
        

        <li>
        <a  id="changePwd">
        <svg>
              <use xlink:href="#options"></use>
            </svg>
            <button > <span style="color:white;"> Settings  </span></button>
            </a>
        </li>
        <!--  -->
        <li id="backBtn" style="display:none;">
          <a href="#" onclick="goToMain();">
            <svg>
              <use xlink:href="#collapse"></use>
            </svg>
            <span style="color:white;"> Go Back </span>
          </a>
        </li>
        
      </ul>
    </nav>
  </header>


  <section class="page-content">
    <section class="search-and-user" >
      <h1> Welcome to Befrienders Admin Interface System </h1>
      
      <div class="admin-profile">
        <span class="greeting">Hello <?php echo $_SESSION['name']; ?> </span>
        <div class="notifications">
          <span class="badge">1</span>
          <svg>
            <use xlink:href="#users"></use>
          </svg>
        </div>
        <a style="padding-left:20px;" href="logout.php"> Logout </a>
      </div>
    </section>
    <!-- Works with group-->

<section class="containment" style="display:none;">



</section>

<?php
if(isset($_SESSION['adminWarning'])){
  echo '<h4 id="banWarnsAdmin" style="background-color: #fff3cd;color: #856404;border-radius: .25rem;padding: .75rem 1.25rem;border: 1px solid transparent;">';
  echo $_SESSION['adminWarning'];
  echo '<button style="float:right;color:black;font-size:20px;" id="closeBannerWarns"> X </button>';
  echo '</h4><br/>';
  echo "<script> $('#banWarnsAdmin').delay(10000).fadeOut('slow'); </script>";
  unset($_SESSION['adminWarning']);
}
?>
  

<section id="articleMainPage" style="display:none;">    </section>

<section id="EventMainInfo" style="display:none;">    </section>

<section id="chatbotsData" style="display:none;">    </section>

    <section class="grid " id="landingPage">

      
      <article class="articleSpacer" style="height:110%;">

        <div>
 
            <h2>  Latest Testimonials </h2>
            <div id="onTestimonials" style="padding-left:10px;padding-top:10px;">   </div>


            

           
        </div>

        <span style="padding-left:3%;padding-top:3%;"> <button id="hideTestimonial" style="padding:10px;background-color:#189e6d;color:white;"> Hide Testimonials </button> </span>
        <span style="padding-left:3%;padding-top:3%;"> <button id="showTestimonial" style="padding:10px;background-color:#189e6d;color:white;display:none;"> Show Testimonials </button> </span>
      
      </article>
 







      <article id="changepassContainer" style="display:none;" class="articleSpacer" > </article>
      <span style="display:none;" id="pwdChangeBlank"> &nbsp; </span>






    <?php
      $emotions = "
      select rating, count(*) as occurrences
      from testimonial
      group by rating
      order by occurrences desc, rating;
      ";

      $result = mysqli_query($connection,$emotions);
      $e1=0;$e2=0;$e3=0;$e4=0;$e5=0;
      while($row = mysqli_fetch_assoc($result)){
        switch($row['rating']){
          case "1":
            $e1=$row['occurrences'];
            break;
            case "2":
              $e2=$row['occurrences'];
              break;
            case "3":
              $e3=$row['occurrences'];
              break;
            case "4":
              $e4=$row['occurrences'];
              break;
            case "5":
              $e5=$row['occurrences'];
              break;
                              
        }
      }

    
    ?>





      <article class="articleSpacer"> 
          
        <div style="text-align: center;"> 
            <h2> An Overview of user feedbacks </h2> <br/>

            <table style="padding-left:50%;">
                <tr>
                    <td>😄 </td>
                    <td>from <?php echo $e5; ?> users </td>
                </tr>
                <tr> <td> </td><td> &nbsp; </td> </tr> <!-- Spacers for tab -->
                <tr>
                    <td>😊 </td>
                    <td>from <?php echo $e4; ?> users </td>
                </tr>
                <tr> <td> </td><td> &nbsp; </td> </tr> <!-- Spacers for tab -->
                <tr>
                    <td>🙂 </td>
                    <td>from <?php echo $e3; ?> users </td>
                </tr>
                <tr> <td> </td><td> &nbsp; </td> </tr> <!-- Spacers for tab -->
                <tr>
                    <td>😐 </td>
                    <td>from <?php echo $e2; ?> users </td>
                </tr>
                <tr> <td> </td><td> &nbsp; </td> </tr> <!-- Spacers for tab -->
                <tr>
                    <td>😔 </td>
                    <td>from <?php echo $e1; ?> users </td>
                </tr>
            </table>
             
        </div>
      
      </article>
      
   
      <article class="articleSpacer"> 
            <div>
                <h2> An overview of staff info </h2> <br/>
                <h3> You have 
                    <?php $sql = "SELECT count(id) as num FROM staff WHERE status='on';";
                    $query= mysqli_query($connection,$sql);
                    while($row=mysqli_fetch_assoc($query)){
                        echo $row['num'];
                    }
                    
                    ?>
                     online staff </h3>
                    <br/>
                 <h3> You have (Stats not available yet) online visitors on <a class="linkHomePage" href="befriendersmauritius.com"> befriendersmauritius.com </a> </h3>
           </div> 
      
      
    
    
    </article>

      <article class="articleSpacer" style="height:105%;" >
          
      <div> <h2> New Testimonials to be approved for display</h2>
      <br/>
        <p>
            
        <!-- Code was here -->
        <div id=offlineTestimonials> </div>
        
        </p>
    </div>
    
    </article>

    
    </section>
    <!-- <footer class="page-footer">
      <small>  <span class="heart">❤</span> 
      </small>
    </footer> -->
  </section>










<!-- SCRIPT AREA -->


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>


            
            <script>

              function ds(s){
                alert("HEYA "+s);
              }
              
              function approveTestimonial($id){
                //alert("ID "+$id+" has been approved!");

                $.ajax({
                    type:"POST",
                    url:"approveTestimonial.php?id="+$id,
                   
                });

                loadOffTestis();


              }

              

              function test(){
                alert("TESTED");
              }

             

              function loadOnTestis(){
                $.ajax({
                    type:"POST",
                    url:"displayOnTestimonial.php",
                    success: function(value){
                        $("#onTestimonials").html(value);
                    }
                });
              }
              </script>

          
          <script type="text/javascript">
          
            function loadOffTestis()
            {
                $.ajax({
                    type:"POST",
                    url:"displayOffTestimonial.php",
                    success: function(value){
                        $("#offlineTestimonials").html(value);
                    }
                });

                loadOnTestis();
            }
          </script>



        <script type="text/javascript">
            function managestaff()
            {
              $('#backBtn').fadeIn('slow');

                $.ajax({
                    type:"POST",
                    url:"addstaff.php",
                    success: function(value){
                        $("#landingPage").hide();
                        $("#articleMainPage").hide();
                        $("#EventMainInfo").hide();
                        $("#chatbotsData").hide();
                        
                        $(".containment").show();
                        $(".containment").html(value);
                    }
                });
            }

            function configureChatbot(){
              $('#backBtn').fadeIn('slow');

                $.ajax({
                    type:"POST",
                    url:"configureChatb.php",
                    success: function(value){
                      $("#landingPage").hide();
                        $(".containment").hide();
                        $("#EventMainInfo").hide();                        
                        $("#articleMainPage").hide();

                        $("#chatbotsData").show();
                        $("#chatbotsData").html(value);
                        

                        
                    }
                });
            }

            function managearticle()
            {
              $('#backBtn').fadeIn('slow');

                $.ajax({
                    type:"POST",
                    url:"AddArticleAjax.php",
                    success: function(value){
                      $("#landingPage").hide();
                        $(".containment").hide();
                        $("#EventMainInfo").hide();
                        $("#chatbotsData").hide();
                        
                        $("#articleMainPage").show();
                        $("#articleMainPage").html(value);
                        

                        
                    }
                });
            }

            function manageevent()
            {
              $('#backBtn').fadeIn('slow');
                $.ajax({
                    type:"POST",
                    url:"EventAdder.php",
                    success: function(value){
                      $("#landingPage").hide();
                      $("#articleMainPage").hide();
                        $(".containment").hide();
                        $("#chatbotsData").hide();

                      $("#EventMainInfo").show();
                        $("#EventMainInfo").html(value);
                        

                        
                    }
                });
            }

            function goToMain(){
              window.location.href = "newadmin.php";
            }
        </script>

        <script>
          
               $(document).ready(function(){

                $("#changePwd").click(function(){

                  $("#landingPage").show();
                  $("#articleMainPage").show();

                  $(".containment").hide();
                  $("#EventMainInfo").hide();
                  $("#articleMainPage").hide();


                  $("#changepassContainer").toggle();
                  $("#pwdChangeBlank").toggle();
                  $.ajax({
                    type:"POST",
                    url:"settingPage.php",
                    success: function(value){
                        $("#changepassContainer").html(value);
                    }
                });

                
                  
                });

                $("#collapseBtn").click(function(){
                  $('.page-header').hide();                  

                });

                $("#hideTestimonial").click(function(){
                  $("#onTestimonials").fadeOut("slow");
                  $("#hideTestimonial").hide();
                  $("#showTestimonial").show();
                });

                $("#showTestimonial").click(function(){
                  $("#onTestimonials").fadeIn("slow");
                  $("#showTestimonial").hide();
                  $("#hideTestimonial").show();
                });


            });


            function simulate(val){
              $.ajax({
                    //url : "fromBot.php?t="+val+" &f=0", 
                    url : "fromBot.php?t="+val+"&flag=0", 
                    success: function(result){
                        // alert(result);
                        document.getElementById("cbreplyPlaceholder").innerHTML = result;
                    }
                })
            }
        </script>

</body>
</html>
