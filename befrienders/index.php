<?php
	include('array.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
  		<meta name="description" content="">
  		<meta name="keyword" content="">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<link rel="stylesheet" href="./css/index.css">
		<title>HOMEPAGE || BEFRIENDERS</title>
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
                        <a href="newadmin.php">MEMBER</a>
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
		
	    <!--Carousel-->
        <div id="banner" class="carousel slide" data-ride="carousel">  
          
        <div class="carousel-inner">
            <div class="carousel-item active">
				<img src="<?php echo $data[0][2]; ?>">
            </div>

            <div class="carousel-item">
				<img src="<?php echo $data[1][2]; ?>">
            </div>

            <div class="carousel-item">
				<img src="<?php echo $data[2][2]; ?>">
            </div>
  
            <a class="carousel-control-prev" href="#banner" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>

            <a class="carousel-control-next" href="#banner" data-slide="next">
                <span class="carousel-control-next-icon"></span>
			</a>
        </div>	    

		<span id="aboutUs">&nbsp;</span>
		<!--About Us-->
		<section class="about">
			<div class="container">
				<h2>About Us</h2>
				<div class="row">
                    <div class="col-md-6">
						<img src="<?php echo $data[3][2]; ?>" data-aos="fade-right">
					</div>

					<div class="col-md-6">
						<div id="aboutContent" data-aos="fade-left">
							<p>
                            	<?php echo $data[3][3]?>
							</p>
							<span style="font-style: italic;"><?php echo $data[3][4]?></span>
						</div>
                    </div>
				</div> 
			</div>
        </section>
        
        <!--Our Team-->
		<section class="teamdetails">            
			<h2>Our Team</h2>
			<img src="<?php echo $data[4][2]; ?>" data-aos="zoom-in">
			<p style="font-style: italic;" data-aos="zoom-in">Befrienders Mauritius Team</p>
			<p><?php echo $data[4][3] ?></p>
        </section>

		<span id="ourPromise">&nbsp;</span>
		<!--Our Promise-->
		<section class="promise">
			<div class="container">
				<h2>Our Promise</h2>
				<div class="row">
					<div class="col-md-4 text-center" data-aos="slide-up">
						<div id="icon">
							<i class="fa fa-trophy"></i>
						</div>
						<h3><?php echo $data[5][4] ?></h3>
						<p><?php echo $data[5][3] ?></p>                    
					</div> 

					<div class="col-md-4 text-center" data-aos="slide-up">
						<div id="icon">
							<i class="fa fa-eye"></i>
						</div>   
						<h3><?php echo $data[6][4] ?></h3>
						<p><?php echo $data[6][3] ?></p>                
					</div>

					<div class="col-md-4 text-center" data-aos="slide-up">
						<div id="icon">
							<i class="fa fa-key"></i>
						</div>
						<h3><?php echo $data[7][4] ?></h3>
						<p><?php echo $data[7][3] ?></p>                  
                    </div>
                               
				</div>
			</div>
		</section>


		<!-- Chatbot pop-up form -->
		<div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chat with us</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body" >

				<div id="chatbContain" style="overflow: scroll;   overflow-x: hidden;  height: 310px;">
					<div id="chatlogs">
						<div id="msg"> </div>
						<div id="thinking"></div>
    				</div>					
				
				


				</div>
			</div>
			<div class="modal-footer">
				<div id="composer" style="padding-right:25%;"> <input type="text" id="composerField" style="padding:10px;" onkeydown="if(event.keyCode == 13){ userReply(this.value); }"  placeholder="Enter message"/> </div> 
			</div>
		
			</div>
		</div>
		</div>
		<!--###############################################################-->

		<span id="needHelp">&nbsp;</span>
		<!--Need Help-->
		<a name="needHelp"></a>
		<section class="need">
			<h2>Need Help?</h2>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3" data-aos="fade-right">
						<div id="emergency">
							<h6 style="color: #005f20;">CHAT WITH US</h6>
							<!-- <a href="chat.html" target="blank"><i class="fa fa-headphones"></i></a> -->
							<button id="chatbotToggle" style="background-color:transparent;border:0px;">  <i class="fa fa-headphones"></i>  </button>
							 
							<p>We are here to listen to you
							<br><br>
							<a href="tel:+230 8009393"><span id="emerlink">HOTLINE : +230 8009393</span></a>
							</p>
						</div>
						<div id="enum">
							<h6>EMERGENCY NUMBERS</h6>
							<img src="./img/ambulance.png" alt="">
							<p><a href="tel:114"><span id="emerlink">Tel: 114</span></a></p>
							<img src="./img/police.png" alt="">
							<p><a href="tel:999"><span id="emerlink">Tel: 999</span></a></p>
							<img src="./img/firetruck.png" alt="">
							<p><a href="tel:115"><span id="emerlink">Tel: 115</span></a></p>
						</div>
					</div>
					<div class="col-sm-3" id="problem" data-aos="zoom-in">
						<h5>Why you have problems?</h5>
						<ul>
							<li>You cannot face difficulties in your personal life, family life, professional life
								, or between friends.
							</li>
							<li>You feel alone and don't know what to do.</li>
							<li>Feel the discouragement due to, failing to keep a promise, unfaithful partner
								, your feelings was hurt, or your partner left you.
							</li>
							<li>You didn't plan your life well.</li>
							<li>You couldn't achieve your ambitions.</li>
						</ul>
					</div>
					<div class="col-sm-3" id="happen" data-aos="zoom-in">
						<h5>What happens when you have problem?</h5>
						<p style="font-weight: bold">You feel discouraged, sad, and feel like quitting everything and go... </p>
						<ul>
							<li>You feel tired.</li>
							<li>You don't feel sleepy.</li>
							<li>You don't know what to do.</li>
							<li>You feel disgusted by everything</li>
							<li>You don't feel like eating</li>
							<li>You have family problems</li>
							<li>You feel unwanted</li>
							<li>You lose faith in life</li>
							<li>You feel like quitting everything</li>
							<li><b>Suicide is not a solution</b></li>
						</ul>
					</div>
					<div class="col-sm-3" id="effect" data-aos="zoom-in">
					<h5>What effect problems have on you?</h5>
						<p style="font-weight: bold">You can</p>
						<ul>
							<li>Have brain issues</li>
							<li>Have pain in your whole body</li>
							<li>Lost of weight.</li>
							<li>Drowning in drugs and alcohol.</li>
							<li>Feel sad.</li>
							<li>Have imsomnia</li>
							<li>Lose hope in everything</li>
							<li>Decide to leave everything and go</li>
							<li>Search for someone who you can share your feelings but doesn't find one.</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!--Testimonials-->
		<section class="test">
			<h2>Testimonials</h2>
			<div class="container">
    			<div id="slides" class="carousel slide" data-ride="carousel">
        			<div class="carousel-inner">
            			<div class="carousel-item active">
                			<div class="carousel-caption">
                    			<p><?php //echo $fetch[0][1]; ?></p> <!-- commented due to crash -->
                    			<div id="image-caption"><?php //echo $fetch[0][0]; ?></div>
                			</div>
						</div>
						<?php if(mysqli_num_rows($query) >= 0)	{	while($lrow=mysqli_fetch_array($query))	{ ?>
						<div class="carousel-item"
							<div class="carousel-caption">
								<p><?php  echo $lrow['remark']; ?></p>
								<div id="image-caption"><?php echo $lrow['name']; ?></div>
							</div>
						</div> 
						<?php } } ?>          			
					</div> 
					<a class="carousel-control-prev" href="#slides" data-slide="prev"> <i class='fa fa-arrow-left'></i> </a> <a class="carousel-control-next" href="#slides" data-slide="next"> <i class='fa fa-arrow-right'></i> </a>
    			</div>
			</div>
		</section>

		<span id="contactUs">&nbsp;</span>
		<!--Contact Us-->
		<section class="contact">
			<div class="container">
				<h2>Get In Touch</h2>
				<div class="row">
                    <div class="col-md-6 contact-info" data-aos="fade-right">   
						<div class="follow"><b><?php echo $data[8][4] ?> </b><i class="fa fa-map-marker"></i><span id="contactl"><?php echo $data[8][3] ?></span></div>
						<div class="follow" style="color: #fc3903; font-size: 18px;"><b><?php echo $data[9][4] ?> </b><i class="fa fa-phone"></i><a href="tel:+2308009393"><span id="contactl"><?php echo $data[9][3] ?></span></a></div>                             
						<div class="follow"><b><?php echo $data[10][4] ?> </b><i class="fa fa-phone"></i><a href="tel:+2304670160"><span id="contactl"><?php echo $data[10][3] ?></span></a></div>
						<div class="follow"><b><?php echo $data[11][4] ?> </b><i class="fa fa-whatsapp"></i><a href="tel:+23054837233"><span id="contactl"><?php echo $data[11][3] ?></span></a></div>
						<div class="follow"><b><?php echo $data[12][4] ?> </b><i class="fa fa-envelope"></i><a href="mailto:adminofficer.befrienders@gmail.com"><a href="mailto:adminofficer.befrienders@gmail.com"><span id="contactl"><?php echo $data[12][3] ?></span></a></div>

						<div class="follow"><label><b>Get Social:  </b></label>
							<a href="https://www.facebook.com/BefriendersMauritius/" target="blank"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>

                    <div class="col-md-6">
						<div id="map" data-aos="zoom-in">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59900.560071149346!2d57.43296797910154!3d-20.226253199999977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5b920f420c69%3A0xbfea6c7d66e17059!2sBefrienders%20Mauritius!5e0!3m2!1sen!2smu!4v1604692225860!5m2!1sen!2smu" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
                    </div>
							
					<div class="col-md-6 container">

					<?php
					
						if(isset($_SESSION['testiWarn'])){
							echo "<br/>";
						
							echo '<div id="testimonialFeedback" style="color:black; padding: 4%  10% 4% 10% ;background-color:yellow;"> ';
							echo $_SESSION['testiWarn'];
							echo ' <button style="float:right;" id="feedbackOff" class="btn btn-danger"> X </button> ';
							
							echo "</div";
					
					
							unset($_SESSION['testiWarn']);
						}
					?>


							
						<h4  style="color:white;"> Testimonial Form </h4>	
						 <span style="color:white;padding-left:5%;font-style:italic;" >Your testimonials could appear on our website.</span>
						<form name="testimonials" method="POST" action="addTestimonial.php">
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Enter your name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="message" placeholder="Enter your Message">
								
							</div>
							<div class="form-group">
								
								<h5 style="color:white;text-align:center;"> Your feedback: </h5>
								 <select name="rating" id="rating" style="color:Red;" class="form-control">
								 	 <option value="0" selected> Make a selection </option>	 
								 	 <option value="1"> ❤ </option>
									 <option value="2"> ❤❤</option>
									 <option value="3"> ❤❤❤</option>
									 <option value="4"> ❤❤❤❤</option>
									 <option value="5" > ❤❤❤❤❤</option>
								 </select>
							</div>

							<input type="submit" name="TestimonialSubmit" class="btn btn-primary form-control" value="Send testimonial" />
						</form>


                    </div>
					<span id="testimonial"> &nbsp;</span>
				</div>
            </div>
		</section>

	

		<!--Footer-->
		<div class="footer">
	        <img id="logoFooter" src="">
	        <img src="./img/logo.png">
	        <p>&copy; 2020 All rights reserved</p>
		</div>

		<!--Navigation Bar Javascript-->
	  	<script type="text/javascript">

		  function dont(){
			  //Start of ajax
				const xhttp = new XMLHttpRequest();
				xhttp.onload = function() {
					document.getElementById("chatbContain").innerHTML = this.responseText;
				}
				xhttp.open("GET", "zz.html");
				xhttp.send();

				//End of ajax
		  }
	        $(document).ready(function()
	        {

				$('#feedbackOff').click(function(){
					$('#testimonialFeedback').hide();
				});
				
	          $('.menu-toggle').click(function()
	          {
	            $('nav').toggleClass('active')
	          });


			    
			  
			  


	        });	          
		</script>

		<script> 
		// Chatbot Script

		function userReply(msgs){
                setTimeout(function(){ 
                    document.getElementById('msg').innerHTML += '<div class="user"> '+msgs+' </div>';
                }, 500);   
                botReplies(msgs);                 

                document.getElementById("composerField").value=" ";
				
                
            }

			function botReplies(usermsg){                
                var result = "";
				var reply = "";
                /* $.ajax({
                    url : "fromBot.php?t="+usermsg, 
                    success: function(result){
                        reply=result;
                    }
                }) */

				//Start of ajax
				var ChatBurl = "fromBot.php?t="+usermsg;
				const xhttp = new XMLHttpRequest();
				xhttp.onload = function() {
					
					reply = this.responseText;
				}
				xhttp.open("POST", ChatBurl );
				xhttp.send();

				//End of ajax


                setTimeout(function(){ 
                    document.getElementById('msg').innerHTML += '<div class="bot"> '+reply+' </div>';
					document.getElementById('thinking').scrollIntoView({behavior: "smooth",block: "end", inline: "nearest"});
                }, 1000);

				
				

            }


			$(document).ready(function()
	        { 
				$("#chatbotToggle").click(function(){	
				
					$('#chatbotModal').modal('show');
					setTimeout(function(){            
						document.getElementById('msg').innerHTML += '<div class="bot"> Hello! </div>';

					}, 1200); 




			  	});  

				  


			})
			
			
		</script>
		
		<script>
			AOS.init();
		</script>

	</body>
</html>