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

$sql="DELETE FROM events where EventID='".$id."';";

if(mysqli_query($conn,$sql)){

    $_SESSION['adminWarning'] = "Event ID: ".$id." has been deleted! ";
    //header("Location: newAdmin.html");
}

?>