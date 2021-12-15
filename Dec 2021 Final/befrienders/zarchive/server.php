<?php



// Change this to your connection info.
$servername = 'localhost';
$username= 'root';
$password= '';
$database = 'phplogin';

// Try and connect using the info above.
$conn = mysqli_connect($servername, $username, $password, $database);

// REGISTER USER
if (isset($_POST['submitRegBtn'])) {
  // receive all input values from the form
  $username =  $_POST['username'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $finalPwd = md5($password);
  

  $sqlCodes="INSERT INTO accounts(username,password,email) VALUES('".$username."','".$finalPwd."','".$email."'); ";


  if(mysqli_query($conn, $sqlCodes)){

    $_SESSION['RegUserWarns'] = "User Successfully created ";
    $_SESSION['UserAcc'] = $username;
    $_SESSION['UserEmail'] = $email ;

    header("Location: signin.php");

  }
  else{
    echo "Error: ".mysqli_error($conn);
  }

}


 
   
    

// .