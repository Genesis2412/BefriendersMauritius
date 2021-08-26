<?php session_start();

if(isset($_SESSION['UserAcc'])){

  header("Location: useraccount.php");

}


?>



<html>
<head>
	<title>Signin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootrap/4.0.0/css/boostrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
	<link rel="stylesheet" href="style.css"> 
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
  function DisplayAlertSession(){
            $.ajax({
                    type:"POST",
                    url:"checksessionLogin.php",
                    success: function(value){
                        $("#warns").html(value);
                    }
                });

        }
</script>
</head>


	<body onload = "DisplayAlertSession();">

      <div id ="warns">
    
  </div>
		
    <div class="main-container">
      <div class="left-container">
        <h1>let's sign in!</h1>
        <div style="width: 100%;">
          <form action="processsignup.php" method="post" class="signup-form">
         
            <input type="text" id="username" name="uname"placeholder="Username" required>
            <input type="password" id="password" name="pwd" placeholder="Password" required>
                       
            
            	<input type="submit" name="Signinsupn" value="Sign In">
          </form>
        </div>
 
        <div class="signin-link-container">
          <p class="text-muted"> Not a member yet? <a href="signup.php"> Click here! </a> </p>
        </div>
      </div>
      <div class="right-container"></div>
    </div>
    <script>
      function checkTerms() {
        var termsCheck = document.getElementById('agree-terms');
        var btn = document.getElementById('submit');
        if (termsCheck.checked == true){
          btn.classList.remove("disabled");
          btn.disabled = false;
        }else{
          btn.classList.add("disabled");
          btn.disabled = true;
        }
      }
      
    </script>
  </body>
</html>