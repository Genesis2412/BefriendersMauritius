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

$sql="DELETE FROM article where ArticleID='".$id."';";

if(mysqli_query($conn,$sql)){

    $_SESSION['adminWarning'] = "Article ID: ".$id." has been deleted! ";
   // header("Location: MainArticle.html");
}

?>