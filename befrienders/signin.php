<?php session_start();

if(isset($_SESSION['staff']))
{

    header("Location: admin.php");

}

?>

<html>
<head>
<link href="css//bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CDN-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Admin Login Page </title>
<link href="css//index.css" rel="stylesheet"> <!-- Own CSS -->

<script src="js/jquery-3.4.1.min.js"> </script>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style>
  @media (max-width: 575.98px) { 

    #paraHead{

      font-size:15pt;
    }

  }
  #paraHead{

font-size:50pt;
}

.links, .nav-link{
  color:white;
  text-decoration: none;
  font-weight: bold;
}
.links , .nav-link :hover{
  color:rgba(255, 255, 255, 0.575);
  text-decoration: none;
}


    </style>
    <script>
      $(document).ready(function(){

        $('#closeErr').click(function(){
          $('#ErrorForms').fadeOut();
        });

      });
      </script>
      		<link rel="stylesheet" href="./css/index.css">
</head>

<body>

                <!--Navigation Bar-->
	  	<header>
	        <div class="logo">
	          <a href="./"><img src="./img/logo.png" alt="Befrienders Mauritius"></a>
	        </div>

	        <nav>
	        	<ul>
	            	<li><a  href="./">HOME</a></li>
	            	<li><a href="Events.html">EVENTS</a></li>
	            	<li><a href="MainArticle.html">BLOG</a></li>
                    <li>
                        <a class="active" href="">MEMBER</a>
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
	            	<li><a href="./#aboutUs">ABOUT US</a></li>
                    <li><a href="./#contactUs">CONTACT US</a></li>
                    <li><a href="./#needHelp">NEED HELP?</a></li>
	          </ul>
	        </nav>

	        <!--Hamburger-->
	        <div class="menu-toggle">
	          <i class="fa fa-bars" aria-hidden="true"></i>
	        </div>
	    </header>




<div style="padding-top:55px;"> </div>

<?php

if(isset($_SESSION['LoginWarns'])){

  echo '<div id="ErrorForms">
<p style="background-color:yellow;color:black;"> '.$_SESSION['LoginWarns'].' <button class="btn btn-danger" id="closeErr"> X </button> </p>
</div>';
unset($_SESSION['LoginWarns']);
}


?>

<div style="padding-top:55px;"> 

    <div  class="container" style="background-color:rgba(180, 180, 180, 0.603);" >
      <p id="paraHead" style="padding-top:25px;"> Befrienders NGO Login Page </p>


      <form name="login" method="POST" action="processLogin.php">

      
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">&nbsp; @ &nbsp;</span>
  </div>
  <input type="text" name="uname" class="form-control" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Pass</span>
  </div>
  <input type="password" name="pwd" class="form-control" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div style="padding-left:45%;padding-bottom:15px;">
  <input class="btn btn-info " type="submit" name="LoginFrm" value="Login"/>
</div>
</form>
    </div>
    </div>


</body>
</html>