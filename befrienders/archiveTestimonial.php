<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>


<?php

$id = $_POST['ID'];


$sql = "UPDATE `testimonial` SET `status` = 'off' WHERE `ID` = '$id';";
if(mysqli_query($conn,$sql)){

    //$_SESSION['adminWarning'] = "Testimonial ID: ".$id." has been archived! ";
    //header("Location: newAdmin.html");
}

?>