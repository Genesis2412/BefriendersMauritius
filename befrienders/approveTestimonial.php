<?php session_start();
require("connection.php");
if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>

<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "UPDATE testimonial SET status='on' where ID='".$id."'; ";

    if(mysqli_query($connection,$sql)){

        // $_SESSION['AdminWarn'] =  "Successfully approved Testimonial";
    }
    else{
        // $_SESSION['AdminWarn'] =  "Something went wrong with approving this Testimonial<br/>";
        // $_SESSION['AdminWarn'] =  "ERROR: CONTACT Web Developers; ERR: ".mysqli_error($connection);
    }
}

else{

    // $_SESSION['AdminWarn'] = " fail";
}