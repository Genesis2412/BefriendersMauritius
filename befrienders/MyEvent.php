<?php session_start();

require("connection.php");

if(!(isset($_GET['Eventid']))){
        
    $_SESSION['EventMsgError'] = "The event you're trying to access might not be available for the moment. Please try again later";
        header('Location: Events.html');

}
else{

    $id = $_GET['Eventid'];
}

$sql="select * from events where EventID = '".$id."';";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_assoc($result)){
        
 
?>
<!DOCTYPE html> 
<head>
    <title> <?php echo $row['EventName']; ?>| Befrienders Mauritius </title> 
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> <!--Bootstrap CDN -->
        <script src="js//jquery-3.4.1.min.js"></script> <!--jQuery CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--FontAwesome CDN -->
        <link rel="stylesheet" href="css/Events.css"> <!-- Common sharable css file for Events -->
        <link rel="stylesheet" href="css//MyEvent.css"> 
       
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" type="text/css" href="css//footer.css">

        <script>
                $(document).ready(function(){

                        $("#Suicide").click(function(){
                            $("#DisplayerSuicide").fadeIn();
                            $("#DisplayerBefriendersMu").fadeOut();
                            $("#DisplayerTalkOnSuicide").fadeOut();

                        });
                        $("#BefriendersMu").click(function(){
                            $("#DisplayerBefriendersMu").fadeIn();
                            $("#DisplayerSuicide").fadeOut();
                            $("#DisplayerTalkOnSuicide").fadeOut();
                        });
                        $("#TalkOnSuicide").click(function(){
                            $("#DisplayerTalkOnSuicide").fadeIn();
                            $("#DisplayerBefriendersMu").fadeOut();
                            $("#DisplayerSuicide").fadeOut();
                        });
                })
            </script>

    </head>
<body>
        <!--Navigation Bar-->
        <header>
	        <div class="logo">
	          <a href="#"><img src="./img/logo.png" alt="Befrienders Mauritius"></a>
	        </div>

	        <nav>
	        	<ul>
	            	<li><a class="active" href="#">HOME</a></li>
	            	<li><a href="Events.html">EVENTS</a></li>
	            	<li><a href="MainArticle.html">BLOG</a></li>
                    <li>
                        <a href="">MEMBER</a>
	                	<ul>
	                    	
	                    	<li>
	                        	<!--Hide/show links-->
		                        <?php if(isset($_SESSION['Username'])){
									echo '<div style="padding:20px;color:white;"> Welcome '.$_SESSION["Username"].'<a href="logout.php">LOGOUT</a> </div>';

								}
								else{
									echo '<a href="signin.php">LOGIN</a>';
								}
		                    ?>
	                    	</li>
	                    	
	                	</ul>
	            	</li>
	            	<li><a href="#aboutUs">ABOUT US</a></li>
                    <li><a href="#contactUs">CONTACT US</a></li>
                    <li><a href="#needHelp">NEED HELP?</a></li>
	          </ul>
	        </nav>

	        <!--Hamburger-->
	        <div class="menu-toggle">
	          <i class="fa fa-bars" aria-hidden="true"></i>
	        </div>
	    </header>  

    <!-- <nav aria-label="breadcrumb" >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Events.html" class="Links">Events Home</a></li>
          <li class="breadcrumb-item active" aria-current="page" class="Links" >EventName </li>
        </ol>
    </nav> -->

    <div style="padding:10px; background-color:lightgrey;">
    <a href="Events.html" class="Links">Events Home</a> </a> / <span class="text-muted"> <?php echo $row['EventName']; ?> </a> 
    </div>
    
    <div id="EventMain">
        <?php  
            if($row['CoverImage']!=""){
                echo '<img src="img//EventDir//EventUpload//'.$row['CoverImage'].'" width="100%" height="400px" style="filter: brightness(75%);">  ';
            }
            else{
                echo '<img src="img/MyEventCover.jpg" width="100%" height="400px" style="filter: brightness(75%);">  ';
            }
        ?>
          
        
        <p style="color:white;">
        <?php echo $row['EventName']; ?>
            <br/>
            <b> <?php echo $row['EventDate']; ?> </b> <br/>
            
            <button id="Suicide" class="btn btn-primary" > #Suicide </button> 
            <button id="BefriendersMu" class="btn btn-danger"> #BefriendersMu </button> 
            <button id="TalkOnSuicide" class="btn btn-warning"> #TalkOnSuicide </button> 
        </p>
        
       

    </div>

    <div id="DisplayerSuicide" class="Displayer">
        Use #Suicide on your social media to promote awareness against suicide and make a change TODAY!
    </div>

    <div id="DisplayerBefriendersMu" class="Displayer">
        Use #BefriendersMu on your social media to promote the NGO Befrienders Mauritius and inform the public about what we do!
    </div>

    <div id="DisplayerTalkOnSuicide" class="Displayer">
        Use #TalkOnSuicide on your social media to normalise mental health and depression!
    </div>

    <div>
        <div class="display-4" style="float:left;padding-top:100px;padding-left:20px;padding-bottom:150px; ">
        <?php echo "<span style='padding-right: 60%;'> ".$row['EventName']." </span>"; ?>
        </div>
        <br/>
        <br/>
        <div  style="padding-top:50px; margin-left: auto; margin-right: auto;">
        <?php echo $row['EventDescription']; ?>
        </div>
    </div>

    
    <div id="EventInformations" style="padding-top:50px;" class="text-center">
        <span class="InfoEventA">
            <i class="fa far fa-bell"></i>
            <?php echo " Event Type: ".$row['EventType'];  ?>
        </span>
        <span class="InfoEventA">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <?php echo $row['EventDate']; ?> At <?php echo $row['EventTime']; ?> 
        </span>
        <span class="InfoEventA">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <?php echo $row['EventLocation']; ?> 
        </span>
        
    </div>
    <br/>
    <div style="padding-bottom:25px;"> </div>
        <footer class="footer" style="background-color: rgb(99, 165, 99);">
            <div class="footer-left">
                <h5>Befrienders Mauritius</h5>
                <p>We an help prevent suicide. Befrienders provide 24/7 free and confidential support for people in distress, prevention and crisis resources for you or your loved ones.</p>
            </div>
        
            <div class="footer-right">
                <h5>Address</h5>
                <i class="fas fa-map-marked-alt"></i><p>Befrienders(Mauritius)<br>1st Floor Flat,<br> 152 Royal Road,<br> Beau Bassin</p>
                <i class="fa fa-tty"></i><p>Office: 4670160</p>
                <i class="fa fa-mobile"></i><p>Mobile: 54837233</p>
                <i class="fa fa-fire"></i><p>Hotline: 8009393</p>
                <i class="fa fa-envelope"></i><p>Email: <a href="mailto:adminofficer.befrienders@gmail.com" style="color:white;"> Befrienders Mauritius</a> </p>
            </div>
    
            <div class="footer-bottom">
                <p>All Right reserved by &copy;Befrienders</p>
            </div>
    
        </footer>

</body>

</html>
<?php


       }
    }
    else{
        header("Location: Events.html");
    }
    
?>