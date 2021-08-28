
<?php session_start();
if(isset($_SESSION['uname'])){

  header("Location: useraccount.php");

}

?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootrap/4.0.0/css/boostrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
	<link rel="stylesheet" href="style.css"> 
</head>


<body>
    <div class="main-container">
      <div class="left-container">
        <h1>let's sign up!</h1>
        <div style="width: 100%;">
          <form name="SignUpFrm" action="server.php" method="post" onsubmit="return ValDatas();" class="signup-form">
            
            <input type="text" name="username"  placeholder="Username"  >
            <input type="email" name="mail" placeholder="E-mail" >
            <input type="password" name="pwd" placeholder="Password" >
            <input type="password" name="pwdrepeat" placeholder="Verify Password" >
            
            <input type="submit" name="submitRegBtn" value="Sign Up">
          </form>
        </div>
        <div id="ErrMecha"> </div>
        <div class="signin-link-container">
          <p class="signin-link">Already have an account? Click here!</p>
        </div>
      </div>
      <div class="right-container"></div>
    </div>
    <script>
      function ValDatas() {
        if(document.SignUpFrm.username.value.length==0){

          document.getElementById('ErrMecha').innerHTML = "Username not valid";
          return false;


        }
        if(document.SignUpFrm.mail.value.length==0){

          document.getElementById('ErrMecha').innerHTML = "Email not valid";
          return false;


        }
        if(document.SignUpFrm.pwd.value.length==0){

          document.getElementById('ErrMecha').innerHTML = "Password not valid";
          return false;


        }
        if(document.SignUpFrm.pwd.value!=document.SignUpFrm.pwdrepeat.value){

          document.getElementById('ErrMecha').innerHTML = "Password does not match!";
          return false;


        }

      }
      
    </script>
  </body>
</html>