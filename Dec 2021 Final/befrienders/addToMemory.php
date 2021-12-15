<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>

<?php


$msg = mysqli_real_escape_string($connection,$_POST['m']);
$trig = mysqli_real_escape_string($connection,$_POST['t']);
$id = mysqli_real_escape_string($connection,$_POST['iden']);

$sql = "INSERT INTO `chatbot`( `trigs`, `reply`) VALUES ('$trig','$msg');";

if(mysqli_query($connection,$sql)){
    echo "Chatbot's memory has been updated with Trigger: $trig";
    $delete = "DELETE FROM `missing_chatbot_pair` WHERE `recordID`='$id';";
    mysqli_query($connection,$delete);

}else{
    echo "Something went wrong. Try again later";
}


?>