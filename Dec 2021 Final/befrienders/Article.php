<?php session_start();

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> <!--Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--FontAwesome CDN -->
    <!-- <script src="js//jquery-3.4.1.min.js"></script> jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css/Events.css"> <!-- Common sharable css file for Events -->
    <link rel="stylesheet" type="text/css" href="css//footer.css">
    <link rel="stylesheet" href="css//headerNav.css">
    <script>
    $(document).ready(function(){
        $('#ViewAttached').click(function(){
            $('#MediaDistributor').show();
            $('#ViewAttached').hide();
            $('#HideAttached').fadeIn('slow');
        });

        $('#HideAttached').click(function(){
            $('#MediaDistributor').hide('slow','swing');
            $('#HideAttached').hide();
            $('#ViewAttached').fadeIn('slow');
        });

       
       

    });
    </script>
    <style>
    body{
        font-size: 14pt;
    }
    #FacebookIco{
        color:black;
        padding-left:98%;
    }
    #FacebookIco:hover{
        color:grey;    
    }
    #footer{
        background-color: grey;
    }
    #Links{
        color:black;
    }
    #Links:hover{
        color:rgb(88, 88, 88);
    }
    .cardSpacers{
        padding:10px;
    }
    .PhoneNum{
        color:black;
    }
    </style>

<?php
    require("connection.php");
    
    if(!(isset($_GET['id']))){
        
        $_SESSION['ArticleMsgError'] = "The article you're trying to access might not be available for the moment. Please try again later";
        header('Location: MainArticle.html');

    }
    $ArticleID = $_GET['id'];
    $sql = "select * from article where ArticleID = '".$ArticleID."' LIMIT 1;";
    $result=  mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){
            echo '<title> '.$row['ATitle'].' | Befrienders Mauritius</title></head>';

?>
<body>
    <!-- <nav> 
        <div id="header"> 
            <img src="img/logo.png" width="150px" height="70px" alt="Logo" />
            <div class="text-right" id="HeaderLinks" > 
                <a href="" class="LinksHead"> Homepage </a>
                <a href="" class="LinksHead"> Contact Us </a>
                <a href="" class="LinksHead"> Login Us </a>
                
                
            </div>
        </div>
    </nav>  -->

        <!--Navigation Bar-->
        <header>
	        <div class="logo">
	          <a href="#"><img src="./img/logo.png" alt="Befrienders Mauritius"></a>
	        </div>

	        <nav>
	        	<ul>
	            	<li><a  href="#">HOME</a></li>
	            	<li><a href="Events.html">EVENTS</a></li>
	            	<li><a class="active" href="MainArticle.html">BLOG</a></li>
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



    <script>
        $('#reactArticles').click(function(){
            $('#reactorPanel').toggle();
        });

    </script>

    <div style="background-color: lightgray;padding:10px;padding-top:5%;">
        Article Section <span style="padding-left:30%"> Posted on <?php echo $row['TimeWritten'] ?> </span>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="MainArticle.html" class="Links" >Article Home</a></li>
          <li class="breadcrumb-item active" aria-current="page" class="Links" > <?php echo ($row['ATitle'])  ?>  </li>
        </ol>
      </nav>


    <div class="container">
    <?php echo $row['ATitle'] ?> <br/>
        <div class="text-muted" style="line-height:35%;"> <?php echo "By ". $row['Author'] ?> </div>
        <div style="line-height:50%;"> &nbsp; </div>
        <div style="border:1px solid lightgray;padding:5px;">
            <div id="ArticleIllustration" > 
                <?php

                if($row['CoverImage']==""){
                    echo '<img  src="img//ArticleDir//InStore//Article3.jpg" width="300px" height="200px" alt="Article Caption" style="float: left;padding-right:15px;"/>';
                }
                else{
                    echo '<img  src="img//ArticleDir//ArticleUploads//'.$row['CoverImage'].'" width="300px" height="200px" alt="Article Caption" style="float: left;padding-right:15px;"/>';
               
                }


                ?>
                
                <p style="margin-left: auto; margin-right: auto;  padding-right:25px;padding-top: 10px; "> 
                
                <?php echo $row['ArticleData'] ?>

                </p>

                <?php
                    $sql2 = "select * from articleimages where ArticleID = '".$row['ArticleID']."';";

                    $res = mysqli_query($conn,$sql2);

                    if(mysqli_num_rows($res)>0){

                        echo '<button class="btn btn-info" id="ViewAttached"> View Attached Files </button>';
                        echo '<div class="row" id="MediaDistributor" style="padding-top:10px; padding-left: 20px;display:none; ">';

                        while($row=mysqli_fetch_assoc($res)){
                            echo '
                            
                            <!--Article Card Start Here -->
                            <div class="col-lg-3 col-sm-6" class="cardSpacers">                   
                                <div class="card" style="width: 14rem; padding:10px;">
                                    <img src="img//ArticleDir//ArticleUploads//'.$row['Path'].'" class="card-img-top" alt="Event Captions">
                                    <div class="card-body">
                            
                                    </div>
                                </div>                    
                            </div>
                            <!--Article Card Ends here -->   ';
                        }
                        echo "</div>"; //For Div id MediaDistributor

                    }
                    else{

                        echo ' <div > <i class="fa fa-image"></i> No Media attached </div>';

                    }

                ?>
                
                <button class="btn btn-info" id="HideAttached" style="display:none;"> Hide Attached Files </button>
                

                


                <br/>
                <a id="FacebookIco" href="https://www.facebook.com/BefriendersMauritius/" target="_blank"> <i class="fa fa-facebook"></i> </a>
               
            </div>            
        </div>
        

    </div>
     <br/>

    <footer class="footer">
		<div class="footer-left">
			<h5>Befrienders Mauritius</h5>
			<p>We can help prevent suicide. Befrienders provide 7/7 9hr to 21hr free and confidential support for people in distress, prevention and crisis resources for you or your loved ones.</p>
	    </div>
	
	    <div class="footer-right">
		    <h5>Address</h5>
            <i class="fas fa-map-marked-alt"></i><p>Befrienders(Mauritius)<br>1st Floor Flat,<br> 152 Royal Road,<br> Beau Bassin</p>
            <i class="fa fa-tty"></i><p>Office: <a class="PhoneNum" href="tel:4670160">4670160</a></p>
            <i class="fa fa-mobile"></i><p>Mobile: <a class="PhoneNum" href="tel:54837233">54837233</a></p>
            <i class="fa fa-fire"></i><p>Hotline: <a class="PhoneNum" href="tel:8009393"> 8009393</a> </p>
            <i class="fa fa-envelope"></i><p>Email: <a class="PhoneNum" href="mailto:adminofficer.befrienders@gmail.com" > Befrienders Mauritius</a> </p>
        </div>

	    <div class="footer-bottom">
        
            <p>All Right reserved by &copy;Befrienders</p>
            
	    </div>

    </footer>

<?php

        }

    }
    else{ // In case the ArticleID does not match any ID in database
        echo '<title> Article Not Found | Befrienders Mauritius </title></head>';
        echo '<div class="jumbotron text-center" > This article no longer exists! It might have been removed  ';
        echo "<br/> You can always visit our Article Catalog : <a href='MainArticle.html' class='text-muted'> Article Catalog </a> </div>";

    }

?>  


        
</body>
</html>