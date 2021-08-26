<?php session_start();
require("connection.php");

$id = $_POST['ID'];

$sql="DELETE FROM testimonial where ID='".$id."';";

if(mysqli_query($conn,$sql)){

    $_SESSION['adminWarning'] = "Testimonial ID: ".$id." has been deleted! ";
    //header("Location: newAdmin.html");
}

?>