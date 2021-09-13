
<?php session_start();
require("connection.php");

if(!(isset($_SESSION['staff'])))
{
    $_SESSION['LoginWarns'] = "Error : Please Login";
    header("Location: signin.php");

}

?>

<?php
    if(isset($_POST['submcbfeeder'])){
        $trig = mysqli_real_escape_string($connection,$_POST['trigs']);
        $rep = mysqli_real_escape_string($connection,$_POST['rep']);

        $sql = "INSERT INTO `chatbot`( `trigs`, `reply`) VALUES ('$trig','$rep');";
        if(mysqli_query($connection,$sql)){
            $_SESSION['adminWarning'] = "New entry added for chatbot";
        }else{
            $_SESSION['adminWarning'] = "Could not add entry. Try again later";
        }
        header("Location: newAdmin.php");
    }
    else{
        header("Location: signin.php");
    }

?>