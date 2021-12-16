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

    $additional_txt = "Archived Testimonial ID: $id";		
    $auditSql = "INSERT INTO `audit`( `done_by`, `section`, `change_source`, `add_text`) VALUES (' ".$_SESSION['name']." ','Testimonial','Archive','$additional_txt');";
    $audited = mysqli_query($connection,$auditSql);

}

?>