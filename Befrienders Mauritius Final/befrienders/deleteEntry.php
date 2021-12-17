
<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>

<?php

if(isset($_GET['delID']))
{
    $id = mysqli_real_escape_string($connection,$_GET['delID']);

    $sql = "DELETE FROM `chatbot` WHERE `recordID`='$id'; ";

    if(mysqli_query($connection,$sql)){
        $_SESSION['adminWarning']="Chatbot memory deleted";
    }else{
        $_SESSION['adminWarning']="Cannot proceed with deleting. Try again later";
    }
    header("Location:admin.php");
}
else{
  header("Location: signin.php");  
}

?>