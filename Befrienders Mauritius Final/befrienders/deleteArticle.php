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

    $additional_txt = "Deleted Article with ID : $id";		
    $auditSql = "INSERT INTO `audit`( `done_by`, `section`, `change_source`, `add_text`) VALUES (' ".$_SESSION['name']." ','Article','Delete','$additional_txt');";
    $audited = mysqli_query($connection,$auditSql);


   // header("Location: MainArticle.html");
}

?>